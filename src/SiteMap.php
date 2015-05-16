<?php
/*
 * This file is part of the SiteMapGenerator package.
 *
 * (c) Brack Romain <https://github.com/cyberomulus>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Cyberomulus\SiteMapGenerator;
 
use Cyberomulus\SiteMapGenerator\Entries\URLEntry;

/**
 * 
 * 
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
class SiteMap
	{
	private $urlEntries;
	
	public function __construct()
		{
		$this->urlEntries = array();
		}
	
	public function addUrlEntry(URLEntry $urlEntry)
		{
		$this->urlEntries[] = $urlEntry;
		return $this;
		}
	
	public function getUrlEntries()
		{
		return $this->urlEntries;
		}
	}