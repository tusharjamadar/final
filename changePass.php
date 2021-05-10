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

    // session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $cPass = $_POST['cPass'];
        $sno = $_SESSION['sno'];
        if($_SESSION['password'] == $oldPass){
            if($newPass == $cPass)
            {
                $sql = "UPDATE `admin` SET `password` = '$newPass' WHERE `admin`.`sno` = '$sno'";
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                    $showAlert = true;
                }
            }
            else{
                $showError = "Please Enter same password.";
            }
        }else{
        $showError = "Opp! You Entered password is incorrect!";
        }
    }
    
?>

<?php include "partials/_header.php" ?>

<main>
<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Password is successfully changed!
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
                <h1><b>Change Password</b></h1>
                <p>Fill the form to change the password</p>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->



        <!-- CHARTS STARTS HERE -->
        <div class="chart">

            <form style="margin: 50px 310px" action="/final/changePass.php" method="post">
                <div class="mb-3">
                    <label for="oldPass" class="form-label">Old Password</label>
                    <input type="password" class="form-control" name="oldPass" id="oldPass" aria-describedby="emailHelp"
                        placeholder="Enter your Old Password" required>
                </div>
                <div class="mb-3">
                    <label for="newPass" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="newPass" id="newPass"
                        placeholder="Enter your New Password" required>
                </div>
                <div class="mb-3">
                    <label for="cPass" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cPass" id="cPass"
                        placeholder="Enter your Password Again" required>
                </div>
                <button type="submit" class="btn btn-success" style="width: 100%;margin-top: 4px;">Change
                    Password</button>
            </form>
        </div>
        <!-- <h1 class="text-center my-4" style="color: green; font-weight: 700;">Add Users</h1> -->

        <!-- CHARTS ENDS HERE -->
    </div>
</main>

<?php include "partials/_footer.php" ?>