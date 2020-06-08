<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
 ?>
<script>
    document.location.replace("login.php") ;
</script>
