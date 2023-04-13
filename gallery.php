<?php 
require 'Database/db_login.php'; 
$get_imageInfo = "SELECT * FROM image JOIN work ON image.WORK_id = work.id ORDER BY work.Date DESC";
$stmt = $conn->query($get_imageInfo);
$image_Info = $stmt->fetchAll(PDO::FETCH_ASSOC); 


$get_tagName = "SELECT Name FROM tag";
$stmt_2 = $conn->query($get_tagName);
$tag_names = $stmt_2->fetchAll(PDO::FETCH_COLUMN); 

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gallery</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Lustria&family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="Assets/css/myStyle.css" type="text/css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Assets\img\LogoBlackTransparent.png">
    </head>

    <body>
        <?php include('header.php'); ?>


        <div id = galleryLayout class="container-fluid d-flex">
            <div class="row"> 
                <div id = "filterCol" class="col-md-2">
                    <div id="galleryFilter" class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </button>
                        <ul class="dropdown-menu">
                        <?php foreach ($tag_names as $tag): ?>
                                <li><a class="dropdown-item" href="#"><?php echo $tag?></a></li>
                                
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <div id = "galleryThumbnails" class="col-md-10">
                <?php $i = 0; ?>
                <?php foreach ($image_Info as $info): ?>
                    <?php if ($i % 4 == 0): ?>
                        <div class="row">
                    <?php endif; ?>
                    <div class="col-md-3">
                        <a href="work.php?id=<?php echo urlencode($info['WORK_id']) ?>">
                            <img src="<?php echo $info['Path'] ?>" class = "img-thumbnail">
                        </a>
                    </div>
                    <?php $i++; ?>
                    <?php if ($i % 4 == 0): ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($i % 4 != 0): ?>
                        </div>
                <?php endif; ?>
            </div> 
            </div>
        </div>

        <?php include('footer.php'); ?>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body> 
</html>