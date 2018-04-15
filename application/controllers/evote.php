<?php 
class Evote extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function assets(){
		$data['base']=$this->config->item("base_url");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['css']=$this->config->item("css");
		$data['images']=$this->config->item("images");
		$data['scripts']=$this->config->item("scripts");
		$data['jquery']=$this->config->item("jquery");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['bootstrap_js']=$this->config->item("bootstrap_js");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['message']="";
		return $data;
	}
	public function index(){
		$this->load->view("index",$this->assets());
	}
	public function profileS($sid){
$this->load->model("Operations");
//$this->Operations->updateS($sid);
$data['base']=$this->config->item("base_url");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['css']=$this->config->item("css");
		$data['images']=$this->config->item("images");
		$data['scripts']=$this->config->item("scripts");
		$data['jquery']=$this->config->item("jquery");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['bootstrap_js']=$this->config->item("bootstrap_js");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['sid']=$sid;
		$data['profile']=$this->getS($sid);
		$data['stdno']=$this->Operations->getStdno($sid);
		$this->load->view("profile-update",$data);	
	}
	public function regA($id,$name){
		if($this->input->post('pwd1') == $this->input->post("pwd2")){
		$fullNames=$this->input->post("fullNames");
		$username=$this->input->post("username"); 
		$password=$this->input->post("pwd2");
		$profile=array($fullNames,$username,$password);
		$this->load->model("Operations");
		$row=$this->Operations->regA($profile);
		if($row>0){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-danger'>Administrator Registered Successfully</h4>";	
			$data['admin_name']=$name;
			$data['id']=$id;
			$this->load->view("registerCandidate",$data);	
		}
	}else{
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-danger'>Password Mismatch ,Please Try Again</h4>";	
			$data['admin_name']=$name;
			$data['id']=$id;
			$this->load->view("registerCandidate",$data);
	}

	}
	public function updateStudent($sid){
		if($this->input->post("pwd1")!=$this->input->post("pwd2")){
				$this->load->model("Operations");
//$this->Operations->updateS($sid);
$data['base']=$this->config->item("base_url");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['css']=$this->config->item("css");
		$data['images']=$this->config->item("images");
		$data['scripts']=$this->config->item("scripts");
		$data['jquery']=$this->config->item("jquery");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['bootstrap_js']=$this->config->item("bootstrap_js");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['sid']=$sid;
	$data['error']="<h4 class='text-danger'>Password Mismatch, Please Try Again</h4>";
		$data['profile']=$this->getS($sid);
		$data['stdno']=$this->Operations->getStdno($sid);
		$this->load->view("profile-update",$data);		
		}else{
			$password=$this->input->post("pwd2");
			$this->load->model("Operations");
//$this->Operations->updateS($sid);
			$ret=$this->Operations->updateS($sid,$password);
			if($ret==1){
		$data['base']=$this->config->item("base_url");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['css']=$this->config->item("css");
		$data['images']=$this->config->item("images");
		$data['scripts']=$this->config->item("scripts");
		$data['jquery']=$this->config->item("jquery");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['bootstrap_js']=$this->config->item("bootstrap_js");
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['sid']=$sid;
		$data['error']="";
	$data['error']="<h4 class='text-success'>Password Changed Successfully</h4>";
		$data['profile']=$this->getS($sid);
		$data['stdno']=$this->Operations->getStdno($sid);
			}else{
	$data['error']="<h4 class='text-success'>An Error Occured When Changing Password ,Please Try Again</h4>";
			}
		$this->load->view("profile-update",$data);				
		}
	}
	public function getS($sid){
		$this->load->model("Operations");
		$result=$this->Operations->getStudnt($sid);
		return $result;
	}
	public function login(){
		$data=array();
		$stdno=$this->input->post("stdno");
		$pwd=$this->input->post("pwd");
		$this->load->model("Operations");
		$row=$this->Operations->login($stdno,$pwd);
		$bool=$this->Operations->loginCheck($stdno,$pwd);
		if($bool){
foreach($row as $r){
$data['base']=$this->config->item("base_url");
$data['bootstrap']=$this->config->item("bootstrap");
$data['css']=$this->config->item("css");
$data['images']=$this->config->item("images");
$data['scripts']=$this->config->item("scripts");
$data['jquery']=$this->config->item("jquery");
$data['bootstrap']=$this->config->item("bootstrap");
$data['bootstrap_js']=$this->config->item("bootstrap_js");
$data['bootstrap']=$this->config->item("bootstrap");
$data['message']="<h5 class='alert alert-danger'>It Seems You Already Voted, This Exercise Is Done Once But You Can Only View Ballot Results</h5>";
$data['names']=$r->full_names;
$data['sid']=$r->sid;
$data['stdno']=$r->student_number;
//$data['faculty']=$this->Operations->filter_faculty($r->faculty,$r->sid);
$data['faculty']=$this->Operations->facultyCandidateDetails($r->faculty);
$data['faculty_name']=$r->faculty;
$data['votesGuild']=$this->Operations->candidatesDetails(7);
}//end foreach
		$this->load->view("voting-results",$data);
		}//end if $bool already voted
	else{
		if(!empty($row)){
			foreach($row as $r){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");	
			$data['names']=$r->full_names;
			$data['sid']=$r->sid;
			$data['stdno']=$r->student_number;
	$data['faculty']=$this->Operations->filter_faculty($r->faculty,$r->sid);
	$notification=$this->Operations->filter_faculty($r->faculty,$r->sid);
	$not=$this->Operations->guild($r->sid);
	$data['guild']=$this->Operations->guild($r->sid);
	$data['msg_g']="";
	if(empty($not)){
$data['msg_g']="<center><b class='text-warning'>No Candidates To Vote</b></center>";
unset($data['guild']);
	}		
			$data['msg']="";
		if(empty($notification)){
		$data['msg']="<center><b class='text-warning'>No Candidates To Vote</b></center>";
		}
			
			$data['faculty_name']=$r->faculty;
			$this->load->view("voting",$data);
			}
		}else{
			$admin=$this->admin_login($stdno,$pwd);
			if(!empty($admin)){ 
				$arr=$admin;
				$this->admin($arr[0],$arr[1]);
			}
			else{$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");	
			$data['message']="<h4 class='text-danger'>Incorrect Student ID Number Or Password, Please Try Again Later</h4>";
			$this->load->view("index",$data);
			}
			
		}//end else

	}//end else=>bool

	}//end login
	/***
	* Method that updates the Vote Fields after  a student votes
	***/
	public function student($studentNumber){
			$this->load->model("Operations");
			$row=$this->Operations->getDetails($studentNumber);
		if($row)
		{	
			foreach($row as $r){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");	
			//
			$data['msg_h']="";
			$data['sid']=$r->sid;
			$data['names']=$r->full_names;
			$data['stdno']=$r->student_number;
			$data['faculty']=$this->Operations->filter_faculty($r->faculty,$r->sid);
			$notification=$this->Operations->filter_faculty($r->faculty,$r->sid);

			$data['msg']="";
			if(empty($notification)){
				$data['msg']="<center><b class='text-warning'>No Candidates To Vote</b></center>";	
			}
			$data['msg_g']="";
			$data['guild']=$this->Operations->guild($r->sid);
			$not=$this->Operations->guild($r->sid);
			if(empty($not)){
				$data['msg_g']="<center><b class='text-warning'>No Candidates To Vote</b></center>";
				unset($data['guild']);
			}
			$data['faculty_name']=$r->faculty;
			$this->load->view("voting",$data);
					}
		}
	}
	public function vote_faculty(){
	$candidate=$this->input->post("vote_candidate");
	$sid=$this->input->post("vote_student");
	$stdno=$this->input->post("v_snumber");
	$array=array($candidate,$stdno,$sid);
	$this->validate_vote('F',$array);
	}
	public function vote_guild(){
	$candidate=$this->input->post("vote_gcandidate");
	$sid=$this->input->post("vote_gstudent");
	$stdno=$this->input->post("v_gsnumber");
	$array=array($candidate,$stdno,$sid);
	$this->validate_vote(2,$array);	
	}
	/***
	* method to validate vote [vote once]
	-if category is faculty only one entry is required from a single user
	hall or faculty
	**/
	public function validate_vote($category,$array){
		switch($category){
			case 'F':
			//candidate number [0]
			//stdno [1]
			//sid [2]
			$candidate=$array[0];
			$stdno=$array[1];
			$sid=$array[2];
			$this->load->model("Operations");
			$val=$this->Operations->check('F',$sid,$candidate);
			if($val == 1){
				$this->student($stdno);
			}else{
				$this->load->model("Operations");
			$row=$this->Operations->getDetails($stdno);
		if($row)
		{	
			foreach($row as $r){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");	
			//
			$data['sid']=$r->sid;
			$data['names']=$r->full_names;
			$data['stdno']=$r->student_number;
			$data['faculty']=$this->Operations->filter_faculty($r->faculty,$r->sid);
			$notification=$this->Operations->filter_faculty($r->faculty,$r->sid);
			$data['msg']=$val;
			if(empty($notification)){
				$data['msg']="<center><b class='text-warning'>No Candidates To Vote</b></center>";
			}

			$data['msg_g']="";
			$data['guild']=$this->Operations->guild($r->sid);
			$not=$this->Operations->guild($r->sid);
			if(empty($not)){
				$data['msg_g']="<center><b class='text-warning'>No Candidates To Vote</b></center>";
				unset($data['guild']);
			}
			$data['faculty_name']=$r->faculty;
			$this->load->view("voting",$data);
					}
		}	

			}//end else
			break;
			case 2:
			//candidate number [0]
			//stdno [1]
			//sid [2]
			$candidate=$array[0];
			$stdno=$array[1];
			$sid=$array[2];
			$this->load->model("Operations");
			$val=$this->Operations->check('G',$sid,$candidate);
			if($val == 1){
				$this->student($stdno);
			}else{
				$this->load->model("Operations");
			$row=$this->Operations->getDetails($stdno);
		if($row)
		{	
			foreach($row as $r){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");	
			//
			$data['sid']=$r->sid;
			$data['names']=$r->full_names;
			$data['stdno']=$r->student_number;
			$data['faculty']=$this->Operations->filter_faculty($r->faculty,$r->sid);
			$notification=$this->Operations->filter_faculty($r->faculty,$r->sid);
			$data['msg']=$val;
			$data['msg_g']="";
			$data['guild']=$this->Operations->guild($r->sid);
			$not=$this->Operations->guild($r->sid);
			if(empty($not)){
				$data['msg_g']="<center><b class='text-warning'>No Candidates To Vote</b></center>";
				unset($data['guild']);
			}
			if(empty($notification)){
				$data['msg']="<center><b class='text-warning'>No Candidates To Vote</b></center>";
			}
			
			$data['faculty_name']=$r->faculty;
			$this->load->view("voting",$data);
					}
		}	

			}//end else
			break;
			default:
			return  "<h4 class='text-danger'>No Category Selected...</h4>";
			break;
		}
	}
	/***
	* method for logging in the admin 
	****/

	public function admin_login($no,$pwd){
		$this->load->model("Operations");
		$rows=$this->Operations->login_admin($no,$pwd);
		if(!empty($rows)){
		foreach($rows as $r){
			return array($r->aid,$r->full_names);			
			}
		}else{
			return false;	
		}
	}
	public function admin($id,$name){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$this->load->model("Operations");
			$data['id']=$id;
			$data['votesCommerce']=$this->Operations->candidatesDetails(1);
			$data['votesComputing']=$this->Operations->candidatesDetails(2);
			$data['votesEnt']=$this->Operations->candidatesDetails(3);
			$data['votesMngt']=$this->Operations->candidatesDetails(4);
			$data['votesMarktn']=$this->Operations->candidatesDetails(5);
			$data['votesGrad']=$this->Operations->candidatesDetails(6);
			$data['votesGuild']=$this->Operations->candidatesDetails(7);
			$this->load->view("admin",$data);
	}
	/***
	method to Register Candidate
	**/
	public function registerCandidate($id,$name){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="";
			$data['id']=$id;
			$this->load->view("registerCandidate",$data);
	}
	/**
method to get students Data
	*/
public function regS($id,$name){
	if($this->input->post('pwd')==$this->input->post("pwd2")){
		$stdno=$this->input->post("student_number");
		$fullNames=$this->input->post("names");
		$faculty=$this->input->post("faculty"); 
		// $hall =$this->input->post("hall");
		$yos=$this->input->post("yos");
		// $age=$this->input->post("age");
		$course=$this->input->post("course");
		$password=$this->input->post("pwd2");
		$profile=array($stdno,$fullNames,$faculty,$yos,$course,$password);
		$this->load->model("Operations");
		$result=$this->Operations->registerStudent($profile);
		if($result == 1 ){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-success'>Student Registered Successfully</h4>";
			$data['id']=$id;		
			$this->load->view("registerCandidate",$data);
		}//end if($result)
		else{
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-success'>An Error Occured When Registering Student, Please Try Again</h4>";
			$data['id']=$id;		
			$this->load->view("registerCandidate",$data);
		}//end else =>$result
	}//end if
else{
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-danger'>Password Mismatch ,Please Try Again</h4>";
			$data['id']=$id;
			$this->load->view("registerCandidate",$data);
	 	}//end else		
	}//end regS
	public function regC($id,$name){
	if($this->input->post('pwd') == $this->input->post("pwd2")){
		$stdno=$this->input->post("student_number");
		$fullNames=$this->input->post("names");
		$faculty=$this->input->post("faculty"); 
		// $hall =$this->input->post("hall");
		$yos=$this->input->post("yos");
		// $age=$this->input->post("age");
		$course=$this->input->post("course");
		$password=$this->input->post("pwd2");
		$profile=array($stdno,$fullNames,$faculty,$yos,$course,$password);
		//Array 2 More Candidate Details
		// $photo
		// $position
		// $studentNumber
		$data=array();
$photoData=$_FILES['photo']['tmp_name'];
$photoName=$_FILES['photo']['name'];
$photoType=$_FILES['photo']['type'];

$path= $_SERVER['DOCUMENT_ROOT'].'/projects/grace/assets/img/candidates/';
if($photoType != 'image/jpg' || $photoType != 'image/png'|| $photoType != 'image/gif')	{
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-success'>Invalid Photo File Format Only [Jpeg,Png,JPG,GIF] Allowed</h4>";
			$data['id']=$id;		
			}//end if =>image Type
	//candidate profile
			if(!move_uploaded_file($photoData,$path.$photoName)){
			$data['message']="<h4 class='text-danger'>Error Occured Uploading Photo, Please Try Again</h4>";
			}
$position=$this->input->post("position");		
$candidateNumber=$stdno;
$photoPath="http://localhost/projects/grace/assets/img/candidates/".$photoName;
	$profile2=array($candidateNumber,$photoPath,$position);	
		$this->load->model("Operations");
		$result=$this->Operations->registerCandidate($profile,$profile2);
		if($result >= 1 ){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-success'>Candidate Registered Successfully</h4>";
			$data['id']=$id;		
		}//end if($result)
		else{
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-success'>An Error Occured When Registering Candidate, Please Try Again</h4>";
			$data['id']=$id;		
		}//end else =>$result
		$this->load->view("registerCandidate",$data);
	}//end if
else{
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="<h4 class='text-danger'>Password Mismatch ,Please Try Again</h4>";
			$data['id']=$id;
			$this->load->view("registerCandidate",$data);
	 	}//end else		
	}//end regC
	/***
*	Method view the students accounts
	***/
	public function studentAccounts($id,$name){
			$data['base']=$this->config->item("base_url");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['css']=$this->config->item("css");
			$data['images']=$this->config->item("images");
			$data['scripts']=$this->config->item("scripts");
			$data['jquery']=$this->config->item("jquery");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['bootstrap_js']=$this->config->item("bootstrap_js");
			$data['bootstrap']=$this->config->item("bootstrap");
			$data['admin_name']=$name;
			$data['message']="";
			$data['id']=$id;
			//code for getting students data from the db
			$this->load->model("Operations");
			$data['candidates']=$this->Operations->candidates();
			$data['students']=$this->Operations->students();
			$data['admins']=$this->Operations->admins();
			$this->load->view("viewStudents",$data);
	}
	/**
	* Method that logs out student nd updates field to status to 1[voted]
	*/
	public function logoutVoter($id){
		$sid=$id;
		$this->load->model("Operations");
		$value=$this->Operations->logoutVoter($sid);
		if($value==1){
			$this->index();
		}else{
			$this->index();
		}
	}
	public function logout(){
		$this->index();
	}
}
?>