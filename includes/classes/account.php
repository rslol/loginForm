<?php
	class Account {
		private $con;
		private $errorArray;

		public function __construct($con){
			$this->con = $con;
			$this->errorArray = array();
		}

		public function login($un, $pw){
			$pw = md5($pw);
			$query = mysqli_query($this->con, "SELECT * FROM loginform WHERE userName='$un' AND password='$pw'");

			if(mysqli_num_rows($query) == 1){
				return true;
			} else {
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}
		}

		public function register($username, $password){
			$this->validateUsername($username);
			$this->validatePassword($password);

			if(empty($this->errorArray) == true){
				return $this->insertUserDetails($username, $password);
			} else {
				return false;
			}
		}

		public function getError($error){
			if(!in_array($err, $this->errorArray)){
				$err="";
			}
			return "<span class='errorMessage'>$err</span>";
		}

		public function insertUserDetails($username, $password){
			/*basic encryption*/
			$password = md5($password);
			$date = date("Y-m-d");
			$result = mysqli_query($this->con, "INSERT INTO loginform VALUES ('', '$username', '$password')");
			return $result;
		}

		private function validateUsername($username){
			if(strlen($username) > 20 || strlen($username) < 3){
				array_push($this->errorArray, Constants::$userNameError);
			}

			$checkUserName = mysqli_query("SELECT userName FROM loginform WHERE userName = '$username'");
			if(mysqli_num_rows($checkUserName) != 0){
				array_push($this->errorArray, Constants::$userNameTaken);
			}
		}

		private function validatePasword($password){
			if(strlen($password) > 20 || strlen($password) < 3){
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

			if(preg_match('/[A-Za-z0-9]/', $password)){
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}
		}	
	}
?>