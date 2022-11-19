<?php

/**
 * Upload function
 * @param name the key in $_FILES
 * @return bool true on sucess, else false
 */
function processUpload($name) {

   
    $upload = $_FILES[$name];
    $target = "uploads/" . uniqid('img_');

    $type = mime_content_type($upload["tmp_name"]);
    echo "Type of upload: " . $type . "<br>";
    
    if (stripos($type, "image") === false) {
        echo "Upload failed - not an image ($type)<br>";
        return false;
    }     

    if (move_uploaded_file($upload["tmp_name"], $target) === true) {
        echo "Upload successfull: $target<br>";
    } else {
        echo "Upload failed: " . $upload["tmp_name"] . " to " . $target . "<br>";
        return false;
    }     
    
    return true;
}
if (isset($_FILES["picture"])) {
    processUpload("picture");
}


echo "<h2>Images in uploads directory</h2>";
echo "<ul>";


$dir = opendir("C:xampp\htdocs\Deluxe-am-Cobenzl\Deluxe-am-Cobenzl\uploads");
while (($filename = readdir($dir)) !== false) {
    $type = mime_content_type("uploads/" . $filename);
    if (stripos($type, "image") !== false) {
        echo "<li>" . $filename . "<br>" 
            . "<img src='uploads/" . $filename . "' alt='an image' width='500'>"
            . "</li>";    
    }
}
closedir($dir);

echo "</ul>";

?>