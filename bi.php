<?php
// file bi.php
function fungsiCurl($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
	 curl_setopt($data, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
$url = fungsiCurl('http://www.bi.go.id/web/id/Moneter/Kurs+Bank+Indonesia/Kurs+Transaksi/');
$pecah = explode('<td valign="top" align="center"><font size="-1" face="verdana,arial" ><b>Graph</b></font></td>', $url);
$pecah2 = explode ("<IMG SRC='/biweb/Resources/images/graph.gif' border=0 alt='Grafik Time Series'>",$pecah[1]);
echo "<table border='1'>";
print_r ($pecah2[21]);	
print_r ($pecah2[6]);	
echo "</table>";
 
?>
