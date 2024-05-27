<?php
function myupload($file, $folder, &$msg = '', $types = ['.jpg', '.png', '.gif', '.jpeg', '.ico', '.svg'], $maxsize = 2, $name = 'file_')
{
    if (isset($file['error'], $file['tmp_name']) && $file['error'] == 0  && $file['tmp_name']) {
        $bsize = $maxsize * 1024 * 1024;
        if ($file['size'] > 0 && $file['size'] <= $bsize) {
            $ext = strtolower(substr($file['name'], strrpos($file['name'], '.')));
            if (in_array($ext, $types)) {
                $fullpath = $folder . '/' . $name . time() . $ext;
                if (move_uploaded_file($file['tmp_name'], $fullpath)) {
                    return $fullpath;
                } else {
                    $msg = 'Upload failed';
                    return false;
                }
            } else {
                $msg = 'Chỉ cho phép các định dạng sau: ' . implode(',', $types);
                return false;
            }
        } else {
            $msg = 'Dung lượng tối đa cho phép: ' . $maxsize . 'MB';
            return false;
        }
    } else {
        $msg = 'File không hợp lệ';
        return false;
    }
}
function check_array($a)
{
    echo '<pre>', print_r($a), '</pre>';
    exit;
}
function next_page($url)
{
    header('location: ' . $url);
    exit;
}
function is_login()
{
    return isset($_SESSION['login_status_']) &&  $_SESSION['login_status_'];
}
function msg($content, $type = 'danger')
{
    return  '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong> ' . $content . '</strong> 
  </div>
  
  <script>
    $(".alert").alert();
  </script>';
}

function currency_format($number, $suffix = '$')
{
    if (!empty($number)) {
        return "{$suffix}" . number_format($number, 0, ',', '.');
    }
}