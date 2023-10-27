<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    
    
/* style button on right */
/* .form input[type="submit"]{
    float: right;
}  */
/* style the div button */
.form{
    margin: 20px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
/* center the button */
.form input[type="submit"]{
    margin: 0 auto;
    display: block;
}

/* style the button */
.form input[type="submit"]{
    display: block;
    width: 50%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #337ab7;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
/* style the button on hover */
.form input[type="submit"]:hover{
    border-color: #66afe9;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}
/* style the button on focus */
.form input[type="submit"]:focus{
    border-color: #66afe9;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}
/* style the button on active */
.form input[type="submit"]:active{
    background-image: none;
    outline: 0;
    box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
}
/* style the button on disabled */
.form input[type="submit"]:disabled{
    cursor: not-allowed;
    background-color: #e6e6e6;
    opacity: .65;
}



 
    
/* style   table */
.table-responsive{
    margin: 10px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-responsive table{
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
}
.table-responsive table th{
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    text-align: left;
}
.table-responsive table td{
    border: 1px solid #ddd;
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    text-align: left;
}
.table-responsive table tr:nth-child(even){
    background-color: #f9f9f9;
}
.table-responsive table tr:hover{
    background-color: #f5f5f5;
}











   



    
   
    

    
</style>
<body>
    
    
    <!-- add export word button -->
    <div class="container">
    <form action="word.php" method="post">
        <div class="form">
            <input type="submit" name="save" value="Export Word">
        </div>
    </form>
    </div>

    <!-- table  formulaire -->
   
    <div name="table" class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom Etudiant</th>
                    <th>Composant</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                Include 'db_conn.php';
                $select = $conn->prepare("SELECT * FROM compoetud");
                $select->execute();
                while($s=$select->fetch(PDO::FETCH_OBJ)){
                ?>
                <tr>
                    <td><?php echo $s->nom; ?></td>
                    <td><?php echo $s->composant; ?></td>
                    <td><?php echo $s->qte; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
 
<!--  add button export word -->





    
</body>
    
</html>