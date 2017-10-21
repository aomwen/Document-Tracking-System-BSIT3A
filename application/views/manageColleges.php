<!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-map-marker"></span> Manage Offices </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
                    <li class="active"> Manage Offices </li>
                  </ol>           
                </div>
              </div>  
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <a href="<?php echo base_url('AdminOffices/addColleges'); ?>" class="btn btn-dark btn-md" style="margin-top: 25%;">
                              <span class="glyphicon glyphicon-plus"></span>
                            </a>
                          </div>
                          <div class="caption">
                            <p class="text-center"><strong>Add College</strong></p>
                            <p class="text-center">Description Here</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <?php
								$thereis=false;
								foreach($colleges as $col){
									echo'
		                          	<img class="img-responsive" src="'.$col['collegeLogo'].'" style="width: 100%; display: block;" alt="College Logo" />
		                            <div class="mask">
		                              <div class="tools tools-bottom">
		                              	<a href="'.base_url('AdminOffices/officeContent/'.$col['collegeId']).'"><span class="glyphicon glyphicon-eye-open"></span></a>
		                                <a href="'.base_url('AdminOffices/updateCollege/'.$col['collegeId']).'"><i class="fa fa-pencil"></i></a>
		                                <a href="#"><i class="fa fa-times"></i></a>
		                              </div>
		                            </div>'; 
		                        ?>    
								<?php echo '
									</div>';
									$thereis=true;
								}
								if($thereis==false){
									echo '<h4 class="text-danger">No college registered...</h4>';
								}
							?>
                          <div class="caption">
                          	<p class="text-center">'.$col['collegefull'].' ('.$col['collegeId'].')</p>
                          	<p class="text-center">'.$col['collegeDesc'].'</p>
                          </div>                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

 <script type="text/javascript">
  function deleteCollege(id){
   // console.log(id);
    var ans = confirm("Do you want to delete this college?");
   // alert(id);
    if(ans==true){
      //redirect to delete method
      var url="<?php echo base_url('AdminOffices/removeCollege/');?>"+id;
      location.href = url;
      alert("The college has been successfully deleted!");
    }
  }  
 </script>        