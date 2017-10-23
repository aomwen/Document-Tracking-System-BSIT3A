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
                      <li class="active">Document Status</li>
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
                          <th>File ID</th>
                          <th>File Code</th>
                          <th>File Name</th>
                          <th>Date Created</th>
                          <th>Comment</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($documents as $doc):?>
                        <tr>
                          <td><?php echo $doc['fileId']?></td>
                          <td><a href="<?php echo base_url('DocumentStatus/mydocumentsRoute/'.$doc['fileCode'])?>"><?php echo $doc['fileCode']?></a></td>
                          <td><?php echo $doc['fileName']?></td>
                          <td><?php echo $doc['fileCreated']?></td>
                          <td><?php echo $doc['fileComment']?></td>
                          <td class="text-center">
                            <a href="<?php echo base_url('DocumentStatus/mydocumentsRoute/').$doc['fileCode']?>" title="View Log"><span class=" glyphicon glyphicon-list-alt"></span></a>
                            <a href="<?php echo base_url('FilesManipulation/previewFile/').$doc['fileCode']?>" title="View File"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?php echo base_url('FilesManipulation/downloadFile/').$doc['fileCode']?>" title="Download"><span class="glyphicon glyphicon-download-alt"></span></a>
                            <a  onclick="sendfileCode('<?php echo $doc['fileCode']?>','<?php echo $doc['fileName']?>');" ><span class="glyphicon glyphicon-share-alt"></span></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>        
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->
        <script type="text/javascript">
          function sendfileCode(filecode,filename){
              $("#forwardFileCode").val(filecode);
              $("#forwardFileName").val(filename);
              $('.forwardModal').slideToggle();
            }
      </script>