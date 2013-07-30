<?php

class QuickSort {
  static $A;
  static $m=0;
  static $pivot=0;
  static function swap ($i,$j)
  {
    $t = self::$A[$i];
  	self::$A[$i]=self::$A[$j];
  	self::$A[$j]=$t;
  }
  static function choosePivotFirst($l,$r)
  {
  	return $l;
  }
  static function choosePivotLast($l,$r)
  {
  	return $r;
  }
  static function choosePivotMedian($l,$r)
  {
  	$p1 = $l;
  	$p2 = $r;
  	$p3 = floor(($l+$r)/2);
  	$a1 = self::$A[$p1];
  	$a2 = self::$A[$p2];
  	$a3 = self::$A[$p3];
  	$test = array($a1,$a2,$a3);
  	sort($test);
  	if ($a1==$test[1]) return $p1;
  	if ($a2==$test[1]) return $p2;
  	if ($a3==$test[1]) return $p3;
  	
  }
  static function choosePivot($l, $r)
  {
  	if (self::$pivot==0)
  		$pos = self::choosePivotFirst($l,$r);
  	elseif (self::$pivot==1)
  		$pos = self::choosePivotLast($l,$r);
  	elseif (self::$pivot==2)
  		$pos = self::choosePivotMedian($l,$r);
  	if ($pos!=$l) self::swap ($l,$pos);
  	return self::$A[$l];
  }

  static function  partition($l, $r) {
  	$p = self::choosePivot($l, $r);
  	$i = $l+1;
  	for ($j=$l+1; $j <=$r; ++$j)
  	{
  		if (self::$A[$j]<$p) {
  			self::swap($i, $j);
  			$i++;
  		}
  	}
  	$i = $i-1;
  	self::swap($l, $i);
  	return $i;
  }

  static function qsort($l,$r) {
  	self::$m += ($r-$l);
  	if ($r==$l) return;
  	$piv_pos = self::partition($l, $r);
  	if ($piv_pos>$l)
  		self::qsort($l, $piv_pos-1);
  	if ($piv_pos<$r)
  		self::qsort($piv_pos+1, $r);
  }
  static function run_file($filename,$pivot) {
  	$s = file_get_contents($filename);
  	self::$A = explode("\n",$s);
  	foreach (self::$A as $key => &$val){
  		$val = (int)$val;
  	}
  	self::$pivot = $pivot;
  	self::$m = 0;
    echo '<pre>';
  	self::qsort(0,count(self::$A)-1);
  	echo 'For file:'.$filename.' and pivot '.$pivot.' m=';
  	echo self::$m."\n";
    echo '</pre>';
  }
  static function run() {
  	//self::$A = array(3,8,2,5,1,4,7,6);
  	//self::$A = array(3,9,8,4,6,10,2,5,7,1);
  	self::run_file("10.txt",0);
  	self::run_file("10.txt",1);
  	self::run_file("10.txt",2);
  	self::run_file("100.txt",0);
  	self::run_file("100.txt",1);
  	self::run_file("100.txt",2);
  	self::run_file("1000.txt",0);
  	self::run_file("1000.txt",1);
  	self::run_file("1000.txt",2);
  	self::run_file("QuickSort.txt",0);
  	self::run_file("QuickSort.txt",1);
  	self::run_file("QuickSort.txt",2);
  }
}
QuickSort::run();


?>
