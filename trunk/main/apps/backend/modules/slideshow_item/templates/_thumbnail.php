<?php

if ($SlideshowItem->getImageToken()) {
    $basepath = $SlideshowItem->getImageBasePath();
    if (file_exists($basepath . DIRECTORY_SEPARATOR . $SlideshowItem->getImageToken())) {
        echo '<img src="/uploads/slideshow_item/' . $SlideshowItem->getId() . '/' . $SlideshowItem->getImageToken() . '" width="200"/>';
    } else {
        echo '<img src="/images/common/noimage/100.png">';
    }
} else {
    echo '<img src="/images/common/noimage/100.png">';
}
?>