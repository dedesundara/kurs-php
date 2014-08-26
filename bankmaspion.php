<?php 
/**
* Kurs Bank Bank di Indonesia
*
* @author tommy
* @copyright 2013 Tommy A. Surbakti tommy@surbakti.net
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library. If not, see <http://www.gnu.org/licenses/>.
*
*/
// isi bca.php
function fungsiCurl($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
         curl_setopt($data, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
$url = fungsiCurl('http://www.bankmaspion.co.id/Kurs.zul');
$pecah = explode('Bank Note', $url);
$pecah2 = explode ('<a href=',$pecah[1]);
$kambing = str_replace('</div>',' ',$pecah2);
$test = strip_tags($kambing[0]);
$pecah3 = explode("Last Update",$test);
preg_match_all('/<div id="(.*?)" style="display:none">(.*?)<\/div>/si', $pecah2[0], $output_array);
echo "<table border='1'>";
echo "<tr><td>Simbol</td><td>Mata Uang</td><td>BELI</td><td>JUAL</td></tr>";
echo "<tr>";
echo "<td>" . $output_array[2][5] . "</td>";
echo "<td>" . $output_array[2][6] . "</td>";
echo "<td>" . $output_array[2][7] . "</td>";
echo "<td>" . $output_array[2][8] . "</td>";
echo "</td>";
echo "</table>";
?>
