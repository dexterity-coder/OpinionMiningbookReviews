<?php

include 'resize_img_code.php';

function secure($val) {
    $clean = htmlentities(addslashes($val));
    return $clean;
}

//getting date intervals
function gatDates($date) {
    $db_date = date_create($date);
    $current_date = date_create(date("Y-m-d H:i:s"));
    $date_diff = date_diff($current_date, $db_date);
    $min = $date_diff->format("%i");
    $day = $date_diff->format("%d");
    $month = $date_diff->format("%m");
    $hour = $date_diff->format("%h");
    $sec = $date_diff->format("%s");
    $year = $date_diff->format("%Y");
    if ($year > 0) {
        return $Year . " Year. " . $months . " months(s) ago ";
    } elseif ($month > 0) {
        return $month . " Month(s) " . $day . " day(s) ago ";
    } elseif ($month < 1 && $day > 0) {
        return $day . " day(s) " . $hour . " Hrs ago ";
    } elseif ($month < 1 && $day < 1 && $hour > 0) {
        return $hour . " Hr(s) " . $min . " mins ago ";
    } elseif ($month < 1 && $day < 1 && $hour < 1 && $min > 0) {
        return $min . " mins ago ";
    } else {
        return $sec . " secs ago ";
    }
}

//Upload audio media file 
function upload_audio($path1, $ext) {
    $aud_url = 'AUDIO' . '-' . date('mdYHis.') . $ext;
    $bool = move_uploaded_file($path1, "media/audio/" . $aud_url);
    if ($bool == TRUE) {
        return $aud_url;
    } else {
        return "";
    }
}

//Upload video media file 
function upload_video($paths, $ext) {
    $vid_url = 'VIDEO' . '-' . date('mdYHis.') . $ext;
    $bool = move_uploaded_file($paths, "media/video/" . $vid_url);
    if ($bool == TRUE) {
        return $vid_url;
    } else {
        return "";
    }
}

//Upload and Crop screenshot images 
function upload_screenshot($path, $ext, $sn) {
    $img_url = 'PHOTO' . $sn . '-' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(350, 350, 'exact');
    $resizeObj->saveImage("media/testifiers/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}

//Upload and Crop member images 
function upload_book_image($path, $ext) {
    $img_url = 'img_' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(463, 700, 'exact');
    $resizeObj->saveImage("images/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}

//Upload and Crop blog images 
function upload_art_img($path, $ext, $sn) {
    $img_url = 'ART' . $sn . '-' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(376, 134, 'exact');
    $resizeObj->saveImage("media/blog_images/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}

//Upload and Crop banner images 
function upload_gallery_image($path, $ext, $sn) {
    $img_url = 'BANNER' . $sn . '-' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(640, 380, 'exact');
    $resizeObj->saveImage("media/gallery/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}


function sendsms_post($url, array $params) {
    $params = http_build_query($params);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
}

function validate_sendsms($response) {
    $validate = explode('||', $response);
    if ($validate[0] == '1000') {
        //return TRUE;
        //return custom response here instead.
        return 1;
    } else {
        return FALSE;
        //return custom response here instead.
    }
}
