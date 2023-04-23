<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <h1>Upload App</h1>
    <form action="/admin/handledata" method="post" enctype="multipart/form-data">
        <label>App Name:</label>
        <input type="text" name="app_name" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Developer:</label>
        <input type="text" name="developer" required><br>
        <label>Image File:</label>
        <input type="file" name="image_file" required><br>
        <label>APK File:</label>
        <input type="file" name="apk_file" required><br>
        <input type="submit" name="submit" value="Upload">
    </form>
    <li><a href="/admin/logout">Logout</a></li>
    <li><a href="/admin/applist">Apps</a></li>
</body>

</html>