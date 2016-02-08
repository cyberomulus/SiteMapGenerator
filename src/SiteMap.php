<?php
/*
 * This file is part of the SiteMapGenerator package.
 *
 * (c) Brack Romain <http://www.cyberomulus.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Cyberomulus\SiteMapGenerator;
 
use Cyberomulus\SiteMapGenerator\Entries\URLEntry;

/**
 * This class represent a site's map
 * 
 * @author cyberomulus - Brack Romain <me@cyberomulus.me>
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
	 * Activate or not Google Extra (image, video, ...)
	 * 
	 * @var	bool
	 */
	private $activateGoogleExtra;
	
	/**
	 * Construct a site's map
	 * 
	 * @param	bool	$activateGoogleExtra
	 * 				Activate or not Google Extra (image, video, ...)
	 */
	public function __construct($activateGoogleExtra = true)
		{
		$this->urlEntries = array();
		$this->activateGoogleExtra = $activateGoogleExtra;
		}
	
	/**
	 * Add one or more url entry in SiteMap
	 * 
	 * @param 	URLEntry|URLEntry[]		$urlEntry
	 * 				a URL entries to add		
	 * @return 	SiteMap		this
	 */
	public function addUrlEntry($urlEntry)
		{
		if ($urlEntry == null)
			return;
		
		if (is_array($urlEntry))
			{
			$merge = array_merge($urlEntry, $this->urlEntries);
			$this->urlEntries = $merge;
			}
		else 
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
	
	/**
	 * @return	bool	true if Google extra (image, video, ...) is activated, else false
	 */
	public function getActivateGoogleExtra()
		{
		return $this->activateGoogleExtra;
		}
		
	/**
	 * @param	bool	$activateGoogleExtra
	 * 				true for activated Google extra (image, video, ...), else false
	 * @return 	SiteMap		this
	 */
	public function setActivateGoogleExtra($activateGoogleExtra)
		{
		$this->activateGoogleExtra = $activateGoogleExtra;
		return $this;
		}
	}