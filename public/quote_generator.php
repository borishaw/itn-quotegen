<?php

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

//Assume all shipments are not quotable first
$quotable = false;

var_dump($_POST);