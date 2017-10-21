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
                    <?php foreach($colleges as $col):?>
                    <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <a href="<?php echo base_url('Office/officeContent/'.$col['collegeId'])?>"><img style="width: 100%; display: block;" src="<?php echo $col['collegeLogo']?>" alt="image" /></a>
                          </div>
                          <div class="caption">
                            <p class="text-center"><b><?php echo $col['collegefull']?></b></p>
                            <p class="text-center"><?php echo $col['collegeDesc']?></p>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
