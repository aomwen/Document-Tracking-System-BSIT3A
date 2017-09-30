<style>
	.formstyle label{
		font-size:16px;
	}
	.formstyle input{
		border-radius:5px;
		margin-bottom: 10px;
	}
	.breadcrumb{
	  margin-top:10px;
	}
	.myinbox{
		margin-top: 75px;	
		margin-left: 20%;
		width:79%;
		height:100%;
	}
	#head{
	  border-bottom:solid #015249;
	}
	.panel-heading h3{
	  color:#015249;
	}
	.panel-heading ol li a span{
	  color:#015249;
	}
	.panel-body form input{
		padding:15px 16px;
		border:1px solid #ccc;
		border-radius:4px;
		font-size:15px;
		color:#aaa;
		font-family: 'Lato', sans-serif;
	}
	.panel-body form button{
		background:#015249;
		color:#fff;
		width:40px;
	}
	.panel-body form button:hover{
		background:#A5A5AF;
		color:#222;
	}

</style>	
<div class="myinbox col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Manage Registrar Status</li>
		      <li class="active">Add File Status</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Add File Status</h3>       
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url('ManageRegistrarDocu/registrar_add_documents');?>" class="formstyle" method="post">
			    <div class="form-group">
			      <label class="control-label col-sm-2">Track Number:</label>
			      <div class="col-sm-10">
					<input type="text" value="<?php echo $tracknumber?>" name="trackcode" readonly>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-2">File Type:</label>
			      <div class="col-sm-10">          
					<input type="text" name="file_type" />
			      </div>
			    </div>
			    <div class="form-group">        
		            <label class="control-label col-sm-2">Date Admitted:</label>
		            <div clas="col-sm-10">
					  <input type="text" value="<?php echo date("Y-m-d"); ?>" name="date_admitted" readonly>			          
			        </div>
			    </div>
			    <div class="form-group">        
			        <label class="control-label col-sm-2">Date Released:</label>
			        <div class="col-sm-10">
					  <input type="text" name="date_released" value="****-**-**" readonly />
					</div>  
			    </div>
			    <div class="form-group">        
			        <label class="control-label col-sm-2">Status:</label>
			        <div class="col-sm-10">
					  <input type="text" name="status" value="pending" readonly>
			        </div>
			    </div>			    			    
			    <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
					<input type="submit" role="button" class="btn btn-primary" value="Add File Status" />
			      </div>
			    </div>  
			</form>
		</div>	
	</div>
</div>		