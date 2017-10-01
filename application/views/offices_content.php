<style>
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
#collapse a{
	text-decoration: none;
}

</style>	
<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php foreach($collegefull as $s){echo $s['collegefull'];}?>
		</div>
		<div class="panel-body">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<?php
					foreach($departments as $d){
						$dept = str_ireplace(' ','-',$d['department']);
						echo'
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion"  data-target="#'.$dept.'" href="#'.$d['department'].'">'.$d['department'].'</a>
							</h4>
						</div>
						<div class="collapse" id="'.$dept.'">
								<div class="panel-body">'.$d['department_head'].'<b>(head)</b>
								</div>
								<div class="panel-body">';
						foreach($users as $us){
							if($us['department'] == $d['department']){
							echo $us['full_name'] ;
						
							}
							echo '
								</div>
						</div>';
						}
					}
					?>
				</div>
			</div>
		</div>	

	</div>
