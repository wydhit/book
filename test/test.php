<?php


$q = [
    "/news/detail.php?id=396",
    "/hotel/hoteldetail.php?id=276",
    "/hotel/hoteldetail.php?id=285",
    "/hotel/hoteldetail.php?id=300",
    "/hotel/hoteldetail.php?id=294",
    "/hotel/hoteldetail.php?id=274"
];

foreach ($q as $item) {
    file_get_contents("http://www.ejiayuding.com".$item);
}