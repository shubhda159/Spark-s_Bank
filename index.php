<?php
if(isset($_POST['button1'])) {
    header('location:dashboard.php');
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark's Bank</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            background-color: rgb(27, 27, 27);
            color: rgba(238, 206, 117, 0.959);
            padding: 7px;
            position: fixed;
            width: 100%;
        }

        footer {
            text-align: center;
            background-color: rgb(27, 27, 27);
            color: rgba(238, 206, 117, 0.959);
            top: 100vh;
            position: absolute;
            padding: 4px;
            width: 100%;
        }

        #contain {

            display: flex;

        }

        .container {
            margin-top: 54%;
            height: 14vh;
            width: 30vw;
            border-bottom: solid 6px rgba(238, 206, 117, 0.959);
            border-top: solid 6px rgba(238, 206, 117, 0.959);
            margin-left: 4%;

        }

        #logo {
            margin-top: 7%;
            margin-left: 8%;


        }

       button {
            background-color: rgba(228, 184, 62, 0.959);
            color: white;
            margin-top: 32px;
            border: none;
            cursor: pointer;
            width: 25%;
            padding: 10px;
            margin-left: 35px;
            position: absolute;
            font-weight: bold;
        }

       button:hover {
            background-color: rgba(245, 184, 17, 0.959);
        }
   
    </style>
</head>

<body>
    <header>
        <h1>Welcome to Spark's Bank!!!</h1>
    </header>

    <div id="contain">
        <div id="logo">
            <img src="banklogo.png" alt="" height="70%">
        </div>
        <form action="index.php" method="post">
        <div class="container">
                 <button name="button1">Get Started</button>
        </div>
        </form>
        
        <footer>
            <h5>©Spark's_Bank_2021</h5>
        </footer>

</body>

</html>