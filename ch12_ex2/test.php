<?php

session_start();
$array=array();
array_push($array, "aaaa");
array_push($array, "vvv");
array_push($array, "xx");
array_push($array, "sss");
$_SESSION["a"]=$array;
array_push($_SESSION["a"], "bbbbbb");
array_push($_SESSION["a"], "hhhhhh");
// $a=$_SESSION["a"];
$x="aaccaa";
if(array_search($x, $_SESSION["a"])=="") echo "eoooo";
echo array_search($x, $_SESSION["a"])."ccc      ";
unset($_SESSION["a"][array_search($x, $_SESSION["a"])]);


foreach($_SESSION["a"] as $a){
    echo $a;
}

?>