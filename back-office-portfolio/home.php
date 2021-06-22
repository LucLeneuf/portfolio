<?php
session_start();

if ($_SESSION['username']) {
    echo $_SESSION['success'];

    require_once('db_connect.php');
    $sql = 'SELECT * FROM `projects`';
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    /*  var_dump($result); */
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <?php

    foreach ($result as $project) {
    ?>
        <a href="project-details.php?id=<?= $project['project_id'] ?>"><?= $project['project_title'] ?></a>
    <?php
    }
    ?>



    <a href="add-form.php"><button>ajouter un projet</button></a>

</body>

</html>