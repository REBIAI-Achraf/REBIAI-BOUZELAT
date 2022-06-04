<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
 if( isset($_SESSION['id'])){
	$ID=$_SESSION['id'];

    $justificatif=$_GET['just'];
    $photo=$_GET['photo'];
    $table=$_GET['table'];
   
    if(isset($_POST['btnsup'])){

   if($table=="telephone"){   
        $imei=$_GET['imei'];
    $reqsup=$pdo->prepare("DELETE FROM telephone WHERE id= ? AND emei= ?");
    $reqsup->execute(array($ID,$imei));
    $justname ="justificatifs-tel/";
    $photoname ="téléphones-déclarés/";
    $justname .= $justificatif;
    $photoname .= $photo;
   if(file_exists($justname) AND file_exists($photoname)){
   unlink( $justname)AND unlink($photoname);
   header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$ID);   
   }
   }
   else if($table=="tablette"){  
        $imei=$_GET['imei'];
    $reqsup=$pdo->prepare("DELETE FROM tablette WHERE id= ? AND emei= ?");
    $reqsup->execute(array($ID,$imei));
    $justname ="justificatifs-tab/";
    $photoname ="tablettes-déclarés/";
    $justname .= $justificatif;
    $photoname .= $photo;
   if(file_exists($justname) AND file_exists($photoname)){
   unlink( $justname)AND unlink($photoname);
   header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
   }
   }
   else if($table=="laptop"){
        $nums=$_GET['nums'];
    $reqsup=$pdo->prepare("DELETE FROM laptop WHERE id= ? AND num_s= ?");
    $reqsup->execute(array($ID,$nums));
    $justname ="justificatifs-lap/";
    $photoname ="laptops-déclarés/";
    $justname .= $justificatif;
    $photoname .= $photo;
   if(file_exists($justname) AND file_exists($photoname)){
   unlink( $justname)AND unlink($photoname);
   header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
   }
   }
   else if($table=="appareil_photo"){
    $nums=$_GET['nums'];
$reqsup=$pdo->prepare("DELETE FROM appareil_photo WHERE id= ? AND num_s= ?");
$reqsup->execute(array($ID,$nums));
$justname ="justificatifs -appareil-photo/";
$photoname ="appareils-photo-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="tv"){
    $nums=$_GET['nums'];
$reqsup=$pdo->prepare("DELETE FROM tv WHERE id= ? AND num_s= ?");
$reqsup->execute(array($ID,$nums));
$justname ="justificatifs -TV/";
$photoname ="TV-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="smart_watch"){
    $imei=$_GET['imei'];
$reqsup=$pdo->prepare("DELETE FROM smart_watch WHERE id= ? AND imei= ?");
$reqsup->execute(array($ID,$imei));
$justname ="justificatifs-SmartWatch/";
$photoname ="SmartWatch-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="casque_vr"){
    $nums=$_GET['nums'];
$reqsup=$pdo->prepare("DELETE FROM casque_vr WHERE id= ? AND num_s= ?");
$reqsup->execute(array($ID,$nums));
$justname ="justificatifs-CasqueVR/";
$photoname ="CasqueVR -déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="velo"){
    $nums=$_GET['nums'];
$reqsup=$pdo->prepare("DELETE FROM velo WHERE id= ? AND num_s= ?");
$reqsup->execute(array($ID,$nums));
$justname ="justificatifs-vélo/";
$photoname ="vélos-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="console"){
    $nums=$_GET['nums'];
$reqsup=$pdo->prepare("DELETE FROM console WHERE id= ? AND num_s= ?");
$reqsup->execute(array($ID,$nums));
$justname ="justificatifs-console/";
$photoname ="consoles-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="voiture"){
    $numchassis=$_GET['numchassis'];
$reqsup=$pdo->prepare("DELETE FROM voiture WHERE id= ? AND num_chassis= ?");
$reqsup->execute(array($ID,$numchassis));
$justname ="justificatifs-voiture/";
$photoname ="voitures-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="moto"){
    $numchassis=$_GET['numchassis'];
$reqsup=$pdo->prepare("DELETE FROM moto WHERE id= ? AND num_chassis= ?");
$reqsup->execute(array($ID,$numchassis));
$justname ="justificatifs-moto/";
$photoname ="motos-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
else if($table=="objet"){
    $nums=$_GET['nums'];
$reqsup=$pdo->prepare("DELETE FROM objet WHERE id= ? AND num_s= ?");
$reqsup->execute(array($ID,$nums));
$justname ="justificatifs-autre/";
$photoname ="autreobjets-déclarés/";
$justname .= $justificatif;
$photoname .= $photo;
if(file_exists($justname) AND file_exists($photoname)){
unlink( $justname)AND unlink($photoname);
header("Location:mes-déclarations.php?msg=déclaration-supprimée&id=".$_SESSION['id']);   
}
}
    }

?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="css/all.css"/>
      <link rel="shortcut icon" href="S.PNG"/>
      <title>Coffre virtuel</title>  

 <style type="text/css">
     
     button { animation: ba .5s;
   height:45px;width: 200px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin:60px;
   border:none;
   border-radius: 30px 15px;
   position: relative;
   overflow: hidden;
   background:linear-gradient(to bottom,#0582e7,#022f53);
   text-align: center;
   font-size: 18px;
   color: #ddd;
   transition: .3s;
   z-index: 0;
   font-family: inherit;
   color:rgba(220, 220, 220, 0.938);
  }
  
  button::before {
   content: '';
   width: 0;
   height: 300px;
   position: absolute;
   top: 50%;
   left: 50%;
   color: white;
   transform: translate(-50%, -50%) rotate(45deg);
   background:linear-gradient(to bottom,#0582e7,#022f53);
   box-shadow:0 0 10px white;
   transition: 1s ;
   display: block;
   z-index: -1;
  }
  
  button:hover::before {cursor: pointer;box-shadow:0 0 10px white;
   width: 105%;
  }
  
  button:hover {cursor: pointer; 
    box-shadow:0 0 10px white;
    transition: 0.6s;
  }  
  *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: sans-serif;
    position: relative;
  
    
  }  .banner{
    position:relative;
    width: 100%;
    min-height: 100vh;
    padding: 0 80px;
    display: flex; 
    background:linear-gradient(to bottom ,rgba(6,55,115,25),#0091FF);
   
  }

  
  header{
    position:fixed;
    top:0;
    left: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 50px;
  }

  header .re{
    font-size:1.5em;
    color: rgb(255, 255, 255);
    text-shadow:0 0 4px #151415;
    font-weight: 700;
    text-decoration: none;
    transform-origin: right;
    transition: .5s;
  }
  .banner h2{
    position:absolute;
    top:0;
    left: 0;
    animation: blurFadeIn .6s;
    color: #fff;
    text-shadow: 0 0 8px black;
    font-size:2em;
    margin: 70px 60px;
    padding: 20px;
  }
  #icon{color:#058eff;text-shadow: 0 0 3px black;}
  
  .container{width: 100%;display: flex;justify-content: space-between;flex-wrap: wrap;margin-top:150px;position: relative;}
    
     @keyframes ba {
       0% { scale: 0.3; opacity: 0;}
      100%{ scale: 1;opacity: 1;}
     }
   
.content{
   text-align:center;
   margin-top:160px;
    margin-left:auto;
    margin-right:auto;
}
.content img {transition:.5s;}
img:hover {
    scale:1.2;
    transition:.5s;
   
}
form{height:45px;width: 230px;position:relative;right:30px;}
p{margin:20px;
 font-weight: 700;
  font-size:1.3em;
  color:#fff;
  text-shadow:0 0 4px black;
  text-decoration:none;}

</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="mes-déclarations.php?id=<?=$ID?>" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    </header>

    <h2> liste des déclarations que vous avez fait &emsp;<i id ="icon"class="fa-solid fa-clipboard-list"></i></h2>

     <div class="content">
       <p>voulez vous vraiment supprimer cette déclaration ?</p>
       <a href="">  <img src="img/file.png" height="170px"></a>
<form method="post"><button type="submit"name="btnsup">Supprimer</button></form> <a href="mes-déclarations.php?id=<?=$ID?>" style="position:relative;top:-45px;left:130px;"><button>Annuler</button></a>


</div>

     </section>

</body>
</html>
<?php } ?>