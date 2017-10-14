<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="col-sm-9">
	<div class="panel panel-default">
		<div class="panel-heading text-center"><a href="<?php echo base_url('AdminOffices/manage_colleges')?>" class="btn btn-link pull-left" style="text-decoration: none; color: black;">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbspBack </a>Add Department</div>
		<div class="panel-body">
		<?php echo form_open_multipart('AdminOffices/add_colleges');?>
		<div class="col-sm-8" style="margin: auto;">
			<div class="form-group">
			<label>Department:</label>
			<input type="text" name="Department name" placeholder="i.e. Math Department" class="form-control" />
			</div>
			<input type="submit" value="Add" class="btn btn-info" />
			<input type="reset" value="reset" class="btn btn-info" />
		</div>
	</body>
</html>