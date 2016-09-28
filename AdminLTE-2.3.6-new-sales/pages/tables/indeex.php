<?php 


session_start();





if(isset($_POST["submit"]))
{
include("ajax/db_connection.php");

$number = 1;
$total = 0;
$project_price1=0;
$project_price2=0;
$project_price3=0;
$project_price4=0;
$project_price5=0;
$project_price6=0;

    foreach($_POST['checkboxName'] as $value)
{
    
	
	$query = mysql_query("SELECT * FROM projects WHERE id = '$value'");
	WHILE ($rows = mysql_fetch_array($query)):
	  ${"project_name$number"} = $rows['project_name'];
      ${"project_desc$number"} = $rows['project_desc'];
	  ${"project_company_id$number"} = $rows['project_company_id']; // print_r($_GET);       
	  ${"project_price$number"} = $rows['project_price'];
	  ${"project_status$number"} = $rows['project_status'];
	  
	  

	  
	  
	
	endwhile;
	$query1 = mysql_query("SELECT * FROM company WHERE company_id = '${"project_company_id$number"}'");
	WHILE ($rows = mysql_fetch_array($query1)):
	  ${"company_id$number"} = $rows['company_id'];
      ${"company_name$number"} = $rows['company_name'];
	  ${"company_address$number"} = $rows['company_address']; // print_r($_GET);       
	  ${"company_phone$number"} = $rows['company_phone'];
	  ${"company_email$number"} = $rows['company_email'];
	  
	  
	

	  
	  $total = $total + ${"project_price$number"};
	  
	$number++;
	endwhile;
	
}
/*
$number = $_POST["number"];
$item = $_POST["item"];
$price = $_POST["price"];
$vat = $_POST["vat"];
$bank = $_POST["bank"];
$iban = $_POST["iban"];
$paypal = $_POST["paypal"];
$com = $_POST["com"];
$pay = 'Payment information';
$price = str_replace(",",".",$price);
$vat = str_replace(",",".",$vat);
$p = explode(" ",$price);
$v = explode(" ",$vat);
$re = $p[0] + $v[0];

/*include("../../../sales-management/AdminLTE-2.3.6-new/pages/tables/ajax/db_connection.php");

$number = 1;
$total = 0;

    foreach($_POST['checkboxName'] as $value)
{
    echo $value.'<br>';
	
	$query = mysql_query("SELECT * FROM projects WHERE id = '$value'");
	WHILE ($rows = mysql_fetch_array($query)):
	  ${"project_name$number"} = $rows['project_name'];
      ${"project_desc$number"} = $rows['project_desc'];
	  ${"project_company_id$number"} = $rows['project_company_id']; // print_r($_GET);       
	  ${"project_price$number"} = $rows['project_price'];
	  ${"project_status$number"} = $rows['project_status'];
	  
	  

	  echo "${"project_name$number"}";
	  
	
	endwhile;
	$query1 = mysql_query("SELECT * FROM company WHERE company_id = '${"project_company_id$number"}'");
	WHILE ($rows = mysql_fetch_array($query1)):
	  ${"company_id$number"} = $rows['company_id'];
      ${"company_name$number"} = $rows['company_name'];
	  ${"company_address$number"} = $rows['company_address']; // print_r($_GET);       
	  ${"company_phone$number"} = $rows['company_phone'];
	  ${"company_email$number"} = $rows['company_email'];
	  
	  
	

	  echo "${"company_id$number"}";
	  $total = $total + ${"project_price$number"};
	  
	$number++;
	endwhile;
	
}


function r($r)
{
$r = str_replace("$","",$r);
$r = str_replace(" ","",$r);
$r = $r." $";
return $r;
}
$price = r($price);
$vat = r($vat); */
//$address = $_POST["address"];
$maintotal = $_POST["maintotal"];
$grandtotal = $_POST["grandtotal"];
$grandtax = $_POST["grandtax"];
$abcd=$_SESSION['first_name'];
$abcd1=$_SESSION['email'];

require('../../../../fpdf181/fpdf.php');

class PDF extends FPDF
{

function Header()
{



$this->Image('QUOTATION.png',15,20,220);


$margin = 10;
$pageWidth = 210;
$pageHeight = 297;
$this->Rect( 10, 10 , 190 ,280);
$this->SetFont('Arial','B',12);
$this->Ln(1);
}
function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function ChapterTitle($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetTextColor(32);
$pdf->Cell(0,35,'',0,1,'L');
$pdf->Cell(5,7,'',0,0,'L');
$pdf->Cell(90,7,'QUOTATION TO',0,0,'C');
$pdf->Cell(45,7,'QUOTATION Number: ',0,0,'L');
$pdf->Cell(45,7,'145',0,1,'R');
$pdf->Cell(5,7,'',0,0,'L');
$pdf->Cell(90,7,"${"company_name1"}",0,0,'C',0);
$pdf->Cell(45,7,'QUOTATION Date: ',0,0,'L',0);
$pdf->Cell(45,7,date('d-m-Y'),0,1,'R',0);
$pdf->Cell(5,7,'',0,0,'L');
$pdf->Cell(90,7,"$company_address1",0,0,'C',0);
$pdf->Cell(45,7,'PO No.',0,0,'L',0);
$pdf->Cell(45,7,'789456258',0,1,'R',0);
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(5,7,'',0,0,'L');
$pdf->Cell(90,7,"${"company_email1"}",0,0,'C',0);
$pdf->Cell(90,7,'TOTAL AMOUNT',0,1,'C',0);
$pdf->Cell(5,7,'',0,0,'L');
$pdf->Cell(90,7,"${"company_phone1"}",0,0,'C',0);
$pdf->Cell(90,7,"$maintotal",0,0,'C',0);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(5,7,'',0,0,'L');
$pdf->SetFillColor(200,200,200);
$pdf->Cell(110,12,'Iteam Description','B',0,'C',1);
$pdf->Cell(30,12,'Unit Price ','B',0,'C',1);
$pdf->Cell(10,12,'Qty ','B',0,'C',1);
$pdf->Cell(30,12,'Total','B',1,'C',1);

$pdf->SetFillColor(225,225,225);


for ($t = 1; $t < $number; $t++) {
	
    
 ${"total$t"} = $_POST["total$t"];
 ${"quantity$t"} = $_POST["quantity$t"];
 
$pdf->Cell(5,7,'',0,0,'L');
$y1 = $pdf->GetY();
$x1 = $pdf->GetX();
$width = 110;
$pdf->MultiCell(110,7,"${"project_name$t"}",0,'C',1);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetXY($x1 + $width, $y1);
$pdf->Cell(30,7,"${"project_price$t"}",0,0,'C',1);
$pdf->Cell(10,7,"${"quantity$t"}",0,0,'C',1);
$pdf->Cell(30,7,"${"total$t"}",0,1,'C',1);
$pdf->SetXY($x, $y);

}



/*$pdf->MultiCell(110,7,'Iteam Description',1,'C');
$pdf->Cell(30,7,'Unit Price ',1,0,'C');
$pdf->Cell(10,7,'Qty ',1,0,'C');
$pdf->Cell(30,7,'Total',1,1,'C');*/

$pdf->Cell(0,10,'',0,1,'R');


$pdf->Cell(5,7,'',0,0,'L');
$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(45,7,'Pin No.',1,0,'C',1);
$pdf->Cell(45,7,'POS15934601',1,0,'C',1);
$pdf->Cell(45,7,'Subtotal',1,0,'C',1);
$pdf->Cell(45,7,"$grandtotal",1,1,'C',1);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(5,7,'',0,0,'L');
$pdf->SetFillColor(0,0,0);
$pdf->Cell(45,7,'Served By:',1,0,'C',1);
$pdf->Cell(45,7,"$abcd",1,0,'C',1);
$pdf->Cell(45,7,'TAX: VAT 16%',1,0,'C',1);
$pdf->Cell(45,7,"$grandtax",1,1,'C',1);

$pdf->Cell(0,2,'',0,1,'R');
$pdf->SetFillColor(255,255,255);
$pdf->Cell(5,7,'',0,0,'L');
$pdf->SetFillColor(0,0,0);

$pdf->Cell(45,7,'',1,0,'C',1);
$pdf->Cell(45,7,'',1,0,'C',1);
$pdf->SetFont('Times','',15);
$pdf->Cell(45,7,'GRAND TOTAL',1,0,'C',1);
$pdf->Cell(45,7,"$maintotal",1,1,'C',1);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(5,7,'',0,0,'L');
$pdf->SetFillColor(0,0,0);
$pdf->SetFont('Times','',12);
$pdf->Cell(45,7,'Email',1,0,'C',1);
$pdf->Cell(45,7,"$abcd1",1,0,'C',1);
$pdf->Cell(45,7,'',1,0,'C',1);
$pdf->Cell(45,7,'',1,1,'C',1);

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(32);
$pdf->Cell(0,15,'',0,1,'R');
$pdf->Cell(180,7,'Sign & Omacle Stamp',0,1,'C',1);

$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetTextColor(255,0,0);
$pdf->Cell(180,7,'THANK YOU',0,1,'C',1);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','',9);
$pdf->Cell(0,5,'',0,1,'R');
$pdf->Cell(180,7,'We really appreciate your business',0,1,'C',1);
$pdf->Cell(180,4,'Please contact us within 30 days of receving this quotation',0,1,'C',1);
$pdf->Cell(180,4,'There will some text',0,1,'C',1);




$pdf->Line(15, $y + 25, 195,$y + 25 );
$pdf->Line(15, $y + 50, 195, $y + 50);
$pdf->Line(15, $y + 75, 195, $y + 75);
$pdf->Line(15, $y + 100, 195, $y + 100);
$pdf->Line(15, $y + 110, 195, $y + 110);




$pdf->SetFillColor(200,220,255);


$filename="quotation.pdf";
$pdf->Output($filename,'F');
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  
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

<style>
body{background-image:url(img/bg.jpg);
}
a{
color:#999999;
text-decoration:none;
}
a:hover{
color:#999999;
text-decoration:underline;
}
#content{
width:800px;
height:600px;
background-color:#FEFEFE;
border: 10px solid rgb(255, 255, 255);
border: 10px solid rgba(255, 255, 255, .5);
-webkit-background-clip: padding-box;
background-clip: padding-box;
border-radius: 10px;
opacity:0.90;
filter:alpha(opacity=90);
margin:auto;
}
#footer{
width:800px;
height:30px;
padding-top:15px;
color:#666666;
margin:auto;
}
#title{
width:770px;
margin:15px;
color:#999999;
font-size:18px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body{
width:770px;
height:360px;
margin:15px;
color:#999999;
font-size:16px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body_l{
width:385px;
height:360px;
float:left;
}
#body_r{
width:385px;
height:360px;
float:right;
}
#name{
width:width:385px;
height:40px;
margin-top:15px;
}
input{
margin-top:10px;
width:345px;
height:32px;
-moz-border-radius: 5px;
border-radius: 5px;
border:1px solid #ccc;
background-image:url(img/paper_fibers.png);
color:#999;
margin-left:15px;
padding:5px;
}
#up{
width:770px;
height:40px;
margin:auto;
margin-top:10px;
}
</style>

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
    <a href="indeex.php" class="logo">
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
		<li class="treeview">
          <a href="contact.php">
            <i class="fa fa-phone"></i> <span>CONTACT</span>
            
          </a>
          
        </li>
		
		<li class="active">
          <a href="project.php">
            <i class="fa fa-table"></i> <span>PROJECT</span>
            
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
 <?php  
include("ajax/db_connection.php");

$number = 1;
$total = 0;
$project_price1=0;
$project_price2=0;
$project_price3=0;
$project_price4=0;
$project_price5=0;
$project_price6=0;

    foreach($_POST['checkboxName'] as $value)
{
    
	
	$query = mysql_query("SELECT * FROM projects WHERE id = '$value'");
	WHILE ($rows = mysql_fetch_array($query)):
	  ${"project_name$number"} = $rows['project_name'];
      ${"project_desc$number"} = $rows['project_desc'];
	  ${"project_company_id$number"} = $rows['project_company_id']; // print_r($_GET);       
	  ${"project_price$number"} = $rows['project_price'];
	  ${"project_status$number"} = $rows['project_status'];
	  
	  

	  
	  
	
	endwhile;
	$query1 = mysql_query("SELECT * FROM company WHERE company_id = '${"project_company_id$number"}'");
	WHILE ($rows = mysql_fetch_array($query1)):
	  ${"company_id$number"} = $rows['company_id'];
      ${"company_name$number"} = $rows['company_name'];
	  ${"company_address$number"} = $rows['company_address']; // print_r($_GET);       
	  ${"company_phone$number"} = $rows['company_phone'];
	  ${"company_email$number"} = $rows['company_email'];
	  
	  
	

	  
	  $total = $total + ${"project_price$number"};
	  
	$number++;
	endwhile;
	
} ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

<form action="" method="post" enctype="multipart/form-data">
<section class="QUOTATION">
      <!-- title row -->
	  
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Biocard Elite LLC
            <small class="pull-right">Date: <?php echo date('d-m-Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
	  

      <!-- info row -->
      <div class="row QUOTATION-info">
        <div class="col-sm-4 QUOTATION-col">
          From
          <address>
            <strong>Biocard Elite LLC</strong><br>
            Hatheru Road Off.<br>
            Gitanga Road,Lavington, Kenya<br>
            Phone: +254 714 772 176<br>
            Email: info@biocard.io
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 QUOTATION-col">
          To
          <address>
            <strong><?php echo ${"company_name1"}; ?></strong><br>
            <?php echo ${"company_address1"}; ?><br>
             <?php echo ${"company_phone1"}; ?><br>
           <?php echo ${"company_email1"}; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 QUOTATION-col">
          <b>QUOTATION #007612</b><br>
          <br>

           </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
		
		
		<table class="table table-striped">
	<tbody>
		<thead>
            <tr>
			<td align="center" style="width:20px"> <strong>#</strong></td>
			<td align="center" style="width:480px"><strong>Item Description</strong></td>
			<td align="center" style="width:120px"> <strong>Unite Prise</strong></td>
			<td align="center" style="width:20px"> <strong>Qty</strong></td>
			<td align="center" style="width:120px"><strong>Total</strong></td>
		</tr>
		</thead>
		<?php
		
		$data = "";
		for ($x = 1; $x < $number; $x++){
		
		$data .='<tr>
			
				<td align="center">'. $x . '</td>
				<td align="center">'. ${"project_name$x"} . '</td>
			     <td align="center"><input style="width:70px;" type="text" id="price'. $x . '"  name="price'. $x . '" readonly value="'. ${"project_price$x"} .'" class="readonly"/></td>
				 <td align="center"><input style="width:70px;" type="text" id="quantity'. $x . '" name="quantity'. $x . '" value="1"/></td></td>
				 <td align="center"><input style="width:70px;" type="text" id="total'. $x . '" name="total'. $x . '" readonly value="'. ${"project_price$x"} . '" class="readonly"/></td>
				 
				
				
    		</tr>';
			
		}
		echo $data;
		
		?>
	</tbody>
</table>

          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td><input style="width:70px;" type="text" id="grandtotal" name="grandtotal" class="readonly" readonly value="<?php echo ${"project_price1"} +${"project_price2"} +${"project_price3"} +${"project_price4"} +${"project_price5"} + ${"project_price6"}; ?>"></td>
              </tr>
              <tr>
                <th>Tax (16%)</th>
                <td><input style="width:70px;" type="text" id="grandtax" name="grandtax" class="readonly" readonly value="<?php echo ${"project_price1"}*0.16 +${"project_price2"}*0.16 +${"project_price3"}*0.16 +${"project_price4"}*0.16 +${"project_price5"}*0.16 + ${"project_price6"}*0.16; ?>"></td>
              </td>
              </tr>
                <tr>
                <th>Total:</th>
                <td><input style="width:70px;" type="text" id="maintotal" name="maintotal" class="readonly" readonly value="<?php $maintotal1 = ${"project_price1"} +${"project_price2"} +${"project_price3"} +${"project_price4"} +${"project_price5"} + ${"project_price6"}; echo $maintotal1 + $maintotal1 * .16;?>"></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="quotation-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          
		  
		  
		  
		  
		  <?php foreach($_POST['checkboxName'] as $value)
{
  echo '<input type="hidden" name="checkboxName[]" value="'. $value. '">';
}
	?>
	
	
<div><input name="submit" value="Create your QUOTATION" type="submit" /><br /><br />

<?php 
if(isset($_POST["submit"]))
{
echo'<a href="QUOTATION.pdf">Download your QUOTATION</a>';
}
?>
</div>
</form>
        </div>
      </div>
    
	
</section>
          
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

$('#quantity1').on('keyup',function(){
	var just = $('#total1').val();
	var grandtot = ($('#grandtotal').val() - just);
    var tot = $('#price1').val() * this.value;
    $('#total1').val(tot);
	grandtot = (grandtot + tot);
	
	var tottax = grandtot * 0.16;
	
	var maintot = grandtot + tottax;
	$('#grandtotal').val(grandtot);
	$('#grandtax').val(tottax);
	$('#maintotal').val(maintot);
});
</script>
<script>

$('#quantity5').on('keyup',function(){
    var just = $('#total5').val();
	var grandtot = ($('#grandtotal').val() - just);
    var tot = $('#price5').val() * this.value;
    $('#total5').val(tot);
	grandtot = (grandtot + tot);
	
	var tottax = grandtot * 0.16;
	
	var maintot = grandtot + tottax;
	$('#grandtotal').val(grandtot);
	$('#grandtax').val(tottax);
	$('#maintotal').val(maintot);
});
</script>
<script>

$('#quantity6').on('keyup',function(){
    var just = $('#total6').val();
	var grandtot = ($('#grandtotal').val() - just);
    var tot = $('#price6').val() * this.value;
    $('#total6').val(tot);
	grandtot = (grandtot + tot);
	
	var tottax = grandtot * 0.16;
	
	var maintot = grandtot + tottax;
	$('#grandtotal').val(grandtot);
	$('#grandtax').val(tottax);
	$('#maintotal').val(maintot);
});
</script>
<script>

$('#quantity4').on('keyup',function(){
	
    var just = $('#total4').val();
	var grandtot = ($('#grandtotal').val() - just);
    var tot = $('#price4').val() * this.value;
    $('#total4').val(tot);
	grandtot = (grandtot + tot);
	
	var tottax = grandtot * 0.16;
	
	var maintot = grandtot + tottax;
	$('#grandtotal').val(grandtot);
	$('#grandtax').val(tottax);
	$('#maintotal').val(maintot);
});
</script>

<script>

$('#quantity2').on('keyup',function(){
	
	var just = $('#total2').val();
	var grandtot = ($('#grandtotal').val() - just);
    var tot = $('#price2').val() * this.value;
    $('#total2').val(tot);
	
	grandtot = (grandtot + tot);
	
	var tottax = grandtot * 0.16;
	
	var maintot = grandtot + tottax;
	$('#grandtotal').val(grandtot);
	$('#grandtax').val(tottax);
	$('#maintotal').val(maintot);
});
</script>
<script>

$('#quantity3').on('keyup',function(){
    var just = $('#total3').val();
	var grandtot = ($('#grandtotal').val() - just);
    var tot = $('#price3').val() * this.value;
    $('#total3').val(tot);
	grandtot = (grandtot + tot);
	
	var tottax = grandtot * 0.16;
	
	var maintot = grandtot + tottax;
	$('#grandtotal').val(grandtot);
	$('#grandtax').val(tottax);
	$('#maintotal').val(maintot);
});

</script>


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