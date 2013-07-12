<?php
$s = file_get_contents("IntegerArray.txt");
$arr = explode("\n",$s);
echo 'array length ='.count($arr)."\n";

$c = 0;
merge($arr);
echo "number of inversions is ".$c."\n";

function merge($arr) {

	global $c;

	if (count($arr)==1) {
		return $arr;
	}

	$m = floor(count($arr)/2);

	$arr1 = merge(array_slice($arr,0,$m));
	$arr2 = merge(array_slice($arr,$m,count($arr)));
	
	$i = 0;
	$j = 0;
	$res = array();

	for ($k = 0; $k < count($arr); ++$k) {
		if ($i<count($arr1) && ($j==count($arr2) || (int)$arr1[$i]<=(int)$arr2[$j] )) {
			$res[]=$arr1[$i]; 
			$i++;
		} else {
			$res[]=$arr2[$j];
			$j++;
			if ($i<count($arr1)) {
				$c+=count($arr1)-$i;
			}
		}
	}
	return $res;
}


?>