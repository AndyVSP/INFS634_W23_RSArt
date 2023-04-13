<?php 
require 'Database/db_login.php';
$get_workInfo = "SELECT work.*, tag.Name FROM work 
    LEFT JOIN  tag_work ON work.id = tag_work.WORK_id
    LEFT JOIN tag ON tag_work.TAG_id = tag.id
    WHERE work.id = '".$_GET['id']."'";

$stmt = $conn->query($get_workInfo);
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Work</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Lustria&family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="Assets/css/myStyle.css" type="text/css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Assets\img\LogoBlackTransparent.png">
    </head>

    <body>
        <?php include('header.php'); ?>

        <div id = workLayout class="container-fluid d-flex">
            <div class="row"> 
            <?php  while($results= $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                <div id = "workInfo" class="col-md-4">
                    <h1 class = "header-section">
                        <?php echo $results['Title']?>
                    </h1>
                    <br>
                    <h4 id = descriptionHeading class = "subHeading-Section"> 
                        Description
                    </h4>
                    <p class = "body-section">
                </div>
                <div id = "workImage" class="col-md-8">
                </div>
                <?php } ?>
            </div>
            
        </div>

        <?php include('footer.php'); ?>
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body> 
</html>