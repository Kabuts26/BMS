<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
	$name 	= $conn->real_escape_string($_POST['name']);
	$chair 	= $conn->real_escape_string($_POST['chair']);
    $pos 	= $conn->real_escape_string($_POST['position']);
	$contact 	= $conn->real_escape_string($_POST['contact']);

    if(!empty($name) && !empty($chair) && !empty($pos) && !empty($contact)){

        $insert  = "INSERT INTO tblofficials (`name`, `chairmanship`, `position`, `contact`) VALUES ('$name', '$chair','$pos', '$contact')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Official added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../officials.php");

	$conn->close();