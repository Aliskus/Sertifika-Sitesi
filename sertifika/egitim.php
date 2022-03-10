<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
@$id = (int)$_GET['id'];
$result = mysql_query('Select * from egitimler where durumu=1 and id='.$id);

$egitimvarmi = mysql_num_rows($result);
if(!$egitimvarmi) {
    echo '<p>Eğitim bulunamadı!</p>';
}else{
    $egitim = mysql_fetch_array($result);
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/sertifika/index.php">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/sertifika/egitimler.php">Eğitimler</a></li>
    <li class="breadcrumb-item active"><?php echo $egitim['egitim_adi'];?></li>
  </ol>
</nav>
<h2 class="mb-3">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
</svg> <?php echo $egitim['egitim_adi'];?>
</h2>
<div>
    <form class="needs-validation" novalidate="" method="POST">
        <div class="row">
            <div class="col-12">
                <div><?php echo $egitim['icerik'];?></div>
            </div>
        </div>
    </form>
</div>
<?php 
}
include './inc/sayfasonu.php';