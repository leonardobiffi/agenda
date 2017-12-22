<?php
    // Include config file
    require_once("config.php");
    include(DB_PATH);

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = 'Please enter username.';
        } else{
            $username = trim($_POST["username"]);
        }
        // Check if password is empty
        if(empty(trim($_POST['password']))){
            $password_err = 'Please enter your password.';
        } else{
            $password = trim($_POST['password']);
        }
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            // Prepare a select statement
            $sql = "SELECT login, senha FROM usuario WHERE login = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                // Set parameters
                $param_username = $username;
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                        
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                /* Password is correct, so start a new session and
                                save the username to the session */
                                session_start();
                                $_SESSION['username'] = $username;      
                                header("location: " . BASEURL);
                            } else{
                                // Display an error message if password is not valid
                                $password_err = 'The password you entered was not valid.';
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $username_err = 'No account found with that username.';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
        // Close connection
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <title>Agenda de Clientes</title>

    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" rel="stylesheet">
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  </head>

<body>
<div class="container" >  
            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12"></div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="logo">
                    <img src="assets/img/logo_default.jpg"  alt="Logo"  > 
                </div>
                <div class="row loginbox">                    
                    <div class="singtext">
                        <span>Login</span>   
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Usuário</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                        </div>

                        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Senha</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <span class="help-block"><?php echo $username_err; ?></span>
                        <span class="help-block"><?php echo $password_err; ?></span>
                        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input style="width: 100%;" type="submit" class="btn btn-success btn-round" value="Entrar"> 
                        </div>       
                    </form>              
                </div>

                <br>                
                <br>
                <footer class="footer">                 
                    <a href="http://www.kimera.ml" target="_blank">www.kimera.ml</a>
                    <p >© 2017 Kimera. Todos os direitos reservados </p>                 
                </footer> <!--footer Section ends-->
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/material.min.js" type="text/javascript"></script>

        <!--  Dynamic Elements plugin -->
        <script src="assets/js/arrive.min.js"></script>
        <!--  PerfectScrollbar Library -->
        <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/js/bootstrap-notify.js"></script>
        <!-- Material Dashboard javascript methods -->
        <script src="assets/js/material-dashboard.js?v=1.2.0"></script>
</body>
</html>