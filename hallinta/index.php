<?php
  include("config.php");

  $send = $_POST['send'];
  $kayttaja = $_POST['kayttaja'];

  if($send=='true') {

   $my=mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");

   if($my->mysql_errno) {
    die("MySQL, vithe yhteyden luonnissa: " .$my->connect_error);
   }

   $my->set_charset('utf8');
   $sql = 'DELETE FROM 6552_kommentti WHERE kayttaja="'.$kayttaja.'"';

   if($tulos = $my->query($sql)) {
    header("Location: index.php");
   } else {

     echo '<p>Ei toimi!</p>';
   }

   $my->close();
  }

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
<style>
h5 {
  text-align: center;
}
</style>
</head>
<body>



<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-2195009-2', 'auto');
      ga('send', 'pageview');

      ga('create', 'UA-2195009-27', 'auto', {name: "foundation"});
      ga('foundation.send', 'pageview');

    </script>
<style>.fi-social-facebook{color:dodgerblue;font-size:2rem;}.fi-social-youtube{color:red;font-size:2rem;}.fi-social-pinterest{color:darkred;font-size:2rem;}i.fi-social-instagram{color:brown;font-size:2rem;}i.fi-social-tumblr{color:navy;font-size:2rem;}.fi-social-twitter{color:skyblue;font-size:2rem;}</style>

<header>

<br>

<div class="row">
<div class="medium-4 columns">
<img src="https://placehold.it/450x183&text=LOGO" alt="company logo">

</div>
<div class="medium-8 columns">
<img src="https://placehold.it/900x175&text=Responsive Ads - ZURB Playground/333" alt="advertisement for deep fried Twinkies">
</div>
</div>

<br>

<h5>Bonsai-kauppa</h5>
<br>
<div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
<button class="menu-icon" type="button" data-toggle></button>
<div class="title-bar-title">Menu</div>
</div>
<div class="top-bar" id="main-menu">
<ul class="menu vertical medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown">
<li><a href="index.php">Poista tietoja</a>

</li>
<li><a href="poista.php">Ostohistoriaa</a>

</li>
<li><a style="color: green" href="?kill=user">Kirjaudu ulos</a>

</li>
</ul>
</div>
</header>

<article style="text-align:center">
<br><br>

       <div class="row">
       <div class="small-12 columns">
       <h2>Poista kommentteja</h2>
       <br>
       <form method="POST">

           <label>Käyytäjänimi:</label>
           <input type="text" name="kayttaja" value="<?=$_POST['kayttaja']?>" required><br>

           <button class="primary button" type="submit" name="send" value="true">Poista kommentti</button>
        </form>
        </div>
        </div>


   <div class="row">
     <div class="small-12 columns">

       <?php
    $my=mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");

    if($my->mysql_errno) {
        die("MySQL, vithe yhteyden luonnissa: " .$my->connect_error);
    }

    $my->set_charset('utf8');
    $result = $my->query('SELECT kayttaja, kommentti
                          FROM 6552_kommentti
                          ORDER BY `6552_kommentti`.`leima` DESC');

    echo '<table>';
    echo '<tr><th>Käyttäjä</th><th>Kommentti</th></tr>';

    while($t = $result->fetch_object()) {
    echo '<tr>';
    echo '<td>'.$t->kayttaja.'</td>';
    echo '<td style="width: 100%">'.$t->kommentti.'</td>';
    echo '</tr>';
    }
    echo '</table>';
    $my->close();
    
    ?>

</div>
</div>
<br><br>
</article>

</div>
</div>
<footer>
<div class="row expanded callout secondary">
<div class="large-4 columns">
<h5>FLICKR IMAGES</h5>
<div class="row small-up-4">
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
<div class="column"><img class="thumbnail" src="https://placehold.it/75" alt="image of space dog"></div>
</div>
</div>
<div class="large-4 columns">
<h5>FLICKR IMAGES</h5>
<span class="secondary label">Space</span>
<span class="secondary label">Galaxies</span>
<span class="secondary label">Milky Way</span>
<span class="secondary label">Black Holes</span>
<span class="secondary label">Rebels</span>
<span class="secondary label">Death Star</span>
<span class="secondary label">Republic</span>
<span class="secondary label">R2D2</span>
</div>
<div class="large-4 columns">
<h5>RANDOM MAG</h5>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti quam voluptatum vel repellat ab similique molestias molestiae ea omnis eos, id asperiores est praesentium, voluptate officia nulla aspernatur sequi aliquam.</p>
</div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>
