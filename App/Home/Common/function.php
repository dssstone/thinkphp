<?php

	function show(){
		echo 'hello world';
	}
	function getNonceStr($num = 16){
    $arr = array(
      'a','b', 'c', 'd', 'e', 'f', 'g', 'h','i', 'j', 'k', 'l','m','n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D','E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O','P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z','0', '1', '2', '3', '4', '5', '6', '7', '8','9');
    $str = ' ';
    $max = count( $arr);
    for($i=0; $i<$num; $i++){
      $key = rand(0, $max-1);
      $str .= $arr[$key];
    }
    return $str;
  }

