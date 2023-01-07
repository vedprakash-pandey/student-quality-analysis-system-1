<?php

require "connect.php";

$query1 ="select * from minfo";
$result = mysqli_query($conn,$query1) or die("query failed");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- external css file  -->
    <link rel="stylesheet" type="text/css" href="css/adminhome.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

    <!-- link for icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Header Icons-->
    <?php
        include "AdminHeader.php";
    ?>

    <!-- navigation bar -->
    <?php
        include "Adminhomenav.php";
    ?>


    <!--Home Page Carousel and Content-->
    <div class="container-fluid MyContainer" style="background:gray">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block " src="img/img_bg_1.jpg" alt="First slide" width="100%" height="480px"
                        style="opacity:0.6">
                    <div class="centered">
                        <h1 style="color:white;font-weight:bold;">We Help You to Learn New Things</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block " src="img/img_bg_2.jpg" alt="Second slide" width="100%" height="480px"
                        style="opacity:0.6">
                    <div class="centered">
                        <h1 style="color:white;font-weight:bold;">The Great Aim of Education is not Knowledge, But
                            Action</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block " src="img/img_bg_3.jpg" alt="Second slide" width="100%" height="480px"
                        style="opacity:0.6">
                    <div class="centered">
                        <h1 style="color:white;font-weight:bold;">The Roots of Education are Bitter, But the Fruit is
                            Sweet</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block " src="img/img_bg_4.jpg" alt="Third slide" width="100%" height="480px"
                        style="opacity:0.6">
                    <div class="centered">
                        <h1 style="color:white;font-weight:bold;">We Run They Learn</h1>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container-fluid text-center bg-grey" style="background:white">
        <h2 style="color:gray" class="quotes">Quotes</h2> <br>
        <div class="row text-center">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="img/thought1.jpg" alt="Charles Babbage" width="50%">
                    <p><strong>Charles Babbage</strong></p>
                    <p>"The function of education is to teach one to think intensively and to think critically.
                        Intelligence plus
                        character – that is the goal of true education."</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="img/thought2.jpg" alt="Albert Einstein" width="50%">
                    <p><strong>Albert Einstein</strong></p>
                    <p>"The striving for truth and knowledge is one of the highest of man’s qualities – though often the
                        pride is
                        most loudly voiced by those who strive the least.”</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="img/apj.jpg" alt="APJ Abdul Kalam" width="50%">
                    <p><strong>APJ Abdul Kalam</strong></p>
                    <p>“Creativity is related to imagination and imagination is related to innovation. Innovation itself
                        is unique
                        for everyone that conceives a fresh idea and converts the idea into a success.”</p>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php
        include "footer.php";
    ?>

</body>

</html>