<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
	<?php
	foreach($collegefull as $cl){
	echo'
		<div class="panel-heading text-center"> 
		<a href="'.base_url('AdminOffices/office_content/'.$cl['college_acronym'].'').'" class="btn btn-link pull-left" style="text-decoration: none; color: black;" >
		';
	}?>
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbspBack </a>Add Department</div>
		<div class="panel-body">
		<?php 
		foreach($collegefull as $cl){
			
		echo form_open_multipart('AdminOffices/add_department/'.$cl['college_acronym'].'');}
		?>
		<div class="col-sm-8" style="margin: auto;">
			<div class="form-group">
			<?php
				echo '<label>ID No:</label>
			<input type="text" name="dept_idno" value="'.$idno.'" class="form-control" readonly />';?>
			</div>
			<div class="form-group">
			<label>Department:</label>
			<input type="text" name="department" placeholder="i.e. Math Department" class="form-control" />
			</div>
			<input type="submit" value="Add" class="btn btn-info" />
			<input type="reset" value="reset" class="btn btn-info" />
		</div>
	</body>
</html>