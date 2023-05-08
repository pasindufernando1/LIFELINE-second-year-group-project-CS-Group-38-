<?php
$metaTitle = '404 Error';
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/app/views/layout/header.php';
require_once __ROOT__ . '/app/views/layout/navigation.php';
?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/errorpage.css" rel="stylesheet">
</head>


<body>
    <p class="error-text">
        Oops! Page not found.<br />
        <span class="error-sub-text">The page you requested could not be found.</span>
    </p>
    <img class = "errorimg" src="../../../public/img/404error.png" alt="error_img" >
</body>

</html>