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

use \Joomla\CMS\Factory;
$document = Factory::getDocument();

// Include helper file
require_once dirname(__FILE__) . '/helpers/files-helper.php';

// Pass module params to JavaScript
$moduleParams = $document->getScriptOptions('mod_directorygallery');
$moduleParams[$module->id] = $params;
$document->addScriptOptions("mod_directorygallery", $moduleParams);

// Set some vars
$images = filesHelper::getImages($params);

// Call template file
require JModuleHelper::getLayoutPath('mod_directorygallery');