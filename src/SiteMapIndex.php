<?php
/*
 * This file is part of the SiteMapGenerator package.
 *
 * (c) Brack Romain <cyberomulus.me@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Cyberomulus\SiteMapGenerator;

use Cyberomulus\SiteMapGenerator\Entries\SiteMapEntry;
 
/**
 * This class represent a index of site's map
 * 
 * @author cyberomulus - Brack Romain <cyberomulus.me@gmail.com>
 */
class SiteMapIndex
	{
	/**
	 * Array of SiteMap entries
	 *
	 * @var	array
	 * @see	SiteMapIndex
	 */
	private $SiteMapEntries;
	
	/**
	 * Construct a index of site's map
	 */
	public function __construct()
		{
		$this->SiteMapEntries = array();
		}
	
	/**
	 * Add one or more SiteMap entry in SiteMapIndex
	 *
	 * @param 	SiteMapEntry|SiteMapEntry[]		$siteMapEntry
	 * 				a URL entries to add
	 * @return 	SiteMapIndex		this
	 */
	public function addSiteMapEntry(SiteMapEntry $siteMapEntry)
		{
		if ($siteMapEntry == null)
			return;
		
		if (is_array($siteMapEntry))
			{
			$merge = array_merge($siteMapEntry, $this->SiteMapEntries);
			$this->SiteMapEntries = $merge;
			}
		else
			$this->SiteMapEntries[] = $siteMapEntry;
		
		return $this;
		}
		
	/**
	 * @return	array	Array of SiteMap entries
	 */
	public function getSiteMapEntries()
		{
		return $this->SiteMapEntries;
		}
	}