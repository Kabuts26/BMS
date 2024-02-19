<?php include 'server/server.php' ?>
<?php 
    $id = $_GET['id'];
	$query = "SELECT * FROM tblresident WHERE id='$id'";
    $result = $conn->query($query);
    $resident = $result->fetch_assoc();

    $query1 = "SELECT * FROM tblofficials JOIN tblposition ON tblofficials.position=tblposition.id WHERE tblposition.position NOT IN ('SK Chairrman','Secretary','Treasurer')
               ORDER BY `order` ASC";
    $result1 = $conn->query($query1);
    $officials = array();
	while($row = $result1->fetch_assoc()){
		$officials[] = $row; 
	}

    $c = "SELECT * FROM tblofficials JOIN tblposition ON tblofficials.position=tblposition.id WHERE tblposition.position='Captain'";
    $captain = $conn->query($c)->fetch_assoc();
    $s = "SELECT * FROM tblofficials JOIN tblposition ON tblofficials.position=tblposition.id WHERE tblposition.position='Secretary'";
    $sec = $conn->query($s)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Solo Parent Certificate -  Barangay Management System</title>
    <style>
        @page  
        { 
            size: auto;   /* auto is the initial value */ 

            /* this affects the margin in the printer settings */ 
            margin: 20mm 20mm 20mm 20mm;  
        } 

    </style>
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
				
					<div class="page-inner"   style="color:black">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-black fw-bold" >GENERATE CERTIFICATE</h2>
							</div>
						</div>
					</div>
				
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">

                            <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            <?php unset($_SESSION['message']); ?>
                            <?php endif ?>

                            <div class="card" style ="outline-style:solid; outline-color:maroon">
								<div class="card-header" style ="outline-style:solid; outline-color:maroon">
									<div class="card-head-row">
										<div class="card-title"><b>Barangay Certificate</b></div>
										<div class="card-tools">
											<button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
												<i class="fa fa-print"></i>
												Print Certificate
											</button>
										</div>
									</div>
								</div>
								<div class="card-body m-5" id="printThis">
                                     <div class="d-flex flex-wrap justify-content-around" style="border-bottom:1px solid red">
                                        <div class="text-center">
                                            <img src="assets/uploads/<?= $city_logo ?>" class="img-fluid" width="100">
										</div>
										<div class="text-center">
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Province of <?= ucwords($province) ?></h3>
											<h3 class="mb-0"><?= ucwords($town) ?></h3>
											<h1 class="fw-bold mb-0"><?= ucwords($brgy) ?></i></h2>
                                            <p><i>Mobile No. <?= $number ?></i></p>
										</div>
                                        <div class="text-center">
                                            <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100">
										</div>
									</div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div class="text-center p-3" style="border:2px solid red">
                                                <?php if(!empty($officials)):?>
                                                    <?php foreach($officials as $row): ?>
                                                        <h3 class="mt-3 fw-bold mb-0 text-uppercase"><?= ucwords($row['name']) ?></h3>
                                                        <h5 class="mb-2 text-uppercase"><?= ucwords($row['position']) ?></h5>
                                                    <?php endforeach ?>
                                                <?php endif ?>

                                            </div><br><br>
											<img src="assets/img/yellow-circle.png" style="height:300px; width:300px">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="text-center">
                                                <h2 class="mt-4 fw-bold">Office of the Barangay Captain</h2>
                                            </div>
                                            <div class="text-center">
                                                <h1 class="mt-4 fw-bold mb-5">Solo Parent Certificate</h1>
                                            </div>
                                            <h2 class="mt-5">To whom it may concern:</h2>
                                            <h2 class="mt-3" style="text-indent: 40px;">This is to certify that, <span class="fw-bold" style="font-size:25px"><u><?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?></u></span> , 
												of legal age, <?= ucwords($province) ?> is a bonifide resident of <u><?= ucwords($brgy) ?>.</u>
                                            <span style="font-size:25px">This certify further that she is a <b>(Solo)Single Parent</b>.</h2>
                                            <h2 class="mt-3" style="text-indent: 40px;">This certification is issued upon the request of Mr/Ms. for whatever legal purposes.</h2>
											
										
                                            <h2 class="mt-5">Issued this <span style="font-size:25px"><?= date('m/d/Y') ?> at <?= ucwords($brgy) ?>,<?= ucwords($province) ?>.</span> </h2>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <div class="p-3 text-right mr-3">
                                                <h2 class="fw-bold mb-0 text-uppercase"><?= ucwords($captain['name']) ?></h2>
                                                <p class="mr-3">Punong Barangay</p>
                                            </div>
                                      
                                        </div>
                                      
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Modal -->
            <div class="modal fade" id="pment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_pment.php" >
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" name="amount" placeholder="Enter amount to pay" required>
                                </div>
                                <div class="form-group">
                                    <label>Date Issued</label>
                                    <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Payment Details(Optional)</label>
                                    <textarea class="form-control" placeholder="Enter Payment Details" name="details">Solo Parent Certificate Payment</textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="form-control" name="name" value="<?= ucwords($resident['firstname'].' '.$resident['middlename'].' '.$resident['lastname']) ?>">
                            <button type="button" class="btn btn-secondary" onclick="goBack()">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			<?php if(!isset($_GET['closeModal'])){ ?>
            
                <script>
                    setTimeout(function(){ openModal(); }, 1000);
                </script>
            <?php } ?>
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
    <script>
            function openModal(){
                $('#pment').modal('show');
            }
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
    </script>
</body>
</html>