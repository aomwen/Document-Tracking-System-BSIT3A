        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-signal"></span> Add New User </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
                      <li class="active">  Add New User </li>
                  </ol>           
                </div>
              </div>  
            </div>


            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                  
                  <div class="x_content">
                    <div>
                      <h4 class="pull-left">Add User</h4>
                      <a href="<?php echo base_url('ManageAdmin/viewUsers')?>" class="btn btn-dark pull-right" role="button" title="Back"><span class="glyphicon glyphicon-back"></span>Back</a>
                    </div> 
                    <br />
                    <hr />
                    <form id="formUser" data-parsley-validate action="<?php echo base_url('ManageAdmin/addUser'); ?>" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="username" id="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">First Name:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="firstname" class="form-control col-md-7 col-xs-12" type="text" name="firstname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lastname" class="form-control col-md-7 col-xs-12" type="text" name="lastname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Address:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" name="email" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">College/Office:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="sel1" name="collegeId" onchange="filterDept()">
                            <option selected disabled name="collegeId">Choose a College</option>
                          	<?php foreach($colleges as $c){
              							echo '
              							<option value="'.$c['collegeId'].'">'.$c['collegeId'].'</option>
              							';
              							}?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="sel2" name="department">
                          	<option selected disabled>Choose a Department</option>
                          	<?php foreach($departments as $d){
                							echo '
                							<option value="'.$d['department'].'">'.$d['department'].'</option>
                							';
                							}?>
                						</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Position:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="position">
                            <?php foreach($positions as $p){
                  						echo '
                  						<option value="'.$p['position'].'">'.$p['position'].'</option>
                  						';
                  					}?>
                          </select>
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group text-center">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>  
                </div>
              </div>
            </div>        
          </div>
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
 function validateEmail(email) {
	    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	    if (filter.test(email)) {
	        return true;
	    }
	    else {
	        return false;
	    }
	}
          </script>