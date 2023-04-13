<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pricing</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Lustria&family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="Assets/css/myStyle.css" type="text/css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Assets\img\LogoBlackTransparent.png">
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <section class ="header-section"> 
                        <h1>Pricing</h1>
                    </section>
                    <section id = "commissions" class ="subHeading-section">
                            <h4> Commissions </h4>
                    </section>
                    <div class = "scroll body-section">
                        <ul id = "selectedWorks">
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </li>
                        </ul>
                    </div>
                    <section id = "faq" class ="subHeading-section"> 
                    <h4> FAQs </h4>
                    </seciton>
                    <div class="accordion accordion-flush-accordion" id="pricingInfo">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed customAccordionButton" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Payment Methods
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul id = "paymentFAQ">
                                    <li>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed customAccordionButton" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Copyright
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul id = "copyrightFAQ">
                                        <li>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </li>
                                        <li>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </li>
                                        <li>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id = "sampleImages" class="col-md-4">
                    <div class="card pricing_imgTop pricing_imgLeft" style="height: 15rem; width: 18rem;">
                        <img src="Assets/img/PricingSample_1.png"  class="card-img-top" alt="Digtal portrait of a person on a black and red background"">
                        <div class="card-body">
                            <p class="card-text">$ 0.00</p>
                        </div>
                    </div>
                    <div class="card pricing_imgBottom pricing_imgLeft" style="height: 15rem; width: 18rem;">
                        <img src="Assets/img/PricingSample_2.jpg" class="card-img-top" alt="Black and white print of a person on an abstract background">
                        <div class="card-body">
                            <p class="card-text">$ 0.00</p>
                        </div>
                    </div>
                </div>
                <div id = "sampleImages" class="col-md-4">
                    <div class="card pricing_imgTop pricing_imgRight" style="height: 15rem; width: 18rem;">
                        <img src="Assets/img/PricingSample_3.jpg"  class="card-img-top" alt="Digital portrait of a person in yellow on a black background">
                        <div class="card-body">
                            <p class="card-text">$ 0.00</p>
                        </div>
                    </div>
                    <div class="card pricing_imgBottom pricing_imgRight" style="height: 15rem; width: 18rem;">
                        <img src="Assets/img/PricingSample_4.png" class="card-img-top" alt="Digtal abstract art in black red and white">
                        <div class="card-body">
                            <p class="card-text">$ 0.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php include('footer.php'); ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>