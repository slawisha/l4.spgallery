<?php 
    //Delete folder function 
    function deleteDirectory($dir) { 

    if (!file_exists($dir)) return true; 
    if (!is_dir($dir) || is_link($dir)) return unlink($dir); 
        foreach (scandir($dir) as $item) { 
            if ($item == '.' || $item == '..') continue; 
            if (!deleteDirectory($dir . "/" . $item)) { 
                chmod($dir . "/" . $item, 0777); 
                if (!deleteDirectory($dir . "/" . $item)) return false; 
            }; 
        } 
        return rmdir($dir); 

    }

    //converts gallery url to gallery name 
    function galleryUrlToName($gallery_folder_url){

        $array = explode('/', $gallery_folder_url) ;

        $gallery_folder_name = array_pop($array);

        $gallery_folder = 'gal/' . Auth::user()->username . '/' . $gallery_folder_name;

        return $gallery_folder;
    }

    //converts image url to image name
    function imageUrlToName($image_url){

         $array = explode('/', $image_url) ;

         $image_name = array_pop($array);

         $gallery_name = array_pop($array);

         $image = 'gal/' . Auth::user()->username . '/' . $gallery_name . '/' . $image_name;

         return $image; 
    }

    function moveUploadedImages($fromFolder, $toFolder){
        //scan images uploaded by uploadify 
        $files = scandir($fromFolder);
        $movedImages = [];

        foreach ($files as $file) {
            if($file != '.' && $file != '..' ){
                //create the directory to move images to
                if(!is_dir($toFolder) && !file_exists($toFolder)) mkdir($toFolder, 0755, true);
                //move images
                rename($fromFolder. '\\' . $file, $toFolder . $file); 
                $movedImages[] = $file;

            }
        }

        return $movedImages;
    }
