<div class="modal fade" id="edit<?php echo $value ['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit <?php echo $value['graduand_Fname']; ?> Profile</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<form action="../edit_graduand1.php" method="POST">
						<div class="Id">
							<input value = "<?php echo $value['graduand_id'];?>" type="hidden" class="form-control" name= "graduandId" placeholder="Graduand Id" required>
							<input value = "<?php echo $value['id'];?>" type="hidden" class="form-control" name= "id" placeholder="Graduand Id" required>
						</div>
						<div class="firstname">
							<label>	First Name*</label>
							<input value = "<?php echo $value['graduand_Fname'];?>" class="form-control" name= "firstname" placeholder="First Name" required>
						</div>
						<div class="middlename">
							<label>Middle Name</label>
							<input value = "<?php echo $value['graduand_Mname'];?>" class="form-control" name= "middlename" placeholder="Middle Name" >
						</div>
						<div class="lastname">
							<label>Last Name*</label>
							<input value = "<?php echo $value['graduand_Lname'];?>" class="form-control" name= "lastname" placeholder="Last Name" required>
						</div>
						<div class="contactnumber">
							<label>Contact Number</label>
							<input value = "<?php echo $value['Contact_num'];?>" type="number" class="form-control" name= "contactnumber" placeholder="Contact Number">
						</div>
						<div class="email">
							<label>Email</label>
							<input value = "<?php echo $value['Email'];?>" class="form-control" name= "email" placeholder="Email">
						</div>
						<br>
						<div class="col-md-3 department">
							<label>Department</label>
							<select name="department" class="form-control">
								<option><?php echo $value['Department'];?></option>
								<option>FEDCOS</option>
								<option>FOS</option>
								<option>FASS</option>
								<option>FOA</option>
								<option>FET</option>
								<option>FOHS</option>
							</select>
						</div>
						<div class="col-md-3">
							<label>Campus</label>
							<select name="campus" class="form-control">
								<option><?php echo $value['Campus'];?></option>
								<option>Njoro</option>
								<option>Nairobi</option>
								<option>Nakuru Town</option>
								<option>Baringo</option>
							</select>
						</div>
					</div>
					<div class="modal-footer form-group">
						<div class="row">
							<br />
							<br />
							<button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
							<button type="submit"  class="btn btn-primary ">Save</button>
							 
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>