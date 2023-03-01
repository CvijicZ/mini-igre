<?php
session_start();
session_unset();
session_destroy();
header("location: /mini-igre/index.php");