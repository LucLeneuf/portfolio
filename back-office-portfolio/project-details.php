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
    <title>Project-details</title>
</head>
<body>

    <?=$result ['project_title'] ?> <br><br>
    <?=$result ['project_context'] ?> <br><br>
    <img src='../assets/<?=$result ['project_picture']; ?>'> <br><br>
    <?=$result ['project_specs'] ?> <br><br>

    <a href="project-edit.php?id=<?= $result['project_id']?>"><button>modifier <?= $result['project_title']?></button></a> 
    <a href="project-delete.php?id=<?= $result['project_id']?>"><button>supprimer <?= $result['project_title']?></button></a> 
    <a href="home.php"><button>retour</button></a>
    
</body>
</html>

