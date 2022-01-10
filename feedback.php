<?php include "dbconnect.php" ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fname = $_POST['fname'];
  $fExp = $_POST['fExp'];
  $sql = "INSERT INTO `feedback` (`Name`, `Experience`) VALUES ('$fname', '$fExp')";
  $result = mysqli_query($conn, $sql);
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Feedback</title>
</head>

<body>
  <?php include "nav.php" ?>
  <div class="con4">
    <div class="con41">
      <p class="fH1 fH">I'd love some feedback</p>
      <p class="fH2 fH">I'd would like your feedback to improve my website</p>
      <p class="fH3 fH">Please Rate Below</p>
      <div class="star-widget">
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="far fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="far fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="far fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="far fa-star"></label>
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="far fa-star"></label>
      </div>
      <form action="" method="POST" class="feedbackF">
        <div class="form-group">
          <label for="text" class="l1">Your name</label>
          <input type="text" class="form-control I1" id="fName" name="fname">
        </div>
        <div class="form-group">
          <label for="textarea" class="l1">Describe your experience</label>
          <textarea class="form-control I1" id="fExp" rows="3" name="fExp"></textarea>
        </div>
        <button type="submit" class="btn fBtn">Submit</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  
  <script>
    darkMode = localStorage.getItem('darkMode');
    document.querySelector('.middle').style.display = 'none';
    document.querySelector('.searchIcon').style.display = 'none';
    document.querySelector('.login').style.display = 'none';
    document.querySelector('.icon1').style.display = 'none';


    checkbox = document.getElementById('checkbox');
    checkbox.addEventListener('change', changeDarkMode);

    
    if (localStorage.getItem('darkMode') == 'true') {
      darkMode1();

    }

      function changeDarkMode() {
        if (checkbox.checked) {
          checkbox.checked = true;
      darkMode1();
        } 
        else {
          lightMode();
        }
      }

      function lightMode(){
        document.querySelector('.navbar1').classList.remove('navbarDark');
          document.querySelector('.icon1').classList.remove('icon1Dark');
            document.querySelector('.logo').classList.remove('logoDark');
          document.querySelector('.hamImg').classList.remove('hamImgDark');
          document.querySelector('.con4').classList.remove('con4Dark');
          document.querySelector('.con41').classList.remove('con41Dark');
          document.querySelector('.fH').classList.remove('fHDark');
          fH = document.querySelectorAll('.fH');
          for (i of fH) {
          i.classList.remove('fHDark');
          }
          far=document.querySelectorAll('.far')
          for(i of far){
           i.classList.remove('farDark');
          }
          l1=document.querySelectorAll('.l1');
          for(i of l1){
          i.classList.remove('l1Dark');
          }
          I1=document.querySelectorAll('.I1');
          for(i of I1){
          i.classList.remove('I1Dark');
          }
          localStorage.setItem('darkMode', 'false');
      }

      function darkMode1(){
        document.querySelector('.navbar1').classList.toggle('navbarDark');
          document.querySelector('.icon1').classList.toggle('icon1Dark');
         document.querySelector('.logo').classList.toggle('logoDark');
          document.querySelector('.hamImg').classList.toggle('hamImgDark');
          document.querySelector('.con4').classList.toggle('con4Dark');
          document.querySelector('.con41').classList.toggle('con41Dark');
          fH = document.querySelectorAll('.fH');
          for (i of fH) {
          i.classList.toggle('fHDark');
          }
          far=document.querySelectorAll('.far')
          for(i of far){
          i.classList.toggle('farDark');
          }
          l1=document.querySelectorAll('.l1');
          for(i of l1){
          i.classList.toggle('l1Dark');
          }
          localStorage.setItem('darkMode', 'true');
          I1=document.querySelectorAll('.I1');
          for(i of I1){
          i.classList.toggle('I1Dark');
          }
          localStorage.setItem('darkMode', 'true');
      }




  </script>
  <script src="https://kit.fontawesome.com/068cf27227.js" crossorigin="anonymous"></script>
</body>

</html>