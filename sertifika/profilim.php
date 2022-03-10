<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
if(!empty($_POST['ad_soyad'])){
    $ad_soyad = $_POST['ad_soyad'];
    $kullanici = null;
    $result = mysql_query('Update kullanicilar set ad_soyad="'.mysql_real_escape_string($ad_soyad).'" where eposta="'.mysql_real_escape_string(eposta).'" ');
    if($result){
        $result2 = mysql_query('Select * from kullanicilar where eposta="'.mysql_real_escape_string(eposta).'"');
      $kullanici = mysql_fetch_assoc($result2);
      if($result){
          $_SESSION['ad_soyad'] = $kullanici['ad_soyad'];
          $islem_basarili = 'Profil güncellendi.';
      }
    }  else{
        $islem_basarisiz = 'Profil güncellenirken hata oluştu';
    }  
    
}
?>
<h2 class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
        class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
        <path fill-rule="evenodd"
            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
    </svg> Profil</h2>
<div>
    <?php if(isset($islem_basarili)){
        echo '<div class="alert alert-success" role="alert">'.$islem_basarili.'</div>';
      }else if(isset($islem_basarisiz)){
        echo '<div class="alert alert-danger" role="alert">
        İşlem başarısız : '.$islem_basarisiz.'</div>';
      }
      ?>
    <form class="needs-validation col-6" novalidate="" method="POST">
        <div class="row g-3">
            <div class="col-12">
                <label for="ad_soyad" class="form-label">Ad Soyad</label>
                <input type="text" name="ad_soyad" class="form-control" id="ad_soyad" placeholder=""
                    value="<?php echo ad_soyad;?>" required="">
                <div class="invalid-feedback">
                    Ad soyad gerekli.
                </div>
            </div>
            <div class="col-12">
                <label for="eposta" class="form-label">E-posta</label>
                <input type="text" name="eposta" class="form-control" id="eposta" placeholder=""
                    value="<?php echo eposta;?>" required="" disabled="">
            </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary" type="submit">Profili Güncelle</button>
        <a class="w-100 btn btn-link" href="/sertifika/sifredegistir.php"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path
                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
            </svg> Şifre Değiştir</a>
    </form>
</div>
<?php 
include './inc/sayfasonu.php';