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
 *
 *
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
 
abstract class Formatter
	{
	abstract public function formatSiteMap(SiteMap $siteMap);
	abstract public function formatSiteMapIndex(SiteMapIndex $siteMapIndex);
	}