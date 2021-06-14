<?php
$insert=false;
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name=$_POST['name'];
    $email= $_POST['email'];
    $phno= $_POST['pno'];
    $address= $_POST['adr'];
    $balance= $_POST['bal'];
    $acct_type=$_POST['acct_type'];
    $sql ="INSERT INTO customer (slno,name,eid,pno,address, acct,acctdate,balance) VALUES (NULL, '$name', '$email', '$phno', '$address', '$acct_type', current_timestamp(), '$balance')";
    $result = mysqli_query($conn , $sql);
    if($result){ 
      $insert=true;
    }
    else{
      echo "The record was not inserted successfully because of this error --->". mysqli_error($conn);
    } 
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Customer</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
      body{
      
      background-image: url("images/bkg.jpg")
    
  }
        .container {

            border-bottom: solid 6px rgba(238, 206, 117, 0.959);
            border-top: solid 6px rgba(238, 206, 117, 0.959);


        }

     
        footer {
            text-align: center;
            background-color: rgb(27, 27, 27);
            color: rgba(238, 206, 117, 0.959);

            bottom: 0;
            position: fixed;
            padding: 10px 10px 0px 10px;
            width: 100%;
            height: 4%;
        }

        
    </style>
</head>

<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="">Spark's Bank</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="dashboard.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Services</a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item active" href="add_customer.php">Add Customer</a></li>
                  <li><a class="dropdown-item" href="customer.php">View Customer</a></li>
                 <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item " href="transfer.php">Transfer Money</a></li>
                </ul>
              </li>           
            </ul>
       
          </div>
        </div>
      </nav>
      <?php
  if($insert){
     echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Inserted!</strong>  Customer record has been inserted successfully
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }
 ?>
    
    <div class="container my-4">
        <h3>Add Customer </h3>
        <hr>
        <form class="row g-3" method="POST" action="add_customer.php">
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputCity" name="name" required>
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="inputPassword4" name="pno" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="adr"
                    required>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Account Type</label>
                <select id="inputState" class="form-select" name="acct_type">
                    <option selected value="Savings">Savings</option>
                    <option value="Recurring"> Recurring</option>
                    <option value="Mutual Funds">Mutual Funds</option>
                    <option value="Fixed Deposit">Fixed Deposit</option>
                    <option value="LIC">LIC</option>

                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Balance</label>
                <input type="text" class="form-control" id="inputCity" name="bal" required>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-dark" name="add">Add</button>
            </div>
        </form>
    </div>
    <footer>
        <h5>©Spark's_Bank_2021</h5>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>