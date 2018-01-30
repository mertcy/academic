<?php
$target_dir = "homeworks/";
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
    echo "Üzgünüz, dosya zaten var. ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Üzgünüz, dosya boyutunuz çok büyük. ";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "txt" && $imageFileType != "pdf"
&& $imageFileType != "doc" && $imageFileType != "docs" && $imageFileType != "docx" ) {
    echo "Üzgünüz, yalnızca JPG, JPEG, PNG, GIF, TXT PDF DOCS DOCX uzantılı dosyalar yükleyebilirsiniz. ";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Dosya yüklenemedi. ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo " ". basename( $_FILES["fileToUpload"]["name"]). "isimli dosyanız başarıyla yüklendi. ";
    } else {
        echo "Üzgünüz, dosya yüklenirken bir hata oluştu. ";
    }
}
?>
