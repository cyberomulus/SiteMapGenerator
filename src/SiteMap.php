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
 * This class represent a site's map
 * 
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
class SiteMap
	{
	/**
	 * Array of URL entries
	 * 
	 * @var	array
	 * @see	URLEntry
	 */
	private $urlEntries;
	
	/**
	 * Construct a site's map
	 */
	public function __construct()
		{
		$this->urlEntries = array();
		}
	
	/**
	 * @param 	URLEntry	$urlEntry
	 * 				a URL entries to add
	 * 				
	 * @return 	SiteMap		this
	 */
	public function addUrlEntry(URLEntry $urlEntry)
		{
		$this->urlEntries[] = $urlEntry;
		return $this;
		}
	
	/**
	 * @return	array	Array of URL entries
	 */
	public function getUrlEntries()
		{
		return $this->urlEntries;
		}
	}