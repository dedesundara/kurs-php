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
$url = fungsiCurl('http://www.bankmayapada.com/index.php?page=product&t=kurs');
$pecah = explode('<table width="300" cellpadding="0" cellspacing="1">',$url);
$pecah2 = explode('</table></td></tr></table>',$pecah[1]);
print_r ($pecah2);	
 
?>
