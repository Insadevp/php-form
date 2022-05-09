	<?php
    $files = array_slice(scandir('themes/'), 2);
    echo '<select name="theme">';
    foreach ($files as $file) {
        echo '<option value="' . $file . '">' . $file . '</option>';
    }
    echo '</select>';
    ?>