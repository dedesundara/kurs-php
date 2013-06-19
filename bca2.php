<?php
  $url = 'http://www.bca.co.id';
 

function fungsiCurl($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     curl_setopt($data, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
    
$isi = fungsiCurl('http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp');

  echo (libxml_use_internal_errors(true));
  $dom = new DOMDocument;
  $dom->loadHTML( $isi );
  $rows = array();
  foreach( $dom->getElementsByTagName( 'tr' ) as $tr ) {
    $cells = array();
    foreach( $tr->getElementsByTagName( 'td' ) as $td ) {
      $cells[] = $td->nodeValue;
    }
    $rows[] = $cells;
  }
  echo "1$ = " . $rows[3][1];
?>
