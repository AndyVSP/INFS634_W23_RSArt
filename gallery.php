<!-- ==== PHP for getting Gallery Database Info Start ==== -->
<?php 
//Connect to database
require 'Database/db_login.php'; 
//initialize variables for the current selected tag and the image information
$selected_tag = "";
$get_imageInfo = '';
//get selected tag
$selected_tag = $_GET['tag'] ?? '';
//if selected tag variable is not empty run get_imageInfo = SQL query that joins the work, image, tag_work, and tag tables
//and order images by the artwork date of creation in descending order so that more recent ones are displayed first
if ($selected_tag){
    $get_imageInfo = " SELECT * FROM image 
    JOIN work ON image.WORK_id = work.id 
    JOIN tag_work ON tag_work.WORK_id = work.id 
    JOIN tag ON tag_work.TAG_id = tag.id 
    WHERE tag.Name = :tag 
    ORDER BY work.Date DESC";
    $stmt = $conn->prepare($get_imageInfo);
    $stmt->bindParam(':tag', $selected_tag, PDO::PARAM_STR);
    $stmt->execute();
//if selected tag is empty get_image info = SQL query that just joins the image table and the work table
//and displays the most recent first
} else {
    $get_imageInfo = "SELECT * FROM image JOIN work ON image.WORK_id = work.id ORDER BY work.Date DESC";
    $stmt = $conn->query($get_imageInfo);}
//image_Info = results from the get_imageInfo SQL query
$image_Info = $stmt->fetchAll(PDO::FETCH_ASSOC); 
//get_tagName = SQL quuery to retrive data from Name column in tag table
$get_tagName = "SELECT Name FROM tag";
$stmt_2 = $conn->query($get_tagName);
//tag_names = results from that query
$tag_names = $stmt_2->fetchAll(PDO::FETCH_COLUMN); 
?>
<!-- ==== PHP for getting Gallery Databse Info End ==== -->

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

<!-- ==== Gallery Start==== -->
        <div id = galleryLayout class="container-fluid">
            <div class="row"> 
                <!-- ==== Filter Start ==== -->
                <div id = "filterCol" class="col-md-2">
                    <div id="galleryFilter" class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </button>
                        <ul id="tag-dropdown" class="dropdown-menu">
                        <!-- loading tag names -->
                        <?php foreach ($tag_names as $tag): ?>
                            <!-- Changing the color of the tag if it is active, and making it lead back to the unflitered gallery if clicked again -->
                            <?php if ($tag == $selected_tag): ?>
                                <li><a alt = "remove tag filter" class="dropdown-item" href="?" style = "background-color: #C4B2B5;"><?php echo $tag?></a></li>
                            <!-- if tag is not selected then  clicking the tag just applies the filter to the gallery by adding the tag to the url -->
                            <?php else: ?>
                                <li><a alt = "apply tag filter" class="dropdown-item" href="?tag=<?php echo urlencode($tag) ?>"><?php echo $tag?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- ==== Filter End ==== -->
                <!-- ==== Thumbnails Display Start ==== -->
                <div id = "galleryThumbnails" class="col-md-10">
                    <!-- displaying four thumbnails per row using i as a counter -->
                    <?php $i = 0; ?>
                    <?php foreach ($image_Info as $info): ?>
                        <?php if ($i % 4 == 0): ?>
                            <div class="row">
                        <?php endif; ?>
                        <div class="col-md-3">
                            <!--  adding the work id to the image url  -->
                            <a alt="link to artwork page" href="work.php?id=<?php echo urlencode($info['WORK_id']) ?>">
                                <img src="<?php echo $info['Path'] ?>" class = "img-thumbnail" alt= "Thumbnail of image titled <?php echo $info['Title'] ?>" >
                            </a>
                        </div>
                        <?php $i++; ?>
                        <?php if ($i % 4 == 0): ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <!--  closing the last div even if there are less than 4 thumnails in it-->
                    <?php if ($i % 4 != 0): ?>
                            </div>
                    <?php endif; ?>
                </div> 
                <!-- ==== Thumnail Display End ==== -->
            </div>
        </div>
<!-- ==== Gellery End==== -->

        <?php include('footer.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body> 
</html>