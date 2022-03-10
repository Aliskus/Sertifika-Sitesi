<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
if(!empty($_POST['ad_soyad']) && !empty($_POST['eposta']) && !empty($_POST['sifre'])){
    $ad_soyad = $_POST['ad_soyad'];
    $eposta = $_POST['eposta'];
    $sifre = md5($_POST['sifre']);
    $kullanici = null;
    $result = mysql_query('insert into kullanicilar(ad_soyad,eposta,sifre,katilma_tarihi) values("'.mysql_real_escape_string($ad_soyad).'","'.mysql_real_escape_string($eposta).'","'.$sifre.'",now()) ');    
    if($result){
        $kullanici = null;
        $result = mysql_query('Select * from kullanicilar where eposta="'.mysql_real_escape_string($eposta).'" and sifre="'.$sifre.'" ');
        if($result){
            $kullanici = mysql_fetch_assoc($result);
            if($kullanici){
                $_SESSION['giris'] = 'ok';
                $_SESSION['eposta'] = $eposta;
                $_SESSION['ad_soyad'] = $kullanici['ad_soyad'];
                $_SESSION['kullanici_id'] = $kullanici['id'];
                $islem_basarili = 'Kayıt oluşturuldu.';
            }
        }  
    } else{
        $islem_basarisiz = 'Bilgileri kontrol ediniz.'.mysql_error();
        if(strpos(mysql_error(),'Duplicate')!==false){
            $islem_basarisiz = 'Kayıt daha önce oluşturulmuş.';
        }
        
    }   
    
}
?>
<h2 class="mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-plus"
        viewBox="0 0 16 16">
        <path
            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
        <path fill-rule="evenodd"
            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
    </svg> Kayıt Ol
</h2>
<div>
        <?php if(isset($islem_basarili)){
        echo '<div class="alert alert-success" role="alert">
        Kayıt başarılı. Anasayfaya yönlendiriliyorsunuz. <script>setTimeout(function() {
            window.location.href = "/sertifika/index.php";
          }, 1000);</script>
      </div>';
      }else if(isset($islem_basarisiz)){
        echo '<div class="alert alert-danger" role="alert">
        Kayıt başarısız : '.$islem_basarisiz.'</div>';
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
                    value="<?php echo eposta;?>" required="">
            </div>
            <div class="col-12">
                <label for="eposta" class="form-label">Şifre</label>
                <input type="password" name="sifre" class="form-control" id="sifre" required="">
            </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary" type="submit">Kayıt Ol</button>
    </form>
</div>
<?php 
include './inc/sayfasonu.php';