javascript:(function (href) {window.open("http://127.0.0.1:8989/followIn.php?href="+href);})(top.location.href);


javascript:(function (a, b, c, d) {
    function e(a, c) {
        if ("undefined" != typeof c) {
            var d = b.createElement("input");
            d.name = a, d.value = c, d.type = "hidden", p.appendChild(d)
        }
    }

    var f, g, h, i, j, k, l, m, n, o = a.encodeURIComponent, p = b.createElement("form"),
        q = b.getElementsByTagName("head")[0], r = "_press_this_app", s = !0;
    if (d) {
        if (!c.match(/^https?:/)) return void(top.location.href = d);
        if (d += "&u=" + o(c), c.match(/^https:/) && d.match(/^http:/) && (s = !1), a.getSelection ? h = a.getSelection() + "" : b.getSelection ? h = b.getSelection() + "" : b.selection && (h = b.selection.createRange().text || ""), d += "&buster=" + (new Date).getTime(), s || (b.title && (d += "&t=" + o(b.title.substr(0, 256))), h && (d += "&s=" + o(h.substr(0, 512)))), f = a.outerWidth || b.documentElement.clientWidth || 600, g = a.outerHeight || b.documentElement.clientHeight || 700, f = f < 800 || f > 5e3 ? 600 : .7 * f, g = g < 800 || g > 3e3 ? 700 : .9 * g, !s) return void a.open(d, r, "location,resizable,scrollbars,width=" + f + ",height=" + g);
        i = q.getElementsByTagName("meta") || [];
        for (var t = 0; t < i.length && !(t > 200); t++) {
            var u = i[t], v = u.getAttribute("name"), w = u.getAttribute("property"), x = u.getAttribute("content");
            x && (v ? e("_meta[" + v + "]", x) : w && e("_meta[" + w + "]", x))
        }
        j = q.getElementsByTagName("link") || [];
        for (var y = 0; y < j.length && !(y >= 50); y++) {
            var z = j[y], A = z.getAttribute("rel");
            "canonical" !== A && "icon" !== A && "shortlink" !== A || e("_links[" + A + "]", z.getAttribute("href"))
        }
        b.body.getElementsByClassName && (k = b.body.getElementsByClassName("hfeed")[0]), k = b.getElementById("content") || k || b.body, l = k.getElementsByTagName("img") || [];
        for (var B = 0; B < l.length && !(B >= 100); B++) n = l[B], n.src.indexOf("avatar") > -1 || n.className.indexOf("avatar") > -1 || n.width && n.width < 256 || n.height && n.height < 128 || e("_images[]", n.src);
        m = b.body.getElementsByTagName("iframe") || [];
        for (var C = 0; C < m.length && !(C >= 50); C++) e("_embeds[]", m[C].src);

        b.title && e("t", b.title),
        h && e("s", h),
            p.setAttribute("method", "POST"),
            p.setAttribute("action", d), p.setAttribute("target", r),
            p.setAttribute("style", "display: none;"),
            a.open("about:blank", r, "location,resizable,scrollbars,width=" + f + ",height=" + g),
            b.body.appendChild(p), 
            p.submit()
    }
})(window, document, top.location.href, "http:\/\/tiaodan123.com\/wp-admin\/press-this.php?v=8");