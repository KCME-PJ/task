<?php
if (isset($_POST['site_name'])) {
    $site = $_POST['site_name'];
}
if (isset($_POST['img_type'])) {
    $img = $_POST['img_type'];
}
if (isset($_POST['contents'])) {
    $comment = $_POST['contents'];
    echo $site, $img, $comment;
}
