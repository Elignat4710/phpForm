<?php

namespace App\Models;

use App\Core\App;

class Profile
{
    public function insert($data, $file)
    {
        $fullFilePath = null;
        if(isset($file['photo']['name']) && !empty($file['photo']['name'])) {
            $photoName = $file['photo']['name'];
            $photoTmpName = $file['photo']['tmp_name'];
            $folderName = 'public/image/' . $_POST['idUser'];
            echo "\n$folderName";

            if (!is_dir($folderName)) {
                mkdir('public/image/' . $_POST['idUser']);
            }

            $fullFilePath = 'public/image/' . $_POST['idUser'] . '/' . $photoName;
            move_uploaded_file($photoTmpName, $fullFilePath);
        }

        $data += ['photo' => $fullFilePath];

        return App::get('database')->insert('profile', $data);
    }
}