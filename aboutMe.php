<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Me</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Lustria&family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="Assets/css/myStyle.css" type="text/css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Assets\img\LogoBlackTransparent.png">
    </head>
    <body>
        <?php include('header.php'); ?>
        
        <!-- ==== About Me Start ==== -->
        <div class="container-fluid d-flex">
            <div class="col-md-7">
                <!-- ==== Heading ==== -->
                <h1 class ="header-section" >About Me</h1>
                <!-- ==== Main Text ==== -->
                <p class ="body-section">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Fusce mi nibh, suscipit quis ipsum et, facilisis vehicula risus. 
                    Nulla lacinia ipsum sed erat molestie rhoncus. Praesent venenatis magna sed ultricies iaculis. Fusce sed rutrum nisi. 
                    Pellentesque blandit, nisl lacinia tincidunt molestie, libero mi blandit lorem, a fringilla neque leo at ante.
                    Mauris consectetur nunc hendrerit, vehicula erat ut, porttitor massa. Vivamus pretium quis diam eu laoreet. 
                    Aenean quam purus, sagittis at neque ac, pharetra eleifend lacus. Aenean vel elit nunc. In sagittis elit sit amet arcu fringilla, ut molestie massa rutrum. 
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris vel quam in elit interdum tempor vitae a purus. Pellentesque at cursus augue. 
                    Suspendisse posuere volutpat vestibulum. Ut sem magna, rhoncus in odio nec, vehicula ornare nibh. Suspendisse potenti. 
                </p> 
                <!-- ==== Selected Works Start ==== -->
                <h2 class ="subHeading-section"> Selected Works: </h2>
                <ul id = "selectedWorks">
                    <li>
                        <a alt="link to artwork page" href="work.php?id=8">Fei. Description and other relevant info. February 2023.</a>
                    </li>
                    <li>
                        <a alt="link to artwork page" href="work.php?id=22">She. Description and other relevant info. March 2023.</a>
                    </li>
                    <li>
                        <a alt="link to artwork page" href="work.php?id=14">Legion. Description and other relevant info. October 2022.</a>
                    </li>
                </ul>
            </div>
            <!-- ==== Selected Works End ==== -->
            <!-- ==== Image ==== -->
            <div id = "aboutMeImage" class="col-md-5">
                <a alt="link to artwork page" href="work.php?id=18">
                    <img src="Assets/img/AboutMeImage.jpg"  alt="painting of a group of people at a red waterfall with a capybara in the foreground">
                </a>
            </div>
        </div>
        <!-- ==== About Me End ==== -->

        <?php include('footer.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>