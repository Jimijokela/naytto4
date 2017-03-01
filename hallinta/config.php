<?php
    session_start();

    // Tyhjennetään sessio, jos painettiin kirjaudu ulos linkkiä
    if($_GET['kill']=="user") {
        session_destroy();
        header("Location: index.php");
    }

    // Otetaan yhteys tietokantaan
    $my = mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");
    if($my->mysql_errno) {
        die("MySQL: virhe (#".$my->mysql_errno.") yhteyden luonnissa: ".$my->connect_error);
    }
    $my->set_charset("utf8");


    // Luetaan lomakkeen tiedot muuttujiin
    $login  = trim($_POST['login']);
    $passwd  = trim($_POST['passwd']);
    $btn  = trim($_POST['btn']);


    if($_SESSION['uid']=='active') {
        # Meillä on aktiivinen uid - ei tehdä mitään ja homma toimii!


    } else if($btn==1 && $login && $passwd) {


    //Tehdään SQL-kysely tunnuksesta ja salasanasta
    $sql = "SELECT * FROM 6552_login WHERE login='$login' AND passwd='$passwd'";
    if($res = $my->query($sql)) {


        // Tarkistetaan löytyykö käyttäjä tietokannasta
        $rows = $res->num_rows;
        if($rows>0) {


            // Löytyi osuma! Asetetaan SESSIO
            $_SESSION['uid']="active";

          } else {


            // Ei löytynyt, mennään kirjautumiseen uudestaan
            $my->close();
            header("Location: login.php");
        }
    } else {


    // Virhetilanne - tänne ei pitäisi ikinä päätyä
    echo $my->error. "<br>"."$sql";
  }
} else {

$my->close();
header("Location: login.php");
}
?>