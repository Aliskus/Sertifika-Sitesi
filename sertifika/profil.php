<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
if(!empty($_GET['pid'])){
    $pid = (int)$_GET['pid'];
    $result = mysql_query('Select * from kullanicilar where id='.$pid.' and durumu=1');
    $kullanici = mysql_fetch_assoc($result); 

    $egitimler = mysql_query('Select ae.*,e.egitim_adi from alinan_egitimler ae inner join egitimler e on e.id=ae.egitim_id where ae.kullanici_id='.$pid.' and ae.durumu=1');    

}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/sertifika/index.php">Anasayfa</a></li>
    <li class="breadcrumb-item active">Profil</li>
  </ol>
</nav>
<h2 class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
        class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
        <path fill-rule="evenodd"
            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
    </svg> Profil</h2>
<div>
    
    
        <div class="row g-3">
            <div class="col-12">
                <?php 
                $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $kullanici['eposta'] ) ) ) . "?s=40";
                echo '<img src="'.$grav_url.'" class="rounded me-2" />';
                echo '<span class="h6">'.$kullanici['ad_soyad'].'</span>';
                ?>
            </div>
            <div class="col-12">Katılma Tarihi : <?php echo date('d-m-Y',strtotime($kullanici['katilma_tarihi']));?></div>
        </div>

        <div class="my-4 bg-body">
            <h6 class="border-bottom pb-2 mb-0">Sertifikalar</h6>
            <?php 
                while($egitim = mysql_fetch_array($egitimler)){ 
            ?>
            <div class="d-flex text-muted pt-3">
                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award me-2" viewBox="0 0 16 16">
  <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
  <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
</svg><?php echo $egitim['egitim_adi'];?></strong>
                        <?php if($egitim['kullanici_id']==kullanici_id){?>
                            <a class="btn-link" href="/sertifika/sertifika.php?pid=<?php echo $egitim['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>Sertifikayı Gör</a>
                        <?php } ?>
                    </div>
                    <span class="d-block my-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3 me-2" viewBox="0 0 16 16">
  <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
  <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg><?php echo date('d-m-Y',strtotime($egitim['alindigi_tarih']));?></span>
                </div>
            </div>
            <?php  } ?>
            <small class="d-none text-end mt-3">
                <a href="#">Daha Fazla</a>
            </small>
        </div>
</div>
<?php 
include './inc/sayfasonu.php';