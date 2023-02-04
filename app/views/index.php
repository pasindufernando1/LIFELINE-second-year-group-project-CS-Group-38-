<?php
    $metaTitle = "Login" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/app/views/layout/header.php');
    require_once(__ROOT__.'/app/views/layout/navigation.php');   
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/index.css" rel="stylesheet">
    </head>
    

    <body>
        <h1></h1>
        <div class="container">
            <p class="txt-1">Select your role in order to login</p>
            <a class="btn-1" href="/admin/login">Admin</a>
            <a class="btn-2" href="/systemuser/login">System User</a>
            <a class="btn-3" href="/hospitals/login">Hospitals/Medical Center</a>
            <a class="btn-4" href="/donor/login">Donor</a>
            <a class="btn-5" href="/organization/login">Organizations/Society</a>

        </div>
          
    </body>
</html>