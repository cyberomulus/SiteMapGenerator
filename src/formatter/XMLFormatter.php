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

/**
 *
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
					$writer->writeElement("changefreq", $urlEntry->getPriority());
				
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
		// TODO: Auto-generated method stub
		}
	}