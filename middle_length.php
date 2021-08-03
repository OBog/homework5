<?php
/*Функцией прочесть из файла все строки. Другой функцией померять длину каждой строки. 
Третьей функцией записать в совершенно другой файл только те строки, которые длиннее средней длины по файлу.*/

$stringLength=[];

function trimNextRow($string) {
    return trim($string, "\n\r");
}

function readFromFile($path) {
    $inputArray = file($path);
    return $inputArray;
}

function strLength($rowInputValues) {
    $lengthArray=[];
    $totalArrayCount=0;

    foreach ($rowInputValues as $textRow) {
        $inputCount = strlen(trimNextRow($textRow));
        $lengthArray[] = $inputCount;
        $totalArrayCount+=$inputCount;
    }
    $mediumStrLength = $totalArrayCount / count($rowInputValues);
    return array($lengthArray,$totalArrayCount,$mediumStrLength);
}

function writeToFile($path,$rowInputValue,$middle){
    $i=0;
    $file = fopen($path,'w');

        foreach ($rowInputValue as $textRow) {
            if (strlen(trimNextRow($textRow)) > $middle) {
                //echo $textRow . " " . strlen(trimNextRow($textRow)) . " > " . $middle . "\n";
                fwrite($file, $textRow);
            }
        }
    fclose($file);
}

$text = readFromFile('input_file.txt');
$stringLength = strLength($text);
$middle = $stringLength[2];


writeToFile ('output_file2.txt',$text,$middle);


