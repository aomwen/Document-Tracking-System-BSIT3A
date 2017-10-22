<!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-map-marker"></span> Offices </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
                    <li><a href="<?php echo base_url('Office/viewOffice'); ?>" title="Office"><span class="glyphicon glyphicon-map-marker"></span></a></li> 
                     <li class="active"> Offices </li>
                  </ol>           
                </div>
              </div>  
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <!-- start accordion -->
                      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            
                          <?php
                          $thereis=false;
                          foreach($departments as $d){
                            $dept = str_ireplace(' ','-',$d['department']);
                            echo'
                            <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">  
                                <h4 class="panel-title">'.$d['department'].'</h4>
                              </a>
                            </div>  
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <p>'.$d['departmentHead'].'<b>(head)</b></p>';
                              foreach($userdata as $us){
                                if($us['department'] == $d['department']){
                                  echo '<p>'.$us['firstname'].' '.$us['lastname'].'<b>'.$us['position'].'</b></p>';
                                }
                                echo '
                            </div>';
                                }
                                $thereis=true;
                            }
                            if($thereis==false){
                              echo '<h4 class="text-danger">No department registered...</h4>';  
                            }
                            ?>  
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end of accordion -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


            <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <div class="row">
                      	<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
  		                    <?php
  							$thereis=false;
  							foreach($departments as $d){
  								$dept = str_ireplace(' ','-',$d['department']);
  								echo'
  								<button class="accordion">'.$d['department'].'</button>
  								<div class="panel" id="panel">
  								    <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <h4 class="panel-title">Department</h4>
                            </a>
  									<p>'.$d['departmentHead'].'<b>(head)</b></p>';
  									foreach($userdata as $us){
  										if($us['department'] == $d['department']){
  											echo '<p>'.$us['firstname'].' '.$us['lastname'].'<b>'.$us['position'].'</b></p>';
  										}
  										echo '
  								</div>';
  									}
  									$thereis=true;
  							}
  							if($thereis==false){
  								echo '<h4 class="text-danger">No department registered...</h4>';
  							}
  							?>	
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<script type="text/javascript">
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    }
  }
</script>

 <script type="text/javascript">
      function deleteDepartment(id){
       // console.log(id);
        var ans = confirm("Are you sure to delete this department?");
       // alert(id);
        if(ans==true){
          //redirect to delete method
          var url="<?php echo base_url('');?>"+id;
          location.href = url;
          alert("The department has been successfully deleted!");
        }
      }
 </script>