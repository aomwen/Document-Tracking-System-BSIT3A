<head>
	<link href="<?php echo base_url('assets/css/guide.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div class="offices col-md-9">
	<div class="panel-heading" id="head">
	    <ol class="breadcrumb pull-right">
	      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
	      <li class="active">Guide</li>
	    </ol>    
	    <h3><span class="glyphicon glyphicon-book"></span> Guide</h3>       
	</div>
	<div class="panel panel-default">		
		<div class="panel-body">
			<h3>Here are some guides on how to use the document tracking system:</h3>
			<button class="accordion">How do I track a document?</button>
			<div class="panel" id="panel">
			  <p>
			  	<ol>
			  		<li>On the homepage, enter the track # of the document you wish to track.</li>
			  		<li>A small window will appear that will display the information of the document based on the track # you entered.</li>
			  	</ol>
			  </p>
			</div>
			<button class="accordion">How do I send a comment?</button>
			<div class="panel" id="panel">
			  <p>
			  	<ol>
			  		<li>On the homepage, you can either click on the contact on the upper right side of the screen to move you to the contact section where you can contact the admin, or you can scroll down to the bottom of the page until you reach the contact section.</li>
			  		<li>Type your name and email address.</li>
			  		<li>Type your comments, suggestions, or clarifications.</li>
			  		<li>Click the send button.</li>
			  	</ol>
			  </p>
			</div>
			<button class="accordion">How do I send a file?</button>
			<div class="panel" id="panel">
				<p>
					<ol>
						<li>Log in to your account.</li>
						<li>Click the compose button on the menu on the left side of the screen.</li>
						<li>Type the name of the receiver of the file.<br />NOTE: The receiver must have an account for him/her to view your message.</li>
						<li>Type the subject of the file.</li>
						<li>Type the name of the file.</li>
						<li>Choose the file you wish to send.</li>
						<li>Click the send button.</li>
					</ol>
					It is important to remember the track # of your document for easy tracking.
				</p>
			</div>
			<button class="accordion">Where can I see the status of my documents?</button>
			<div class="panel" id="panel">
				<p>
					<ol>
						<li>Log in to your account.</li>
						<li>Click the Document Status button on the menu on the left side of the screen.</li>
					</ol>
				</p>
			</div>	
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