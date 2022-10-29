<?php 
session_start();

$id = $_GET['id'];
$page = $_GET['page'];
$limitrecord = $_GET['record_per_page'];
$sort_order = $_GET['sort_order'];
$sort_by = $_GET['sort_by'];
$search = $_GET['search'];

	include('connection.php');

	$sql = "delete from users where id = $id";
	mysqli_query($conn, $sql);
	$_SESSION['data_status'] = "Data Deleted Successfully.";
	header('Location: list.php?page=1&record_per_page='.$limitrecord.'&sort_order='.$sort_order.'&sort_by='.$sort_by.'&search='.$search);
?>