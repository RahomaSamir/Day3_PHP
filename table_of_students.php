<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>

    <style>
        table{
            width: 80%;
            margin: 20px auto;
        }
        th, td{
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th{
            background-color: rosybrown;
        }
        .cms{
            color:red;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Application name: PHP class register</h2>
    <?php
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];

echo "<table>";
echo"<tr><th>Name</th><th>Email</th><th>Track</th></tr>";
foreach ($students as $student) {
    $class = ($student['track'] ==="CMS")? "cms" : "";
    echo "<tr class ='$class'>";
    echo "<td>" . htmlspecialchars($student['name'])."</td>";
    echo "<td>" . htmlspecialchars($student['email'])."</td>";
    echo "<td>" . htmlspecialchars($student['track'])."</td>";
    echo"</tr>";
}
echo"</table>";
    ?>
</body>
</html>