<?php
session_start();

unset($_SESSION['userEmail']);
unset($_SESSION['userName']);

header('LOCATION:log-in.php');
