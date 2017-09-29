<div class="docu col-sm-9">
    <div class="panel panel-default">
        <div class="panel-heading">Add Documents</div>
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