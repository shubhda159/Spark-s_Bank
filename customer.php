<?php
include("config.php");
$update=false;
$delete=false;
  if($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (isset($_POST['snoEdit']))
    {
      // Update the record
        $sno = $_POST["snoEdit"];
        $name = $_POST["nameEdit"];
        $email = $_POST["emailEdit"];
        $phn = $_POST["pnoEdit"];
        $address = $_POST["adrEdit"];
        $acct = $_POST["actEdit"];
        $balance = $_POST["balEdit"];
    
      // Sql query to be executed  
      $sql="UPDATE customer SET name='$name',eid='$email',pno='$phn',address='$address',acct='$acct',balance='$balance' WHERE customer.slno= $sno";
      $result = mysqli_query($conn, $sql);
      if($result){
        $update = true;
      }
      else{
        echo "We could not update the record successfully";
      }
    }
    
  
  }
  if(isset($_GET['delete']))
  {
$sno = $_GET['delete'];
$delete = true;
$sql = "DELETE FROM customer WHERE slno = $sno";
$result = mysqli_query($conn, $sql);
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
  <script src="https://kit.fontawesome.com/4c5352f809.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Customer Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                 </div>
        <form action="/Sparks/customer.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="email">Email Id</label>
              <input type="text" class="form-control" id="emailEdit" name="emailEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="phn">Mobile</label>
              <input type="number" class="form-control" id="pnoEdit" name="pnoEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="adr"  >Address</label>
              <textarea class="form-control" id="adrEdit" name="adrEdit" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="acct">Account Type</label>
              <input type="text" class="form-control" id="actEdit" name="actEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="bal">Balance</label>
              <input type="number" class="form-control" id="balEdit" name="balEdit" aria-describedby="emailHelp">
            </div>
          </div>
          <div class="modal-footer d-block mr-auto">
          <button type="submit" class="btn btn-primary">Save changes</button>
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
              <li><a class="dropdown-item active" href="customer.php">View Customer</a></li>
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
  <?php
  if($delete){
     echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Deleted!</strong>  Customer record has been deleted successfully
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }
  if($update){
    echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 <strong>Updated!</strong>  Customer record has been updated successfully
 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
 }
  ?>
  <h3 style="text-align: center;">Customer Details</h3>
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
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            
            $sql = "SELECT * FROM customer";
            $result = mysqli_query($conn, $sql);
            $slno = 0;
            while($row = mysqli_fetch_assoc($result)){
              $slno = $slno + 1;
              echo "<tr>
              <th scope='row'>". $slno . "</th>
              <td>". $row['name'] . "</td>
              <td>". $row['eid'] . "</td>
              <td>". $row['pno'] . "</td>
              <td>". $row['address'] . "</td>
              <td>". $row['acct'] . "</td>
              <td>". $row['acctdate'] . "</td>
              <td>". $row['balance'] . "</td>
              <td><button class='edit btn btn-dark btn-sm' id=".$row['slno'].">Edit</button></td>
              <td> <button class='delete btn btn-sm btn-dark' id=d".$row['slno'].">Delete</button></td>
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
        name = tr.getElementsByTagName("td")[0].innerText;
        email= tr.getElementsByTagName("td")[1].innerText;
        phno= tr.getElementsByTagName("td")[2].innerText;
        address= tr.getElementsByTagName("td")[3].innerText;
        account_type= tr.getElementsByTagName("td")[4].innerText;
        balance= tr.getElementsByTagName("td")[6].innerText;       
        console.log(name, email);
        nameEdit.value = name;
        emailEdit.value = email;
        pnoEdit.value = phno;
        adrEdit.value = address;
        actEdit.value = account_type;
        balEdit.value = balance;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete customer records!")) {
          console.log("yes");
          window.location = `/Sparks/customer.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>