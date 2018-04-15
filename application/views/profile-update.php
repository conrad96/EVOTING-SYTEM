<link rel="stylesheet" type="text/css" href=<?php echo $bootstrap; ?>>
<link rel="stylesheet" type="text/css" href=<?php echo $css; ?>>
<body style="background: #F5F5DC;">
<?php 
include("logo.php");
?>
<script type="text/javascript" src=<?php echo $jquery; ?>></script>	
<script type="text/javascript" src=<?php echo $bootstrap_js; ?>></script>		<div class="container-fluid">
		<?php include("nav-std-p.php"); ?>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4 class="panel-title">View Profile</h4>
	<?php 
if(isset($error))
echo $error; 
	?>
		</div>
		<div class="panel-body">
<?php //print_r($profile);	?>
		<ul class="list-group">
			<?php 
			foreach($profile as $r){
echo "<li class='list-group-item'><b class='text-success'>Student Number:</b>&nbsp;&nbsp;&nbsp;".$r->student_number."</li>";				
echo "<li class='list-group-item'><b class='text-success'>Names</b>:&nbsp;&nbsp;".$r->full_names."</li>";				
echo "<li class='list-group-item'><b class='text-success'>Faculty:</b>&nbsp;&nbsp;".$r->faculty."</li>";				
echo "<li class='list-group-item'><b class='text-success'>Course:</b>&nbsp;&nbsp;".$r->course."</li>";						
echo "<li class='list-group-item'><b class='text-success'>Password:</b>&nbsp;&nbsp;".$r->password."</li>";
echo "<a onclick='javascript:passwordChange();'>Click Here to Change Password</a>";
		}
			?>
		</ul>
		</div>
	</div>
	<div  class="col-md-6" style="display:none;" id="chnge">
		<form action=<?php echo $base.'evote/updateStudent/'.$sid; ?> method="POST" class="form-horizontal">
			<h5 class="text-success">Change Password Below</h5>
			<div class="form-group">
				<label class="col-md-2">Password:</label><p>
				<div class="col-md-4"><input type="password" name="pwd1" class="form-control" >	</div>
			</div>
			<div class="form-group">
				<label class="col-md-2">Confirm Password:</label><p>
				<div class="col-md-4"><input type="password" name="pwd2" class="form-control" >	</div>
			</div>
			<div class="form-group">
				<label class="col-md-2">&nbsp;</label><p>
				<div class="col-md-4"><input type="submit" class="btn btn-success btn-block" value="Change Password" ></div>
			</div>

		</form>
	</div>	
</div>
<script type="text/javascript" src=<?php echo $scripts.'evote.js'; ?>></script>
</body>
</html>