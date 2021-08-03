<?php
/*Пользуясь имеющимися наработками написать функцию, которая из исходных данных одной строки получает результаты fizzbuzz.
Другая функция должна прочесть из файла множество строк вида "3 5 18", т.е. исходных данных для fizzbuzz,
и записать в другой файл полученные при помощи первой функции результаты по каждой строке.
 */

function fizzBuzzCalc($inputArray,$outputFile){
    $i = 1;

    while ($i <= $inputArray[2]) {
        if (($i % $inputArray[0] == 0) && ($i % $inputArray[1]) == 0) {
            fwrite($outputFile, 'FB ');
        } elseif ($i % $inputArray[0] == 0) {
            fwrite($outputFile, 'F ');
        } elseif ($i % $inputArray[1] == 0) {
            fwrite($outputFile, 'B ');
        } else {
            fwrite($outputFile, $i." ");
        }
        $i++;
    }
    fwrite($outputFile, "\r\n");

}

function readWriteFile($inputPath,$outputPath) {
    $inputArray = file($inputPath);
    $file = fopen($outputPath,'w');

    foreach ($inputArray as $textRow) {
        $rowInputValues = (explode(' ', $textRow));
        fizzBuzzCalc($rowInputValues,$file);
    }
    fclose($file);
}

readWriteFile('fizzbuzzInput.txt','fizzbuzzOutput.txt');

