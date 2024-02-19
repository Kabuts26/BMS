<?php include 'server/server.php' ?>
<?php 

	$query = "SELECT * FROM tblresident";
    $result = $conn->query($query);
	$total = $result->num_rows;

	$query1 = "SELECT * FROM tblresident WHERE gender='Male'";
    $result1 = $conn->query($query1);
	$male = $result1->num_rows;

	$query2 = "SELECT * FROM tblresident WHERE gender='Female' ";
    $result2 = $conn->query($query2);
	$female = $result2->num_rows;
	
	$date = date('Y-m-d'); 
	$query8 = "SELECT SUM(amounts) as am FROM tblpayments WHERE `date`='$date'";
	$revenue = $conn->query($query8)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Dashboard -  Barangay Management System</title> 
 
</head>
<body>
	<?php include 'templates/loading_screen.php' ?>

	<div class="wrapper">
		<!-- Main Header -->
		<?php include 'templates/main-header.php' ?>
		<!-- End Main Header -->

		<!-- Sidebar -->
		<?php include 'templates/sidebar.php' ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header">
					<div class="page-inner"  style="color:black">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-black fw-bold" style="font-size:40px" >DASHBOARD</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--2">
					<?php if(isset($_SESSION['message'])): ?>
							<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
								<?php echo $_SESSION['message']; ?>
							</div>
						<?php unset($_SESSION['message']); ?>
						<?php endif ?>
					<div class="row">
						<div class="col-md-6">
							<div class="card card-stats" style="background-color:green; color:white" >
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-users"></i>
											</div>
										</div>
										<div class="col-3 col-stats" >
										</div>
										<div class="col-6 col-stats">
											<div class="numbers mt-4">
												<h2 class="fw-bold text-uppercase">Population</h2>
												<h3 class="fw-bold text-uppercase"><?= number_format($total) ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<a href="resident_info.php?state=all" class="card-link text-light">Total Population </a>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-stats" style="background-color:violet; color:white" >
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-user"></i>
											</div>
										</div>
										<div class="col-3 col-stats">
										</div>
										<div class="col-6 col-stats">
											<div class="numbers mt-4">
												<h2 class="fw-bold text-uppercase">Male</h2>
												<h3 class="fw-bold"><?= number_format($male) ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<a href="resident_info.php?state=male" class="card-link text-light">Total Male </a>
								</div>
							</div>
						</div>
						
					</div>
					
					
					<div class="row">
					<div class="col-md-6">
							<div class="card card-stats" style="background-color: #34b8f7; color:white" >
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="icon-user-female"></i>
											</div>
										</div>
										<div class="col-3 col-stats">
										</div>
										<div class="col-6 col-stats">
											<div class="numbers mt-4">
												<h2 class="fw-bold text-uppercase">Female</h2>
												<h3 class="fw-bold text-uppercase"><?= number_format($female) ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<a href="resident_info.php?state=female" class="card-link text-light">Total Female </a>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-stats card-round" style="background-color:#ffa200; color:#fff">
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="fas fa-dollar-sign"></i>
											</div>
										</div>
										<div class="col-3 col-stats">
										</div>
										<div class="col-6 col-stats">
											<div class="numbers mt-4">
												<h2 class="fw-bold text-uppercase" style="font-size:19px">Revenue-by day</h2>
												<h3 class="fw-bold text-uppercase">P <?= number_format($revenue['am'],2) ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<a href="revenue.php" class="card-link text-light">All Revenues</a>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
							
				<?php  
					 $connect = mysqli_connect("localhost", "root", "", "bmsdb");  
					 $query = "SELECT details, count(*) as number FROM tblpayments GROUP BY details";  
					 $result = mysqli_query($connect, $query);  
				?>
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
				   <script type="text/javascript">  
				   google.charts.load('current', {'packages':['corechart']});  
				   google.charts.setOnLoadCallback(drawChart);  
				   function drawChart()  
				   {  
						var data = google.visualization.arrayToDataTable([  
								  ['Details', 'Number'],  
								  <?php  
								  while($row = mysqli_fetch_array($result))  
								  {  
									   echo "['".$row["details"]."', ".$row["number"]."],";  
								  }  
								  ?>  
							 ]);  
						var options = {  
							  title: 'Percentage of Certificates',  
							  //is3D:true,  
							  pieHole: 0.4  
							 };  
						var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
						chart.draw(data, options);  
				   }  
				   </script> 	
						<div style="width:900px;">  
                 
							<div id="piechart" style="width: 900px; height: 500px;"></div>  
						</div> 
		
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>