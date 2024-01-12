<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = new mysqli("localhost", "root", "", "kutuphane", 3306);

$statement = $connection->prepare("SELECT * FROM kullanıcı WHERE isim=? AND sifre=?");
$statement->bind_param("ss", $_POST["kullanici_adi"], $_POST["sifre"]);
$statement->execute();

$result = $statement->get_result();
$connection->close();

if ($result->num_rows != 0) {
    header("Location: anasayfa.php");
} else {
    echo "Kullanıcı adı veya şifre yanlış. Lütfen tekrar deneyin.";
    header("Refresh: 3; URL=index.php"); // Redirect to index.php after 3 seconds
}
?>
