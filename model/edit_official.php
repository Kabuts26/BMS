<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
    $id 	= $conn->real_escape_string($_POST['id']);
	$name 	= $conn->real_escape_string($_POST['name']);
	$chair 	= $conn->real_escape_string($_POST['chair']);
    $pos 	= $conn->real_escape_string($_POST['position']);
	$contact = $conn->real_escape_string($_POST['contact']);

	if(!empty($id)){

		$query 		= "UPDATE tblofficials SET `name`='$name', `chairmanship`='$chair', `position`='$pos', `contact`='$contact' WHERE id=$id;";	
		$result 	= $conn->query($query);

		if($result === true){
            
			$_SESSION['message'] = 'Brgy Official has been updated!';
			$_SESSION['success'] = 'success';

		}else{

			$_SESSION['message'] = 'Somethin went wrong!';
			$_SESSION['success'] = 'danger';
		}

	}else{
		$_SESSION['message'] = 'No Brgy Official ID found!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../officials.php");

	$conn->close();