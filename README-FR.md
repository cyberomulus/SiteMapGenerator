# SiteMapGenerator

## What is SiteMapGenerator ? 
SiteMapGenerator is a PHP library that makes it easy to generate a SiteMap and SiteMapIndex (including Google specific tags).

## How to install SiteMapGenerator
There are 2 ways to install SiteMapGenerator.

If you use [Composer](https://getcomposer.org/), SiteMapGenerator is available by [Packagist](https://packagist.org).  
Just add the dependencies to your composer.json:  
	
	{
		"require": {
            "cyberomulus/sitemap-generator": "1.0"
        }
    }
	
Else, got to the page [github of SiteMapGenerator](https://github.com/cyberomulus/SiteMapGenerator) and choose the release of your choice.  
You can download the source code with the link 'Download ZIP'.  
Place the directory in the ZIP in a lib folder (for example) of your project.

## What I need to use SiteMapGenerator

It takes minimum PHP version 5.2.0 with XMLWriter extension enabled (it is enabled by default).

## How to generate a SiteMapIndex

1. Create one or more `SiteMapEntry`
2. Create one `SiteMapIndex`
3. Add all `SiteMapEntry` in `SiteMapIndex`
4. Create a Formatter (example : `XMLFormatter`)
5. Use `Formatter::formatSiteMapIndex()`

## How to generate a SiteMap

1. Create one or more `URLEntry`
2. Create one `SiteMap`
3. Add all `URLEntry` in `SiteMapIndex`
4. Create a Formatter (example : `XMLFormatter`)
5. Use `Formatter::formatSiteMap()`

## How to add Image for Google's extra

1. Create one or more `GoogleImageEntry`
2. Add all `GoogleImageEntry` in `URLEntry`

## How to not actived Google's extra

Juste set Parameter at false in constructor of `SiteMap`.
All GoogleImageEntry are not displayed

## How to create a formatter

Create a class extends `Formatter`.


## Example for generate a SiteMap with Google's extra

	<?php
	require 'lib/SiteMapGenerator/src/SiteMap.php';
	require 'lib/SiteMapGenerator/src/entries/SiteMapEntry.php';
	require 'lib/SiteMapGenerator/src/entries/URLEntry.php';
	require 'lib/SiteMapGenerator/src/entries/GoogleImageEntry.php';
	require 'lib/SiteMapGenerator/src/formatter/Formatter.php';
	require 'lib/SiteMapGenerator/src/formatter/XMLFormatter.php';
	
	use Cyberomulus\SiteMapGenerator\SiteMap;
	use Cyberomulus\SiteMapGenerator\Entries\URLEntry;
	use Cyberomulus\SiteMapGenerator\Entries\GoogleImageEntry;
	use Cyberomulus\SiteMapGenerator\Formatter\XMLFormatter;
	
	// create a sitemap
	$sitemap = new SiteMap(true);
	
	// create url
	$url1 = new URLEntry("http://www.test.com/ok.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_DAILY, "0.5");
	$url2 = new URLEntry("http://www.test.com/nice.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_NEVER);
	$url3 = new URLEntry("http://www.test.com/nice.php?test=ok&restet=super", new DateTime(), URLEntry::CHANGE_FEQUENCE_NEVER);
	
	// create a image for Google's extra
	$image1 = new GoogleImageEntry("http://www.test.com/image/img1.jpg", 
									"a title for image", 
									"a caption for image", 
									"Brussels, Belgium", 
									"http://www.test.com/image/license.txt");
	
	$image2 = new GoogleImageEntry("http://www.test.com/image/img1.jpg",
									"a another title for image",
									"a another caption for image",
									null,
									"http://www.test.com/image/license.txt");
	
	// add image in url
	$url1->addGoogleImageEntry($image1);
	$url1->addGoogleImageEntry($image2);
	
	// add url in sitemap
	$sitemap->addUrlEntry($url1);
	$sitemap->addUrlEntry($url2);
	$sitemap->addUrlEntry($url3);
	
	// create formatter
	$formatter = new XMLFormatter();
	
	// output sitemap
	echo "<pre>" . $formatter->formatSiteMap($sitemap) . "</pre>";

The result :
	
	<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	 <url>
	  <loc>http://www.test.com/ok.php</loc>
	  <lastmod>2015-05-17T15:04:38+02:00</lastmod>
	  <changefreq>daily</changefreq>
	  <priority>0.5</priority>
	  <image:image>
	   <image:loc>http://www.test.com/image/img1.jpg</image:loc>
	   <image:title>a title for image</image:title>
	   <image:caption>a caption for image</image:caption>
	   <image:geo_location>Brussels, Belgium</image:geo_location>
	   <image:license>http://www.test.com/image/license.txt</image:license>
	  </image:image>
	  <image:image>
	   <image:loc>http://www.test.com/image/img1.jpg</image:loc>
	   <image:title>a another title for image</image:title>
	   <image:caption>a another caption for image</image:caption>
	   <image:license>http://www.test.com/image/license.txt</image:license>
	  </image:image>
	 </url>
	 <url>
	  <loc>http://www.test.com/nice.php</loc>
	  <lastmod>2015-05-17T15:04:38+02:00</lastmod>
	  <changefreq>never</changefreq>
	 </url>
	 <url>
	  <loc>http://www.test.com/nice.php?test=ok&amp;amp;restet=super</loc>
	  <lastmod>2015-05-17T15:04:38+02:00</lastmod>
	  <changefreq>never</changefreq>
	 </url>
	</urlset>

## Example for generate a SiteMapIndex
	<?php
	require 'lib/SiteMapGenerator/src/SiteMapIndex.php';
	require 'lib/SiteMapGenerator/src/entries/SiteMapEntry.php';
	require 'lib/SiteMapGenerator/src/formatter/Formatter.php';
	require 'lib/SiteMapGenerator/src/formatter/XMLFormatter.php';
	
	use Cyberomulus\SiteMapGenerator\SiteMapIndex;
	use Cyberomulus\SiteMapGenerator\Entries\SiteMapLEntry;
	use Cyberomulus\SiteMapGenerator\Formatter\XMLFormatter;
	
	// create sitemapindex
	$sitemapindex = new SiteMapIndex();
	
	// create sitemap entries
	$sitemap1 = new SiteMapLEntry("http://www.test.com/sitemap1.xml", new DateTime(), SiteMapLEntry::CHANGE_FEQUENCE_ALWAYS, "0.5");
	$sitemap2 = new SiteMapLEntry("http://www.test.com/sitemap1.xml", new DateTime(), SiteMapLEntry::CHANGE_FEQUENCE_NEVER);
	$sitemap3 = new SiteMapLEntry("http://www.test.com/sitemap.php?code=3&restet=super", new DateTime(), SiteMapLEntry::CHANGE_FEQUENCE_NEVER);
	
	// add sitemap entries in sitemapindex
	$sitemapindex->addSiteMapEntry($sitemap1);
	$sitemapindex->addSiteMapEntry($sitemap2);
	$sitemapindex->addSiteMapEntry($sitemap3);
	
	// create formatter
	$formatter = new XMLFormatter();
	
	// output sitemapindex
	echo "<pre>" . $formatter->formatSiteMapIndex($sitemapindex) . "</pre>";

The result :

	<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	 <url>
	  <loc>http://www.test.com/sitemap1.xml</loc>
	  <lastmod>2015-05-17T15:07:40+02:00</lastmod>
	  <changefreq>always</changefreq>
	  <priority>0.5</priority>
	 </url>
	 <url>
	  <loc>http://www.test.com/sitemap1.xml</loc>
	  <lastmod>2015-05-17T15:07:40+02:00</lastmod>
	  <changefreq>never</changefreq>
	 </url>
	 <url>
	  <loc>http://www.test.com/sitemap.php?code=3&amp;amp;restet=super</loc>
	  <lastmod>2015-05-17T15:07:40+02:00</lastmod>
	  <changefreq>never</changefreq>
	 </url>
	</urlset>

## What license is SiteMapGenerator
SiteMapGenerator is under MIT license (license free).  
You will find the license text in the file LICENSE.