<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('generateStarRating')) {
    function generateStarRating($rating) {
        $fullStars = floor($rating);
        $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
        $emptyStars = 5 - $fullStars - $halfStar;

        $html = '<div class="star-rating">';
        for ($i = 0; $i < $fullStars; $i++) {
            $html .= '<i class="fas fa-star"></i>';
        }
        if ($halfStar) {
            $html .= '<i class="fas fa-star-half-alt"></i>';
        }
        for ($i = 0; $i < $emptyStars; $i++) {
            $html .= '<i class="far fa-star"></i>';
        }
        $html .= '</div>';

        return $html;
    }
}
