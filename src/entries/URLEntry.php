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
 
/**
 * This class represent an URL entries
 * 
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
class URLEntry
	{
	/**
	 * Use for value of $changeFrequence.
	 * 
	 * @var String
	 */
	const CHANGE_FEQUENCE_NEVER = "never";
	
	/**
	 * Use for value of $changeFrequence.
	 *
	 * @var String
	 */
	const CHANGE_FEQUENCE_YEARLY = "yearly";
	
	/**
	 * Use for value of $changeFrequence.
	 *
	 * @var String
	 */
	const CHANGE_FEQUENCE_MONTHLY = "monthly";
	
	/**
	 * Use for value of $changeFrequence.
	 *
	 * @var String
	 */
	const CHANGE_FEQUENCE_WEEKLY = "weekly";
	
	/**
	 * Use for value of $changeFrequence.
	 *
	 * @var String
	 */
	const CHANGE_FEQUENCE_DAILY = "daily";
	
	/**
	 * Use for value of $changeFrequence.
	 *
	 * @var String
	 */
	const CHANGE_FEQUENCE_HOURLY = "hourly";
	
	/**
	 * Use for value of $changeFrequence.
	 *
	 * @var String
	 */
	const CHANGE_FEQUENCE_ALWAYS = "always";
	
	/**
	 * Location's URL
	 * 
	 * @var String
	 */
	private $url;
	
	/**
	 * Date of URL's last modification
	 * 
	 * @var \DateTime|null
	 */
	private $lastModification;
	
	/**
	 * Interval of URL's frequency change
	 * 
	 * @var String|null
	 */
	private $changeFrequence;

	/**
	 * The priority of this URL relative to other URLs on your site
	 * 
	 * @var String|null
	 */
	private $priority;
	
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
	 */
	public function __construct($url, \DateTime $lastModification=null, $changeFrequence=null, $priority=null)
		{
		$this->url = $url;
		$this->lastModification = $lastModification;
		$this->changeFrequence = $changeFrequence;
		$this->priority = $priority;
		}
		
	/**
	 * @return	String	Location's URL
	 */
	public function getUrl()
		{
		return $this->url;
		}
	
	/**
	 * @param	String 		$url
	 * 				Location's URL
	 * @return	URLEntry	this
	 */
	public function setUrl($url)
		{
		$this->url = $url;
		return $this;
		}
	
	/**
	 * @return	DateTime
	 * 				Date of URL's last modification
	 */
	public function getLastModification()
		{
		return $this->lastModification;
		}
	
	/**
	 * @param	\DateTime|null	$lastModification
	 * 				Date of URL's last modification.<br />
	 * 				Set null for not display
	 * @return	URLEntry	this
	 */
	public function setLastModification(\DateTime $lastModification)
		{
		$this->lastModification = $lastModification;
		return $this;
		}
		
	/**
	 * @return	String		Interval of URL's frequency change
	 */
	public function getChangeFrequence()
		{
		return $this->changeFrequence;
		}
	
	/**
	 * @param	String|null	$changeFrequence
	 * 				Interval of URL's frequency change.<br />
	 * 				Use a this class's constant (CHANGE_FEQUENCE_...).<br />
	 * 				Set null for not display
	 * @return	URLEntry	this
	 */
	public function setChangeFrequence($changeFrequence)
		{
		if (in_array($changeFrequence, 
					array(self::CHANGE_FEQUENCE_ALWAYS,
							self::CHANGE_FEQUENCE_HOURLY,
							self::CHANGE_FEQUENCE_DAILY,
							self::CHANGE_FEQUENCE_WEEKLY,
							self::CHANGE_FEQUENCE_MONTHLY,
							self::CHANGE_FEQUENCE_YEARLY,
							self::CHANGE_FEQUENCE_NEVER,)
						))
			$this->changeFrequence = $changeFrequence;
		
		else $changeFrequence = null;
		
		return $this;
		}
		
	/**
	 * @return	String		The priority of this URL relative to other URLs on your site
	 */
	public function getPriority()
		{
		return $this->priority;
		}
		
	/**
	 * @param	string|null		$priority
	 * 				The priority of this URL relative to other URLs on your site.<br />
	 * 				Set null for not display
	 * @return	URLEntry	this
	 */
	public function setPriority($priority)
		{
		$this->priority = $priority;
		return $this;
		}
	}