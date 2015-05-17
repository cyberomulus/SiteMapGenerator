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
use Cyberomulus\SiteMapGenerator\Entries\URLEntry;
use Cyberomulus\SiteMapGenerator\Entries\GoogleImageEntry;

/**
 * This formatter format in XML specification
 *
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
class XMLFormatter extends Formatter
	{
	/**
	 * @see		Formatter::formatSiteMap()
	 */
	public function formatSiteMap(SiteMap $siteMap)
		{
		// init and configure XMLWriter 
		$writer = new \XMLWriter();
		$writer->openMemory();
		$writer->setIndent(true);
		$writer->startDocument("1.0", "UTF-8");
		
		// start root
		$writer->startElementNs(null, "urlset", "http://www.sitemaps.org/schemas/sitemap/0.9");
		
		// add attributs for Google
		if ($siteMap->getActivateGoogleExtra() == true)
			{
			$writer->writeAttribute("xmlns:image", "http://www.google.com/schemas/sitemap-image/1.1");
			}
		
		// add all url's entries
		foreach ($siteMap->getUrlEntries() as $urlEntry)
			{
			if ($urlEntry->getUrl() != null)
				{
				$writer->startElement("url");
				$writer->writeElement("loc", htmlentities($urlEntry->getUrl(), null, "UTF-8", true));
				
				if ($urlEntry->getLastModification())
					$writer->writeElement("lastmod", $urlEntry->getLastModification()->format(\DateTime::W3C));
				
				if ($urlEntry->getChangeFrequence())
					$writer->writeElement("changefreq", $urlEntry->getChangeFrequence());
				
				if ($urlEntry->getPriority())
					$writer->writeElement("priority", $urlEntry->getPriority());
				
				// add all Image Entry for Google
				if ($siteMap->getActivateGoogleExtra() == true)
					{
					foreach ($urlEntry->getGoogleImageEntries() as $GoogleImageEntry)
						{
						$writer->startElement("image:image");
						$writer->writeElement("image:loc", htmlentities($GoogleImageEntry->getUrl(), null, "UTF-8", true));
						
						if ($GoogleImageEntry->getTitle())
							$writer->writeElement("image:title", $GoogleImageEntry->getTitle());
						
						if ($GoogleImageEntry->getCaption())
							$writer->writeElement("image:caption", $GoogleImageEntry->getCaption());
						
						if ($GoogleImageEntry->getGeo())
							$writer->writeElement("image:geo_location", $GoogleImageEntry->getGeo());
						
						if ($GoogleImageEntry->getLicense())
							$writer->writeElement("image:license", htmlentities($GoogleImageEntry->getLicense(), null, "UTF-8", true));
						
						$writer->endElement();
						}
					}
				
				$writer->endElement();
				}
			}	
			
		// close root
		$writer->endElement();
		
		return $writer->flush();
		}

	/**
	 * @see		Formatter::formatSiteMapIndex()
	 */
	public function formatSiteMapIndex(SiteMapIndex $siteMapIndex)
		{
		// init and configure XMLWriter 
		$writer = new \XMLWriter();
		$writer->openMemory();
		$writer->setIndent(true);
		$writer->startDocument("1.0", "UTF-8");
		
		// start root
		$writer->startElementNs(null, "urlset", "http://www.sitemaps.org/schemas/sitemap/0.9");
		
		// add all url's entries
		foreach ($siteMapIndex->getSiteMapEntries() as $siteMapEntry)
			{
			if ($siteMapEntry->getUrl() != null)
				{
				$writer->startElement("url");
				$writer->writeElement("loc", htmlentities($siteMapEntry->getUrl(), null, "UTF-8", true));
		
				if ($siteMapEntry->getLastModification())
					$writer->writeElement("lastmod", $siteMapEntry->getLastModification()->format(\DateTime::W3C));
		
				if ($siteMapEntry->getChangeFrequence())
					$writer->writeElement("changefreq", $siteMapEntry->getChangeFrequence());
		
				if ($siteMapEntry->getPriority())
					$writer->writeElement("priority", $siteMapEntry->getPriority());
				
				$writer->endElement();				
				}
			}
		
		// close root
		$writer->endElement();
			
		return $writer->flush();
		}
	}