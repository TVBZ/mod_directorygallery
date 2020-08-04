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

use \Joomla\CMS\Uri\Uri;

class filesHelper
{

    // Get the images from folder
    public static function getImages($params)
    {

        // Set directory
        $directory = $params["path"];

        // Get files from directory
        $files = scandir($directory, (int)$params["sort"]);

        // Prepare to build images array
        $regex = '/(\.(' . $params['filetypes'] . ')$)/i';
        $images = array();
        $count = 1;

        // Loop over files
        foreach ($files as $file) :
            if (preg_match($regex, $file)) :

                $file_name = pathinfo($file, PATHINFO_FILENAME);
                $alt_text = preg_replace("/(_|-)/", " ", $file_name);

                $image = array(
                    "id" => $count,
                    "name" => $file_name,
                    "src" => Uri::root(true) . "/" . $directory . "/" . $file,
                    "alt" => ucfirst(strtolower($alt_text))
                );

                $images[] = $image;
                $count += 1;

            endif;
        endforeach;

        return $images;
    }
}
