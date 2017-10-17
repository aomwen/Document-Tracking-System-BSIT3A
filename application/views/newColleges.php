<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />
<div class="editcol col-sm-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Add College</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-signal"></span> Add College</h3>  
		</div>  
		<div class="panel-body">
			<div class="pull-right">
				<a href="<?php echo base_url('AdminOffices/manageColleges')?>" class="btn btn-link pull-left" style="text-decoration: none; color: black;">
					<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp Back 
				</a>
			</div>
		 <form role="form" method="post" id="newCollege_form" >
		<?php // echo form_open_multipart('AdminOffices/addColleges');?>
		<div class="col-sm-7" style="margin: auto;">
			<div class="form-group">
			<label>College Acronym/College ID:</label>
			<input type="text" name="collegeId" placeholder="COS" class="form-control" id="collegeId"/>
			</div>
			<div class="form-group">
			<label>College Name:</label>
			<input type="text" name="collegefull" placeholder="College of Science" class="form-control" id="collegeName"/>
			</div>
			<div class="form-group">
			<label>College Description:</label>
			<input type="text" name="collegeDesc" class="form-control" id="collegeDesc"/>
			</div>
			<div class="form-group">
			<label>College Dean:</label>
			<input type="text" name="collegeDean" placeholder="Mwen" class="form-control" id="collegeDean"/>
			</div>
			<div class="form-group">
			<label>College Logo </label>
			<input type="file" name="collegeLogo" id="collegeLogo"/>
			</div>
			<div class="pull-right">
			<input type="submit" value="Add" class="btn btn-info" />
			<input type="reset" value="reset" class="btn btn-info" />
			</div>
		</div>

  </div> 
</div>
</div>
<script>

  $('#newCollege_form').on('submit',function(e){
    e.preventDefault();
    if($('#collegeId').val() != '' && $('#collegeName').val() != '' && $('#collegeDesc').val() != '' && $('#collegeDean').val() != ''){
	    if($('#collegeLogo').val() == ''){

	      alert("Please Select a File");
	    }else{
	     var filename = $('#newprofile').val();
	      var valid_extensions = /(\.jpg|\.jpeg|\.png)$/i;   
	      if(valid_extensions.test(filename)){
	         $.ajax({
	        url:"<?php echo base_url(); ?>AdminOffices/addColleges", 
	        method:"POST",
	        data:new FormData(this),
	        contentType:false,
	        cache:false,
	        processData:false,
	        success:function(data){
	          $('#photo_profile').html(data);
	        }

	      });
	     }else{
	      alert('Invalid File! Please use .jpg .jpeg .png for the college logo');
	     }
	    }
	}else{
		    alert("All fields are required! Please Fill in");
	}
  });

</script>