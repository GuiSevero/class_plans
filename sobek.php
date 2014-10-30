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
else{
    $texto = file_get_contents('basetext.txt');
}


if ($texto) {

    $ran = rand ();
    $arqIn =  $ran . ".txt";
    $fh = fopen('tmp/' . $arqIn, 'w') or die("can't open file");
    fwrite($fh, $texto); fclose($fh);

    $ret = exec('java -jar -Dfile.encoding=UTF-8 sobek.jar  ' . 'tmp/' . $arqIn, $result, $res);

    $tags = array_map(function($item){
        return array(
            'id'=>$item,
            'name'=>$item,
        );

    }, $result);

    echo json_encode($tags);

    unlink('tmp/'.$arqIn);
    
}    
?>

