<?php 

$conn = mysqli_connect("localhost", "root", "", "chloe");

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function authReg($data) {
    global $conn;

    $username = strtolower(stripslashes($data ["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if( $password !== $password2) {
        echo "<script>
        alert('konfirmasi password ga sesuai !');
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die;

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}

?>