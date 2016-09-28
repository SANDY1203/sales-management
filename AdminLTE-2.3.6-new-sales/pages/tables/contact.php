<?php

session_start();




?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  
   <!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75591362-1', 'auto');
    ga('send', 'pageview');

</script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>MAN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SALES</b>MANAGEMENT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/null.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php
				echo $_SESSION['first_name'];
                 echo " ";
                   echo $_SESSION['last_name'];
				
					?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/null.png" class="img-circle" alt="User Image">

                <p>
                  <?php
				echo $_SESSION['first_name'];
                 echo " ";
                   echo $_SESSION['last_name'];
				
					?> - <?php
				   
				echo $_SESSION['role'];?>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                 <a href="http://localhost/sales-management/AdminLTE-2.3.6-new/pages/examples/login_sandy.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/null.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php
				echo $_SESSION['first_name'];
                 echo " ";
                   echo $_SESSION['last_name'];
				
					?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
	          
        <li class="treeview">
          <a href="../../index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
		
		<li class="treeview">
          <a href="company.php">
            <i class="fa fa-building"></i> <span>COMPANY</span>
            
          </a>
          
        </li>
		<li class="active">
          <a href="contact.php">
            <i class="fa fa-phone"></i> <span>CONTACT</span>
            
          </a>
          
        </li>
		
		<li class="treeview">
          <a href="project.php">
            <i class="fa fa-folder-open"></i> <span>PROJECT</span>
            
          </a>
          
        </li>
		<li class="treeview">
          <a href="proserv.php">
            <i class="fa fa-folder-open"></i> <span>PROSERV</span>
            
          </a>
          
        </li>
		<li class="treeview">
          <a href="proserv_project.php">
            <i class="fa fa-folder-open-o"></i> <span>PROSERV PROJECT</span>
            
          </a>
          
        </li>
		
		
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal4">Add New Record</button>

			  <div class="col-md-9">
			                <h1 class="box-title"><b>CONTACT</b></h1>
			  
            </div>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body">
              <div class="records_content4"></div>
            </div>
            <!-- /.box-body -->
			<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">

                
				<div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    <input type="text" id="contact_name" placeholder="Contact Name" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_position">Contact Position</label>
                    <input type="text" id="contact_position" placeholder="Contact Position" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="contact_number_one">Contact Number-1</label>
                    <input type="text" id="contact_number_one" placeholder="Contact Number-1" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_number_two">Contact Number-2</label>
                    <input type="text" id="contact_number_two" placeholder="Contact Number-2" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_email_one">Contact Email-1</label>
                    <input type="text" id="contact_email_one" placeholder="Contact Email-1" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_email_two">Contact Email-2</label>
                    <input type="text" id="contact_email_two" placeholder="Contact Email-2" class="form-control"/>
                </div>

                
				<div class="form-group">
                    <label for="contact_company_allo">Contact Company Alloc</label>
                    
					<select class="selectpicker" id="contact_company_allo">
  <?php 
  include("ajax/db_connection.php");
  $data = '';
$query12 = "SELECT * FROM company";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
				
				
				
			$data .=	'<option value="'.$row12['company_id'].'">'. $row12['company_name'].'</option>';
				}
	}
	else{
		$data .=	'<option></option>';
	}  
 

echo $data;

  ?>
  </select> 
                </div>
				

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecordContact()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                     
				
				<div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    <input type="text" id="update_contact_name" placeholder="Contact Name" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_position">Contact Position</label>
                    <input type="text" id="update_contact_position" placeholder="Contact Position" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="contact_number_one">Contact Number-1</label>
                    <input type="text" id="update_contact_number_one" placeholder="Contact Number-1" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_number_two">Contact Number-2</label>
                    <input type="text" id="update_contact_number_two" placeholder="Contact Number-2" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_email_one">Contact Email-1</label>
                    <input type="text" id="update_contact_email_one" placeholder="Contact Email-1" class="form-control"/>
                </div>
				<div class="form-group">
                    <label for="contact_email_two">Contact Email-2</label>
                    <input type="text" id="update_contact_email_two" placeholder="Contact Email-2" class="form-control"/>
                </div>

                
				<div class="form-group">
                    <label for="contact_company_allo">Contact Company Alloc</label>
<select class="selectpicker" id="update_contact_company_allo">
  <?php 
  include("ajax/db_connection.php");
  $data = '';
$query12 = "SELECT * FROM company";
				
				if (!$result12 = mysql_query($query12)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result12) > 0)
    {
				
				while($row12 = mysql_fetch_assoc($result12)){
				
				
				
			$data .=	'<option value="'.$row12['company_id'].'">'. $row12['company_name'].'</option>';
				}
	}
	else{
		$data .=	'<option></option>';
	}  
 

echo $data;

  ?>
  </select>                
			   </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateContactDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_contact_id">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view_contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="myModalLabel"><b><output id ="view_contact_name" style="display:inline; font-size:80%;"> </output></b></h2>
            </div>
            <div class="modal-body">
			
					
					<div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <!-- main details -->
                    <div id="mainb">
                        <div class="col-md-12">
                            <div class="col-md-7">
                                <!--TODO upload employee images-->
                                <img style="width: 120px; height: 120px" class="img-responsive img-circle" alt="No Image" src="api/avatars/">
                            </div>
                            <div class="col-md-5 project_detail">
                                <p class="ng-binding"><span class="title control-label">Contact ID:</span><output id ="view_id21" style="display:inline"> </output></p>
                                <p class="ng-binding"><span class="title control-label">Contact Position:</span><output id ="view_contact_position" style="display:inline"> </output></p>
                                <p class="ng-binding"><span class="title control-label">Contact Number-1:</span><output id ="view_contact_number_one" style="display:inline"> </output></p>
                                <p class="ng-binding"><span class="title control-label">Contact Number-2:</span></span><output id ="view_contact_number_two" style="display:inline"></p>
                                <p class="ng-binding"><span class="title control-label">Contact E-mail-1:</span></span><output id ="view_contact_email_one" style="display:inline"></p>
                                <p class="ng-binding"><span class="title control-label">Contact E-mail-2:</span></span><output id ="view_contact_email_two" style="display:inline"></p>
                                <p class="ng-binding"><span class="title control-label">Contact Company Allocation:</span></span><output id ="view_contact_company_allo" style="display:inline"></p>
                            </div>
                        </div>
                    </div>
                    <!-- end main details -->

                    <!-- ngIf: vm.user.plays.data -->
                </div>
            </div>
									
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="DeleteContact1()" >Delete</button>
                <input type="hidden" id="hidden_delete_contact_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>© 2016 All Rights Reserved. Powered by <a href="http://biocard.io">BioCard Elite LLC </a></strong> exclusively for <a href="pages/examples/login_sandy.html">SALES MANAGEMENT SYSTEM </a>.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
