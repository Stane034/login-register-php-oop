<?php 
    class User { 
        protected $conn;
        public function __construct() {
            global $conn;
            $this->conn = $conn;
        }

        public function create($username, $password, $email, $phone_number) { 
            $firstsql = "SELECT * FROM members WHERE username = ?";
            $test = $this->conn->prepare($firstsql);
            $test->bind_param("s", $username);
            $test->execute();
            $rezultat = $test->get_result();

            if ($rezultat->num_rows == 1) { 
                $_SESSION['message'] = "Vec postoji ovakav username u nasoj bazi podataka.";
                return false;
            }

            $sql = "INSERT INTO members (username, password, email, phone_number) VALUES (?,?,?,?)";
            $run = $this->conn->prepare($sql);
            $run->bind_param("ssss", $username, $password, $email, $phone_number);
            $result = $run->execute();

            if ($result) { 
                $_SESSION['member_id'] = $this->conn->insert_id;
                $_SESSION['message'] = "Uspesno registrovan, svaka cast";
                return true;
            }else { 
                return false;
            }
        }

        public function trytoLogin($username, $password) { 
            $sql = "SELECT * FROM members WHERE username = ?";
            $run = $this->conn->prepare($sql);
            $run->bind_param("s", $username);
            $run->execute();
            $results = $run->get_result();
        
            if ($results->num_rows == 1) { 
                $member = $results->fetch_assoc();
        
                if (password_verify($password, $member['password'])) { 
                    $_SESSION['message'] = 'Uspesno ulogovan';
                    $_SESSION['member_id'] = $member["member_id"];
                    return true;
                }else { 
                    $_SESSION['message'] = 'Nespesno ulogovan';
                    return false;
                }        
            }else { 
                $_SESSION['message'] = 'Nespesno ulogovan';
                return false;
            }
        }

        public function isLogged() { 
            if (isset($_SESSION['member_id'])) { 
                return true;
            }

            return false;
        }

        public function logout() { 
            if (isset($_SESSION['member_id'])) {
                $_SESSION['message'] = 'Uspesno izlogovan'; 
                unset($_SESSION['member_id']);
                return true;
            }

            $_SESSION['message'] = 'Sta to pokusavas?';
            return false;
        }
    }
?>