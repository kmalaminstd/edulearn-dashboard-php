<?php

    session_name('eduwebdash_ui');
    session_start();

    session_unset();

    session_destroy();

    header('Location: admin-login.php');

?>