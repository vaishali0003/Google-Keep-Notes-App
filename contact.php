<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Contact us</title>
</head>

<body>
<?php include "nav.php" ?>
  <div class="con2">
    <div class="cSec1">
      <div class="cHeading">
        <b><p class="cHeading1">I'd love to hear from you</p></b>
      </div>
      <div class="cContent">
        <p class="cText">Whether you have a question about features,trials,pricing,need a demo or anything else ,our team is ready to answer all your questions.Ask me questions using the form below and I ll be in touch with you soon.You can also use my email,contact number and get your queries cleared.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 cSec2left">
        <ul class="cInfo">
          <li class="cItem">
            <div class="cicon">
              <img src="location (1).png" alt="">
            </div>
            <p class="cI1">
              Deen Dayal Nagar,Makronia<br>
              Sagar,Madhya Pradesh
              470001
            </p>
          </li>
          <hr class="hLine">
          <li class="cItem">
            <div class="cicon">
              <img src="phone-call.png" alt="">
            </div>
            <p class="cI1">
              +123-456-789<br>
              +111-222-333
            </p>
          </li>
          <hr class="hLine">
          <li class="cItem">
            <div class="cicon">
              <img src="email.png" alt="">
            </div>
            <p class="cI1">
              vaishalidwivedi03@gmail.com <br>
              vaishalidwivedi0003@gmail.com
            </p>
          </li>
          <hr class="hLine">
          <div class="followSection">
            <p class="follow">Follow me on</p>
            <ul class="fList">
              <li class="followItem">
                <div class="followImg">
                  <a href="https://www.instagram.com/vaishali0003/"><img src="instagram.png" alt="instagram"></a>
                </div>
              </li>
              <li class="followItem">
              <div class="followImg">
                  <a href="https://www.linkedin.com/in/vaishali-dwivedi-b46774225/"><img src="linkedin.png" alt=""></a>
                  </div>
              </li>
              <li class="followItem">
              <div class="followImg">
                  <a href="https://github.com/vaishali0003"><img src="github.png" alt=""></a>
                  </div>
              </li>
              <li class="followItem">
              <div class="followImg">
                  <a href="https://twitter.com/Vaishali00003"><img src="twitter.png" alt=""></a>
                  </div>
              </li>
              <li class="followItem">
              <div class="followImg">
                  <a href="https://www.facebook.com/vaishali.dwivedi.33"><img src="facebook.png" alt=""></a>
                  </div>
              </li>
            </ul>
            </div>
        </ul>
      </div>
      <div class="col-sm-6 cSec2right">
        <b><p class="qMsg">Ask a Question?</p></b>
      <form>
          <div class="form-group col-md-11">
            <label for="name" class="cInput1">Full name</label>
            <input type="text" class="form-control" id="cUname" aria-describedby="textHelp">
          </div>
          <div class="form-group col-md-11">
            <label for="email" class="cInput1">Email</label>
            <input type="email" class="form-control" id="cUemail">
          </div>
          <div class="form-group col-md-11">
            <label for="textarea" class="cInput1">Your Question</label>
            <textarea class="form-control" id="cUmessage" rows="3"></textarea>
          </div>
          <div class="form-group col-md-11">
          <button type="submit" class="btn btn-primary cBtn cInput1">Submit</button>
          </div>
        </form>
      </div>
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
          document.querySelector('.hamImg').classList.remove('hamImgDark');
          document.querySelector('.con2').classList.remove('con2Dark');
          document.querySelector('.cInfo').classList.remove('cInfoDark');
          document.querySelector('.cSec1').classList.remove('cSec1Dark');
          cicons=document.querySelectorAll('.cicon');
          for(i of cicons){
            i.classList.remove('ciconDark');
          }
          document.querySelector('.cBtn').classList.remove('cBtnDark');
          hLines=document.querySelectorAll('.hLine');
          for(i of hLines){
            i.classList.remove('hLineDark')
          }
          localStorage.setItem('darkMode', 'false');
      }

        function darkMode1(){
          document.querySelector('.navbar1').classList.toggle('navbarDark');
          document.querySelector('.icon1').classList.toggle('icon1Dark');
          document.querySelector('.hamImg').classList.toggle('hamImgDark');
          document.querySelector('.con2').classList.toggle('con2Dark');
          document.querySelector('.cInfo').classList.toggle('cInfoDark');
          document.querySelector('.cSec1').classList.toggle('cSec1Dark');
          cicons=document.querySelectorAll('.cicon');
          for(i of cicons){
            i.classList.toggle('ciconDark');
          }
          document.querySelector('.cBtn').classList.toggle('cBtnDark');
          hLines=document.querySelectorAll('.hLine');
          for(i of hLines){
            i.classList.toggle('hLineDark')
          }
          localStorage.setItem('darkMode', 'true');
        }

</script>
</body>

</html>