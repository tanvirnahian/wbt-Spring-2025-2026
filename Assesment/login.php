<?php
$usernameErr = "";
$passwordErr = "";


$username = "admin";
$password = "12345";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // UserName
    if (empty($_POST["username"])) {
        $usernameErr = "UserName is required";
    } else {
        $username = cleanInput($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            $usernameErr = "Only letters and white space allowed";
        }
    }

    // Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = cleanInput($_POST["password"]);
       
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: skyblue;
        }

        h2 {
            margin-bottom: 5px;
        }

        .form-table {
            border-collapse: collapse;
            width: 600px;
        }

        .form-table td {
            padding: 8px 10px;
            vertical-align: top;
        }

        .form-table td:first-child {
            width: 100px;
            font-weight: bold;
            text-align: center;
            padding-top: 10px;
        }

        .form-table input[type="text"],
        .form-table textarea {
            width: 280px;
            padding: 5px 7px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-table textarea {
            resize: vertical;
        }

        .error {
            color: red;
            font-size: 13px;
            display: block;
            margin-top: 3px;
        }

        .required {
            color: red;
        }

        .form-table input[type="submit"] {
            padding: 7px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }

        .form-table input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result-table {
            border-collapse: collapse;
            width: 500px;
            margin-top: 10px;
        }

        .result-table td {
            padding: 7px 12px;
            border: 1px solid #ddd;
        }

        .result-table td:first-child {
            font-weight: bold;
            background-color: #f2f2f2;
            width: 120px;
        }
    </style>
</head>

<body>

<h2>Login</h2>
<p><span class="required">* required field</span></p>

<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table class="form-table">
        <tr>
            <td>username <span class="required">*</span></td>
            <td>
                <input type="text" name="username" value="<?= $username ?>">
                <span class="error"><?= $usernameErr ?></span>
            </td>
        </tr>
        <tr>
            <td>password <span class="required">*</span></td>
            <td>
                <input type="text" name="password" value="<?= $password ?>">
                <span class="error"><?= $passwordErr ?></span>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$usernameErr && !$passwordErr): ?>
    <h3>Submitted values</h3>
    <table class="result-table">
        <tr><td>username</td><td><?= $username ?></td></tr>
        <tr><td>password</td><td><?= $password ?></td></tr>
    </table>
<?php endif; ?>

</body>
</html>