<style>
img{
	border-radius:50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 40%;
}
</style>
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header"  style="background-color:maroon; color:white">   
        <a href="dashboard.php" class="logo">
			<div class="user-p">
				<img src="assets/img/logo1.jpg" height="60px" width="80px"alt="navbar brand" class="navbar-brand">
				<span class="text-light ml-2 fw-bold" style="font-size:15px">BRIMIS</span>
			</div>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" style="background-color: maroon">
        
        <div class="container-fluid" >
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
						<path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
						<path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
						</svg>
                    </a>
                    <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                        <li>
                            <?php if(isset($_SESSION['role'])):?>
                                <a class="see-all" href="model/logout.php">Sign Out<i class="icon-logout"></i> </a>
                            <?php else: ?>
                                <a class="see-all" href="login.php">Sign In<i class="icon-login"></i> </a>
                            <?php endif ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>