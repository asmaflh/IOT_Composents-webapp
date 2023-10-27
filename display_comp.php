<?php 
session_start();
include_once('db_conn.php');
$a=1;
$stmt = $conn->prepare(
    "SELECT * FROM composant ORDER BY id DESC ;");
$stmt->execute();
$results = $stmt->fetchAll();
if(isset($_GET['comp'])){
    $id=$_GET['comp'];

    $stmt1= $conn->prepare(
        "SELECT * FROM composant WHERE id=$id;");
    $stmt1->execute();
    $resultss = $stmt1->fetchAll();

    
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/home_style.css">

</head>
<body>
<header class="header">

   <img src="images/esilogoblue.png" alt="" width="80px" height="80px">

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">Export to excel</a>
        <a href="#products">export to word</a>
      
    </nav>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>
    <form action="logout.php" class="login-form">
        <input type="submit" value="logout" class="btn">
    </form>

</header>



<section class="home" id="home">
<?php if (isset($_GET['success'])) { ?>
     		<p class="success"><?php echo $_GET['success']; ?></p>
     	<?php } ?>

    <div class="content">
        <h3>see all the <span>IOT </span>composant here</h3>
        <p>if you have a composant to add click add button.</p>
        <a href="#" class="btn" id="add-form">Add new composant</a>
    </div>

</section>


<section class="blogs" id="blogs">

    <h1 class="heading">The <span>composants</span> </h1>

    <div class="box-container">
    <?php
foreach($results as $result)
{
   ?>
        <div class="box">
           <img src="images/image_comp/<?=$result['image']?>" alt="" >
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-circle"></i> <?php echo $result['etat']?> </a>
                    <a href="#"> <i class="fas fa-calendar"></i> <?php echo $result['date_achat']?> </a>
                </div>
                <h3><?php echo $result['nom']?></h3>
                <p>qte: <?php echo $result['qte']?></p>
                <a href="#?comp=<?=$result['id'];?>" class="btn">modify</a>
                <a href="#" class="btn">delete</a>
               
            </div>
        </div>
        
       <?php
            
        }
       ?>
    

    </div>

</section>
<?php
      foreach($resultss as $row1)
      {
            
    
       ?>

<div id="myModal" class="modal" style="display: block;">


    <div class="modal-content" >

      <form action="modify_comp.php?comp=<?php echo $row1['id']?>" method="POST" id="formadd" enctype="multipart/form-data" >
       <img src="images/image_comp/<?=$row1['image']?>" alt="" style="height: 50px; weight:20px;">
        <input type="file" name="image" id="image" accept=".jpg,.gif,.png">
        <label for="name">name</label>
        <input type="text" name="nom" id="name" placeholder="name" required value="<?php echo $row1['nom']?>"> 
        <label for="date">purchase date</label>
        <input type="date" name="date" id="date" required value="<?php echo $row1['date_achat']?>">
        <label for="qte">qte</label>
        <input type="number" name="qte" id="qte" placeholder="0" require value="<?php echo $row1['qte']?>">
        <label for="statut">statut</label>
        <select name="statut" id="statut" required>
            <option value="<?php echo $row1['etat']?>"><?php echo $row1['etat']?></option>
            <option value="available">available</option>
            <option value="out of order">out of order</option>
            <option value="lost">lost</option>
        </select>
       
        <input type="submit" value="Modify" class="btn"  name="modifier" value="0">
        <input type="submit" value="Cancel" class="btn" value="0" name="cancel"> 
        
        

      </form>
    </div>
  
  </div>
  <?php
            }
        
       ?>

 
<script src="js/anim.js"></script>

</body>
</html>
