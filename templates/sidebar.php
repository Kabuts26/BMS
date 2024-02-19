<?php // function to get the current page name
function PageName() {
  return substr( $_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
}

$current_page = PageName();
?>

<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner" style="background-color:maroon">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <?php if(!empty($_SESSION['avatar'])): ?>
                        <img src="<?= preg_match('/data:image/i', $_SESSION['avatar']) ? $_SESSION['avatar'] : 'assets/uploads/avatar/'.$_SESSION['avatar'] ?>" alt="..." class="avatar-img rounded-circle">
                    <?php else: ?>
                        <img src="assets/img/person.png" alt="..." class="avatar-img rounded-circle">
                    <?php endif ?>
                   
                </div>
                <div class="info" >
                    <a data-toggle="collapse" href="<?= isset($_SESSION['username']) && $_SESSION['role']=='administrator' ? '#collapseExample' : 'javascript:void(0)' ?>" aria-expanded="true">
                        <span style="color:white">
                        <?= isset($_SESSION['username']) ? ucfirst($_SESSION['username']) : 'Guest User' ?>
                            <span style="color:white" class="user-level"><?= isset($_SESSION['role']) ? ucfirst($_SESSION['role']) : 'Guest' ?></span>
                        <?= isset($_SESSION['username']) && $_SESSION['role']=='administrator' ? '<span class="caret"></span>' : null ?> 
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#edit_profile" data-toggle="modal">
                                    <span class="link-collapse" style="color:white">Edit Profile</span>
                                </a>
                                <a href="#changepass" data-toggle="modal">
                                    <span class="link-collapse" style="color:white">Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?= $current_page=='dashboard.php' || $current_page=='resident_info.php' || $current_page=='purok_info.php'  ? 'active' : null ?>">
                    <a href="dashboard.php" >
                        <i style="color:white" class="fas fa-home"></i>
                        <p style="color:white">Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section" style="color:white">Menu</h4>
                </li>
                <li class="nav-item <?= $current_page=='officials.php' ? 'active' : null ?>">
                    <a href="officials.php">
                        <i style="color:white" class="fas fa-user-tie"></i>
                        <p style="color:white">Brgy Officials and Staff</p>
                    </a>
                </li>
                <li class="nav-item <?= $current_page=='resident.php' || $current_page=='generate_resident.php' ? 'active' : null ?>">
                    <a href="resident.php">
                        <i style="color:white" class="icon-people"></i>
                        <p style="color:white">Resident Information</p>
                    </a>
                </li>
				
				<!--CERTICATES-->
				 <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section" style="color:white">Certificates</h4>
                </li>
				
			<li class="nav-item <?= $current_page=='resident_certification.php'|| $current_page=='resident_indigency.php' ||$current_page=='cert_residency.php' ||$current_page=='solo_parent_cert.php' ||$current_page=='cert_cohabitation.php' ||$current_page=='backup.php' ? 'active' : null ?>">
                    <a href="#certificates" data-toggle="collapse" class="collapsed" aria-expanded="false">
                        <i style="color:white" class="icon-docs"></i>
                            <p style="color:white">Brgy Certificates</p>
                        <span class="caret"></span>
                    </a>
				
				<div class="collapse <?= $current_page=='resident_certification.php'|| $current_page=='resident_indigency.php' ||$current_page=='cert_residency.php' ||$current_page=='solo_parent_cert.php' ||$current_page=='cert_cohabitation.php' ||  $current_page=='backup.php' ? 'show' : null ?>" id="certificates">
					<ul class="nav nav-collapse">	
						<li class="nav-item <?= $current_page=='resident_certification.php' || $current_page=='generate_brgy_cert.php' ? 'active' : null ?>">
							<a href="resident_certification.php">
								<span class="sub-item" style="color:white">Barangay Clearance</span>
							</a>
						</li>
						<li class="nav-item <?= $current_page=='resident_indigency.php' || $current_page=='generate_indi_cert.php' ? 'active' : null ?>">
							<a href="resident_indigency.php">
								<span class="sub-item" style="color:white">Certificate of Indigency</span>
							</a>
						</li>
						<li class="nav-item <?= $current_page=='cert_residency.php' || $current_page=='generate.php' ? 'active' : null ?>">
							<a href="cert_residency.php">
								 <span class="sub-item" style="color:white">Certificate of Residency</span>
							</a>
						</li>
						<li class="nav-item <?= $current_page=='solo_parent_cert.php' || $current_page=='generate_business_permit.php' ? 'active' : null ?>">
							<a href="solo_parent_cert.php">
								 <span class="sub-item" style="color:white">Solo Parent Certificate</span>
							</a>
						</li>
						<li class="nav-item <?= $current_page=='cert_cohabitation.php' || $current_page=='generate_business_permit.php' ? 'active' : null ?>">
							<a href="cert_cohabitation.php">
								 <span class="sub-item" style="color:white">Certificate of Cohabitation</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
        
                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='staff'): ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                    </li>
                <?php endif ?>
                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='administrator'): ?>
                <li class="nav-item <?= $current_page=='revenue.php' ? 'active' : null ?>">
                    <a href="revenue.php">
                        <i style="color:white" class="fas fa-dollar-sign"></i>
                        <p style="color:white">Revenues</p>
                    </a>
					
                </li>
				
				
				<!--SYSTEM-->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section" style="color:white">System</h4>
                </li>
                
				
				<!--SETTINGS-->
				<li class="nav-item <?= $current_page=='position.php' || $current_page=='users.php' ? 'active' : null ?>">
                    <a href="#settings" data-toggle="collapse" class="collapsed" aria-expanded="false">
                        <i style="color:white" class="icon-wrench"></i>
                            <p style="color:white">Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?= $current_page=='position.php'||$current_page=='users.php' ? 'show' : null ?>" id="settings">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#barangay" data-toggle="modal">
                                    <span class="sub-item" style="color:white">Barangay Info</span>
                                </a>
                            </li>
                            
                          
                            <li class="<?= $current_page=='position.php' ? 'active' : null ?>">
                                <a href="position.php">
                                    <span class="sub-item" style="color:white">Positions</span>
                                </a>
                            </li>
							
							
                            <li class="<?= $current_page=='chairmanship.php' ? 'active' : null ?>">
                                <a href="chairmanship.php">
                                    <span class="sub-item" style = "color:white;">Chairmanship</span>
                                </a>
                            </li>
                           
                            
                            <?php if($_SESSION['role']=='staff'):?>
                                
                            <?php else: ?>
                                <li class="<?= $current_page=='users.php' ? 'active' : null ?>">
                                    <a href="users.php">
                                        <span class="sub-item" style="color:white">Users</span>
                                    </a>
                                </li>
                               
                               
                               
                            <?php endif ?>
                        </ul>
                    </div>
                </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>