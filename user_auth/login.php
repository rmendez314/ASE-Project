<?php
	include_once "../components/template_html.php";
    include_once "../.env.php";

    $error = "";
    session_start();

    // check if the user is already logged in
    if (!empty($_SESSION['user_id'])) {
        // redirect to dashboard
        header('Location: /');
        exit();
    }

    // handle form submit
    if (!empty($_POST['submit'])) {
        // create the connection
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, USER_DATABASE);
        
        // sql statement to execute
        $sql = "SELECT auto_id, name, password FROM user WHERE email = ?";
        $stmt = $con->prepare($sql); 
        $stmt->bind_param("s", $_POST['email']);
        $stmt->execute();
        
        // bind the result variables
        mysqli_stmt_bind_result($stmt, $id, $name, $db_hash);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        
        // handle successful login
        if (!empty($db_hash) && password_verify($_POST['password'], $db_hash)) {
            // record user id in session
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;   
            // redirect
            header('Location: /');
            exit();
        }
        
        $error = "<p class='error'>Invalid credentials!</p>";
    }

    html_top("User Authentication Screen", "../styles/dark.css");
    // input form
    echo '
        <div class="container" id="outer">
            <div class="container" id="form-container">
            <svg id="stars_login" xmlns="http://www.w3.org/2000/svg" width="75px" height="75px" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16"> 
                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0
                        .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0
                        0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794
                        1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0
                        .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31
                        4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145
                        0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0
                        0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1
                        0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                    </svg>
                    <br>
                    <br>
    
            <form method="post" action="login.php">
                                        <div class="form-floating">
                        <input type="email" class="form-control border-0" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control border-0" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit">Sign in</input>' .
                    $error . '
                </form>
                <p>Need an account? <a href="../../../Downloads/register.php">Sign up Here.</a></p>
            </div>
        </div>';

    html_bottom();