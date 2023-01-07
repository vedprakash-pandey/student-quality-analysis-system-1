  <!-- navigation bar -->
  <?php 

require "connect.php";

$report_selm = "select * from admin_report where status='Not Viewed'";
$report_selm_res  = mysqli_query($conn,$report_selm);
$report_numm =  mysqli_num_rows($report_selm_res);

?>
  <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#"><span> MY DY </span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="principal_home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="principal_report.php">View Report
                  <?php if($report_numm > 0){?>
                    <span style="font-size:15px;color:black;border-radius:50%;background:white;padding:0px 5px;margin-left:3px">
                                <?php echo $report_numm; ?>
                            </span>
                     <?php   } ?>
                  </a>
              </li>
              

          </ul>
          <form class="form-inline ml-auto" id="headerSearch">
              <input type="text" class="form-control mr-sm-4" placeholder="Search">
              <button type="submit" class="btn btn-outline-light">Search</button>
          </form>
      </div>
  </nav>