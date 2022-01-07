<?php include "dbconnect.php" ?>

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
<div class="con5">
  <div class="sHeading">
      <p class="sHeading1">Support Me</p>
  </div>

  <div class="sImage">
      <img src="SupportUsImg2.png" alt="img">
  </div>

  <div class="sContent col-9">
      <p class="sC1">I as a novice developer request you to support me by sharing this website to masses.
      Your support will boost my confidence and motivate me to make more amazing stuffs soon.</p>
      <p class="sC2">Do not forgot to rate this website at <span class="rateW"><a href="feedback.php">Feedback</a></span></p>
      <p class="sC3">You can also support me by following me at various social media platforms.</p>

      <div class="sFollow">
     <a href="https://github.com/vaishali0003"><img src="github.png" class="sFollowImg" alt="github"></a>
     <a href="https://www.linkedin.com/in/vaishali-dwivedi-b46774225/"><img src="linkedin.png" class="sFollowImg"  alt="linkedin"></a>
     <a href="https://www.instagram.com/vaishali0003/"><img src="instagram.png" class="sFollowImg" alt="instagram"></a>
     <a href="https://twitter.com/Vaishali00003"><img src="twitter.png" class="sFollowImg" alt="twitter"></a>
     <a href="https://www.facebook.com/vaishali.dwivedi.33"><img src="facebook.png" class="sFollowImg" alt="facebook"></a>
  </div>
  </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/068cf27227.js" crossorigin="anonymous"></script>

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
          document.querySelector('.hamImg').classList.remove('hamImgDark');
          document.querySelector('.con5').classList.remove('con5Dark');
          document.querySelector('.sContent').classList.remove('sContentDark');
      }

      function darkMode1(){
        document.querySelector('.navbar1').classList.toggle('navbarDark');
          document.querySelector('.icon1').classList.toggle('icon1Dark');
          document.querySelector('.hamImg').classList.toggle('hamImgDark');
          document.querySelector('.con5').classList.toggle('con5Dark');
          document.querySelector('.sContent').classList.toggle('sContentDark');
      }
  </script>

</body>

</html>