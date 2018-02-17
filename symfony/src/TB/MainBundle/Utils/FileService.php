<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06-09-17
 * Time: 13:52
 */

namespace TB\MainBundle\Utils;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function moveUploadedFile(UploadedFile $file)
    {
        $originalName = $file->getClientOriginalName();
        $newName = uniqid().$originalName;
        $file->move(__DIR__."/../../../../web/assets/image/game", $newName);
        return "assets/image/game/".$newName;
    }
}