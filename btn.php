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
$url = fungsiCurl('http://www.btn.co.id/Layanan/Kurs-Valuta-Asing.aspx');
$pecah = explode('<strong><font color="#FFFFFF">KURS</font></strong></font></center></td><td width="70" bgColor="#005595"><center><font face="Verdana" color="#000000" size="1">',$url);
$pecah2 = explode('</table>',$pecah[1]);
echo '<table border=1><td  bgColor="#005595"><font color="#FFFFFF">KURS</font></td><td  bgColor="#005595"><font color="#FFFFFF">Jual</font></td>';
print_r($pecah2[0]);
echo "</table>";
?>
