<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tblresident";
    $result = $conn->query($query);

    $resident = array();
	while($row = $result->fetch_assoc()){
		$resident[] = $row; 
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Resident Information -  Barangay Management System</title>
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
				<div class="panel-header" style="color:black">
					<div class="page-inner">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-black fw-bold" style="font-size:40px ">RESIDENT INFORMATION</h2>
							</div>
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
										<div class="card-title"><b>Resident Information</b></div>
                                        <?php if(isset($_SESSION['username'])):?>
										<div class="card-tools">
											<a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
												<i class="fa fa-plus"></i>
												Resident
											</a>
										</div>
                                        <?php endif ?>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="residenttable" class="display table table-striped">
											<thead>
												<tr>
													<th scope="col">Fullname</th>
                                                    <th scope="col">Email</th>
													<th scope="col">Birthdate</th>
													<th scope="col">Age</th>
													<th scope="col">Civil Status</th>
                                                    <th scope="col">Gender</th>
													<th scope="col">Purok</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($resident)): ?>
													<?php $no=1; foreach($resident as $row): ?>
													<tr>
														<td>
                                                            <div class="avatar avatar-xs">
                                                                <img src="<?= preg_match('/data:image/i', $row['picture']) ? $row['picture'] : 'assets/uploads/resident_profile/'.$row['picture'] ?>" alt="Resident Profile" class="avatar-img rounded-circle">
                                                            </div>
                                                            <?= ucwords($row['lastname'].', '.$row['firstname'].' '.$row['middlename']) ?>
                                                        </td>
                                                        <td><?= $row['email'] ?></td>
														
														<td><?= $row['birthdate'] ?></td>
														<td><?= $row['age'] ?></td>
                                                        <td><?= $row['civilstatus'] ?></td>
                                                        <td><?= $row['gender'] ?></td>
                                                        <td><?= $row['purok'] ?></td>
														<td>
															<div class="form-button-action">
                                                                <a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" title="View Resident" onclick="editResident(this)" 
                                                                    data-id="<?= $row['id'] ?>" data-email="<?= $row['email'] ?>" data-fname="<?= $row['firstname'] ?>" data-mname="<?= $row['middlename'] ?>" data-lname="<?= $row['lastname'] ?>"
                                                                    data-bplace="<?= $row['birthplace'] ?>" data-bdate="<?= $row['birthdate'] ?>" data-age="<?= $row['age'] ?>"
                                                                    data-cstatus="<?= $row['civilstatus'] ?>" data-gender="<?= $row['gender'] ?>"data-purok="<?= $row['purok'] ?>"
                                                                    data-contact="<?= $row['contact'] ?>" data-address="<?= $row['address'] ?>" 
                                                                    data-img="<?= $row['picture'] ?>" data-citi="<?= $row['citizenship'];?>" data-occu="<?= $row['occupation'] ?>"  >
                                                                    <?php if(isset($_SESSION['username'])): ?>
                                                                    <i class="fa fa-edit"></i>
                                                                    <?php else: ?>
                                                                        <i class="fa fa-eye"></i>
                                                                    <?php endif ?>
                                                                </a>
                                                                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='administrator'):?>
															
                                                                <a type="button" data-toggle="tooltip" href="model/remove_resident.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this resident?');" class="btn btn-link btn-danger" data-original-title="Remove">
																	<i class="fa fa-times"></i>
																</a>
                                                                <?php endif ?>
															</div>
														</td>
                                                        
														
													</tr>
													<?php $no++; endforeach ?>
												<?php endif ?>
											</tbody>
											
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <!-- Modal -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>NEW RESIDENT INFORMATION FORM</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_resident.php" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <div class="row">
                                <div class="col-md-4">
                                    <div style="width: 370px; height: 250;" class="text-center" id="my_camera">
                                        <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250" >
                                    </div>
                                    <div id="profileImage">
                                        <input type="hidden" name="profileimg">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="img" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                         <label>Email Address</label>
                                         <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                                    </div>
									
                                    <div class="form-group">
                                        <label>Citizenship</label>
                                        <input type="text" class="form-control" name="citizenship" placeholder="Enter citizenship" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" class="form-control" placeholder="Enter Firstname" name="fname" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Middlename</label>
                                                <input type="text" class="form-control" placeholder="Enter Middlename" name="mname" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" placeholder="Enter Lastname" name="lname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                     
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Place of Birth</label>
                                                <input type="text" class="form-control" placeholder="Enter Birthplace" name="bplace" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Birthdate</label>
                                                <input type="date" class="form-control" placeholder="Enter Birthdate" name="bdate" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" class="form-control" placeholder="Enter Age" min="1" name="age" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <label>Civil Status</label>
                                                <select class="form-control" name="cstatus">
                                                    <option disabled selected>Select Civil Status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widow">Widow</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" required name="gender">
                                                    <option disabled selected value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Purok</label>
                                                <select class="form-control" required name="purok">
                                                    <option disabled selected>Select Purok Name</option>
                                                    <option value="Purok 1">Purok 1</option>
                                                    <option value="Purok 2">Purok 2</option>
                                                    <option value="Purok 3">Purok 3</option>
													<option value="Purok 4">Purok 4</option>
                                                    <option value="Purok 5">Purok 5</option>
                                                    <option value="Purok 6">Purok 6</option>
													<option value="Purok 7">Purok 7</option>
                                                    <option value="Purok 8">Purok 8</option>
													<option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                       
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col">
											<div class="form-group">
												<label>Contact Number</label>
												<input type="number" class="form-control" name="contact" placeholder="Enter Contact Number" required>
											</div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Occupation</label>
                                                <input type="text" class="form-control" placeholder="Enter Occupation" name="occupation" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" required placeholder="Enter Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>EDIT/VIEW RESIDENT INFORMATION</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_resident.php" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="my_camera1" style="width: 370px; height: 250;" class="text-center">
                                        <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250" id="image">
                                    </div>
                                    <?php if(isset($_SESSION['username'])):?>
                                    
                                    <div id="profileImage1">
                                        <input type="hidden" name="profileimg">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="img" accept="image/*">
                                    </div>
                                    <?php endif ?>
									 
                                           <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                                            </div>
                                     
                                   
                                    
                                    <div class="form-group">
                                        <label>Citizenship</label>
                                        <input type="text" class="form-control" name="citizenship" id="citizenship" placeholder="Enter citizenship" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" class="form-control" placeholder="Enter Firstname" name="fname" id="fname" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Middlename</label>
                                                <input type="text" class="form-control" placeholder="Enter Middlename" name="mname" id="mname" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" placeholder="Enter Lastname" name="lname" id="lname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Place of Birth</label>
                                                <input type="text" class="form-control" placeholder="Enter Birthplace" name="bplace" id="bplace" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Birthdate</label>
                                                <input type="date" class="form-control" placeholder="Enter Birthdate" name="bdate" id="bdate" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" class="form-control" placeholder="Enter Age" min="1" name="age" id="age" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <label>Civil Status</label>
                                                <select class="form-control" required name="cstatus" id="cstatus">
                                                    <option disabled selected>Select Civil Status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widow">Widow</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" required name="gender" id="gender">
                                                    <option disabled selected value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Purok</label>
                                                <select class="form-control" required name="purok" id="purok">
                                                    <option disabled selected>Select Purok Name</option>
                                                    <option value="Purok 1">Purok 1</option>
                                                    <option value="Purok 2">Purok 2</option>
                                                    <option value="Purok 3">Purok 3</option>
													<option value="Purok 4">Purok 4</option>
                                                    <option value="Purok 5">Purok 5</option>
                                                    <option value="Purok 6">Purok 6</option>
													<option value="Purok 7">Purok 7</option>
                                                    <option value="Purok 8">Purok 8</option>
													<option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                       
                                    </div>
                                    
                                    <div class="row">
                                       <div class="col">
											<div class="form-group">
												<label>Contact Number</label>
												<input type="number" class="form-control" name="contact" placeholder="Enter Contact Number" >
											</div>
										</div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Occupation</label>
                                                <input type="text" class="form-control" placeholder="Enter Occupation" name="occupation" id="occupation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" required name="address" placeholder="Enter Address" id="address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="res_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php if(isset($_SESSION['username'])): ?>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <?php endif ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#residenttable').DataTable();
        });
    </script>
</body>
</html>