<?php
session_start();
include "../includes/db-connect.php";
?>
<?php 
    // Now we check if the data from the login form was submitted, isset() will check if the data exists.
    // if ( !isset($_POST['useremail'], $_POST['userpass']) ) {
    //     // Could not get the data that should have been sent.
    //     exit('Please fill both the username and password fields!');
    // }
    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $conn->prepare('SELECT id, user_pass FROM user WHERE user_email = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['useremail']);
        $mypassword = md5 ($_POST['userpass']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if ($mypassword === $password) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['useremail'];
                $_SESSION['id'] = $id;
                //echo 'Welcome ' . $_SESSION['name'] . '!';
                header("Location: ../index.php");
            } else {
                // Incorrect password
                //echo 'Incorrect username and/or password!';
                $_SESSION['message'] = 'Incorrect username and/or password!';
                header("Location: ../login.php");
            }
        } else {
            // Incorrect username
            //echo 'Incorrect username and/or password!';
            $_SESSION['message'] = 'Incorrect username and/or password!';
            header("Location: ../login.php");
        }


        $stmt->close();
    }


 ?>