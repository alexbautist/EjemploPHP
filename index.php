<?php
require_once './Config.php';
$loginURL= $gC->createAuthUrl();
if(isset($_SESSION["access_token"])){
    $email=$_SESSION["email"];
}
else{$email="Anonyme";}

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
        <link rel="stylesheet" href="CSS/index.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <div style="display:none" id="modifierData" > 
            <form id="formModifier">
                <input type="hidden" name="action" value="update">
                <input type="hidden" id="idMod" name="id" value="">
                <input type="date" name="date" id="dateMod">
                <input type="text" name="name" id="nameMod">
                <input type="submit" id="modifier" value="Modifier">
            </form>
        </div>
                <div style="display:none" id="ajouterPersonne" > 
            <form id="personne">
                <input type="hidden" name="action" value="update">
                <input type="hidden" id="idMod" name="id" value="">
                <input type="text" name="nom" id="nomPer">
                <input type="text" name="name" id="nameMod">
                <input type="submit" id="ajouter" value="Ajouter">
            </form>
        </div>
        <div class="container">
            <div class="container flex-container">
                <div class="row">
                    <div class="col-12">Ma TO DO List</div>
                    <button onclick="window.location= '<?php echo $loginURL ?>'">Login with Google</button>
                    <button onclick="window.location='logout.php'">Logout</button>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <form id="formAjouter">
                            <input type="hidden" name="action" value="add">
                            <input type="date" name="date" id="date">
                            <input type="text" name="name" id="name">
                            <input type="submit" class="ajt" id="ajouter" value="Ajouter">
                        </form>
                    </div>
                </div>
                <div class="row list"> 
                    <table id="tabla" class="table">
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>   
                            <th scope="col">Responsable</th>
                            <th scope="col">Action</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>   
        <script src="JS/index.js"></script>
    </body>
</html>
