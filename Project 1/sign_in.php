<?php

$servername = "127.0.0.1";
$un = "root";
$pw = "";
$dbname = "p2s";
// Create connection
$conn = new mysqli($servername, $un, $pw,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, hashed_pw, salt FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s",$param_username);

            // Set parameters
            $param_username = $username;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password,$salt);
                    if(mysqli_stmt_fetch($stmt)){
                      $md5=md5($password.$salt);
                        if($md5==$hashed_password){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: signedin.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
 ?>


<?php include 'header.php';
//if the user is already signed in redired to signedin.html
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
  header("Location: signedin.php");
  exit;
}
?>

<h1> Sign In </h1>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"required><br>

  <input type="submit" value="Submit">


<?php echo $username_err;
echo $password_err;
?>

</body>
</html>
