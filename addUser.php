<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true )
{
  header("location: login.php");
  exit;
}

?>
<?php
include "partials/_dbconnect.php";
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $address = $_POST['address'];
    $date = date("d/m/Y");

    $existSql = "select * from `users` where email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0)
    {
        $showError = "Email already in exist";
    }
    else{

        $sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `pnumber`, `address`, `date`) VALUES ('$fname', '$lname', '$email', '$pnumber', '$address', '$date')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $showAlert = true;
            // echo "User is added!";
            // header("Location: /final/addUser.php?alert=$showAlert");
            // exit();
        }
        else{
            $showError = "User is not added!";
            // echo "User is not added!";
            // header("Location: /final/addUser.php");
        }
    }
}

?>

<?php include "partials/_header.php" ?>

<main>
<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> User is added successfully!
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
    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
                <h1><b>Add User</b></h1>
                <p>Fill the form to add new user</p>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->



        <!-- CHARTS STARTS HERE -->
        <div class="chart">
            <form class="row g-3" style="margin: 45px 210px;" action="/final/addUser.php" method="post">
                <div class="col-md-6">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your First Name"
                        required style="margin-bottom: 8px;">
                </div>
                <div class="col-md-6">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last Name"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email"
                        required style="margin-bottom: 8px;">
                </div>
                <div class="col-md-6">
                    <label for="pnumber" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="pnumber" name="pnumber"
                        placeholder="Enter your Phone Number" required>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="Enter your Address">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success" style="width: 100%;margin-top: 20px;">Add
                        User</button>
                </div>
            </form>
        </div>
        <!-- <h1 class="text-center my-4" style="color: green; font-weight: 700;">Add Users</h1> -->

        <!-- CHARTS ENDS HERE -->
    </div>

</main>

<?php include "partials/_footer.php" ?>