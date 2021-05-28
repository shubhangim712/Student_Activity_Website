<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Student Activity Website</title>

    
    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-light" style="background-color: #F7DC6F;">
  <!-- Brand -->
  <a class="navbar-brand" >Student Activity</a>

  
    <div class="align-self-end ml-auto">
      <a class="btn btn-outline-dark" href="login.php" role="button">Sign in</a>
    </div>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="register.php">Sign Up<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="peoplesearching.php">People Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="roommatesearch.php">Roommate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./activities/activities.php">Events & Activities</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./purchasing/mealplan.php">Meal Plan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./purchasing/busTickets.php">Bus Tickets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./purchasing/textbook.php">Textbooks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./shopping_cart/showOrder.php">Shopping Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="information_Update.php">Update Information</a>
      </li>

    </ul>
  </div>
</nav>
<main role="main">
<div class="jumbotron" style="min-width: 1000%">
  <h1 class="display-4">Student Union Election</h1>
  <p class="lead">Voting has started! You can cast your vote here!!</p>
  <hr class="my-4">
  <p>Student Head Voting</p>
  <a class="btn btn-primary btn-lg" href="poll.php" role="button">Vote!</a>
</div>
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
  <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img xlink:href="images/edit.svg" height="225px" src="images/meal.jpg"  title="Logo of a company" alt="Logo of a company" /><rect width="100%" height="225px" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body mt-2 pd-2" style="min-height: 210px">
                <p class="card-text">Browse different meal plans. Get 5% discount on your purchase of worth $600 and above! </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onClick="document.location.href='./purchasing/mealplan.php'" >Browse</button>

                </div>
                </div>
            </div>
          </div>
        </div>
    <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img xlink:href="images/edit.svg" height="225px" src="images/bus.jpg"  title="Logo of a company" alt="Logo of a company" /><rect width="100%" height="225px" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body mt-2 pd-2" style="min-height: 210px">
              <p class="card-text">Browse to purchase different bus tickets online by credit card. You can choose multiple plans and buy multiple tickets. </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onClick="document.location.href='./purchasing/busTickets.php'">Browse</button>

                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" >
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img xlink:href="images/edit.svg" height="225px" src="images/book.jpg"  title="Logo of a company" alt="Logo of a company" /><rect width="100%" height="225px" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body mt-2 pd-2" style="min-height: 210px">
                <p class="card-text">Search the library for different textbooks based on the book title, category, author, or ISBN.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onClick="document.location.href='./purchasing/textbook.php'">Browse</button>

                </div>

              </div>
            </div>
          </div>
        </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  });
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
