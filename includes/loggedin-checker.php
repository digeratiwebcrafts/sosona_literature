<?php
if ($_SESSION['user_type'] == 'Member') {
    header('Location: dashboard-public.php');
    exit;
}
?>