<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>About</title>
</head>

<body>
<?php include "nav.php" ?>

<div class="con3">
    <div class="aHeading">About Me</div>
    <div class="myImg">
        <img src="me.jpeg" id="myImg" alt="" srcset="">
    </div>
    <div class="aContent col-9">
        <p class="aContent1">My name is Vaishali Dwivedi and I'm a full stack Web Developer. I'm currently persuing Bachelor of Technology in Electronics and Communication Engineering (third year) from Indira Gandhi Engineering College (Sagar,Madhya Pradesh) and own a CGPA of 8.15. I am adequate in the prominent skills like HTML,CSS,JAVASCRIPT,PHP,BOOTSTRAP,C,C++,web hosting etc. I am both driven and self motivated,and I am contantly experimenting with new technologies. I am very passionate about Web Development and strive to better myself as a web developer.
        </p>
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
      checkbox.checked = true;
      darkMode1();
    }

    function changeDarkMode() {
        if (checkbox.checked) {
         darkMode1();
        }
        else {
          lightMode();
      }
    }

function lightMode(){
  document.querySelector('.navbar1').classList.remove('navbarDark');
          document.querySelector('.hamImg').classList.remove('hamImgDark');
          document.querySelector('.con3').classList.remove('con3Dark');
          document.querySelector('.aContent1').classList.remove('aContent1Dark');
          localStorage.setItem('darkMode', 'false');
}

function darkMode1(){
  checkbox.checked = true;
          document.querySelector('.navbar1').classList.toggle('navbarDark');
          document.querySelector('.hamImg').classList.toggle('hamImgDark');
          document.querySelector('.con3').classList.toggle('con3Dark');
          document.querySelector('.aContent1').classList.toggle('aContent1Dark');
          localStorage.setItem('darkMode', 'true');
}

</script>
</body>

</html>