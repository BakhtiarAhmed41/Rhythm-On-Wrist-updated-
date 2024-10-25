<?php
function displayWatch($imagePath, $altText = "") {
    echo '<div class="vin_img" data-aos="fade-down">
            <img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($altText) . '">
          </div>';
}
?>