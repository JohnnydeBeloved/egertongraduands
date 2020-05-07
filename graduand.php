<?php
include('../session.php');
include('../connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Egerton University Graduands </title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- jQuery custom content scroller -->
	<link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

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
							<img src="../requirements/<?php echo "$pic";?>" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php echo $name; ?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<?php include('sidebar.php'); ?>
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
									<img src="../requirements/<?php echo "$pic";?>" alt=""><?php echo $name; ?>
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
										<li><a href="javascript:;" data-toggle="modal" data-target="#change_password">Change Password</a></li>
										<li><a href="../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
									</ul>
								</li>
								<li role="presentation" class="dropdown">
									<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
										<i class="fa fa-envelope-o"></i>
										<span class="badge bg-green">
											<?php
											$userid = $_SESSION['id'];
											$sql = "SELECT * FROM message WHERE id = $userid AND message_status = 0 ";
											$query = $conn->query($sql);
											$count = $query->rowCount();
											echo $count;
											?>
										</span>
									</a>
									<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
										<li><h5>Message</h5></li><hr>
										<?php
										$userid = $_SESSION['id'];
										$sql = "SELECT * FROM message LEFT JOIN staff ON staff.staff_id = message.staff_id 
										WHERE id = $userid ";
										$query = $conn->prepare($sql);
										$query->execute();
										$count = $query->rowCount();
										$fetch = $query->fetchAll();

										foreach ($fetch as $key => $value) { ?>
										<li>
											<a href = "#message<?php echo $value['message_id'] ?>" data-toggle="modal">
												<span class="image"><img src="images/paul-pogba.jpg" alt="Profile Image" /></span>
												<span>
													<span><?php echo $value['staff_name']; ?></span>
												</span>
												<span class="message">
													<?php echo $value['message_content']; ?>
													<span class="pull-right">
														<?php 
														if($value['message_status'] == 1){
															echo '<i class="fa fa-check-circle-o"></i>';
														}
														else{
															echo '<i class="fa fa-envelope"></i>';
														}
														?>
													</span>
												</span>
											</a>
										</li>

										<?php } ?>
									</ul>
								</li>
							</ul>
						</nav>
						<?php include '../message_modal.php';?>
					</div>
				</div>
				<!-- /top navigation -->

				<?php 
				$sql = "SELECT * FROM deadline ORDER BY id DESC LIMIT 1";
				$query = $conn->prepare($sql);
				$query->execute();
				$fetch = $query->fetch();

				$the_date = date('F d, Y', strtotime($fetch['d_date']));
				?>

				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Graduand </h3>
							</div>
						</div>
						<div class="clearfix"> <small class="pull-right">
							<?php 
							if ($fetch['status'] == 1){
								?>
								Deadline of submission of clearance is on <?php echo $the_date; ?>
								<?php 
							}
							?>
						</small></div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Graduand Clearance</h2>
									<div class="clearfix"></div>
								</div>

								<div class="x_content">
									<div class="row">
										<div class="col-md-12">
											<center>
												Republic of Kenya<br />
												<strong>Egerton University</strong><br />
												Njoro, Nakuru
												<br />
												<br />
												<strong>GRADUANDS CLEARANCE</strong>
												<br />
												<small>(Purpose: Graduation, Gown assigning)</small>
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
													<strong>The Dean of Students</strong><br />
													Egerton University <br />
													Njoro, Nakuru<br /><br />
													<u><?php echo $name; ?></u>:<br />
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<p>
														I confirm that I have been cleared of all the following offices and departments, and that I can proceed to graduate :
													</p>
													<table class="table table-bordered">
														<thead>
															<tr>
																<td>Forms/Reports</td>
																<td>Date Submitted</td>
																<td>Forms/Reports</td>
																<td>Date Submitted</td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td><strong>Faculty:</strong>Form 1</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td><strong>Faculty Clearance:</strong></td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>Main Library</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td><strong>Form 2A</strong></td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>FASS Library</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td><strong>Form 2B</strong></td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td><strong>Halls Department:</strong> Hostels</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td>Form 3</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>Catering Department</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td>Form 4</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>Security Department</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td>Form 5</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>Games Department</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td>Form 6</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>Medical Department</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td>Form 7</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>Dean of Students</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td>Form 8</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
															<tr>
																<td>Finance Office</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
																<td>Form 9</td>
																<td><input type="text" name="vocational_year_graduated" data-inputmask="'mask': '99/99/9999'" class="form-control"></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<?php
												$userid = $_SESSION['id'];
												$sql = "SELECT * FROM clearance WHERE id = $userid ";
												$query = $conn->prepare($sql);
												$query->execute();
												$fetch = $query->fetchAll();

												foreach ($fetch as $key => $value) { ?>
												<form action="../update_clearance_until.php" method="post">
													<center>
														<label>Until
															<input type="text" class="col-md-1 pull-right" name="until" data-inputmask="'mask': '99/99/9999'" style="width: 70%;
															border-top: none; border-left: none; border-right:none; border-bottom: 1px solid; margin-right: 1px;" value="<?php echo $value['until']; ?>">
														</label>
														<label>, my e-mail address is:
															<input type="text" class="col-md-1 pull-right" name="mailing_address" style="width: 51%;border-top: none;border-left: none;border-right: none;border-bottom: 1px solid;" value="<?php echo $value['mailing_address']; ?>">
														</label>
														<button type="submit" class="btn btn-primary btn-xs">Save</button>
													</center>
												</form>
											</div>
											<div class="col-md-3 pull-right">
												<div class="pull-right">
													<p>Very truly yours,</p>
													<u><?php echo $name; ?></u><br />
													<b>(Print name before signing)</b>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<center><h2>Certification</h2>
														<p>WE HEREBY CERTIFY THAT <?php echo $name; ?> is cleared of all University finances, property and other accountabilities as of the date indicated.</p>
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
																<small>Chief Hall Officer</small>
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
																<small>Chief Security Officer</small>
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
																<small>chief medical Officer</small>
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
													<div class="col-md-4">
														<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
													</div>
													
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
															<small>Admission Officer</small>
														</p>
													</center>

												</div> 

												<?php include '../modal_staff.php'; ?>
												<?php include 'change_pass_modal.php';?>
												<?php } ?>
											</div>
										</div>
									</div>
								</div><!-- /x content -->
							</div><!-- /x panel -->
						</div>
					</div>
				</div>
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
						by: John
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
		<!-- jQuery custom content scroller -->
		<script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
		<!-- jquery.inputmask -->
		<script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
		<!-- Custom Theme Scripts -->
		<script src="../build/js/custom.min.js"></script>
		<script src="../build/js/md5.js"></script>
		<script>
			$(document).ready(function() {
				$(":input").inputmask();
			});
		</script>
		<!-- jquery.inputmask -->
		<script>
			$(document).ready(function() {
				$(":input").inputmask();

				var sess_id = '<?php echo $userid; ?>';

				$.ajax({
					type: 'POST',
					url: 'get_c.php?sess_id='+sess_id
				})
				.done(function(data){
						// console.log(data);
						var rw = JSON.parse(data);
						var a = rw.cn;
						var b = rw.cbd;

						var arr = a.split('///');
						var arr1 = b.split('///');

						var c = arr.length;
						var msk = "'mask': '99/99/9999'";

						if (c === 0){
							var dv = '<tr class="first">'+
							'<td><input type="text" name="child_name[]" class="form-control"  value=""></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td>'+
							'<button name="custom_add_child" class="btn btn-primary add_second">Add</button></td>'+
							'</tr>';
							$('.noc').html(dv);
						}
						if (c === 1){
							var dv = '<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[0]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[0]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td>'+
							'<button name="custom_add_child" class="btn btn-primary add2">Add</button></td>'+
							'</tr>';
							$('.noc').html(dv);
						}
						if (c === 2){
							var dv = '<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[0]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[0]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[1]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[1]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td>'+
							'<button name="custom_rm_child" id="" class="btn btn-danger rm1">custom_rm_child</button>'+
							'</td>'+
							'<td>'+
							'<button name="custom_add_child" class="btn btn-primary">Add</button></td>'+
							'</tr>';
							$('.noc').html(dv);
						}
						if (c === 3){
							var dv = '<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[0]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[0]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[1]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[1]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[2]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[2]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td>'+
							'<button name="custom_rm_child" id="" class="btn btn-danger rm2">Remove</button>'+
							'</td>'+
							'<td>'+
							'<button name="custom_add_child" class="btn btn-primary">Add</button></td>'+
							'</tr>';
							$('.noc').html(dv);
						}
						if (c === 4){
							var dv = '<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[0]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[0]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[1]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[1]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[2]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[2]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[3]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[3]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td>'+
							'<button name="custom_rm_child" id="" class="btn btn-danger rm3">Remove</button>'+
							'</td>'+
							'<td>'+
							'<button name="custom_add_child" class="btn btn-primary add5">Add</button></td>'+
							'</tr>';
							$('.noc').html(dv);
						}
						if (c === 5){
							var dv = '<tr id="one">'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[0]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[0]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<tr id="two">'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[1]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[1]+'">'+
							'</td>'+
							'</tr>'+
							'<tr id="three">'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[2]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[2]+'">'+
							'</td>'+
							'</tr>'+
							'<tr id="four">'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[3]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[3]+'">'+
							'</td>'+
							'</tr>'+
							'<tr id="five">'+
							'<td><input type="text" name="child_name[]" class="form-control"  value="'+arr[4]+'"></td>'+
							'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="'+arr1[4]+'">'+
							'</td>'+
							'</tr>'+
							'<tr>'+
							'<td>'+
							'<button name="custom_rm_child" id="" class="btn btn-danger rm4">Remove</button>'+
							'</td>'+
							'<td>'+
							'<button style="display: none" name="custom_add_child" class="btn btn-primary add5">Add</button>'+
							'</td>'+
							'</tr>';
							$('.noc').html(dv);
						}


							// $('.rm4').on('click', function(e){
							// 	e.preventDefault();
							// 	$('[name="custom_rm_child"]').removeClass('rm4').addClass('rm3');
							// 	$('.add5').fadeIn('slow');
							// 	$('#five').fadeOut('slow');


							// 	$('.rm3').on('click', function(e){
							// 		e.preventDefault();
							// 		$('[name="custom_rm_child"]').removeClass('rm3').addClass('rm2');
							// 		$('[name="custom_add_child"]').removeClass('add5').addClass('add4');
							// 		$('#four').fadeOut('slow');
							// 	});

							// });
							// $('.add5').on('click', function(e){
							// 	e.preventDefault();
							// 	$('[name="custom_rm_child"]').removeClass('rm3').addClass('rm4');
							// 	$('#five').fadeIn('slow');
							// 	$(this).fadeOut('slow');
							// });

							$('.add_second').on('click', function(){
								$('.first').append('<tr class="first">'+
									'<td><input type="text" name="child_name[]" class="form-control"  value=""></td>'+
									'<td><input type="text" name="child_birthday[]" data-inputmask="'+msk+'" class="form-control"  value="">'+
									'</td>'+
									'</tr>'+
									'<tr>');
							});

							$('.add2').on('click', function(e){
								e.preventDefault();
							});
						});

$('form[name="change_p"]').on('submit', function(e){
	e.preventDefault();

	var sess_pass = '<?php echo $sess_pass; ?>';
	var sess_id = '<?php echo $session_id; ?>';

	var a = $('[name="old_pass"]').val();
	var b = $('[name="new_pass"]').val();
	var c = $('[name="conf_pass"]').val();

	if (md5(a) !== sess_pass){
		$('.edit_pass').text('Please enter your current password');
		$('[name="old_pass"]').val('').focus();
	}else{
		if (b === '' && c !== ''){
			$('.edit_pass').text('Please enter your new password');
		}else if (b !== '' && c === ''){
			$('.edit_pass').text('Please confirm your new password');
		}else if (b === '' && c === ''){
			$('.edit_pass').text('Please fill out the fields');
		}else if (b !== c){
			$('.edit_pass').text('Passwords do not match');
		}else{
			$.ajax({
				type: 'POST',
				url: 'edit_p.php',
				data: {
					session_id: sess_id,
					password: b
				}
			})
			.done(function(data){
				$('form[name="change_p"] input[type="password"]').val('');
				if (data == 1){
					$('.edit_pass').text('Password successfully updated');
				}else{
					$('.edit_pass').text('An error occured. Try again');
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
<!-- /jquery.inputmask -->
</body>
</html>