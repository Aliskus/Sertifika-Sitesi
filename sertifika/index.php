<?php 
include './inc/ayar.php';
include './inc/sayfabasi.php';
$haberler = mysql_query('Select * from haberler where durumu=1 order by eklendigi_tarih desc limit 5');

$egitimler = mysql_query('Select * from egitimler where durumu=1 order by id desc limit 5');

?>
<h2 class="mb-3">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg> Anasayfa
</h2>
<div>
    <form class="needs-validation" novalidate="" method="POST">
        <div class="row">
                <div class="col-6">
                    <a href="/sertifika/haberler.php"
                        class="w-100 btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
  <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
</svg> Haberler</a>
                    <div>
                        <ul>
                            <?php while($haber = mysql_fetch_array($haberler)){
                                echo '<li class="py-2"><a class="text-black" href="/sertifika/haber.php?id='.$haber['id'].'">'.kisalt($haber['baslik'],60).'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <a href="/sertifika/egitimler.php" class="w-100 btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
</svg> Eğitimler</a>
                    <div>
                        <ul>
                            <?php while($egitim = mysql_fetch_array($egitimler)){
                                echo '<li class="py-2"><a class="text-black" href="/sertifika/egitim.php?id='.$egitim['id'].'">'.kisalt($egitim['egitim_adi'],60).'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
        </div>
    </form>
</div>
</div>
<?php 
include './inc/sayfasonu.php';