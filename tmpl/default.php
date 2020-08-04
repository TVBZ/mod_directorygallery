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

// Set some vars
use Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;

$document = Factory::getDocument();

// Light Gallery CSS
$document->addStyleSheet("https://cdn.jsdelivr.net/npm/lightgallery@1/src/css/lightgallery.min.css");
if ($params["transition"] !== "lg-slide" && $params["transition"] !== "lg-fade") :
    $document->addStyleSheet("https://cdn.jsdelivr.net/npm/lightgallery@1/src/css/lg-transitions.min.css");
endif;

// Custom styles
$document->addStyleSheet(Uri::root(true) . "/modules/mod_directorygallery/assets/css/grid.css");

// Get JS from jsdeliver CDN
$cdn = "https://cdn.jsdelivr.net/combine/npm/lightgallery";
if ($params["autoplay"]) $cdn .= ",npm/lg-autoplay";
if ($params["fullscreen"]) $cdn .= ",npm/lg-fullscreen";
if ($params["hash"]) $cdn .= ",npm/lg-hash";
if ($params["pager"]) $cdn .= ",npm/lg-pager";
if ($params["share"]) $cdn .= ",npm/lg-share";
if ($params["thumbnails"]) $cdn .= ",npm/lg-thumbnail";
if ($params["zoom"]) $cdn .= ",npm/lg-zoom";
$document->addScript($cdn, "text/javascript", true, false);

// Initialize gallery
$document->addScript(Uri::root(true) . "/modules/mod_directorygallery/assets/js/init.gallery.min.js", "text/javascript", true, false);

?>


<div id="light-gallery-<?php echo $module->id; ?>" class="light-gallery">
    <?php foreach ($images as $image) : ?>
        <div class="lg-img-container lg-img-<?php echo $image["id"]; ?>" data-src="<?= $image["src"] ?>">
            <img alt="<?php echo $image["alt"]; ?>" src="<?= $image["src"] ?>" />
        </div>
    <?php endforeach; ?>
</div>