/*
Page:           rating.js
Created:        Aug 2006
Last Mod:       Mar 11 2007
Handles actions and requests for rating bars.	
--------------------------------------------------------- 
ryan masuga, masugadesign.com
ryan@masugadesign.com 
Licensed under a Creative Commons Attribution 3.0 License.
http://creativecommons.org/licenses/by/3.0/
See readme.txt for full credit details.
--------------------------------------------------------- */

function sndReq(vote, id_num, ip_num, units, name) {

	$('#unit_ul' + id_num).html('<div class="loading"></div>');

	$.ajax( {
		type :'GET',
		url :'rpc.php',
		data :'j=' + vote + '&q=' + id_num + '&t=' + ip_num + '&c=' + units + '&name=' + name,
		success : function(response) {
			var update = new Array();
			if (response.indexOf('|') != -1) {
				update = response.split('|');
				$('#' + update[0]).html(update[1]);
			}
		}
	});
}


/* =============================================================== */
var ratingAction = {
	'a.rater' : function(element) {
		element.onclick = function() {

			var parameterString = this.href.replace(/.*\?(.*)/, "$1"); // onclick="sndReq('j=1&q=2&t=127.0.0.1&c=5');
			var parameterTokens = parameterString.split("&"); // onclick="sndReq('j=1,q=2,t=127.0.0.1,c=5');
			var parameterList = new Array();

			for (j = 0; j < parameterTokens.length; j++) {
				var parameterName = parameterTokens[j].replace(/(.*)=.*/, "$1"); // j
				var parameterValue = parameterTokens[j]
						.replace(/.*=(.*)/, "$1"); // 1
				parameterList[parameterName] = parameterValue;
			}
			var theratingID = parameterList['q'];
			var theVote = parameterList['j'];
			var theuserIP = parameterList['t'];
			var theunits = parameterList['c'];
			var name = parameterList['name'];

			// for testing
			// alert('sndReq('+theVote+','+theratingID+','+theuserIP+','+theunits+')');
			// return false;
			sndReq(theVote, theratingID, theuserIP, theunits, name);
			return false;
		}
	}

};
Behaviour.register(ratingAction);
