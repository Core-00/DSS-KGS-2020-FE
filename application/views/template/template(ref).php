<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Knowledge Growing System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

	<link rel="shortcut icon" href="<?= base_url() ?>appassets/favicon/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>appassets/favicon/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>appassets/favicon/favicon-32x32.png">

	<!-- Disable tap highlight on IE -->
	<meta name="msapplication-tap-highlight" content="no">

	<!-- Bamburgh UI Kit Stylesheets -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>appassets/assets/css/bamburgh.min.css">
	<script>
		if(localStorage.getItem('Project1') == null){
			window.location = '<?= site_url('logins') ?>';
		}

		function logout(){
			localStorage.removeItem('Project1');
			window.location = '<?= site_url('logins') ?>';
		}

		var base_url = '<?= config_item('api_endpoint') ?>';
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					"Authorization": "Bearer " + localStorage.getItem('Project1')
				}
			});
		});

	</script>
</head>

<body id="app-top">
	<div class="demo-elements-wrapper">
		<div class="container-fluid">
			<div class="row demo-wrapper">
				<div class="col-lg-12">
					<br/>
					<div class="row">
						<div class="col-md-2">
							<div class="slick-slider" data-slick='{"slidesToShow":1, "slidesToScroll": 3}'>
								<div>
									<a title="Dashboard" href="<?= site_url('dashboards') ?>"><img src="https://cdn0.iconfinder.com/data/icons/ui-flat-line-basic-1/32/Home_Beranda_Menu_UI_Interface-512.png" style="height: 40px;" class="m-auto img-fluid" alt="Dashboard"></a>
								</div>
								<div>
									<a title="Akun" href="<?= site_url('accounts') ?>"><img src="https://www.freeiconspng.com/uploads/security-icon-png-19.png" style="height: 35px;" class="m-auto img-fluid" alt="Akun"></a>
								</div>
								<div>
									<a title="Upload CSV" href="<?= site_url('csv/add') ?>"><img src="https://getdrawings.com/free-icon/icon-extension-55.png" style="height: 40px;" class="m-auto img-fluid" alt="Upload CSV"></a>
								</div>
								<div>
									<a title="List CSV" href="javascript:void(0)" onclick="alert('Comming soon')"><img src="https://icons-for-free.com/iconfiles/png/512/document+done+list+paper+survey+task+icon-1320161451127008045.png" style="height: 40px;" class="m-auto img-fluid" alt="List CSV"></a>
								</div>
								<div>
									<a title="Laporan" href="<?= site_url('reports') ?>"><img src="https://image.flaticon.com/icons/png/512/1055/1055644.png" style="height: 40px;" class="m-auto img-fluid" alt="Laporan"></a>
								</div>
								<div>
									<a title="Keluar" href="javascript:void(0)" onclick="logout()"><img src="https://image.flaticon.com/icons/png/512/1246/1246273.png" style="height: 35px;" class="m-auto img-fluid" alt="Keluar"></a>
								</div>
							</div>
						</div>
						<div class="col-md-1">
						</div>
						<?php if($this->uri->segment(2) == 'edit') { ?>
							<div class="col-md-7">
								<div class="row" style="padding-top:15px;">
								</div>
							</div>		
							<div class="col-md-2">
								<div class="row" style="padding-top:15px;">
									<div>
                                		<button type="button" class="btn btn-success" id="updateButton">Update</button>
                                		<a href="<?= site_url('reports/multigraph?uuid='. $this->input->get('uuid')) ?>" class="btn btn-info">Graph</a>
                            		</div>
                            	</div>
                            </div>
						<?php } ?>
						<?php if($this->uri->segment(1) == 'reports' && $this->uri->segment(2) == '') { ?>
							<div class="col-md-6">
								<div class="row" style="padding-top:15px;">
									<div class="input-daterange input-group d-block" data-toggle="datepicker">
										<form id="formSearchReport">
											<table width="100%">
												<tr>
													<td>
														<input type="text" class="input-sm form-control" value="<?= date('Y-m') ?>-01" placeholder="Tanggal awal disini..." id="start" name="start" />
													</td>
													<td>
														<input type="text" class="input-sm form-control" value="<?= date('Y-m') ?>-30" placeholder="Tanggal akhir disini..." id="end" name="end" />
													</td>
													<td>
														<button class="btn btn-primary">Cari</button>
													</td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-1">
								<div class="row" style="padding-top:15px;">
								</div>
							</div>		
							<div class="col-md-2">
								<div class="row" style="padding-top:15px;">
									<div id="linkToMultiGraph">
										<button type="button" id="multiGraph" class="btn btn-success">Multi Graph</button>
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($this->uri->segment(2) == 'multigraph') { ?>
							<div class="col-md-7">
								<div class="row" style="padding-top:15px;">
								</div>
							</div>		
							<div class="col-md-2">
								<div class="row" style="padding-top:15px;">
									<div>
										<div class="custom-control custom-switch my-3">
                                            <input type="checkbox" class="custom-control-input" id="merge-chart">
                                            <label class="custom-control-label" for="merge-chart">Gabungkan Grafik</label>
                                        </div>
                            		</div>
                            	</div>
                            </div>
						<?php } ?>
					</div>
					<br/>
					<div class="row">
						<?= $content_for_layout ?>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- Bamburgh UI Kit Javascript Core -->
		<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

		<!--Bootstrap init-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/bootstrap/bootstrap.min.js"></script>

		<!-- Bamburgh UI Kit Javascript Widgets -->

		<!--Perfect scrollbar-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>

		<!--Perfect scrollbar init-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!--StickyKit-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/stickykit/js/stickykit.min.js"></script>

		<!--StickyKit init-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/stickykit/stickykit.min.js"></script>

		<!--Headroom-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/headroom/js/headroom.min.js"></script>

		<!--Headroom init-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/headroom/headroom.min.js"></script>

		<!--Animations-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/wow/js/wow.min.js"></script>

		<!--Animations init-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/wow/wow.min.js"></script>
		<!--Slick slideshow-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/slick/js/slick.min.js"></script>

		<!--Slick slideshow init-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/slick/slick.min.js"></script>

		<!--SweetAlerts-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/sweet-alerts/js/sweetalert.min.js"></script>

		<!--SweetAlerts init-->

		<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/sweet-alerts/sweetalert.min.js"></script>

		<!--DataTables-->

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap4.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.0/css/keyTable.bootstrap4.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.bootstrap4.min.css" />

		<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>-->
		<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>-->
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
		<!--<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>-->
		<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.0/js/dataTables.keyTable.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>
		<!--<script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>-->

		<!--Apexcharts-->

		<?php
if($this->uri->segment(1) == "dashboards"){
	?>
			<!-- <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/apexcharts/js/apexcharts.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/apexcharts/sparklines.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/apexcharts/light-charts.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/apexcharts/dark-charts.min.js"></script> -->
			<?php
}
?>

				<!--Datatables init-->
				<!-- <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/datatables/datatables.min.js"></script> -->
				<!--Notify-->

				<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/notify/js/notify.min.js"></script>

				<!--Notify init-->

				<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/notify/notify.min.js"></script>

				<!--Bootstrap Datepicker-->

				<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


				<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
</body>

</html>