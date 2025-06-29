<?php

function test_input($data)
{
  if ($data === null) return null;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function filter_password($password, $min_length = 8)
{
  if (strlen($password) < $min_length) {
    return null;
  }

  if (!preg_match('/[a-z]/', $password)) {
    return null;
  }

  if (!preg_match('/[A-Z]/', $password)) {
    return null;
  }

  if (!preg_match('/[0-9]/', $password)) {
    return null;
  }

  if (!preg_match('/[\W_]/', $password)) {
    return null;
  }

  return $password;
}

function filter_email($email)
{
  if ($email === null) return null;
  $email = trim($email);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  return $email ?: null;
}

?>
