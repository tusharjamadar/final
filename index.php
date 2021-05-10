<?php
session_start();
?>

<?php include "partials/_header.php" ?>

      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>Welcome <?php if(isset($_SESSION['fname']) && $_SESSION['fname']!=""){echo $_SESSION['fname'];}
              else{
                echo "Name";
              } ?> to your Dashboard</h1>
            </div>
          </div>

          <!-- MAIN TITLE ENDS HERE -->

          

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Stock Prices</h1>
                  <p>Last month</p>
                </div>
              </div>
              <div id="apex5"></div>
            </div>

            

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Overview</h1>
                  <p>Last month</p>
                </div>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1 style="font-size: 1.7rem;">Income</h1>
                  <p>$75,300</p>
                </div>

                <div class="card2">
                  <h1 style="font-size: 1.7rem;">Sales</h1>
                  <p>$124,200</p>
                </div>

                <div class="card3">
                  <h1 style="font-size: 1.7rem;">Users</h1>
                  <p>3900</p>
                </div>

                <div class="card4">
                  <h1 style="font-size: 1.7rem;">Orders</h1>
                  <p>1881</p>
                </div>
              </div>
            </div>
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Sales Reports</h1>
                  <p>Last month</p>
                </div>
              </div>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Comparision Reports</h1>
                  <p>Last Month</p>
                </div>
              </div>
              <div id="apex2"></div>
            </div>
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>New Users</h1>
                  <p>Last Month</p>
                </div>
              </div>
              <div id="apex3"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Teams Reports</h1>
                  <p>Last month</p>
                </div>
              </div>
              <div id="apex4"></div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->
        </div>
        <div class="footer">
    <p>Copywirte @ Tushar Jamdar</p>
  </div>
      </main>
<?php include "partials/_footer.php" ?>
