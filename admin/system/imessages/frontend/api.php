<?php
$id = 0;
if (wgGet::isValue('api')) {
	$code = wgGet::getValue('api');
	$form = ImessagesFormsModel::getOneCodeData($code);
	$id = $form->getId();
	if (ImessagesFormsModel::validateUserForm($id)) {
		$form = ImessagesFormsModel::getOneUserData($id, moduleUsers::getId());
		$title = 'API for "'.$form->getName().'"';
		$code = '<p>Your form API code is: <strong style="color:red;">'.$form->getCode().'</strong></p>';
		$arr = ImessagesFieldsModel::getSelfFormData($form->getId());
	}
	else $id = 0;
}
?><a name="editForm"></a>
<form action="{#LINK_50}">
	<p>
		<button type="submit" class="left">&laquo; Back</button>
	</p>
</form>
<h2><?php echo $title; ?></h2>
<?php
echo $code;
?>
<h3>Sending form data using Objective-C, <a href="http://code.google.com/p/json-framework/">JSON framework</a> and <a href="http://allseeing-i.com/ASIHTTPRequest/">ASIHTTPRequest</a></h3>

<p>Example code for sending new message from your iPhone or Mac application, this example already contains your data API code and all the fields you've set-up previously:</p>

<pre>
+ (BOOL)sendMessage {
	NSURL *urlToSend = [[[NSURL alloc] initWithString: @"http://www.xprogress.com/api/imessages-send.php?code=<?php echo $form->getCode(); ?>"] autorelease];
	
	ASIFormDataRequest *request = [[[ASIFormDataRequest alloc] initWithURL:urlToSend] autorelease];
	
    <?php
if (!empty($arr)) {
	foreach ($arr as $v) {
	?>[request setPostValue:@"Content of my <?php echo $v->getName(); ?> field" forKey:@"<?php echo $v->getFcode(); ?>"];
	<?php
	}
}
	?>
	
  	[request start];
	NSError *error = [request error];
	if (!error) {
		NSString *response = [request responseString];
		SBJSON *parser = [[SBJSON alloc] init];
		NSDictionary *data = [parser objectWithString:response error:nil];
		[parser release];
		int result = [[data objectForKey:@"result"] intValue];
		if (result) NSLog(@"Your message has been sent.");
		else NSLog(@"We were unable to send your message!");
		NSString *error = [data objectForKey:@"error"];
		if ([error length] > 0) NSLog(@"Error: %@", error);
	}
	else return NO;
}

</pre>

<p>
	<a href="http://www.xprogress.com/post-46-building-custom-forms-in-your-iphone-app-using-imessages-asihttprequest-and-json-framework/" class="exitlink">Full tutorial about using iMessages API in XCode (iPhone SDK) is here ...</a>
</p>
<p>
	<a href="http://www.xprogress.com/post-44-how-to-parse-json-files-on-iphone-in-objective-c-into-nsarray-and-nsdictionary/" class="exitlink">Full tutorial about using JSON framework on iPhone is here ...</a>
</p>



