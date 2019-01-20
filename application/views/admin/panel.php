<div class="container">
  <?php
    foreach ($list as $rows) {
        echo '<div class="row">';
            echo '<h3>'. $rows['h3'] .'</h3>';

            foreach ($rows['liste'] as $row) {
                echo '<p><a class="" href="'. $row['link'] .'">'. $row['text'] .'</a></p>';
            }

        echo "</div>";
    }
  ?>
</div>
