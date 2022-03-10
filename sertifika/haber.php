<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
@$id = (int)$_GET['id'];
$result = mysql_query('Select * from haberler where durumu=1 and id='.$id);

$habervarmi = mysql_num_rows($result);
if(!$habervarmi) {
    echo '<p>Haber bulunamadı!</p>';
}else{
    $haber = mysql_fetch_array($result);
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/sertifika/index.php">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/sertifika/haberler.php">Haberler</a></li>
    <li class="breadcrumb-item active"><?php echo $haber['baslik'];?></li>
  </ol>
</nav>
<h2 class="mb-3">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
  <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
</svg> <?php echo $haber['baslik'];?>
</h2>
<div>
    <form class="needs-validation" novalidate="" method="POST">
        <div class="row">
            <div class="col-12">
                <div><?php echo $haber['icerik'];?></div>
                <div><?php echo $haber['etiketler'];?></div>
            </div>
        </div>
    </form>
</div>
<?php 
}
include './inc/sayfasonu.php';