<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="myacc col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('AdminOffices/manageColleges'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Edit Colleges</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Edit Colleges</h3> 
		</div>
			<div class="panel-body">
				<div class="row">
					<?php foreach($colleges as $ca){
						echo '
					<div class="col-md-3">
						<div class="well">
						<div id="photo_profile">
						<img src="'.$ca['collegeLogo'].'" alt="Profile Picture" class="img-responsive img-thumbnail" id="profilepic"/>
						</div>
						<br />
						<br />
						<a href="#" class="form-control text-center edit_link" data-toggle="modal" data-target="#ImageLogoModal">Edit Picture</a>
						<a href="#" class="form-control text-center edit_link" data-toggle="modal" data-target="#editInfoCollege" >Edit Information</a>
						</div>	
					</div>
					<div class="col-md-8 col-md-offset-1">
						<h3 class="text-primary">'.$ca['collegeId'].' </h3>
						<h4><em>'.$ca['collegefull'].'</em></h4>
						<br />

            <h5><b class="text-primary">College Dean: </b>'.$ca['collegeDean'].'</h5>
						<h5><b class="text-primary">College Description:</b></h5>
            <h5>'.$ca['collegeDesc'].'</h5>
						';}?>
					<div>
				</div>		
			</div>
		</div>
			
	</div>
</div>	
<!--MODAL-->
          <div class="modal fade" id="ImageLogoModal" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <form role="form" method="post" class="modal-content" enctype="multipart/form-data" id="newprofile_form" >
                
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Logo Image</h4>
                  </div>
                  <div class="modal-body">
                    <!--choose banner-->
                    <div class="form-group">
                      <label for="newprofile"> New Logo Image: </label>
                      <input type="file" id="newprofile" name="newprofile" />
                    </div>
                     <div class="text-danger">
                        <?php echo validation_errors(); ?>
                    </div> 
                  
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                  </div>
                 
              </form>
            </div>
          </div>
          <!--MODAL END-->

          <!--MODAL-->
          <?php foreach($colleges as $ca){ ?>
					
          <div class="modal fade" id="editInfoCollege" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <form role="form" method="post" class="modal-content" id="save_edit" >
                
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Information</h4>
                  </div>
                  <div class="modal-body">
                    <!--choose banner-->
                     <div class="form-group">
                        <label class="control-label">College Id:</label>
                            <input type="text" value="<?php echo $ca['collegeId'];?>" class="form-control" name="collegeId" id="collegeId">
                      </div>
                     <div class="form-group">
                        <label class="control-label ">College Name:</label>
                            <input type="text" value="<?php echo $ca['collegefull'];?>" class="form-control" name="collegefull" id="collegefull">   
                      </div>  
                    <div class="form-group">
                      <label class="control-label ">College Dean:</label>
                          <input type="text" value="<?php echo $ca['collegeDean'];?>" id="collegeDean" class="form-control" name="collegeDean">
                    </div>  
                    <div class="form-group">
                        <label class="control-label">College Description:</label>
                        <textarea class="form-control" name="collegeDesc" id="collegeDesc"><?php echo $ca['collegeDesc'];?></textarea>
                    </div> 
                  
                  </div>
                  <div class="modal-footer">
                     <div class="form-group">
                        <button type="submit"  class=" addbtn btn btn-info pull-right">
                            <span class="glyphicon glyphicon-save"></span> Save Changes
                        </button>
                      </div>
                  </div>
                 
              </form>
            </div>
          </div>
        <?php ;}?>
          <!--MODAL END-->



<!--NEW IMAGE-->
<script>

  $('#newprofile_form').on('submit',function(e){
    e.preventDefault();
    if($('#newprofile').val() == ''){

      alert("Please Select a File");
    }else{
      var filename = $('#newprofile').val();
      var valid_extensions = /(\.jpg|\.jpeg|\.png)$/i;   
      if(valid_extensions.test(filename))
      { 
         $.ajax({
          url:"<?php echo base_url(); ?>AdminOffices/updateProfileImage/<?php foreach($colleges as $ca){ echo $ca['collegeId'];}?>", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
            $('#photo_profile').html(data);
          }

        });
      }
      else
      {
         alert('Invalid File! Please use .jpg .jpeg .png for the image upload');
      }
     
    }
  });

</script>




<!--EDIT INFORMATION-->
  <script >
$(document).ready(function() {
   $('#save_edit').on('submit',function(e){
   		e.preventDefault();
        
            $.ajax({
		        url:"<?php echo base_url(); ?>AdminOffices/updateCollegeInfo", 
		        method:"POST",
		        data:new FormData(this),
		        contentType:false,
		        cache:false,
		        processData:false,
		        success:function(data){
		          alert("Information has been successfully Changed!");
		          location.href = "<?php echo base_url(); ?>AdminOffices/manageColleges";
		        }
		      });
    });

});

	
</script>