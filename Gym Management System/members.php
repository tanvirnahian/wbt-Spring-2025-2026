
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Members</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="section">
    <h2>Registered Members</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Plan</th>
        </tr>

        <?php
        $file = 'members.txt';

        if(file_exists($file)){
            $members = file($file);

            foreach($members as $member){
                list($name, $email, $plan) = explode("|", trim($member));

                echo "<tr>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$plan</td>
                      </tr>";
            }
        }
        ?>
    </table>

    <br>
    <a href="index.php" class="btn">Back Home</a>
</section>

</body>
</html>
