<?php
session_start(); // start the session
$sinif_sube_id = $_COOKIE['sinif_sube_id'];
$current_OgretmenId = $_SESSION['user_id'];
$connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
if($connection) {
    $sql_log = "SELECT brans FROM Ogretmen WHERE ogretmen_id = $current_OgretmenId";
    $result = mysqli_query($connection, $sql_log);
    while($row_log = mysqli_fetch_row($result)) {
        $ders_adi = $row_log[0];
    }
}
mkdir('homeworks/'.$sinif_sube_id.'/'.$ders_adi, 0777, true);
$target_dir = "homeworks/".$sinif_sube_id."/".$ders_adi."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script type='text/javascript'>alert('Üzgünüz dosya zaten var. Dosya yüklenemedi.');</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "<script type='text/javascript'>alert('Üzgünüz, dosya boyutunuz çok büyük. Dosya yüklenemedi.');</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "txt" && $imageFileType != "pdf"
&& $imageFileType != "doc" && $imageFileType != "docs" && $imageFileType != "docx" ) {
    echo "<script type='text/javascript'>alert('Üzgünüz, yalnızca JPG, JPEG, PNG, GIF, TXT PDF DOCS DOCX uzantılı dosyalar yükleyebilirsiniz.');</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $dosya_adi = basename( $_FILES["fileToUpload"]["name"]);
        echo "<script type='text/javascript'>alert('$dosya_adi isimli dosyanız başarıyla yüklendi.');</script>";
    } else {
      echo "<script type='text/javascript'>alert('Üzgünüz, dosya yüklenirken bir hata oluştu.');</script>";
    }
}
echo '<script>window.location.href = "teacher.php";</script>';
?>
