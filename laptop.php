<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bddstln","root","");
 if( isset($_SESSION['id'])){
	$ID=$_SESSION['id'];
   
?>

<!doctype html>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="../css/all.css"/>
      <link rel="shortcut icon" href="../S.PNG"/>
      <title>Déclaration du Laptop</title>  

 <style type="text/css">
     
     button { animation: ba .5s;
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
</style>
            
</head>


<body>
      
  <section class="banner">
    <header>
      <a href="../declaration.php" class="re" ><i id ="icon"class="fas fa-arrow-alt-circle-left"></i> Retour</a>
    </header>
     <h2>Choisissez la marque de votre Laptop &emsp;<i class="fas fa-laptop"id="icon"></i></h2>

     <div class="container">
      <div class="contenu">
           
        <a href="déclaration-laptop.php?marque=Apple"><button > <img src="..\Marques\apple.png" height="30px"/></button></a> 
        <a href="déclaration-laptop.php?marque=Samsung"><button> <img src="..\Marques\samsung.png"height="30px"/></button></a> 
        <a href="déclaration-laptop.php?marque=Lenovo"> <button><img src="..\Marques\lenovo1.png" height="30px" /></button></a>
        <a href="déclaration-laptop.php?marque=Huawei"> <button> <img src="..\Marques\Huawei-LogoPNG1.png" height="30px"/></button></a>
        <a href="déclaration-laptop.php?marque=Razer"><button> <img src="..\Marques\razer.png" height="40px"/> </button></a>
        <a href="déclaration-laptop.php?marque=HP"> <button> <img src="..\Marques\hp.png" height="30px"/></button></a>
        <a href="déclaration-laptop.php?marque=Dell"> <button> <img src="..\Marques\dell1.png" height="35px"/> </button></a>
        <a href="déclaration-laptop.php?marque=Msi"> <button> <img src="..\Marques\msi.png" height="35px"/></button></a>
        <a href="déclaration-laptop.php?marque=Asus"> <button><img src="..\Marques\asus.png" height="20px"/></button></a>
        <a href="déclaration-laptop.php?marque=acer"><button><img src="..\Marques\acer.png" height="20px"/></button></a>
        <a href="déclaration-laptop.php?marque=Microsoft"><button><img src="..\Marques\windows.png" height="30px"/></button></a>
        <a href="laptop-autre.php"><button>autres &emsp14; <i class="fas fa-plus" id="icon2"></i></button></a>
</div>
    </div>
    </section>
<script src="skrollr.js"></script>
<script type="text/javascript">
var s = skrollr.init();
</script>
</section>

</body>
</html>
<?php } ?>