<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
if(isset($_GET['nums'])){
	$getnum_s=$_GET['nums'];
	$reqvelo=$pdo->prepare("SELECT * FROM velo WHERE num_s= ?");
	$reqvelo->execute(array($getnum_s));
	$veloinfo=$reqvelo->fetch();
/* modification de la marque*/
  if(isset($_POST['nvmarque']) and !empty($_POST['nvmarque'] ) and $_POST['nvmarque'] != $veloinfo['marque']){
    $nvmarque=htmlspecialchars($_POST['nvmarque']);
    $update=$pdo->prepare("UPDATE  velo SET marque =? WHERE num_s= ?");
    $update->execute(array($nvmarque,$getnum_s));
    header("Location:../mes-déclarations.php?msg2=déclaration-modifiée&id=".$_SESSION['id']);  
   
}
/* modification de type velo */
if(isset($_POST['typevelo']) and !empty($_POST['typevelo'] ) and $_POST['typevelo'] != $veloinfo['nom_veloareil']){
  $typevelo=htmlspecialchars($_POST['typevelo']);
  $update=$pdo->prepare("UPDATE velo SET type_velo=? WHERE num_s= ?");
  $update->execute(array($typevelo,$getnum_s));
  header("Location:../mes-déclarations.php?msg2=déclaration-modifiée&id=".$_SESSION['id']);  
 
}

/* modification de num serie */
if(isset($_POST['nvnums']) and !empty($_POST['nvnums'] ) and sha1($_POST['nvnums'])!= $veloinfo['num_s']){
  $nvnums=sha1($_POST['nvnums']);
  $num_slenth=strlen($_POST['nvnums']);
  if($num_slenth > 25 ){
    $erreur="le numéro de serie que vous avez rentré est invalide";
}else{
  $reqnum_s=$pdo->prepare("SELECT * FROM velo WHERE  num_s=?");
  $reqnum_s->execute(array($nvnums));
 $num_sexist= $reqnum_s->rowCount();
 if($num_sexist==0){
$req= $pdo->prepare("UPDATE  velo SET num_s=? WHERE num_s=? ");
$req->execute(array($nvnums,$veloinfo['num_s']));

  header("Location:../mes-déclarations.php?msg2=déclaration-modifiée&id=".$_SESSION['id']);  
 }else {
  $erreur="le numéro de serie que que vous avez rentré il existe déja";
 }
}
}


 /* modification de couleur */
if(isset($_POST['nvclr']) and !empty($_POST['nvclr'] ) and $_POST['nvclr'] != $veloinfo['couleur']){
  $nvclr=htmlspecialchars($_POST['nvclr']);
  $update=$pdo->prepare("UPDATE velo SET couleur=? WHERE num_s= ?");
  $update->execute(array($nvclr,$getnum_s));
  header("Location:../mes-déclarations.php?msg2=déclaration-modifiée&id=".$_SESSION['id']);  
 
}  

?>
	<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="../css/all.css"/>
      <link rel="shortcut icon" href="../S.PNG"/>
      <title>Déclaration du téléphone</title>  

 <style type="text/css">
     
   
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
    align-items: center;
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
  
  .imgbx img {
 animation:flotter 6s ease-in-out infinite;
  max-width: 100%;
  min-width: 380px;
}
@keyframes flotter{
 0% {
        transform: translateY(0px);
      }
    50%{
        transform: translateY(-30px);
      }
      100%{
        transform: translateY(0px);
      }
    }
button {
   height:45px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin-right: 20px;
   margin-top: 20px;
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
   form {
  position: relative;
  margin-top: 180px;
  margin-bottom:30px;
  max-width: 600px;
  width: 50%;
  text-align: center;
  height: 650px;;
  padding:30px;
  border: #0091FF 3px solid;
  background:linear-gradient(to bottom left,#0582e7,#022f53);
  border-radius: 80px;
  box-shadow: 0 0 7px black;
  animation:transition .7s;
}
@keyframes transition{
     from{ 
        opacity: 0;
        transform: translateX(140px);
     }

     to {
      opacity: 1;
      transform: translateX(0);
     }
   }
label{
  font-size: 1.3em;
  font-weight: 700;
  color: #fff;
  text-shadow:0 0 4px #000;
}
    form .inputbx {margin-bottom: 40px;}

    form .inputbx input{
      
      width: 100%;
      background-color: transparent;
      box-shadow: none;
      border: none;
      outline: none;
      padding: 10px 0;
      font-size: 18px;
      font-weight: 300;
      color: #fff;
      border-bottom:  2px solid #fff;
    }
    form .inputbx input::placeholder{color: #fff;}

    form .inputbx textarea::placeholder{color: #fff;}
    form .inputbx input[type="submit"]{width: 150px;background-color: #056dc2;;font-weight: 400p;cursor: pointer;color: black;}
    .alerte p {color:#fff;font-size:1.3em;font-weight:200;text-shadow:0 0 3px black;opacity:0; animation:op 3s;}

@keyframes op{
  0%{
     opacity:0;
   }
   50%{
     opacity:1;
   }
   100%{
     opacity:0;
   }
 }



</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="../mes-déclarations.php" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
     <div class="alerte">
					
      <?php if(isset($erreur)){
echo '<p><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
}else
if(isset($erreur2)){echo '<p><i class="fa-solid fa-list-check" style="color:rgb(0,236,173);"></i> '.$erreur2."</p>";}
?>
      </div>
    </header>
      <h2>modifier votre déclaration de vélo <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/nocovwne.json"
            trigger="loop"
            colors="primary:#0091FF,secondary:#0091FF"
            style="width:50px;height:50px"></h2>
     

            <div class="imgbx">
      <img src="..\img/pencil1.png"height="400px"/>
   </div>
   <form name="formaadd" method="post" action="" enctype="multipart/form-data">
   
      <br>
      <div class="inputbx">
      <label>Marque de vélo</label>
      <input type="text" name="nvmarque" id="marque" placeholder="<?php echo $veloinfo['marque'];?>">
    </div>
    <div class="inputbx">
      <label>Type de vélo</label>
      <input type="text" name="typevelo" id="nom" placeholder="<?php echo $veloinfo['type_velo'];?>">
    </div>
    <div class="inputbx">
      <label> numéro de série</label> 
      <input type="text" name="nvnums" id="nums" placeholder="le numéro de série">
    </div>
    <div class="inputbx">
      <label>Couleur de vélo </label>
      <input type="text" name="nvclr" id="clr" placeholder="<?php echo $veloinfo['couleur'];?>">
    </div>
            <br>
      <button name="btnadd"  type ="submit">Mettre à jour</button>
      </form>
</section>

     
</body>
</html>

<?php  } ?>