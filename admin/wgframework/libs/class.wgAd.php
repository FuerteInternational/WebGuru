<?php
class wgAd {
	
	public static function test() {
		$host = "ldap://ad.gilmore.com";
		$user = "ad-web@ad.wjgilmore.com";
		$pswd = "secret";
		$ad = ldap_connect($host) or die ("Could not connect!");
		// Set version number
		ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3) or die ("Could not set ldap protocol");
		// Binding to ldap server
		$bd = ldap_bind($ad, $user, $pswd) or die ("Could not bind");
		// Create the DN
		$dn = "OU=People,OU=staff,DN=ad,DN=wjgilmore,DN=com";
		// Specify only those parameters we're interested in displaying
		$attrs = array ("displayname", "mail", "telephonenumber");
		// Create the filter from the search parameters
		$filter = $_POST['filter']. "=" . $_POST['keyword']. "*";
		$search = ldap_search($ad, $dn, $filter, $attrs) or die ("ldap search failed");
		$entries = ldap_get_entries($ad, $search);
		if ($entries["count"] > 0) {
			for($i = 0; $i < $entries["count"]; $i ++) {
				echo "<p>Name: " . $entries[$i]["displayname"][0]. "<br />";
				echo "Phone: " . $entries[$i]["telephonenumber"][0]. "<br />";
				echo "Email: " . $entries[$i]["mail"][0]. "</p>";
			}
		} 
		else echo "<p>No results found!</p>";
		ldap_unbind ($ad);
	}
	
}
?>