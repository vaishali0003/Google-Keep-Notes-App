<?php include "dbconnect.php"; ?>
<?php
$loggedin = false;
$nloggedin = false;
$signedin = false;
$nsignedin = false;
$loginmsg = false;
$btnEnable = false;
$alertMsg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signin'])) {
        $nsignedin = true;
        $nloggedin = false;
        $username = $_POST['username1'];
        $useremail = $_POST['useremail'];
        $password = $_POST['password1'];
        $confpassword = $_POST['confPassword1'];
        if ($password == $confpassword) {
            $sql1 = "SELECT * FROM `users12` WHERE `Username` = '$username'";
            $result1 = mysqli_query($conn, $sql1);
            $num = mysqli_num_rows($result1);
            if ($num == 0) {
                $password1 = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users12` (`Username`, `email`, `password`) VALUES ('$username', '$useremail', '$password1')";
                $result = mysqli_query($conn, $sql);
                $alertMsg = "Signin Success! You can now login";
                $signedin = true;
                $nsignedin = false;
            } else {
                $alertMsg = "Username taken";
            }
        } else {
            $alertMsg = "Password and confirm password doesnt match";
        }
    } else if (isset($_POST['login'])) {
        $nloggedin = true;
        $nsignedin = false;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `users12` WHERE `Username`='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $alertMsg = "Login Success! Welcome $username";
            } else {
                $alertMsg = "Invalid Credentials";
            }
        } else {
            $alertMsg = "User not available";
        }
    }
}

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `notes` WHERE `S.No` = $sno";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descriptionEdit'];
        $sql = "UPDATE `notes` SET `Title` = '$title', `Description` = '$description' WHERE `notes`.`S.No` = $sno";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo mysqli_error($conn);
        }
    } else if (isset($_POST['snoCreate'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $username = $_SESSION['username'];
        $sql1 = "SELECT * FROM `users12` WHERE `Username`='$username'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $userid = $row1['User_id'];
        if (($title != '') || ($description != '')) {
            $bgColor = $_POST['bgColor'];
            $sql = "INSERT INTO `notes` (`Title`, `Description`,`bg_color`,`User`) VALUES ('$title','$description','$bgColor','$userid')";
            $result = mysqli_query($conn, $sql);
        } else {
            echo '<script>alert("You can not save an empty note")</script>';
        }
    }
}
?>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="editModalLabel">Edit Note</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/GoogleKeep/index.php" method="POST">
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <input type="text" class="title entNote1 id1 titleEdit" id="titleEdit" name="titleEdit" placeholder="Edit title...">
                    <textarea class="description id1 descriptionEdit" id="descriptionEdit" name="descriptionEdit" cols="10" rows="10" placeholder="Edit description..."></textarea>

                    <div class="bottom">
                        <div class="closebutton">
                            <button type="submit" class="closebtn" data-toggle="tooltip" data-placement="bottom" title="Save and Close">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_SESSION['loggedin']) &&  $_SESSION['loggedin'] == true) {
    $loggedin = true;
    $btnEnable = true;
?>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Antique&display=swap" rel="stylesheet">

</head>

<body class="light">
    <?php include "dbconnect.php"; ?>
    <div class="main">
        <?php include "nav.php"; ?>

        <div class="cred-main">

            <?php
            if (!$loggedin) {
                echo '
            <div class="loginForm" style="opacity:1; z-index:100;">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="login" value="login">';
                if ($nloggedin) {
                    echo '<span class="loginError">' . $alertMsg . '</span>';
            ?>
                    <script>
                        document.querySelector('.cred-main').style.opacity = '1';
                        document.querySelector('.cred-main').style.zIndex = '100';
                    </script>
                <?php
                }

                echo '
                    <div class="username loginElem">
                        <p class="uname">Username</p>
                        <input type="text" name="username" id="username" class="u">
                    </div>
                    <div class="password loginElem">
                        <p class="pass">Password</p>
                        <input type="password" name="password" id="password" class="u">
                    </div>
                    <div class="loginbutton loginElem">
                        <button class="loginBtn">Login</button>
                    </div>
                    <div class="signup loginElem">
                        <p class="lowerTxt">Do not have account? <span class="SignUp1">Sign In</span></p>
                    </div>
                </form>
            </div>
            
            <div class="signupForm">
            <form action="" method="POST">
                <input type="hidden" name="signin" value="signin">';
                if ($nsignedin) {
                ?>
                    <script>
                        document.querySelector(".signupForm").style.opacity = '1';
                        document.querySelector(".cred-main").style.opacity = '1';
                        document.querySelector(".signupForm").style.zIndex = '100';
                    </script>
            <?php
                    echo '<span class="loginError">' . $alertMsg . '</span>';
                }

                echo '
                <div class="username1 signupElem">
                    <p class="uname1">Username</p>
                    <input type="text" name="username1" id="username1" class="u">
                </div>
                <div class="useremail signupElem">
                    <p class="email">Email</p>
                    <input type="email" name="useremail" id="useremail" class="u">
                </div>
                <div class="password1 signupElem">
                    <p class="pass1">Password</p>
                    <input type="password" name="password1" id="password1" class="u">
                </div>
                <div class="confPassword1 signupElem">
                    <p class="confPass1">Confirm Password</p>
                    <input type="password" name="confPassword1" id="confPassword1" class="u">
                </div>
                <div class="signupbutton signupElem">
                    <button type="submit" class="signupBtn">Signup</button>
                </div>
            </form>
        </div>';
            }


            if ($loggedin) {
                echo '<div style="opacity:1; z-index:100;" class="logoutForm">
            <form action="" method="POST">
             <input type="hidden" name="logout" value="logout">
                <p class="welcmTxt">Welcome ' . $_SESSION['username'] . '</p>
                <input type="hidden" name="logout" value="logout">
                <a href="logout.php" class="logoutBtn">Logout</a>
            </form>
        </div>';
            } else {
                echo ' <div style="opacity:0; z-index:-1;" class="logoutForm">
            <form action="" method="POST">
                <p class="welcmTxt">Welcome</p>
                <input type="hidden" name="logout" value="logout">
                <a href="logout.php" class="logoutBtn">Logout</a>
            </form>
        </div>';
            }

            ?>

        </div>
        <div class="main1">
            <div id="leftBox" class="leftBox">
                <ul class="navList">
                    <li class="menu-item">
                        <div class="icon">
                            <img src="home (2).png" class="menuImg" alt="img">
                        </div>
                        <p class="menu-name"><a href="index.php">Home</a></p>
                    </li>
                    <li class="menu-item">
                        <div class="icon">
                            <img src="user (1).png" class="menuImg" alt="img">
                        </div>
                        <p class="menu-name"><a href="about.php">About</a></p>
                    </li>
                    <li class="menu-item">
                        <div class="icon">
                            <img src="contact (1).png" class="menuImg" alt="img">
                        </div>
                        <p class="menu-name"><a href="contact.php">Contact</a></p>
                    </li>
                    <li class="menu-item">
                        <div class="icon">
                            <img src="feedback (2).png" class="menuImg" alt="img">
                        </div>
                        <p class="menu-name"><a href="feedback.php">Feedback</a></p>
                    </li>
                    <li class="menu-item">
                        <div class="icon">
                            <img src="communication.png" class="menuImg" alt="img">
                        </div>
                        <p class="menu-name"><a href="support.php">Support</a></p>
                    </li>
                </ul>
            </div>

            <div class="rightBox">

                <div class="entNote smallBox">
                    <input type="text" class="title1 id1" placeholder="Take a note...">
                </div>

                <div class="bigBox">
                    <form action="/GoogleKeep/index.php" method="POST">
                        <input type="hidden" name="snoCreate" id="snoCreate" value="snoCreate">
                        <input type="text" class="title entNote1 id1" name="title" placeholder="Title">
                        <textarea class="description id1" name="description" cols="10" rows="10" placeholder="Take a note..."></textarea>

                        <div class="bottom">
                            <div class="editingIcons1">
                                <img src="palette.png" class="editingIcon change-color" data-toggle="tooltip" data-placement="bottom" title="Change color">

                                <div class="colorPalette colorPaletteLight">
                                    <div class="color color1" id="#c385c3"></div>
                                    <div class="color color2" id="#f28b82"></div>
                                    <div class="color color3" id="#64e964"></div>
                                    <div class="color color4" id="#00ffff"></div>
                                    <div class="color color5" id="#db7093"></div>
                                    <div class="color color6" id="#cdcd2a"></div>
                                </div>

                            </div>
                            <input type="hidden" name="bgColor" class="bgColor">
                            <div class="closebutton">
                                <button type="submit" class="closebtn" id="closebtn" data-toggle="tooltip" data-placement="bottom" title="Save and close" disabled>Close</button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if ($btnEnable) {
                ?>
                    <script>
                        document.getElementById('closebtn').disabled = false;
                    </script>
                <?php
                }
                ?>
                <div class="notes">
                    <?php
                    if ($loggedin) {
                        $username = $_SESSION['username'];
                        $sql1 = "SELECT * FROM `users12` WHERE `Username`='$username'";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $userid = $row1['User_id'];

                        $sql = "SELECT * FROM `notes` WHERE `User`='$userid'";
                        $result = mysqli_query($conn, $sql);

                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo '
                            <div class="notecard ' . $row['bg_color'] . ' notecardLight">
                            <img src="check.png" class="check checkLight" alt="img">
                            <img src="check.png" class="check checkDark" alt="img">
                                <div class="card-body">
                                <h6 id="noteTitle" class="card-subtitle mb-2 noteTitle">' . $row['Title'] . '</h6>
                                <pre id="noteDescription" class="card-text noteDescription">' . $row['Description'] . '</pre>
                                <div class="editingIcons2">
                                <span data-toggle="modal" data-target="#editModal"><img src="pencil.png" class="editImg edit editingIcon2" data-toggle="tooltip" data-placement="bottom" id=' . $row['S.No'] . ' title="Edit"></span>
                                <img src="delete.png" id="d' . $row['S.No'] . '" data-toggle="tooltip" class="deleteImg delete editingIcon2" data-placement="bottom" title="Delete">
                                </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '
                        <div class="rloginC">
                        <div class="rlogin">
                        <p class="rLogin1">Please Login to start</p>
                    </div>
                    <div class="bulb">
                <img src="bulbbg.png" class="bulbImg">
                </div>
                </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="https://kit.fontawesome.com/068cf27227.js" crossorigin="anonymous"></script>

</html>