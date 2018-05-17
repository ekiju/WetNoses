<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="./../../assets/css/reset.css">
	<link rel="stylesheet" href="./../../assets/css/style.css">
    <link rel="stylesheet" href="./../../assets/css/demo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>
        h3#intro {
            text-align:center;
        }
    </style>
	<title>WetNoses</title>
</head>
<body>
<?php $this->load->view("partials/header") ?>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('./../../assets/images/slide1.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Play and Earn!</h3>
              <p>Sign up today to connect with dog owners and get paid playing with their dogs!</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('./../../assets/images/slide2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Dog Owners,</h3>
              <p>Find your dog a playmate</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('./../../assets/images/slide3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Independence</h3>
              <p>You decide the payment, and make your own unique request</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- <div class="container"> -->
        <div class="jumbotron">
            <h3 id="intro">Make sure your best friend gets the love he needs, or get paid to play with dogs!</h3><hr>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card" style="width: 27rem; height: 14rem; ">
                        <div class="card-body">
                            <h5 class="card-title">For busy Dog Owners</h5>
                            <p class="card-text">As dog owners, we want the best for our dogs. But sometimes we don't have the time or energy to give the attention and exercise they need. Through WetNoses, you can request other dog-lovers to spend time with your dog. You can request special instructions, and set your own payment!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card" style="width: 27rem; height: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">For all Dog Lovers</h5>
                            <p class="card-text">Love dogs but don't have one of your own? You can sign up to get paid to play with other people's dogs! Browse and select the animal you want to take care of. Take them to a vet, or to a dog park, or simply frolic on the grass with them!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <img src="./../../assets/images/image-icon1.png" alt="">
                    <p>Create and browse requests</p>
                    <img src="./../../assets/images/image-icon11.png" alt="">
                    <p>Select the ones you like!</p>
                </div>
            </div>
        </div>
    <!-- </div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>