# SiteMapGenerator

## Qu'est-ce que SiteMapGenerator ? 

SiteMapGenerator est une librairie PHP qui permet de générer facilement un SiteMap and SiteMapIndex (incluant les tags spécifiques à Google).

## Comment installer SiteMapGenerator

Il existe 2 manières d'installer SiteMapGenerator.

Si vous utiliser [Composer](https://getcomposer.org/), SiteMapGenerator est disponible via [Packagist](https://packagist.org).  
Il suffit d'ajouter la dépendances à votre fichier composer.json:  
	
	{
		"require": {
            "cyberomulus/sitemap-generator": "~2.0"
        }
    }
	
Sinon, rendez-vous sur la page [github de SiteMapGenerator](https://github.com/cyberomulus/SiteMapGenerator) et choisissez le release de votre choix.  
Vous pourrez ensuite télécharger le code source via le lien 'Download ZIP'.  
Placez le dossier contenu dans le ZIP dans un dossier lib (par exemple) de votre projet.

## De quoi ai-je besoin pour utiliser SiteMapGenerator

Il faut la version 5.2.0 minimum de PHP avec l'extension XMLWriter activée (elle est activée par défaut).

## Comment générer un SiteMapIndex

1. Créer un ou plusieurs `SiteMapEntry`
2. Créer un `SiteMapIndex`
3. Ajouter les `SiteMapEntry` dans `SiteMapIndex`
4. Créer un Formatter (exemple : `XMLFormatter`)
5. Utiliser `Formatter::formatSiteMapIndex()`

## Comment générer un SiteMap

1. Créer un ou plusieurs `URLEntry`
2. Créer un `SiteMap`
3. Ajouter les `URLEntry` dans `SiteMapIndex`
4. Créer un Formatter (exemple : `XMLFormatter`)
5. Utiliser `Formatter::formatSiteMap()`

## Comment ajouter des images pour les extra de Google

1. Créer un ou plusieurs `GoogleImageEntry`
2. Ajouter le `GoogleImageEntry` dans `URLEntry`

## Comment na pas activer les extra de Google

Il suffit de mettre le paramètre à false dans le constructeur du `SiteMap`.
Toutes les images GoogleImageEntry ne seront pas affichées

## Comment créer un formatteur

Créer une classe qui étend `Formatter`.


## Exemple pour générer un SiteMap avec les extra de Google

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
	
	// crée a sitemap
	$sitemap = new SiteMap(true);
	
	// crée url
	$url1 = new URLEntry("http://www.test.com/ok.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_DAILY, "0.5");
	$url2 = new URLEntry("http://www.test.com/nice.php", new DateTime(), URLEntry::CHANGE_FEQUENCE_NEVER);
	$url3 = new URLEntry("http://www.test.com/nice.php?test=ok&restet=super", new DateTime(), URLEntry::CHANGE_FEQUENCE_NEVER);
	
	// crée les images pour les extra de Google's
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
	
	// ajoute les images dans l'url
	$url1->addGoogleImageEntry($image1);
	$url1->addGoogleImageEntry($image2);
	
	// ajoute les url dans le sitemap
	$sitemap->addUrlEntry($url1);
	$sitemap->addUrlEntry($url2);
	$sitemap->addUrlEntry($url3);
	
	// crée le formatteur
	$formatter = new XMLFormatter();
	
	// affiche le sitemap
	echo "<pre>" . $formatter->formatSiteMap($sitemap) . "</pre>";

Le résultat :
	
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

## Comment générer un SiteMapIndex
	<?php
	require 'lib/SiteMapGenerator/src/SiteMapIndex.php';
	require 'lib/SiteMapGenerator/src/entries/SiteMapEntry.php';
	require 'lib/SiteMapGenerator/src/formatter/Formatter.php';
	require 'lib/SiteMapGenerator/src/formatter/XMLFormatter.php';
	
	use Cyberomulus\SiteMapGenerator\SiteMapIndex;
	use Cyberomulus\SiteMapGenerator\Entries\SiteMapLEntry;
	use Cyberomulus\SiteMapGenerator\Formatter\XMLFormatter;
	
	// crée sitemapindex
	$sitemapindex = new SiteMapIndex();
	
	// crée les entrées sitemap
	$sitemap1 = new SiteMapLEntry("http://www.test.com/sitemap1.xml", new DateTime());
	$sitemap2 = new SiteMapLEntry("http://www.test.com/sitemap1.xml", new DateTime());
	$sitemap3 = new SiteMapLEntry("http://www.test.com/sitemap.php?code=3&restet=super", new DateTime());
	
	// ajoute les sitemap dans le sitemapindex
	$sitemapindex->addSiteMapEntry($sitemap1);
	$sitemapindex->addSiteMapEntry($sitemap2);
	$sitemapindex->addSiteMapEntry($sitemap3);
	
	// crée formatter
	$formatter = new XMLFormatter();
	
	// affiche le sitemapindex
	echo "<pre>" . $formatter->formatSiteMapIndex($sitemapindex) . "</pre>";

Le résultat :

	<?xml version="1.0" encoding="UTF-8"?>
	<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	 <sitemap>
	  <loc>http://www.test.com/sitemap1.xml</loc>
	  <lastmod>2015-05-17T15:07:40+02:00</lastmod>
	 </sitemap>
	 <sitemap>
	  <loc>http://www.test.com/sitemap1.xml</loc>
	  <lastmod>2015-05-17T15:07:40+02:00</lastmod>
	 </sitemap>
	 <sitemap>
	  <loc>http://www.test.com/sitemap.php?code=3&amp;amp;restet=super</loc>
	  <lastmod>2015-05-17T15:07:40+02:00</lastmod>
	 </sitemap>
	</sitemapindex>

## Sous quelle licence est SiteMapGenerator
SiteMapGenerator est sous licence MIT (licence libre).  
Vous trouverez le texte de la licence dans le fichier LICENSE.