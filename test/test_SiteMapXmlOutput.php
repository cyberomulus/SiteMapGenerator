<?php
require '../src/SiteMap.php';
require '../src/entries/URLEntry.php';
require '../src/entries/GoogleImageEntry.php';
require '../src/formatter/Formatter.php';
require '../src/formatter/XMLFormatter.php';

use Cyberomulus\SiteMapGenerator\SiteMap;
use Cyberomulus\SiteMapGenerator\Entries\URLEntry;
use Cyberomulus\SiteMapGenerator\Entries\GoogleImageEntry;
use Cyberomulus\SiteMapGenerator\Formatter\XMLFormatter;

$sitemap = new SiteMap(true);

$url1 = new URLEntry("http://www.test.com/ok.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_DAILY, "0.5");
$url2 = new URLEntry("http://www.test.com/nice.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_NEVER);
$url3 = new URLEntry("http://www.test.com/nice.php?test=ok&restet=super", new DateTime(), URLEntry::CHANGE_FEQUENCE_NEVER);

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

$url1->addGoogleImageEntry($image1);
$url1->addGoogleImageEntry($image2);

$sitemap->addUrlEntry($url1);
$sitemap->addUrlEntry($url2);
$sitemap->addUrlEntry($url3);

$formatter = new XMLFormatter();

echo "<pre>" . $formatter->formatSiteMap($sitemap) . "</pre>";