<?php

// Database Connection
$conn = mysqli_connect("localhost", "nikhil", "Nikhil@123", "app_store");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get app details from the database
// $appId = $_GET['id']; // Get the app ID from URL parameter
$appId = $_SESSION['app_id'];
echo $appId;
$query = "SELECT * FROM apps WHERE id = $appId";
$result = mysqli_query($conn, $query);
$app = mysqli_fetch_assoc($result);

// Check if the app exists
if (!$app) {
    die("App not found");
}

// Update app details in the database if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $app_name = $_POST['app_name'];
    $description = $_POST['description'];
    $developer = $_POST['developer'];

    // Update the app details in the database
    $query = "UPDATE apps SET app_name = '$app_name', description = '$description', developer = '$developer' WHERE id = $appId";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        echo "App details updated successfully.";
    } else {
        echo "Error updating app details: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - Edit App</title>
</head>

<body>
    <h1>Edit App</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="app_name">App Name:</label>
        <input type="text" name="app_name" value="<?php echo $app['app_name']; ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $app['description']; ?></textarea><br>
        <label for="developer">Developer:</label>
        <input type="text" name="developer" value="<?php echo $app['developer']; ?>" required><br>
        <input type="submit" value="Save">
    </form>
    <br>
    <a href="/admin/logout">Logout</a>
</body>

</html>