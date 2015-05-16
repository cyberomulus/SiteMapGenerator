<?php
require '../src/SiteMap.php';
require '../src/entries/URLEntry.php';
require '../src/formatter/Formatter.php';
require '../src/formatter/XMLFormatter.php';

use Cyberomulus\SiteMapGenerator\SiteMap;
use Cyberomulus\SiteMapGenerator\Entries\URLEntry;
use Cyberomulus\SiteMapGenerator\Formatter\XMLFormatter;

global $sitemap;
$sitemap = new SiteMap();

$url1 = new URLEntry("http://www.test.com/ok.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_DAILY, "0.5");
$url2 = new URLEntry("http://www.test.com/nice.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_NEVER);

$sitemap->addUrlEntry($url1);
$sitemap->addUrlEntry($url2);

$formatter = new XMLFormatter();

echo "<pre>" . htmlentities($formatter->formatSiteMap($sitemap)) . "</pre>";