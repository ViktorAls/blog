/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-audio-backgroundblendmode-canvas-cssanimations-csscalc-cssfilters-cssgradients-cssremunit-csstransforms-csstransforms3d-csstransitions-flexbox-flexboxlegacy-flexboxtweener-flexwrap-svg-touchevents-video-setclasses !*/
!function(e,n,t){function r(e,n){return typeof e===n}function o(){var e,n,t,o,a,s,i;for(var l in T)if(T.hasOwnProperty(l)){if(e=[],n=T[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=r(n.fn,"function")?n.fn():n.fn,a=0;a<e.length;a++)s=e[a],i=s.split("."),1===i.length?Modernizr[i[0]]=o:(!Modernizr[i[0]]||Modernizr[i[0]]instanceof Boolean||(Modernizr[i[0]]=new Boolean(Modernizr[i[0]])),Modernizr[i[0]][i[1]]=o),x.push((o?"":"no-")+i.join("-"))}}function a(e){var n=b.className,t=Modernizr._config.classPrefix||"";if(C&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),C?b.className.baseVal=n:b.className=n)}function s(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):C?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function i(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function l(){var e=n.body;return e||(e=s(C?"svg":"body"),e.fake=!0),e}function c(e,t,r,o){var a,i,c,u,d="modernizr",f=s("div"),p=l();if(parseInt(r,10))for(;r--;)c=s("div"),c.id=o?o[r]:d+(r+1),f.appendChild(c);return a=s("style"),a.type="text/css",a.id="s"+d,(p.fake?p:f).appendChild(a),p.appendChild(f),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(n.createTextNode(e)),f.id=d,p.fake&&(p.style.background="",p.style.overflow="hidden",u=b.style.overflow,b.style.overflow="hidden",b.appendChild(p)),i=t(f,e),p.fake?(p.parentNode.removeChild(p),b.style.overflow=u,b.offsetHeight):f.parentNode.removeChild(f),!!i}function u(e,n){return function(){return e.apply(n,arguments)}}function d(e,n,t){var o;for(var a in e)if(e[a]in n)return t===!1?e[a]:(o=n[e[a]],r(o,"function")?u(o,t||n):o);return!1}function f(e,n){return!!~(""+e).indexOf(n)}function p(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(n,t,r){var o;if("getComputedStyle"in e){o=getComputedStyle.call(e,n,t);var a=e.console;if(null!==o)r&&(o=o.getPropertyValue(r));else if(a){var s=a.error?"error":"log";a[s].call(a,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else o=!t&&n.currentStyle&&n.currentStyle[r];return o}function v(n,r){var o=n.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(p(n[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var a=[];o--;)a.push("("+p(n[o])+":"+r+")");return a=a.join(" or "),c("@supports ("+a+") { #modernizr { position: absolute; } }",function(e){return"absolute"==m(e,null,"position")})}return t}function y(e,n,o,a){function l(){u&&(delete A.style,delete A.modElem)}if(a=r(a,"undefined")?!1:a,!r(o,"undefined")){var c=v(e,o);if(!r(c,"undefined"))return c}for(var u,d,p,m,y,g=["modernizr","tspan","samp"];!A.style&&g.length;)u=!0,A.modElem=s(g.shift()),A.style=A.modElem.style;for(p=e.length,d=0;p>d;d++)if(m=e[d],y=A.style[m],f(m,"-")&&(m=i(m)),A.style[m]!==t){if(a||r(o,"undefined"))return l(),"pfx"==n?m:!0;try{A.style[m]=o}catch(h){}if(A.style[m]!=y)return l(),"pfx"==n?m:!0}return l(),!1}function g(e,n,t,o,a){var s=e.charAt(0).toUpperCase()+e.slice(1),i=(e+" "+$.join(s+" ")+s).split(" ");return r(n,"string")||r(n,"undefined")?y(i,n,o,a):(i=(e+" "+N.join(s+" ")+s).split(" "),d(i,n,t))}function h(e,n,r){return g(e,t,t,n,r)}var x=[],T=[],w={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){T.push({name:e,fn:n,options:t})},addAsyncTest:function(e){T.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=w,Modernizr=new Modernizr,Modernizr.addTest("svg",!!n.createElementNS&&!!n.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var b=n.documentElement,C="svg"===b.nodeName.toLowerCase();Modernizr.addTest("canvas",function(){var e=s("canvas");return!(!e.getContext||!e.getContext("2d"))}),Modernizr.addTest("audio",function(){var e=s("audio"),n=!1;try{n=!!e.canPlayType,n&&(n=new Boolean(n),n.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),n.mp3=e.canPlayType('audio/mpeg; codecs="mp3"').replace(/^no$/,""),n.opus=e.canPlayType('audio/ogg; codecs="opus"')||e.canPlayType('audio/webm; codecs="opus"').replace(/^no$/,""),n.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),n.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(t){}return n}),Modernizr.addTest("video",function(){var e=s("video"),n=!1;try{n=!!e.canPlayType,n&&(n=new Boolean(n),n.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),n.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),n.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),n.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),n.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(t){}return n}),Modernizr.addTest("cssremunit",function(){var e=s("a").style;try{e.fontSize="3rem"}catch(n){}return/rem/.test(e.fontSize)});var S=w._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];w._prefixes=S,Modernizr.addTest("csscalc",function(){var e="width:",n="calc(10px);",t=s("a");return t.style.cssText=e+S.join(n+e),!!t.style.length}),Modernizr.addTest("cssgradients",function(){for(var e,n="background-image:",t="gradient(linear,left top,right bottom,from(#9f9),to(white));",r="",o=0,a=S.length-1;a>o;o++)e=0===o?"to ":"",r+=n+S[o]+"linear-gradient("+e+"left top, #9f9, white);";Modernizr._config.usePrefixes&&(r+=n+"-webkit-"+t);var i=s("a"),l=i.style;return l.cssText=r,(""+l.backgroundImage).indexOf("gradient")>-1});var P="CSS"in e&&"supports"in e.CSS,_="supportsCSS"in e;Modernizr.addTest("supports",P||_);var E=w.testStyles=c;Modernizr.addTest("touchevents",function(){var t;if("ontouchstart"in e||e.DocumentTouch&&n instanceof DocumentTouch)t=!0;else{var r=["@media (",S.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");E(r,function(e){t=9===e.offsetTop})}return t});var z="Moz O ms Webkit",$=w._config.usePrefixes?z.split(" "):[];w._cssomPrefixes=$;var k=function(n){var r,o=S.length,a=e.CSSRule;if("undefined"==typeof a)return t;if(!n)return!1;if(n=n.replace(/^@/,""),r=n.replace(/-/g,"_").toUpperCase()+"_RULE",r in a)return"@"+n;for(var s=0;o>s;s++){var i=S[s],l=i.toUpperCase()+"_"+r;if(l in a)return"@-"+i.toLowerCase()+"-"+n}return!1};w.atRule=k;var N=w._config.usePrefixes?z.toLowerCase().split(" "):[];w._domPrefixes=N;var j={elem:s("modernizr")};Modernizr._q.push(function(){delete j.elem});var A={style:j.elem.style};Modernizr._q.unshift(function(){delete A.style}),w.testAllProps=g,w.testAllProps=h,Modernizr.addTest("cssanimations",h("animationName","a",!0)),Modernizr.addTest("flexboxlegacy",h("boxDirection","reverse",!0)),Modernizr.addTest("flexbox",h("flexBasis","1px",!0)),Modernizr.addTest("cssfilters",function(){if(Modernizr.supports)return h("filter","blur(2px)");var e=s("a");return e.style.cssText=S.join("filter:blur(2px); "),!!e.style.length&&(n.documentMode===t||n.documentMode>9)}),Modernizr.addTest("flexboxtweener",h("flexAlign","end",!0)),Modernizr.addTest("flexwrap",h("flexWrap","wrap",!0)),Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&h("transform","scale(1)",!0)}),Modernizr.addTest("csstransforms3d",function(){return!!h("perspective","1px",!0)}),Modernizr.addTest("csstransitions",h("transition","all",!0));var L=w.prefixed=function(e,n,t){return 0===e.indexOf("@")?k(e):(-1!=e.indexOf("-")&&(e=i(e)),n?g(e,n,t):g(e,"pfx"))};Modernizr.addTest("backgroundblendmode",L("backgroundBlendMode","text")),o(),a(x),delete w.addTest,delete w.addAsyncTest;for(var O=0;O<Modernizr._q.length;O++)Modernizr._q[O]();e.Modernizr=Modernizr}(window,document);