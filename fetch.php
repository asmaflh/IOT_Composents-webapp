<?php 
session_start();
include_once('db_conn.php');

    if(isset($_POST['request'])){
        $request=$_POST['request'];
        $stmt = $conn->prepare(
            "SELECT * FROM composant WHERE etat LIKE '%{$request}%' OR date_achat LIKE '%{$request}%' ORDER BY id DESC ;");
        $stmt->execute();
        $results = $stmt->fetchAll();
        ?>
        <?php
        foreach($results as $row)
        {
            ?>
            <div class="box">
            <img src="images/image_comp/<?=$row['image']?>" alt="" >
             <div class="content">
                 <div class="icons">
                     <a href="#"> <i class="fas fa-circle"></i> <?php echo $row['etat']?> </a>
                     <a href="#"> <i class="fas fa-calendar"></i> <?php echo $row['date_achat']?> </a>
                 </div>
                 <h3><?php echo $row['nom']?></h3>
                 <p>qte: <?php echo $row['qte']?></p>
                 <a href="display_comp.php?comp=<?php echo $row['id']?>" class="btn">modify</a>
                 <a href="delete_item.php?comp=<?php echo $row['id']?>" class="btn">delete</a>
                
             </div>
         </div>
         <?php
        }
        
        }
    

   
   

   


 ?>