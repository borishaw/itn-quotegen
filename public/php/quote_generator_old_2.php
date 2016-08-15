<?php
//Basic HTTP Authentication
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header("WWW-Authenticate: Basic realm=\"Private Area\"");
	header("HTTP/1.0 401 Unauthorized");
	print "Sorry - you need valid credentials to be granted access!\n";
	exit;
} else {
	if (($_SERVER['PHP_AUTH_USER'] == 'jane') && ($_SERVER['PHP_AUTH_PW'] == 'smith')) {
		require_once '../../vendor/autoload.php';
		DB::$user = 'root';
		DB::$password = 'root';
		DB::$dbName = 'itn_quote_gen';
	} else {
		header("WWW-Authenticate: Basic realm=\"Private Area\"");
		header("HTTP/1.0 401 Unauthorized");
		print "Sorry - you need valid credentials to be granted access!\n";
		exit;
	}
}

//Get user's input
$post_data = json_decode(file_get_contents("php://input"), true);

/*
Insert data into quotes table
1. Company
2. Agent Name
3. Destination
*/
$company = $post_data['agentInfo']['companyName'];
$agent_name = $post_data['agentInfo']['name'];
$destination = $post_data['destinationInfo']['city'] . ', ' . $post_data['destinationInfo']['province'];
//Formulate the array for insert
$quotes_insert = ['company' => $company, 'agent_name' => $agent_name, 'destination' => $destination];
//Insert the array into table
DB::insert("quotes", $quotes_insert);
//Get the ID of last insert
$quote_number = DB::insertId();

//Organize Input Data
$agent_info = $post_data['agentInfo'];
$destination_info = $post_data['destinationInfo'];
$destination_city = $destination_info['city'];
$pieces_info = $post_data['shipmentInfo']['pieces'];
$dangerous_goods = $post_data['shipmentInfo']['dangerousGoods'];
$mode_of_transportation = $post_data['shipmentInfo']['modeOfTransportation'];
if ($mode_of_transportation != "Ocean FCL"){
	$unit_system = $post_data['shipmentInfo']['unitSystem'];
}



/*
Put data in html
1. Agent Info
2. Destination Info
3. Dangerous Goods Info
4. Pieces Info
5. Mode of Transportation
*/

//Agent Info
$agent_info_html = "<ul>";
foreach ($agent_info as $key => $value){
	$agent_info_html .= "<li>" . ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ' . $value . "</li>";
}
$agent_info_html .= "</ul>";

//Destination Info
$destination_info_html = "<ul>";
foreach ($destination_info as $key => $value){
	$destination_info_html .= "<li>". ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ' . $value . "</li>";
}
$destination_info_html .= "</ul>";

//Dangerous Goods Info
$dangerous_goods_info = ["dangerousGoods" => $dangerous_goods];
if ($dangerous_goods == 'DG'){
	$dangerous_goods_info["unNumber"] = $post_data['shipmentInfo']['unNumber'];
	$dangerous_goods_info["class"] = $post_data['shipmentInfo']['class'];
	$dangerous_goods_info["packingGroup"] = $post_data['shipmentInfo']['packingGroup'];
}
$dangerous_goods_info_html = "<ul>";
foreach ($dangerous_goods_info as $key => $value){
	$dangerous_goods_info_html .= "<li>" . ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ' . $value . "</li>";
}
$dangerous_goods_info_html .= "</ul>";

//Pieces Info
$pieces_info_html = "
<h2>Pieces Info</h2>
<h3>Mode of Transportation: $mode_of_transportation</h3>
";
if ($mode_of_transportation != 'Ocean FCL'){
	foreach ($pieces_info as $index => $piece) {
		$piece_number = $index + 1;
		$pieces_info_html .= "<h3>Piece $piece_number</h3>";
		$pieces_info_html .= "<ul>";
		foreach ($piece as $key => $value){
			$pieces_info_html .= "<li>" . ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ';
			if ($unit_system == "Metric"){
				if ($key != "weight"){
					$pieces_info_html .= $value . " CM</li>";
				} else {
					$pieces_info_html .= $value . " KG</li>";
				}
			} else if ($unit_system == "Imperial") {
				if ($key != "weight"){
					$pieces_info_html .= $value . " IN</li>";
				} else {
					$pieces_info_html .= $value . " LB</li>";
				}
			}
		}
		$pieces_info_html .= "</ul>";
	}
} else {
	$type_of_container = $post_data['shipmentInfo']['typeOfContainer'];
	$pieces_info_html .= "<ul><li>Type of Container: $type_of_container</li></ul>";
}

/*
 * Unit Conversion
 */
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

function to_metric ($pieces_info_imperial){
	$pieces_info_metric = [];
	foreach ($pieces_info_imperial as $piece){
		$piece_info = [];
		foreach ($piece as $key => $value){
			switch ($key){
				case "weight":
					$mass = new Mass($value, "lb");
					$value_metric = $mass->toUnit("kg");
					$piece_info[$key] = $value_metric;
					break;
				default:
					$length = new Length($value, "in");
					$value_metric = $length->toUnit("cm");
					$piece_info[$key] = $value_metric;
			}
		}
		array_push($pieces_info_metric, $piece_info);
	}
	return $pieces_info_metric;
}

if (isset($unit_system)){
	if ($unit_system == "Imperial"){
		$pieces_info = to_metric($pieces_info);
	}
}

/*
Quote Calculation
*/
function quote_calculation($destination, $mode, $dangerous_goods, $pieces=null){
	$quotable = true; //Assume all shipments are quotable
	$quote = 0;

	//Check if the shipment contains dangerous goods
	if ($dangerous_goods == "DG"){
		$quotable = false;
	} else {
		switch ($mode) {
			case "Ocean FCL":
				$rate_query = DB::query("SELECT sold from fcl_price_table WHERE city='$destination'");
				if ((bool) $rate_query){
					$quote = $rate_query[0]['sold'];
				} else {
					$quotable = false;
				}
				break;

			default:
				$total_weight = 0;
				$volume_weight = 0;
				foreach ($pieces as $piece){
					$length = (int) $piece['length'];
					$width = (int) $piece['width'];
					$height = (int) $piece['height'];
					$weight = (int) $piece['weight'];
					$total_weight += $weight;
					if ($mode == "Ocean LCL"){
						$volume_weight += ($length + $width + $height) / 100 * 240;
					} else if ("Air") {
						$volume_weight += ($length + $width + $height) / 100 * 167;
					}

					if ($length > 243 || $width > 121 || $height > 220 || $weight > 1150){
						$quotable = false;
					}
				}

				if ($total_weight > 2300){
					$quotable = false;
				} else {
					$zone_query = DB::query("SELECT zone FROM air_lcl_city_zone_table WHERE city='$destination'");
					if ((bool) $zone_query){
						$zone = $zone_query[0]['zone'];
						if ($zone != 0){
							$chargeable_weight = max([$total_weight, $volume_weight]);
							$minimum_rate = (int) DB::query("SELECT rate FROM air_lcl_minimum_rate_table WHERE zone=$zone")[0]['rate'];
							$rate_table = DB::query("SELECT * FROM air_lcl_rate_zone_$zone");
							$max_weight_array = []; //Store all max value here
							foreach ($rate_table as $rate_row){
								//push all max value to the array above
								array_push($max_weight_array, $rate_row['max']);
							}
							array_push($max_weight_array, $chargeable_weight);
							sort($max_weight_array);//sort array from low to high
							$zone_index = array_search($chargeable_weight, $max_weight_array);
							$zone_rate = $rate_table[$zone_index]['rate'];
							$chargeable_rate = $chargeable_weight * $zone_rate;
							$quote = ceil($chargeable_weight);
						} else {
							$quotable = false;
						}
					} else {
						$quotable = false;
					}
				}
		}
	}

	//If quotable, return the quote in number, if not return a string
	if ($quotable){
		return 'CAD $' . $quote;
	} else {
		return "This shipment requires a manual quote.";
	}
}

$quote_info_html = quote_calculation($destination_city, $mode_of_transportation, $dangerous_goods, $pieces_info);


function write_html ($quote_number, $agent_info_html, $post_data, $destination_info_html, $dangerous_goods_info_html, $quote_info_html){
	$html = '';
	$mode_of_transportation = $post_data['shipmentInfo']['modeOfTransportation'];
	$destination = $post_data['destinationInfo']['city'] . ', ' . $post_data['destinationInfo']['province'];
	switch ($mode_of_transportation){
		case "Ocean FCL":
			$fcl_charges = DB::query("SELECT * FROM fcl_charges");
			$fcl_charges_html = "<ul>";
			foreach ($fcl_charges as $charge){
				$fcl_charges_html .= "<li>". $charge['name'] . ": " . $charge['value'] . "</li>";
			}
			$fcl_charges_html .= "</ul>";
			$type_of_container = $post_data['shipmentInfo']['typeOfContainer'];
			$html .=
				"<h1>Quote $quote_number</h1>" .
				$agent_info_html .
				"<p>$mode_of_transportation Import</p>".
				"<p>DAP $destination</p>" .
				"<p>Equipments: $type_of_container</p>" .
				"<p>From: CY Toronto, ON</p>" .
				"<p>Deliver to: DOCK, </p>" .
				$destination_info_html .
				"<h2>Dangerous Goods Info: </h2>" .
				$dangerous_goods_info_html .
				$fcl_charges_html .
				"Delivery Cartage: " . $quote_info_html .
				"<h2>Terms and Conditions</h2>";
			break;
		case "Ocean LCL":
			$unit_system = $post_data['shipmentInfo']['unitSystem'];
			$pieces_info = $post_data['shipmentInfo']['pieces'];
			$pieces_info_html = '';
			foreach ($pieces_info as $index => $piece) {
				$piece_number = $index + 1;
				$pieces_info_html .= "<h3>Piece $piece_number</h3>";
				$pieces_info_html .= "<ul>";
				foreach ($piece as $key => $value){
					$pieces_info_html .= "<li>" . ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ';
					if ($unit_system == "Metric"){
						if ($key != "weight"){
							$pieces_info_html .= $value . " CM</li>";
						} else {
							$pieces_info_html .= $value . " KG</li>";
						}
					} else if ($unit_system == "Imperial") {
						if ($key != "weight"){
							$pieces_info_html .= $value . " IN</li>";
						} else {
							$pieces_info_html .= $value . " LB</li>";
						}
					}
				}
				$pieces_info_html .= "</ul>";
			}
			$lcl_charges = DB::query("SELECT * FROM lcl_charges");
			$lcl_charges_html = "<ul>";
			foreach ($lcl_charges as $charge){
				$lcl_charges_html .= "<li>". $charge['name'] . ": " . $charge['value'] . "</li>";
			}
			$lcl_charges_html .= "</ul>";
			$html .=
				"<h1>Quote $quote_number</h1>" .
				$agent_info_html .
				"<p>$mode_of_transportation Import</p>".
				"<p>DAP $destination</p>" .
				"<p>From: CFS Toronto, ON</p>" .
				"<p>Deliver to: DOCK, </p>" .
				$destination_info_html .
				"<h2>Cargo Description:</h2>".
				$pieces_info_html .
				"<h2>Dangerous Goods Info: </h2>" .
				$dangerous_goods_info_html .
				$lcl_charges_html .
				"Delivery Cartage: " . $quote_info_html .
				"<h2>Terms and Conditions</h2>";
			break;
		case 'Air':
			$unit_system = $post_data['shipmentInfo']['unitSystem'];
			$pieces_info = $post_data['shipmentInfo']['pieces'];
			$pieces_info_html = '';
			foreach ($pieces_info as $index => $piece) {
				$piece_number = $index + 1;
				$pieces_info_html .= "<h3>Piece $piece_number</h3>";
				$pieces_info_html .= "<ul>";
				foreach ($piece as $key => $value){
					$pieces_info_html .= "<li>" . ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ';
					if ($unit_system == "Metric"){
						if ($key != "weight"){
							$pieces_info_html .= $value . " CM</li>";
						} else {
							$pieces_info_html .= $value . " KG</li>";
						}
					} else if ($unit_system == "Imperial") {
						if ($key != "weight"){
							$pieces_info_html .= $value . " IN</li>";
						} else {
							$pieces_info_html .= $value . " LB</li>";
						}
					}
				}
				$pieces_info_html .= "</ul>";
			}
			$air_charges = DB::query("SELECT * FROM air_charges");
			$air_charges_html = "<ul>";
			foreach ($air_charges as $charge){
				$air_charges_html .= "<li>". $charge['name'] . ": " . $charge['value'] . "</li>";
			}
			$air_charges_html .= "</ul>";
			$html .=
				"<h1>Quote $quote_number</h1>" .
				$agent_info_html .
				"<p>$mode_of_transportation Import</p>".
				"<p>DAP $destination</p>" .
				"<p>From: CFS Toronto, ON</p>" .
				"<p>Deliver to: DOCK, </p>" .
				$destination_info_html .
				"<h2>Cargo Description:</h2>".
				$pieces_info_html .
				"<h2>Dangerous Goods Info: </h2>" .
				$dangerous_goods_info_html .
				$air_charges_html .
				"Delivery Cartage: " . $quote_info_html .
				"<h2>Terms and Conditions</h2>";
			break;
	}
	return $html;
}

$html = write_html ($quote_number, $agent_info_html, $post_data, $destination_info_html, $dangerous_goods_info_html, $quote_info_html);

print "A copy of the quote will be sent to your email address";
//Generate PDF
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->writeHTML($html);
$pdf_path = dirname(dirname(dirname(__FILE__))) . '/pdf/' . $quote_number . '.pdf';
$pdf->Output($pdf_path, 'F');

//Send out an email with the PDF
$mail = new PHPMailer();
$mail->addAddress($post_data['agentInfo']['email'], $agent_name);
$mail->isHTML(true);
$mail->Subject = "Quote " . $quote_number;
$mail->Body = $html;
$mail->addAttachment($pdf_path);

//try {
//	$mail->send();
//	print "A copy of the quote will be sent to your email address";
//} catch (Exception $e){
//	print $e->getMessage();
//}

print "A copy of the quote will be sent to your email address";