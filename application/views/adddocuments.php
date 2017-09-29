<style>
.adddocu{
  margin-top: 75px;
  margin-left: 294px;
  width:79%;
  height:100%;
}
</style>
<div class="adddocu col-sm-9">
  <div class="panel panel-default">
    <div class="panel-heading">
        <ol class="breadcrumb pull-right">
          <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span></a></li> 
          <li class="active">Compose</li>
        </ol>    
        <h3><span class="glyphicon glyphicon-edit"></span> Compose</h3>
    </div>
    <div class="panel-body">
      <?php echo form_open_multipart('upload/do_upload');?>
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
            <label>Filename:</label>
            <input type="text" class="form-control" placeholder="Filename" name="filename" />
          </div>
          <div class="form-group">
            <label>Attachment:</label>
            <input class="btn btn-default btn-file" type="file" class="form-control" placeholder="Attach File" name="path" />
          </div>
        </div>
         <div class="panel-footer">
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-envelope">&nbsp;Send</span></button>
      </form>
    </div>
  </div>
</div>
</div>
</div>