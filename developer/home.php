<?php include('db_connect.php') ?>
 <?php //include('chat.php') ?>

<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>

       <strong> Users</strong>
         <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM users2 where type = 2")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Admin</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM users2 where type = 1")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total IT Staff</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM users2 where type = 3")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total System Users</span>
                <span class="info-box-number">
      <?php echo $conn->query("SELECT * FROM users2 ")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
      </div>
      
      
      <strong>Issues</strong>
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listopen">Open Issue</span>
                <span class="info-box-number">
                  <?php $open_issue = $conn->query("SELECT * FROM issue_log where status = 'Open'")->num_rows; ?>
				<?php echo $open_issue;?>
					<?PHP $_SESSION['open_issue'] = $open_issue; ?>

					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listclosed">Closed Issues</span>
                <span class="info-box-number">
                  <?php $closed_issue = $conn->query("SELECT * FROM issue_log where status = 'Closed'")->num_rows; ?>
					      <?php echo $closed_issue; ?>
				<?PHP	$_SESSION['closed_issue'] = $closed_issue; ?>

					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listass">Assigned Issues</span>
                <span class="info-box-number">
                  <?php $assigned_issue = $conn->query("SELECT * FROM issue_log where IT_staff_ass != 'Not Assigned'")->num_rows; ?>
					                  <?php echo $assigned_issue; ?>
									<?PHP	$_SESSION['assigned_issue'] = $assigned_issue; ?>


					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listunass">Unassigned Issue</span>
                <span class="info-box-number">
      <?php $unassigned_issue = $conn->query("SELECT * FROM issue_log where IT_staff_ass = 'Not Assigned'")->num_rows; ?>
					      <?php echo $unassigned_issue; ?>
				<?PHP	$_SESSION['unassigned_issue'] = $unassigned_issue; ?>


					</a>
                </span>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div></div>
<!--          addition for PTMFB-->
 <strong>Issues assigned to my Subjects</strong>
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box"><a href=""
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_subject_listo">Open Issues</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT *  FROM  issue_log, users2 where issue_log.IT_staff_ass = users2.staff_id && issue_log.status = 'Open' AND users2.my_manager = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                </span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_subject_listc">Closed Issues</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT *  FROM  issue_log, users2 where issue_log.IT_staff_ass = users2.staff_id && issue_log.status = 'Closed' AND users2.my_manager = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                    
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=subject_list">My Subject Total Issues</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT *  FROM   users2 where my_manager = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                                      
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
      </div>
      
     
      <strong>Issues assigned to me</strong>
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box"><a href=""
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listme">Open Issues</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM issue_log where status = 'Open' and IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                </span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listmec">Closed Issues</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT * FROM issue_log where status = 'Closed' and IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="#">Total Issues Assigned</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT * FROM issue_log where  IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                 
                    
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

<!--  End of addition for PTMFB-->
	  <?php include('chart.php') ?>
    
     
     
     <?php elseif($_SESSION['login_manager'] != 'No' && $_SESSION['login_type'] == 3   ): ?>
        <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <strong><?php echo $_SESSION['login_name'].'</strong>!  You are a <strong>Manager</strong> of some <strong>IT Staff.</strong>' ?>
          	</div>
          </div>
      </div>
      <!--
      <strong>My Reported Issues</strong>
   -->
      <strong>Issues assigned to my Subjects</strong>
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box"><a href=""
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_subject_listo">Open Issues</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT *  FROM  issue_log, users2 where issue_log.IT_staff_ass = users2.staff_id && issue_log.status = 'Open' AND users2.my_manager = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                </span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_subject_listc">Closed Issues</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT *  FROM  issue_log, users2 where issue_log.IT_staff_ass = users2.staff_id && issue_log.status = 'Closed' AND users2.my_manager = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                    
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=subject_list">My Subject Total Issues</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT *  FROM   users2 where my_manager = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                                      
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
      </div>
      <strong>Issues assigned to me</strong>
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box"><a href=""
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listme">Open Issues</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM issue_log where status = 'Open' and IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                </span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listmec">Closed Issues</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT * FROM issue_log where status = 'Closed' and IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="#">Total Issues Assigned</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT * FROM issue_log where  IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                   
                 
                    
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
      </div>
      <!-- Start of IT Staff who is not a Manager-->
      
      <?php elseif(($_SESSION['login_manager'] == 'No') && ($_SESSION['login_type'] == 3)   ): ?>
        <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <strong><?php echo $_SESSION['login_name'].'</strong>!  You are an <strong>IT Staff.</strong>' ?>
          	</div>
          </div>
      </div>
    
      <strong>Issues assigned to me</strong>
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box"><a href=""
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listme">Open Issues</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM issue_log where status = 'Open' and (IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows; ?>
                </span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=issue_listmec">Closed Issues</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT * FROM issue_log where status = 'Closed' and (IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows; ?>
                   
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="#">Total Issues Assigned</span>
                <span class="info-box-number">
                   <?php echo $conn->query("SELECT * FROM issue_log where  IT_staff_ass = '".$_SESSION['login_staff_id']."' OR reassigned_IT_staff = '".$_SESSION['login_staff_id']."'")->num_rows; ?>
                    
                   
					</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
      </div>
      <!-- End of IT Staff-->
      
      
<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <strong><?php echo $_SESSION['login_name'] ?></strong> !
          	</div>
          </div>
      </div>
      <div class="row">
          <div class="col-12 col-sm-6 col-md-3">

            
            <!-- /.info-box -->
          </div>
          
          <!-- /.col -->
      </div>
           My Issues/Request
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_issue_listo">Open Issue</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM issue_log where status = 'Open' AND staff_id = '".$_SESSION['login_staff_id']."'")->num_rows; ?></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_issue_listc">Closed Issues</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM issue_log where status = 'Closed' AND staff_id = '".$_SESSION['login_staff_id']."'")->num_rows; ?></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_issue_listass">Assigned Issues</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM issue_log where IT_staff_ass != 'Not Assigned' AND staff_id = '".$_SESSION['login_staff_id']."'")->num_rows; ?></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="./index.php?page=my_issue_listunass">Unassigned Issue</span>
                <span class="info-box-number">
      <?php echo $conn->query("SELECT * FROM issue_log where IT_staff_ass = 'Not Assigned' AND staff_id = '".$_SESSION['login_staff_id']."'")->num_rows; ?></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
      </div>
<?php endif; ?>
<!--
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          //is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
-->
