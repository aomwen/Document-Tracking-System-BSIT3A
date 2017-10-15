
<div class="col-sm-9">
	<div class="panel panel-default">
		<div class="panel-heading text-center"><a href="<?php echo base_url('AdminOffices/manageColleges')?>" class="btn btn-link pull-left" style="text-decoration: none; color: black;">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbspBack </a>Add College</div>
		<div class="panel-body">
		<?php echo form_open_multipart('AdminOffices/addColleges');?>
		<div class="col-sm-8" style="margin: auto;">
			<div class="form-group">
			<label>College Acronym:</label>
			<input type="text" name="collegeId" placeholder="COS" class="form-control" />
			</div>
			<div class="form-group">
			<label>College Name:</label>
			<input type="text" name="collegefull" placeholder="College of Science" class="form-control" />
			</div>
			<div class="form-group">
			<label>College Description:</label>
			<input type="text" name="collegeDesc" class="form-control" />
			</div>
			<div class="form-group">
			<label>College Dean:</label>
			<input type="text" name="collegeDean" placeholder="Mwen" class="form-control" />
			</div>
			<div class="form-group">
			<label>College Logo </label>
			<input type="file" name="collegeLogo" />
			</div>
			<input type="submit" value="Add" class="btn btn-info" />
			<input type="reset" value="reset" class="btn btn-info" />
		</div>

  </div> 
</div>
</div>
	</body>
</html>