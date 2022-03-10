<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
if(!empty($_POST['eskisifre']) && !empty($_POST['yenisifre']) && !empty($_POST['yenisifretekrar']) && $_POST['yenisifre']==$_POST['yenisifretekrar']){
    $eskisifre = $_POST['eskisifre'];
    $yenisifre = $_POST['yenisifre'];
    $yenisifretekrar = $_POST['yenisifretekrar'];
    $kullanici = null;
    $result = mysql_query('Update kullanicilar set sifre="'.md5($yenisifre).'" where sifre="'.md5($eskisifre).'" && eposta="'.mysql_real_escape_string(eposta).'" ');
    if($result){
        $islem_basarili = 'Şifre değiştirildi';
    }else{
        $islem_basarisiz = 'Şifre değiştirilirken hata oluştu.'.mysql_error();
    }    
    
}
?>
<h2 class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-lock"
        viewBox="0 0 16 16">
        <path
            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
    </svg>Şifre Değiştir</h2>
<div>
    <?php if(isset($islem_basarili)){
        echo '<div class="alert alert-success" role="alert">'.$islem_basarili.'</div>';
      }else if(isset($islem_basarisiz)){
        echo '<div class="alert alert-danger" role="alert">
        Kayıt başarısız : '.$islem_basarisiz.'</div>';
      }
      ?>
    <form class="needs-validation col-6" novalidate="" method="POST">
        <div class="row g-3">
            <div class="col-12">
                <label for="eskisifre" class="form-label">Eski Şifre</label>
                <input type="password" name="eskisifre" class="form-control" id="eskisifre" placeholder="Eski Şifre"
                    required="">
                <div class="invalid-feedback">
                    Eski Şifre gerekli.
                </div>
            </div>
            <div class="col-12">
                <label for="yenisifre" class="form-label">Yeni Şifre</label>
                <input type="password" name="yenisifre" class="form-control" id="yenisifre" placeholder="Yeni Şifre"
                    required="">
                <div class="invalid-feedback">
                    Yeni Şifre gerekli.
                </div>
            </div>
            <div class="col-12">
                <label for="yenisifretekrar" class="form-label">Yeni Şifre Tekrar</label>
                <input type="password" name="yenisifretekrar" class="form-control" id="yenisifretekrar"
                    placeholder="Yeni Şifre Tekrar" required="">
                <div class="invalid-feedback">
                    Yeni Şifre Tekrarı gerekli.
                </div>
            </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary" type="submit">Şifreyi Değiştir</button>
    </form>
</div>
<?php 
include './inc/sayfasonu.php';