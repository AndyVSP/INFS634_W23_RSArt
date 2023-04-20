<!-- ==== PHP for getting Work Database Info Start ==== -->
<?php 
//Connect to Databse
require 'Database/db_login.php';
//SQL queries to get the data from the work image and tag tables associated with the work id in the url
//and variables that store the results for these queries
$get_workInfo = "SELECT * FROM work WHERE id = '".$_GET['id']."'";
$stmt = $conn->query($get_workInfo);

$get_workImages = "SELECT Path FROM image WHERE WORK_id = '".$_GET['id']."'";
$stmt_2 = $conn->query($get_workImages);
$images = $stmt_2->fetchAll(PDO::FETCH_ASSOC);

$get_workTags = "SELECT tag.Name, tag.id FROM tag_work
JOIN tag ON tag_work.TAG_id = tag.id
WHERE tag_work.WORK_id = '".$_GET['id']."'";
$stmt_3 = $conn->query($get_workTags);
$tags = $stmt_3->fetchAll(PDO::FETCH_ASSOC);

//getting the id for the current
$current_workId = $_GET['id'];
//SQL queries that get the id for the next and previous work ordered by descendding date, and variavbles that store the result of these queries
$get_nextWork = "SELECT id FROM work WHERE Date < (SELECT Date FROM work WHERE id = $current_workId) ORDER BY Date DESC LIMIT 1";
$stmt_4 = $conn->query($get_nextWork);
$next_workId = $stmt_4->fetchColumn();

$get_prevWork = "SELECT id FROM work WHERE Date > (SELECT Date FROM work WHERE id = $current_workId) ORDER BY Date ASC LIMIT 1";
$stmt_5 = $conn->query($get_prevWork);
$prev_workId = $stmt_5->fetchColumn();
?>
<!-- ==== PHP for getting Work Database Info End ==== -->

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

<!-- ==== Artwork Page Start ==== -->
        <div id = workLayout class="container-fluid d-flex">
            <div class="row"> 
            <?php 
            while($results= $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
             <!-- ==== Work Info Start ==== -->
                    <!-- ==== Title==== -->
                    <div id = "workInfo" class="col-md-5" style = "max-width: 100vw;">
                        <h1 class = "header-section">
                            <?php echo $results['Title']?>
                        </h1>
                        <!-- ==== Navigation Buttons Start ==== -->
                        <div class="navigation-buttons">
                           <!--Only load buttons if there is a next or previous work -->
                            <?php if($prev_workId) { ?>
                                <a alt = "link to previous work" href="work.php?id=<?php echo $prev_workId; ?>" class="btn btn-primary navbutton">
                                    <img src = "Assets\img\arrow_left.png">
                                </a>
                            <?php } ?>
                            <?php if($next_workId) { ?>
                                <a alt = "link to next work" href="work.php?id=<?php echo $next_workId; ?>" class="btn btn-primary navbutton">
                                    <img src = "Assets\img\arrow_right.png">
                                </a>
                            <?php } ?>
                        </div>
                        <!-- ==== Navigation Buttons End ==== -->
                        <!-- ==== Description Heading ==== -->
                        <h2 class = "subHeading-section descriptionHeading"> 
                            Description
                        </h2>
                        <br>
                        <!-- ==== Description Body ==== -->
                        <p class = "body-section">
                            <?php echo $results['Description']?>
                        </p>
                        <br>
                        <!-- ==== Tags Start ==== -->
                        <p style = "margin-left: 7%; font-family: Caveat Brush, cursive">
                                Tags: 
                        <?php foreach ($tags as $key => $tag) {?>
                            <a style= "color: #17000A" href="gallery.php?tag=<?php echo $tag['Name']; ?>"><?php echo $tag['Name']; ?></a>
                            <!--add a comma in between tags-->
                            <?php if ($key < count($tags) - 1) { echo ', '; }
                        } ?>
                        </p>
                        <!-- ==== Tags End ==== -->
                    </div>
                    <!-- ==== Work Info End ==== -->
                     <!-- ==== Image Display Start ==== -->
                    <div id = "imageLayout" class="col-md-7">
                    <!-- Display all images belonging to this artwork -->
                    <?php foreach ($images as $image) {?>
                        <div class = "workImageContainer"> 
                            <!--Link to open image in new tab in browser -->
                            <a alt= "link to open image in browser" href="<?php echo $image['Path']?>" target="_blank">
                                <img id = "workImage" src="<?php echo $image['Path']?>" alt= "image belonging with this work of art">
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                <?php  } ?>
                <!-- ==== Image Display End ==== -->
            </div>
        </div>
        <!-- ==== Artwork Page End ==== -->

        <?php include('footer.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body> 
</html>