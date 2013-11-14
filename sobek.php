<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$locale = 'pt_BR';
putenv('LC_ALL='.$locale);
$texto = false;
if(isset($_POST['texto']))
    $texto =  $_POST["texto"];

if ($texto) {

    $ran = rand ();
    $arqIn =  $ran . ".txt";
    $fh = fopen('tmp/' . $arqIn, 'w') or die("can't open file");
    fwrite($fh, $texto); fclose($fh);

    $ret = exec('java -jar sobek.jar ' . 'tmp/' . $arqIn, $result, $res); 
	echo implode($result, ' ');
    unlink('tmp/'.$arqIn);
  //  unlink('tmp/'.$ran.'_Result.txt');
    
}    
?>

