<?php 
class Operations extends CI_Model{
	public function index(){
		parent::__construct();	
		$this->load->database();
	}
	public function __construct(){
		$this->load->database();
	}
	public function login($stdno,$password){
		$this->db->select("*");
		$this->db->where("student_number",$stdno);
		$this->db->where("password",$password);
		$this->db->from("students");
		$query=$this->db->get();
		return $query->result();
	}
	public function regA($array){
		$fullNames=$array[0];
		$username=$array[1];
		$password=$array[2];
		$data['full_names']=$fullNames;
		$data['username']=$username;
		$data['password']=$password;
		$this->db->insert("admin",$data);
		if($this->affected_rows()>0){
			return $this->affected_rows();
		}else{
			return false;
		}
	}
	/*method for displayin admins*/
public function admins(){
$this->db->select("*");
$this->db->from("admin");
$query=$this->db->get();
return $query->result();
	}
	/**
	* independenlty checks for students who hve already voted
	***/
	public function loginCheck($stdno,$password){
		$query=$this->db->query("SELECT * FROM students WHERE student_number='$stdno'  AND password='$password' AND status=1 ");
		$rows=$query->num_rows();
		if($rows == 1){ return true; }else{ return false; }
	}
	public function login_admin($no,$password){
		$this->db->select("*");
		$this->db->where("aid",$no);
		$this->db->where("password",$password);
		$this->db->from("admin");
		$query=$this->db->get();
		return $query->result();
	}
	/**
	*this method filters candidates with faculties and halls
	*returns row with candidates in same faculty and hall
	*/
public function filter_faculty($faculty,$sid){
$this->load->database();
$str="SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number WHERE NOT EXISTS
(
SELECT * FROM votes WHERE votes.sid='$sid'
AND votes.faculty_candidate_number !=0
) AND students.faculty='$faculty' AND candidates.position NOT LIKE '%Guild President%' ";
		$query=$this->db->query($str);
		return $query->result();
	}//end filter-faculty
/***
Returns guild president candidates who have not been voted
***/
public function guild($sid){
$query=$this->db->query("
SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number WHERE NOT EXISTS
(
SELECT * FROM votes WHERE votes.sid='$sid'
AND votes.guild_candidate_number != 0
)  AND candidates.position  LIKE '%Guild President%' ");
	if($query->num_rows() > 0 ){
		return $query->result();
	}else{
		return false;
	}
}//end guild
	public function getDetails($id){
		$this->db->select("*");
		$this->db->where("student_number",$id);
		$this->db->from("students");
		$query=$this->db->get();
		return $query->result();
	}
	public function check($category,$votersNumber,$candidateNumber){
	switch ($category) {
		case 'F':
			$voter_row="SELECT * FROM students WHERE sid='$votersNumber' ";
				$voter_s=$this->db->query($voter_row);
				$voterz=$voter_s->result();
				if(!empty($voterz)){
					/*check if the student has already voted */
					foreach($voterz as $row){
				$sql="SELECT * FROM votes WHERE faculty_candidate_number='$candidateNumber' AND sid ='$row->sid'  LIMIT 1";
					$voter=$this->db->query($sql);//return if therez a match
					$voter_results=$voter->result();
					if(!empty($voter_results)){
						return "<h5 class='text-danger'><span class='glyphicon glyphicon-warning'></span>Candidate Already Voted</h5>";
					}else{
						/*If the student has not yet voted  */
				$category_vote="SELECT * FROM votes WHERE sid='$row->sid' ";
					$category_query=$this->db->query($category_vote);
					if($category_query->num_rows() > 1){
						//$num=$category_query->num_rows();
						return "<h5 class='text-danger'><span class='glyphicon glyphicon-warning'></span>You Only Vote One Faculty Candidate</h5>";
					}//end if 
						else{
						$this->vote_faculty($candidateNumber,$row->sid);
						$value=$this->affected_rows();
						return $value;
							}//end else
					}//end else

					}//end foreach
				}else{
					return "<h4 class='alert alert-danger'>Not Registered University Student</h4>";
				}
			break; //break 'F'
	case 'G':
		$voter_s=$this->db->query("SELECT * FROM students WHERE sid='$votersNumber' ");
		$voterz=$voter_s->result();
			if(!empty($voterz)){
			/* if he exists in table */
					foreach($voterz as $row){
			/**if the student wants to vote again the same candidate*/
			$sql="SELECT * FROM votes WHERE guild_candidate_number='$candidateNumber' AND sid ='$row->sid'  LIMIT 1";
					$voter=$this->db->query($sql);//return if therez a match
					$voter_results=$voter->result();
					if(!empty($voter_results)){
						return "<h5 class='text-danger'><span class='glyphicon glyphicon-warning'></span>Candidate Already Voted</h5>";
					}else{
		/**if not then get all the rows he voted*/
		$category_vote="SELECT * FROM votes WHERE sid='$row->sid' ";
					$category_query=$this->db->query($category_vote);
					if($category_query->num_rows() > 1){
						//$num=$category_query->num_rows();
						return "<h5 class='text-danger'><span class='glyphicon glyphicon-warning'></span>You Only Vote One Guild President</h5>";
					}//end if 
						else{
						$this->vote_guildp($candidateNumber,$row->sid);
						$value=$this->affected_rows();
						return $value;
							}//end else
				}//end else

					}//end foreach
		}//end if(voterz)
		else{
					return "<h4 class='alert alert-danger'>Not Registered University Student</h4>";
				}
	break;
			default:
				return "<h4 class='text-danger'>No Category Selected...</h4>";
				break;
		}
	}
	/**
method to vote guild president
	*/
public function vote_guildp($candidateNumber,$sid){
	$query=$this->db->query("SELECT * FROM votes WHERE sid='$sid' ");
	//check if voter already voted
	$row=$query->result();
	if(!empty($row)){
		/**has already voted */
		foreach($row as $r){
			$vid=$r->sid;
	$update=$this->db->query("UPDATE votes SET guild_candidate_number='$candidateNumber' WHERE sid='$vid' ");
	if($update){
//increment vote for guild president candidate
$cand=$this->db->query("SELECT * FROM candidates WHERE student_number='$candidateNumber' ");
$row=$cand->result();
$vote=0;
foreach($row as $r){
	$vote=$r->votes;
	$vote++;
	$inc=$this->db->query("UPDATE candidates SET votes='$vote' WHERE student_number='$candidateNumber' ");
		if($inc){
			return $this->affected_rows();
		}else{ return false; }
}
	}//end if 		
		
		}//end foreach
	}//end if
	else{
$vote=0;		
$data['vid']='';
$data['sid']=$sid;
$data['guild_candidate_number']=$candidateNumber;
$query=$this->db->insert("votes",$data);
if($query){
$get=$this->db->query("SELECT * FROM candidates WHERE student_number='$candidateNumber' ");
$cand=$get->result();
foreach($cand as $r){
$vote=$r->votes; //get original vote nd increment
$vote++;
$up=$this->db->query("UPDATE candidates SET votes='$vote' WHERE student_number='$candidateNumber' ");
if($this->affected_rows()>0){
	return $this->affected_rows();
}else{ return false; }
}

}//end if	
	}//end else for unvoted student

}//end vote_guildp
	/***
	* method that displays NONE voted candidates
	**/ 
	/*
	* Method to get the affected rows for checks etc
	***/
	public function affected_rows(){
		$this->load->database();
		$times=$this->db->affected_rows();
		return $times;
	}
	/***
	* Method that inserts data into the vote table after every vote
	****/
	/*
Do a table JOIN of 3 tables such that if a candidates stdno is in votes table he's pic doesno show on home page for voting candidates
	-students,candidates and votes
	-referenced by cid
	*/
	public function vote_faculty($candidateNumber,$sid){
	/**check if he has already voted nd update the candidate No
	if not insert a new row
	*/
	$query=$this->db->query("SELECT * FROM votes WHERE sid='$sid' ");
	//check if voter already voted
	$vote=0;
	$row=$query->result();
	if(!empty($row)){
		foreach($row as $r){
	$update=$this->db->query("UPDATE votes SET faculty_candidate_number='$candidateNumber' WHERE sid='$r->sid' ");
	if($this->affected_rows()>0){
//increment vote for guild president candidate
	$cand=$this->db->query("SELECT * FROM candidates WHERE student_number='$candidateNumber' ");
	$row=$cand->result();
foreach($row as $r){
	$vote=$r->votes;
	$vote++;
	$inc=$this->db->query("UPDATE candidates SET votes='$vote' WHERE student_number='$candidateNumber' ");
		if($inc){
			return $this->affected_rows();
		}else{ return false; }
}
	}//end if 		
		
		}//end foreach
	}//end if
	else{
$vote=0;		
$data['vid']='';
$data['sid']=$sid;
$data['faculty_candidate_number']=$candidateNumber;
$query=$this->db->insert("votes",$data);
if($query){
$get=$this->db->query("SELECT * FROM candidates WHERE student_number='$candidateNumber' ");
$cand=$get->result();
foreach($cand as $r){
$vote=$r->votes; //get original vote nd increment
$vote++;
$up=$this->db->query("UPDATE candidates SET votes='$vote' WHERE student_number='$candidateNumber' ");
if($this->affected_rows()>0){
	return $this->affected_rows();
}else{ return false; }
}

}//end if	
	}
		// 	$data['vid']='';
		// 	$data['sid']=$sid;
		// 	$data['faculty_candidate_number']=$candidateNumber;
		// $query=$this->db->insert("votes",$data);
		// $result=0;
		// if($query){
		// 	$result=$this->db->query("SELECT * FROM candidates WHERE student_number='$candidateNumber' ");
		// 	$row=$result->result();
		// 	if($row){
		// 		foreach($row as $r){
		// 		$vote=$r->votes;
		// 		$vote++;
		// 		$update="UPDATE candidates SET votes='$vote' WHERE student_number='$candidateNumber' ";
		// 		$this->db->query($update);
		// 		$res=0;
		// 		if($res==1){
		// 		$res=$this->affected_rows();
		// 		}
		// 	return $res;
		// 		}//end foreach
		// 	}//end if
		//  }//end if
		// return $result;
	}//end vote_faculty
/**
method to return all candidates of a specific faculty
**/	
public function facultyCandidateDetails($faculty){
	$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number WHERE students.faculty='$faculty' AND candidates.position NOT LIKE '%Guild President%'");
	return $query->result();
}
public function candidatesDetails($fac){
	switch($fac){
		case 1:
		$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number 
			 AND students.faculty='Faculty Of Commerce' AND candidates.position NOT LIKE '%Guild President%' ORDER BY candidates.votes DESC   
		");
		return $query->result();
		break;
		case 2:
		$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number 
			
			AND students.faculty='Faculty Of Computing And Management Science' AND candidates.position NOT LIKE '%Guild President%' ORDER BY candidates.votes DESC	");
		return $query->result();
		break;
		case 3:
		$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number 
			
			AND students.faculty='Faculty Of Entrepreneurship And Business Administration' AND candidates.position NOT LIKE '%Guild President%' ORDER BY candidates.votes DESC	");
		return $query->result();
		break;
		case 4:
		$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number 
			
			AND students.faculty='Faculty Of Management And Public Policy' AND candidates.position NOT LIKE '%Guild President%' ORDER BY candidates.votes DESC	");
		return $query->result();
		break;
		case 5:
		$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number 
			
			AND students.faculty='Faculty Of Marketing And Hospitality Management' AND candidates.position NOT LIKE '%Guild President%' ORDER BY candidates.votes DESC	");
		return $query->result();
		break;
		case 6:
		$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number 
			
			AND students.faculty='Faculty Of Graduate Studies And Research' AND candidates.position NOT LIKE '%Guild President%' 
		ORDER BY candidates.votes DESC
		");
		return $query->result();
		break;
		case 7:
		/**returns guild president candidates*/
$query=$this->db->query("
	SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number 		
		AND candidates.position='Guild President' ORDER BY candidates.votes DESC 
		");
		return $query->result();
		break;
		default:
		return "<h4 class='text-danger'>Invalid Category Selected</h4>";
		break;
	}
}
public function getStudnt($sid){
	$this->db->select("*");
	$this->db->where("sid",$sid);
	$this->db->from("students");
	$query=$this->db->get();
	return $query->result();
}
public function getStdno($sid){
$query=$this->db->query("SELECT * FROM students WHERE sid='$sid' ");
	return $query->result();
}
/***
	* Method that creates New Student /Registers
	***/
	/*Method to update students profile*/
	public function updateS($sid,$password){
	$query=$this->db->query("UPDATE students SET password ='$password' WHERE sid='$sid' ");
		return $this->affected_rows();
	}
	public function registerStudent($array){
		$data['sid']='';
		$data['student_number']=$array[0];
		$data['full_names']=$array[1];
		$data['faculty']=$array[2];
		$data['yos']=$array[3];
		$data['course']=$array[4];
		$data['password']=$array[5];
		$data['status']=0;
		if($this->db->insert("students",$data)){
			return $this->affected_rows();
		}else{ return false; }//end else
	}
	public function registerCandidate($array1,$array2){
		$data['sid']='';
		$data['student_number']=$array1[0];
		$data['full_names']=$array1[1];
		$data['faculty']=$array1[2];
		$data['yos']=$array1[3];
		$data['course']=$array1[4];
		$data['password']=$array1[5];
		$data['status']=0;
		if($this->db->insert("students",$data)){
			$cand['cid']='';
			$cand['student_number']=$array2[0];
			$cand['photo']=$array2[1];
			$cand['position']=$array2[2];
			$cand['votes']=0;
			if($this->db->insert("candidates",$cand)){
			 	return $this->affected_rows();	
			}//end if 
			else{ return false; }
		}else{ return false; }//end else	
	}//end registerCandidate
	public function candidates(){
		$query=$this->db->query("SELECT * FROM candidates INNER JOIN students ON candidates.student_number=students.student_number ");
		return $query->result();
	}
	public function students(){
	$query=$this->db->query("SELECT * FROM students WHERE NOT EXISTS(
		SELECT * 
		FROM candidates 
		WHERE students.student_number=candidates.student_number
	) ");
		return $query->result();
	}
	/***
	* Method that updates students field status to Voted on Logout
	*/
	public function logoutVoter($id){
	$query=$this->db->query("UPDATE students SET status=1 WHERE sid='$id' ");
	if($query){
		return $this->affected_rows();
	}//end if

	}//end logoutVoter
}
?>