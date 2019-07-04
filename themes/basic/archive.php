<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
	die();
?>
<!DOCTYPE html>
<html>
	<head>

		<?php
		npgFilters::apply('theme_head');

		scriptLoader($zenCSS);
		scriptLoader(dirname(dirname($zenCSS)) . '/common.css');
		if (class_exists('RSS'))
			printRSSHeaderLink('Gallery', gettext('Gallery'));
		?>
	</head>
	<body>
		<?php npgFilters::apply('theme_body_open'); ?>
		<div id="main">
			<div id="gallerytitle">
				<?php
				if (getOption('Allow_search')) {
					printSearchForm();
				}
				?>
				<h2>
					<span>
						<?php printHomeLink('', ' | '); ?>
						<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Gallery Index'); ?>"><?php printGalleryTitle(); ?></a>
					</span> |
					<?php echo gettext("Archive View"); ?>
				</h2>
			</div>
			<div id="padbox">
				<div class="image_header">
					<p><?php echo gettext('Images By Date'); ?></p>
				</div>
				<div id="archive"><?php printAllDates(); ?></div>
				<?php
				if (extensionEnabled('zenpage')) {
					if (hasNews()) {
						?>
						<div class="news_header">
							<p><?php echo(NEWS_LABEL); ?></p>
						</div>
						<?php
						printNewsArchive("archive");
					}
				}
				?>
				<div id="tag_cloud">
					<p><?php echo gettext('Popular Tags'); ?></p>
					<?php printAllTagsAs('cloud', 'tags'); ?>
				</div>
			</div>
		</div>
		<div id="credit">
			<?php
			if (function_exists('printFavoritesURL')) {
				printFavoritesURL(NULL, '', ' | ', '<br />');
			}
			?>
			<?php
			if (class_exists('RSS'))
				printRSSLink('Gallery', '', 'RSS', ' | ');
			printSoftwareLink();
			@call_user_func('printUserLogin_out', " | ");
			?>
		</div>
		<?php
		npgFilters::apply('theme_body_close');
		?>
	</body>
</html>
