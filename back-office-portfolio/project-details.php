<?php
session_start();

if ($_SESSION['username']) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        require_once('db_connect.php');
        $id = strip_tags($_GET['id']);
        $sql = 'SELECT * FROM `projects` WHERE `project_id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
    } else {
        echo 'id manquant';
    }
} else {
    echo 'identifiez-vous';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Project-details</title>
</head>
<body>
    <div class="marge">

    
        <div class="title">
            <?=$result ['project_title'] ?> <br><br>
        </div>
    <div class="main">
       
            <p class="description"><?=$result ['project_context'] ?></p> <br><br>
            <img src='../assets/<?=$result ['project_picture']; ?>'> <br><br>
        
        <?=$result ['project_specs'] ?> <br><br>

            <div class="button__edit-delete">
                <a href="project-edit.php?id=<?= $result['project_id']?>"><button>modifier <?= $result['project_title']?></button></a> 
                <a href="project-delete.php?id=<?= $result['project_id']?>"><button>supprimer <?= $result['project_title']?></button></a> 
            </div>
    </div>   
            <a href="home.php" class="back"><button>retour</button></a>

 

    </div>
</body>
</html>

