<?php

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    
    body {
      background-image: url("images/bkg.jpg")
    }

    .flip-card {
      background-color: transparent;
      width: 300px;
      display: flex;
      align-items: center;
      height: 300px;
      border: 1px solid #f1f1f1;
      perspective: 1000px;
      /* Remove this if you don't want the 3D effect */
    }

    /* This container is needed to position the front and back side */
    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    /* Do an horizontal flip when you move the mouse over the flip box container */
    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    /* Position the front and back side */
    .flip-card-front,
    .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      /* Safari */
      backface-visibility: hidden;
    }

    /* Style the front side (fallback if image is missing) */
    .flip-card-front {
      background-color: rgb(44, 43, 43);
      color: rgba(238, 206, 117, 0.959);
    }

    /* Style the back side */
    .flip-card-back {
      background-color: rgb(16, 17, 17);
      color: rgba(238, 206, 117, 0.959);
      transform: rotateY(180deg);
    }

    p {
      margin-top: 103px;
    }

    .row {
      --bs-gutter-x: -27.5rem;
      margin-top: 30px;

    }

    marquee {
      width: 100%;
      padding: 10px 0;
      background-color: rgb(44, 43, 43);
      color: rgba(238, 200, 95, 0.959);
      margin-top: 3%;
    }
  </style>

</head>

<body>

  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="">Spark's Bank</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
              aria-expanded="false">Services</a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="add_customer.php">Add Customer</a></li>
              <li><a class="dropdown-item" href="customer.php">View Customer</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="transfer.php">Transfer Money</a></li>
            </ul>
          </li>
          
         
        </ul>
      
      </div>
    </div>
  </nav>

  <div class="container row">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <br><br><br>
          <h3>Our</h3>
          <h3>Mission</h3>
          <h3>Statement</h3>
        </div>
        <div class="flip-card-back">

          <p>To inspire students, help them innovate and let them integrate to build the next generation
            humankind.</p>

        </div>
      </div>
    </div>
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <br><br><br>
          <h3>Our</h3>
          <h3>Vision</h3>
          <h3>Statement</h3>
        </div>
        <div class="flip-card-back">
          <p>A world of enabled and connected little minds, building future.</p>
        </div>
      </div>
    </div>
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <br><br><br>
          <br>
          <h3>Our</h3>
          <h3>Values</h3>

        </div>
        <div class="flip-card-back">
          <p>Resilience,Commitment ,Respect, Quality, Professionalism, Integrity, People, Training, xcellence </p>

        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <marquee direction="scroll">Fill your 15G form to avoid taxes.  Update Aadhar card .  Do your KYC 
    </marquee>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <canvas></canvas>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>

  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

</body>

</html>