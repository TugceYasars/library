<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = new mysqli("localhost", "root", "", "kutuphane", 3306);

$result = $connection->query("SELECT * FROM kitaplar");
$books = array();
while ($row = $result->fetch_assoc()) {
    array_push($books, array(
        "yazadi" => $row['yazadi'],
        "kitadi" => $row['kitadi'],
        "resim" => $row['resim']
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>KİTAPLAR</title>
  </head>
  <body>
    <!--!header başlangıcı -->
   
    <header class= "header">  
        <a href="#" class="logo1">
            <img src="logo1.png" alt="logo1" />
        </a>
        <nav class="navbar">
            <a href="anasayfa.php" >ANASAYFA</a>
            <a href="#KİTAP" class="active" >KİTAP</a>
            <a href="dergi.php">DERGİ</a>
            <a href="anasayfa.php#GÖRÜŞ">GÖRÜŞ</a>
            <a href="anasayfa.php#YORUMLAR">YORUMLAR</a>
            <a href="anasayfa.php#İLETİŞİM">İLETİŞİM</a>
            <a href="anasayfa.php#YAZARLAR">YAZARLAR</a>
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
            <a href="anasayfa.php" >ANASAYFA</a>
            <a href="#KİTAP" class="active" >KİTAP</a>
            <a href="dergi.php">DERGİ</a>
            <a href="anasayfa.php#GÖRÜŞ">GÖRÜŞ</a>
            <a href="anasayfa.php#YORUMLAR">YORUMLAR</a>
            <a href="anasayfa.php#İLETİŞİM">İLETİŞİM</a>
            <a href="anasayfa.php#YAZARLAR">YAZARLAR</a>
        </div>
        <div class="credit">
            created by <span>Tuğçe Yaşar   |  Melike Bora  | Yaren Akarsu</span> |  all rigths reserved
        </div>


     </section>
     <!--! FOOTER bitiş--->

     <script src="js/script.js"></script>


  </body>
</html>
<?php
$connection->close();
?>