<link rel="stylesheet" type="text/css" href=<?php echo $bootstrap; ?>>
<link rel="stylesheet" type="text/css" href=<?php echo $css; ?>>
<body style="background: #F5F5DC;">
<?php 
include("logo.php");
?>
<script type="text/javascript" src=<?php echo $jquery; ?>></script>	
<script type="text/javascript" src=<?php echo $bootstrap_js; ?>></script>		<!-- 
This page displays, candidates to be voted, faculties and halls of residence
==============================================================================
-display candidates from the same faculty ,Hall 
-display photo's of candidates nd tick for vote after he/she's photo disappears
-checkers for only one vote per category
-after process displays page with all voted candidates and proceed to signout 
==>on successfull signout NO loggin in Again
	-->
<div class="container-fluid">
		<?php include("nav-std.php"); ?>
<h4 class="text-success">Welcome <i class="text-danger"><?php echo $names; ?></i></h4>
<div class="panel panel-info">
	<div class="panel-heading">
		<center><h4 class="panel-title">Guild President</h4>
<?php if(isset($msg_g))
		echo $msg_g;
	 ?>
		</center>
	</div>
	<div class="panel-body">
	<!-- Display Guild president candidates-->
	<?php 
	if(isset($guild))
		 foreach($guild as $row){
		echo "<div class='col-md-3' id='".$row->student_number."'>";
		echo "<form action='".$base.'evote/vote_guild'."' method='POST'>";
		echo "<img src='".$row->photo."' class='img-responsive img-rounded' alt='Candidate' width='300' height='200' />";
		echo "<b class='text-success'>Names:</b>&nbsp;&nbsp;&nbsp;<span id='names_g_".$row->student_number."'>".$row->full_names."</span>";
		echo "<hr />";
		echo "<b class='text-success'>Post:</b>&nbsp;&nbsp;&nbsp;".$row->position.'<hr />';
		echo "<button class='btn btn-success btn-block' onclick='javascript:vote_guild(".$row->student_number.");'>Vote</button>&nbsp;&nbsp;&nbsp;";
		echo "<input type='hidden' id='candidate_number' value='".$row->student_number."' name='vote_gcandidate' />";
		echo "<input type='hidden'  value='".$sid."' name='vote_gstudent' />";
		echo "<input type='hidden'  value='".$stdno."'  name='v_gsnumber' />";
		echo "</form>";
		echo "</div>";
		}//end foreach 
		
			?>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title">Faculty Candidates:<center><b class="text-danger"><?php echo $faculty_name; ?></b></center></h4>
	<p><?php if(isset($msg)){ echo $msg; }else{echo ""; }  ?>
	</div>
	<div class="panel-body">
	<?php 
		foreach($faculty as $row){
		echo "<div class='col-md-3' id='".$row->student_number."'>";
		echo "<form action='".$base.'evote/vote_faculty'."' method='POST'>";
		echo "<img src='".$row->photo."' class='img-responsive img-rounded' alt='Candidate' width='300' height='200' />";
		echo "<b class='text-success'>Names:</b>&nbsp;&nbsp;&nbsp;<span id='names_f_".$row->student_number."'>".$row->full_names."</span>";
		echo "<hr />";
		echo "<b class='text-success'>Post:</b>&nbsp;&nbsp;&nbsp;".$row->position.'<hr />';
		echo "<button class='btn btn-success btn-block' onclick='javascript:vote_faculty(".$row->student_number.");'>Vote</button>&nbsp;&nbsp;&nbsp;";
		echo "<input type='hidden' id='candidate_number' value='".$row->student_number."' name='vote_candidate' />";
		echo "<input type='hidden'  value='".$sid."' name='vote_student' />";
		echo "<input type='hidden'  value='".$stdno."'  name='v_snumber' />";
		echo "</form>";
		echo "</div>";
		}
	?>	
	</div>
</div>

</div>
<script type="text/javascript" src=<?php echo $scripts.'evote.js'; ?>></script>
</body>
</html>