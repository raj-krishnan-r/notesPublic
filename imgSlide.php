﻿<?php
include 'connect.php';
include 'session_check.php';
include 'elements.php';
?>
<!doctype html>
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/blueimp-gallery.min.css">
<link rel="stylesheet" href="style/bootstrap-image-gallery.min.css">
</head>
<body>
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">â€¹</a>
    <a class="next">â€º</a>
    <a class="close">Ã—</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="links">
          <?php
            $query = mysqli_query($link,"select id,file_name from image where userid = $userid") or die(mysqli_error($link));
            while($row = mysqli_fetch_array($query))
            {
                $id=$row['id'];
                $filename = $row['file_name'];
                if(typeImage($filename))
                echo '<a href="image.php?id='.$id.'" title="'.$filename.'" data-gallery><img src="image.php?thumb&id='.$id.'&size=100x100" alt="'.$filename.'" "></a>';
            }
            
            ?>

</div>
</body>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.blueimp-gallery.min.js"></script>
<script src="js/bootstrap-image-gallery.min.js"></script>
</html>
