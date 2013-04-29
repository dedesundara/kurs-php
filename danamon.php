<?php
function fungsiCurl($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     curl_setopt($data, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
$url = fungsiCurl('http://www.danamon.co.id/Home/AboutDanamon/Kurs/tabid/272/language/en-US/Default.aspx');
$pecah = explode('<table class="kurs" height="193" width="510" style="font-size: 11px">',$url);
$pecah2 = explode('</table>',$pecah[1]);
echo "<table border=1>";
print_r($pecah2[0]);
echo "</table>";
?>
