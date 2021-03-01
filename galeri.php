<?php

include 'header.php';
require_once 'include/auth.php';
require "include/function.php";

$sql = mysqli_query($link, "SELECT * FROM nasabahlunas ORDER BY id DESC");
if (isset($_POST['searchnasabahlunas'])) {
  $sql = carinasabahlunas($_POST['carinasabahlunas']);
}

?>

<main>
  <style>
  .container-fluid .gallery a img {
    float: left;
    width: 20%;
    height: auto;
    border: 2px solid #fff;
    -webkit-transition: -webkit-transform .15s ease;
    -moz-transition: -moz-transform .15s ease;
    -o-transition: -o-transform .15s ease;
    -ms-transition: -ms-transform .15s ease;
    transition: transform .15s ease;
    position: relative;
  }

  .container-fluid .gallery a:hover img {
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -o-transform: scale(1.05);
    -ms-transform: scale(1.05);
    transform: scale(1.05);
    z-index: 5;
  }

  .clear {
    clear: both;
    float: none;
    width: 100%;
  }
  </style>
</script>
<div class="container-fluid">
  <h1 class="mt-4">Gallery</h1>
  <div class="card mb-4">
    <div class="card-header">File
    </div>
    <div class="gallery">
      <?php
      // Image extensions
      $image_extensions = array("png", "jpg", "jpeg", "gif");

      // Target directory
      $dir = 'upload';
      if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
          $count = 1;
          // Read files
          while (($file = readdir($dh)) !== false) {
            if ($file != '' && $file != '.' && $file != '..') {
              // Thumbnail image path
              $thumbnail_path = "upload/" . $file;
              // Image path
              $image_path = "upload/" . $file;
              $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
              $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
              // Check its not folder and it is image file
              if (
                !is_dir($image_path) &&
                in_array($thumbnail_ext, $image_extensions) &&
                in_array($image_ext, $image_extensions)
              ) {
                ?>
                <!-- Image -->
                <a href="<?php echo $image_path; ?>">
                  <img src="<?php echo $thumbnail_path; ?>" alt="" title="" />
                </a>
                <!-- --- -->
                <?php
                // Break
                if ($count % 4 == 0) {
                  ?>
                  <div class="clear"></div>
                  <?php
                }
                $count++;
              }
            }
          }
          closedir($dh);
        }
      }
      ?>
    </div>
  </div>
</div>
</main>

<?php

include 'footer.php';

?>
