<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<style>
/* add css to html file */
*{
    box-sizing: border-box;
}
.container{
    width: 50%;
    margin: 0 auto;
    padding: 0 15px;
}
h1{
    text-align: center;
    margin: 10px 0;
}

body{
    background-color: #f2f2f2;
    font-family: sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    margin: 0;
    padding: 0;
}
.form{
    margin: 10px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.form label{
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.form input{
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.form input:focus{
    border-color: #66afe9;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}
.form input[type="submit"]{
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.form input[type="submit"]:hover{
    color: #fff;
    background-color: #286090;
    border-color: #204d74;
}



</style>
<body>
   
    <div class="container">
    <h1>Formulaire</h1>
    <form action="exportword.php" method="post">
        <div class="form">
            <label for="nom">Nom etudiant</label>
            <input type="text" name="nom" id="nom" placeholder="Nom etudiant">
        </div>
        <div class="form">
            <label for="composant">Nom composant</label>
            <input type="text" name="composant" id="composant" placeholder="Nom composant">
        </div>
        <div class="form">
            <label for="qte">Quantité</label>
            <input type="text" name="qte" id="qte" placeholder="Quantité">
        </div>
        <div class="form">
            <input type="submit" value="Envoyer">
        </div>
    </form>
    </div>


 

</body>
</html>