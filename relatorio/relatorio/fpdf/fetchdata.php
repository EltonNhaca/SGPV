<?php
    $psw = $_POST["password"];

    // Create a connection
    $conn = new mysqli('localhost', 'root', 'root', 'sgpv');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
         // Query the database to fetch data
        $sql = "SELECT * FROM funcionario WHERE codigo_func = '$psw'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Return the data as JSON
            echo json_encode($row);
        } else {
            echo "No data found for the password: " . $password;
        }
    }

    $conn->close();
?>
