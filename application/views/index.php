<?php 
include("logo.php");
?>
<link rel="stylesheet" type="text/css" href=<?php echo $bootstrap; ?>>
<link rel="stylesheet" type="text/css" href=<?php echo $css; ?>>
<body style="background: #F5F5DC;" id="bdy">
<script type="text/javascript" src=<?php echo $jquery; ?>></script>	
<script type="text/javascript" src=<?php echo $bootstrap_js; ?>></script>	
<!-- 
Student inputs student number,password and logs in
-->
<script type="text/javascript">
	function adjust(){
		document.getElementById("logo").classList.add("img-rounded img-responsive");
	}
	window.load=adjust;
</script>
<div class="container-fluid">
		<?php include("nav.php"); ?>
		<div class="pull-right">
			<ul class="nav nav-pills">
			<!-- <li class="active"><a href="#" onclick="javascript:show_login();"><span class="glyphicon glyphicon-cog"></span>&nbsp;Login</a></li> -->
			</ul>
		</div>


	<div style="padding-left: 200px;display:block;" id='student'>
		<div class='col-md-10'>
		<div class="panel panel-info" >
			<div class="panel-heading">
				<center><h4 class="text-success">Evoting System</h4></center>
				<?php echo $message; ?>
			</div>
			<div class="panel-body">
				<form action=<?php echo $base.'evote/login'; ?> method="POST" class="form-horizontal" >
					<div class="form-group">
					<label class="col-md-2" for="stdno">Student Number:</label>
					<div class="col-md-7">
					<input type="number" name="stdno" id="stdno" placeholder="Type Student Number Here..." required="required" class="form-control">
					<i class="text-danger"><span class="glyphicon glyphicon-asterisk"></span>Only Numbers Are Valid in this Field</i>
					</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="pwd">Password:</label>
						<div class="col-md-7">
						<input type="password" name="pwd" id="pwd" placeholder="******" required="required" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2">&nbsp;</label>
						<div class="col-md-7">
						<input type="submit" name="submit" class="btn btn-success btn-block" value="Login">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
<!-- <div style="padding-left: 200px;display:none;" id='admin'>	
	<div style="display: block;background: lightblue;">
		<div class="col-md-9 panel panel-primary" style="background: lightblue;">
			<h4 class="text-danger"><span class="glyphicon glyphicon-warning"></span>Only Authorised Staff Allowed.</h4>
			<div class="panel-heading">
				<center><h4 class="panel-title">Login<span class="glyphicon glyphicon-cog"></span></h4></center>
				<div  style="padding-bottom: 20px;padding-left: 7px;">
					<div class="pull-right">
						<a href='#' onclick="javascript:hide_login();"><img src=<?php echo $images.'close.png'; ?> alt="Close" width="30" height="30"></a>
					</div>
				</div>
			</div>
			<div class="panel-body" style=" background: lightblue;">
				<form action=<?php echo $base.'evote/admin_login'; ?> method="POST" class='form-horizontal'>
				<div class="form-group">
					<label class="col-md-2" for='usr'>Username:</label>
					<div class="col-md-7">
						<input type="text" name="username" class="form-control" placeholder="Type Username Here..." id='usr'>
					</div>
				</div>
				<div class="form-group">
					<label for='pass' class="col-md-2">Password:</label>
					<div class="col-md-7">
						<input type="password" name="password" class="form-control" id='pass' >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">&nbsp;</label>
					<div class="col-md-7">
						<input type="submit" name="submit" class="btn btn-primary btn-block" >
					</div>
				</div>	
				</form>
			</div>
		</div>
	</div>
</div> -->
</div>
<script type="text/javascript" src=<?php echo $scripts.'evote.js'; ?>></script>
</body>
</html>