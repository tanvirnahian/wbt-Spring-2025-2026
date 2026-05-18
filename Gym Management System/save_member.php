
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$plan = $_POST['plan'];

$file = 'members.txt';

$data = $name . "|" . $email . "|" . $plan . PHP_EOL;

file_put_contents($file, $data, FILE_APPEND);

header("Location: members.php");
exit();
?>
