<?php
function getChars($char, $total, $symbol){
$chars = substr(strip_tags($char), 0 ,$total);
$char_array = explode(" ", $chars);
array_pop($char_array);
$new_char = implode(" ",$char_array) . $symbol;
return $new_char;
}
?>