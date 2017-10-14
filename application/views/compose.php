=======
<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
<div class="adddocu col-sm-9">
  <div class="panel panel-default">
    <div class="panel-heading" id="head">
        <ol class="breadcrumb pull-right">
          <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
          <li class="active">Compose</li>
        </ol>    
        <h3><span class="glyphicon glyphicon-edit"></span> Compose</h3>
    </div>
      <div class="panel-body">
        <form action="<?php base_url('FilesManipulation/sendFile')?>" method="post" enctype="multipart/form-data" id="formId">
          <div class="form-group row">
            <div class="col-sm-6">
              <input type="text" class="form-control" placeholder="To:" name="receiver"/> 
            </div>
            <div class="col-sm-6">
              <input type="text" class="form-control"  name="sender" readonly value="<?php echo $_SESSION['username'];?>" />
            </div>
          </div>
          
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject" name="fileDesc" />
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
            <div class="form-group">
              <div id="myProgress">
               <div id="myBar">0%</div>
              </div>
            </div>
             </div>
           <div class="panel-footer">
            <button type="reset" class="btn btn-primary"> <span class="glyphicon glyphicon-repeat">&nbsp;Save</span></button>
            <button type="reset" class="btn btn-primary"> <span class="glyphicon glyphicon-repeat">&nbsp;Reset</span></button>
            <button type="submit" class="btn btn-primary" onClick="move()"> <span class="glyphicon glyphicon-envelope">&nbsp;Send</span></button>
        </form>

      </div>
    </div>
</div>
</div>
</div>
<script>
 function move() {
    var elem = document.getElementById("myBar"); 
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
            $("#formId").submit();
        } else {
            width++; 
            elem.style.width = width + '%'; 
            elem.innerHTML = width * 1 + '%';
        }
    }
}
</script>