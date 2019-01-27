<?php
//Aayush Ghimire
//Zainab Al Tarouti
$array = ["one","two","three"];
$index = $_GET["index"];
//echo $index;
if ($index >= 3)
    echo json_encode("Out of range");
else 
    echo json_encode($array[$index]);

?>