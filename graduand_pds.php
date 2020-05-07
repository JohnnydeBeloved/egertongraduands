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
	<!-- CSS -->
	<link href="../production/stylesheet.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
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
												<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
						<?php include 'change_pass_modal.php';?>
					</div>
				</div>
				<!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Graduand</h3>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Graduand Personal Data Sheet (PDS)</h2>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									
								</div>
								<div class="x_content col-md-12" >
									<form action="../update_faculty_pds.php" method="post" class="form-horizontal form-label-left">
										<div class="container-fluid" style="border: 2px solid">
											<div class="col-md-4">
												Clearance Form
											</div>
											<div class="col-md-4 pds_header">
												<h2><strong>PERSONAL DATA SHEET</strong></h2>
											</div>
											<div class="col-md-5 pull-right">
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12 csc_label">1. Graduand ID No</label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="number" class="form-control csc_no" name="cs_id_no" placeholder ="(to be filled up by CSC)">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<ul class="nav nav-pills">
														<li class="active"><a data-toggle="pill" href="#personal_info">I.Personal Information</a></li>
													</ul>
												</div>
											</div>
											<br />
											<div class="tab-content">

												<!-- Personal info tab -->
												<div id="personal_info" class="tab-pane fade in active">
													<div class="row">
														<div class="col-md-12 category_header">
															<h4>I.Personal Information</h4>
														</div>
													</div>
													<div class="row">
														<?php
														$sql = "SELECT * FROM pds_personal_information WHERE id = $userid " ;
														$query = $conn->prepare($sql);
														$query->execute();
														$fetch = $query->fetchAll();

														foreach ($fetch as $key => $value) { ?>
														<div class="col-md-2">
															<div class="col-md-12 bords form-group">
																<label class="control-label" for="surname">2. Surname</label>
																<br />
																<br />
																<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;Firstname</label>
																<br />
																<br />
																<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;Middlename</label>
															</div>
														</div>

														<div class="col-md-10">
															<div class="col-md-12 form-group">
																<input type="text" name="surname" class="form-control"  value = "<?php echo $value['surname'];?>">
															</div>
															<div class="col-md-12 form-group">
																<input type="text" name="firstname" class="form-control" value = "<?php echo $value['firstname'];?>">
															</div>
															<div class="col-md-6 form-group">
																<input type="text" name="middlename" class="form-control" value = "<?php echo $value['middlename'];?>">
															</div>
															<div class="col-md-6 form-group">
																<label class="control-label col-md-7">3. Name Extension (e.g. Jr., Sr.)
																</label>
																<div class="col-md-5">
																	<input type="text" name="name_extension" class="form-control col-md-7 col-xs-12 " value = "<?php echo $value['name_extension'];?>">
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-5">
															<div class="row">
																<div class="col-md-8 form-group dob_label">
																	<label class="control-label">4. Date of Birth</label>
																</div>
																<div class="col-md-4 form-group">
																	<input type="text" name="birthday" data-inputmask="'mask': '99/99/9999'" class="form-control dob_input" value = "<?php echo $value['birthday'];?>">
																</div>
															</div>
															<div class="row">
																<div class="col-md-4 form-group dob_label">
																	<label class="control-label">5. Place of Birth</label>
																</div>
																<div class="col-md-8 form-group">
																	<input type="text" class="form-control dob_input" name="place_of_birth" value = "<?php echo $value['place_of_birth'];?>">
																</div>
															</div>
															<div class="row">
																<div class="col-md-4 form-group dob_label">
																	<label class="control-label">6. Sex</label>
																</div>
																<div class="col-md-8 btn-group bords">
																	<label>Male:</label>
																	<input type="radio" class="flat" name="sex" id="genderM" value="M" 
																	<?php 
																	if ($value['sex'] == "M"){
																		echo "checked";
																	} 
																	?>> 
																	<label>Female:</label>
																	<input type="radio" class="flat" name="sex" id="genderF" value="F" 
																	<?php 
																	if ($value['sex'] == "F"){
																		echo "checked";
																	} 
																	?> >
																</div>
															</div>
															<div class="row">
																<div class="col-md-4 form-group dob_label" style="height: 98px">
																	<label class="control-label">7. Marital Status</label>
																</div>
																<div class="col-md-8 btn-group bords">
																	<div class="col-md-4">
																		<label class="radio-inline">
																			<input type="radio" name="civil_status" value="1" 
																			<?php
																			if($value['civil_status'] == 1){
																				echo "checked";
																			}
																			?>
																			><label>Single</label>
																		</label><br />
																		<label class="radio-inline">
																			<input type="radio" name="civil_status" value="2"
																			<?php
																			if($value['civil_status'] == 2){
																				echo "checked";
																			}
																			?>
																			><label>Married</label> 
																		</label><br />
																		<label class="radio-inline">
																			<input type="radio" name="civil_status" value="3"
																			<?php
																			if($value['civil_status'] == 3){
																				echo "checked";
																			}
																			?>
																			><label>Annulled</label> 
																		</label><br />
																	</div>
																	<div class="col-md-7">
																		<label class="radio-inline">
																			<input type="radio" name="civil_status" value="4"
																			<?php
																			if($value['civil_status'] == 4){
																				echo "checked";
																			}
																			?>
																			><label>Widowed</label>
																		</label><br />
																		<label class="radio-inline">
																			<input type="radio" name="civil_status" value="5"
																			<?php
																			if($value['civil_status'] == 5){
																				echo "checked";
																			}
																			?>
																			><label>Seperated</label> 
																		</label><br />
																		<label class="radio-inline">
																			<input type="radio" name="civil_status" value="6"
																			<?php
																			if($value['civil_status'] == 6){
																				echo "checked";
																			}
																			?>
																			>
																			<label>Others, specify 
																				<input type="text" class="col-md-1 pull-right" name="other_civil_status" style="width: 40%;
																				margin-right: -39px; border-top: none; border-left: none; border-right:none; border-bottom: 1px solid;" value="<?php echo $value['other_civil_status']; ?>">
																			</label>
																		</label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4 form-group dob_label">
																	<label class="control-label">8. Citizenship</label>
																</div>
																<div class="col-md-8 form-group">
																	<input type="text" class="form-control dob_input" name="citizenship" 
																	value="<?php echo $value['citizenship']; ?>">
																</div>
															</div>
														<div class="col-md-7">
															<div class="row">
																<div class="col-md-3 form-group bords">
																	<label class="control-label">16.Residential Address</label>
																	<br />
																	<label class="control-label pull-right" style="margin-top: 10px">Zip Code</label>
																	<label class="control-label" style="margin-top: 10px">17. Telephone No.</label>
																</div>
																<div class="col-md-9 form-group">
																	<textarea class="form-control" name="residential_address"><?php echo $value['residential_address']; ?></textarea>
																	<input type="number" class="form-control" name="residential_zipcode" value="<?php echo $value['residential_zipcode']; ?>">
																	<input type="text" class="form-control" data-inputmask="'mask' : '(999) 999-9999'"  name="residential_tel_no" value="<?php echo $value['residential_tel_no']; ?>">
																</div>
															</div>
															<div class="row">
																<div class="col-md-3 form-group bords">
																	<label class="control-label">18.Permanent Address</label>
																	<br />
																	<label class="control-label pull-right" style="margin-top: 10px">Zip Code</label>
																	<label class="control-label" style="margin-top: 10px">19. Telephone No.</label>
																</div>
																<div class="col-md-9 form-group">
																	<textarea class="form-control" name="permanent_address"><?php echo $value['permanent_address']; ?></textarea>
																	<input type="number" class="form-control" name="permanent_zipcode" value="<?php echo $value['permanent_zipcode']; ?>">
																	<input type="text" class="form-control" data-inputmask="'mask' : '(999) 999-9999'"  name="permanent_tel_no" value="<?php echo $value['permanent_tel_no']; ?>">
																</div>
															</div>
															<div class="row">
																<div class="col-md-4 form-group dob_label">
																	<label class="control-label">20. Email Address <small>(if any)</small></label>
																</div>
																<div class="col-md-8 form-group">
																	<input type="email" class="form-control dob_input" name="email" value="<?php echo $value['email_address']; ?>">
																</div>
															</div>		
															<div class="row">
																<div class="col-md-4 form-group dob_label">
																	<label class="control-label">21. Cellphone No. <small>(if any)</small></label>
																</div>
																<div class="col-md-8 form-group">
																	<input type="text" class="form-control dob_input" name="cellphone_no" value="<?php echo $value['cellphone_no']; ?>">
																</div>
															</div>
																<div class="col-md-8 form-group">
															
						<button type="submit" name="add" class="btn btn-primary">Save</button>
					</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/ Personal info tab -->
												</div>
												<?php } ?>
												<div class="col-md-12">
													<div class="pull-right">Clearance Form</div>

												</div>
											</div>
										</form>
									</div>	<!-- /x content -->
								</div>	<!-- /x panel -->
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

			<!-- iCheck -->
			<script src="../vendors/iCheck/icheck.min.js"></script>
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