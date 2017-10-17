<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php 
		foreach($collegefull as $cl){
			echo'
			<a href="'.base_url('AdminOffices/manageColleges').'" class="btn btn-link pull-left" style="text-decoration: none; color: black;">
			<span class="glyphicon glyphicon-circle-arrow-left">
		</span>&nbsp </a>
		'.$cl['collegefull'].'<a href="'.base_url('AdminOffices/addDepartment/'.$cl['collegeId'].'').'" class="btn btn-link pull-right" style="text-decoration: none; color: black;">
			<span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd Department </a>
			';
		}?>
		</div>
		<div class="panel-body">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<?php
					foreach($departments as $d){
						$dept= str_replace(' ','-',$d['department']);
						echo'
						<div class="panel-heading">
							<h4 class="panel-title">
									<a class="text-center">'.$d['department'].'</a>
									<a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#'.$dept.'"> <span class="glyphicon glyphicon-edit"></span> </a>';?>
									<a class="pull-right" href="#" onClick="deleteDepartment('<?php echo $d['department'];?>','<?php echo $d['deptId'];?>')"> <span class="glyphicon glyphicon-remove-sign" style="color: black"></span> </a>
					<?php echo '</h4>
						</div>
						<div class="panel-collapse collapse" id="'.$dept.'">
							<div class="panel-body">
								<form method="POST" id="editDept_form">
								<label>Department ID:</label>
								<input type="text" name="deptId" class="form-control" value="'.$d['deptId'].'" readonly/>

								<label>College:</label>
								<input type="text" name="collegeId" class="form-control" value="'.$d['collegeId'].'" readonly/>
								<label>Department:</label>
								<input type="text" name="department" class="form-control" value="'.$d['department'].'" id="departmentedit" />
								<input type="submit" value="Save" class="btn btn-primary pull-right" />
								</form>
							</div>
						</div>'
						;
					}
					?>
				</div>
			</div>
		</div>	

	</div>
<script type="text/javascript">
      function deleteDepartment(dept,id){
       // console.log(id);
        var ans = confirm("Are you sure to delete this department?");
       // alert(id);
        if(ans==true){
          //redirect to delete method
          var url="<?php echo base_url('AdminOffices/removeDepartment/');?>"+dept+"/"+id;
          location.href = url;
          alert("The department has been successfully deleted!");
        }
      }
 </script>

 <script>
 $('#editDept_form').on('submit',function(e){
    e.preventDefault();
    if($('#departmentedit').val() != ''){
    	
          $.ajax({
          url:"<?php echo base_url(); ?>AdminOffices/UpdateDepartment", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		  alert("Successfully updated the file.");
          }

        });
        
      
  }else{
        alert("Please Fill in the department field.");
  }
  });

</script>

