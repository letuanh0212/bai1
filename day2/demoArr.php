<?php
$arr = [1,9,3,7,5,8]; 
$arr2 = array();

print_r( $arr);
echo"<br/>";
$arr[6]=6;
echo"<br/>";
print_r( $arr);
echo"<br/>";
$arr[]=15;
print_r( $arr);
echo"<br/>";
var_dump($arr);
echo"<br/>";
$arr3=['dong'=>'0941846092','tran'=>'01626532623'];
print_r($arr3);
echo"<br/>";
$arr3['viet']='085455262652';
print_r($arr3);

echo "<br/>demo sort<br/>";
print_r($arr);
sort($arr);
echo"<br/>";
print_r($arr);
echo"<br/>";

foreach($arr as $a)
{
    echo"$a<br/>";
}

echo"<br/>";

foreach($arr as $k=>$a){
    echo "arr[$k]=$a<br/>";
}
echo"<br/>";

//get key
$key=array_keys($arr3);
echo("<br/>");
print_r($key);
echo("<br/>");
$value=array_values($arr3);
echo("<br/>");
print_r($value);

echo("<br/>");
arsort($arr3);
echo("<br/>");
print_r($arr3);

echo("<br/>");
ksort($arr3);
print_r($arr3);
echo("<br/>");
