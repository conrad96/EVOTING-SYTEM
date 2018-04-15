<?php 
/*get student [voters] row */
			$voter_row="SELECT * FROM students WHERE sid='$votersNumber' ";
				$voter_s=$this->db->query($voter_row);
				$voterz=$voter_s->result();
			if(!empty($voterz)){/*if he exists in table*/
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
					if($category_query->num_rows() > 0){
						//$num=$category_query->num_rows();
						return "<h5 class='text-danger'><span class='glyphicon glyphicon-warning'></span>You Only Vote One Faculty Candidate</h5>";
					}//end if 
						else{
						$this->vote_guildp($candidateNumber,$row->sid);
						$value=$this->affected_rows();
						return $value;
							}//end else
					}//end else

					}//end foreach
				}else{
					return "<h4 class='alert alert-danger'>Not Registered University Student</h4>";
				}
	?>