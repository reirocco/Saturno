<?php

session_start();
unset($_SESSION); // ---> $_SESSION = [];
session_destroy();
header("location: ../");


?>