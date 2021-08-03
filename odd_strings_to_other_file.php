<?php

/*Написать программу, которая открывает файл, считывает оттуда данные, закрывает файл, создает другой файл, записывает туда данные через строку 
(первую пишет, вторую нет, третью пишет, четвертую нет и т.д.), закрывает файл. Имена файлов написать в комментариях в коде программы. 
Действия оформить в две функции: одна для прочтения, другая для записи. Параметром обеих функций долен быть путь к файлу.*/

function readFromFile($path){
    $file_array = file($path);
return $file_array;
}

function writeToFile($path,$file_array){
    $i=0;
    $file = fopen($path,'w');
    while ($i < count($file_array)){
        //echo $file_array[$i] ."\n";
        fwrite($file, $file_array[$i]);
        fwrite($file, "\r\n");
        $i+=2;
    }
fclose($file);
}

$text = readFromFile('input_file.txt');
writeToFile('output_file.txt',$text);

