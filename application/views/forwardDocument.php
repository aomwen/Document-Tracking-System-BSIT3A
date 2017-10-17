<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />


<script type="text/javascript">
  function filterDept(){
    var collegeDept = {};
    <?php
    foreach($colleges as $c){
      echo"collegeDept['".$c['collegeId']."'] =[";
      foreach($departments as $d){
        if($c['collegeId'] == $d['collegeId']){
         echo"'".$d['department']."',";
        }
      }
      echo "];";
    } 
    ?>
      var collegeList = document.getElementById("sel1");
      var departmentList = document.getElementById("sel2");
      var selCollege = collegeList.options[collegeList.selectedIndex].value;

      while (departmentList.options.length) {
          departmentList.remove(0);
      }
      var dept = collegeDept[selCollege];
      if (dept) {
          var i;
          for (i = 0; i < dept.length; i++) {
            var opt = document.createElement('option');
          opt.value = dept[i];
          opt.innerHTML = dept[i];
          departmentList.appendChild(opt);
          }
      }
  }


  function filterUser(){
    var zzzz = {};
    <?php
    foreach($departments as $d){
      echo"zzzz['".$d['department']."'] =[";
      foreach($users as $u){
        if($d['department'] == $u['department']){
         echo"'".$u['username']."',";
        }
      }
      echo "];";
    } 
    ?>
      var departmentList = document.getElementById("sel2");
      var userList = document.getElementById("sel3");
      var selDepartment = departmentList.options[departmentList.selectedIndex].value;
      while (userList.options.length) {
          userList.remove(0);
      }
      var deptUser = zzzz[selDepartment];
      if (deptUser) {
          var i;
          for (i = 0; i < deptUser.length; i++) {
            var opt = document.createElement('option');
          opt.value = deptUser[i];
          opt.innerHTML = deptUser[i];
          userList.appendChild(opt);
          }
      }
  }

  function userToInput(){
    var userList = document.getElementById("sel3");
    var selUser = userList.options[userList.selectedIndex].value;
    console.log(selUser);
    document.getElementById("sender").value = $selUser;
  }
</script>

<div class="adddocu col-sm-9">
  <div class="panel panel-default">
    <div class="panel-heading" id="head">
        <ol class="breadcrumb pull-right">
          <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
          <li class="active">Compose</li>
        </ol>    
        <h3><span class="glyphicon glyphicon-edit"></span> Forward</h3>
    </div>
      <div class="panel-body">

       <form action="<?php base_url('FilesManipulation/sendFile')?>" method="post" enctype="multipart/form-data" id="formId">
          <div class="form-group row">
              <div class="col-sm-4">
                <div class="dropdown">
                  <label for="sel1">College/Offices</label>
                  <select class="form-control" id="sel1" name="collegeId" onchange="filterDept()"">
                  <?php
                  foreach($colleges as $c){
                    echo '
                      <option value="'.$c['collegeId'].'">'.$c['collegeId'].'</option>
                      ';}?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="dropdown">
                  <label for="sel2">Department</label>
                  <select class="form-control" id="sel2" name="department" onchange="filterUser()"">
                    <option disabled selected>--- Choose ---</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="dropdown">
                  <label for="sel3">Users</label>
                  <select class="form-control" id="sel3" onchange="userToInput()" name="user">
                    <option disabled selected>--- Choose ---</option>
                  </select>
                </div>
              </div>
            </div>
          <?php
          foreach($documents as $d){
          echo '
          <div class="form-group row">
            <div class="col-sm-6">
              <label >To:</label>
              <input type="text" class="form-control" id="sender"  name="receiver" /> 
              <label> Allow Log</label>
              <input type="checkbox" name="allowLog" value="TRUE" />
            </div>
            <div class="col-sm-6">
              <label >From:</label>
              <input type="text" class="form-control"  name="sender" readonly value="'.$_SESSION['username'].'" />
              <label> Allow Forward</label>
              <input type="checkbox" name="allowForward" value="TRUE" />
            </div>
          </div>
            <div class="form-group">
              <label>Route code:</label>
              <input type="text" class="form-control" value="'.$routeId.'" name="routeId" readonly />
            </div>
            <div class="form-group">
              <label>file Code:</label>
              <input type="text" class="form-control" value="'.$d['fileCode'].'" name="fileCode" readonly />
            </div>
            <div class="form-group">
              <label>file Code:</label>
              <input type="text" class="form-control" value="'.$d['fileName'].'" name="fileName" readonly />
            </div
            <div class="form-group">
              <label>file Comment:</label>
              <input type="text" class="form-control" placeholder="forward comment" name="forwardComment"/>
            </div
            <div class="form-group">
              <div id="myProgress">
               <div id="myBar">0%</div>
              </div>
            </div>
           <div class="panel-footer">
            <button type="reset" class="btn btn-primary"> <span class="glyphicon glyphicon-repeat">&nbsp;Reset </span></button>
            <button type="submit" class="btn btn-primary" onClick="move()"> <span class="glyphicon glyphicon-envelope">&nbsp;Send </span></button>
            </div>
              ';
          }
            ?>
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

