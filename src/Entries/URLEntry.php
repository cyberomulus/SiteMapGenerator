<?php
/*
 * This file is part of the SiteMapGenerator package.
 *
 * (c) Brack Romain <https://github.com/cyberomulus>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Cyberomulus\SiteMapGenerator\Entries;

use Cyberomulus\SiteMapGenerator\Entries\GoogleImageEntry;
use Cyberomulus\SiteMapGenerator\Entries\SiteMapEntry;
 
/**
 * This class represent an URL entry
 * 
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
class URLEntry extends SiteMapEntry
	{
	/**
	 * Array of image entries for Google
	 *
	 * @var	array
	 * @see	GoogleImageEntry
	 */
	private $googleImageEntries;
	
	/**
	 * Construct an URL entries
	 * 
	 * @param	String 		$url
	 * 				Location's URL
	 * @param	\DateTime|null	$lastModification
	 * 				Date of URL's last modification.<br />
	 * 				Set null for not display
	 * @param	string|null		$changeFrequence
	 * 				Interval of URL's frequency change.<br />
	 * 				Use a this class's constant (CHANGE_FEQUENCE_...).<br />
	 * 				Set null for not display
	 * @param	string|null 	$priority
	 * 				The priority of this URL relative to other URLs on your site.<br />
	 * 				Set null for not display
	 * @param	GoogleImageEntry[]	$googleImageEntries
	 * 				An array of GoogleImageEntry.<br />
	 * 				Set null for not display
	 */
	public function __construct($url, \DateTime $lastModification=null, $changeFrequence=null, $priority=null, $googleImageEntries = array())
		{
		$this->url = $url;
		$this->lastModification = $lastModification;
		$this->changeFrequence = $changeFrequence;
		$this->priority = $priority;
		$this->googleImageEntries = $googleImageEntries;
		}
		
	/**
	 * Add one or more image entry for Google
	 *
	 * @param 	GoogleImageEntry|GoogleImageEntry[]		$googleImageEntry
	 * 				a image entries for Google to add
	 * @return 	URLEntry	this
	 */
	public function addGoogleImageEntry(GoogleImageEntry $googleImageEntry)
		{
		if ($googleImageEntry == null)
			return;
		
		if (is_array($googleImageEntry))
			{
			$merge = array_merge($googleImageEntry, $this->googleImageEntries);
			$this->googleImageEntries = $merge;
			}
		else
			$this->googleImageEntries[] = $googleImageEntry;
		
		return $this;
		}
		
	/**
	 * @return	array	Array of image entries for Google
	 */
	public function getGoogleImageEntries()
		{
		return $this->googleImageEntries;
		}
	}