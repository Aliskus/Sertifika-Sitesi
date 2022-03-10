<?php 
date_default_timezone_set('Europe/Istanbul');
ini_set('display_errors','on');
$varsayilan_sayfa = 'giris';
$baglanti = mysql_connect('localhost','test_sertifika','testSertifika2021!') or die('Veritabanı Sunucusuna Bağlanılamadı');
mysql_set_charset('utf8',$baglanti);
mysql_select_db('test_sertifikalar',$baglanti) or die('Veritabanına bağlanılamadı');
session_start();
@define('giris',$_SESSION['giris']);
@define('ad_soyad',$_SESSION['ad_soyad']);
@define('eposta',$_SESSION['eposta']);
@define('kullanici_id',$_SESSION['kullanici_id']);
@$sayfa = explode('.',basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']));
@$sayfa_adi = (empty($sayfa[0])?'index':$sayfa[0]);


function kisalt($metin, $uzunluk){
      $metin = substr($metin, 0, $uzunluk)."...";
      $metin_son = strrchr($metin, " ");
      if($uzunluk<$metin_son){
        $metin = str_replace($metin_son," ...", $metin);      
      }
      return $metin;
  }