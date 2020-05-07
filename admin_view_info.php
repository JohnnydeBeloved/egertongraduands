<?php
include('../connect.php');
include('../addgraduand.php');
include('../session_admin.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Egerton University Graduands</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="print" href="print.css" />
	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
	<!-- icon -->
	<link rel="icon" href="../images/EU-logo.jpg" >
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><i class="fa fa-heart"></i> <span>Egerton Graduands</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile">
						<div class="profile_pic">
							<img src="..\img\sample.png" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php echo "$name"; ?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<!-- /sidebar menu -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="..\img\sample.png" alt="">Admin
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<!-- <li><a href="javascript:;"> Profile</a></li>
									<li>
										<a href="javascript:;">
											<span class="badge bg-red pull-right">50%</span>
											<span>Settings</span>
										</a>
									</li>
									<li><a href="javascript:;">Help</a></li> -->
									<li><a href="javascript:;" data-toggle="modal" data-target="#change_pass">Change password</a></li>
									<li><a href="..\index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>
							<li role="presentation" class="dropdown">
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3><a href="admin1.php"> <i class="fa fa-arrow-left"></i> Back</a></h3>
						</div>
						<div class="title_right">				

						</div>
					</div>

					<div class="clearfix"></div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2></h2>
								<div class="row">
									<div class="col-md-12">
										<ul class="nav nav-pills">
											<li class="active"><a data-toggle="pill" href="#pds">Personal Data Sheet</a></li>
											<li><a data-toggle="pill" href="#clearance">Clearance Status</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="x_content col-md-12" >
								<form action="../update_graduand_pds.php" method="post" class="form-horizontal form-label-left">
									<div class="container-fluid" style="border: 2px solid">
										<div class="tab-content">
											<?php
											$a = $_POST['haydi'];
											$sql = "SELECT * FROM pds_personal_information 
											NATURAL JOIN clearance WHERE id = $a "
											;
											$query = $conn->prepare($sql);
											$query->execute();
											$fetch = $query->fetchAll();

											foreach ($fetch as $key => $value) { ?>
											<!-- Personal info tab -->
											<div id="pds" class="tab-pane fade in active">
												<div class="row">
													<div class="col-md-3">
														<small>Clearance Form</small>
													</div>
													<div class="row">
														<div class="col-md-12">
															<center><h2><strong>PERSONAL DATA SHEET</strong></h2></center>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
														</div>
														<div class="col-md-4 pull-right">
															<strong>1.CS ID No. ______________________________</strong>
														</div>
													</div>
													<table class="table table-bordered" style="margin-bottom: 0%;">
														<thead>
															<tr>
																<td colspan="4"><h5><strong>I. Personal Information</strong></h5></td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td width="15%">2. Surname</td>
																<td colspan="4"><?php echo $value['surname'];?></td>
															</tr>
															<tr>
																<td>First Name</td>
																<td colspan="4"><?php echo $value['firstname'];?></td>
															</tr>
															<tr>
																<td>Middle Name</td>
																<td width="30%"><?php echo $value['middlename'];?></td>
																<td width="17%">3. Name Extension</td>
																<td><?php echo $value['name_extension'];?></td>
															</tr>
															<tr>
																<td>4. Date of Birth</td>
																<td><?php echo $value['birthday'];?></td>
																<td rowspan="2">16. Residential Address</td>
																<td rowspan="2"><?php echo $value['residential_address']; ?></td>
															</tr>
															<tr>
																<td>5. Place of Birth</td>
																<td><?php echo $value['place_of_birth']; ?></td>
															</tr>
															<tr>
																<td>6. Sex</td>
																<td><?php echo $value['sex']; ?></td>
																<td><div class="pull-right">Zip Code</div></td>
																<td><?php echo $value['residential_zipcode']; ?></td>
															</tr>
															<tr>
																<td>7.Civil Status</td>
																<td>
																	<?php 
																	if ($value['civil_status'] === 1) {
																		echo "Single";
																	}elseif ($value['civil_status'] === 2) {
																		echo "Married";
																	}elseif ($value['civil_status'] === 3) {
																		echo "Annuled";
																	}elseif ($value['civil_status'] === 4) {
																		echo "Widowed";
																	}elseif ($value['civil_status'] === 5) {
																		echo "Separated";
																	}else{
																		echo $value['other_civil_status'];;
																	}
																	?>
																</td>
																<td>19. Telephone No.</td>
																<td><?php echo $value['residential_tel_no']; ?></td>
															</tr>
															<tr>
																<td>8. Citizenship</td>
																<td><?php echo $value['citizenship']; ?></td>
																<td rowspan="2">18. Permanent Address</td>
																<td rowspan="2"><?php echo $value['permanent_address']; ?></td>
															</tr>
															<tr>
																<td>9. Height</td>
																<td><?php echo $value['height']; ?> m</td>
															</tr>
															<tr>
																<td>10. Weight</td>
																<td><?php echo $value['weight']; ?> kg</td>
																<td><div class="pull-right">Zip Code</div></td>
																<td><?php echo $value['permanent_zipcode']; ?></td>
															</tr>
															<tr>
																<td>11. Blood Type</td>
																<td>Type <?php echo $value['blood_type']; ?></td>
																<td>19. Telephone No.</td>
																<td><?php echo $value['permanent_tel_no']; ?></td>
															</tr>
															<tr>
																<td>12. GSIS ID NO.</td>
																<td><?php echo $value['gsis_id_no']; ?></td>
																<td>20. Email Address</td>
																<td><?php echo $value['email_address']; ?></td>
															</tr>
															<tr>
																<td>13. PAG-IBIG ID NO.</td>
																<td><?php echo $value['pagibig_id_no']; ?></td>
																<td>21. Cellphone No.</td>
																<td><?php echo $value['cellphone_no']; ?></td>
															</tr>
															
											<!--/ Personal info tab -->
											<!-- Family background tab-->
											<div id="clearance" class="tab-pane fade">
												<div class="row">
													<div class="col-md-12">
														<?php	
														$sql = "SELECT * FROM graduand WHERE id = $a ";
														$query = $conn->prepare($sql);
														$query->execute(array($a));
														$row = $query->fetch();
														$name = $row['graduand_Fname']. " " . $row['graduand_Mname']. " " . $row['graduand_Lname'];
														$pic = $row['graduand_picture'];
														?>
														<center>
															Republic of Kenya<br />
															<strong>Egerton University</strong><br />
															Njoro, Nakuru
															<br />
															<br />
															<strong>GRADUAND CLEARANCE</strong>
															<br />
															<small>(Purpose: Be able to graduate</small>
														</center>
													</div>
													<div class="row">
														<div class="col-md-3 pull-right">
															<center>______________
																<br />
																Date</center>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<strong>The Admission Officer</strong><br />
																Egerton University <br />
																Njoro<br /><br />
																<u><?php echo $name ?></u>:<br />
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<p>
																	I Confirm that I have been cleared by the following offices as per the dates:
																</p>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<center>
																<label>Until
																	<input type="text" class="col-md-1 pull-right" name="other_civil_status" style="width: 70%;
																	border-top: none; border-left: none; border-right:none; border-bottom: 1px solid; margin-left: -30px;">
																</label>
																<label>, my e-mail address is:
																	<input type="text" class="col-md-1 pull-right" name="other_civil_status" style="width: 51%;border-top: none;border-left: none;border-right: none;border-bottom: 1px solid;">
																</label>
															</center>
														</div>
														<div class="col-md-3 pull-right">
															<div class="pull-right">
																<p>Very truly yours,</p>
																<u><?php echo $name ?></u><br />
																<b>(Print name before signing)</b>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="row">
																<br />
																<br />
																<br />
																<center><h2>Certification</h2>
																	<p>WE CAN CERTIFY THAT <?php echo $name; ?> is cleared of all money, property and other accountabilities as of the date indicated.</p>
																</center>
															</div>
															<div class="row" style="border:1px solid;">
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_faculty_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Dean of Faculty</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_library_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>University Librarian</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_halls_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Chief Halls Officer</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_catering_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Chief Catering Officer</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_security_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Security Department</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_games_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Games Department</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_medical_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Chief Medical Officer</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_dean_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Dean of Students</small>
																		</p>
																	</center>
																</div>
																<div class="col-md-4">
																	<center>
																		<?php 
																		if ($value['is_finance_approval'] == 0){
																			echo '';
																		}else{
																			echo '<i class="glyphicon glyphicon-ok"></i>';
																		}
																		?>
																		<br />
																		<p>________________________<br />
																			<small>Student Finance Office</small>
																		</p>
																	</center>
																</div>
															<div class="row">
																<h4 style="margin-left:300px">APPROVED:</h4>
																<center>
																	<?php 
																	if ($value['is_vp_admin_approval'] == 0){
																		echo '';
																	}else{
																		echo '<i class="glyphicon glyphicon-ok"></i>';
																	}
																	?>
																	<br />
																	<p>________________________<br />
																		<small>ADMISSION OFFICER</small>
																	</p>
																</center>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--/ Family background tab-->
										</div>
										<?php } ?>
									</div>
								</form>
								<div class="pull-right">
									<button onclick="window.print()" id="btnPrint" class="btn btn-primary btn-m " >
										Print Report
									</button>
								</div>
							</div>	<!-- /x content -->
						</div>		
					</div>
				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					by:John
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>
	<script src="../build/js/md5.js"></script>

	<!-- Datatables -->
	<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
	<script src="../vendors/jszip/dist/jszip.min.js"></script>
	<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
	<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

	<script type="text/javascript">
		jQuery(function(){
			$('form[action="save_deadline"]').on('submit', function(e){
				e.preventDefault();

				var da = $('input[name="deadline"]').val();

				$.ajax({
					type: 'POST',
					url: 'set_deadline.php',
					data: {d_date: da}
				})
				.done(function(data){
					$('.save_dl').text('Deadline has been set');
					setTimeout(function(){
						location.reload();
					}, 3000);
				});
			});

			$('.reset_dl').on('click', function(e){
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'reset_dl.php'
				})
				.done(function(data){
					$('.save_dl').text('Deadline has been reset');
					setTimeout(function(){
						location.reload();
					}, 3000);
				});
			});

			$('form[name="fchange_p"]').on('submit', function(e){
				e.preventDefault();

				var sess_pass = '<?php echo $a_sess_pass; ?>';
				var sess_id = '<?php echo $a_sess_id; ?>';

				var a = $('[name="old_pass1"]').val();
				var b = $('[name="new_pass1"]').val();
				var c = $('[name="conf_pass1"]').val();

				if (md5(a) !== sess_pass){
					$('.edit_pass1').text('Please enter your current password');
					$('[name="old_pass1"]').val('').focus();
				}else{
					if (b === '' && c !== ''){
						$('.edit_pass1').text('Please enter your new password');
					}else if (b !== '' && c === ''){
						$('.edit_pass1').text('Please confirm your new password');
					}else if (b === '' && c === ''){
						$('.edit_pass1').text('Please fill out the fields');
					}else if (b !== c){
						$('.edit_pass1').text('Passwords do not match');
					}else{
						$.ajax({
							type: 'POST',
							url: 'edit_pass.php',
							data: {
								session_id: sess_id,
								password: b
							}
						})
						.done(function(data){
							$('form[name="change_p"] input[type="password"]').val('');
							if (data == 1){
								$('.edit_pass1').text('Password successfully updated');
							}else{
								$('.edit_pass1').text('An error occured. Try again');
							}

							setTimeout(function(){
								location.reload();
							}, 1000 * 3);
						});	
					}
				}
			});
		});
	</script>
	<!-- Datatables -->
	<script>
		$(document).ready(function() {
			var handleDataTableButtons = function() {
				if ($("#datatable-buttons").length) {
					$("#datatable-buttons").DataTable({
						dom: "Bfrtip",
						buttons: [
						{
							extend: "copy",
							className: "btn-sm"
						},
						{
							extend: "csv",
							className: "btn-sm"
						},
						{
							extend: "excel",
							className: "btn-sm"
						},
						{
							extend: "pdf",
							className: "btn-sm"
						},
						{
							extend: "print",
							className: "btn-sm"
						},
						],
						responsive: true
					});
				}
			};

			TableManageButtons = function() {
				"use strict";
				return {
					init: function() {
						handleDataTableButtons();
					}
				};
			}();

			$('#datatable').dataTable();

			$('#datatable-keytable').DataTable({
				keys: true
			});

			$('#datatable-responsive').DataTable();

			$('#datatable-scroller').DataTable({
				ajax: "js/datatables/json/scroller-demo.json",
				deferRender: true,
				scrollY: 380,
				scrollCollapse: true,
				scroller: true
			});

			$('#datatable-fixed-header').DataTable({
				fixedHeader: true
			});

			var $datatable = $('#datatable-checkbox');

			$datatable.dataTable({
				'order': [[ 1, 'asc' ]],
				'columnDefs': [
				{ orderable: false, targets: [0] }
				]
			});
			$datatable.on('draw.dt', function() {
				$('input').iCheck({
					checkboxClass: 'icheckbox_flat-green'
				});
			});

			TableManageButtons.init();
		});
	</script>
	<script>
		function myFunction() {
			window.print();
		}
	</script>
	<!-- /Datatables -->
</body>
</html>
