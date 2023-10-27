<?php 
session_start();
include_once('db_conn.php');


    if(isset($_GET['comp'])){
        $id=$_GET['comp'];
        $stmt = $conn->prepare(
            "DELETE FROM composant WHERE id=$id;");
        $stmt->execute();
        header("Location: home.php?success=Composant deleted");
    }    
   


 ?>