<?php

require 'config.php';
session_start();

// create new business, for business user
if (isset($_POST['business_add_submit'])) {
	$businessName = $_POST['businessName'];
	$businessDescription = $_POST['businessDescription'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'business') {
		header("Location: ../list_of_businesses.php?error=not_allowed");
		exit();
	}

	// check if empty
	if (empty($businessName)) {
		header("Location: ../business_add.php?error=empty_businessName");
		exit();
	} else if (empty($businessDescription)) {
		header("Location: ../business_add.php?error=empty_businessDescription");
		exit();
	}

	// create business
	$query = "INSERT INTO businesses(name, createdBy, description) VALUES (:name, :createdBy, :description)";
	$stmt = $db->prepare($query);
	$res = $stmt->execute(array(':name' => $businessName, ':createdBy' => $createdBy, ':description' => $businessDescription));

	header("Location: ../list_of_my_businesses.php?confirm=success");
	exit();
}

// edit business, for business user
else if (isset($_POST['business_edit_submit'])) {
	$businessId = $_POST['businessId'];
	$businessName = $_POST['businessName'];
	$businessDescription = $_POST['businessDescription'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'business') {
		header("Location: ../list_of_my_businesses.php?error=not_allowed");
		exit();
	}
	
	// check if empty
	if (empty($businessName)) {
		header("Location: ../business_add.php?error=empty_businessName");
		exit();
	} else if (empty($businessDescription)) {
		header("Location: ../business_add.php?error=empty_businessDescription");
		exit();
	}

	// edit business
	$timestamp = strtotime($businessDate);
	$query = "UPDATE businesses set name = :name, description = :description where businesses.id = :businessId";
	$stmt = $db->prepare($query);
	$res = $stmt->execute(array(':name' => $businessName, ':description' => $businessDescription, ':businessId' => $businessId));

	header("Location: ../list_of_my_businesses.php?confirm=success");
	exit();
}

// delete business for business user
else if (isset($_POST['delete_business_submit'])) {
	$businessId = $_POST['businessId'];

	// check if logged in
	$createdBy = $_SESSION['id'];
	if ($createdBy == null) {
		header("Location: ../login.php?error=auth");
		exit();
	}

	// check role
	$role = $_SESSION['role'];
	if ($role != 'business') {
		header("Location: ../list_of_my_businesses.php?error=not_allowed");
		exit();
	}

	echo $businessId;

	// delete business
	try {
		$db->beginTransaction();

		$query = "DELETE from businesses where businesses.id = :id;";
		$stmt = $db->prepare($query);
		$stmt->execute(array(':id' => $businessId));

		$db->commit();
	} catch(Exception $e){
	    echo $e->getMessage();
		$db->rollBack();
	}

	header("Location: ../list_of_my_businesses.php?delete=success");
	exit();
}