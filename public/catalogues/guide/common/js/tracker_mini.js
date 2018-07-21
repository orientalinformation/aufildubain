
(function () {
	
	MainFrame = window.MainFrame || {};

	MainFrame.Tracker = {

		disallowedDomains: ['dGFnYmxldS5uZXQ=', 'ZWFzeS1wdWJsaWNhdGlvbi5jb20=', 'MTkyLjE2OA==', 'cHJlc3RpbWVkaWE='],

		// the main.xml id of the catalog
		mainModuleId: 'catalog',

		config: {},
		trackers: [],
		trackedEvents: [],
		loadedTrackers: 0,
		trackersCounter: 0,
		gaVersion: 'analytics',


		initializeTracker: function () {

			var testingServer = false;

			var currentDomain = window.location.hostname;

			this.disallowedDomains.forEach(function (domain) {

				var decodedDomain = MainFrame.Tracker.base64decode(domain);
				if (currentDomain.indexOf(decodedDomain) !== -1) {
					/* testingServer = true; */
				}
			});

			var currentUrl = window.location.href;
			if (currentUrl.indexOf('trackingTest=true') !== -1) {
				testingServer = true;
			}

			if (testingServer) {
				MainFrame.Tracker.callTracker = MainFrame.Tracker.callTrackerMockup;
			}
		},


		init: function (options) {
			var trackedEventCodes = options.codes;
			if (!trackedEventCodes.length) {
				trackedEventCodes = ['110', '110-120', '210', '230', '250', '260', '310', '320', '410','415','420','430','440','450','460','510-520', '610', '620', '810', '910', '920'];
				options.codes = trackedEventCodes;
			}
			
			this.gaVersion = options.version ? options.version : this.gaVersion;

			this.trackers.push(options);
			
			this.trackersCounter++			

			switch (options.type) {
				case 'Omniture':
					this.initOmnitureTracker(options.vars);
					break;

				case 'XITI':
					this.initXITITracker(options.vars);
					break;

				case 'GA':
				// falltrough
				default:
					this.initGoogleAnalyticsTracker(options.vars, this.gaVersion);
					break;
			}
		},
		
		initOmnitureTracker: function (data) {
			
			for (var name in data) {
				window[name] = data[name]
			}
			this.trackerLoader(window.url)
		},

		initXITITracker: function (data) {
			for (var name in data) {
				if(name == 'xtnv' && data[name] == 'document')
					window[name] = window.document
				else
					window[name] = data[name]
			}
			
			if(location.href.indexOf('common/facebook')>=0){
				if(window.url.indexOf('http')==-1){
					window.url = '../../'+window.url
				}
			}
			
			this.trackerLoader(window.url)
		},


		initGoogleAnalyticsTracker: function (data, version) {
		
			switch (version) {

				case 'analytics':
					this.initGoogleAnalyticsTracker_analytics(data);
					break;

				case 'ga.js':
					// falltrough
				default:
					this.initGoogleAnalyticsTracker_gajs(data);
					break;
			}
		},


		initGoogleAnalyticsTracker_analytics: function (data) {

			this.trackerLoader(('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/analytics.js');
			var r = 'ga', i = window;
			i['GoogleAnalyticsObject']=r;
			i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)
			},i[r].l=1*new Date();
			ga('create', data['_setAccount'], 'auto');
			
		},


		initGoogleAnalyticsTracker_gajs: function (data) {
			this.trackerLoader(('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js');
		
			window._gaq = window._gaq || [];

			for (var name in data) {
				window._gaq.push([name, data[name]]);
			} 
			
		},
		
		trackerLoader: function(url){
			(function() {
				var ga = document.createElement('script'); 
				ga.type = 'text/javascript'; 
				ga.async = true;
				ga.onload = function(){
					MainFrame.Tracker.loadedTrackers++					
					if(MainFrame.Tracker.finishedLoading()){
						if(MainFrame.EventHandler){
							MainFrame.EventHandler.dispatch('catalogLoadedTrackerInit')
						}
					}
				}
				ga.src = url;
				
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();
		},
		
		finishedLoading: function(){
			if(this.loadedTrackers == this.trackersCounter){
				//MainFrame.EventHandler.dispatch('catalogLoadedTrackerInit')
				return true
			}
			else return false
		},

		sendTrackedEvent: function (eventCode, actionTrigger, actionInitiator, params) {

			if (!this.mainModule) {
				this.mainModule = MainFrame.Manager.Scoping.getById(this.mainModuleId);
			}

			var currentPage = this.mainModule.currentPage,
				currentPageData = this.mainModule.pageReferences[currentPage],
				currentPageNumber = currentPageData.number;

			var trackedEvent = null;

			switch (eventCode) {

				case '110':
					trackedEvent = '/open/direct/page=' + params[0];
					break;

				case '110-120':
					// params[0] = refferal
					if (params[0] === 'mail') {
						trackedEvent = '/open/mail/page=' + currentPageNumber;
					} else {
						trackedEvent = '/open/direct/page=' + currentPageNumber;
					}
					break;

				case '210':
					trackedEvent = '/access/navigation/page=' + params[0];
					break;

				case '230':
					trackedEvent = '/access/summary/page=' + params[0];
					break;

				case '250':
					trackedEvent = '/access/thumbnails/page=' + params[0];
					break;
					
				case '260':
					trackedEvent = '/access/search/page=' + params[0];
					break;

				case '310':
					trackedEvent = '/pdf/print/page=' + params[0];
					break;

				case '320':
					trackedEvent = '/pdf/download/page=' + params[0];
					break;

				case '410':
					trackedEvent = '/mail/open/';
					break;
					
				case '415':
					trackedEvent = '/mail/send/';
					break;
					
				case '420':
					trackedEvent = '/sharing/facebook';
					break;
					
				case '430':
					trackedEvent = '/sharing/twitter';
					break;
					
				case '440':
					trackedEvent = '/sharing/linkedin';
					break;
					
				case '450':
					trackedEvent = '/sharing/pinterest';
					break;
				case '460':
					trackedEvent = '/sharing/google+';
					break;
					
				case '510-520':
					// params[0] = current page
					// params[1] = orientation
					// params[2] = pagingType
					if (this.mainModule.settings.pages.catalogType == 'double' && this.mainModule.orientation == 'landscape') {
						trackedEvent = '/zoom/double_page/page=' + currentPageNumber;
					} else if (this.mainModule.orientation == 1) {
						trackedEvent = '/zoom/single_page/page=' + currentPageNumber;
					}
					break;
					
				case '610':
					var ref = typeof(actionInitiator.refs) == 'Object' ? actionInitiator.refs[0] : actionInitiator.ref
					trackedEvent = '/product/' + ref.type + '/url=' + ref.url;
					break;

				case '620':
					var ref = typeof(actionInitiator.refs) == 'Object' ? actionInitiator.refs[0] : actionInitiator.ref
					trackedEvent = '/product/' + ref.type + '/page=' + currentPageNumber;
					break;
					
				case '810':
					trackedEvent = '/search/keyword=' + params[0];
					break;
					
				case '910':
					trackedEvent = '/scrollshop/open';
					break;
					
				case '920':
					trackedEvent = '/scrollshop/action/goto/page='+params[0];
					break;

				default:
					break;

			}

			if (trackedEvent) {
				for (var i in MainFrame.Tracker.trackers) {
					var trackerObj = MainFrame.Tracker.trackers[i];
					var eventIsTracked = (trackerObj.codes.indexOf(eventCode) !== -1)
					if (eventIsTracked) {
						MainFrame.Tracker.callTracker({
							source: 'html5',
							type: trackerObj.type,
							trackedEvent: trackedEvent,
							trackerObj: trackerObj
						});
					}
				}
			}
		},


		callTracker: function (options) {
			if(this.finishedLoading()){
				//callTracker for queued events
				if(this.trackedEvents.length!=0){
					for(var i in this.trackedEvents)
						this.callTrackerQueue()
				}
				
				var name = "catalogue";
				var variableName = (String(options.source).indexOf("flash")>=0) ? String(options.source).split("flash").join(name) : String(options.source).split("html5").join(name+"_html5");
				if (options.trackerObj) {
					if (options.trackerObj.vars.catalogVarName) {
						variableName = options.trackerObj.vars.catalogVarName ? options.trackerObj.vars.catalogVarName : variableName;
					}
				}
				
				var trackedEvent = variableName + options.trackedEvent;	
				//var trackedEvent = options.source + options.trackedEvent;
				
				switch (options.type) {
				
					case 'Omniture':					
						var s = window['s']
						s.pageName = trackedEvent
						s.t()
						break;

					case 'XITI':
						trackedEvent = trackedEvent.split('/').join('::');
						xt_med('F',window.xtn2,trackedEvent);
						break;

					case 'GA':
					// falltrough
					default:
						if (this.gaVersion === 'analytics') {
							ga('send', 'pageview',  trackedEvent);
						} else {
							window._gaq.push(['_trackPageview',trackedEvent]);
						}
						break;
				}
			}
			else{
				this.trackedEvents.push(options)
			}
		},
		
		callTrackerQueue: function () {
			var trackedEvent = this.trackedEvents.pop()
			MainFrame.Tracker.callTracker(trackedEvent)
		},


		callTrackerMockup: function (options) {
			var name = "catalogue";
			var variableName = (String(options.source).indexOf("flash")>=0) ? String(options.source).split("flash").join(name) : String(options.source).split("html5").join(name+"_html5");
			if (options.trackerObj) {
				if (options.trackerObj.vars.catalogVarName) {
					variableName = options.trackerObj.vars.catalogVarName ? options.trackerObj.vars.catalogVarName : variableName;
				}
			}
			
			var trackedEvent = variableName + options.trackedEvent;
			console.log(options.type + ': ' + trackedEvent);
		},


		keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",


		base64encode: function (input) {

			var keyStr = this.keyStr;

			input = escape(input);

			var output = '',
				chr1, chr2, chr3,
				enc1, enc2, enc3, enc4;

			var i = 0;
			do {

				chr1 = input.charCodeAt(i++);
				chr2 = input.charCodeAt(i++);
				chr3 = input.charCodeAt(i++);

				enc1 = chr1 >> 2;
				enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
				enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
				enc4 = chr3 & 63;

				if (isNaN(chr2)) {
					enc3 = enc4 = 64;
				} else if (isNaN(chr3)) {
					enc4 = 64;
				}

				output = output
					   + keyStr.charAt(enc1)
					   + keyStr.charAt(enc2)
					   + keyStr.charAt(enc3)
					   + keyStr.charAt(enc4);
				chr1 = chr2 = chr3 = '';
				enc1 = enc2 = enc3 = enc4 = '';
			} while (i < input.length);

			return output;
		},


		base64decode: function (input) {

			var keyStr = this.keyStr;

			var output = '',
				chr1, chr2, chr3,
				enc1, enc2, enc3, enc4;

			// removing all characters that are not A-Z, a-z, 0-9, +, /, or =
			input = input.replace(/[^A-Za-z0-9\+\/\=]/g, '');

			var i = 0;
			do {

				enc1 = keyStr.indexOf(input.charAt(i++));
				enc2 = keyStr.indexOf(input.charAt(i++));
				enc3 = keyStr.indexOf(input.charAt(i++));
				enc4 = keyStr.indexOf(input.charAt(i++));

				chr1 = (enc1 << 2) | (enc2 >> 4);
				chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
				chr3 = ((enc3 & 3) << 6) | enc4;

				output = output + String.fromCharCode(chr1);

				if (enc3 != 64) {
					output = output + String.fromCharCode(chr2);
				}

				if (enc4 != 64) {
					output = output + String.fromCharCode(chr3);
				}

				chr1 = chr2 = chr3 = '';
				enc1 = enc2 = enc3 = enc4 = '';

			} while (i < input.length);

			return unescape(output);
		},
	}
	
		// Production steps of ECMA-262, Edition 5, 15.4.4.18
	// Reference: http://es5.github.io/#x15.4.4.18
	if (!Array.prototype.forEach) {

	  Array.prototype.forEach = function(callback, thisArg) {

	    var T, k;

	    if (this == null) {
	      throw new TypeError(' this is null or not defined');
	    }

	    // 1. Let O be the result of calling ToObject passing the |this| value as the argument.
	    var O = Object(this);

	    // 2. Let lenValue be the result of calling the Get internal method of O with the argument "length".
	    // 3. Let len be ToUint32(lenValue).
	    var len = O.length >>> 0;

	    // 4. If IsCallable(callback) is false, throw a TypeError exception.
	    // See: http://es5.github.com/#x9.11
	    if (typeof callback !== "function") {
	      throw new TypeError(callback + ' is not a function');
	    }

	    // 5. If thisArg was supplied, let T be thisArg; else let T be undefined.
	    if (arguments.length > 1) {
	      T = thisArg;
	    }

	    // 6. Let k be 0
	    k = 0;

	    // 7. Repeat, while k < len
	    while (k < len) {

	      var kValue;

	      // a. Let Pk be ToString(k).
	      //   This is implicit for LHS operands of the in operator
	      // b. Let kPresent be the result of calling the HasProperty internal method of O with argument Pk.
	      //   This step can be combined with c
	      // c. If kPresent is true, then
	      if (k in O) {

	        // i. Let kValue be the result of calling the Get internal method of O with argument Pk.
	        kValue = O[k];

	        // ii. Call the Call internal method of callback with T as the this value and
	        // argument list containing kValue, k, and O.
	        callback.call(T, kValue, k, O);
	      }
	      // d. Increase k by 1.
	      k++;
	    }
	    // 8. return undefined
	  };
	}

	MainFrame.Tracker.initializeTracker();

})();