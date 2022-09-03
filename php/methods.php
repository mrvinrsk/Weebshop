<?php
function random_float($min, $max)
{
    return ($min + lcg_value() * (abs($max - $min)));
}

function getPercentageAmount($amount, $percentage)
{
    return $amount * ((100 - $percentage) / 100);
}

function getStarString($rating, $ratings, $showCount)
{
    $starsString = "";
    for ($x = 0; $x < floor($rating); $x++) {
        $starsString .= "F";
    }

    $decimal = $rating - floor($rating);
    if ($decimal >= .5) {
        if ($decimal >= 8) {
            $starsString .= "F";
        } else {
            $starsString .= "H";
        }
    }

    while (strlen($starsString) < 5) {
        $starsString .= "N";
    }

    $starsString = str_replace('F', '<i class="bi bi-star-fill"></i>', $starsString);
    $starsString = str_replace('H', '<i class="bi bi-star-half"></i>', $starsString);
    $starsString = str_replace('N', '<i class="bi bi-star"></i>', $starsString);

    return $starsString . ($showCount ? " <span class='rating-count'>" . number_format($ratings, 0, ",", ".") . "</span>" : "");
}