<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="adddocu col-sm-9">
  <div class="panel panel-default">
    <div class="panel-heading" id="head">
        <ol class="breadcrumb pull-right">
          <li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
          <li class="active">Compose</li>
        </ol>    
        <h3><span class="glyphicon glyphicon-edit"></span> Compose</h3>
    </div>
      <div class="panel-body">
        <div class="col-sm-4">

        </div>
          <div class="col-sm-8">
          <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('FilesManipulation/do_upload');?>">
            <div class="form-group row">
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="To:" name="receiver"/> 
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control"  name="author" readonly value="<?php echo $_SESSION['username'];?>" />
              </div>
            </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="file_desc" />
              </div>
              <div class="form-group">
                <label>Track #:</label>
                <input type="text" class="form-control" value="<?php echo $tracknumber ?>" name="trackcode" readonly />
              </div>
              <div class="form-group">
                <label>Filename</label>
                <input type="text" class="form-control" placeholder="Filename" name="filename" />
              </div>
              <div class="form-group">
                <label>Attachment:</label>
                <input class="btn btn-default btn-file" type="file" class="form-control" placeholder="Attach File" name="userfile" />
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">&nbsp;Send</button>
                <!-- <button type="submit" class="btn btn-primary">&nbsp;Save</span></button> -->
                <button type="reset" class="btn btn-danger">&nbsp;Reset</span></button>
              </div>  
            </div>  
          </form>
      </div>
    </div>
</div>
</div>
</div>