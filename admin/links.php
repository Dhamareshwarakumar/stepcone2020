<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: error.php');
    exit;
}
?>
<a href="user_reg.php">User Registrations</a>
<a href="event_reg.php">Event Registrations</a>