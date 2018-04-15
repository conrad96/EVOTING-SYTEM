<!DOCTYPE html>
<html>
<head>
	<title>Evote|admin</title>
<link rel="stylesheet" type="text/css" href=<?php echo $bootstrap; ?>>
<link rel="stylesheet" type="text/css" href=<?php echo $css; ?>>
</head>
<body style="background: #F5F5DC;">

<script type="text/javascript" src=<?php echo $jquery; ?>></script>	
<script type="text/javascript" src=<?php echo $bootstrap_js; ?>></script>
<div class="container-fluid">
<?php include("logo.php"); ?>
<?php include("nav-admin.php"); ?>
<h4>Welcome <i class="text-danger"><?php echo $admin_name; ?></i></h4>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h4 class="panel-title">All Candidates</h4>
	</div>
	<div class="panel-body">
		<?php 
	foreach($candidates as $row){
		echo "<div class='col-md-3'>
		<img src='".$row->photo."' class='img-responsive img-rounded img-thumbnail' style='width:250px;height:200px;' />
		<ul class='list-group'>
<li class='list-group-item'><b class='text-success'>Names:</b>".$row->full_names."</li>
<li class='list-group-item'><b class='text-success'>Faculty:</b>".$row->faculty."</li>
<li class='list-group-item'><b class='text-success'>Position:</b>".$row->position."</li>
<li class='list-group-item'></li>
		</ul>
		</div>";
	}
		?>
	</div>
</div>
<div class="panel panel-warning">
	<div class="panel-heading">
		<center><h4 class="panel-title"><i class="text-success">Valid Voters</i></h4></center>
	</div>
	<div class="panel-body">
		<?php 
	foreach($students as $row){
	echo "<div class='col-md-3'>
		<ul class='list-group'>
<li class='list-group-item'><b class='text-success'>Student Number:</b>&nbsp;".$row->student_number."</li>	
<li class='list-group-item'><b class='text-success'>Names:</b>&nbsp;".$row->full_names."</li>
<li class='list-group-item'><b class='text-success'>Faculty:</b>&nbsp;".$row->faculty."</li>
		</ul>
		</div>";
	}
		?>	
	</div>
</div>
<div class="panel panel-warning">
	<div class="panel-heading">
		<center><h4 class="panel-title"><i class="text-success">Administrators</i></h4></center>
	</div>
	<div class="panel-body">
		<?php 
	foreach($admins as $row){
	echo "<div class='col-md-3'>
		<ul class='list-group'>
<li class='list-group-item'><b class='text-success'>Username:</b>&nbsp;".$row->username."</li>	
<li class='list-group-item'><b class='text-success'>Names:</b>&nbsp;".$row->full_names."</li>
		</ul>
		</div>";
	}
		?>	
	</div>
</div>
</div>
</body>
</html>