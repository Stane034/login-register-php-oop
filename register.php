



<?php require_once 'inc/header.php';?>
    <?php 

        if (isset($_SESSION['message'])) { 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") { 
            $username = $_POST['usrname'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        
            $created = $user->create($username, $password, $email, $phone_number);
        
            if ($created) { 
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

                <label for="" class="form-label">E-Mail</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id=""
                    placeholder="Upisi email"
                />

                <label for="" class="form-label">Broj Telefona</label>
                <input
                    type="input"
                    class="form-control"
                    name="phone_number"
                    id=""
                    placeholder="Upisi broj telefona"
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
                    value="Registruj se"
                />
            
            </div>
    </form>


<?php require_once 'inc/footer.php'; ?>