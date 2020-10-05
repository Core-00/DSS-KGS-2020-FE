<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>KGS-Knowledge Growing System</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dashboard/navigation.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dashboard/content-wrapper.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dashboard/help.css">
</head>
<body>
	<div class="custom_nav-wrapper">
		<div class="custom_nav-upper p-3">
			<h6 class="text-white font-weight-bold mb-4">
				DSS KGS COVID-19 DASHBOARD
			</h6>

			<!-- ==========><>|Profile|<><========== -->
			<div class="custom_nav-profile mb-4">
				<div class="custom_nav-profile-media mr-3">
					<img src="<?= base_url() ?>assets/images/auths/default-user.png" alt="auth-image">
				</div>

				<div class="dropdown">
					<a class="text-white font-weight-bold dropdown-toggle" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						User
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-user">
						<a class="dropdown-item" href="<?= site_url('accounts') ?>">Profile</a>
						<a class="dropdown-item" href="#" onclick="logout()">Log Out</a>
					</div>
				</div>
			</div>
			<!-- ==========><>|Profile|<><========== -->

			<div class="border mb-4"></div>

			<!-- ==========><>|Profile|<><========== -->
			<ul class="custom_nav-menu">
				<li class="p-2 px-4">
					<a href="<?= site_url('dashboards') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-dashboard.png" alt="auth-image" class="mr-4">
						<span>Dashboard</span>
					</a>
				</li>

				<li class="p-2 px-4">
					<a href="<?= site_url('csv/list_history') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-list.png" alt="auth-image" class="mr-4">
						<span>History</span>
					</a>
				</li>

				<li class="p-2 px-4">
					<a href="<?= site_url('csv/add') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-input.png" alt="auth-image" class="mr-4">
						<span>Input Data</span>
					</a>
				</li>

				<!-- <li class="p-2 px-4">
					<a href="<?= site_url('reports') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-table.png" alt="auth-image" class="mr-4">
						<span>Tables</span>
					</a>
				</li> -->

				<li class="p-2 px-4">
					<a href="<?= site_url('reports/graph') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-graphs.png" alt="auth-image" class="mr-4">
						<span>Graphs</span>
					</a>
				</li>

				<!-- <li class="p-2 px-4">
					<a href="<?= site_url('reports/print_reports') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-print.png" alt="auth-image" class="mr-4">
						<span>Print Reports</span>
					</a>
				</li> -->

				<li class="p-2 px-4">
					<a href="<?= site_url('reports/print') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-print.png" alt="auth-image" class="mr-4">
						<span>Print Report</span>
					</a>
				</li>
			</ul>
		</div>

		<div class="custom_nav-lower p-3">
			<ul class="custom_nav-menu">
				<li class="p-2 px-4">
					<a href="<?= site_url('dashboards/help') ?>" class="h6 m-0">
						<img src="<?= base_url() ?>assets/images/dashboard/menu-help.png" alt="auth-image" class="mr-4">
						<span>Help</span>
					</a>
				</li>
			</ul>

			<div class="border mb-3"></div>
			<div class="custom_nav-copy text-white">
				<h6 class="font-weight-bold">&copy; DSS KGS for Covid-19 Dashboard - Copyright@2020</h6>

				<p class="m-0">
					Created by CAIRG Team for Task Force for Research and Technology Innovation for Covid-19 (TFRIC-19) BPPT
				</p>
			</div>
		</div>
	</div>

	<div class="content_wrapper">
		<div class="content_wrapper-content">
			<div class="container">
				<?= $content_for_layout ?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<script>
		if(localStorage.getItem('Project1') == null){
			window.location = '<?= site_url('logins') ?>';
		}

		var base_url = '<?= config_item('api_endpoint') ?>';

		function logout(){
			localStorage.removeItem('Project1');
			window.location = '<?= site_url('logins') ?>';
		}

		$(document).ready(function(){
			$.ajax({
                url: base_url +"users",
                type: "GET",
                dataType: "json",
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('Project1')
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
					$("#dropdown-user").empty().html(response.username)
                }
            });

		})

	</script>
</body>
</html>
