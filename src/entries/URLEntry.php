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
	 * @var \DateTime
	 */
	private $lastModification;
	
	/**
	 * Interval of URL's frequency change
	 * 
	 * @var String
	 */
	private $changeFrequence;

	/**
	 * The priority of this URL relative to other URLs on your site
	 * 
	 * @var unknown
	 */
	private $priority;
	
	/**
	 * Construct an URL entries
	 * 
	 * @param	String 		$url
	 * 				Location's URL
	 * @param	\DateTime	$lastModification
	 * 				Date of URL's last modification
	 * @param	string 		$changeFrequence
	 * 				Interval of URL's frequency change.<br />
	 * 				Use a this class's constant (CHANGE_FEQUENCE_...)
	 * @param	string 		$priority
	 * 				The priority of this URL relative to other URLs on your site
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
	 * @param	\DateTime	$lastModification
	 * 				Date of URL's last modification
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
	 * @param	String	$changeFrequence
	 * 				Interval of URL's frequency change.<br />
	 * 				Use a this class's constant (CHANGE_FEQUENCE_...)
	 * @return	URLEntry	this
	 */
	public function setChangeFrequence($changeFrequence)
		{
		$this->changeFrequence = $changeFrequence;
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
	 * @param	string 		$priority
	 * 				The priority of this URL relative to other URLs on your site
	 * @return	URLEntry	this
	 */
	public function setPriority($priority)
		{
		$this->priority = $priority;
		return $this;
		}
	}