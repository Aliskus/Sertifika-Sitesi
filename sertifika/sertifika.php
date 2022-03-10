<?php
include './inc/ayar.php';
header('Content-Type: application/pdf');
//header('Content-Type: image/jpeg');
@$id =  (int)$_GET['pid'];
$result = mysql_query('Select k.ad_soyad,ae.alindigi_tarih,e.egitim_adi from alinan_egitimler ae inner join kullanicilar k  on ae.kullanici_id=k.id inner join egitimler e on e.id=ae.egitim_id where ae.id='.$id.' and ae.durumu=1');
$kullanici = mysql_fetch_assoc($result);
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \mPDF();
$img = imagecreatefromjpeg(__DIR__.'/images/sertifika.jpg');
$y = 370; $angle = 0; $quality = 60;
$color = imagecolorallocate($img, 60, 60, 60);
$font = __DIR__.'/fonts/GothamNarrow-Medium.ttf';
$size = 26;
$tb = imagettfbbox($size, 0, $font, $kullanici['ad_soyad']);
$x = ceil((imagesx($img) - $tb[2]) / 2);
imagettftext($img, $size, $angle, $x, 370, $color, $font, $kullanici['ad_soyad']);

$size = 14;
$tb = imagettfbbox($size, 0, $font, date('d-m-Y',strtotime($kullanici['alindigi_tarih'])));
$x = ceil((imagesx($img) - $tb[2]) / 2);
imagettftext($img, $size, $angle, $x-106, 414, $color, $font, date('d-m-Y',strtotime($kullanici['alindigi_tarih'])));

$size = 20;
$tb = imagettfbbox($size, 0, $font,  $kullanici['egitim_adi']);
$x = ceil((imagesx($img) - $tb[2]) / 2);
imagettftext($img, $size, $angle, $x, 465, $color, $font, $kullanici['egitim_adi']);



imagejpeg($img, __DIR__.'/images/sertifika_.jpg', $quality);
//echo file_get_contents( __DIR__.'/images/sertifika_.jpg');
//exit;
$html='<img src="'.__DIR__.'/images/sertifika_.jpg" />';
$mpdf->WriteHTML($html);
$mpdf->Output('/tmp/sertifika_'.$id.'.pdf','F');
echo file_get_contents('/tmp/sertifika_'.$id.'.pdf');
/*
$image = file_get_contents(__DIR__ . '/images/sertifika.jpg');
$mpdf->WriteHTML($image);
$mpdf->Output();*/