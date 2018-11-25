<?php
$name = $email = $age = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $age = test_input($_POST["age"]);
  $message = test_input($_POST["message"]);
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "<h2>Your Input:</h2><br>";
echo "Name: $name <br>";
echo "Email: $email <br>";
echo "Age: $age <br>";
echo "Message: $message <br><br>";

//------------------------------------------------------------------------------
// w przypadku nie wypełnienia formularza w calosci
/*echo "
    <span style=\"color: #cc0000;\">
        <strong>Fill all form elements!</strong>
    </span><br>In a moment you will be redirected to the form.
    <script type=\"text/javascript\">
        window.setTimeout(\"window.location.replace('index.html?id=contactForm');\",10000);
    </script><br><br>";*/

//------------------------------------------------------------------------------
// name ma miec dlugosc od 2 do 20 znakow
if (isset($_POST['name'])) 
{
    $nlength = strlen($_POST['name']);

    if ($nlength > 1 && $nlength < 21 && preg_match("/^[a-zA-Z -]+$/", $name)) 
    {
        echo "<span style=\"color: #008000;\">[{$_POST['name']}] - Name k.</span><br>";
    } 
    else 
    {
        echo "<span style=\"color: #cc0000;\">[{$_POST['name']}] - Only letters allowed.</span><br>";
    };
}

// age ma byc wieksze niz 1 i mniejsze niz 148
if (isset($_POST['age'])) 
{
    $avalue = intval($_POST['age']);

    if ($avalue > 0 && $avalue < 148) 
    {
        echo "<span style=\"color: #008000;\">[{$_POST['age']}] - Age ok.</span><br>";
    } 
    else 
    {
        echo "<span style=\"color: #cc0000;\">[{$_POST['age']}] - Invalid age.</span><br>";
    };
}

// message ma miec dlugosc do 1000 znakow
if (isset($_POST['message'])) 
{
    $mlength = strlen($_POST['message']);

    if ($mlength < 1001) 
    {
        echo "<span style=\"color: #008000;\">[{$_POST['message']}] - Message ok.</span><br>";
    } 
    else 
    {
        echo "<span style=\"color: #cc0000;\">[{$_POST['message']}] - Too long message.</span><br>";
    };
}
//------------------------------------------------------------------------------

echo "<br>";
require("db.php");
db();
?>
