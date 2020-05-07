<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Add Graduand</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<form action="admin1.php" method="POST">
						<div class="Id">
							<label>	Graduand Id*</label>
							<input type="" class="form-control" name= "graduandId" placeholder="Graduand Id" required>
						</div>
						<div class="firstname">
							<label>	First Name*</label>
							<input class="form-control" name= "firstname" placeholder="First Name" required>
						</div>
						<div class="middlename">
							<label>Middle Name</label>
							<input class="form-control" name= "middlename" placeholder="Middle Name" >
						</div>
						<div class="lastname">
							<label>Last Name*</label>
							<input class="form-control" name= "lastname" placeholder="Last Name" required>
						</div>
						<div class="contactnumber">
							<label>Contact Number</label>
							<input type="number" class="form-control" name= "contactnumber" placeholder="Contact Number">
						</div>
						<div class="email">
							<label>Email</label>
							<input class="form-control" name= "email" placeholder="Email">
						</div>
						<br>
						<div class="col-md-3">
							<label>Department</label>
							<select name="department" class="form-control">
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
								<option>Njoro</option>
								<option>Nairobi</option>
								<option>Nakuru Town</option>
								<option>Baringo</option>
							</select>
						</div>
						<div class="col-md-3">
							<label>Course Program</label>
							<select name="course" class="form-control">
								<option>BED</option>
								<option>BSC</option>
								<option>BA</option>
								<option>BAG</option>
								<option>BE</option>
								<option>BS Medicine</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
						<button type="submit" name="add" class="btn btn-primary">Save</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>