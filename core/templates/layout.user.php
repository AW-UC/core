<!DOCTYPE html>
<html>
	<head>
		<title>ownCloud</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="<?php echo image_path('', 'favicon.png'); ?>" /><link rel="apple-touch-icon-precomposed" href="<?php echo image_path('', 'favicon-touch.png'); ?>" />
		<?php foreach($_['cssfiles'] as $cssfile): ?>
			<link rel="stylesheet" href="<?php echo $cssfile; ?>" type="text/css" media="screen" />
		<?php endforeach; ?>
		<script type="text/javascript">
			var oc_webroot = '<?php global $WEBROOT; echo $WEBROOT; ?>';
			var oc_current_user = '<?php echo OC_User::getUser() ?>';
		// </script>
		<?php foreach($_['jsfiles'] as $jsfile): ?>
			<script type="text/javascript" src="<?php echo $jsfile; ?>"></script>
		<?php endforeach; ?>
		<?php foreach($_['headers'] as $header): ?>
			<?php
				echo '<'.$header['tag'].' ';
				foreach($header['attributes'] as $name=>$value){
					echo "$name='$value' ";
				};
				echo '>';
				echo $header['text'];
				echo '</'.$header['tag'].'>';
			?>
		<?php endforeach; ?>
	</head>

	<body id="<?php echo $_['bodyid'];?>">
		<header><div id="header">
			<a href="<?php echo link_to('', 'index.php'); ?>" title="" id="owncloud"><img class="svg" src="<?php echo image_path('', 'logo-wide.svg'); ?>" alt="ownCloud" /></a>
			<form class="searchbox" action="#" method="post">
				<input id="searchbox" class="svg" type="search" name="query" value="<?php if(isset($_POST['query'])){echo $_POST['query'];};?>" class="prettybutton" autocomplete="off" />
			</form>
			<a id="logout" href="<?php echo link_to('', 'index.php'); ?>?logout=true" title="<?php echo $l->t('Log out');?>"><img class="svg" src="<?php echo image_path('', 'actions/logout.svg'); ?>" /></a>
		</div></header>

		<nav><div id="navigation">
			<ul id="apps" class="svg">
				<?php foreach($_['navigation'] as $entry): ?>
					<li><a style="background-image:url(<?php echo $entry['icon']; ?>)" href="<?php echo $entry['href']; ?>" title="" <?php if( $entry['active'] ): ?> class="active"<?php endif; ?>><?php echo $entry['name']; ?></a>
						<?php if( sizeof( $entry["subnavigation"] )): ?>
							<ul>
								<?php foreach($entry["subnavigation"] as $subentry):?>
									<li class="subentry"><a style="background-image:url(<?php echo $subentry['icon']; ?>)" href="<?php echo $subentry['href']; ?>" title="" class="subentry<?php if( $subentry['active'] ): ?> active<?php endif; ?>"><?php echo $subentry['name'] ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

			<ul id="settings" class="svg">
				<img id="expand" class="svg" src="<?php echo image_path('', 'actions/settings.svg'); ?>" />
				<span style="display:none"><?php echo $l->t('Settings');?></span>
				<div id="expanddiv">
				<?php foreach($_['settingsnavigation'] as $entry):?>
					<li><a style="background-image:url(<?php echo $entry['icon']; ?>)" href="<?php echo $entry['href']; ?>" title="" <?php if( $entry["active"] ): ?> class="active"<?php endif; ?>><?php echo $entry['name'] ?></a></li>
					<?php if( sizeof( $entry["subnavigation"] )): ?>
						<?php foreach($entry["subnavigation"] as $subentry):?>
							<li><a href="<?php echo $subentry['href']; ?>" title="" <?php if( $subentry['active'] ): ?>class="active"<?php endif; ?>><?php echo $subentry['name'] ?></a></li>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</ul>
		</div></nav>

		<div id="content">
			<?php echo $_['content']; ?>
		</div>
	</body>
</html>
