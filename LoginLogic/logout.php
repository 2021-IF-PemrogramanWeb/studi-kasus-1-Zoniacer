<?php
// mengalihkan halaman ke halaman login
session_start();
$_SESSION = [];
session_abort();
session_destroy();

header("Location: login.php");
exit;

?>