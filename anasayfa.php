<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = new mysqli("localhost", "root", "", "kutuphane", 3306);

$result = $connection->query("SELECT * FROM dergiler LIMIT 4");
$dergiler = array();
while ($row = $result->fetch_assoc()) 
    array_push($dergiler, array(
        "deradi" => $row['deradi'],
        "ciltsayi" => $row['ciltsayi'],
        "tarih"=>$row['tarih'],
        "resim" => $row['resim']
    ));

$result = $connection->query("SELECT * FROM kitaplar LIMIT 4");
$books = array();
while ($row = $result->fetch_assoc()) {
    array_push($books, array(
        "yazadi" => $row['yazadi'],
        "kitadi" => $row['kitadi'],
        "resim" => $row['resim']
    ));
}

$result = $connection->query("SELECT * FROM yorumlar LIMIT 3");
$yorumlar = array();
while ($row = $result->fetch_assoc()) {
    array_push($yorumlar, array(
        "kullanici" => $row['kullanici'],
        "resim" => $row['resim'],
        "urun" => $row['urun'],
        "oy" => $row['oy'],
        "yorum" => $row['yorum']
    ));
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="login.php" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kütüphane Arşivi</title>
  </head>
  <body>
    <!--!header başlangıcı -->
   
    <header class= "header">  
        <a href="#" class="logo1">
            <img src="logo1.png" alt="logo1" />
        </a>
        <nav class="navbar">
            <a href="#ANASAYFA" class="active">ANASAYFA</a>
            <a href="kitap.php" >KİTAP</a>
            <a href="dergi.php">DERGİ</a>
            <a href="#GÖRÜŞ">GÖRÜŞ</a>
            <a href="#YORUMLAR">YORUMLAR</a>
            <a href="#İLETİŞİM">İLETİŞİM</a>
            <a href="#YAZARLAR">YAZARLAR</a>
        </nav>
        <div class="buttons" >
            <button id="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <button id="cart-btn">
                <i class="fa-solid fa-book"></i>
            </button>
            
            <button id="menu-btn"> 
                <i class="fa-solid fa-landmark"></i>
            </button>
               </div>
        <div class="search-form  ">
            <input type="text" 
            class="search-input"
            id="search-box" 
            placeholder="search here"
            />
            <i class="fas fa-search"></i>
            
        </div>

        <div class="cart-items-container ">
            <div class="cart-item">
                <i class="fas fa-times"></i>
                <img src="images/1.webp" alt="kitap"/>
                <div class="content">
                    <h3>Satranç</h3>
                    <div class="price">Kitap</div>
                </div>


            </div>
            <div class="cart-item">
                <i class="fas fa-times"></i>
                <img src="images/2.jpeg" alt="kitap"/>
                <div class="content">
                    <h3>Hayvan Çiftliği</h3>
                    <div class="price">Kitap</div>
                </div>


            </div>
            <div class="cart-item">
                <i class="fas fa-times"></i>
                <img src="images.dergi/1.webp" alt="dergi"/>
                <div class="content">
                    <h3>KafaOkur Dergisi</h3>
                    <div class="price">Dergi</div>
                </div>
                


            </div>
            <div class="cart-item">
                <i class="fas fa-times"></i>
                <img src="images/4.jpeg" alt="kitap"/>
                <div class="content">
                    <h3>Bilinmeyen Bir Kadının Mektubu</h3>
                    <div class="price">Kitap</div>
                </div>


            </div>
            <a href="#" class="btn">checkout now</a>
        </div>

    </header>
      <!--!header bitişke-->

     <!--!ANASAYFA başlangıç-->

    <section class="ANASAYFA" id="ANASAYFA">
    
        <div class="content"> <h3> KÜTÜPHANE ARŞİVİ</h3>
            <p>Kitapsız yaşamak kör sağır dilsiz yaşamaktır.</p>
            <p> Mustafa Kemal Atatürk</p>
        </div>
    </section>


       <!--ANASAYFA bitiş->

               <!--! KİTAP başlangıç-->
       <section class="KİTAP" id="KİTAP">

        <h1 class="heading">BÜTÜN <span>KİTAPLAR</span></h1>
        <div class="box-container">
        <?php
            foreach ($books as $key => $value) {
                echo '<div class="box">
                    <div class="box-head">
                        <img src="'.$value["resim"].'"
                        alt="KİTAP"/>
                        <span class="menu-category">KİTAP</span>
                        <h3>'.$value["kitadi"].'</h3>
                        <div class="price">'.$value["yazadi"].'</div>
                    </div>
                    <div class="box-bottom">
                        <a href="#" class="btn">VİEW</a>
                    </div>
                </div>';
            }
        ?>
        </div>
       </section>
        <!--! KİTAP bitiş--->
         <!--! DERGİ başlangıç--->
        <section class="DERGİ" id="DERGİ">
         

            <h1 class="heading">BÜTÜN <span>DERGİLER</span></h1>
            <div class="box-container">
            <?php
                foreach ($dergiler as $key => $value) {
                    echo '<div class="box">
                        <div class="box-head">
                            <span class="title">Dergi</span>
                            <h3>'.$value["deradi"].'</h3>
                        </div>
                        <div class="image">
                            <img src="'.$value["resim"].'" alt=""/>
                        </div>
                        <div class="box-bottom">
                            <div class="info">
                                <b class="price">'.$value["ciltsayi"].'. Cilt</b>
                                <span class="amount">'.$value["tarih"].'</span>
                            </div>
                            <div class="product-btn">
                                <a href="#">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    kitap
                    </div>';
                }
            ?>
            </div>
        </section>
    <!--! DERGİ bitiş--->


    <!--! GÖRÜŞ başlanıç--->
    <section class="GÖRÜŞ" id="GÖRÜŞ">
        <h1 class="heading">GÖRÜŞ</h1>
        <div class="row">
            <div class="image">
                <img src="images/görüş6.webp" alt="GÖRÜŞ">
            </div>
            <div class="content">
                <h3>Neden Kitap Okumalıyız?</h3>
                <p>Kitaplar, insanların dünyasını zenginleştirir ve hayal güçlerini canlandırır. Okuma alışkanlığı, bireyin bilgi dağarcığını genişletir ve yeni dünyalar keşfetmesine olanak tanır. Ayrıca, kitaplar aracılığıyla farklı perspektifleri anlama ve empati geliştirme şansı bulunur. Düzenli olarak kitap okumak, kelime dağarcığını artırır, dil becerilerini güçlendirir ve zeka kapasitesini arttırır. Kitaplar, insanları düşünmeye teşvik eder, analitik düşünce becerilerini geliştirir ve problem çözme yeteneklerini artırır.</p>
                <p>Okuma, öğrenmeye ve kişisel gelişime katkı sağlar. Her türlü konuda geniş bir bilgi yelpazesi sunan kitaplar, bireyin ilgi alanlarına uygun seçilebilir. Ayrıca, kitaplar yaşam deneyimlerini paylaşarak insanların kendilerini daha iyi anlamalarına yardımcı olur.</p>
                <p>Bu nedenlerle, kitap okuma alışkanlığını benimsemek, bireyin entelektüel ve duygusal gelişimine katkıda bulunur.</p>

            <a href="#" class="btn"> Daha Fazla Oku</a>

            </div>
        </div>
    </section>
    <!--! GÖRÜŞ bitiş--->


    <!--! YORUMLAR başlangıç--->
    <section class="YORUMLAR" id="YORUMLAR">
        <h1 class="heading"> OKUYUCU <span> YORUMLARI</span></h1>
        <div class="box-container">
            <?php
                foreach ($yorumlar as $key => $value) {
                    $yildizlar = "";
                    for ($i=0; $i < $value['oy']; $i++) { 
                        $yildizlar .= '<i class="fas fa-star"></i>'; 
                    }

                    echo '<div class="box">
                        <img src="kişi/yorum.png" alt="yorum">
                        <p>'.$value["yorum"].'</p>
                        <img src="'.$value["resim"].'" alt="okuyucu" class="user"/>
                        <h3>'.$value["kullanici"].'</h3>
                        <h3>'.$value["urun"].'</h3>
                        <div class="stars">'.$yildizlar.'</div>
                    </div>';
                }
            ?>
        </div>
    </section>
    <!--! YORUMLAR bitiş--->


     <!--! İLETİŞİM başlangıç--->
     <section class="İLETİŞİM" id="İLETİŞİM">
        <h1 class="heading">İLETİŞİM</h1>
     <div class="row">
       <form>
        <h3>Bizimle İletişime Geç</h3>
        <div class="inputBox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="İsim"/>
        </div>
        <div class="inputBox">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="e-mail"/>
        </div>
        <div class="inputBox">
            <i class="fas fa-phone"></i>
            <input type="number" placeholder="telefon"/>
        </div>
        <input type="submit" class="btn" value="contact">
       </form>
     </div>
     </section>
     <!--! İLETİŞİM bitiş--->


     <!--! YAZARLAR başlangıç--->
     <section class="YAZARLAR" id="YAZARLAR">

        <h1 class="heading">FAVORİ <span>YAZARLAR</span></h1>
        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="yazarlar/George_Orwell.jpeg" alt="George Orwell">
                </div>
             <div class="content">
                <a href="#" class="title">George Orwell</a>
                <span>doğum/25 Haziran 1903 ölüm/21 Ocak 1950 </span>
                <p>En çok, dünyaca ünlü Bin Dokuz Yüz Seksen Dört adlı romanı ve bu romanda yarattığı Big Brother (Büyük Birader) kavramı ile tanınır. Eserlerinde yer alan netlik, zeka, toplumsal adaletsizliğe karşı farkındalık ve totalitarizme karşı duruşu onun imzası niteliğindedir.</p>
            </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="yazarlar/John_Steinbeck.jpeg" alt="John Steinbeck">
                </div>
             <div class="content">
                <a href="#" class="title">John Steinbeck</a>
                <span>doğum/27 Şubat 1902 ölüm/20 Aralık 1968 </span>
                <p>Amerikalı gerçekçi yazardır. İrlanda asıllıdır. Eserlerinde genellikle işçi yaşamını ve toplumsal sorunları dile getirdi. Gençliğinde bir zamanlar çalıştığı Salinas Vadisi, onun eserleri için vazgeçilmez bir mekândır.</p>
             
            </div>

            </div>
            <div class="box">
                <div class="image">
                    <img src="yazarlar/Stefan-Zweig.webp" alt="Stefan Zweig">
                </div>
             <div class="content">
                <a href="#" class="title">Stefan Zweig</a>
                <span>doğum/28 Kasım 1881 ölüm/22 Şubat 1942  </span>
                <p>Avusturya-Macaristanlı roman, oyun, biyografi yazarı ve gazeteciydi. 1920'ler ile 1930'lar arasında edebiyat kariyerinin zirvesinde olmuş Zweig, dönemin dünyasının en çok tercüme edilen ve en popüler yazarlarından biriydi.</p>
             
            </div>

            </div>
        </div>


     </section>


     <!--! YAZARLAR bitiş--->

     <!--! FOOTER başlangıç-->

     <section class="footer">
        <div class="search">
            <input type="text" class="search-input" placeholder="search"/>
            <button class="btn bnt-primary">search</button>
        </div>
        <div class="share">
            <a href="#" class="fab fa-facebook"> </a>
            <a href="#" class="fab fa-twitter"> </a>
            <a href="#" class="fab fa-instagram"> </a>
            <a href="#" class="fab fa-linkedin"> </a>
            <a href="#" class="fab fa-github"> </a>
        </div>

        <div class="links">
            <a href="#ANASAYFA" class="active">ANASAYFA</a>
            <a href="kitap.php" >KİTAP</a>
            <a href="dergi.php">DERGİ</a>
            <a href="#GÖRÜŞ">GÖRÜŞ</a>
            <a href="#YORUMLAR">YORUMLAR</a>
            <a href="#İLETİŞİM">İLETİŞİM</a>
            <a href="#YAZARLAR">YAZARLAR</a>
        </div>
        <div class="credit">
            created by <span>Tuğçe Yaşar   |  Melike Bora  | Yaren Akarsu</span> |  all rigths reserved
        </div>


     </section>
     <!--! FOOTER bitiş--->

     <script src="js/script.js"></script>
     <script src="login.php"></script>
     



  </body>
</html>
