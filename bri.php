<?php
function fungsiCurl($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
	 //curl_setopt($data,	CURLOPT_AUTOREFERER, true);
     curl_setopt($data, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
$url = fungsiCurl('http://www.bri.co.id/bri_kurs.php');
$pecah = explode('<h1>KURS BRI</h1>', $url);
$pecah2 = explode ("<div id='rates-container'>",$pecah[1]);
echo "<br>---------------------------------------------------------------------<br>";
echo $pecah2[1];
echo "<br>---------------------------------------------------------------------<br>";
 
?>
