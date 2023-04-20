<!-- PHP for setting current page -->
<?php $currentPage = basename($_SERVER['PHP_SELF']);?>

<!-- ==== Header Start ==== -->
<nav id = "header" class="navbar fixed-top navbar-expand-lg p-0" style = "background-color: #800035;" >
    <div class="container-fluid">
        <a id = "RenataSalazarLogo" class="navbar-brand p-0 m-1" href="index.php" aria-current="page">
            <img src="Assets\img\LogoWhiteTrasparent.png" width="125" height="75" alt="Renata Salazar Logo ">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <!-- add the active class if current page = page for that link -->
                <li id = "AboutMeLink" class="nav-item <?php if ($currentPage == 'aboutMe.php') { echo 'active'; } ?>">
                    <a class="nav-link" href="aboutMe.php">About Me</a>
                </li>
                <li id = "GalleryLink" class="nav-item <?php if ($currentPage == 'gallery.php') { echo 'active'; } ?>">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <li id = "PricingLink" class="nav-item <?php if ($currentPage == 'pricing.php') { echo 'active'; } ?>">
                    <a class="nav-link" href="pricing.php">Pricing</a>
                </li>
                <li id = "ContactMeLink" class="nav-item <?php if ($currentPage == 'contactMe.php') { echo 'active'; } ?>">
                    <a class="nav-link" href="contactMe.php">Contact Me</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ==== Header End ==== -->