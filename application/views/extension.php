<?php 
echo "
		<div class='col-md-3'>	
		<img src='".$r->photo."' width='150' height='100' class='img-responsive img-rounded img-thumbnail' />
		<ul class='list-group'>
<li class='list-group-item'><b class='text-success'>Names:</b>".$r->full_names."</li>
<li class='list-group-item'><b class='text-success'>Position:</b>".$r->position."</li>
<li class='list-group-item'><b class='text-success'>Votes:</b>".$r->votes."</li>
		</ul>
<table>
<tr>
<td>
<button href='#'  onclick='readmore(".$r->student_number.");' class='btn btn-warning'><span class='glyphicon glyphicon-plus'></span>Read More</button></td>
<td>
<a  id='blind_".$r->student_number."' style='display:none' onclick='javascript:hide(".$r->student_number.");'><span class='glyphicon glyphicon-minus-sign'></span></a>
</td>
</tr>
</table>
		<hr />
		<div id='read_".$r->student_number."' style='display:none;' onclick='javascript:hide(".$r->student_number.");'>
 <ul class='list-group'>
 <li class='list-group-item'><b class='text-success'>Faculty:</b>".$r->faculty."</li>
 <li class='list-group-item'><b class='text-success'>Student Number:</b>".$r->student_number."</li>
<li class='list-group-item'><b class='text-success'>Course:</b>".$r->course."</li>
<li class='list-group-item'><b class='text-success'>Year Of Study:</b>".$r->yos."</li> 
 </ul>
		</div>
		
		</div>
			";
?>