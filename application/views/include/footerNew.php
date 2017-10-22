
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Document Tracking System - Group [MaGiAbGrFr]
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- compose -->
    <div class="compose col-md-6 col-xs-12">
        
        <div class="panel-heading" id="head">
            New Document
            <button type="button" class="close compose-close">
              <span>×</span>
            </button>
          </div>
          <div class="panel panel-default">
            <div class="panel-body">
              <form action="<?php echo base_url('FilesManipulation/sendFile')?>" method="post" enctype="multipart/form-data" id="composeDoc">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label>By:</label>
                    <input type="text" class="form-control" placeholder="" name="fileAuthor" value="<?php echo $_SESSION['username'];?>" readonly/> 
                  </div>
                </div>
                <div class="form-group">
                  <label>File code:</label>
                  <input type="text" class="form-control" value="<?php echo $fileCode ?>" name="fileCode" readonly />
                </div>
                <div class="form-group">
                  <label>Filename</label>
                  <input type="text" class="form-control" placeholder="File Name" name="fileName" />
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Comment" name="fileComment" />
                </div>
                <div class="form-group">
                  <label>Attachment</label>
                  <input class="btn btn-default btn-file"  type="file" class="form-control" placeholder="Attach File" name="filePath" id="file" accept=".pdf">
                </div>
                <div class="form-group">
                  <button type="reset" class="btn btn-primary" title="Reset">
                    <span class="glyphicon glyphicon-repeat"></span>
                    <span class="font">&nbsp;Reset</span>
                  </button>
                  <input type="submit" class="btn btn-primary" value="Send" />
                </div>
              </form>
            </div>
          </div>
    </div>
    <!-- /Forward -->
    <div class="forwardModal col-md-6 col-xs-12">
      <div class="panel-heading" id="head">
          ForwardDocument
          <button type="button" class="close forwardModal-close">
            <span>×</span>
          </button>
        </div>
        <div class="panel panel-default">
          <div class="panel-body">
       <form action="<?php echo base_url('FilesManipulation/forwardFile')?>" method="post" enctype="multipart/form-data" id="forwardForm">
          <div class="form-group row">
            <div class="col-sm-6">
              <label >To:</label>
              <select  class="form-control" id="receiver"  name="receiver" />
                <option selected disabled> -- Choose a Receiver -- </option>
                <?php foreach($user as $u){
                  if($u['username']!= $_SESSION['username']){
                  echo '<option value="'.$u['username'].'"><b>'.$u['username'].'</b> -('.$u['collegeId'].' - '.$u['department'].')</option>';
                  }
                }?>
              </select> 
            </div>
            <div class="col-sm-6">
              <label >From:</label>
              <input type="text" class="form-control"  name="sender" readonly value="<?php echo $_SESSION['username']?>" />
            </div>
          </div>
            <div class="form-group">
              <label>Route code:</label>
              <input type="text" class="form-control" value="<?php echo $routeId?>" name="routeId" readonly />
            </div>
            <div class="form-group">
              <label>file Code:</label>
              <input type="text" class="form-control" id="forwardFileCode" name="fileCode" readonly />
            </div>
            <div class="form-group">
              <label>file Name:</label>
              <input type="text" class="form-control" name="fileName" id="forwardFileName" readonly />
            </div>
            <div class="form-group">
              <label>file Comment:</label>
              <textarea class="form-control input-text text-area" name="forwardComment" cols="0" rows="0" placeholder="Comment"></textarea>
            </div>
           <div class="panel-footer">
            <button type="reset" class="btn btn-primary"> <span class="glyphicon glyphicon-repeat">&nbsp;Reset </span></button>
            <button type="submit" class="btn btn-primary" > <span class="glyphicon glyphicon-envelope">&nbsp;Send </span></button>
            </div>
        </form>
      </div>
    </div>
    <!-- /compose -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js');?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('assets/vendors/Chart.js/dist/Chart.min.js');?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('assets/vendors/gauge.js/dist/gauge.min.js');?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('assets/vendors/skycons/skycons.js');?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.pie.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.time.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.stack.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.resize.js');?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/flot.curvedlines/curvedLines.js');?>"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('assets/vendors/DateJS/build/date.js');?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('assets/vendors/jqvmap/dist/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js');?>"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/jquery.hotkeys/jquery.hotkeys.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/google-code-prettify/src/prettify.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.js');?>"></script>
  
  </body>
</html>
