<?php

/**
 * @name        Directory Gallery
 * @copyright	Copyright (C) 2020 All rights reserved
 * @license		GPLv3 or later; see https://github.com/TVBZ/mod_directorygallery/blob/master/LICENSE
 * @author		Tom F. Vanbrabant, a.k.a. TVBZ
 * 
 * https://github.com/TVBZ/mod_directorygallery
 * 
 **/


// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;

$document = Factory::getDocument();
$assets = Uri::root(true) . "/modules/mod_directorygallery/assets/";

// Load CSS
if ($params["loadcss"] === "cdn") {
    $document->addStyleSheet("https://cdn.jsdelivr.net/npm/lightgallery@1/src/css/lightgallery.min.css");
    if ($params["transition"] !== "lg-slide" && $params["transition"] !== "lg-fade") $document->addStyleSheet("https://cdn.jsdelivr.net/npm/lightgallery@1/src/css/lg-transitions.min.css");
} else {
    $document->addStyleSheet($assets . "lightgallery/css/lightgallery.min.css");
    if ($params["transition"] !== "lg-slide" && $params["transition"] !== "lg-fade") $document->addStyleSheet($assets . "lightgallery/css/lg-transitions.min.css");
}
if ($params["theme"]) $document->addStyleSheet($assets . "css/" . $params["theme"]);

// Load JavaScript
if ($params["loadjs"] === "cdn") {
    $cdn = "https://cdn.jsdelivr.net/combine/npm/lightgallery";
    if ($params["autoplay"]) $cdn .= ",npm/lg-autoplay";
    if ($params["fullscreen"]) $cdn .= ",npm/lg-fullscreen";
    if ($params["hash"]) $cdn .= ",npm/lg-hash";
    if ($params["pager"]) $cdn .= ",npm/lg-pager";
    if ($params["share"]) $cdn .= ",npm/lg-share";
    if ($params["thumbnails"]) $cdn .= ",npm/lg-thumbnail";
    if ($params["zoom"]) $cdn .= ",npm/lg-zoom";
    $document->addScript($cdn, "text/javascript", true, false);
} elseif ($params["loadjs"] === "local") {
    $document->addScript($assets . "lightgallery/js/lightgallery.min.js", "text/javascript", true, false);
    if ($params["autoplay"]) $document->addScript($assets . "lightgallery/js/lg-autoplay.min.js", "text/javascript", true, false);
    if ($params["fullscreen"]) $document->addScript($assets . "lightgallery/js/lg-fullscreen.min.js", "text/javascript", true, false);
    if ($params["hash"]) $document->addScript($assets . "lightgallery/js/lg-hash.min.js", "text/javascript", true, false);
    if ($params["pager"]) $document->addScript($assets . "lightgallery/js/lg-pager.min.js", "text/javascript", true, false);
    if ($params["share"]) $document->addScript($assets . "lightgallery/js/lg-share.min.js", "text/javascript", true, false);
    if ($params["thumbnails"]) $document->addScript($assets . "lightgallery/js/lg-thumbnail.min.js", "text/javascript", true, false);
    if ($params["zoom"]) $document->addScript($assets . "lightgallery/js/lg-zoom.min.js", "text/javascript", true, false);
} elseif ($params["loadjs"] === "localcombined") {
    $document->addScript($assets . "lightgallery/js/lightgallery-all.min.js", "text/javascript", true, false);
}
if ($params["mousewheel"]) {
    if ($params["loadjs"] === "cdn") $document->addScript("https://cdn.jsdelivr.net/npm/jquery.mousewheel@3/jquery.mousewheel.min.js", "text/javascript", true, false);
    else $document->addScript($assets . "js/jquery.mousewheel.min.js", "text/javascript", true, false);
}
$document->addScript($assets . "js/init.gallery.min.js", "text/javascript", true, false);

?>


<div id="light-gallery-<?php echo $module->id; ?>" class="light-gallery">
    <?php foreach ($images as $image) : ?>
        <div class="lg-img-container lg-img-<?php echo $image["id"]; ?>" data-src="<?= $image["src"] ?>">
            <img alt="<?php echo $image["alt"]; ?>" src="<?= $image["src"] ?>" />
        </div>
    <?php endforeach; ?>
</div>