<?php echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<?php foreach ($pages as $value):?>
	<url>
			<loc><?=$this->aSettings['siteurl']?><?=$value['uri']?></loc>
			<lastmod><?=date('Y-m-d',$value['created'])?></lastmod>
			<changefreq>weekly</changefreq>
			<priority>0.50</priority>
		</url>
<?php endforeach;?>
</urlset>