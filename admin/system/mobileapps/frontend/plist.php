<?php
header('Content-type: application/x-plist');
echo '<?xml version="1.0" encoding="UTF-8"?>';
$mobileAppId = (int) $_GET['mobileAppId'];
$app = MobileappsModel::getOneSelfData($mobileAppId);
?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>items</key>
	<array>
		<dict>
			<key>assets</key>
			<array>
				<dict>
					<key>kind</key>
					<string>software-package</string>
					<key>url</key>
					<string><?php echo $app->getAppIpaUrl(); ?></string>
				</dict>
			</array>
			<key>metadata</key>
			<dict>
				<key>bundle-identifier</key>
				<string><?php echo $app->getIdentifier(); ?></string>
				<key>bundle-version</key>
				<string><?php echo $app->getVersion(); ?></string>
				<key>kind</key>
				<string>software</string>
				<key>title</key>
				<string><?php echo htmlspecialchars($app->getName()); ?></string>
			</dict>
		</dict>
	</array>
</dict>
</plist>