        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-signal"></span> Document Status</h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('Dashboard/dashboardView');?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="<?php echo base_url('DocumentStatus/viewDocuments');?>" title="Document Status"><span class="fa fa-bar-chart"></span></a></li> 
                      <li class="active">Document Log</li>
                  </ol>           
                </div>
              </div>  
            </div>

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>RouteId</th>
                          <th>File Code</th>
                          <th>File Name</th>
                          <th>Forward Date</th>
                          <th>Comment</th>
                          <th>sender</th>
                          <th>receiver</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($documents as $doc):?>
                        <tr>
                          <td><?php echo $doc['routeId']?></td>
                          <td><a href="<?php echo base_url('DocumentStatus/mydocumentsRoute/').$doc['fileCode']?>"><?php echo $doc['fileCode']?></a></td>
                          <td><?php echo $doc['fileName']?></td>
                          <td><?php echo $doc['forwardDate']?></td>
                          <td><?php echo $doc['forwardComment']?></td>
                          <td><?php echo $doc['sender']?></td>
                          <td><?php echo $doc['receiver']?></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>				
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->