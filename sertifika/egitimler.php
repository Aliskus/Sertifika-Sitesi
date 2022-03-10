<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
$ara = '';
if(isset($_POST['ara'])){
    $ara = $_POST['ara'];        

}
$egitimler = mysql_query('Select * from egitimler where durumu=1 '.(!empty($ara)?' and  egitim_adi like "%'.mysql_real_escape_string($ara).'%" or  icerik like "%'.mysql_real_escape_string($ara).'%" ':'').' order by id desc');
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/sertifika/index.php">Anasayfa</a></li>
    <li class="breadcrumb-item active">Eğitimler</li>
  </ol>
</nav>
<h2 class="mb-3">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
</svg> Eğitimler
</h2>
<div>
<div class="row">
            <div class="col-12">                
                <form class="needs-validation" novalidate="" method="POST">
                    <input type="text" name="ara" class="form-control" id="ara"
                        placeholder="Aramak için birşeyler yazın ve enter tuşuna basın." value="<?php echo @$ara;?>"
                        required="">
                    <div class="invalid-feedback">
                        Aranacak kelime giriniz
                    </div>
                </form>
            </div>
            <div class="col-12">                
                <?php while($egitim = mysql_fetch_array($egitimler)){
                    echo '<div class="card mt-3"><div class="card-header"><a class="text-black" href="/sertifika/egitim.php?id='.$egitim['id'].'">'.kisalt($egitim['egitim_adi'],60).'</a></div>
                    <div class="card-body">'.kisalt(strip_tags($egitim['icerik']),220).'</div>
                    </div>';
                }
                ?>
            </div>
        </div>
</div>
<?php 
include './inc/sayfasonu.php';