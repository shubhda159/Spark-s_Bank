<?php
include("config.php");
$update=false;
  if($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (isset($_POST['submit']))
    {    
        $amount = $_POST["amtEdit"];
        $sno1 = $_POST["snoEdit"];
        $sno2 = $_POST['to'];
        $balance = $_POST["balEdit"];

      if($sno1==$sno2)  {
          echo '<script type="text/javascript">';
          echo ' alert("Transaction Failed! Sender and Receiver cannot be same")';  // showing an alert box.
          echo '</script>';
      }

        else if (($amount)<0)
        {
             echo '<script type="text/javascript">';
             echo ' alert("Transaction Failed! Negative values cannot be transferred")';  // showing an alert box.
             echo '</script>';
         }
     
         // constraint to check insufficient balance.
         else if($amount > $balance) 
         {
             
             echo '<script type="text/javascript">';
             echo ' alert("Transaction Failed! Insufficient Balance")';  // showing an alert box.
             echo '</script>';
         }
         
         // constraint to check zero values
         else if($amount == 0){
     
              echo "<script type='text/javascript'>";
              echo "alert('Transaction Failed! Zero value cannot be transferred')";
              echo "</script>";
          }
      
         else {
              // deducting amount from sender's account
            $newbalance = $balance - $amount;
            $sql1="UPDATE customer SET balance='$newbalance' WHERE customer.slno= $sno1";
            $result1 = mysqli_query($conn, $sql1);
      

            //adding amount to receiever account
 
          
            $sql = "SELECT * from customer where slno=$sno2";
            $query = mysqli_query($conn,$sql);
            $sqll = mysqli_fetch_assoc($query);
            $newbalance = $sqll['balance'] + $amount;
            $sql2="UPDATE customer SET balance=$newbalance WHERE customer.slno= $sno2";  
            $result2 = mysqli_query($conn, $sql2);
            if($result1 && $result2){
                $update = true;
                }
            else{
                echo "We could not update the record successfully";
                }
        }
           
    }
    
  
  }
 
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- jquery_plugin CSS -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <style>
    body{
      
        background-image: url("images/bkg.jpg")
      
    }
    header,
    footer {
      text-align: center;
      background-color: rgb(27, 27, 27);
      color: rgba(238, 206, 117, 0.959);

    }
  </style>
  <title>Customer Details</title>
</head>

<body>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Transfer Money</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                 </div>
        <form action="/Sparks/transfer.php" method="POST">
          <div class="modal-body">
          <div class="form-group">
              <label for="name">ID No</label>
              <input type="number" class="form-control" name="snoEdit" id="snoEdit" readonly>
            </div>
           
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control"id="nameEdit" name="nameEdit" readonly>
            </div>
            <div class="form-group">
              <label for="email">Email Id</label>
              <input type="text" class="form-control" id="emailEdit" name="emailEdit" disabled>
            </div>          
           
            <div class="form-group">
              <label for="bal">Balance</label>
              <input type="number" class="form-control" id="balEdit" name="balEdit" readonly>
            </div>
    
            <hr>
           <div class="form-group">
           <label for="bal">To</label>
           <select name="to" id="to" class="form-control" required>
                <option disabled selected>-- Select Customer --</option>
                <?php
                
                
                          $sql = "SELECT * FROM customer";
                     $result = mysqli_query($conn, $sql);
     
                      while($row = mysqli_fetch_assoc($result)){
      
                          echo "<option value='". $row['slno'] ."'>" .$row['name'] ." (Balance ".$row['balance'].")" ."</option>";  // displaying data in option menu
                         }	
                 ?>  
              
                   
            </select>
           </div>
           <div class="form-group">
              <label for="amt">Enter Amount</label>
              <input type="number" class="form-control" id="amtEdit" name="amtEdit" >
            </div>
          </div>
         
          <div class="modal-footer d-block mr-auto">
          <button type="submit" class="btn btn-primary" name="submit">Transfer</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          </div>
        </form>
      </div>
    </div>
  </div>
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
            <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button"
              aria-expanded="false">Services</a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="add_customer.php">Add Customer</a></li>
              <li><a class="dropdown-item" href="customer.php">View Customer</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item active" href="transfer.php">Transfer Money</a></li>
            </ul>
          </li>
         
        </ul>
      
      </div>
    </div>
  </nav>
  <?php

  if($update){
    echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 <strong>Amount Trasfered!!</strong>  Balance has been updated successfully
 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }
  ?>
  <h3 style="text-align: center;">Transfer Money</h3>
  <div class="container my-4">
    <table class="table table-light table-striped" id="myTable">
      <thead>
        <tr>
          <th scope="col">Sl. No</th>
          <th scope="col">Name</th>
          <th scope="col">Email Id</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Address</th>
          <th scope="col">Account Type</th>
          <th scope="col">Date-Time</th>
          <th scope="col">Balance</th>
          <th scope="col">Transfer</th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
            
            $sql = "SELECT * FROM customer";
            $result = mysqli_query($conn, $sql);
            //$slno = 0;
            while($row = mysqli_fetch_assoc($result)){
             
              echo "<tr>
              <td>". $row['slno'] . "</td>
              <td>". $row['name'] . "</td>
              <td>". $row['eid'] . "</td>
              <td>". $row['pno'] . "</td>
              <td>". $row['address'] . "</td>
              <td>". $row['acct'] . "</td>
              <td>". $row['acctdate'] . "</td>
              <td>". $row['balance'] . "</td>
              <td><button class='edit btn btn-dark btn-sm' id=".$row['slno'].">Transfer</button></td>
             </tr>";
          } 
            ?>
      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript; choose one of the two! -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        slno = tr.getElementsByTagName("td")[0].innerText;
        name = tr.getElementsByTagName("td")[1].innerText;
        email= tr.getElementsByTagName("td")[2].innerText;
        balance= tr.getElementsByTagName("td")[7].innerText;       
        console.log(name, email);
        nameEdit.value = name;
        emailEdit.value = email;
        balEdit.value = balance;
        snoEdit.value =slno;
       
        $('#editModal').modal('toggle');
      })
    })
   
  </script>
</body>

</html>