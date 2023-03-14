<?php
/*
echo "GET:<b>".$_GET['name']."</b><br>";
//$filePath = $_GET['name'];
$fileName = basename('1_1_2.xml');
$filePath = '../files/1/cfdi/'.$fileName;

if(!empty($fileName) && file_exists($filePath)){
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Type: application/xml");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile($filePath);
    exit;
}else{
    echo $filePath;
    echo '<br>The file does not exist-3';
}
*/
if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $carpeta2 = $_GET['carpeta'];
    $carpeta = trim($carpeta2);
    //$filePath = '../files/1/cfdi/'.$fileName;
    //echo "c:".$carpeta."<br>";
    //echo "f:".$fileName."<br>";
    $filePath = $carpeta.$fileName;
    //echo "-".$filePath."-";
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        // Read the file
        readfile($filePath);
        exit;
        //echo ' exist.';
    }else{
        echo 'The file does not exist.';
    }
}

?>
