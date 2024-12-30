<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $GroupErr = $agreeErr= $coursesErr ="";
$name = $email = $gender = $details = $Group = $agree = "" ;
$courses = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["Group"])) {
    $Group = "";
  } else {
    $Group = test_input($_POST["Group"]);
  }

  if (empty($_POST["details"])) {
    $details = "";
  } else {
    $details = test_input($_POST["details"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

if (!empty($_POST["courses"])) {
  $courses = $_POST["courses"];
} else {
  $coursesErr = "Please select at least one course.";
}
  if (empty($_POST["agree"])) {
    $agreeErr = "You must agree to terms";
  } else {
    $agree = test_input($_POST["agree"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Application name: AAST_BIS class registration</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
   Name: <input type="text" name="name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Group#: <input type="text" name="Group" value="<?php echo $Group; ?>">
  <span class="error"><?php echo $GroupErr;?></span>
  <br><br>
  <span style="text-align:center;">Class details:</span> <textarea name="details" rows="5" cols="40" ><?php echo $details; ?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>>Female
  <input type="radio" name="gender" value="male"<?php if ($gender == "male") echo "checked"; ?>>Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Select Courses: 
<select name="courses[]" multiple >
  <option value="PHP">PHP</option>
  <option value="JavaScript">JavaScript</option>
  <option value="MySQL">MySQL</option>
  <option value="HTML">HTML</option>
  <option value="HTML">CSS</option>
</select>
<span class="error"> * <?php echo $coursesErr;?></span>
<br><br>
  Agree:
  <input type="checkbox" name="agree" >
  <span class="error">* <?php echo $agreeErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your given values are as:</h2>";
echo " Name: " .$name;
echo "<br>";
echo " Email: " .$email;
echo "<br>";
echo " Group: " .$Group;
echo "<br>";
echo " Class dtails: " .$details;
echo "<br>";
echo " Gender: " .$gender;
echo "<br>";
if (!empty($courses)) {
    echo "Your courses are: ";
    echo implode(", ", $courses);
  
}
?>

</body>
</html>
