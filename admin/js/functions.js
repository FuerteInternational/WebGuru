function startPage() {
	clock();
}

var secondsToGo = 0;



function clock() {
        now= new Date();
		secondsToGo++;
        hours= now.getHours();
        minutes= now.getMinutes();
        seconds= now.getSeconds();
        timeStr= "" + hours;
        timeStr+= ((minutes < 10) ? ":0" : ":") + minutes;
        timeStr+= ((seconds < 10) ? ":0" : ":") + seconds;
        $('#acttime').html(timeStr);
		if (secondsToGo > 1800) showLogin();
        Timer = setTimeout("clock()", 1000);
}

function generateWeb() {
	
	return false;
}

function showLogin() {
	
}

function confirmAction(message) {
	confirmation = window.confirm(message);
	if (confirmation) {
		return true;
	}
	else {
		return false;
	}
}

function newWindow(width, height, address, name) {
	new_win = window.open(address, name, 'toolbar=no, menubar=no, location=no, directories=no, scrollbars=yes, resizable=no, status=no, width='+width+', height='+height+'');
}

function safeText(text, what) {
	var addr = './js/ajax/scripts/safeText.php';
	var text = $.ajax({ url: addr, async: false, data: 'text=' + text }).responseText;
	$(what).val(text);
}