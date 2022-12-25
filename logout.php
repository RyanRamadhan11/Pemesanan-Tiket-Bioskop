<?php
session_start();
//session_destroy();
unset($_SESSION['USERS']);
header('Location:index.php?hal=home');