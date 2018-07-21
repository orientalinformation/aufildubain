
(function () {

	var V7 = function () {
	
		var isWin 	 = (navigator.appVersion.toLowerCase().indexOf("win") != -1)					? true : false,
			isIE  	 = (navigator.userAgent.match(/MSIE/) || navigator.userAgent.match(/Trident/)) 	? true : false, ieVer = 0,
			isOpera  = (navigator.userAgent.match(/Opera/)) 										? true : false,
			isFF 	 = (navigator.userAgent.match(/Firefox/))										? true : false,
			isChrome = (navigator.userAgent.match(/Chrome/))										? true : false;
	
		var path 		= '';
		
		function init(_path){
			document.body.innerHTML='';
			var apps = (typeof availableApps !== 'undefined') ? availableApps : ['desktop' , 'html'];
			if (isMobile()){
				var newApps = []
				
				for (var i=0;i<apps.length;i++) {
					if ('html' == apps[i]){
						newApps.push('html')
						break
					}
				}
				
				if(newApps.length === 0){
					for (var i=0;i<apps.length;i++) {
						if ('desktop' == apps[i]){
							newApps.push('desktop')
						}
					}
				}
				apps = newApps
			}
			/* apps = [
				'html',
				'desktop',	
			]; */
			path = _path != '' ? _path : getBaseUrl()
			initApp(apps)
		}
		
		function initApp(apps){
			// worst case scenario : No html5 support and no flash support.
			if(html5NotSupported() ){
				if(GetSwfVer())
					apps = ['flash'];
				else
					return false;
			}
			
			//  se face rescriere de lista pe baza get
			apps = rewriteApps(apps)
			
			for (var i=0;i<apps.length;i++) {
				switch(apps[i]){
					case 'desktop':
					case 'html':
						return putMyHtml5(path, apps[i]);
					break;
					case 'flash':
						if(GetSwfVer())
							return putMyFlash(path, 'main');
					break;
				}
			}
			// practic am un browser care nu suporta nimic. Mesaj de eroare
			return false
		}
		
		function rewriteApps(apps){
			var catalogVersion = getCatalogVersion()
			
			
			switch(catalogVersion){
				
				
				case 'h5' 		:
					if (isMobile()) {
						catalogVersion = "html"
					} else {
						catalogVersion = "desktop"
					}
				break;
				
				case 'mobile' 	:
					catalogVersion = 'html';
				break;
				
			}
			
			var applicationExists = false
			for (var i=0;i<apps.length;i++) {
				if (catalogVersion == apps[i]){
					applicationExists = true
					break
				}
			}
			if (applicationExists) {
				var newApps = []
				newApps.push(catalogVersion)
				for (var i=0;i<apps.length;i++) {
					if (catalogVersion != apps[i]){
						newApps.push(apps[i])
					}
				}
				apps = newApps
			}
			return apps
		}
		
		function putMyFlash(appUrl, fileName) {

			var baseUrl  = getBaseUrl(),
				hasHttp  = (appUrl.indexOf('http://') !== -1),
				hasHttps = (appUrl.indexOf('https://') !== -1),
				hasFile	 = (appUrl.indexOf('file://') !== -1),
				beginsWithSlash = (appUrl.indexOf('/') === 0),
				isAbsoluteUrl 	= (typeof appUrl !== 'undefined' && (hasHttp || hasHttps || hasFile || beginsWithSlash));
			

			appUrl = (isAbsoluteUrl) ? appUrl : baseUrl + appUrl;

			var flashObject	 = '', 
				flashVars 	 = '',
				flashContent = document.getElementById('wrapper');

			if (!flashContent) {
				var body = document.body || document.getElementsByTagName("body")[0];
				
				var flashContentHTML_fr = '\
					<div id="wrapper">\
						<div id="incompatibilityMessage">\
							Si vous voyez ce message, le catalogue interactif online a rencontré des problèmes et n\'arrive pas s\'afficher correctement.</br></br>\
							Veuillez s\'il vous plaît suivre les étapes suivantes :</br></br>\
							- vérifiez que le Javascript est activé dans votre navigateur;</br>\
							- vérifiez que le plugin Flash est activé dans votre navigateur;</br></br>\
							Si ce message persiste, pensez à mettre à jour votre navigateur.</br></br>\
						</div>\
						<div id="by">\
							<a href="http://www.prestimedia.fr">Catalogue interactif online</a> réalisé par Prestimedia\
						</div>\
					</div>',
					flashContentHTML_en = '<div id="noFlashContent"> The Flash Player plugin is required in order to browse this interactive online catalogue.<br /> Click <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=shockwaveFlash" style="font-weight:bold">here</a> to download it.<br /><br /> You should also check that Javascript is enabled in your browser.<br /><br /> If you do not wish to install the Flash Player plugin, click <a href="index.html?version=html5" style="font-weight:bold">here</a> for the html5 version of this interactive online catalogue.<br /><br /> If you\'re on a tablet or smartphone, please ignore this message. <div style="position:absolute;height:20px;width:220px;bottom:0px;right:0px;font-size:9px"> <a href="http://www.prestimedia.eu" style="font-size:9px">Interactive online catalogue</a> made by Prestimedia </div> </div>',
					flashContentHTML_ro = '<div id="noFlashContent"> Plugin-ul Flash Player este necesar pentru a consulta acest catalog interactiv online.<br /> Apasati <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=shockwaveFlash" style="font-weight:bold">aici</a> pentru a-l descarca.<br /><br /> Verificati deasemenea ca Javascript este activat in browser.<br /><br /> Daca nu doriti instalarea plugin-ului Flash Player, apasati <a href="index.html?version=html5" style="font-weight:bold">aici</a> pentru versiunea html5 a catalogului interactiv online.<br /><br /> Daca navigati de pe o tableta sau smartphone, va rugam sa ignorati acest mesaj. <div style="position:absolute;height:20px;width:220px;bottom:0px;right:0px;font-size:9px"> <a href="http://www.prestimedia.ro" style="font-size:9px">Catalog interactiv online</a> realizat de Prestimedia </div> </div>',
					flashContentHTML_it = '<div id="noFlashContent"> Per consultare questo catalogo interattivo online è necessario il plug-in Flash<br /> Clicca <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=shockwaveFlash" style="font-weight:bold">qui</a> per scaricarlo<br /><br /> Verifica anche che sul tuo browser sia attivo Javascript.<br /><br /> Se non vuoi installare Flash, clicca <a href="index.html?version=html5" style="font-weight:bold">qui</a> per il catalogo interattivo online in versione html5<br /><br /> Se sei su uno smartphone o su un tablet, ignora questo messaggio <div style="position:absolute;height:20px;width:220px;bottom:0px;right:0px;font-size:9px"> <a href="http://www.prestimedia.it" style="font-size:9px">Catalogo interattivo online</a> realizzato da Prestimedia </div> </div>',
					flashContentHTML_de = '<div id="noFlashContent"> Das Flash Player-Plug-in ist notwendig für die Abfrage dieses interaktiven Katalogs online.<br /> Drücken Sie bitte <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=shockwaveFlash" style="font-weight:bold">hier</a> um das Programm herunterzuladen.<br /><br /> Bitte vergewissern Sie sich, dass JavaScript in Ihrem Webbrowser aktiviert ist.<br /><br /> Wenn Sie das Flash Player Plug-in nicht installieren möchten, drücken Sie bitte <a href="index.html?version=html5" style="font-weight:bold">hier</a> für die HTML5-Version des interaktiven Katalogs online.<br /><br /> Sollten Sie mit Hilfe eines Mobiltelefons oder eines Tablet-PCs im Internet surfen, bitten wir Sie diese Nachricht zu ignorieren. <div style="position:absolute;height:20px;width:220px;bottom:0px;right:0px;font-size:9px"> <a href="http://www.prestimedia.de" style="font-size:9px">Interaktiver Katalog online</a> realisiert durch Prestimedia. </div> </div>';

				body.innerHTML = flashContentHTML_fr;
				flashContent = document.getElementById('wrapper');
			}
				
			var facebookApplicationLink = '',
				facebookApplicationSK	= '';
			
			flashObject += '<object type="application/x-shockwave-flash" data="'+appUrl+fileName+'.swf" style="display:block;width:100%;height:100%;margin:0;" id="flashpiece">';
			flashObject += '<param name="movie" 				value="'+appUrl+fileName+'.swf">';
			flashObject += '<param name="menu" 					value="false"> ';
			flashObject += '<param name="quality" 				value="high"> ';
			flashObject += '<param name="bgcolor" 				value="#FFFFFF">';
			flashObject += '<param name="swLiveConnect" 		value="true">';
			flashObject += '<param name="allowScriptAccess" 	value="sameDomain" />';	
			flashObject += '<param name="allowFullScreen" 		value="true" />';
			
			if (appUrl!="../../") {
				flashVars += "appUrl="+encodeURIComponent(appUrl);
			}
			if (facebookApplicationLink!="" && facebookApplicationSK!="") {
				if (flashVars!="") {
					flashVars += "&";
				}
				flashVars += "facebookAppLink="+facebookApplicationLink+"&facebookApplicationSK="+facebookApplicationSK;
			}
			if (flashVars!="") {
				flashObject += '<param name="FlashVars" value="'+flashVars+'" />';
			}
			wmodeObjectValue = "opaque";
			if(isFF) {
				wmodeObjectValue = "direct";
			}
			//IE8   -> navigate to url will work on IE8 only if wmode=window
			if (html5NotSupported()){
				wmodeObjectValue = "window";
			}
			wmodeObject = '<param name="wmode" value="'+wmodeObjectValue+'" />';

			
			
			flashObject += wmodeObject
			flashObject += '</OBJECT>';
			
			flashContent.innerHTML=flashObject;
	
									
			var flashMovie = document.getElementById('flashpiece')

			// scroll Detection 
			if(isFF) {
				if(isWin) {
					if (wmodeObjectValue=="transparent" ) {
						this.addEventListener('DOMMouseScroll', function(e){
							e.preventDefault();
							flashMovie.catalogHandleWheel(-(e.detail));
						}, false);
					}
				} else {
					this.addEventListener('DOMMouseScroll', function(e){
						e.preventDefault();
						flashMovie.catalogHandleWheel(-(e.detail));
					}, false);
				}
			}
			
			flashMovie.focus()
		}
		
		function putMyHtml5(path, version){

			var arr =['common/js/src-mini.js', 'common/js/lib/lib.min.js'],
				css =['common/css/style.css', 'common/css/style_specific.css'],
				totalScriptsToLoad = arr.length,
				totalScriptsLoaded = 0;

			//document.body.innerHTML='';
			var divContainer = document.createElement('div');
				divContainer.setAttribute('id','container');
				divContainer.style.zindex = '100';
				document.body.appendChild(divContainer);
			
			for(var i=0;i<css.length;i++){
				var cssCore = document.createElement('link');
					cssCore.rel = 'stylesheet';
					cssCore.href = path + css[i];
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(cssCore, s);			
			}
			
			for(var i=0;i<arr.length;i++){
				var sCore = document.createElement('script')
				sCore.type = 'text/javascript'; 
				sCore.async = false;

				sCore.onload = function () {

					totalScriptsLoaded++;
					if (totalScriptsLoaded === totalScriptsToLoad) {
						new setAppInContainer({
							containerId: 'container',
							appUrl: path,
							version: 'html5autodetect',
							appFolder: version,
							configFile: {
								phone: '',
								tablet: '',
								desktop: ''
							},
							catalogSettings: {}
						});
						//embedVideo('')
					}
				};

				sCore.src = path + arr[i];
			
				document.body.appendChild(sCore)
			}
		}
		
		var embedVideoOverlay;
		function embedVideo(embedCode) {
		
			//embedCode = '<iframe width="420" height="315" src="https://www.youtube.com/embed/Rb1tsdkRj3k" frameborder="0" allowfullscreen></iframe>'
		
			embedVideoOverlay = document.createElement('div');
			embedVideoOverlay.className = 'v7__embed__center v7__embed__overlay';
			embedVideoOverlay.innerHTML = embedCode;


			var iframe = embedVideoOverlay.firstChild;
			iframe.className = 'v7__embed__center v7__embed__overlay-video-container';
			document.body.appendChild(embedVideoOverlay);
			
			embedVideoOverlay.onclick = function(e) {
				closeEmbedVideo();
			}
		}


		function closeEmbedVideo () {
			document.body.removeChild(embedVideoOverlay);
		}
		
		function urlExists(url)
		{
			if(location.protocol !== 'file:'){
				var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
					xhr.open('HEAD', url, false);
					xhr.send();
				return xhr.status!=404;
			}
			else return true;
			/*
			try {
				var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
				xhr.open('HEAD', url, false);
				xhr.send();
			} catch (e) {
				return false;
			} finally {
				if (xhr) {
					return xhr.status!=404;
				} else {
					return false;
				}
			}
			*/
		}
		
		function getCatalogVersion(){
			var query 			= location.search,
				catalogVersion 	= (/(version|v)=[a-z]\w+/.exec(query)) ? /(version|v)=[a-z]\w+/.exec(query)[0].split('=')[1] : '';
			
			return catalogVersion
		}
		
		function getBaseUrl () {
			// removing the hash
		    var rootUrl = window.location.href.split('?')[0];
		    if (rootUrl.indexOf('#') !== -1) {
		        var urlParts = rootUrl.split('#');
		        urlParts.pop();
		        rootUrl = urlParts.join('');
		    }

		    // removing any index.html or index.php parts
		    var urlParts = rootUrl.split('/');
		    urlParts.pop();
		    var baseUrl = urlParts.join('/') + '/';

		    return baseUrl;
		};

		function getUrlRequest () {

			var baseUrl = getBaseUrl(),
				path = getPath();
			
			if (path.indexOf('http') !== -1) {
				path = '';
			}
			
			return baseUrl + path;
		};


		function getIndex (full, url) {

			if (typeof full === 'undefined') {
				full = false;
			}

			var fullUrl  = (typeof url !== 'undefined') ? url : window.location.href,
				hasQuery = (fullUrl.indexOf('?') !== -1),
				hasHash  = (fullUrl.indexOf('#') !== -1);

			if (hasQuery || hasHash) {

				// the hash is automatically placed after the query, so the query will contain the hash as well
				if (hasQuery) {
					var parts = fullUrl.split('?'),
						query = parts[1],
						url   = parts[0];
				} else if (hasHash) {
					var parts = fullUrl.split('#'),
						hash  = parts[1],
						url   = parts[0];
				}
			} else {
				var url = fullUrl;
			}

			var parts = url.split('/'),
				index = parts.pop();


			if (full) {
				if (hasQuery) {
					index += '?' + query;
				} else if (hasHash) {
					index += '#' + hash;
				}
			}

			return index;
		};


		function getPath () {
			
			var totalPathCharacters = path.length;
			if (totalPathCharacters) {
				var lastCharIndex = totalPathCharacters - 1,
					lastPathCharacter = path[lastCharIndex];

				if (lastPathCharacter !== '/') {
					path += '/';
				}
			}
			
			return path;
		};

		function setPath (newPath) {
			path = newPath;
		};
		
		function html5NotSupported(){
		
			//IE9-
			var uaParts = (isIE) ? navigator.userAgent.split(';') : 0,
				isOldIE = false;
				
			for(var i=0; i < uaParts.length; i++){
				if(uaParts[i].match(/MSIE/)){
					ieVer = parseInt(uaParts[i].split('MSIE ')[1])
					if(ieVer < 10)
						isOldIE = true
				}
			}
			
			return isOldIE
			
		}

		function GetSwfVer(){

			var hasFlash = false;
			try {
			  var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
			  if (fo) {
				hasFlash = true;
			  }
			} catch (e) {
			  if (navigator.mimeTypes
					&& navigator.mimeTypes['application/x-shockwave-flash'] != undefined
					&& navigator.mimeTypes['application/x-shockwave-flash'].enabledPlugin) {
				hasFlash = true;
			  }
			}		
			
			return hasFlash;
		}
		
		
		
		function isMobile(){	
			var isiPhone = navigator.userAgent.indexOf("iPhone") != -1 ;
			var isiPod = navigator.userAgent.indexOf("iPod") != -1 ;
			var isBlackBerry = navigator.userAgent.indexOf("BlackBerry") != -1 ;
			var isAndroid = navigator.userAgent.indexOf("Android") != -1;
			var isiPad = navigator.userAgent.indexOf("iPad") != -1 ;
			var isKindleFire = navigator.userAgent.indexOf("Silk") != -1 ;

			var isWindowsPhoneInDesktopMode = (navigator.userAgent.match('Windows') && navigator.userAgent.match('Touch') && navigator.userAgent.match('ARM') && navigator.userAgent.match('WPDesktop'));
			var isWindowsMobile = (navigator.userAgent.match(/IEMobile/i) || isWindowsPhoneInDesktopMode)

			var isMobile = (isiPhone||isiPod||isiPad||isBlackBerry||isAndroid||isKindleFire||isWindowsMobile)?true:false
			return isMobile
		}

		function encodeString(val) {
			return encodeURIComponent(val);
		}
		function openArticle(url){
			window.open(url)
		}
		function openMailTo(url){
			window.location.href = url
		}
		
		return {
			init : init,
			getBaseUrl : getBaseUrl,
			getUrlRequest: getUrlRequest,
			getIndex: getIndex,
			getPath: getPath,
			setPath: setPath,
			encodeString : encodeString,
			embedVideo : embedVideo,
			closeEmbedVideo: closeEmbedVideo,
			openArticle : openArticle,
			openMailTo: openMailTo
		}
	};


	window.V7 = new V7();
})();