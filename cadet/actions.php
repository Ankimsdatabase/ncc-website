<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

// setting header type to json, We'll be outputting a Json data
header('Content-type: application/json');

// Checking Email already Registered
// var_dump($_POST);

if (isset($_POST['email']) && isset($_POST['email_check'])) {
    $stuemail = $_POST['email'];
    $sql = "SELECT email FROM cadet WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

if (isset($_POST['regimental_no']) && isset($_POST['regimental_no_check'])) {
    $regimental_no = $_POST['regimental_no'];
    $sql = "SELECT regimental_no FROM cadet WHERE regimental_no='" . $regimental_no . "'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

// Inserting or Adding New Student
if (isset($_POST['cadet_registration']) && isset($_POST['regimental_no']) && isset($_POST['name']) && isset($_POST['password'])) {
    $regimental_no = $_POST['regimental_no'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "INSERT INTO cadet(regimental_no, name, password) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $regimental_no, $name, $password);

    if ($stmt->execute()) {
        echo json_encode("OK");
    } else {
        echo json_encode("FAILED");
    }
}

// Student Login Verification
if (!isset($_SESSION['is_login'])) {
    if (isset($_POST['regimental_no']) && isset($_POST['cadet_password'])) {
        $regimental_no = $_POST['regimental_no'];
        $cadet_password = $_POST['cadet_password'];

        $sql = "SELECT * FROM cadet WHERE regimental_no= ? AND password= ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $regimental_no, $cadet_password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $stmt->num_rows();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            $status = $row['status'];

            if ($status == 'pending' || $status == 'blocked') {
                // Send login failed message
                echo json_encode($status);
            } else {
                // Set login session
                $_SESSION['is_login'] = true;
                $_SESSION['regimental_no'] = $regimental_no;
                echo json_encode("OK");
            }
        } else {
            echo json_encode("FAILED");
        }
    }
}
