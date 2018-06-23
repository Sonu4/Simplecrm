<?php
$mystring = "INDIA_MAHARASHTRA_KATOL"; 

$parts = explode("_",$mystring); 
//break the string up around the "/" character in $mystring 

$mystring = $parts['2']; 
//grab the first part 

echo $mystring;