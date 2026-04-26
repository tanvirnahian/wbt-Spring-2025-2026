<?php
$FirstnameErr = $LastnameErr = $usernameErr = $passErr = $contactErr = "";
$Firstname = $Lastname = $username = $pass = $contact = "";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // First Name
    if (empty($_POST["Firstname"])) {
        $FirstnameErr = "First name is required";
    } else {
        $Firstname = cleanInput($_POST["Firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $Firstname)) {
            $FirstnameErr = "Only letters and white space allowed";
        }
    }

    // Last Name
    if (empty($_POST["Lastname"])) {
        $LastnameErr = "Last name is required";
    } else {
        $Lastname = cleanInput($_POST["Lastname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $Lastname)) {
            $LastnameErr = "Only letters and white space allowed";
        }
    }

    // Email (username)
    if (empty($_POST["username"])) {
        $usernameErr = "Email is required";
    } else {
        $username = cleanInput($_POST["username"]);
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $usernameErr = "Invalid email format";
        }
    }

    // Password
    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $pass = cleanInput($_POST["password"]);
        if (strlen($pass) < 8) {
            $passErr = "Password must be at least 8 characters";
        }
    }

    // Contact Number
    if (empty($_POST["contact"])) {
        $contactErr = "Contact number is required";
    } else {
        $contact = cleanInput($_POST["contact"]);
        if (!preg_match("/^[0-9]{11}$/", $contact)) {
            $contactErr = "Enter valid 11 digit number";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign up form</title>
</head>
<body>

<h2>Sign up</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    First Name: <br>
    <input type="text" name="Firstname" value="<?php echo $Firstname; ?>">
    <span style="color:red;">* <?php echo $FirstnameErr; ?></span>
    <br><br>

    Last Name: <br>
    <input type="text" name="Lastname" value="<?php echo $Lastname; ?>">
    <span style="color:red;">* <?php echo $LastnameErr; ?></span>
    <br><br>

    Email (Username): <br>
    <input type="text" name="username" value="<?php echo $username; ?>">
    <span style="color:red;">* <?php echo $usernameErr; ?></span>
    <br><br>

    Password: <br>
    <input type="password" name="password">
    <span style="color:red;">* <?php echo $passErr; ?></span>
    <br><br>

    Contact Number: <br>
    <input type="text" name="contact" value="<?php echo $contact; ?>">
    <span style="color:red;">* <?php echo $contactErr; ?></span>
    <br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>