<div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="fa fa-star"></span> User Reviews</h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('Dashboard/dashboardView');?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
                      <li class="active">User Reviews</li>
                  </ol>           
                </div>
              </div>  
            </div>

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  	<div class="row">	
						<div class="col-md-12">
							<div class="panel panel-warning pull-right">
								<div class="panel-heading">
									<a href="#" style="text-decoration:none;color:#dd6f2d;" data-toggle="modal" data-target="#bookmarkedModal" title="Bookmarked">Bookmarked<span class="badge pull pull-right"></span>	
									</a>
								</div> <!--/panel-hdeaing-->
							</div> <!--/panel-->
						</div> <!--/col-md-4-->
					</div>					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
							<th>ID Number</th>
							<th>Email</th>
							<th>Date Sent</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($messages as $mess){
								if($mess['seen']==FALSE){
								echo '
									<tr style="background-color: #f9f9f9;">';
								}else{
									echo' <tr>';
								}
								echo'
										<td>'; 
										if($mess['bookmarked']==TRUE){echo '<text style="color:#dd6f2d;"><span class="glyphicon glyphicon-star"></span></text>&nbsp;';} echo $mess['idno']. '</td>
										<td>'.$mess['email'].'</td>
										<td>'.$mess['datecreated'].'</td>
										<td>	
											<a href="'.base_url('ManageAdmin/seenMsgToAdmin/'.$mess['idno'].'/'.$mess['seen']).'"> Preview </a>|<a href="'.base_url('manageAdmin/bookmarkmsgtoAdmin/'.$mess['idno']).'">Bookmark </a>
										</td>
									</tr>

									';
								}
							
						?>
                      </tbody>
                    </table>				
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<!--MODAL-->
        <div class="modal fade" id="bookmarkedModal" role="dialog" style="margin-top: 30px;">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <div class="modal-content">
              	<div class="modal-header">
              	 	<button type="button" class="close" data-dismiss="modal">&times;</button>
              		<h2 class="modal-title text-center">Bookmarked</h2>
              	</div>
              	<div class="modal-body" >
	             	<div class="table-responsive" >
	             		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="bookmarktbl">
	             			<thead>
	             				<tr>
	             					<td>ID Number</td>
	             					<td>Email</td>
	             					<td>Date Sent</td>
	             					<td>Action</td>
	             				</tr>
	             			</thead>
	             			<tbody>
	             			<?php
							$thereis=false;
							foreach($messages as $mess){
								if($mess['bookmarked']==TRUE){
									echo'<tr>
											<td>'.$mess['idno']. '</td>
											<td>'.$mess['email'].'</td>
											<td>'.$mess['datecreated'].'</td>
											<td>	
												<a href="'.base_url('ManageAdmin/seenMsgToAdmin/'.$mess['idno'].'/'.$mess['seen']).'"> Preview </a>|';?><a href="#" onClick="deleteMess('<?php echo $mess['idno'];?>')" > Delete </a><?php echo '|<a href="'.base_url('manageAdmin/unbookmarkmsgtoAdmin/'.$mess['idno']).'">Unbookmark </a>
											</td>
										</tr>

										';
										$thereis=true;
								}
								}

								if($thereis==false){
									echo '<tr><td colspan="4" class="text-danger" align="center">No message bookmark...</td></tr>';
								}
								
							?>
						</tbody>
	             		</table>
	             	</div>
	            </div> 	
            </div>
        </div>
    </div>
          <!--MODAL END-->
 <script type="text/javascript">
      function deleteMess(id){
       // console.log(id);
        var ans = confirm("Are you sure to delete this message?");
       // alert(id);
        if(ans==true){
          //redirect to delete method
          var url="<?php echo base_url('manageAdmin/removemsgtoAdmin/');?>"+id;
          location.href = url;
          alert("The message has been successfully deleted!");
        }
      }
     
 </script> -->