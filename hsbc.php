<?php
/**
* Kurs Bank Bank di Indonesia
*
* @author tommy
* @copyright 2018 Tommy A. Surbakti tommy@surbakti.net
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
// isi hsbc.php

include_once 'simple_html_dom.php';

function ambilURL($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $hasil = curl_exec($curl);
    $curl_error = curl_error($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return $hasil;
}

$urlBank = ambilURL('https://www.hsbc.co.id/1/2/id/personal/foreign-exchange/real-time-fx-rates');
$html = str_get_html($urlBank);

$pecahAwal = explode('var FXRATES =', $html);
$pecahAkhir = explode(';', $pecahAwal[1]);

preg_match_all("/\[([^\]]*)\]/", $pecahAkhir[0], $output_array);

$data = $output_array[1];
$kurs = array();
foreach ($data as $key => $value) {
    $pecah = explode(',', $value);
    $kurs[] = preg_replace("/[^A-Za-z0-9]/", '', $pecah);
}
var_dump($kurs);