<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
$ara = '';
if(isset($_POST['ara'])){
    $ara = $_POST['ara'];            
}
    $kullanicilar = mysql_query('Select * from kullanicilar where durumu=1 '.(!empty($ara)?' and ad_soyad like "%'.mysql_real_escape_string($ara).'%"':'').' order by ad_soyad asc');
    $kullanici_sayisi = mysql_num_rows($kullanicilar);
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/sertifika/index.php">Anasayfa</a></li>
    <li class="breadcrumb-item active">Profil Ara</li>
  </ol>
</nav>
<h2 class="mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search"
        viewBox="0 0 16 16">
        <path
            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
    </svg> Profil Ara
</h2>
<div>
    <form class="needs-validation" novalidate="" method="POST">
        <div class="row">
            <div class="col-12">
                <input type="text" name="ara" class="form-control" id="ara"
                    placeholder="Aramak için birşeyler yazın ve enter tuşuna basın." value="<?php echo @$ara;?>"
                    required="">
                <div class="invalid-feedback">
                    Aranacak kelime giriniz
                </div>
            </div>
            <div class="col-12 mt-3">
                <?php if($kullanici_sayisi==0){?>
                <div class="alert alert-warning" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg> Kayıt bulunamadı!
                </div>
                <?php }else{?>
                <div class="my-3 bg-body">
                    <h6 class="border-bottom pb-2 mb-0">Profiller</h6>
                    <?php 
                        while($kullanici = mysql_fetch_array($kullanicilar)){ 
                        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $kullanici['eposta'] ) ) ) . "?s=40";
                    ?>
                    <div class="d-flex text-muted pt-3">
                        <img src="<?php echo $grav_url;?>" class="me-2" />

                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark"><?php echo $kullanici['ad_soyad'];?></strong>
                                <a href="/sertifika/profil.php?pid=<?php echo $kullanici['id'];?>">Profili Gör</a>
                            </div>
                            <span class="d-block"><?php echo date('d-m-Y',strtotime($kullanici['katilma_tarihi']));?></span>
                        </div>
                    </div>
                    <?php  } ?>
                    <small class="d-none text-end mt-3 ">
                        <a href="#">Daha Fazla</a>
                    </small>
                </div>
                <?php } ?>
            </div>
        </div>
    </form>
</div>
<?php 
include './inc/sayfasonu.php';