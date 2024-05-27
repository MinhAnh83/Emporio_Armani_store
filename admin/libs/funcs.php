<?php
function myupload($file, $folder, &$msg = '', $types = ['.jpg', '.png', '.gif', '.jpeg', '.ico', '.svg'], $maxsize = 2, $name = 'file_')
{
    //kiem tra tinh hop le cua file up len server
    if (isset($file['error'], $file['tmp_name']) && $file['error'] == 0  && $file['tmp_name']) {
        //kiem tra kich thuoc
        $bsize = $maxsize * 1024 * 1024;
        if ($file['size'] > 0 && $file['size'] <= $bsize) {
            //kiem tra loai file
            //lay duoi file
            $ext = strtolower(substr($file['name'], strrpos($file['name'], '.')));
            if (in_array($ext, $types)) {
                //ok het roi chuyen ve file goc
                $fullpath = $folder . '/' . $name . time() . $ext;
                //up
                if (move_uploaded_file($file['tmp_name'], $fullpath)) {
                    return $fullpath;
                } else {
                    $msg = 'Upload failed';
                    return false;
                }
            } else {
                $msg = 'just accept tpye file: ' . implode(',', $types);
                return false;
            }
        } else {
            $msg = 'Maximum allowed image size: ' . $maxsize . 'MB';
            return false;
        }
    } else {
        $msg = 'Invalid file';
        return false;
    }
}
function check_array($a)
{
    echo '<pre>', print_r($a), '</pre>';
    exit;
}
function netx_page($url)
{
    header('location: ' . $url);
    exit;
}
function is_login()
{
    return isset($_SESSION['login_status']) &&  $_SESSION['login_status'];
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