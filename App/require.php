<?php
    // start session management
    session_start();
    // load requirements
    require('Config/Config.php');
    require('Controllers/BaseController.php');
    require('Config/Router.php');
    // init app
    $init = new App();
?>