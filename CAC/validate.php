<?php
session_start();

// Database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username'])) {
    $full_name = trim($_POST['username']);

    $stmt = $conn->prepare("SELECT id, fullname FROM users WHERE fullname = ?");
    $stmt->bind_param("s", $full_name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_full_name);
        $stmt->fetch();

        // Set session variables
        $_SESSION['id'] = $id;
        $_SESSION['fullname'] = $db_full_name;

        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
    $stmt->close();
    $conn->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Validation</title>
</head>
<body>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const userDetailsJSON = localStorage.getItem("userDetails");
    const userDetails = JSON.parse(userDetailsJSON);

    if (!userDetails || !userDetails.name) {
        window.location.href = "login.html?a=failedcredentials";
        return;
    }

    // Send fullname to validate.php
    fetch("validate.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "username=" + encodeURIComponent(userDetails.name)
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            window.location.href = "home.php";
        } else {
            window.location.href = "login.html";
        }
    })
    .catch(err => {
        console.error("Error:", err);
        window.location.href = "login.html";
    });
});
</script>

</body>
</html>
