<?php
include('../session_staff.php');
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
	<!-- Switchery -->
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
	<!-- icon -->
	<link rel="icon" href="../images/Eu-logo.jpg" >
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
							<img src="images/img.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php echo $name_staff; ?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<?php include ('sidebar_staff.php'); ?>
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
									<img src="images/img.jpg" alt=""><?php echo $name_staff; ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<!-- 	<li><a href="javascript:;"> Profile</a></li> -->
						<!-- 	<li>
								<a href="javascript:;">
									<span class="badge bg-red pull-right">50%</span>
									<span>Settings</span>
								</a>
							</li> -->
							<!-- <li><a href="javascript:;">Help</a></li> -->
							<li><a href="../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
						</ul>
					</li>

					<!-- <li role="presentation" class="dropdown">
						<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-envelope-o"></i>
							<span class="badge bg-green">6</span>
						</a>
						<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
							<li>
								<a>
									<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
								</a>
							</li>
							<li>
								<a>
									<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
								</a>
							</li>
							<li>
								<a>
									<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
								</a>
							</li>
							<li>
								<a>
									<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
								</a>
							</li>
							<li>
								<div class="text-center">
									<a>
										<strong>See All Alerts</strong>
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</li>
						</ul>
					</li> -->
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
					<h3><?php echo $name_staff; ?></h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>List of Graduands</h2>
						<div class="clearfix"></div>
					</div>

					<div class="x_content">
						<table id="datatable-buttons" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="hidden">ID</th>
									<th>Id no.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact No.</th>
									<th>Department</th>
									<th>Graduand Status</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>


							<tbody>
								<?php
								$staff_id = $_SESSION['id']; 
								if ($staff_id == 10) { ?>
								<?php
								$sql = "SELECT * FROM graduands NATURAL JOIN clearance WHERE course_program = 'BED'";
								$query = $conn->prepare($sql);
								$query->execute();
								$fetch = $query->fetchAll();

								foreach ($fetch as $key => $value) { ?>
								<tr>
									<td class="hidden"><?php echo $value['id'] ?></td>
									<td><?php echo $value['graduand_id'];?></td>
									<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
									<td><?php echo $value['Email'] ?></td>
									<td><?php echo $value['Contact_num']?></td>
									<td><?php echo $value['Department']?></td>
									<div class = "form-group">
										<td class = "center" style = "text-align:center; width: 15%;">
											<form action="../update_graduandstatus.php" method="post">
												<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
												<?php 
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												?>
											</form>
										</td>
										<td>
											<form action="staff_view_status.php" method="post">
												<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
													<?php
													$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
													?>
													>
													<i class = "fa fa-envelope-o"></i>	
												</button>
												<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
												<button type="submit" class="btn btn-primary" <?php
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
												?>><i class = "fa fa-eye"></i>
												<span class="badge bg-green">
													<?php
													$a = $value['id'];
													$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
													$query = $conn->query($sql);
													$count = $query->rowCount();
													echo $count;
													?>
												</span>
											</button>
										</form>
										<?php include '../modal_sentmessage.php'; ?>
									</td>
								</div>
							</tr>														
							<?php } ?>
							<?php }
							elseif ($staff_id == 17) { ?>
							<?php
							$sql = "SELECT * FROM graduand NATURAL JOIN clearance WHERE course_program = 'BSC'";
							$query = $conn->prepare($sql);
							$query->execute();
							$fetch = $query->fetchAll();

							foreach ($fetch as $key => $value) { ?>
							<tr>
								<td class="hidden"><?php echo $value['id'] ?></td>
								<td><?php echo $value['graduand_id'];?></td>
								<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
								<td><?php echo $value['Email'] ?></td>
								<td><?php echo $value['Contact_num']?></td>
								<td><?php echo $value['Department']?></td>
								<div class = "form-group">
									<td class = "center" style = "text-align:center; width: 15%;">
										<form action="../update_graduandstatus.php" method="post">
											<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
											<?php 
											$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
											?>
										</form>
									</td>
									<td>
										<form action="staff_view_status.php" method="post">
											<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
												<?php
												$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
												?>
												>
												<i class = "fa fa-envelope-o"></i>	
											</button>
											<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
											<button type="submit" class="btn btn-primary" <?php
											$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
											?>><i class = "fa fa-eye"></i>
											<span class="badge bg-green">
												<?php
												$a = $value['id'];
												$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
												$query = $conn->query($sql);
												$count = $query->rowCount();
												echo $count;
												?>
											</span>
										</button>
									</form>
									<?php include '../modal_sentmessage.php'; ?>
								</td>
							</div>
						</tr>														
						<?php } ?>
						<?php }

						elseif ($staff_id == 18) { ?>
						<?php
						$sql = "SELECT * FROM graduand NATURAL JOIN clearance WHERE course_program = 'BA'";
						$query = $conn->prepare($sql);
						$query->execute();
						$fetch = $query->fetchAll();

						foreach ($fetch as $key => $value) { ?>
								<tr>
									<td class="hidden"><?php echo $value['id'] ?></td>
									<td><?php echo $value['graduand_id'];?></td>
									<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
									<td><?php echo $value['Email'] ?></td>
									<td><?php echo $value['Contact_num']?></td>
									<td><?php echo $value['Department']?></td>
									<div class = "form-group">
										<td class = "center" style = "text-align:center; width: 15%;">
											<form action="../update_graduandstatus.php" method="post">
												<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
												<?php 
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												?>
											</form>
										</td>
										<td>
											<form action="staff_view_status.php" method="post">
												<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
													<?php
													$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
													?>
													>
													<i class = "fa fa-envelope-o"></i>	
												</button>
												<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
												<button type="submit" class="btn btn-primary" <?php
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
												?>><i class = "fa fa-eye"></i>
												<span class="badge bg-green">
													<?php
													$a = $value['id'];
													$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
													$query = $conn->query($sql);
													$count = $query->rowCount();
													echo $count;
											?>
										</span>
									</button>
								</form>
								<?php include '../modal_sentmessage.php'; ?>
							</td>
						</div>
					</tr>														
					<?php } ?>
					<?php } 
					elseif ($staff_id == 20) { ?>
					<?php
					$sql = "SELECT * FROM graduand NATURAL JOIN clearance WHERE course_program = 'BSIS'";
					$query = $conn->prepare($sql);
					$query->execute();
					$fetch = $query->fetchAll();

					foreach ($fetch as $key => $value) { ?>
								<tr>
									<td class="hidden"><?php echo $value['id'] ?></td>
									<td><?php echo $value['graduand_id'];?></td>
									<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
									<td><?php echo $value['Email'] ?></td>
									<td><?php echo $value['Contact_num']?></td>
									<td><?php echo $value['Department']?></td>
									<div class = "form-group">
										<td class = "center" style = "text-align:center; width: 15%;">
											<form action="../update_graduandstatus.php" method="post">
												<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
												<?php 
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												?>
											</form>
										</td>
										<td>
											<form action="staff_view_status.php" method="post">
												<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
													<?php
													$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
													?>
													>
													<i class = "fa fa-envelope-o"></i>	
												</button>
												<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
												<button type="submit" class="btn btn-primary" <?php
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
												?>><i class = "fa fa-eye"></i>
												<span class="badge bg-green">
													<?php
													$a = $value['id'];
													$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
													$query = $conn->query($sql);
													$count = $query->rowCount();
													echo $count;
										?>
									</span>
								</button>
							</form>
							<?php include '../modal_sentmessage.php'; ?>
						</td>
					</div>
				</tr>														
				<?php } ?>
				<?php } 
				elseif ($staff_id == 21) { ?>
				<?php
				$sql = "SELECT * FROM graduand NATURAL JOIN clearance WHERE course_program = 'BAG'";
				$query = $conn->prepare($sql);
				$query->execute();
				$fetch = $query->fetchAll();

				foreach ($fetch as $key => $value) { ?>
								<tr>
									<td class="hidden"><?php echo $value['id'] ?></td>
									<td><?php echo $value['graduand_id'];?></td>
									<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
									<td><?php echo $value['Email'] ?></td>
									<td><?php echo $value['Contact_num']?></td>
									<td><?php echo $value['Department']?></td>
									<div class = "form-group">
										<td class = "center" style = "text-align:center; width: 15%;">
											<form action="../update_graduandstatus.php" method="post">
												<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
												<?php 
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												?>
											</form>
										</td>
										<td>
											<form action="staff_view_status.php" method="post">
												<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
													<?php
													$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
													?>
													>
													<i class = "fa fa-envelope-o"></i>	
												</button>
												<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
												<button type="submit" class="btn btn-primary" <?php
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
												?>><i class = "fa fa-eye"></i>
												<span class="badge bg-green">
													<?php
													$a = $value['id'];
													$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
													$query = $conn->query($sql);
													$count = $query->rowCount();
													echo $count;
									?>
								</span>
							</button>
						</form>
						<?php include '../modal_sentmessage.php'; ?>
					</td>
				</div>
			</tr>														
			<?php } ?>
			<?php } 
			elseif ($staff_id == 22) { ?>
			<?php
			$sql = "SELECT * FROM graduand NATURAL JOIN clearance WHERE course_program = 'BE'";
			$query = $conn->prepare($sql);
			$query->execute();
			$fetch = $query->fetchAll();

			foreach ($fetch as $key => $value) { ?>
								<tr>
									<td class="hidden"><?php echo $value['id'] ?></td>
									<td><?php echo $value['graduand_id'];?></td>
									<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
									<td><?php echo $value['Email'] ?></td>
									<td><?php echo $value['Contact_num']?></td>
									<td><?php echo $value['Department']?></td>
									<div class = "form-group">
										<td class = "center" style = "text-align:center; width: 15%;">
											<form action="../update_graduandstatus.php" method="post">
												<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
												<?php 
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												?>
											</form>
										</td>
										<td>
											<form action="staff_view_status.php" method="post">
												<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
													<?php
													$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
													?>
													>
													<i class = "fa fa-envelope-o"></i>	
												</button>
												<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
												<button type="submit" class="btn btn-primary" <?php
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
												?>><i class = "fa fa-eye"></i>
												<span class="badge bg-green">
													<?php
													$a = $value['id'];
													$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
													$query = $conn->query($sql);
													$count = $query->rowCount();
													echo $count;
								?>
							</span>
						</button>
					</form>
					<?php include '../modal_sentmessage.php'; ?>
				</td>
			</div>
		</tr>														
		<?php } ?>
		<?php }
		elseif ($staff_id == 23) { ?>
		<?php
		$sql = "SELECT * FROM graduand NATURAL JOIN clearance WHERE course_program = 'BMED'";
		$query = $conn->prepare($sql);
		$query->execute();
		$fetch = $query->fetchAll();

		foreach ($fetch as $key => $value) { ?>
								<tr>
									<td class="hidden"><?php echo $value['id'] ?></td>
									<td><?php echo $value['graduand_id'];?></td>
									<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
									<td><?php echo $value['Email'] ?></td>
									<td><?php echo $value['Contact_num']?></td>
									<td><?php echo $value['Department']?></td>
									<div class = "form-group">
										<td class = "center" style = "text-align:center; width: 15%;">
											<form action="../update_graduandstatus.php" method="post">
												<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
												<?php 
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												?>
											</form>
										</td>
										<td>
											<form action="staff_view_status.php" method="post">
												<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
													<?php
													$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
													?>
													>
													<i class = "fa fa-envelope-o"></i>	
												</button>
												<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
												<button type="submit" class="btn btn-primary" <?php
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
												?>><i class = "fa fa-eye"></i>
												<span class="badge bg-green">
													<?php
													$a = $value['id'];
													$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
													$query = $conn->query($sql);
													$count = $query->rowCount();
													echo $count;
							?>
						</span>
					</button>
				</form>
				<?php include '../modal_sentmessage.php'; ?>
			</td>
		</div>
	</tr>														
	<?php } ?>
	<?php }
else { ?>
<?php
$sql = "SELECT * FROM graduand NATURAL JOIN clearance ";
$query = $conn->prepare($sql);
$query->execute();
$fetch = $query->fetchAll();

foreach ($fetch as $key => $value) { ?>
								<tr>
									<td class="hidden"><?php echo $value['id'] ?></td>
									<td><?php echo $value['graduand_id'];?></td>
									<td><?php echo $value['graduand_Fname'], '&nbsp;', $value['graduand_Mname'], '&nbsp;', $value['graduand_Lname']?></td>
									<td><?php echo $value['Email'] ?></td>
									<td><?php echo $value['Contact_num']?></td>
									<td><?php echo $value['Department']?></td>
									<div class = "form-group">
										<td class = "center" style = "text-align:center; width: 15%;">
											<form action="../update_graduandstatus.php" method="post">
												<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" >
												<?php 
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> &nbsp;Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo'
														<div class="form-group">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="">
																	<label>
																		<input type="submit" class="hidden" />
																		<input type="checkbox" class="js-switch" /> Unapproved
																	</label>
																</div>
															</div>
														</div>';
													}else{
														echo '<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked disabled/> Approved
																</label>
															</div>
														</div>
													</div>';}
												}
												?>
											</form>
										</td>
										<td>
											<form action="staff_view_status.php" method="post">
												<button type="button" href = "#edit<?php echo $value ['id']?>" data-toggle="modal" class = "btn btn-success btn-s" 
													<?php
													$user_id = $_SESSION['id'];
													if($user_id == 1){
														if ($value['is_faculty_approval'] == 0){
															echo'';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 2) {
														if ($value['is_library_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 3) {
														if ($value['is_halls_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 4) {
														if ($value['is_catering_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 5) {
														if ($value['is_security_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 6) {
														if ($value['is_games_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 7) {
														if ($value['is_medical_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 8) {
														if ($value['is_dean_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													elseif ($user_id == 9) {
														if ($value['is_finance_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													}
													else{
														if ($value['is_vp_admin_approval'] == 0){
															echo 'Unapproved';
														}else{
															echo 'disabled';
														}
													} 
													?>
													>
													<i class = "fa fa-envelope-o"></i>	
												</button>
												<input type="hidden" name="haydi" value="<?php echo $value ['id']?>">
												<button type="submit" class="btn btn-primary" <?php
												$user_id = $_SESSION['id'];
												if($user_id == 1){
													if ($value['is_faculty_approval'] == 0){
														echo'';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 2) {
													if ($value['is_library_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 3) {
													if ($value['is_halls_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 4) {
													if ($value['is_catering_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 5) {
													if ($value['is_security_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 6) {
													if ($value['is_games_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 7) {
													if ($value['is_medical_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 8) {
													if ($value['is_dean_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												elseif ($user_id == 9) {
													if ($value['is_finance_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												}
												else{
													if ($value['is_vp_admin_approval'] == 0){
														echo 'Unapproved';
													}else{
														echo 'disabled';
													}
												} 
												?>><i class = "fa fa-eye"></i>
												<span class="badge bg-green">
													<?php
													$a = $value['id'];
													$sql = "SELECT * FROM requirementstatus WHERE id = $a AND status = 0 AND staff_id = $user_id";
													$query = $conn->query($sql);
													$count = $query->rowCount();
													echo $count;
					?>
				</span>
			</button>
		</form>
		<?php include '../modal_sentmessage.php'; ?>
	</td>
</div>
</tr>														
<?php } ?>
<?php }


?>

</tbody>
</table>
</div><!-- /x content -->
</div><!-- /x panel -->
</div>
</div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
	<div class="pull-right">
		by: John team
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
<!-- Switchery -->
<script src="../vendors/switchery/dist/switchery.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
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
<!--/ Datatables -->

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

<?php


if (isset($_POST['save']))
{
	$message= $_POST['message'];
	$designee_id = $_SESSION['id'];

	$sql = "INSERT INTO requirement(req_content,id,staff_id) VALUES(?,?)";
	$query = $conn->prepare($sql);
	$query->execute(array($message,$id));
	$count = $query->rowCount();

	if ($count > 0){
		echo "<script type='text/javascript'>alert('Complete making alert');</script>";
		echo "<script>document.location='staff_addrequirements.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('Error creating alert!');</script>";
	}
}

?>
</body>
</html>