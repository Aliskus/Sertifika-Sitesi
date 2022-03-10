<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
if(!empty($_POST['eposta']) && !empty($_POST['sifre'])){
    @$eposta = $_POST['eposta'];
    @$sifre = $_POST['sifre'];
    $kullanici = null;
    $result = mysql_query('Select * from kullanicilar where eposta="'.mysql_real_escape_string($eposta).'" and sifre="'.md5($sifre).'" ');
    if($result){
      $kullanici = mysql_fetch_assoc($result);
      if($kullanici){
          $_SESSION['giris'] = 'ok';
          $_SESSION['eposta'] = $eposta;
          $_SESSION['ad_soyad'] = $kullanici['ad_soyad'];
          $_SESSION['kullanici_id'] = $kullanici['id'];
          $islem_basarili = 'Giriş yapıldı.';
      }
    }    
    
}
?>
<h2 class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-door-open" viewBox="0 0 16 16">
                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                        <path
                            d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                    </svg> Giriş</h2>
<div>
      <?php if(isset($islem_basarili)){
        echo '<div class="alert alert-success" role="alert">
        Giriş başarılı. Anasayfaya yönlendiriliyorsunuz. <script>setTimeout(function() {
            window.location.href = "/sertifika/index.php";
          }, 1000);</script>
      </div>';
      }else if(isset($islem_basarisiz)){
        echo '<div class="alert alert-danger" role="alert">
        Giriş başarısız : '.$islem_basarisiz.'</div>';
      }
      ?>
    <form class="needs-validation col-6" novalidate="" method="POST">
        <div class="row g-3">
            <div class="col-12">
                <label for="eposta" class="form-label">E-posta</label>
                <input type="text" name="eposta" class="form-control" id="eposta" placeholder="E-posta"
                    required="">
                <div class="invalid-feedback">
                    E-posta gerekli.
                </div>
            </div>
            <div class="col-12">
                <label for="sifre" class="form-label">Şifre</label>
                <input type="password" name="sifre" class="form-control" id="sifre" placeholder="Şifre"
                    required="">
                <div class="invalid-feedback">
                    Şifre gerekli.
                </div>
            </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary" type="submit">Giriş Yap</button>
    </form>
</div>
<?php 
include './inc/sayfasonu.php';