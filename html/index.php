<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="../css/bootstrap.css" rel="stylesheet"/>
    <title>bed and breakfast</title>
</head>
<body>
<nav class="navbar navbar-expand-lg myNavbar bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand personal-link" href="index.php">BED&BREAKFAST</a>
        <button class="custom-toggler navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active personal-link" aria-current="page" href="#Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="#position">dove siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="prenota.php">le nostre camere</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="prenota.php">galleria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link personal-link" href="#contact">contattaci</a>
                </li>
            </ul>
            <?php
            session_start();
            echo "<script>console.log(': " . $_SESSION['user'] . "' );</script>";

            if (isset($_SESSION['user'])) {
                ?>
                <a class="btn btn-outline-success" href="loggedin.php"><i class="far fa-user-circle"></i></a>
                <?php
            } else {
                ?>
                <a class="btn btn-outline-success" href="login.html">Login</a>
                <?php
            } ?>

        </div>
    </div>
</nav>
<div id="carouselExampleIndicators" class="carousel slide myCarousel" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../img/barrierearchitettoniche-bedandbreakfast.jpg" class="w-100 h-75">
        </div>
        <div class="carousel-item">
            <img src="../img/barrierearchitettoniche-bedandbreakfast.jpg" class="w-100 h-75">
        </div>
        <div class="carousel-item">
            <img src="../img/aprire-un-bed-and-breakfast-2-2.jpg" class="w-100 h-75">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container my-5" id="Home">
    <div class="row">
        <div class="col-lg-6">
            <img src="../img/toscana-pienza.jpg" alt="Image" class="img-fluid tm-intro-img"/>
        </div>
        <div class="col-lg-6 center">
            <div class="tm-intro-text-container">
                <h2 class="tm-text-primary mb-4 tm-section-title">Benvenuti sul nostro sito!</h2>
                <p class="mb-4 tm-intro-text">
                    godetevi un soggiorno indimenticabile immersi nella meraviglia dei colli toscani.
                </p>
                <div class="tm-next">
                    <a class="" href="prenota.php">
                        <button class="btn btn-success">Prenota ora!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="slideshow-container">
    <div class="slideshow-inner">
        <div class="mySlides fade">

            <img src='https://www.agriturismi.it/img/strutture/1241/est_esterno_20110817154259d.jpg'
                 alt="sally lightfoot crab"/>
            <div class="text">Sally Lightfoot Crab</div>
        </div>

        <div class="mySlides fade">
            <img src='https://www.bbitalia.it/IMAGES/foto/small/26301-2019-03-26-18-37-22-105.jpg' style='width: 100%;'
                 alt="fighting nazca boobies"/>
            <div class="text">A scuffle between two Nazca Boobies</div>
        </div>

        <div class="mySlides fade">

            <img src='https://dhqbz5vfue3y3.cloudfront.net/fotobbit/55323/4/z_20210621_07142370.jpg?rfh=1'
                 style='width: 100%;' alt="otovalo waterfall"/>
            <div class="text">A waterfall discovered on a hike in Otovalo</div>
        </div>

        <div class="mySlides fade">

            <img src='https://dhqbz5vfue3y3.cloudfront.net/fotobbit/55323/4/z_20210621_07142370.jpg?rfh=1'
                 style='width: 100%;' alt="pelican"/>
            <div class="text">Pelican</div>
        </div>

    </div>


    <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
    <a class="next" onclick='plusSlides(1)'>&#10095;</a>
</div>
<br/>


<div style='text-align: center;'>
    <span class="dot" onclick='currentSlide(1)'></span>
    <span class="dot" onclick='currentSlide(2)'></span>
    <span class="dot" onclick='currentSlide(3)'></span>
    <span class="dot" onclick='currentSlide(4)'></span>
</div>

</div>
<div class="container my-5" id="position">
    <div class="row">
        <div class="col-lg-6 center">
            <div class="tm-intro-text-container">
                <h2 class="tm-text-primary mb-4 tm-section-title">Vienici a trovare!</h2>
                <p class="mb-4 tm-intro-text">
                    ci troviamo a pochi km da firenze,in un borgo medievale immerso nei colli toscani adatto ad un
                    soggiorno immersi nella tranquillità e nella bellezza della natura.
                </p>
                <div class="tm-next">
                    <a class="" target="_blank" href="https://g.page/b-b-torrebianca-tuscany?share">
                        <button class="btn btn-success">Andiamo!</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d738359.0621174853!2d10.438283124859256!3d43.7060790192977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132bae653f04f761%3A0xa0e76c44b2ccc25!2sB%26B%20Torrebianca%20Tuscany!5e0!3m2!1sit!2sit!4v1649141244012!5m2!1sit!2sit"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<!-- Carousel wrapper -->

<!-- Carousel wrapper -->
<div class="container-contact100" id="contact">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form">
<span class="contact100-form-title">
Send Us A Message
</span>
            <label class="label-input100" for="first-name">Tell us your name *</label>
            <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
                <input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                <input class="input100" type="text" name="last-name" placeholder="Last name">
                <span class="focus-input100"></span>
            </div>
            <label class="label-input100" for="email">Enter your email *</label>
            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
                <span class="focus-input100"></span>
            </div>
            <label class="label-input100" for="phone">Enter phone number</label>
            <div class="wrap-input100">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
                <span class="focus-input100"></span>
            </div>
            <label class="label-input100" for="message">Message *</label>
            <div class="wrap-input100 validate-input" data-validate="Message is required">
                <textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
                    Send Message
                </button>
            </div>
        </form>


        <div class="contact100-more flex-col-c-m" style="background-image: url('/img/1-26.jpg');">
            <div class="flex-w size1 p-b-47">
                <div class="txt1 p-r-25">
                    <span class="lnr lnr-map-marker"></span>
                </div>
                <div class="flex-col size2">
<span class="txt1 p-b-20">
Address
</span>
                    <span class="txt2">
Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US
</span>
                </div>
            </div>
            <div class="dis-flex size1 p-b-47">
                <div class="txt1 p-r-25">
                    <span class="lnr lnr-phone-handset"></span>
                </div>
                <div class="flex-col size2">
<span class="txt1 p-b-20">
Lets Talk
</span>
                    <span class="txt3">
+1 800 1236879
</span>
                </div>
            </div>
            <div class="dis-flex size1 p-b-47">
                <div class="txt1 p-r-25">
                    <span class="lnr lnr-envelope"></span>
                </div>
                <div class="flex-col size2">
<span class="txt1 p-b-20">
General Support
</span>
                    <span class="txt3">
contact@example.com
</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
</script>
<script src="../js/carousel.js"></script>
<script src="../js/main.js"></script>
</body>
</html>