<style>
.breadcrumb{
  margin-top:10px;
}
.adddocu{
  margin-top: 75px;
  margin-left: 20%;
  width:79%;
  height:100%;
}
#head{
  border-bottom:solid #015249;
}
.panel-heading h3{
  color:#015249;
}
.panel-heading ol li a span{
  color:#015249;
}
.panel-footer button{
  font-family: sans-serif;
  width:175px;
  height:50px;
  letter-spacing: 1px;
  background:#015249;
  color:#ffffff;
  text-transform:uppercase;
  border:0px;
}
.panel-footer button:hover{
  background:#A5A5AF;
  color:#222;
}
</style>
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
        <?php echo form_open_multipart('FilesManipulation/do_upload');?>
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
              <label>attach?</label>
              <input class="btn btn-default btn-file" type="file" class="form-control" placeholder="Attach File" name="userfile" />
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