<?php
$images = ['images/carousel/picture00001.jpeg',
'images/carousel/picture00002.jpeg'];
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
