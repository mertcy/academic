<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="/src/css/template.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    </head>

<h2> Quiz yükleme alanı </h2>
<br></br>
<!-- Button to trigger modal -->
<div id="quiz">
  <button name="send_quiz_button" id="send_quiz_button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#quiz_modal">Quizi Gönder</button>
</div>
<br></br>
<h5> Aşağıdan quizinizi oluşturup quizinizin 'Embed link'ini yukarıdaki 'Quizi Gönder' butonuna tıklayarak formun içindeki alana yapıştırınız. </h5>

<!-- Modal -->
<div id="quiz_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quizi Gonder</h4>
      </div>
       <!-- Modal Body -->
      <div class="modal-body">
        <form method='post' id='send_quiz'>
          <label>Sınıf</label>
          <input type="passw" id="sinif_quiz" name="sinif_quiz" class="form-control" placeholder="6" />
          <br />
          <label>Şube</label>
          <input type="text" id="sube_quiz" name="sube_quiz" class="form-control" placeholder="C" />
          <br />
          <label>Aşağıda oluşturduğunuz quizin linkini yapıştırın.</label>
          <input type="text" id="quizlink" name="quizlink" class="form-control" placeholder="https://www.onlinequizcreator.com/fen-bilgisi-quizi/quiz-354378" />
          <br />
          <input type="submit" id="gonder" name="gonder" value="Gonder" class="btn btn-success" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>

<?php

?>


<script type="text/javascript" async defer src="https://d134jvmqfdbkyi.cloudfront.net/script/embed.min.js"></script>
<br></br>
​<iframe width="950" height="450" src="https://www.onlinequizcreator.com/my-dashboard/my-quizzes/item3240" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

</html>
