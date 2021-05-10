
<?php 
  include "partials/_dbconnect.php";

  $showAlert = false;
  $showError = false;

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pnumber = $_POST["pnumber"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $oname = $_POST["oname"];
    $address = $_POST["address"];
    $date = date("d/m/Y");

    $existSql = "select * from `admin` where email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0)
    {
        $showError = "Email already in exist";
    }
    else{
        if($password == $cpassword)
        {
            $sql = "INSERT INTO `admin` (`fname`, `lname`, `email`, `pnumber`, `password`, `oname`, `address`, `date`) VALUES ('$fname', '$lname', '$email', '$pnumber', '$password', '$oname', '$address','$date')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                $showAlert = true;
            } 
        }
        else{
            $showError = "Passwords do not match";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Registration Page</title>

    <style>
    body {
        background: lightgrey;
    }

    .container {
        width: 50%;
        background: white;
        border-radius: 15px;
        padding: 30px;
        padding-top: 10px;
    }
    </style>

</head>

<body>
<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Account is created successfully! For log in click <a href="/final/login.php" style="text-decoration: none;">here</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
 ?>
    <div class="container my-4">
        <h1 class="text-center my-4" style="color: green; font-weight: 700;">Registration Form</h1>
        <form class="row g-3" action="/final/registration.php" method="post">
            <div class="col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your First Name"
                    required>
            </div>
            <div class="col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last Name"
                    required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email"
                    required>
            </div>
            <div class="col-md-6">
                <label for="pnumber" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="pnumber" name="pnumber"
                    placeholder="Enter your Phone Number" required maxlength = "10">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your Password" required>
            </div>
            <div class="col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword"
                    placeholder="Enter your Password Again" required>
            </div>
            <div class="col-12">
                <label for="organization" class="form-label">Organization Name</label>
                <input type="text" class="form-control" id="organization" name="oname"
                    placeholder="Enter your Orginization Name">
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">
                        Accept <a href="#" style="text-decoration: none;">Term</a> and <a href="#" style="text-decoration: none;">Conditions</a> 
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success" style="width: 100%;margin-top: 4px;">Register</button>
            </div>
        </form>
        <div class="text-center" style="margin-top: 8px;font-size: 15px;">
            <a href="login.php" style="text-decoration: none;">I have Account</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>