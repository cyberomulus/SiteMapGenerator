<?php
/*
 * This file is part of the SiteMapGenerator package.
 *
 * (c) Brack Romain <http://www.cyberomulus.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Cyberomulus\SiteMapGenerator\Entries;
 
/**
 * This class represent an image entries for Google
 * 
 * @author cyberomulus - Brack Romain <me@cyberomulus.me>
 */
class GoogleImageEntry
	{
	/**
	 * Image's URL
	 *
	 * @var String
	 */
	private $url;
	
	/**
	 * Image's title
	 * 
	 * @var String
	 */
	private $title;
	
	/**
	 * Image's Caption
	 * 
	 * @var String
	 */
	private $caption;
	
	/**
	 * Geo's location of image
	 * 
	 * @var String
	 */
	private $geo;
	
	/**
	 * URL for Image's License
	 * 
	 * @var String
	 */
	private $license;
	
	/**
	 * @param	String	$url
	 * 				Image's URL
	 * @param	String	$title
	 * 				Image's title<br />
	 * 				Set null for not display
	 * @param	String	$caption
	 * 				Image's Caption<br />
	 * 				Set null for not display
	 * @param	String	$geo
	 * 				Geo's location of image<br />
	 * 				Set null for not display
	 * @param	String	$license
	 * 				URL for Image's License<br />
	 * 				Set null for not display
	 */
	public function __construct($url, $title=null, $caption=null, $geo=null, $license=null)
		{
		$this->url = $url;
		$this->title = $title;
		$this->caption = $caption;
		$this->geo = $geo;
		$this->license = $license;
		}
	
	/**
	 * @return	String	Image's URL
	 */
	public function getUrl()
		{
		return $this->url;
		}
	
	/**
	 * @param	String	$url
	 * 				Image's URL
	 * @return	GoogleImageEntry	this
	 */
	public function setUrl($url)
		{
		$this->url = $url;
		return $this;
		}
	
	/**
	 * @return	String	Image's title
	 */
	public function getTitle()
		{
		return $this->title;
		}
	
	/**
	 * @param	String	$title
	 * 				Image's title<br />
	 * 				Set null for not display
	 * @return	GoogleImageEntry	this
	 */
	public function setTitle($title)
		{
		$this->title = $title;
		return $this;
		}
	
	/**
	 * @return	String	Image's Caption
	 */
	public function getCaption()
		{
		return $this->caption;
		}
	
	/**
	 * @param	String	$caption
	 * 				Image's Caption<br />
	 * 				Set null for not display
	 * @return	GoogleImageEntry	this
	 */
	public function setCaption($caption)
		{
		$this->caption = $caption;
		return $this;
		}
	
	/**
	 * @return	String	Geo's location of image
	 */
	public function getGeo()
		{
		return $this->geo;
		}
	
	/**
	 * @param	String	$geo
	 * 				Geo's location of image<br />
	 * 				Set null for not display
	 * @return	GoogleImageEntry	this
	 */
	public function setGeo($geo)
		{
		$this->geo = $geo;
		return $this;
		}
	
	/**
	 * @return	String	URL for Image's License
	 */
	public function getLicense()
		{
		return $this->license;
		}
	
	/**
	 * @param	String	$license
	 * 				URL for Image's License<br />
	 * 				Set null for not display
	 * @return	GoogleImageEntry	this
	 */
	public function setLicense($license) 
		{
		$this->license = $license;
		return $this;
		}
	}