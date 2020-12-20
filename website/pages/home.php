<?php
$images = ['images/carousel/picture00001.jpg',
'images/carousel/picture00002.jpg',
'images/carousel/picture00003.jpg',
'images/carousel/picture00004.jpg',
'images/carousel/picture00005.jpg',
'images/carousel/picture00006.jpg',
'images/carousel/picture00007.jpg',
'images/carousel/picture00008.jpg',
'images/carousel/picture00009.jpg',
'images/carousel/picture00010.jpg'];
?>
<div class="row">
  <div id="cycler">
    <?php
    for ($i=0; $i < count($images); $i++) {
      if ($i==0) {
        echo "<img class=\"active\" src=\"$images[$i]\" alt=\"\">";
      } else {
        echo "<img src=\"$images[$i]\" alt=\"\">";
      }
    }
    ?>
  </div>
</div>
