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
This page displays the cAndidates details 
-faculty
-names
-post
-votes
[All inorder of Number of Votes]
-->
<h4>Welcome <i class="text-danger"><?php echo $admin_name; ?></i></h4>
<div class="col-md-12 panel-info">
	<div class="panel-heading">
		<center><h4 class="panel-title">Evoting Tally Updates</h4></center>
	</div>
	<div class="panel-body">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info">Guild President</h4></center>
			<h4 class="text-success">Leading Candidate:
	<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesGuild))
			foreach ($votesGuild as $r) {
				if($r->votes==0)
					echo "None";
				else{
				echo "<i class='text-warning'>".$r->full_names."</i>";	
				}
				break;
			}
		else{
			echo "None";
		}		
	?>

			</h4>
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
		<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info">Faculty Of Commerce</h4></center>
						<h4 class="text-success">Leading Candidate:
	<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesCommerce))
			foreach ($votesCommerce as $r) {
				if($r->votes==0)
					echo "None";
				else{
				echo "<i class='text-warning'>".$r->full_names."</i>";	
				}
				break;
			}
		else{
			echo "None";
		}		
	?>

			</h4>
			</div>
		<div class="panel-body">
		<?php 
		//display all cAndidates And their respectve votes
		if(!empty($votesCommerce))
			foreach($votesCommerce as $r){
				include("extension.php");
			} 
		else{
			echo "<center><h4 class='text-danger'>No Candidates Have Been Voted Yet In This Category</h4></center>";
		}
		?>
		</div>	
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info">Faculty Of Computing And Management Science</h4></center>
			<h4 class="text-success">Leading Candidate:
	<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesComputing)){
			foreach($votesComputing as $r){
			if($r->votes==0){ echo "None"; }
				else{
				echo "<i class='text-warning'>".$r->full_names."</i>";	
				}
				//break;
			}	
		}
		else{
			echo "None";
		}		
	?>
			</h4>
			</div>
			<div class="panel-body">
				<?php 
		//display all cAndidates And their respectve votes
		if(!empty($votesComputing))
		foreach($votesComputing as $r){
			include("extension.php");
		} 
		else{
			echo "<center><h4 class='text-danger'>No Candidates Have Been Voted Yet In This Category</h4></center>";
		}
		?>
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info">Faculty Of Entrepreneurship And Business Administration</h4></center>
			<h4 class="text-success">Leading Candidate:
	<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesEnt))
			foreach ($votesEnt as $r) {
				if($r->votes==0)
					echo "None";
				else{
				echo "<i class='text-warning'>".$r->full_names."</i>";	
				}
				break;
			}
		else{
			echo "None";
		}		
	?>
			</h4>
			</div>
			<div class="panel-body">
		<?php 
		//display all cAndidates And their respectve votes
		if(!empty($votesEnt))
		foreach($votesEnt as $r){
			include("extension.php");
		} 
		else{
			echo "<center><h4 class='text-danger'>No Candidates Have Been Voted Yet In This Category</h4></center>";
		}
		?>
			</div>
		</div>	
				<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info">Faculty Of Management And Public Policy</h4></center>
				<h4 class="text-success">Leading Candidate:
	<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesMngt))
			foreach ($votesMngt as $r) {
				if($r->votes==0)
					echo "None";
				else{
				echo "<i class='text-warning'>".$r->full_names."</i>";	
				}
				break;
			}
		else{
			echo "None";
		}		
	?>
			</h4>
			</div>
			<div class="panel-body">
		<?php 
		//display all cAndidates And their respectve votes
		if(!empty($votesMngt))
		foreach($votesMngt as $r){
			include("extension.php");
		} 
		else{
			echo "<center><h4 class='text-danger'>No Candidates Have Been Voted Yet In This Category</h4></center>";
		}
		?>
			</div>
		</div>
				<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info">Faculty Of Marketing And Hospitality Management</h4></center>
			<h4 class="text-success">Leading Candidate:
	<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesMarktn))
			foreach ($votesMarktn as $r) {
				if($r->votes==0)
					echo "None";
				else{
				echo "<i class='text-warning'>".$r->full_names."</i>";	
				}
				break;
			}
		else{
			echo "None";
		}		
	?>
			</h4>
			</div>
			<div class="panel-body">
				<?php 
		//display all cAndidates And their respectve votes
		if(!empty($votesMarktn))
		foreach($votesMarktn as $r){
			include("extension.php");
		} 
		else{
			echo "<center><h4 class='text-danger'>No Candidates Have Been Voted Yet In This Category</h4></center>";
		}
		?>
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<center><h4 class="text-info">Faculty of Graduate Studies And Research</h4></center>
				<h4 class="text-success">Leading Candidate:
	<?php 
	/*Get The First Name of the Array*/
		if(!empty($votesGrad))
			foreach ($votesGrad as $r) {
				if($r->votes==0)
					echo "None";
				else{
				echo "<i class='text-warning'>".$r->full_names."</i>";	
				}
				break;
			}
		else{
			echo "None";
		}	
	?>
			</h4>
			</div>
			<div class="panel-body">
				<?php 
		//display all cAndidates And their respectve votes
		if(!empty($votesGrad))
		foreach($votesGrad as $r){
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
<script type="text/javascript" src=<?php echo $scripts.'evote.js'; ?> ></script>
</body>
</html>