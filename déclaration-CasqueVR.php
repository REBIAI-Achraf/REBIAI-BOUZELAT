<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
 if( isset($_SESSION['id'])){
	$ID=$_SESSION['id'];
    
	 if(isset($_POST['btnadd']))
{   $marque=$_GET['marque'];
    $nom_appareil=htmlspecialchars($_POST['nom']);
	$couleur=$_POST['clr'];
  $numslenth=strlen($_POST['nums']);
  $num_s=sha1($_POST['nums']);
  $img=$_FILES['image']['name'];
$target_image= basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_image,PATHINFO_EXTENSION));
$justificatifs=$_FILES['just']['name'];
	
	if(!empty($_POST['nom'])
   and!empty($_POST['nums'])
   and!empty($_POST['clr'])
   ){	
    if($numslenth <14 and $numslenth >=25){
        $erreur="le numéro de série que vous avez rentré est invalide";
    }
       
   else if($_FILES['image']['size'] != 0 ) {
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
      $erreur= "le format de fichiers doit être en: JPG, JPEG, PNG ";
      
    }
    
  else  if($_FILES['just']['size'] != 0 ) {

      $reqnums=$pdo->prepare("SELECT * FROM casque_vr WHERE  num_s=?");
      $reqnums->execute(array($num_s));
     $numsexist= $reqnums->rowCount();
     if($numsexist==0){
	$req= $pdo->prepare("INSERT INTO casque_vr(id,marque,nom_appareil,num_s,couleur,photo,justificatif,confirmation) VALUES (?,?,?,?,?,?,?,?)");
	$req->execute(array($ID,$marque,$nom_appareil,$num_s,$couleur,$_FILES['image']['name'],$_FILES['just']['name'],''));
	if($req){
move_uploaded_file($_FILES["image"]["tmp_name"],"../CasqueVR -déclarés/$img");
move_uploaded_file($_FILES["just"]["tmp_name"],"../justificatifs-CasqueVR/$justificatifs");
    $erreur2="votre déclaration a été envoyée !";
  }
    }
     else{
      $erreur="appareil déja déclaré ,numéro de série déja existe !";
     }  
  }

    else{
      $erreur="insérer un justificatif !";
    }
  }
   else
	{
	$erreur="insérer une image !";
	}
}
		 else
	{
	$erreur="Tous les champs doivent être complétés !";
	}
 
}
	
?>
	<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="../css/all.css"/>
      <link rel="shortcut icon" href="../S.PNG"/>
      <title>Déclaration du casque VR</title>  

 <style type="text/css">
     
   button {
   height:45px;width: 250px;text-shadow: 0 0 7px rgb(0, 0, 0);
   margin-right: 40px;
   margin-top: 50px;
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
form {
  position: relative;
  margin-top: 180px;
  max-width: 600px;
  width: 50%;
  text-align: center;
  height: 750px;;
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
.alerte p { color:#fff;font-size:1.3em;font-weight:200;text-shadow:0 0 3px black; animation:op .8s;}
@keyframes op{
  0%{
     opacity:0;
   }
   100%{
     opacity:1;
   }
 }

    [type="file"] {
  height: 0;
  overflow: hidden;
  width: 0;display: none;
}

        [type="file"] + label {
   display:flex;

text-align: center;
justify-content: center;
 background:linear-gradient(to bottom left,#0582e7,#022f53);
   margin-left:30%;
  border:none ;
  border-radius: 30px 15px;
  color: #fff;
  cursor: pointer;
  font-family: 'Rubik', sans-serif;
  font-size: 13px;
  width: 200px;
  height: 60px;

  }
  
  [type="file"] + label:hover {
   background:#0b6fc0;
  }
  [type="file"] + label:hover i { transition: .6s;
   position: relative;left:35px;top: 20px;
  color: #31c1ef;opacity: 1;text-shadow: 0 0 5px rgb(0, 0, 0);
  }
  [type="file"] + label:hover .c { transition: .4s;
   position: relative;
   top:12px;
  opacity: 0;
  }

.c{right: 10px; position: relative;transition: .4s;padding-top: 20px;opacity: 1; font-size: 1.2em;font-weight: 700;}
	sub {text-align: center;color: #fff;font-weight: 100;}


[type="file"] + label i {position: relative;left:36px;top:0px;transition: 0.2s;
  color:#058eff;text-shadow: 0 0 3px black;opacity: 0;
  
}


</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="CasqueVR.php" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
     <div class="alerte">
					
      <?php if(isset($erreur)){
echo '<p><i class="fa-solid fa-triangle-exclamation" style="color:red;"></i> '.$erreur."</p>";
}else
if(isset($erreur2)){echo '<p><i class="fa-solid fa-list-check" style="color:rgb(0,236,173);"></i> '.$erreur2."</p>";}
?>
      </div>
    </header>
      <h2>Remplissez les informations de casque VR <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/nocovwne.json"
            trigger="loop"
            colors="primary:#0091FF,secondary:#0091FF"
            style="width:50px;height:50px"></h2>
     <div class="imgbx">
      <img src="..\img\info2.PNG"height="400px"/>
   </div>
   <form name="formaadd" method="post" action="" enctype="multipart/form-data">

    
      <br>
    <div class="inputbx">
      <label>Nom / modèle du casque VR</label>
      <input type="text" name="nom" id="nom" placeholder="Entrer le nom de l'apareil">
    </div>
    <div class="inputbx">
      <label> numéro de série</label> 
      <input type="text" name="nums" id="nums" placeholder="Entrer le numéro de série">
    </div>
    <div class="inputbx">
      <label>Couleur du casque VR</label>
      <input type="text" name="clr" id="clr" placeholder="Entrer la couleur ">
    </div>
    
    <input type="file" name="image" id="file-input" />
             <label for="file-input"><i class="fas fa-cloud-download-alt"></i><span class="c"> une image</span></label><br>
           	<sub><p> image téléchargée: <span id="name">aucune</span></p></sub> 
            <script>
            
              let inputFile = document.getElementById('file-input'); 
              let fileNameField = document.getElementById('name'); 
              inputFile.addEventListener('change', function(event){
                let uploadFileName=event.target.files[0].name;
                fileNameField .textContent=uploadFileName;
              });
            </script>
            <br>
   <input type="file" name="just" id="file-input2" />
<label for="file-input2"><i class="fas fa-cloud-download-alt"></i><span class="c">Justificatif</span></label><br>
           	<sub><p> justificarif téléchargé: <span id="name2">aucune</span></p></sub> 
            <script>
            
              let inputFile2 = document.getElementById('file-input2'); 
              let fileNameField2 = document.getElementById('name2'); 
              inputFile2.addEventListener('change', function(event){
                let uploadFileName=event.target.files[0].name;
                fileNameField2.textContent=uploadFileName;
              });
            </script>
            <br>
      <button name="btnadd"  type ="submit">Déclarer</button>
      </form>
</section>

     
</body>
</html>

<?php  } ?>