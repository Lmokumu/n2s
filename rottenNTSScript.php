<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
//document.getElementById("demo").innerHTML = number;

$marylineBirthday = '06/28/1994';

function getNumberLength($number) {
    $inputNumber = $number;
    $integerDigit = strlen($inputNumber);
    $output = "Number length: ". $integerDigit;
    Echo '<p> '.$output.'</p>';
}

function update($number) {
    $bigNumArry = ['', ' thousand', ' million', ' billion', ' trillion', ' quadrillion', ' quintillion',' Sextillion',' Septillion',' Octillion',' Nonillion',' Decillion',' Undecillion',' Duodecillion',' Tredecillion',' Quattuordecillion',' Quindecillion',' Sexdecillion',' Septendecillion',' Octodecillion',' Novemdecillion',' Vigintillion',' Unvigintillion',' Duovigintillion',' Trevigintillion',' Quattuorvigintillion',' Quinvigintillion',' Sexvigintillion',' Septenvigintillion',' Octovigintillion',' Novemvigintillion',' Trigintillion',' Untrigintillion',' Duotrigintillion',' Googol',' Tretrigintillion',' Quattuortrigintillion',' Quintrigintillion',' Sextrigintillion',' Septentrigintillion',' Octotrigintillion'];

    $output = '';
    $numString = $number;
    $finlOutPut = [];

    if ($numString == '0') {
        return 'Zero';
    }

    if ($numString == 0) {
        return 'message tell to enter numbers';        
    }

    $i = strlen($numString);
    $i--;

    $astring='Maryline';

    //cut the number to grups of three digits and add them to the Arry
    while (strlen($numString) > 3) {
    $triDig = [];
        $triDig[2] = $numString[strlen($numString) - 1];
        $triDig[1] = $numString[strlen($numString) - 2];
        $triDig[0] = $numString[strlen($numString) - 3];
  
        $varToAdd = $triDig[0] . $triDig[1] . $triDig[2];
        //echo "<br>TriDigit: ".$varToAdd;        
        array_push($finlOutPut,$varToAdd);
        $i--;
        $numString = substr($numString, 0, strLen($numString) - 3);
    }
    
    array_push($finlOutPut,$numString);
    $finlOutPut = array_reverse($finlOutPut); 
    //print_r($finlOutPut);
    
    //conver each grup of three digits to english word
    //if all digits are zero the triConvert
    //function return the string "dontAddBigSufix"
    for ($j = 0; $j < count($finlOutPut); $j++) {
        $finlOutPut[$j] = triConvert(intval($finlOutPut[$j]));
    }
    print_r($finlOutPut);
    $jsonString = json_encode($finlOutPut);
    echo"<br><br>".$jsonString."<br><br>";
    
    $bigScalCntr = 0; //this int mark the million billion trillion... Arry

    for ($b = count($finlOutPut) - 1; $b >= 0; $b--) {
        if ($finlOutPut[$b] != "dontAddBigSufix") {
            $finlOutPut[$b] = $finlOutPut[$b] . $bigNumArry[$bigScalCntr] . '</br>';
            $bigScalCntr++;
        } else {
            //replace the string at finlOP[b] from "dontAddBigSufix" to empty String.
            $finlOutPut[$b] = ' ';
            $bigScalCntr++; //advance the counter
        }
    }
    //Echo "<br>With big num array<br>";
    //print_r($finlOutPut);
    
    //convert The output Arry to , more printable string
    for ($n = 0; $n < count($finlOutPut); $n++) {
        $output .= $finlOutPut[$n];
    }

    return $output; //print the output
}

//simple function to convert from numbers to words from 1 to 999
function triConvert($num) {
    $ones = ['', ' one', ' two', ' three', ' four', ' five', ' six', ' seven', ' eight', ' nine', ' ten', ' eleven', ' twelve', ' thirteen', ' fourteen', ' fifteen', ' sixteen', ' seventeen', ' eighteen', ' nineteen'];
    $tens = ['', '', ' twenty', ' thirty', ' forty', ' fifty', ' sixty', ' seventy', ' eighty', ' ninety'];
    $hundred = ' hundred';
    $output = '';
    $numString = $num.'';
    $num+=0;
    
    if ($num == 0) {
        return 'dontAddBigSufix';
    }
    //the case of 10, 11, 12 ,13, .... 19
    if ($num < 20) {
        $output = $ones[$num];
        return $output;
    }

    //123 and more
    if (strlen($numString) == 3) {
        $output = $ones[$numString[0]] . $hundred;
		$testLess20 = $numString[1].$numString[2];
                $testLess20+=0;
		if (intval($testLess20) < 20) {
			$output .= $ones[$testLess20];
	        return $output;
		} 
		
        $output .= $tens[$numString[1]];
	$output .= $ones[$numString[2]];
        return $output;
    }

    $output .= $tens[$numString[0]];
    $output .= $ones[$numString[1]];

    return $output;
}



$NumberToProcess = $_GET['number'];
if($NumberToProcess != '') {
     getNumberLength($NumberToProcess);
     echo "The Result:<br>". update($NumberToProcess);
}