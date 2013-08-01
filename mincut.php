<?php
$filename='kargerMinCut.txt';
echo '<pre>';
$s = file_get_contents($filename);
$adj = explode("\n",$s);
//srand(0);
foreach ($adj as $key => &$val){
   $val = explode("\t",trim($val));
   $hash[array_shift($val)]=$val;
}
//print_r($hash);
while (count($hash)>2) {
  //pick random (u,v) from remaining
	$nodes = array_keys($hash);
	$u_pos = array_rand($nodes);
	$u = $nodes[$u_pos];
	$u = trim($u);
	$v_pos = array_rand($hash[$u]);
	$v = $hash[$u][$v_pos];
	$v = trim($v);
	
	
	//merge u and v
	$merge_u = $hash[$u];
	$merge_v = $hash[$v];
	
	$merge_u = array_merge($merge_u,$merge_v);
	foreach ($merge_u as $key=>&$value) {
		if (trim($value)==$u || trim($value)==$v) unset($merge_u[$key]);
	}
	$hash[$u]=$merge_u;
	unset($hash[$v]);
	
	//replace all cases of v by u in hash
	foreach ($hash as $node=>$list) {
		foreach ($list as $k=>$vl) {
			if (trim($vl)==trim($v)) {
				$hash[$node][$k]=$u;
			}
		}
	}

}
//Output the number of edges in first of two remaining nodes.

foreach ($hash as $key=>$value) {
	echo 'mincut='.count($value);
	break;
}
echo '</pre>';

?>
