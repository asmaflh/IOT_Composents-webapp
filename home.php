<?php 
session_start();
include_once('db_conn.php');
$search=$_POST['search'];
$a=1;
$stmt = $conn->prepare(
    "SELECT * FROM composant WHERE nom LIKE '%{$search}%' ORDER BY id DESC ;");
$stmt->execute();
$results = $stmt->fetchAll();

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
        <a href="export.php">Export to excel</a>
        <a href="formword.php">export to word</a>
     
   
    </nav>


    <div class="icons">
    <select name="filter" id="filter" >
    <option value="" disabled="" selected="">statut</option>
    <option value="">All</option>
        <option value="lost">lost</option>
        <option value="available">available</option>
        <option value="out of order">out of order</option>
    </select>
    <input type="date" name="datefilter" id="datefilter">
   
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form  class="search-form" method="POST">
        <input type="search" id="search-box" placeholder="search here..." name="search">
        <label for="search-box" class="fas fa-search"></label>
    </form>
    <form action="logout.php" class="login-form">
        <input type="submit" value="logout" class="btn">
    </form>

   

</header>



<section class="home" id="home">

    
    <div class="content">
   
    <?php if (isset($_GET['success'])) { ?>
     		<p class="success"><?php echo $_GET['success']; ?></p>
     	<?php } ?>
        <h3>see all the <span>IOT </span>composant here</h3>
        <p>if you have a composant to add click add button.</p>
        <a href="#" class="btn" id="add-form">Add new composant</a>
    </div>

</section>


<section class="blogs" >
   
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
                <a href="display_comp.php?comp=<?php echo $result['id']?>" class="btn">modify</a>
                <a href="delete_item.php?comp=<?php echo $result['id']?>" class="btn" >delete</a>
               
            </div>
        </div>
        
       <?php
            
        }
       ?>
    

    </div>

</section>

<div id="myModal" class="modal" >


    <div class="modal-content">
      <span class="close">&times;</span>
      <form action="add_composant.php" method="POST" id="formadd">
        <label for="name">name</label>
        <input type="text" name="nom" id="name" placeholder="name" required>
        <label for="date">purchase date</label>
        <input type="date" name="date" id="date" required>
        <label for="qte">qte</label>
        <input type="number" name="qte" id="qte" placeholder="0" min="0" required >
        <label for="statut">statut</label>
        <select name="statut" id="statut" required>
            <option value="available">available</option>
            <option value="out of order">out of order</option>
            <option value="lost">lost</option>
        </select>
        <input type="submit" value="Add" class="btn">
        

      </form>
    </div>
  
  </div>
 
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="js/anim.js"></script>
<script>
    $(document).ready(function(){
        $("#filter").on('change',function(){
            var value=$(this).val();
            $.ajax({
                url:"fetch.php", 
                type:"POST",
                data:'request=' + value,
                beforeSend:function(){
                    $(".box-container").html("<span>WORKING...</span>");

                },
                success:function(data){
                    $(".box-container").html(data);
                }

            });
         
            
        });
        $("#datefilter").on('change',function(){
            var value=$(this).val();
            $.ajax({
                url:"fetch.php",
                type:"POST",
                data:'request=' + value,
                beforeSend:function(){
                    $(".box-container").html("<span>WORKING...</span>");

                },
                success:function(data){
                    $(".box-container").html(data);
                }

            });
         
            
        });

    });
</script>
</body>
</html>
