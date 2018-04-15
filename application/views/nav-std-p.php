  <div class="nav" style="background: #F5F5DC;">
	<ul class="nav nav-tabs">
		<li class="active"><a href=<?php 
foreach($stdno as $r){
	echo $base.'evote/student/'.$r->student_number;
}
		 ?>><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
	</ul>
</div> 
<div class="pull-right">
	<ul class="nav nav-pills">
	<li class="active"><a href=<?php echo $base.'evote/logoutvoter/'.$sid; ?>><span class="glyphicon glyphicon-eye-close"></span>&nbsp;LogOut</a></li>
	</ul>
</div>

