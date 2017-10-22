 <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-o"></i></div>
                <a href="<?php echo base_url('DocumentStatus/viewDocuments');?>" class="count">179</a>
                <h3>Total Documents</h3>
                <a href="<?php echo base_url('DocumentStatus/viewDocuments');?>">&nbsp; &nbsp; View Details</a>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-folder-open-o"></i></div>
                <a href="<?php echo base_url('DocumentInbox/viewInbox');?>" class="count">179</a>
                <h3>Total Read</h3>
                <a href="<?php echo base_url('DocumentInbox/viewInbox');?>">&nbsp; &nbsp; View Details</a>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-folder-o"></i></div>
                <a href="<?php echo base_url('DocumentInbox/viewInbox');?>" class="count">179</a>
                <h3>Total Unread</h3>
                <a href="<?php echo base_url('DocumentInbox/viewInbox');?>">&nbsp; &nbsp; View Details</a>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-send-o"></i></div>
                <a href="<?php echo base_url('DocumentSent/viewSent');?>" class="count">179</a>
                <h3>Total Sent</h3>
                <a href="<?php echo base_url('DocumentSent/viewSent');?>">&nbsp; &nbsp; View Details</a>
              </div>
            </div>
          </div>  
          <!-- /top tiles -->

          <div class="row pull-right">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3>Guide <small>Must Read!</small></h3>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                              <a>How to track a document?</a>
                            </h2>
                            <p class="excerpt">
                              <ol>
                                <li>On the homepage, enter the track # of the document you wish to track.</li>
                                <li>A small window will appear that will display the information of the document based on the track # you entered.</li>
                              </ol>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                           <h2 class="title">
                              <a>How to send a comment?</a>
                            </h2>
                            <p class="excerpt">
                              <ol>
                                <li>On the homepage, you can either click on the contact on the upper right side of the screen to move you to the contact section where you can contact the admin, or you can scroll down to the bottom of the page until you reach the contact section.</li>
                                <li>Type your name and email address.</li>
                                <li>Type your comments, suggestions, or clarifications.</li>
                                <li>Click the send button.</li>
                              </ol>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                              <a>How to send a file?</a>
                            </h2>
                            <p class="excerpt">
                              <ol>
                                <li>Log in to your account.</li>
                                <li>Click the compose button on the menu on the left side of the screen.</li>
                                <li>Type the name of the receiver of the file.<br /><b>NOTE:</b> The receiver must have an account for him/her to view your message.</li>
                                <li>Type the subject of the file.</li>
                                <li>Type the name of the file.</li>
                                <li>Choose the file you wish to send.</li>
                                <li>Click the send button.</li>
                              </ol>
                              <strong>It is important to remember the track number of your document for easy tracking.</strong>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                              <a>Where can I see the status of my documents?</a>
                            </h2>
                            <p class="excerpt">
                              <ol>
                                <li>Log in to your account.</li>
                                <li>Click the Document Status button on the menu on the left side of the screen.</li>
                              </ol>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <a href="<?php echo base_url('DocumentStatus/viewDocuments');?>"><h4>My Documents </h4></a>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>File ID</th>
                              <th>File Code</th>
                              <th>File Name</th>
                              <th>Date Created</th>
                              <th>Comment</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($documents as $doc):?>
                          <tr>
                            <td><?php echo $doc['fileId']?></td>
                            <td><a href="<?php echo base_url('DocumentStatus/mydocumentsRoute/').$doc['fileCode']?>"><?php echo $doc['fileCode']?></a></td>
                            <td><?php echo $doc['fileName']?></td>
                            <td><?php echo $doc['fileCreated']?></td>
                            <td><?php echo $doc['fileComment']?></td>
                            <td class="text-center">
                              <a href="<?php echo base_url('DocumentStatus/mydocumentsRoute/').$doc['fileCode']?>" title="Preview"><span class="glyphicon glyphicon-eye-open"></span></a>
                              <a href="<?php echo base_url('FilesManipulation/downloadFile/').$doc['fileCode']?>" title="Download"><span class="glyphicon glyphicon-download-alt"></span></a>
                              <a href="<?php echo base_url('FilesManipulation/forwardFile/').$doc['fileCode']?>" title="Forward"><span class="glyphicon glyphicon-share-alt"></span></a>
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

              <div class="x_panel">
                <div class="x_title">
                  <a href="<?php echo base_url('DocumentStatus/mydocumentsRoute'); ?>"><h4>Documents Route</h4></a>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>RouteId</th>
                          <th>File Name</th>
                          <th>Forward Date</th>
                          <th>Sender</th>
                          <th>Receiver</th>
                        </tr>
                      </thead>
                      <tbody>
                          <td>RouteId</td>
                          <td>File Name</td>
                          <td>Forward Date</td>
                          <td>Sender</td>
                          <td>Receiver</td>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>  

            <div class="row">

              <!-- Start to do list -->
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>To Do List <small>Sample tasks</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="">
                      <ul class="to_do">
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                        </li>
                        <li>
                          <p>
                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End to do list -->
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->