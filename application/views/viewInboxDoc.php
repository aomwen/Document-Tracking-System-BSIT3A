		<!--page content-->
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
                    <div class="table-responsive">
                       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
	                        <th>Route ID</th>
	                        <th>File ID</th>
	                        <th>File Name</th>
	                        <th>Sender</th>
		                    <th>Forward Date</th>
		                    <th>Comment</th>
                      	</thead>
                      	<tbody>
	                      	<?php foreach($documents as $d):?> 
	                        <tr>
	                            <td><a href="<?php echo base_url('DocumentInbox/viewMessage/').$d['routeId']?>"><b><?php echo $d['routeId']?></b></a></td>
	                            <td><?php echo $d['fileCode'] ?></td>
	                            <td><?php echo $d['fileName'] ?></td>
	                            <td><?php echo $d['sender'] ?> </td>
	                            <td><?php echo $d['forwardDate'] ?></td>
	                            <td><?php echo $d['forwardComment'] ?></td>
	                        </tr>
	                   		<?php endforeach?>
				        </tbody>
	                  </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>        
          </div>
        </div>    
        <!-- /page content -->

