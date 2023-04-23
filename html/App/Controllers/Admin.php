<?php

namespace App\Controllers;

use App\Model\Insertdata as insert_data;

class Admin
{
    private $db;
    public function __construct()
    {
        $this->db = new insert_data();
    }
    public function login()
    {
        if (isLoggedIn()) {
            header("Location:/admin/home");
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["username"] == "admin" && $_POST["password"] == "password") {
                $data = [
                    "username" => $_POST["username"],
                    "password" => $_POST["password"],
                ];
                setSession($data);
                header("Location:/admin/home");
                exit();
            } else {
                echo "invalid user/password";
            }
        } else {
            require_once APPROOT . "/View/Adminpage.php";
        }
    }
    public function home()
    {
        if (!isLoggedIn()) {
            header("Location:/admin/login");
            exit();
        } else {
            require_once APPROOT . "/View/Adminhome.php";
        }
    }
    public function logout()
    {
        logOut();
        header("Location:/admin/login");
        exit();
    }
    public function applist()
    {
        require_once APPROOT . "/View/Applist.php";
    }
    public function editapp()
    {
        require_once APPROOT . "/View/Editapp.php";
    }
    public function handledata()
    {


        if (isset($_POST['submit'])) {
            $appName = $_POST['app_name'];
            $description = $_POST['description'];

            $developer = $_POST['developer'];

            $imageFile = $_FILES['image_file'];

            $apkFile = $_FILES['apk_file'];


            // Upload Image File
            $imageFileName = $_FILES['image_file']['name'];
            $imageFileTmpName = $_FILES['image_file']['tmp_name'];
            $imageFileDestination = 'uploads/' . $imageFileName;
            move_uploaded_file($imageFileTmpName, $imageFileDestination);

            // Upload APK File
            $apkFileName = $_FILES['apk_file']['name'];
            $apkFileTmpName = $_FILES['apk_file']['tmp_name'];
            $apkFileDestination = 'uploads/' . $apkFileName;
            move_uploaded_file($apkFileTmpName, $apkFileDestination);

            $data = [
                "appName" => $appName,
                "description" => $description,
                "developer" => $developer,
                "imageFile" => $imageFileDestination,
                "apkFile" => $apkFileDestination
            ];
            // $result = $this->db->putdata($appName, $description, $developer, $imageFileDestination, $apkFileDestination);
            $result = $this->db->putdata($data);
            if ($result) {
                // Redirect to success page
                echo "succes";
            } else {
                // Redirect to error page
                echo "no success";
            }
        }
    }
}
