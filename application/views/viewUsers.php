<!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-signal"></span> Manage User Profile </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('Dashboard/dashboardView'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
                      <li class="active"> Manage User Profile </li>
                  </ol>           
                </div>
              </div>  
            </div>


            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                  
                  <div class="pull-right">
                    <a href="<?php echo base_url('ManageAdmin/addUser'); ?>" role="button" class="btn btn-dark" ><span class="glyphicon glyphicon-plus"></span> Add User</a>
                    <a href="#" class="btn btn-dark" data-toggle="modal" role="button" data-target="#addPositionModal"><span class="glyphicon glyphicon-plus"></span> Add Position</a>
                    <a href="#" class="btn btn-dark" data-toggle="modal" role="button" data-target="#addRoleModal"><span class="glyphicon glyphicon-plus"></span> Add Role</a>
                  </div>  

                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                          <td>Username</td>
                          <td>Password</td>
                          <td>First Name</td>
                          <td>Last Name</td>
                          <td>Email Address</td>
                          <td>College/Office</td>
                          <td>Department</td>
                          <td>Position</td>
                          <td>Role</td>
                          <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($userList as $us):?>
                              <tr>
                                <td><?php echo $us['username']?></td>
                                <td><?php echo $us['password']?></td>
                                <td><?php echo $us['firstname']?></td>
                                <td><?php echo $us['lastname']?></td>
                                <td><?php echo $us['email']?></td>
                                <td><?php echo $us['collegeId']?></td>
                                <td><?php echo $us['department']?></td>
                                <td><?php echo $us['position']?></td>
                                <td><?php foreach($roles as $r){if($us['roleId']==$r['roleId']){echo $r['role'];} }?></td>
                                <td><a href="<?php echo base_url('ManageAdmin/editUser/'.$us['username'])?>" class="btn btn-info btn-sm">Edit</a>
                                <?php if($us['active']==1){?>
                                <a href="<?php echo base_url('ManageAdmin/deactivateUser/'.$us['username'])?>" class="btn btn-danger btn-sm">Deactivate</a>
                                <?php }else{?>
                                <a href="<?php echo base_url('ManageAdmin/activateUser/'.$us['username'])?>" class="btn btn-success btn-sm">Activate</a>
                                <?php }?>
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
          </div>
        </div>    
        <!-- /page content -->
   <!--MODAL FOR ADD POSITION-->
          <div class="modal fade" id="addPositionModal" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <form role="form" method="post" class="modal-content" actio="<?php echo base_url('ManageAdmin/addPosition');?>" id="newposition_form" name="newposition_form">
              	                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Position</h4>
                  </div>
                  <div class="modal-body">
         
                    <!-- <div class="form-group">
                      <label for="collegeId"> College Id: </label>
                      <select id="collegeIdpos" class="form-control" name="collegeId">
                      <?php		
                      		foreach($colleges as $c){
                      				echo '<option>'.$c['collegeId'].'</option>';
                      		}
                      ?>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label for="position"> Position: </label>
                      <input class="form-control" type="text" id="positionpos" name="position" />
                    </div>
                  
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Add Position</button>
                    </div>
                  </div>
                 
              </form>
            </div>
          </div>
          <!--MODAL END-->

          <!--MODAL FOR ADD ROLE-->
          <div class="modal fade" id="addRoleModal" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <form role="form" method="post" class="modal-content" id="newrole_form" name="newrole_form">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Role</h4>
                  </div>
                  <div class="modal-body">
         
                    <div class="form-group">
                      <label for="role"> Role: </label>
                      <input class="form-control" type="text" id="role" name="role" />
                    </div>
                  
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Add Role</button>
                    </div>
                  </div>
                 
              </form>
            </div>
          </div>

 <!-- ADD POSITION -->
