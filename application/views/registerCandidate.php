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
<!-- 
This page displays the cAndidates forms
-registeration of both student and candidate
-->
<h4>Welcome <i class="text-danger"><?php echo $admin_name; ?></i></h4>
<div class="panel panel-info">
	<div class="panel-heading">
		<center><h4 class="panel-title">Register Candidate Or Student Forms</h4>
<?php echo $message; ?>
		</center>
	</div>
	<div class="panel-body">
		<div class="col-md-2">
		<ul class="list-group">
			<li class="list-group-item"><a onclick='javascript:showStudents();'><span class="glyphicon glyphicon-user"></span>Register Student</a></li>
			<li class="list-group-item"><a onclick='javascript:showCandidates();'><span class="glyphicon glyphicon-ok"></span>Register Candidate</a></li>
			<li class="list-group-item"><a onclick='javascript:showAdmin();'><span class="glyphicon glyphicon-ok"></span>Register Admin</a></li>
			</ul>
		</div>
		<div class="col-md-9" id='student' style="display: none;">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<center><h5 class="panel-title">Register Student</h5></center>
				</div>
				<div class="panel-body">
				
				<form class="form-horizontal" action=<?php echo $base.'evote/regS/'.$id.'/'.$admin_name; ?> role="form" method="POST">
				<div class="form-group">
					<label class="col-md-2">Student Number:</label>
					<div class="col-md-7">
						<input type="text" name="student_number" class="form-control" placeholder="type Student Number Here...">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Full Names:</label>
					<div class="col-md-7">
						<input type="text" name="names" class="form-control" placeholder="type Student Full Names Here...">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Faculty:</label>
					<div class="col-md-7">
<select name="faculty" class="form-control">
	<option disabled="disabled" selected="selected" value="">--Choose Faculty--</option>
	<option>Faculty Of Commerce</option>
	<option>Faculty Of Computing And Management Science</option>
	<option>Faculty Of Entrepreneurship And Business Administration</option>
	<option>Faculty Of Management And Public Policy</option>
	<option>Faculty Of Marketing And Hospitality Management</option>
	<option>Faculty Of Graduate Studies And Research</option>
</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Year Of Study:</label>
					<div class="col-md-7">
						<select name="yos" class="form-control">
							<option selected="selected" disabled="disabled" value="">--Choose Year Of Study--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Course:</label>
					<div class="col-md-7">
						<input type="text" name="course" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Password:</label>
					<div class="col-md-7">
						<input type="password" name="pwd" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Confirm Password:</label>
					<div class="col-md-7">
						<input type="password" name="pwd2" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">&nbsp;</label>
					<div class="col-md-7">
						<input type="submit" name="submit" class="btn btn-warning btn-block" value="Register">
					</div>
				</div>
			</form>
				</div>
			</div>
		</div> <!--End  Student -->
		<div class="col-md-9" id='admin' style="display: none;">
			<div class="panel panel-warning">
			<div class="panel-heading">
					<center><h5 class="panel-title">Register Admin</h5></center>
			</div>
				<div class="panel-body">
				<form class="form-horizontal" action=<?php echo $base.'evote/regA/'.$id.'/'.$admin_name; ?> role="form" method="POST">
				<div class="form-group">
					<label class="col-md-2">Full Names:</label>
					<div class="col-md-7">
						<input type="text" name="fullNames" class="form-control" placeholder="Type Name of Administrator">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Username:</label>
					<div class="col-md-7">
						<input type="text" name="username" class="form-control" placeholder="Type UserName of Administrator">
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Password:</label>
					<div class="col-md-7">
						<input type="password" name="pwd1" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Confirm Password:</label>
					<div class="col-md-7">
						<input type="password" name="pwd2" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">&nbsp;</label>
					<div class="col-md-7">
						<input type="submit" name="submit" class="btn btn-success btn-block" >
					</div>
				</div>
				</form>
				</div>
			</div>
		</div> <!--End  Student -->
		<div class="col-md-10 panel panel-warning" id="candidate" style="display: none;">
			<div class="panel-heading">
				<center><h4 class="panel-title">Register Candidate</h4></center>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-9">
						<form class="form-horizontal" action=<?php echo $base.'evote/regC/'.$id.'/'.$admin_name; ?> role="form" method="POST" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="col-md-2">Passport Photo</label>
					<div class="col-md-7">
					<input type="file" name="photo" required="required" class="form-control" id="photoUpload">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Position:</label>
					<div class="col-md-7">
						<!-- <input type="text" name="position" class="form-control" placeholder="Aspiring Position..."> -->
				<select name="position" class="form-control">
					<option selected="selected" disabled="disabled">--Choose Position--</option>
						<option>Guild President</option>
						<option>GRC</option>
				</select>	
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Student Number:</label>
					<div class="col-md-7">
						<input type="text" name="student_number" class="form-control" placeholder="Type Student Number Here...">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Full Names:</label>
					<div class="col-md-7">
						<input type="text" name="names" class="form-control" placeholder="type Student Full Names Here...">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Faculty:</label>
					<div class="col-md-7">
<select name="faculty" class="form-control">
	<option disabled="disabled" selected="selected" value="">--Choose Faculty--</option>
	<option>Faculty Of Commerce</option>
	<option>Faculty Of Computing And Management Science</option>
	<option>Faculty Of Entrepreneurship And Business Administration</option>
	<option>Faculty Of Management And Public Policy</option>
	<option>Faculty Of Marketing And Hospitality Management</option>
	<option>Faculty Of Graduate Studies And Research</option>
</select>
					</div>
				</div>		
				<div class="form-group">
					<label class="col-md-2">Year Of Study:</label>
					<div class="col-md-7">
						<select name="yos" class="form-control">
							<option selected="selected" disabled="disabled" value="">--Choose Year Of Study--</option>
						<option value="1">1</option>
						<option value="2">2</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Course:</label>
					<div class="col-md-7">
						<input type="text" name="course" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Password:</label>
					<div class="col-md-7">
						<input type="password" name="pwd" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Confirm Password:</label>
					<div class="col-md-7">
						<input type="password" name="pwd2" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">&nbsp;</label>
					<div class="col-md-7">
						<input type="submit" name="submit" class="btn btn-warning btn-block" value="Register">
					</div>
				</div>
			</form>
					</div>
					<div class="col-md-3">
						<img src=<?php echo $images.'candidates/default.png'; ?> alt="Photo..." class="img-responsive img-rounded " id="photo" >
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src=<?php echo $scripts.'evote.js'; ?> ></script>
</body>
</html>