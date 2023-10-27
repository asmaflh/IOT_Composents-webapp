<?php 
session_start();
include_once('db_conn.php');

    if(isset($_GET['comp'])){
        $id=$_GET['comp'];
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png"); 

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'images/image_comp/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Insert into Database
            $stmt = $conn->query(
                "UPDATE composant SET image='$new_img_name' WHERE id=$id;");
          
          

        }
    
    $name=$_POST['nom'];
    $date=$_POST['date'];
    $qte=$_POST['qte'];
    $statut=$_POST['statut'];
    $modifier=$_POST['modifier'];
    $cancel=$_POST['cancel'];
    if($modifier){
        $stmt = $conn->query(
            "UPDATE composant SET nom='$name',date_achat='$date',qte=$qte,etat='$statut' WHERE id=$id;");
        header("Location: home.php?success=Composant modified");
    }elseif($cancel){
        header("Location: home.php");
    }    
   

}


 ?>