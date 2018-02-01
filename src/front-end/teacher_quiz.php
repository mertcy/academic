<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="src/js/teacher_quiz.js"></script>

<div id="quiz"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#quiz-modal">Quizi Gönder</button></div>
<br></br>
<h5> Aşağıdan quizinizi oluşturup quizinizin 'Embed link'ini yukarıdaki 'Quizi Gönder' butonuna tıklayarak formun içindeki alana yapıştırınız. </h5>
<div id="quiz-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Quizi gönder</h3>
      </div>
      <div class="modal-body">
        <form class="submit" name="quiz">
          <strong>Sınıf</strong><br/>
          <input type="text" name="sinif" class="input" value="6">
          <br></br>
          <strong>Şube</strong><br/>
          <input type="text" name="sube" class="input" value="C">
          <br/><br/>
          <strong>Aşağıda oluşturduğunuz quizin linkini yapıştırın.</strong><br/>
          <textarea name="quizLink" class="input-xlarge">https://www.onlinequizcreator.com/fen-bilgisi-quizi/quiz-354378</textarea>
        </form>
      </div>
      <div class="modal-footer">
      <button class="btn btn-success" id="submit">Gönder</button>
      <a href="#" class="btn" data-dismiss="modal">Kapat</a>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $sinif = strip_tags($_POST['sinif']);
    $sube = strip_tags($_POST['sube']);
    $quizLink = strip_tags($_POST['quizLink']);
    echo "<strong>Name</strong>: ".$sinif."</br>";
    echo "<strong>Email</strong>: ".$sube."</br>";
    echo "<strong>Message</strong>: ".$quizLink."</br>";
    echo "<span class='label label-info'>Your quiz has been submitted with above details!</span>";
}
?>
<script type="text/javascript" async defer src="https://d134jvmqfdbkyi.cloudfront.net/script/embed.min.js"></script>
<br></br>
​<iframe width="950" height="450" src="https://www.onlinequizcreator.com/my-dashboard/my-quizzes/item3240" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
