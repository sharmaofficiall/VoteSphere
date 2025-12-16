<<<<<<< HEAD
<?php

function slugify($string){
$preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
	$pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
	$string = preg_replace($pattern, '', $string);
$string = preg_replace('~[^\\pL\d]+~u', '-', $string);
$string = trim($string, '-');
$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
$string = strtolower($string);
$string = preg_replace('~[^-\w]+~', '', $string);

return $string;

}

=======
<?php

function slugify($string){
$preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
	$pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
	$string = preg_replace($pattern, '', $string);
$string = preg_replace('~[^\\pL\d]+~u', '-', $string);
$string = trim($string, '-');
$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
$string = strtolower($string);
$string = preg_replace('~[^-\w]+~', '', $string);

return $string;

}

>>>>>>> a501458a9de087d18a6c7d4b5e9084254723be6e
?>