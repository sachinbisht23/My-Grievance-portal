<?php
if(isset($_GET['id'])&& is_numeric($_GET['id'])){
    $complaint_id = $_GET['id'];
}else{
    header("Location:admin_page.php?error+missingID");
    exit;
}

$db = new mysqli("localhost","root","","greivance");

$sql = "SELECT "
