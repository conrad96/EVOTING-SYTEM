/***
* Use Ajax calls to send data to method in controller to update fields for voting
***/
function passwordChange(){
	document.getElementById("chnge").style.display='block';
}
function vote_faculty(studentNumber){
var name_f=document.getElementById("names_f_"+studentNumber).innerHTML;	
alert("You Have Voted: "+name_f);
}
function vote_guild(studentNumber){
var name_g=document.getElementById("names_g_"+studentNumber).innerHTML;	
alert("You Have Voted: "+name_g);
}
function vote_hall(studentNumber){
var name_h=document.getElementById("names_h_"+studentNumber).innerHTML;	
alert("You Have Voted: "+name_h);
}
function show_login(){
	document.getElementById("student").style.display='none';
	document.getElementById("admin").style.display='block';
}
function hide_login(){
	document.getElementById("student").style.display='block';
	document.getElementById("admin").style.display='none';
}
/**
function to display readmore of candidates profile
*/
function readmore(studentNumber){
document.getElementById("read_"+studentNumber).style.display='block';
document.getElementById("blind_"+studentNumber).style.display='block';
 }
function hide(studentNumber){
document.getElementById("read_"+studentNumber).style.display='none';
}
function showStudents(){
	document.getElementById("student").style.display='block';
	document.getElementById("candidate").style.display='none';	
	document.getElementById("admin").style.display='none';
}
function showCandidates(){
	document.getElementById("candidate").style.display='block';
	document.getElementById("student").style.display='none';	
	document.getElementById("admin").style.display='none';
}
function showAdmin(){
	document.getElementById("student").style.display='none';
	document.getElementById("candidate").style.display='none';		
	document.getElementById("admin").style.display='block';
}
$(document).ready(function(){
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#photo').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#photoUpload").change(function() {
  readURL(this);
});

});