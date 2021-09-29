<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=JhQk8G8PD1bp8TaOEmIn2RSUbspVHaGNAwg2o4OGAeiC2rHhnXIIQEcpeDcZTTSntuT5DgbJMxaW7eVabsJZf0m_xanvHcM0jf3JPLZLBGZNm9GEoYuD8Qs7m-CXLpGsO35o2gmsblLxsCbhaOMF5_mqPixTfzIeOldZpz1n2QTXeRkdyDJ3tWn7Rr5MlaKDh_NPFiYq62fyp3_vPUSqfHT8AkeuSPSH0V0DuNkgmmNJKoNY-oC7cA6NJvkvTIhGfYKr_TYtSMo5UyIpEr48V84Re-TRLOl_c5CsC8Dp9g1Z8V0d9dfyKEwGd9htp7TH7qEUoLYf1YdmLt8rFh1RgFhuidu3EkT6SLZuca0WpySeW7935nuyIclCiHasPwuuO7AQKcdlplLeRbTUmucbDVs9mPljk97jAFfunxHLQuAMPhOxmRaDe7ml-qMUVAJOYzzxp6Kx1rZtdh8LAewKuw" charset="UTF-8"></script>
<?php


$userHiba = false;
$userHibaUzenet = '';
$emailHiba = false;
$emailHibaUzenet = '';
$jelszoHiba = false;
$jelszoHibaUzenet = '';

$sikeresRegisztracioUzenet = "";
$sikeresReg = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username'])) {
        $userHiba = true;
        $userHibaUzenet = 'Kérem adjon meg egy felhasználónevet';
        $username = '';
    } else if (strtolower($_POST['username']) === 'admin') {
        $userHiba = true;
        $userHibaUzenet = 'A felhasználóneve nem lehet ' . $_POST['username'];
        $username = '';
    } else if (strlen($_POST['username']) < 4) {
        $userHiba = true;
        $userHibaUzenet = 'Kérem adjon meg egy 3 karakternél hosszabb felhasználónevet';
        $username = $_POST['username'];
    } else {
        $username = $_POST['username'];
    }

    if (empty($_POST['email'])) {
        $emailHiba = true;
        $emailHibaUzenet = 'Kérem adjon meg egy emailcímet';
        $email = '';
    } elseif (strpos($_POST['email'], '.') === false) {
        $emailHiba = true;
        $emailHibaUzenet = 'Rossz emailcím formátum';
        $email = $_POST['email'];
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $jelszoHiba = true;
        $jelszoHibaUzenet = 'Kérem adjon meg egy kelszót';
        $password = '';
        $password2 = '';
    } else if (strlen($_POST['password']) < 8) {
        $jelszoHiba = true;
        $jelszoHibaUzenet = 'A jelszonak legalabb 8 karakternek kell lennie';
        $password = '';
        $password2 = '';
    } else if ($_POST['password'] !== $_POST['password2']) {
        $jelszoHiba = true;
        $jelszoHibaUzenet = 'A beírt jelszavak nem egyeznek';
        $password = '';
        $password2 = '';
    }
    
   /* if (!$userHiba && !$emailHiba && !$jelszoHiba) {
      $sikeresRegisztracioUzenet = 'Sikeres regisztráció!';
    }
 else {
    $username = $email = $password = $password2 = "";
}
*/
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Regisztráció</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body> <?php 
if(!$sikeresReg) { 
    
    
    ?>
    <form method="post">
        <div>
            <label>
                Usernév:<br>
                <input type='text' name='username'>
            </label>
            <div class='errormessage'><?php echo $userHibaUzenet; ?></div>
        </div>
        <div>
            <label>
                Email cím:<br>
                <input type='email' name='email'>
            </label>
            <div class='errormessage'><?php echo $emailHibaUzenet; ?></div>
        </div>
        <div>
            <label>
                Jelszó:<br>
                <input type='password' name='password'>
            </label>
            <div class='errormessage'><?php echo $emailHibaUzenet; ?></div>
        </div>
        <div>
            <label>
                Jelszó még egyszer:<br>
                <input type='password' name='password2'>
            </label>
        </div>
        <div>
            <input type='submit' value='Regisztráció'>
        </div>
    </form>
    <?php } else {?>
    <p class='success'>Sikeres regisztráció!</p>
    <?php } ?>
   
</body>
</html>
