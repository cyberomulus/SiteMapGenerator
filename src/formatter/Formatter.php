<?php
/*
 * This file is part of the SiteMapGenerator package.
 *
 * (c) Brack Romain <https://github.com/cyberomulus>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Cyberomulus\SiteMapGenerator\Formatter;

use Cyberomulus\SiteMapGenerator\SiteMap;
use Cyberomulus\SiteMapGenerator\SiteMapIndex;

/**
 * Abstract class for all formatter
 *
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */ 
abstract class Formatter
	{
	/**
	 * Use for format and output a site's map
	 * 
	 * @param	SiteMap		$siteMap
	 * 				Site's map to format and output
	 */
	abstract public function formatSiteMap(SiteMap $siteMap);
	
	/**
	 * Use for format and output a index of site's map
	 * 
	 * @param	SiteMapIndex	$siteMapIndex
	 * 				Index of site's map to format and output
	 */
	abstract public function formatSiteMapIndex(SiteMapIndex $siteMapIndex);
	}