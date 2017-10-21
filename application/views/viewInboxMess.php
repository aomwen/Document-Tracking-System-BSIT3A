<!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-inbox"></span> Inbox </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
                      <li class="active"> Inbox </li>
                  </ol>           
                </div>
              </div>  
            </div>


            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="specific_inbox">
                     <?php
		                foreach($documents as $d){
		                  echo'
		                  <div>
		                    <h3><b>'.$d['routeId'].'</b></h3>
		                    <h5 class="pull-left">To: <b>'.$d['receiver'].'</b></h5>
		                    <h5 class="pull-right">Forward Date: '.$d['forwardDate'].'</h5>
		                    <br />
		                    <br />
		                    <h5 class="pull-left">File code: <b>'.$d['fileCode'].'</b></h5>
		                    <h5 class="pull-left">&nbsp; File name: <b>'.$d['fileName'].'</b></h5>
		                    <br />
		                    <hr />
		                    <h5 class="subject_inbox">'.$d['forwardComment'].'</h5>
		                    <br />
		                    <hr />
		                  </div>
							<form>
								<div class="form-group row text-center">
									<div class="col-sm-6">
						            	<div class="col-sm-6 pull-left">';?>
						            		<a href="#" class="inboxbtn btn btn-danger" onClick="deleteInboxMess('<?php echo $d['fileCode'];?>')" title="Delete">
						            			<span class="glyphicon glyphicon-trash"></span>
						            			<span class="font">Delete</span>
						            		</a>
											<?php echo '
												<a href="'.base_url('FilesManipulation/downloadFile/'.$d['fileCode']).'" class="inboxbtn btn btn-success" title="Download">
													<span class="glyphicon glyphicon-download-alt"></span>
													<span class="font">Download</span>
												</a>
						            	</div>
						            </div>	
						            <div class="col-sm-6 pull-right">	
						            	<div class="col-sm-6 pull-right ">
						            		<a href="'.base_url('FilesManipulation/forward/'.$d['fileCode']).'" class="inboxbtn btn btn-primary" title="Forward">
						            			<span class="glyphicon glyphicon-share-alt"></span>
						            			<span class="font">Forward</span>
						            		</a>
						            	</div>		            	
						            </div>	
					          </div>
							</form>';
						}
						?>
                    <form>
                  </div>

                </div>
              </div>
            </div>        
          </div>
        </div>    
        <!-- /page content -->
