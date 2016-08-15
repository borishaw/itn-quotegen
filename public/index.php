<?php include 'header.php';?>

	<body ng-controller="ctrl" data-spy="scroll" data-target=".scrollspy">

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="">
				<img id="logo-full" class ="" src="img/logo_colour.png" width="200" height"100" alt="ITN Logistics">
				<img id="logo-reverse" class="" src="img/logo_white-colouricon.png" width="200" height"100" alt="ITN Logistics">
			</a>

			<div class="collapse navbar-collapse" data-hover="dropdown" data-animations="zoomIn zoomIn zoomIn zoomIn" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Back to ITN Logistics</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="banner">
		<div class="container">
			<div class="row">
				<div class="banner-container">
					<div class="col-xs-12 col-sm-6 col-md-5">
						<h1>ITN Quote Generator</h1>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-7">
						<p>Note: Please fill in the information below. If your shipment is quotable, you will get a quote in PDF. Otherwise, we will perform a manual quote and get back to you.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="form">
		<div class="container">
			<div class="row">
				<section>
					<div class="col-md-4">
						<form name="myForm" ng-submit="submit()" novalidate>

							<ng-form name="agentInfo">
								<h1>Agent Info</h1>
								<ul class="field-group">
									<li>
										<label for="agent_name">Name</label>
										<input id="agent_name" type="text" ng-model="agent.name" name="Agent_Name" validator="required" required-error-message="Please enter agent's name">
									</li>
									<li>
										<label for="agent_company_name">Company</label>
										<input id="agent_company_name" type="text" ng-model="agent.companyName" name="Company_Name" validator="required" required-error-message="Please enter company name">
									</li>
									<li>
										<label for="agent_country">Country</label>

										<div class="select">
											<select id="agent_country" ng-model="agent.country" name="Country" validator="required" required-error-message="Please select a country">
												<option ng-repeat="country in countries" value="{{country}}">{{country}}</option>
											</select>
										</div>
									</li>
									<li>
										<label for="agent_email">Email</label>
										<input id="agent_email" type="email" ng-model="agent.email" name="Email" validator="required, email" required-error-message="Please provide agent's email" email-error-message="Please provide a valid email address">
									</li>
									<li>
										<label for="agent_tel">Tel</label>
										<input id="agent_tel" type="tel" ng-model="agent.phone" name="Phone_Number" validator="required" required-error-message="Please enter a phone number">
									</li>
								</ul>
							</ng-form>

							<ng-form name="destinationInfo">
								<h1>Destination Info</h1>
								<ul class="field-group">
									<li>
										<label for="destination_address">Address</label>
										<input id="destination_address" type="text" ng-model="destination.address" name="Destination_Address" validator="required" required-error-message="Please enter an address">
									</li>
									<li>
										<label for="destination_city">Destination City</label>

										<div class="select">
											<select name="Destination_City" id="destination_city" ng-model="destination.city" ng-options="city for city in cities" validator="required" required-error-message="Please select a destination city">
											</select>
											<input name="Destination_City_Other" type="text" ng-if="destination.city == 'Other'">
										</div>
									</li>
									<li>
										<label for="destination_province">Province</label>

										<div class="select">
											<select name="Destination_Province" ng-model="destination.province" id="destination_province" ng-options="province for province in provinces" ng-init="destination.province = provinces[8]" disabled>
											</select>
										</div>
									</li>
									<li>
										<label for="destination_postal_code">Postal Code</label>
										<input id="destination_postal_code" type="text" ng-model="destination.postalCode" name="Destination_Postal_Code" validator="required" required-error-message="Please provide destination postal code">
									</li>
									<li>
										<label for="destination_consignee">Consignee</label>
										<input id="destination_consignee" type="text" ng-model="destination.consignee" name="Consignee" validator="required" required-error-message="Please provide consignee's name">
									</li>
								</ul>
							</ng-form>

							<ng-form name="Shipment_Info">
								<h1>Shipment Info</h1>
								<ul class="field-group">
									<li>
										<label for="dangerous_goods">Dangerous Goods</label>
										<div class="select">
											<select name="Dangerous_Goods" id="dangerous_goods" ng-model="shipment.dangerousGoods" validator="required" required-error-message="Please indicate if the shipment contains dangerous goods">
												<option value="non-DG">non-DG</option>
												<option value="DG">DG</option>
											</select>
										</div>
									</li>

									<li ng-if="shipment.dangerousGoods == 'DG'">
										<label for="un_number">UN Number: </label>
										<input id="un_number" type="text" ng-model="shipment.unNumber" name="UN_Number" validator="required" required-error-message="Required">
										<label for="dg_class">Class: </label>
										<input id="dg_class" type="text" ng-model="shipment.class" name="Class" validator="required" required-error-message="Required">
										<label for="packing_group">Packing Group: </label>
										<input type="text" ng-model="shipment.packingGroup" name="Packing_Group" validator="required" required-error-message="Required">
									</li>

									<li>
										<label for="mode_of_transportation">Mode of Transportation</label>

										<div class="select">
											<select name="Mode_of_Transportation" id="mode_of_transportation" ng-model="shipment.modeOfTransportation" validator="required" required-error-message="Please select a mode of transportation">
												<option value="Air">Air</option>
												<option value="Ocean LCL">Ocean LCL</option>
												<option value="Ocean FCL">Ocean FCL</option>
											</select>
										</div>
									</li>
								</ul>

								<div ng-if="shipment.modeOfTransportation == 'Ocean FCL'">
									<label for="type_of_container">Type of Container</label>

									<div class="select">
										<select ng-model="shipment.typeOfContainer" name="Type_of_Container" id="type_of_container" validator="required" required-error-message="Please select a container">
											<option value="20' DV">20' DV</option>
											<option value="40' DV">40' DV</option>
											<option value="40' HC">40' HC</option>
											<option value="20' OT Gauge">20' OT Gauge</option>
											<option value="40' OT Gauge">40' OT Gauge</option>
										</select>
									</div>
								</div>
								<div ng-if="shipment.modeOfTransportation == 'Air' || shipment.modeOfTransportation == 'Ocean LCL'">
									<h1>Measurements</h1>
									<label for="unit_system">Unit System</label>
									<select name="Unit_System" ng-model="shipment.unitSystem" id="unit_system" ng-options="system for system in unit_systems" validator="required" required-error-message="Please select a measurement system"></select>
									<button type="button" ng-click="addPiece()" ng-disabled="!allowAddNew">Add another piece</button>
									<div ng-repeat="piece in pieces" class="goods_details">
										Piece {{$index+1}}:
										<label for="length_{{$index+1}}">Length</label>
										<input id="length_{{$index+1}}" name="Length_{{$index+1}}" ng-model="piece.length" type="number" validator="required" no-validation-message="true">
										<span ng-if="shipment.unitSystem == 'Imperial'">Inch</span>
										<span ng-if="shipment.unitSystem == 'Metric'">CM</span>
										<label for="width_{{$index+1}}">Width</label>
										<input id="width_{{$index+1}}" name="Width_{{$index+1}}" ng-model="piece.width" type="number" validator="required" no-validation-message="true">
										<span ng-if="shipment.unitSystem == 'Imperial'">Inch</span>
										<span ng-if="shipment.unitSystem == 'Metric'">CM</span>
										<label for="height_{{$index+1}}">Height</label>
										<input id="height_{{$index+1}}" name="Height_{{$index+1}}" ng-model="piece.height" type="number" validator="required" no-validation-message="true">
										<span ng-if="shipment.unitSystem == 'Imperial'">Inch</span>
										<span ng-if="shipment.unitSystem == 'Metric'">CM</span>
										<label for="weight_{{$index+1}}">Weight</label>
										<input id="weight_{{$index+1}}" name="Weight_{{$index+1}}" ng-model="piece.weight" type="number" validator="required" no-validation-message="true">
										<span ng-if="shipment.unitSystem == 'Imperial'">LB</span>
										<span ng-if="shipment.unitSystem == 'Metric'">KG</span>
										<button ng-click="removePiece($index)" ng-disabled="!allowRemove" type="button">Remove</button>
									</div>
								</div>
							</ng-form>
							<button type="submit" ng-disabled="!myForm.$valid">Submit</button>
						</form>
					</div>
					<div class="col-md-5 col-md-offset-3">
						<aside data-spy="affix">
							<div class="contact-box">
								<h3>Contact Us</h3>
								<p class="cta-arrow"><i class="fa fa-phone"></i><a href="">1 (888) 594-4244</a></p>
							</div>
						</aside>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div>
		<p>The form is <span ng-if="myForm.$valid">complete</span><span ng-if="!myForm.$valid">incomplete</span></p>
	</div>

	<div ng-if="ajaxMessage">{{ajaxMessage}}</div>

<?php include 'footer.php';?>