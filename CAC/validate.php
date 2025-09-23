<?php
session_start();
include 'db.php';

// ✅ Handle fetch request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['name'])) {
    $full_name = trim($_POST['name']);

    // Check if user exists (by fullname)
    $stmt = $conn->prepare("SELECT id, fullname FROM users WHERE fullname = ?");
    $stmt->bind_param("s", $full_name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // ✅ User exists
        $stmt->bind_result($id, $db_full_name);
        $stmt->fetch();
    } else {
        // ❌ User not found → insert new user
        $stmt->close();

        $insert = $conn->prepare("INSERT INTO users (fullname) VALUES (?)");
        $insert->bind_param("s", $full_name);

        if ($insert->execute()) {
            $id           = $insert->insert_id;
            $db_full_name = $full_name;
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to insert user"]);
            $insert->close();
            $conn->close();
            exit();
        }
        $insert->close();
    }

    // ✅ Set session variables
    $_SESSION['id']       = $id;
    $_SESSION['fullname'] = $db_full_name;

    echo json_encode(["status" => "success"]);
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

    // Send only fullname
    const formBody = "name=" + encodeURIComponent(userDetails.name);

    fetch("validate.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: formBody,
        credentials: "same-origin"   // ✅ keep session working
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
