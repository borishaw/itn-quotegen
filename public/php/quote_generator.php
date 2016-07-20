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
LCL and Air - Parameters of freight to be quoted automatically	
Max Length	243 cm
Max Width	121 cm
Max Height	220 cm
Max actual weight per one pc	1150 KG
Max actual weight per shipment 	2300 KG
W/M ratio for truck tariff	167 KG per 1 CBM
Zone 	1 to 7 only 
When quote LCL (ZONE 1,2,3) pick charges whichever are greater LCL or Air	
 */

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
$pieces_info = $post_data['shipmentInfo']['pieces'];
$unit_system = $post_data['shipmentInfo']['unitSystem'];
$dangerous_goods = $post_data['shipmentInfo']['dangerousGoods'];
$mode_of_transportation = $post_data['shipmentInfo']['modeOfTransportation'];

/*
Put data in html
1. Agent Info
2. Destination Info
3. Pieces Info
4. Dangerous Goods, Mode of Transportation
*/
$agent_info_html = "<h2>Agent Info</h2><ul>";
foreach ($agent_info as $key => $value){
	$agent_info_html .= "<li>" . ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ' . $value . "</li>";
}
$agent_info_html .= "</ul>";

$destination_info_html = "<h2>Destination Info</h2><ul>";
foreach ($destination_info as $key => $value){
	$destination_info_html .= "<li>". ucwords(preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", $key)) . ': ' . $value . "</li>";
}
$destination_info_html .= "</ul>";

$pieces_info_html = "<h2>Pieces Info</h2><h3>Mode of Transportation: $mode_of_transportation</h3>";
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

$html = "<h1>Quote $quote_number</h1>" . "<div>$agent_info_html</div>" . "<div>$destination_info_html</div>" . "<div>$pieces_info_html</div>";

//print_r($html);

//Generate PDF

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->writeHTML($html);
$pdf->Output(dirname(dirname(dirname(__FILE__))) . '/pdf/' . $quote_number . '.pdf', 'F');