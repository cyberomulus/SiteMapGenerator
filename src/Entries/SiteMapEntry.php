<?php
/*
 * This file is part of the SiteMapGenerator package.
 *
 * (c) Brack Romain <cyberomulus.me@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Cyberomulus\SiteMapGenerator\Entries;

/**
 * This class represent an SiteMap entry for SiteMap Index
 * 
 * @author cyberomulus - Brack Romain <cyberomulus.me@gmail.com>
 */
class SiteMapEntry
	{	
	/**
	 * Location's URL
	 *
	 * @var String
	 */
	protected $url;
	
	/**
	 * Date of entry's last modification
	 *
	 * @var \DateTime|null
	 */
	protected $lastModification;
	
	/**
	 * Construct an entries
	 *
	 * @param	String 		$url
	 * 				url's entry
	 * @param	\DateTime|null	$lastModification
	 * 				Date of entry's last modification.<br />
	 * 				Set null for not display
	 */
	public function __construct($url, \DateTime $lastModification=null)
		{
		$this->url = $url;
		$this->lastModification = $lastModification;
		}
	
	/**
	 * @return	String	Location's entry
	 */
	public function getUrl()
		{
		return $this->url;
		}
		
	/**
	 * @param	String 		$url
	 * 				url's entry
	 * @return	SiteMapEntry	this
	 */
	public function setUrl($url)
		{
		$this->url = $url;
		return $this;
		}
		
	/**
	 * @return	\DateTime
	 * 				Date of entrys last modification
	 */
	public function getLastModification()
		{
		return $this->lastModification;
		}
		
	/**
	 * @param	\DateTime|null	$lastModification
	 * 				Date of entrys last modification.<br />
	 * 				Set null for not display
	 * @return	SiteMapEntry	this
	 */
	public function setLastModification(\DateTime $lastModification)
		{
		$this->lastModification = $lastModification;
		return $this;
		}
	}