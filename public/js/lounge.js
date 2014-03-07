! function (a) {
    function b() {}

    function c(a, b) {
        return 0 == P.call(a).indexOf("[object " + b)
    }

    function d(a, b) {
        var c;
        return a.path = h(a.path || a.location || ""), b && (c = a.main || "./main", e(c) || (c = "./" + c), a.main = i(c, a.name + "/")), a.config = a.config, a
    }

    function e(a) {
        return "." == a.charAt(0)
    }

    function f(a) {
        return U.test(a)
    }

    function g(a, b) {
        return h(a) + "/" + b
    }

    function h(a) {
        return a && "/" == a.charAt(a.length - 1) ? a.substr(0, a.length - 1) : a
    }

    function i(a, b) {
        var c, d, f, g, h;
        return c = 1, d = a, e(d) && (g = !0, d = d.replace(V, function (a, b, d, e) {
            return d && c++, e || ""
        })), g ? (f = b.split("/"), h = f.length - c, 0 > h ? a : (f.splice(h, c), f.concat(d || []).join("/"))) : d
    }

    function j(a) {
        var b = a.indexOf("!");
        return {
            resourceId: a.substr(b + 1),
            pluginId: b >= 0 && a.substr(0, b)
        }
    }

    function k() {}

    function l(a, b) {
        k.prototype = a || O;
        var c = new k;
        k.prototype = O;
        for (var d in b) c[d] = b[d];
        return c
    }

    function m() {
        function a(a, b, c) {
            e.push([a, b, c])
        }

        function c(a, b) {
            for (var c, d, f = 0; c = e[f++];) d = c[a], d && d(b)
        }
        var d, e, f;
        d = this, e = [], f = function (d, g) {
            a = d ? function (a) {
                a && a(g)
            } : function (a, b) {
                b && b(g)
            }, f = b, c(d ? 0 : 1, g), c = b, e = z
        }, this.then = function (b, c, e) {
            return a(b, c, e), d
        }, this.resolve = function (a) {
            d.resolved = a, f(!0, a)
        }, this.reject = function (a) {
            d.rejected = a, f(!1, a)
        }, this.progress = function (a) {
            c(2, a)
        }
    }

    function n(a) {
        return a instanceof m || a instanceof s
    }

    function o(a, b, c, d) {
        return n(a) ? a.then(b, c, d) : b(a)
    }

    function p(a, b, c) {
        var d;
        return function () {
            return --a >= 0 && b && (d = b.apply(z, arguments)), 0 == a && c && c(d), d
        }
    }

    function q() {
        var a, b, d;
        return v = "", a = [].slice.call(arguments), c(a[0], "Object") && (d = a.shift(), b = r(d)), new s(a[0], a[1], a[2], b)
    }

    function r(a, b, c) {
        var d, e;
        return v = "", a && (C.setApi(a), w = C.config(a), "preloads" in a && (d = new s(a.preloads, z, c, S, !0), C.nextTurn(function () {
            S = d
        })), e = a.main) ? new s(e, b, c) : void 0
    }

    function s(a, b, c, d, e) {
        var f, g;
        g = C.createContext(w, z, [].concat(a), e), this.then = this.then = f = function (a, b) {
            return o(g, function (b) {
                a && a.apply(z, b)
            }, function (a) {
                if (!b) throw a;
                b(a)
            }), this
        }, this.next = function (a, b, c) {
            return new s(a, b, c, g)
        }, this.config = r, (b || c) && f(b, c), C.nextTurn(function () {
            o(e || S, function () {
                o(d, function () {
                    C.getDeps(g)
                }, c)
            })
        })
    }

    function t(a) {
        var b, c, d;
        if (b = a.id, b == z && (A !== z ? A = {
            ex: "Multiple anonymous defines encountered"
        } : (b = C.getCurrentDefName()) || (A = a)), b != z) {
            if (c = Q[b], b in Q || (d = C.resolvePathInfo(b, w), c = C.createResourceDef(d.config, b), Q[b] = c), !n(c)) throw new Error("duplicate define: " + b);
            c.useNet = !1, C.defineResource(c, a)
        }
    }

    function u() {
        var a = C.fixArgs(arguments);
        t(a)
    }
    var v, w, x, y, z, A, B, C, D = "0.8.4",
        E = "curl",
        F = "define",
        G = "data-curl-run",
        H = a.document,
        I = H && (H.head || H.getElementsByTagName("head")[0]),
        J = I && I.getElementsByTagName("base")[0] || null,
        K = {}, L = {}, M = {}, N = "addEventListener" in a ? {} : {
            loaded: 1,
            complete: 1
        }, O = {}, P = O.toString,
        Q = {}, R = {}, S = !1,
        T = /\?|\.js\b/,
        U = /^\/|^[^:]+:\/\//,
        V = /(\.)(\.?)(?:$|\/([^\.\/]+.*)?)/g,
        W = /\/\*[\s\S]*?\*\/|\/\/.*?[\n\r]/g,
        X = /require\s*\(\s*(["'])(.*?[^\\])\1\s*\)|[^\\]?(["'])/g,
        Y = /\s*,\s*/;
    C = {
        toAbsId: function (a, b, c) {
            var d, f, h;
            return d = i(a, b), e(d) ? d : (h = j(d), f = h.pluginId, d = f || h.resourceId, d in c.pathMap && (d = c.pathMap[d].main || d), f && (f.indexOf("/") < 0 && !(f in c.pathMap) && (d = g(c.pluginPath, f)), d = d + "!" + h.resourceId), d)
        },
        createContext: function (a, b, d, e) {
            function f(b, c) {
                var d, e, g;
                return d = C.toAbsId(b, i.id, a), c ? (e = j(d), e.pluginId ? (g = Q[e.pluginId], e.resourceId = "normalize" in g ? g.normalize(e.resourceId, f, i.config) || "" : f(e.resourceId), e.pluginId + "!" + e.resourceId) : d) : d
            }

            function g(b) {
                return C.resolvePathInfo(f(b, !0), a).url
            }

            function h(b, d, g) {
                var h, j, k, l;
                if (h = d && function () {
                    d.apply(z, arguments[0])
                }, c(b, "String")) {
                    if (h) throw new Error("require(id, callback) not allowed");
                    if (j = f(b, !0), k = Q[j], !(j in Q)) throw new Error("Module not resolved: " + j);
                    return l = n(k) && k.exports, l || k
                }
                o(C.getDeps(C.createContext(a, i.id, b, e)), h, g)
            }
            var i;
            return i = new m, i.id = b || "", i.isPreload = e, i.depNames = d, i.config = a, i.require = h, h.toUrl = g, i.toAbsId = f, i
        },
        createResourceDef: function (a, b, c) {
            var d, e, f;
            return d = C.createContext(a, b, z, c), e = d.resolve, f = p(1, function (a) {
                d.deps = a;
                try {
                    return C.executeDefFunc(d)
                } catch (b) {
                    d.reject(b)
                }
            }), d.resolve = function (a) {
                o(c || S, function () {
                    e(Q[d.id] = R[d.url] = f(a))
                })
            }, d.exportsReady = function (a) {
                o(c || S, function () {
                    d.exports && (f(a), d.progress(L))
                })
            }, d
        },
        createPluginDef: function (a, b, c, d) {
            var e;
            return e = C.createContext(a, c, z, d)
        },
        getCjsRequire: function (a) {
            return a.require
        },
        getCjsExports: function (a) {
            return a.exports || (a.exports = {})
        },
        getCjsModule: function (a) {
            var b = a.module;
            return b || (b = a.module = {
                id: a.id,
                uri: C.getDefUrl(a),
                exports: C.getCjsExports(a),
                config: function () {
                    return a.config
                }
            }, b.exports = b.exports), b
        },
        getDefUrl: function (a) {
            return a.url || (a.url = C.checkToAddJsExt(a.require.toUrl(a.id), a.config))
        },
        setApi: function (b) {
            var d, e, f, g, h, i;
            if (d = E, e = F, f = g = a, h = " already exists", b && (i = b.overwriteApi || b.overwriteApi, d = b.apiName || b.apiName || d, f = b.apiContext || b.apiContext || f, e = b.defineName || b.defineName || e, g = b.defineContext || b.defineContext || g, x && c(x, "Function") && (a[E] = x), x = null, y && c(y, "Function") && (a[F] = y), y = null, !i)) {
                if (f[d] && f[d] != q) throw new Error(d + h);
                if (g[e] && g[e] != u) throw new Error(e + h)
            }
            f[d] = q, g[e] = u
        },
        config: function (a) {
            function b(a, b) {
                var e, f, k, m, n, o;
                for (var p in a) k = a[p], c(k, "String") && (k = {
                    path: a[p]
                }), k.name = k.name || p, n = g, m = j(h(k.name)), e = m.resourceId, f = m.pluginId, f && (n = i[f], n || (n = i[f] = l(g), n.pathMap = l(g.pathMap), n.pathList = []), delete a[p]), o = d(k, b), o.config && (o.config = l(g, o.config)), o.specificity = e.split("/").length, e ? (n.pathMap[e] = o, n.pathList.push(e)) : n.baseUrl = C.resolveUrl(k.path, g)
            }

            function e(a) {
                var b = a.pathMap;
                a.pathRx = new RegExp("^(" + a.pathList.sort(function (a, c) {
                    return b[c].specificity - b[a].specificity
                }).join("|").replace(/\/|\./g, "\\$&") + ")(?=\\/|$)"), delete a.pathList
            }
            var f, g, i, k;
            "baseUrl" in a && (a.baseUrl = a.baseUrl), "main" in a && (a.main = a.main), "preloads" in a && (a.preloads = a.preloads), "pluginPath" in a && (a.pluginPath = a.pluginPath), ("dontAddFileExt" in a || a.dontAddFileExt) && (a.dontAddFileExt = new RegExp(a.dontAddFileExt || a.dontAddFileExt)), f = w, g = l(f, a), g.pathMap = l(f.pathMap), i = a.plugins || {}, g.plugins = l(f.plugins), g.paths = l(f.paths, a.paths), g.packages = l(f.packages, a.packages), g.pathList = [], b(a.packages, !0), b(a.paths, !1);
            for (k in i) {
                var m = C.toAbsId(k + "!", "", g);
                g.plugins[m.substr(0, m.length - 1)] = i[k]
            }
            i = g.plugins;
            for (k in i) {
                i[k] = l(g, i[k]);
                var n = i[k].pathList;
                n && (i[k].pathList = n.concat(g.pathList), e(i[k]))
            }
            for (k in f.pathMap) g.pathMap.hasOwnProperty(k) || g.pathList.push(k);
            return e(g), g
        },
        resolvePathInfo: function (a, b) {
            var c, d, e, g;
            return c = b.pathMap, e = f(a) ? a : a.replace(b.pathRx, function (a) {
                return d = c[a] || {}, g = d.config, d.path || ""
            }), {
                config: g || w,
                url: C.resolveUrl(e, b)
            }
        },
        resolveUrl: function (a, b) {
            var c = b.baseUrl;
            return c && !f(a) ? g(c, a) : a
        },
        checkToAddJsExt: function (a, b) {
            return a + ((b || w).dontAddFileExt.test(a) ? "" : ".js")
        },
        loadScript: function (b, c, d) {
            function e(d) {
                d = d || a.event, ("load" == d.type || N[g.readyState]) && (delete M[b.id], g.onload = g.onreadystatechange = g.onerror = "", c())
            }

            function f() {
                d(new Error("Syntax or http error: " + b.url))
            }
            var g = H.createElement("script");
            return g.onload = g.onreadystatechange = e, g.onerror = f, g.type = b.mimetype || "text/javascript", g.charset = "utf-8", g.async = !b.order, g.src = b.url, M[b.id] = g, I.insertBefore(g, J), g
        },
        extractCjsDeps: function (a) {
            var b, c, d = [];
            return b = "string" == typeof a ? a : a.toSource ? a.toSource() : a.toString(), b.replace(W, "").replace(X, function (a, b, e, f) {
                return f ? c = c == f ? z : c : c || d.push(e), ""
            }), d
        },
        fixArgs: function (a) {
            var b, d, e, f, g, h;
            return g = a.length, e = a[g - 1], f = c(e, "Function") ? e.length : -1, 2 == g ? c(a[0], "Array") ? d = a[0] : b = a[0] : 3 == g && (b = a[0], d = a[1]), !d && f > 0 && (h = !0, d = ["require", "exports", "module"].slice(0, f).concat(C.extractCjsDeps(e))), {
                id: b,
                deps: d || [],
                res: f >= 0 ? e : function () {
                    return e
                },
                cjs: h
            }
        },
        executeDefFunc: function (a) {
            var b, c;
            return c = a.cjs ? a.exports : z, b = a.res.apply(c, a.deps), b === z && a.exports && (b = a.module ? a.exports = a.module.exports : a.exports), b
        },
        defineResource: function (a, b) {
            a.res = b.res, a.cjs = b.cjs, a.depNames = b.deps, C.getDeps(a)
        },
        getDeps: function (a) {
            function b(a, b, c) {
                h[b] = a, c && k(a, b)
            }

            function c(b, c) {
                var d, e, f, g;
                d = p(1, function (a) {
                    e(a), l(a, c)
                }), e = p(1, function (a) {
                    k(a, c)
                }), f = C.fetchDep(b, a), g = n(f) && f.exports, g && e(g), o(f, d, a.reject, a.exports && function (a) {
                    f.exports && (a == K ? e(f.exports) : a == L && d(f.exports))
                })
            }

            function d() {
                a.resolve(h)
            }

            function e() {
                a.exportsReady && a.exportsReady(h)
            }
            var f, g, h, i, j, k, l;
            for (h = [], g = a.depNames, i = g.length, 0 == g.length && d(), k = p(i, b, e), l = p(i, b, d), f = 0; i > f; f++) j = g[f], j in B ? (l(B[j](a), f, !0), a.exports && a.progress(K)) : j ? c(j, f) : l(z, f, !0);
            return a
        },
        fetchResDef: function (a) {
            return C.getDefUrl(a), C.loadScript(a, function () {
                var b = A;
                A = z, a.useNet !== !1 && (!b || b.ex ? a.reject(new Error(b && b.ex || "define() missing or duplicated: " + a.url)) : C.defineResource(a, b))
            }, a.reject), a
        },
        fetchDep: function (a, b) {
            var c, d, e, f, g, h, i, k, l, n, p, q;
            return c = b.toAbsId, d = b.isPreload, e = b.config || w, g = c(a), g in Q ? h = g : (f = j(g), k = f.resourceId, h = f.pluginId || k, l = C.resolvePathInfo(h, e)), g in Q || (q = C.resolvePathInfo(k, e).config, f.pluginId ? i = h : (i = q.moduleLoader || q.moduleLoader || q.loader || q.loader, i && (k = h, h = i, l = C.resolvePathInfo(i, e)))), h in Q ? n = Q[h] : l.url in R ? n = Q[h] = R[l.url] : (n = C.createResourceDef(q, h, d), n.url = C.checkToAddJsExt(l.url, l.config), Q[h] = R[l.url] = n, C.fetchResDef(n)), h == i && (f.pluginId && e.plugins[f.pluginId] && (q = e.plugins[f.pluginId]), p = new m, o(n, function (a) {
                var b, e, f;
                if (f = a.dynamic, k = "normalize" in a ? a.normalize(k, c, n.config) || "" : c(k), e = i + "!" + k, b = Q[e], !(e in Q)) {
                    b = C.createPluginDef(q, e, k, d), f || (Q[e] = b);
                    var g = function (a) {
                        f || (Q[e] = a), b.resolve(a)
                    };
                    g.resolve = g, g.reject = g.error = b.reject, a.load(k, b.require, g, q)
                }
                p != b && o(b, p.resolve, p.reject, p.progress)
            }, p.reject)), p || n
        },
        getCurrentDefName: function () {
            var b;
            if (!c(a.opera, "Opera"))
                for (var d in M)
                    if ("interactive" == M[d].readyState) {
                        b = d;
                        break
                    }
            return b
        },
        findScript: function (a) {
            var b, c, d = 0;
            for (b = H && (H.scripts || H.getElementsByTagName("script")); b && (c = b[d++]);)
                if (a(c)) return c
        },
        extractDataAttrConfig: function () {
            var a, b = "";
            return a = C.findScript(function (a) {
                var c;
                return c = a.getAttribute(G), c && (b = c), c
            }), a && a.setAttribute(G, ""), b
        },
        bootScript: function () {
            function a() {
                C.loadScript({
                    url: d.shift()
                }, b, b)
            }

            function b() {
                v && (d.length ? (C.nextTurn(c), a()) : c("run.js script did not run."))
            }

            function c(a) {
                throw new Error(a || "Primary run.js failed. Trying fallback.")
            }
            var d = v.split(Y);
            d.length && a()
        },
        nextTurn: function (a) {
            setTimeout(a, 0)
        }
    }, B = {
        require: C.getCjsRequire,
        exports: C.getCjsExports,
        module: C.getCjsModule
    }, q.version = D, q.config = r, u.amd = {
        plugins: !0,
        jQuery: !0,
        curl: D
    }, w = {
        baseUrl: "",
        pluginPath: "curl/plugin",
        dontAddFileExt: T,
        paths: {},
        packages: {},
        plugins: {},
        pathMap: {},
        pathRx: /$^/
    }, x = a[E], y = a[F], x && c(x, "Object") ? (a[E] = z, r(x)) : C.setApi(), v = C.extractDataAttrConfig(), v && C.nextTurn(C.bootScript), Q[E] = q, Q["curl/_privileged"] = {
        core: C,
        cache: Q,
        config: function () {
            return w
        },
        _define: t,
        _curl: q,
        Promise: m
    }
}(this.window || "undefined" != typeof global && global || this),
function (a) {
    "use strict";

    function b(a, b) {
        G[a] = G[a] || b
    }

    function c() {
        var a;
        return a = z[x]("link"), a.rel = "stylesheet", a.type = "text/css", a
    }

    function d(a, c) {
        a.onload = function () {
            b("load", !0), c()
        }
    }

    function e(a, c) {
        a.onerror = function () {
            b("error", !0), c()
        }
    }

    function f(a, b, c) {
        var d;
        D.push({
            url: a,
            cb: b,
            eb: function () {
                c(new Error(F))
            }
        }), d = i(), d && g(d)
    }

    function g(a) {
        var b, c;
        b = D.shift(), c = a.styleSheet, b ? (a.onload = function () {
            b.cb(b.ss), g(a)
        }, a.onerror = function () {
            b.eb(), g(a)
        }, b.ss = c.imports[c.addImport(b.url)]) : (k(a), h(a))
    }

    function h(a) {
        C.push(a)
    }

    function i() {
        var a;
        return a = C.shift(), !a && B.length < E && (a = z.createElement("style"), B.push(a), v.appendChild(a)), a
    }

    function j(a) {
        var b, c, d;
        if (!a.href || !s()) return !1;
        b = !1;
        try {
            c = a.sheet, c && (d = c.cssRules, b = null === d, !b && d && (c.insertRule("-curl-css-test {}", 0), c.deleteRule(0), b = !0))
        } catch (e) {
            b = "[object Opera]" != Object.prototype.toString.call(window.opera) && /security|denied/i.test(e.message)
        }
        return b
    }

    function k(a) {
        a.onload = a.onerror = u
    }

    function l(a) {
        return a.onload == u || !a.onload
    }

    function m(a, b, c) {
        G.load || (j(a) ? c(a.sheet) : l(a) || y(function () {
            m(a, b, c)
        }, b))
    }

    function n() {
        G.error
    }

    function o(a, b, c) {
        function e() {
            l(a) || (k(a), r(function () {
                c(a.sheet)
            }))
        }
        d(a, e), m(a, b, e)
    }

    function p(a, b, c) {
        function d() {
            l(a) || (k(a), c(new Error(F)))
        }
        e(a, d), n(a, b, d)
    }

    function q(a, b, d, e) {
        var f;
        f = c(), o(f, e, b), p(f, e, d), f.href = a, v.appendChild(f)
    }

    function r(a) {
        function b() {
            s() ? a() : y(b, 10)
        }
        b()
    }

    function s() {
        return !z.readyState || "complete" == z.readyState
    }

    function t(a, b) {
        return a.lastIndexOf(".") <= a.lastIndexOf("/") ? a + "." + b : a
    }

    function u() {}
    var v, w, x = "createElement",
        y = a.setTimeout,
        z = a.document,
        A = z && z.createStyleSheet && !(z.documentMode >= 10),
        B = [],
        C = [],
        D = [],
        E = 12,
        F = "HTTP or network error.",
        G = {};
    z && (v = z.head || z.getElementsByTagName("head")[0], w = A ? f : q), define("curl/plugin/css", {
        normalize: function (a, b) {
            var c, d;
            if (!a) return a;
            c = a.split(","), d = [];
            for (var e = 0, f = c.length; f > e; e++) d.push(b(c[e]));
            return d.join(",")
        },
        load: function (a, b, d, e) {
            function f(a) {
                i.length > 1 && h.push(a), 0 == --l && d(1 == i.length ? a : h)
            }

            function g(a) {
                var b;
                b = d.reject || function (a) {
                    throw a
                }, b(a)
            }
            var h, i, j, k, l, m;
            for (h = [], i = (a || "").split(","), j = e.cssWatchPeriod || 50, k = e.cssNoWait, l = i.length, m = 0; m < i.length; m++) {
                a = i[m];
                var n, o;
                n = t(b.toUrl(a), "css"), k ? (o = c(), o.href = n, v.appendChild(o), f(o.sheet || o.styleSheet)) : w(n, f, g, j)
            }
        },
        cramPlugin: "../cram/css"
    })
}(this),
function (a, b, c) {
    define("curl/plugin/js", ["curl/_privileged"], function (a) {
        "use strict";

        function d(a, b) {
            return a.lastIndexOf(".") <= a.lastIndexOf("/") ? a + "." + b : a
        }

        function e(b, d, e) {
            function f() {
                j = !0, b.exports && (b.resolved = c(b.exports)), !b.exports || b.resolved ? d(k) : e()
            }

            function g(a) {
                j = !0, e(a)
            }

            function h() {
                j || (i < new Date ? e() : setTimeout(h, 10))
            }
            var i, j, k;
            i = (new Date).valueOf() + (b.timeoutMsec || 3e5), e && b.exports && setTimeout(h, 10), k = a.core.loadScript(b, f, g)
        }

        function f(a, b) {
            e(a, function () {
                var c = j.shift();
                h = j.length > 0, c && f.apply(null, c), b.resolve(a.resolved || !0)
            }, function (a) {
                b.reject(a)
            })
        }
        var g, h, i = {}, j = [],
            k = b && 1 == b.createElement("script").async,
            l = /\?|\.js\b/;
        return g = a.Promise, {
            dynamic: !0,
            normalize: function (a, b) {
                var c = a.indexOf("!");
                return c >= 0 ? b(a.substr(0, c)) + a.substr(c) : b(a)
            },
            load: function (a, b, c, m) {
                function n(a) {
                    (c.error || function (a) {
                        throw a
                    })(a)
                }
                var o, p, q, r, s, t, u, v;
                o = a.indexOf("!order") > 0, p = a.indexOf("!exports="), q = p > 0 ? a.substr(p + 9) : m.exports, r = "prefetch" in m ? m.prefetch : !0, a = o || p > 0 ? a.substr(0, a.indexOf("!")) : a, s = m.dontAddFileExt || m.dontAddFileExt, s = s ? new RegExp(s) : l, t = b.toUrl(a), s.test(t) || (t = d(t, "js")), t in i ? i[t] instanceof g ? i[t].then(c, n) : c(i[t]) : (u = {
                    name: a,
                    url: t,
                    order: o,
                    exports: q,
                    timeoutMsec: m.timeout
                }, i[t] = v = new g, v.then(function (a) {
                    i[t] = a, c(a)
                }, n), o && !k && h ? (j.push([u, v]), r && (u.mimetype = "text/cache", e(u, function (a) {
                    a && a.parentNode.removeChild(a)
                }, function () {}), u.mimetype = "")) : (h = h || o, f(u, v)))
            },
            cramPlugin: "../cram/js"
        }
    })
}(this, this.document, function () {
    try {
        return eval(arguments[0])
    } catch (ex) {
        return
    }
});
var DISQUS = window.DISQUS || {};
DISQUS.initializer = function (a) {
    "use strict";
    var b = function (a) {
        for (var b = {}, c = a.substr(1).split("&"), d = c.length - 1; d >= 0; d--) {
            var e = c[d].split("=");
            b[e[0]] = decodeURIComponent((e[1] || "").replace(/\+/g, "%20"))
        }
        return b
    }(location.search),
        c = function (c) {
            var d = a.document;
            return b.n_s ? (d.documentElement.className += " not-supported type-" + b.n_s, void 0) : (a.onload = function () {
                var e = d.documentElement.lang,
                    f = DISQUS._baseUrls = DISQUS.initializer.getEmbeddedData("urls");
                curl({
                    baseUrl: f.next
                }), a.define = null;
                var g = [];
                b.f ? g.push("js!" + f.root + "/next/config.js?forum=" + b.f + "!order") : g.push("js!" + f.root + "/next/config.js!order"), g.push("js!" + "//a.disquscdn.com/next/common.0f2a2d8da21ed2662a00708702d14d4c.js" + "!order", "js!" + "//a.disquscdn.com/next/lounge.ad57ea94d9dbc93176c0b6e853ab8d3e.js" + "!order"), g.push("css!" + ("rtl" !== d.documentElement.dir ? "//a.disquscdn.com/next/styles/lounge.cb295c19e31136b8a4d307a00f2a1d35.css" : "//a.disquscdn.com/next/styles/lounge_rtl.7bbde621ca636a9e5924e353c5160091.css"));
                var h = curl(g);
                e && "en" !== e && (h = h.next(["js!lang/" + e + ".js!order"]));
                var i = function () {
                    var b = !0;
                    return a.$ && a.DISQUS && DISQUS.Bus ? ($("#postCompatContainer").remove(), $("#notSupported").remove(), d.body.style.display = "", c && (b = c()), b && DISQUS.Bus.sendHostMessage("ready"), void 0) : ((a.opener || a.parent).postMessage(JSON.stringify({
                        scope: "host",
                        name: "fail",
                        data: "loading_assets",
                        sender: location.hash.slice(1).replace(/(^\d+).*/, "$1")
                    }), "*"), void 0)
                };
                h.then(i, function (a) {
                    DISQUS.log && DISQUS.log(a.toString()), i()
                })
            }, void 0)
        };
    return {
        params: b,
        getEmbeddedData: function (a) {
            var b = document.getElementById("disqus-" + a);
            return b && JSON.parse(b.textContent || b.innerHTML)
        },
        init: c
    }
}(window), DISQUS.initializer.init(function () {
    "use strict";
    var a = DISQUS.initializer.getEmbeddedData,
        b = a("threadData");
    if (b.code) return $("#error").show(), DISQUS.Bus.sendHostMessage("fail", b), !1;
    $.extend(b.response, a("forumData"));
    var c = new DISQUS.next.lounge.views.Lounge({
        jsonData: b,
        el: document.body
    });
    return DISQUS.next.lounge.tracking.init(c), !0
});