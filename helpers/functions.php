<?php
namespace Helpers;

function redirect($url)
{
    header('Location: ' . URLROOT . '/' . $url);
    exit;
}

function isLoggedIn()
{
    return Session::isLoggedIn();
}

function isAdmin()
{
    return Session::isLoggedIn('admin');
}

function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        if (!empty($message) && empty(Session::get($name))) {
            Session::set($name, $message);
            Session::set($name . '_class', $class);
        } elseif (empty($message) && !empty(Session::get($name))) {
            $class = !empty(Session::get($name . '_class')) ? Session::get($name . '_class') : $class;
            echo '<div class="' . $class . '">' . Session::get($name) . '</div>';
            Session::unset($name);
            Session::unset($name . '_class');
        }
    }
}

function uploadImage($file, $targetDir = 'assets/uploads/')
{
    $targetFile = $targetDir . basename($file['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $uploadOk = 1;

    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        return ['success' => false, 'message' => 'File is not an image.'];
    }

    if (file_exists($targetFile)) {
        $targetFile = $targetDir . uniqid() . '.' . $imageFileType;
    }

    if ($file['size'] > 5000000) {
        return ['success' => false, 'message' => 'File is too large.'];
    }

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        return ['success' => false, 'message' => 'Only JPG, JPEG, PNG & GIF files are allowed.'];
    }

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return ['success' => true, 'file' => $targetFile];
    } else {
        return ['success' => false, 'message' => 'Error uploading file.'];
    }
}
