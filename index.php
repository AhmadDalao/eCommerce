<?php

include "init.php";

$categories = getCategories();
foreach ($categories as $category) {
    echo "<p>" . $category['name'] . "</p>";
}

include $template .  "footer.php";
