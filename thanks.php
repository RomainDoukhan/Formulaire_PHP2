<?php

$first_nameErr = $last_nameErr = $user_mailErr = $user_phoneErr = $user_message = "";
$first_name = $last_name = $user_mail = $user_phone = $user_message = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $first_nameErr = "Firstame is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $first_nameErr = "Only letters and white space allowed";
    }
  }
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["last_name"])) {
	  $last_nameErr = "Lastname is required";
	} else {
	  $last_name = test_input($_POST["last_name"]);
	  // check if name only contains letters and whitespace
	  if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
		$last_nameErr = "Only letters and white space allowed";
	  }
	}
}

  if (empty($_POST["user_mail"])) {
    $user_mailErr = "Email is required";
  } else {
    $user_email = test_input($_POST["user_mail"]);
    // check if e-mail address is well-formed
    if (!filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {
      $user_emailErr = "Invalid email format";
    }
}

  if (empty($_POST["user_phone"])) {
    $user_phone = "Phone number is required";
  } else {
    $user_phone = test_input($_POST["user_phone"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$user_phone)) {
      $user_mailErr = "Invalid URL";
    }
}

  if (empty($_POST["user_message"])) {
    $user_message = "Message is required";
  } else {
    $user_message = test_input($_POST["user_message"]);
}
  

echo "Merci $_POST[first_name] $_POST[last_name] de nous avoir contacté à propos de $_POST[user_subject]." . "<br>";
echo "Un de nos conseiller vous contactera soit à l’adresse $_POST[user_mail] ou par téléphone au $_POST[user_phone] dans les plus brefs délais pour traiter votre demande :" . "<br>";
echo "$_POST[user_message]";

?>
