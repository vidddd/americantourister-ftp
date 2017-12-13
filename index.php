<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TBWA\ FTP FILE MANAGER</title>
    <!-- vendor css -->
    <link href="index_files/font-awesome.css" rel="stylesheet">
    <link href="index_files/ionicons.css" rel="stylesheet">
    <link href="index_files/perfect-scrollbar.css" rel="stylesheet">
    <!-- Katniss CSS -->
    <link rel="stylesheet" href="index_files/katniss.css">
</head>
  <body>
    <!-- ##### SIDEBAR MENU ##### -->
    <!-- ##### HEAD PANEL ##### -->
    <div class="kt-headpanel">
      <div class="kt-headpanel-left">
        <img src="index_files/cabecera.jpg" class="imagencabecera">
      </div><!-- kt-headpanel-left -->
    </div><!-- kt-headpanel -->

    <!-- ##### MAIN PANEL ##### -->
    <div class="kt-mainpanel">

      <div class="kt-pagebody">
        <div class="content-wrapper">
          <div class="content-left">
            <label class="content-left-label">Browse Files</label>
            <ul class="nav mg-t-1-force">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="icon ion-ios-folder-outline"></i>
                  <span>All Files</span>
                </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="icon ion-ios-folder-outline"></i>
                  <span>Recently Added</span>
                </a>
              </li><!-- nav-item -->
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="icon ion-ios-folder-outline"></i>
                  <span>Recently Viewed</span>
                </a>
              </li><!-- nav-item -->
            </ul>
          </div><!-- content-left -->
          <div class="content-body">

            <table class="table table-striped mg-b-0 mg-t-20">
              <thead>
                <tr>
                  <th>Name</th><th>Size</th><th>Modified</th>
                </tr>
              </thead>
                <?php

              // Include the DirectoryLister class
              require_once('resources/DirectoryLister.php');

              // Initialize the DirectoryLister object
              $lister = new DirectoryLister();

              // Restrict access to current directory
              ini_set('open_basedir', getcwd());

              // Return file hash
              if (isset($_GET['hash'])) {

                  // Get file hash array and JSON encode it
                  $hashes = $lister->getFileHash($_GET['hash']);
                  $data   = json_encode($hashes);

                  // Return the data
                  die($data);

              }

              if (isset($_GET['zip'])) {

                  $dirArray = $lister->zipDirectory($_GET['zip']);

              } else {

                  // Initialize the directory array
                  if (isset($_GET['dir'])) {
                      $dirArray = $lister->listDirectory($_GET['dir']);
                  } else {
                      $dirArray = $lister->listDirectory('.');
                  }

                  // Define theme path
                  if (!defined('THEMEPATH')) {
                      define('THEMEPATH', $lister->getThemePath());
                  }
                //  echo $lister->getThemePath(true) ; die;
                  // Set path to theme index
                  $themeIndex = $lister->getThemePath(true) . '/index.php';

                  // Initialize the theme
                  if (file_exists($themeIndex)) {
                      include($themeIndex);
                  } else {
                      die('ERROR: Failed to initialize theme');
                  }

              }
          ?>
              </tbody>
            </table>
          </div><!-- content-body -->
        </div><!-- content-wrapper -->
      </div><!-- kt-pagebody -->
      <div class="kt-footer" style="text-align:center">
        TBWA\ FTP Manager
      </div>
    </div><!-- kt-mainpanel -->
</body></html>
