<?php
if (isset($_GET['multi'])) {
    $dir = $_GET['flag'];
    array_map('unlink', glob($dir));
    echo "Files deleted in {$dir}";
}
if (isset($_GET['sing'])) {
    $file = $_GET['sing'];
    unlink($file);
    echo "File: {$file} is deleted";
}
