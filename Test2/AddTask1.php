<?
$data = 'echo "Hello world";' ;
eval ($data);

echo "\n".'
$data = '."'".$data."'".' ; '."\n".' 
eval ($data);'."\n"
?>
