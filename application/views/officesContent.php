<head>
	<link href="<?php echo base_url('assets/css/guide.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php foreach($colleges as $s){
				echo '<h3>'.$s['collegefull'].'</h3>';
			}?>
		</div>
		<div class="panel-body">
			<?php
			$thereis=false;
			foreach($departments as $d){
				$dept = str_ireplace(' ','-',$d['department']);
				echo'
				<button class="accordion">'.$d['department'].'</button>
				<div class="panel" id="panel">
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