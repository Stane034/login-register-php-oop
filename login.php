



<?php require_once 'inc/header.php';?>
    <?php 

        if (isset($_SESSION['message'])) { 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") { 
            $username = $_POST['usrname'];
            $password = $_POST['pwd'];
            $login = $user->trytoLogin($username, $password);
        
            if ($login) { 
                header("Location: index.php");
            }else { 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        }
    ?>
    <br>
    <form method = "POST">
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input
                    type="input"
                    class="form-control"
                    name="usrname"
                    id=""
                    placeholder="Upisi username"
                />
                <label for="" class="form-label">Lozinka</label>
                <input
                    type="password"
                    class="form-control"
                    name="pwd"
                    id=""
                    placeholder="Upisi Lozinku"
                /> <br>
                <input
                    name=""
                    id=""
                    class="btn btn-primary"
                    type="submit"
                    value="Prijavi se"
                />
            
            </div>
    </form>


<?php require_once 'inc/footer.php'; ?>