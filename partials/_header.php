
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Admin Portal</title>

    <style>
    #main {
        display: grid;
        height: 100vh;
        grid-template-columns: 0.8fr 1fr 1fr 1fr;
        grid-template-rows: 0.2fr 3fr;
        grid-template-areas:
            "sidebar nav nav nav"
            "sidebar main main main";
    }
    </style>
  </head>
  <body id="body">
    <div id="main">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Admin</a>
        </div>
        <div class="navbar__right">
          <input type="search" id="search" placeholder="Search here">
          <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
          
          <?php
            // session_start();
            if(!isset($_SESSION['loggedin']))
            {
              echo '<a href="login.php">
              <button type="button" class="btn btn-dark">Login</button>
            </a>
            <a href="registration.php">
              <button type="button" class="btn btn-dark">Registration</button>
            </a>';
            }
            else{
              echo "<span style='margin-left: 10px;'>Welcome ".$_SESSION['fname']."</span>";
            }
            
          ?>
          <!-- <a href="#">
            <img width="30" src="assets/avatar.svg" alt="" /> -->
            <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
          <!-- </a> -->
        </div>
      </nav>