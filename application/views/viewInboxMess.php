<!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-inbox"></span> Inbox </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('Dashboard/dashboarView')?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
                   	<li><a href="<?php echo base_url('DocumentInbox/viewInbox');?>"><i class="fa fa-envelope"></i> Inbox </span></a></li> 
                      <li class="active"> Message </li>
                  </ol>           
                </div>
              </div>  
            </div>


            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="specific_inbox">
                    	<?php foreach($documents as $d):?>
                      <h3><b><?php echo $d['routeId']?></b></h3>
                      <h5 class="pull-left">From: <?php echo $d['sender']?>
                      <h5 class="pull-left">to: <?php echo $d['receiver']?>
                      <h5 class="pull-right">Forward Date: <?php echo $d['forwardCreated']?></h5>
                      <br />
                      <br />
                      <h5 class="pull-left">File code: <?php echo $d['fileCode']?></h5>
                      <h5 class="pull-left">&nbsp;  File name:<?php echo $d['fileName']?></h5>
                      <br />
                      <hr />
                      <h5 class="subject_inbox"><?php echo $d['forwardComment']?></h5>
                      <br />
                      <hr />
                      </div>
                    <form>
                    <div class="form-group row text-center">
                      <div class="col-sm-6">
                        <div class="col-sm-6 pull-left">
                          <button class="inboxbtn btn btn-dark"><span class="glyphicon glyphicon-trash"> Delete</span></button>
                          <button class="inboxbtn btn btn-dark"><span class="glyphicon glyphicon-download-alt"> Download</span></button>
                        </div>
                      </div>  
                      <div class="col-sm-6 pull-right"> 
                        <div class="col-sm-6 pull-right ">
                          <button class="inboxbtn btn btn-dark"><span class="glyphicon glyphicon-share-alt"> Forward</span></button>
                        </div>                  
                      </div>  
                  <?php endforeach?>
                    </div>
                  </div>
                </div>
              </div>
            </div>        
          </div>
        </div>    
        <!-- /page content -->
