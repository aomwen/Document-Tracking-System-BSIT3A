<div class="col-sm-9 pull-right">

	<div class="panel panel-default">
		<div class="panel-heading text-center"> Offices	</div>
		<div class="panel-body">
			<?php
				foreach($colleges as $col){
					echo'
					<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
						<a href="'.base_url('Dts/office_content/'.$col['college_acronym']).'" style="text-decoration: none;">
						<div style="color: black">
							<img class="img-responsive text-center" src="'.$col['college_logopath'].'" style=" height: 150px;  margin-top: 10px; border-radius: 90%;">
							<hr style="width:80%;"  />
					'.$col['college_desc'].'<br />
						</div>
						</a>
						<a href="'.base_url('Dts/office_ud/'.$col['college_acronym']).'"><span class="glyphicon glyphicon-edit"></span></a>
						<span class="glyphicon glyphicon-remove-sign" style="color: white">
						</span></div>
					</div>';
				}
			?>
		</div>	
	</div>	
</div>	