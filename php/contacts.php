<?php

$nameErr = $emailErr = $genderErr = $reasonErr = $topicsErr = "";
$name = $email = $gender = "";
$reason = $topics = [];

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

   
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = cleanInput($_POST["gender"]);
    }


    if (empty($_POST["reason"])) {
        $reasonErr = "Select at least one reason";
    } else {
        $reason = $_POST["reason"];
    }


    if (empty($_POST["topics"])) {
        $topicsErr = "Select at least one topic";
    } else {
        $topics = $_POST["topics"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

<h1>Contact Me</h1>

<form method="post" action="">

    <fieldset>
        <legend>Registration Form</legend>

        <!-- Name -->
        <label>Name:</label>
        <input type="text" name="name" value="<?= $name ?>">
        <span class="error">* <?= $nameErr ?></span>
        <br><br>

        <!-- Email -->
        <label>Email:</label>
        <input type="email" name="email" value="<?= $email ?>">
        <span class="error">* <?= $emailErr ?></span>
        <br><br>

        <!-- Gender -->
        <label>Gender:</label>
        <input type="radio" name="gender" value="male"
            <?= ($gender == "male") ? "checked" : "" ?>> Male
        <input type="radio" name="gender" value="female"
            <?= ($gender == "female") ? "checked" : "" ?>> Female
        <span class="error">* <?= $genderErr ?></span>
        <br><br>

        <!-- Reason -->
        <label>Reason of contact:</label><br>
        <input type="checkbox" name="reason[]" value="Project"
            <?= in_array("Project", $reason) ? "checked" : "" ?>> Project
        <input type="checkbox" name="reason[]" value="Thesis"
            <?= in_array("Thesis", $reason) ? "checked" : "" ?>> Thesis
        <input type="checkbox" name="reason[]" value="Job"
            <?= in_array("Job", $reason) ? "checked" : "" ?>> Job
        <br>
        <span class="error"><?= $reasonErr ?></span>
        <br><br>

        <!-- Topics -->
        <label>Topics:</label><br>
        <input type="checkbox" name="topics[]" value="Web Development"
            <?= in_array("Web Development", $topics) ? "checked" : "" ?>> Web Development
        <input type="checkbox" name="topics[]" value="Mobile Development"
            <?= in_array("Mobile Development", $topics) ? "checked" : "" ?>> Mobile Development
        <input type="checkbox" name="topics[]" value="AI/ML Development"
            <?= in_array("AI/ML Development", $topics) ? "checked" : "" ?>> AI/ML Development
        <br>
        <span class="error"><?= $topicsErr ?></span>
        <br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">

    </fieldset>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    !$nameErr && !$emailErr && !$genderErr && !$reasonErr && !$topicsErr):
?>

<h3>Submitted Data</h3>
<table border="1">
    <tr><td>Name</td><td><?= $name ?></td></tr>
    <tr><td>Email</td><td><?= $email ?></td></tr>
    <tr><td>Gender</td><td><?= $gender ?></td></tr>
    <tr><td>Reason</td><td><?= implode(", ", $reason) ?></td></tr>
    <tr><td>Topics</td><td><?= implode(", ", $topics) ?></td></tr>
</table>

<?php endif; ?>

</body>
</html>