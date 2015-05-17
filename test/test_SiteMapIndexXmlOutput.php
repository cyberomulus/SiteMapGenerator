<?php
require '../src/SiteMapIndex.php';
require '../src/entries/SiteMapEntry.php';
require '../src/formatter/Formatter.php';
require '../src/formatter/XMLFormatter.php';

use Cyberomulus\SiteMapGenerator\SiteMapIndex;
use Cyberomulus\SiteMapGenerator\Entries\SiteMapLEntry;
use Cyberomulus\SiteMapGenerator\Formatter\XMLFormatter;

$sitemapindex = new SiteMapIndex();

$sitemap1 = new SiteMapLEntry("http://www.test.com/sitemap1.xml", new DateTime(), SiteMapLEntry::CHANGE_FEQUENCE_ALWAYS, "0.5");
$sitemap2 = new SiteMapLEntry("http://www.test.com/sitemap1.xml", new DateTime(), SiteMapLEntry::CHANGE_FEQUENCE_NEVER);
$sitemap3 = new SiteMapLEntry("http://www.test.com/sitemap.php?code=3&restet=super", new DateTime(), SiteMapLEntry::CHANGE_FEQUENCE_NEVER);


$sitemapindex->addSiteMapEntry($sitemap1);
$sitemapindex->addSiteMapEntry($sitemap2);
$sitemapindex->addSiteMapEntry($sitemap3);

$formatter = new XMLFormatter();

echo "<pre>" . $formatter->formatSiteMapIndex($sitemapindex) . "</pre>";