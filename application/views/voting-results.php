<link rel="stylesheet" type="text/css" href=<?php echo $bootstrap; ?>>
<link rel="stylesheet" type="text/css" href=<?php echo $css; ?>>
<body style="background: #F5F5DC;">
<?php 
include("logo.php");
?>
<script type="text/javascript" src=<?php echo $jquery; ?>></script>	
<script type="text/javascript" src=<?php echo $bootstrap_js; ?>></script>		<div class="container-fluid">
		<?php include("nav-std.php"); ?>
<h4 class="text-success">Welcome <i class="text-danger"><?php echo $names; ?></i></h4>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h4 class="panel-title"><?php if(isset($message))
									echo $message; else echo "<h4 class='text-success'>Voting Results:</h4>" ?>
		</h4>							
	</div>
	<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Guild President Ballot Results</h4>
				</center>
								<h4 class="text-success">Leading Candidate:
<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesGuild))
			foreach ($votesGuild as $r) {
				echo "<i class='text-warning'>".$r->full_names."</i>";
				break;
			}
		else{
			echo "None";
		}		
	?> </h4>	
			</div>
		<div class="panel-body">
		<?php 
		//display all cAndidates And their respectve votes
		if(!empty($votesGuild))
			foreach($votesGuild as $r){
				include("extension.php");
			} 
		else{
			echo "<center><h4 class='text-danger'>No Candidates Have Been Voted Yet In This Category</h4></center>";
		}
		?>
		</div>	
		</div>

	<div class="panel-body">
		<div class="panel panel-info">
			<div class="panel-heading">
				<center><h4 class="panel-title"><b class="text-warning"><?php echo $faculty_name; ?></b><div class='pull-right'>Faculty Candidates Ballot Results</div></h4></center>
											<h4 class="text-success">Leading Candidate:
<?php 
	/*Get The First Name of the Array*/
		if(!empty($faculty))
			foreach ($faculty as $r) {
				echo "<i class='text-warning'>".$r->full_names."</i>";
				break;
			}
		else{
			echo "None";
		}		
	?> </h4>	
	
			</div>
			<div class="panel-body">
				<?php 
		//display all cAndidates And their respectve votes
		//print_r($faculty);
		if(!empty($faculty))
			foreach($faculty as $r){
				include("extension.php");
			} 
		else{
			echo "<center><h4 class='text-danger'>No Candidates Have Been Voted Yet In This Category</h4></center>";
		}
		?>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src=<?php echo $scripts.'evote.js'; ?>></script>
</body>
</html>