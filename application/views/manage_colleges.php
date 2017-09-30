<div class="docu col-sm-9 pull-right">
  <div class="panel panel-default">
    <div class="panel-heading text-center"> Offices	<a href="<?php echo base_url('AdminOffices/add_colleges'); ?>" class="btn btn-link pull-right" style="text-decoration: none; color:black;" >
	<span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd </a></div>
	<div class="panel-body">
		<?php
			foreach($colleges as $col){
				echo'
				<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
					<a href="'.base_url('AdminOffices/office_content/'.$col['college_acronym']).'" style="text-decoration: none;">
						<div style="color: black">
							<img class="img-responsive" src="'.$col['college_logopath'].'" style=" height: 150px;  margin: auto; border-radius: 90%;">
							<hr style="width:80%;"  />
							'.$col['college_desc'].'<br />
						</div>
					</a>
					<a href="'.base_url('AdminOffices/update_college/'.$col['college_acronym']).'"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="'.base_url('AdminOffices/remove_college/'.$col['college_acronym']).'"><span class="glyphicon glyphicon-remove-sign" style="color: black"></span></a>
				</div>';
			}
		?>
	</div>
</div>