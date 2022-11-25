<?php
session_start();
$_SESSION['user_id'] = '';
unset($_SESSION['user_id']); 
session_destroy();  
?>
<script type="text/javascript">
	sessionStorage.removeItem('user_id');
	window.location.href = 'index.php';
</script>