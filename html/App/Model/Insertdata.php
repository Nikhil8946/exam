<?php

namespace App\Model;

use App\Libraries\Database;

/**
 * Summary of Insertdata
 */
class Insertdata
{
    /**
     * Summary of db
     * @var
     */
    private $db;
    /**
     * Summary of __construct
     * 
     */
    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * This fucntion add values to database
     * @param mixed $data
     * @return string
     */
    public function putdata($data)
    {
        $appName = $data['appName'];
        $description = $data['description'];
        $developer = $data['developer'];
        $imageFile = $data['imageFile'];
        $apkFile = $data['apkFile'];
        // Insert App Details into Database
        $sql = "INSERT INTO apps (app_name, description, image, developer, apk_file) 
    VALUES ('$appName', '$description', '$imageFile', '$developer', '$apkFile')";

        // if (mysqli_query($conn, $sql)) {
        //     echo "App uploaded successfully.";
        // } else {
        //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        // }
        // $result = $this->db->execute($sql);
        // // returns result
        // return $result;
        if ($this->db->execute($sql)) {
            return "App uploaded successfully.";
        } else {
            return "Error: ";
        }
    }
}
