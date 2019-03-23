
<?php // Initialize variables to null.
$name =""; // Sender Name
$email =""; // Sender's email ID
$subject ="NoPo contact form";
$message =""; // Sender's Message
$nameError ="";
$emailError ="";
$messageError ="";
$successMessage =""; // On submittingform below function will execute.
if(isset($_POST["submit"])) { // Checking null values in message.
if (empty($_POST["name"])){
$nameError = "Name is required";
}
else
{
$name = test_input($_POST["name"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name))
{
$nameError = "Only letters and white space allowed";
}
} // Checking null values inthe message.
if (empty($_POST["email"]))
{
$emailError = "Email is required";
}
else
{
$email = test_input($_POST["email"]);
} // Checking null values inmessage.
}
if (empty($_POST["message"]))
{
$messageError = "Message is required";
}
else
{
$message = test_input($_POST["message"]);
} // Checking null values inthe message.
if( !($name=='') && !($email=='') &&!($message=='') )
{ // Checking valid email.
if (preg_match("/([w-]+@[w-]+.[w-]+)/",$email))
{
$header= $name."<". $email .">";
$headers = "nopoventures.com"; /* Let's prepare the message for the e-mail */
$msg = "Hello! $name Thank you...! For Contacting Us.
Name: $name
Subject: $subject
E-mail: $email
Message: $message
This is a Confirmation mail. We Will contact You as soon as possible.";
$msg1 = " $name Contacted Us. Hereis some information about $name.
Name: $name
Subject: $subject
E-mail: $email
Message: $message "; /* Send the message using mail() function */
if(mail($email, $subject, $headers, $msg ) && mail("hello@motorossi.me", $subject, $header, $msg1 ))
{
$successMessage = "Message sent successfully.......";
}
}
else
{ $emailError = "Invalid Email";
}
}
} // Function for filtering input values.
function test_input($data);
{
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}
?>
