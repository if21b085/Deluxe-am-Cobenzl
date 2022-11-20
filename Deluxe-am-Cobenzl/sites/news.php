<?php

/**
 * Upload function
 * @param name the key in $_FILES
 * @return bool true on sucess, else false
 */
function processUpload($name) {

    //Only JPEG, PNG and GIFs are allowed
    $upload = $_FILES[$name];
    
    $type = mime_content_type($upload["tmp_name"]);
    echo "Type of upload: " . $type . "<br>";
    
    if (stripos($type, "gif") === false && stripos($type, "jpeg") === false && stripos($type, "png") === false) {
        echo "Upload failed - not an image ($type)<br>";
        return false;
    }
    
    list($width, $height, $type, $attr) = getimagesize($upload['tmp_name']);
           
    $ratio = $width / $height;
    $thumbnailWidth = 1280;
    $thumbnailHeight = 720;

    if ($width > $height) {
        $targetHeight = floor($thumbnailWidth / $ratio);
    }
    else {
        $targetWidth = floor($thumbnailWidth * $ratio);
    }
    
    $target = "uploads/" . uniqid('') . $upload['name'];
    $thumbnail = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);

    $sourceImage;

    switch($type){
        case 3: {
            $sourceImage = imagecreatefrompng($upload["tmp_name"]);
            break;
        }
        case 2: {
            $sourceImage = imagecreatefromjpeg($upload["tmp_name"]);
            break;
        }
        case 1: {
            $sourceImage = imagecreatefromgif($upload["tmp_name"]);
            break;
        }
    }

    try {
        if($type === 1 || $type === 3){
            imagecolortransparent(
                $thumbnail,
                imagecolorallocate($thumbnail, 0, 0, 0)
            );
        }
    
        if($type === 3){
            imagealphablending($thumbnail, false);
            imagesavealpha($thumbnail, true);
        }
        
        imagecopyresampled(
            $thumbnail,
            $sourceImage,
            0, 0, 0, 0,
            $thumbnailWidth, $thumbnailHeight,
            $width, $height
        );  
        
        if($type === 2){
            imagejpeg($thumbnail, $target);
        } else if($type === 1){
            imagegif($thumbnail, $target);
        }
        else if($type === 3){
            imagepng($thumbnail, $target);
        }

        echo "Upload successfull: $target<br>";
    } catch(Exception $e) {
        echo "Upload failed: " . $upload["tmp_name"] . " to " . $target . "<br>";
        return false;
    } 
    
    return true;
}
if (isset($_FILES["picture"])) {
    processUpload("picture");
}


$dir = opendir(__DIR__ . "/../uploads");
$processedFiles = [];
while (($filename = readdir($dir)) !== false) {
    $type = mime_content_type("uploads/" . $filename);
    if (stripos($type, "image") !== false) {
        array_push($processedFiles, "<article class='mt-5 mb-5'><h1>Die neuste Schlagzeile!</h1>"
        . "<p>Das ist ein Beitragstext</p>" 
        . "<img src='uploads/" . $filename . "' alt='an image' width='500'>"
        . "</article>") ;    
    }
}
closedir($dir);

$processedFilesReversed = array_reverse($processedFiles);

foreach($processedFilesReversed as $file) {
 echo $file;   
}

?>