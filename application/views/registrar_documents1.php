<style>
	.formstyle label{
		font-size:16px;
	}
	.formstyle input{
		border-radius:5px;
		margin-bottom: 10px;

	}
	.tbl1{
		margin-top:20px;
		padding:20px;
		text-align:center;
		font-size: 18px;
	}
	.tbl1 th{
		text-align: center;
		padding:5px;
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
	.searchbar{
		display:inline-flex;
		height: 35px;
	}
	.search{
		width:400px;
		margin-left: 15px;
	}
	.docstatus{
		font-size: 16px;
		line-height: 25px;
	}
	.docstatus tr th,td{
		text-align: center;
		padding:10px;
	}	
	.addfile-btn{
		margin-right: 2%;
		padding:1%;
	}
</style>	
<div class="myinbox col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Manage Registrar Status</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Manage Registrar Status</h3>       
		</div>
		<div class="panel-body">
			<div class="col-sm-5">
			<form class="pull-left searchbar" method="POST" action="<?php echo base_url('DocumentStatus/mydocuments_view')?>">	
				<input type="text" placeholder="Search..." name="tracknumber" class="search"/>
				<button type="submit" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>
			</form>
			</div>
			<div class="col-sm-4 pull-right">		
			<a href="<?php echo base_url('ManageRegistrarDocu/registrar_add'); ?>" role="button" class="btn btn-primary">ADD FILES</a>	
			</div>	
		</div>			
		<div class="panel-body1">	
		<div class="tbl1">
			<table class="docstatus table-bordered text-center table-responsive table-striped" width="100%">
				<thead>
					<th>Track #</th>
					<th>File type</th>
					<th>Date Admitted</th>
					<th>Date Received</th>
					<th>Status</th>
					<th>Update Status</th>
				</thead>
				<tbody>
				<?php
					foreach($documents_status as $d){
						echo '	<tr>	
									<td>'.$d['trackcode'].'</td>
									<td>'.$d['file_type'].'</td>
									<td>'.$d['date_admitted'].'</td>
									<td>'.$d['date_released'].'</td>
									<td>'.$d['status'].'</td>
									<td><a href="'.base_url('ManageRegistrarDocu/registrar_update/'.$d['trackcode']).'/On going" class="btn btn-danger">On going</a>&nbsp;<a href="'.base_url('ManageRegistrarDocu/registrar_update/'.$d['trackcode']).'/Complete" class="btn btn-primary">Complete</a>&nbsp;<a href="'.base_url('ManageRegistrarDocu/registrar_update/'.$d['trackcode']).'/Received" class="btn btn-success">Received</a></td>
								</tr>
								';
					}
				?>

				</tbody>
			</table>
		</div>
	</div>
</div>	