<?php 
session_start();
include_once('db_conn.php');



    $name=$_POST['nom'];
    $date=$_POST['date'];
    $qte=$_POST['qte'];
    $statut=$_POST['statut'];
    if (str_contains($name, 'arduino')) {
        $image='Arduino.jpg';
    }elseif(str_contains($name, 'battery')){
        $image='Battery.jpg';

    }elseif(str_contains($name, 'breadboard')){
        $image='Breadboard.jpg';

    }elseif(str_contains($name, 'button')){
        $image='button.jpg';

    }elseif(str_contains($name, 'capacitor')){
        $image='Capacitor.jpg';

    }elseif(str_contains($name, 'led')){
        $image='led.jpg';

    }elseif(str_contains($name, 'potentiometer')){
        $image='Potentiometer.jpg';

    }elseif(str_contains($name, 'raspberry')){
        $image='Raspberry.jpg';

    }elseif(str_contains($name, 'resistor')){
        $image='resistor.jpg';

    }elseif(str_contains($name, 'wire')){
        $image='wire.jpg';

    }else{
        $image='default.jpg';

    }

    $stmt = $conn->prepare(
        "INSERT INTO composant(id,nom,date_achat,qte,etat,image) VALUES (?,?,?,?,?,?)");
    $stmt->execute(array( null,$name,$date,$qte,$statut,$image));
    
    header("Location: home.php?success=Composant insert correctly");

   

   


 ?>