

    <div class="container">

        <div class="row">
          <div class="col-lg-12">
             <form class="well" action="test2.php" method="post" enctype="multipart/form-data">
             <input type="hidden" name="action" value="register" />
          <div class="form-group">
          
            <label for="file">Select a file to upload</label>
            <input type="file" name="file">
            <p class="help-block">Only doc,docx and pdf file formats with maximum size of 1 MB  allowed.</p>
          </div>
          <input type="submit" class="btn btn-sm btn-success" value="Upload">
        </form>
      </div>
        </div>
    </div> <!-- /container -->

<?php 
//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name     = $_FILES['file']['name'];
  $tmpName  = $_FILES['file']['tmp_name'];
  $error    = $_FILES['file']['error'];
  $size     = $_FILES['file']['size'];
  $rand     = date('His');
  $newname  =$rand.$name;
  $ext    = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  
  switch ($error) {
    case UPLOAD_ERR_OK:
      $valid = true;
      //validate file extensions
      if ( !in_array($ext, array('doc','docx','pdf')) ) {
        $valid = false;
        $response = 'Invalid file extension.';
      }
      //validate file size
      if ( $size/1024/1024 > 2 ) {
        $valid = false;
        $response = 'File size is exceeding maximum allowed size.';
      }
      //upload file
      if ($valid) {
        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'facture' . DIRECTORY_SEPARATOR. $newname;
        move_uploaded_file($tmpName,$targetPath); 
        chmod("$targetPath",0644);
       
        exit;
      }
      break;
    case UPLOAD_ERR_INI_SIZE:
      $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
      break;
    case UPLOAD_ERR_PARTIAL:
      $response = 'The uploaded file was only partially uploaded.';
      break;
    case UPLOAD_ERR_NO_FILE:
      $response = 'No file was uploaded.';
      break;
    case UPLOAD_ERR_NO_TMP_DIR:
      $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
      break;
    case UPLOAD_ERR_CANT_WRITE:
      $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
      break;
    default:
      $response = 'Unknown error';
    break;
  }

  echo $response;
}
  
?>
