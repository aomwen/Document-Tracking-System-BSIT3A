<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
	<?php
	foreach($colleges as $cl){
	echo'
		<div class="panel-heading text-center"> 
		<a href="'.base_url('AdminOffices/officeContent/'.$cl['collegeId'].'').'" class="btn btn-link pull-left" style="text-decoration: none; color: black;" >
		';
	}?>
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbspBack </a>Add Department</div>
		<div class="panel-body">
			
		<form class="formstyle" method="post" id="department_form">
		<div class="col-sm-8" style="margin: auto;">
			<div class="form-group">
			<?php
				echo '<label>ID No:</label>
			<input type="text" name="deptId" value="'.$idno.'" class="form-control" readonly />';?>
			</div>
			<div class="form-group">
			<label>Department:</label>
			<input type="text" name="department" placeholder="i.e. Math Department" class="form-control" id="department"/>
			</div>
			<div class="pull-right">
			<input type="submit" value="Add" class="btn btn-primary" />
			<input type="reset" value="Reset" class="btn btn-primary" />
			</div>
		</div>

<script>
 $('#department_form').on('submit',function(e){
    e.preventDefault();
    if($('#department').val() != ''){
    	
          $.ajax({
          url:"<?php echo base_url(); ?>AdminOffices/addDepartment/<?php foreach($colleges as $cl){echo $cl['collegeId']; }?>", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		  alert("Successfully added the department.");
          }

        });
        
      
  }else{
        alert("Please Fill in the department name field.");
  }
  });

</script>
