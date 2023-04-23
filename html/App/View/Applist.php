<?php
// Start the session

$conn = mysqli_connect("localhost", "nikhil", "Nikhil@123", "app_store");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Get apps from the database
$query = "SELECT * FROM apps";
$result = mysqli_query($conn, $query);

// Fetch all apps from the result set
$apps = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - Apps</title>
</head>

<body>
    <h1>Apps</h1>
    <table>
        <tr>
            <th>App Name</th>
            <th>Description</th>
            <th>Developer</th>
            <th>Action</th>
        </tr>
        <?php foreach ($apps as $app) { ?>
            <tr>
                <td><?php echo $app['app_name']; ?></td>
                <td><?php echo $app['description']; ?></td>
                <td><?php echo $app['developer']; ?></td>
                <td>
                    <?php
                    // Store the app id in a session variable
                    // $_SESSION['app_id'] = $app['id'];
                    ?>
                    <a href="/admin/editapp">Edit</a>
                </td>
            </tr>

        <?php } ?>
    </table>
    <br>
    <a href="/admin/logout">Logout</a>
</body>

</html>