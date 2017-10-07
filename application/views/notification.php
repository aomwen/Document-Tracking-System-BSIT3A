<html>
<head>
	<title>Notification</title>
	<link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
	<script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			function load_unseen_notification(view = '')
			{
				$.ajax({
					url:"fetch.php",
					method:"POST",
					data:{view:view},
					dataType:"json",
					success:function(data)
					{
						$('.dropdown-menu').html(data.notification);
						if(data.unseen_notification > 0)
						{
							$('.count').html(data.unseen_notification);
						}
					}
				})
			}
			load_unseen_notification();
			$('#comment_form').on('submit', function(event){
				event.preventDefault();
				if($('#subject').val() != '' && $('#comment').val() != '')
				{
					var form_data = $(this).serialize();
					$.ajax({
						url:"insert.php",
						method:"POST",
						data:form_data,
						success:function(data)
						{
							$('#comment_form')[0].reset();
							load_unseen_notification();
						}
					})
				}
				else
				{
					alert("Both Fields are Required");
				}
			});
			$(document).on('click', '.dropdown-toggle', function(){
				$('.count').html('');
				load_unseen_notification('yes');
			})
			setInterval(function(){
				load_unseen_notification();
			}, 5000);
		});
	</script>
</head>
<body>
	<br /><br />
	<div class="container">
		<br />
		<h2 align="center">Notification Sample</h2>
		<br />
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
		    	<div class="navbar-header">
		      		<a class="navbar-brand" href="#">WebSiteName</a>
		    	</div>
		    	<ul class="nav navbar-nav navbar-right">
		      		<li class="dropdown">
		      			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> Notification</a>
		      			<ul class="dropdown-menu"></ul>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<br />
		<form method="post" id="comment_form">
			<div class="form-group">
				<label>Enter Subject</label>
				<input type="text" name="subject" id="subject" class="form-control" />
			</div>
			<div class="form-group">
				<label>Enter Comment</label>
				<textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
			</div>
		</form>
	</div>
</body>
</html>