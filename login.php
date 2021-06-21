<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start(); // Starting Session
include "connection.php";
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password must NOT be empty";
    } else {
        // Define $email and $password
        $email = $_POST['email'];
        $password = $_POST['password'];
        // To protect MySQL injection for Security purpose
        $email = stripslashes($email);
        $password = stripslashes($password);

        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        // SQL query to fetch information of registerd users and finds user match.
        //$query = mysqli_query($connection, "select * from users WHERE confirmed='1' AND email='$email' AND password=md5('$password')");
        $sql = "SELECT * FROM users WHERE confirmed='1' AND email='$email' AND password=md5('$password')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $_SESSION['login_user'] = $email; // Initializing Session
                $type = $row['class'];

                //Monitor user Activity
                date_default_timezone_set('Africa/Nairobi');
                $last_seen = date('Y-m-d H:i:s');
                $query = "UPDATE users SET last_login = '" . $last_seen . "' WHERE email = '" . $email . "'";
                if (mysqli_query($connection, $query)) {
                    switch ($type) {
                        case 'Administrator':
                            header('Location:home.php'); // Redirecting To Other Page
                            continue;
                        case 'Technician':
                            header('Location:home.php'); // Redirecting To Other Page
                            continue;
                        case 'Librarian':
                            header('Location:home.php'); // Redirecting To Other Page
                            continue;
                        case 'Guest':
                            header('Location:home.php'); // Redirecting To Other Page
                            break;
                    }

                }
            } else {
                echo "<script>alert(\"Email or Password is invalid! Try again.\");</script>";
                echo "<script>location.href=\"index.php\";</script>";
                //$error = "Email or Password is invalid or account not yet activated!";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }

        mysqli_close($connection); // Closing Connection
    }
} else {
    echo "ERROR: Could not login";
}
