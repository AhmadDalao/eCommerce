<?php

// start the session first to know if user was the user who is registered in session.
$pageTitle = "Logout";
session_start();

// unset the data inside the session. which means $_session['username'] has no data.
session_unset();

// setting the session to empty value. [It can replace the line above it]
$_SESSION = array();

// destroy user session which means $_session['username'] does not exist anymore.
session_destroy();

// now redirect the usr to login form after deleting it's data and destroying the session.
header('Location: index.php');

// no prevent error in case the location name had an error.
exit();