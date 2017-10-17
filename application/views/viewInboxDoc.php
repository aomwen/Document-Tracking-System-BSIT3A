<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<!-- <div class="row">
	<div class="myinbox col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" id="head">
			    <ol class="breadcrumb pull-right">
			      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
			      <li class="active">Inbox</li>
			    </ol>    
			    <h3><span class="glyphicon glyphicon-inbox"></span> Inbox</h3>       
			</div>
			<div class="panel-body">
				<input type="text" onkeyup="FilterFunction()" placeholder=" e.g. 592-***-**" id="myInputDocumentSearch" class="search"/>
					<button><a type="submit"  href="<?php base_url('DocumentInbox/viewInbox')?>"><span class="glyphicon glyphicon-repeat"></span></a></button>
			</div>          
			<div class="table-responsive">
		        <table id="myTable" class="docstatus table-bordered table-hover table-striped table-center text-center" width="100%">
		        	<tr>
		        		<th>Tracknumber</th>
		        		<th>Filename</th>
		        		<th>Sender</th>
		        		<th>Date Received</th>
		        	</tr>
		          	<?php
		          		$thereis=false;
		         		foreach ($documents as $d){
							if($d['receiver']==$_SESSION['username']&&$d['inboxDelete']==FALSE){
				        		if($d['seen']==FALSE){
				        			echo '
				        				<tr style="background-color: #f9f9f9;">';
				        		}else{
				        			echo '
				        				<tr>';
				        		}
				        		echo'
				            		<td><a href="'.base_url('DocumentInbox/viewMessage/'.$d['trackcode'].'').'"><b>'.$d['trackcode'].'</b></td>
				            		<td>'.$d['filename'].'</a></td>
				            		<td>'.$d['sender'].'</td>
				            		<td>'.$d['datecreated'].'</td>
				        		</tr>';
				        // <td><span class="glyphicon glyphicon-paperclip"></span></td>
				            	$thereis=true;
				    		}
				    	}
				    	if($thereis==false){
							echo '<tr><td colspan="4" class="text-danger" align="center">No documents received...</td></tr>';
						}
		          	?> 
		        </table>
		      </div>
		</div>
		<div class="buttonto" style="margin-left: 95%; margin-top:25%;">
			<a href="<?php echo base_url('FilesManipulation/do_upload'); ?>" class="btn btn-primary" role="button" style="width:55px; height:55px; border-radius: 50px;box-shadow: 2px 4px 10px #888888;"><span class="glyphicon glyphicon-pencil" style="font-size: 30px; top:5px;"></span></a>	
		</div>					
	</div>
</div>	
<script>
function FilterFunction() {
  var input, filter, table, tr, td, i, x,flag;
  input = document.getElementById("myInputDocumentSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  	flag = false;
  		for(x = 0; x < 4; x++){
		    td = tr[i].getElementsByTagName("td")[x];
		    if (td){
		    // alert(td.innerHTML.toUpperCase());
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		        flag=true;
		      }else if (flag==false){
		        tr[i].style.display = "none";
		      }
		    } 
		}
	}
  }
</script> -->
   <div class="row">
      <div id="content">       
        <div id="main-content">     
          <div class="col-md-12 pull-right">
            <div class="well">       
              <div class="row">
                <div class="col-md-12"> <!--BINAGO-->
                  <h2>List of Product</h2>
                  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#product">Add Product</button>
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered table-striped">
                        <thead>       
                          <tr>
                            <th>Product ID</th>
                            <th>Product Description</th>
                            <th>Category ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>                                                          
                      </table>  
                    </div>                
                </div>  
              </div>
            </div>  
          </div>
        </div>
      </div>
