/* ========================================
   jQuery SWFObject Plugin Testing
   ===================================== */
//
this.jQuery = this.jQuery || { fn: {} };
//
(function(win, jQuery) {
	/* ========================================
	   Helper Functions
	   ===================================== */
	// Returns if a value is defined
	function isDefined(val, Const) {
		return val !== undefined && val !== null;
	}
	// Returns if a value uses a constructor
	function isConstructor(val, Const) {
		return val !== undefined && val !== null && val.constructor === Const;
	}
	// Returns an url encoded string
	function urlEncode(val) {
		return encodeURIComponent(String(val));
	}
	// Returns a parameter encoded string
	function paramEncode(val) {
		if (isConstructor(val, Object)) {
			var arr = [], e;
			for (e in val) arr.push(urlEncode(e) + '=' + urlEncode( isConstructor(val[e], Object) ? stringifyObject(val[e]) : val[e] ) );
			return arr.join('&');
		} else return urlEncode(val);
	}
	// Returns a merged object
	function mergedObject() {
		var newObject = {}, arg = arguments, argLen = arg.length, i = -1, e;
		while (++i < argLen) {
			if (isConstructor(arg[i], Object)) {
				for (e in arg[i]) {
					newObject[e] = isConstructor(newObject[e], Object) && isConstructor(arg[i][e], Object)
						? arg.callee(newObject[e], arg[i][e])
						: arg[i][e];
				}
			}
		}
		return newObject;
	}
	// Returns a safely quoted string
	function quoteStr(str) {
		return "'" +
		String(str)
		.replace(/\\/g, '\\\\')
		.replace(/'/g, "\\'")
		.replace(/\n/g, '\\n')
		.replace(/\r/g, '\\r')
		.replace(/\t/g, '\\t') +
		"'";
	}
	// Returns a stringified object
	function stringifyObject(val) {
		var callee = arguments.callee, valArr = [], valLen, i = -1, e;
		// string
		if (isConstructor(val, String)) return quoteStr(val);
		// boolean, function, number, regexp, undefined, null
		if (
			val === undefined ||
			val === null ||
			isConstructor(val, Boolean) ||
			isConstructor(val, Number) ||
			isConstructor(val, RegExp) ||
			isConstructor(val, Function)
		) return String(val);
		// date
		if (isConstructor(val, Date)) return val.getTime();
		// array
		if (isConstructor(val, Array)) {
			valLen = val.length;
			while (++i < valLen) valArr.push(callee(val[i]));
			return '[' + valArr + ']';
		}
		// object
		if (isConstructor(val, Object)) {
			for (e in val) valArr.push(quoteStr(e) + ':' + callee(val[e]));
			return '{' + valArr + '}';
		}
		return undefined;
	}
	/* ========================================
	   Flash Object Ready Detection
	   ===================================== */
	// Returns if a flash object is ready
	function isFlashObjectReady(el) {
		return (('object' in el && el.object) || (!('object' in el) && el.clientWidth));
	}
	/* ========================================
	   Flash Detection
	   ===================================== */
	// Set Flash Version
	var flashVersion = [].concat.apply(
		[],
		(function(flashVersion, flashPlugin) {
			try {
				return !flashPlugin
					? new ActiveXObject('ShockwaveFlash.ShockwaveFlash').GetVariable('$version')
					: flashPlugin.description;
			}
			catch (e) {
				return '0 0 0';
			}
		})('0 0 0', win.navigator.plugins['Shockwave Flash']).match(/\d+/g)
	);
	/* ========================================
	   jQuery SWFObject Plugin
	   ===================================== */
	jQuery.flash = {
		// is flash available
		available: !!flashVersion[0],
		// current version of flash
		version: flashVersion.join('.'),
		// default flash object attributes
		defaultFlashObjectAttrs: {
			'class': '',
			height: 180,
			id: '',
			style: '',
			type: 'application/x-shockwave-flash',
			width: 320
		},
		// default flash parameter attributes
		defaultFlashParamAttrs: {
			allowfullscreen: true,
			allownetworking: 'all',
			allowscriptaccess: 'always',
			base: '',
			bgcolor: '',
			flashvars: {},
			fullscreenaspectratio: '',
			loop: true,
			menu: false,
			movie: '',
			play: 'true',
			quality: 'high',
			salign: 'tl',
			scale: 'default',
			seamlesstabbing: true,
			swliveconnect: 'default',
			wmode: 'opaque'
		},
		// return if browser has verion of flash
		hasVersion: function (val) {
			checkVersion = String(val).split('.');
			return !(checkVersion[0] > flashVersion[0] || checkVersion[1] > flashVersion[1] || checkVersion[2] > flashVersion[2]);
		},
		// create flash object function
		create: function (options) {
			// Set Variables
			var
			div = document.createElement('div'),
			objectAttrs = mergedObject(jQuery.flash.defaultFlashObjectAttrs),
			paramAttrs = mergedObject(jQuery.flash.defaultFlashParamAttrs),
			objectAttrsArr = [],
			paramAttrsArr = [],
			flashVarAttrs = {},
			swfFile, onReadyFn, hasVersion = jQuery.flash.hasVersion(1), onVersionFailFn, e, eLowerCase, flashObject;
			// Sort Options
			if (isConstructor(options, Object)) for (e in options) {
				eLowerCase = e.toLowerCase();
				if (/^(data|href|src|swf)$/.test(eLowerCase)) swfFile = options[e];
				else if (eLowerCase == 'onready') onReadyFn = options[e];
				else if (eLowerCase == 'requireversion') hasVersion = jQuery.flash.hasVersion(options[e]);
				else if (eLowerCase == 'object') objectAttrs = mergedObject(objectAttrs, options[e]);
				else if (eLowerCase == 'params') paramAttrs = mergedObject(paramAttrs, options[e]);
				else if (isDefined(jQuery.flash.defaultFlashObjectAttrs[eLowerCase])) objectAttrs[eLowerCase] = options[e];
				else if (isDefined(jQuery.flash.defaultFlashParamAttrs[eLowerCase]))  paramAttrs[eLowerCase] = options[e];
				else flashVarAttrs[e] = options[e];
			} else swfFile = options;
			// Merge flashvars
			paramAttrs.flashvars = mergedObject(paramAttrs.flashvars, flashVarAttrs);
			// Plug in the Flash movie
			objectAttrs.data = swfFile;
			paramAttrs.movie = swfFile;
			// Create HTML fragments for the <object> and <param> properties
			for (e in objectAttrs) objectAttrsArr.push(e + '="' + objectAttrs[e] + '"');
			for (e in paramAttrs) paramAttrsArr.push(['<param name=', e, ' value=', paramEncode(paramAttrs[e]), '>'].join('"'));
			// Render the completed Flash Object
			div.innerHTML = [
				'<object ', objectAttrsArr.join(' ') , '>',
			].concat(paramAttrsArr).join('');
			// Assign the completed Flash Object
			flashObject = div.firstChild;
			// Prepare the onReady function
			if (hasVersion) {
				(function () {
					if (onReadyFn && isFlashObjectReady(flashObject)) onReadyFn(flashObject); else setTimeout(arguments.callee, 200);
				})();
				// Return the Flash Object
				return flashObject;
			} else if (onVersionFailFn) return onVersionFailFn(flashObject);
		}
	};
	// Flash Plugin
	jQuery.fn.flash = function (options) {
		// Initialize options
		options = options || {};
		var
		i = -1,
		ii,
		each,
		attrs;
		// Go through each element in the collection
		while ((each = this.eq(++i))[0]) {
			// Get attributes
			attrs = each[0].attributes;
			ii = -1;
			// Copy attributes to options
			while ((attr = attrs[++ii])) options[attr.name] = options[attr.name] || attr.value;
			// Empty an element and append a flash object
			each.replaceWith(jQuery.flash.create(options));
		}
	}
})(this, jQuery);