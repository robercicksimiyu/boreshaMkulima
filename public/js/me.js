! function (window, undefined) {
    function isArraylike(obj) {
        var length = obj.length,
            type = jQuery.type(obj);
        return jQuery.isWindow(obj) ? !1 : 1 === obj.nodeType && length ? !0 : "array" === type || "function" !== type && (0 === length || "number" == typeof length && length > 0 && length - 1 in obj)
    }

    function createOptions(options) {
        var object = optionsCache[options] = {};
        return jQuery.each(options.match(core_rnotwhite) || [], function (_, flag) {
            object[flag] = !0
        }), object
    }

    function internalData(elem, name, data, pvt) {
        if (jQuery.acceptData(elem)) {
            var ret, thisCache, internalKey = jQuery.expando,
                isNode = elem.nodeType,
                cache = isNode ? jQuery.cache : elem,
                id = isNode ? elem[internalKey] : elem[internalKey] && internalKey;
            if (id && cache[id] && (pvt || cache[id].data) || data !== undefined || "string" != typeof name) return id || (id = isNode ? elem[internalKey] = core_deletedIds.pop() || jQuery.guid++ : internalKey), cache[id] || (cache[id] = isNode ? {} : {
                toJSON: jQuery.noop
            }), ("object" == typeof name || "function" == typeof name) && (pvt ? cache[id] = jQuery.extend(cache[id], name) : cache[id].data = jQuery.extend(cache[id].data, name)), thisCache = cache[id], pvt || (thisCache.data || (thisCache.data = {}), thisCache = thisCache.data), data !== undefined && (thisCache[jQuery.camelCase(name)] = data), "string" == typeof name ? (ret = thisCache[name], null == ret && (ret = thisCache[jQuery.camelCase(name)])) : ret = thisCache, ret
        }
    }

    function internalRemoveData(elem, name, pvt) {
        if (jQuery.acceptData(elem)) {
            var thisCache, i, isNode = elem.nodeType,
                cache = isNode ? jQuery.cache : elem,
                id = isNode ? elem[jQuery.expando] : jQuery.expando;
            if (cache[id]) {
                if (name && (thisCache = pvt ? cache[id] : cache[id].data)) {
                    jQuery.isArray(name) ? name = name.concat(jQuery.map(name, jQuery.camelCase)) : name in thisCache ? name = [name] : (name = jQuery.camelCase(name), name = name in thisCache ? [name] : name.split(" ")), i = name.length;
                    for (; i--;) delete thisCache[name[i]];
                    if (pvt ? !isEmptyDataObject(thisCache) : !jQuery.isEmptyObject(thisCache)) return
                }(pvt || (delete cache[id].data, isEmptyDataObject(cache[id]))) && (isNode ? jQuery.cleanData([elem], !0) : jQuery.support.deleteExpando || cache != cache.window ? delete cache[id] : cache[id] = null)
            }
        }
    }

    function dataAttr(elem, key, data) {
        if (data === undefined && 1 === elem.nodeType) {
            var name = "data-" + key.replace(rmultiDash, "-$1").toLowerCase();
            if (data = elem.getAttribute(name), "string" == typeof data) {
                try {
                    data = "true" === data ? !0 : "false" === data ? !1 : "null" === data ? null : +data + "" === data ? +data : rbrace.test(data) ? jQuery.parseJSON(data) : data
                } catch (e) {}
                jQuery.data(elem, key, data)
            } else data = undefined
        }
        return data
    }

    function isEmptyDataObject(obj) {
        var name;
        for (name in obj)
            if (("data" !== name || !jQuery.isEmptyObject(obj[name])) && "toJSON" !== name) return !1;
        return !0
    }

    function returnTrue() {
        return !0
    }

    function returnFalse() {
        return !1
    }

    function safeActiveElement() {
        try {
            return document.activeElement
        } catch (err) {}
    }

    function sibling(cur, dir) {
        do cur = cur[dir]; while (cur && 1 !== cur.nodeType);
        return cur
    }

    function winnow(elements, qualifier, not) {
        if (jQuery.isFunction(qualifier)) return jQuery.grep(elements, function (elem, i) {
            return !!qualifier.call(elem, i, elem) !== not
        });
        if (qualifier.nodeType) return jQuery.grep(elements, function (elem) {
            return elem === qualifier !== not
        });
        if ("string" == typeof qualifier) {
            if (isSimple.test(qualifier)) return jQuery.filter(qualifier, elements, not);
            qualifier = jQuery.filter(qualifier, elements)
        }
        return jQuery.grep(elements, function (elem) {
            return jQuery.inArray(elem, qualifier) >= 0 !== not
        })
    }

    function createSafeFragment(document) {
        var list = nodeNames.split("|"),
            safeFrag = document.createDocumentFragment();
        if (safeFrag.createElement)
            for (; list.length;) safeFrag.createElement(list.pop());
        return safeFrag
    }

    function manipulationTarget(elem, content) {
        return jQuery.nodeName(elem, "table") && jQuery.nodeName(1 === content.nodeType ? content : content.firstChild, "tr") ? elem.getElementsByTagName("tbody")[0] || elem.appendChild(elem.ownerDocument.createElement("tbody")) : elem
    }

    function disableScript(elem) {
        return elem.type = (null !== jQuery.find.attr(elem, "type")) + "/" + elem.type, elem
    }

    function restoreScript(elem) {
        var match = rscriptTypeMasked.exec(elem.type);
        return match ? elem.type = match[1] : elem.removeAttribute("type"), elem
    }

    function setGlobalEval(elems, refElements) {
        for (var elem, i = 0; null != (elem = elems[i]); i++) jQuery._data(elem, "globalEval", !refElements || jQuery._data(refElements[i], "globalEval"))
    }

    function cloneCopyEvent(src, dest) {
        if (1 === dest.nodeType && jQuery.hasData(src)) {
            var type, i, l, oldData = jQuery._data(src),
                curData = jQuery._data(dest, oldData),
                events = oldData.events;
            if (events) {
                delete curData.handle, curData.events = {};
                for (type in events)
                    for (i = 0, l = events[type].length; l > i; i++) jQuery.event.add(dest, type, events[type][i])
            }
            curData.data && (curData.data = jQuery.extend({}, curData.data))
        }
    }

    function fixCloneNodeIssues(src, dest) {
        var nodeName, e, data;
        if (1 === dest.nodeType) {
            if (nodeName = dest.nodeName.toLowerCase(), !jQuery.support.noCloneEvent && dest[jQuery.expando]) {
                data = jQuery._data(dest);
                for (e in data.events) jQuery.removeEvent(dest, e, data.handle);
                dest.removeAttribute(jQuery.expando)
            }
            "script" === nodeName && dest.text !== src.text ? (disableScript(dest).text = src.text, restoreScript(dest)) : "object" === nodeName ? (dest.parentNode && (dest.outerHTML = src.outerHTML), jQuery.support.html5Clone && src.innerHTML && !jQuery.trim(dest.innerHTML) && (dest.innerHTML = src.innerHTML)) : "input" === nodeName && manipulation_rcheckableType.test(src.type) ? (dest.defaultChecked = dest.checked = src.checked, dest.value !== src.value && (dest.value = src.value)) : "option" === nodeName ? dest.defaultSelected = dest.selected = src.defaultSelected : ("input" === nodeName || "textarea" === nodeName) && (dest.defaultValue = src.defaultValue)
        }
    }

    function getAll(context, tag) {
        var elems, elem, i = 0,
            found = typeof context.getElementsByTagName !== core_strundefined ? context.getElementsByTagName(tag || "*") : typeof context.querySelectorAll !== core_strundefined ? context.querySelectorAll(tag || "*") : undefined;
        if (!found)
            for (found = [], elems = context.childNodes || context; null != (elem = elems[i]); i++)!tag || jQuery.nodeName(elem, tag) ? found.push(elem) : jQuery.merge(found, getAll(elem, tag));
        return tag === undefined || tag && jQuery.nodeName(context, tag) ? jQuery.merge([context], found) : found
    }

    function fixDefaultChecked(elem) {
        manipulation_rcheckableType.test(elem.type) && (elem.defaultChecked = elem.checked)
    }

    function vendorPropName(style, name) {
        if (name in style) return name;
        for (var capName = name.charAt(0).toUpperCase() + name.slice(1), origName = name, i = cssPrefixes.length; i--;)
            if (name = cssPrefixes[i] + capName, name in style) return name;
        return origName
    }

    function isHidden(elem, el) {
        return elem = el || elem, "none" === jQuery.css(elem, "display") || !jQuery.contains(elem.ownerDocument, elem)
    }

    function showHide(elements, show) {
        for (var display, elem, hidden, values = [], index = 0, length = elements.length; length > index; index++) elem = elements[index], elem.style && (values[index] = jQuery._data(elem, "olddisplay"), display = elem.style.display, show ? (values[index] || "none" !== display || (elem.style.display = ""), "" === elem.style.display && isHidden(elem) && (values[index] = jQuery._data(elem, "olddisplay", css_defaultDisplay(elem.nodeName)))) : values[index] || (hidden = isHidden(elem), (display && "none" !== display || !hidden) && jQuery._data(elem, "olddisplay", hidden ? display : jQuery.css(elem, "display"))));
        for (index = 0; length > index; index++) elem = elements[index], elem.style && (show && "none" !== elem.style.display && "" !== elem.style.display || (elem.style.display = show ? values[index] || "" : "none"));
        return elements
    }

    function setPositiveNumber(elem, value, subtract) {
        var matches = rnumsplit.exec(value);
        return matches ? Math.max(0, matches[1] - (subtract || 0)) + (matches[2] || "px") : value
    }

    function augmentWidthOrHeight(elem, name, extra, isBorderBox, styles) {
        for (var i = extra === (isBorderBox ? "border" : "content") ? 4 : "width" === name ? 1 : 0, val = 0; 4 > i; i += 2) "margin" === extra && (val += jQuery.css(elem, extra + cssExpand[i], !0, styles)), isBorderBox ? ("content" === extra && (val -= jQuery.css(elem, "padding" + cssExpand[i], !0, styles)), "margin" !== extra && (val -= jQuery.css(elem, "border" + cssExpand[i] + "Width", !0, styles))) : (val += jQuery.css(elem, "padding" + cssExpand[i], !0, styles), "padding" !== extra && (val += jQuery.css(elem, "border" + cssExpand[i] + "Width", !0, styles)));
        return val
    }

    function getWidthOrHeight(elem, name, extra) {
        var valueIsBorderBox = !0,
            val = "width" === name ? elem.offsetWidth : elem.offsetHeight,
            styles = getStyles(elem),
            isBorderBox = jQuery.support.boxSizing && "border-box" === jQuery.css(elem, "boxSizing", !1, styles);
        if (0 >= val || null == val) {
            if (val = curCSS(elem, name, styles), (0 > val || null == val) && (val = elem.style[name]), rnumnonpx.test(val)) return val;
            valueIsBorderBox = isBorderBox && (jQuery.support.boxSizingReliable || val === elem.style[name]), val = parseFloat(val) || 0
        }
        return val + augmentWidthOrHeight(elem, name, extra || (isBorderBox ? "border" : "content"), valueIsBorderBox, styles) + "px"
    }

    function css_defaultDisplay(nodeName) {
        var doc = document,
            display = elemdisplay[nodeName];
        return display || (display = actualDisplay(nodeName, doc), "none" !== display && display || (iframe = (iframe || jQuery("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(doc.documentElement), doc = (iframe[0].contentWindow || iframe[0].contentDocument).document, doc.write("<!doctype html><html><body>"), doc.close(), display = actualDisplay(nodeName, doc), iframe.detach()), elemdisplay[nodeName] = display), display
    }

    function actualDisplay(name, doc) {
        var elem = jQuery(doc.createElement(name)).appendTo(doc.body),
            display = jQuery.css(elem[0], "display");
        return elem.remove(), display
    }

    function buildParams(prefix, obj, traditional, add) {
        var name;
        if (jQuery.isArray(obj)) jQuery.each(obj, function (i, v) {
            traditional || rbracket.test(prefix) ? add(prefix, v) : buildParams(prefix + "[" + ("object" == typeof v ? i : "") + "]", v, traditional, add)
        });
        else if (traditional || "object" !== jQuery.type(obj)) add(prefix, obj);
        else
            for (name in obj) buildParams(prefix + "[" + name + "]", obj[name], traditional, add)
    }

    function addToPrefiltersOrTransports(structure) {
        return function (dataTypeExpression, func) {
            "string" != typeof dataTypeExpression && (func = dataTypeExpression, dataTypeExpression = "*");
            var dataType, i = 0,
                dataTypes = dataTypeExpression.toLowerCase().match(core_rnotwhite) || [];
            if (jQuery.isFunction(func))
                for (; dataType = dataTypes[i++];) "+" === dataType[0] ? (dataType = dataType.slice(1) || "*", (structure[dataType] = structure[dataType] || []).unshift(func)) : (structure[dataType] = structure[dataType] || []).push(func)
        }
    }

    function inspectPrefiltersOrTransports(structure, options, originalOptions, jqXHR) {
        function inspect(dataType) {
            var selected;
            return inspected[dataType] = !0, jQuery.each(structure[dataType] || [], function (_, prefilterOrFactory) {
                var dataTypeOrTransport = prefilterOrFactory(options, originalOptions, jqXHR);
                return "string" != typeof dataTypeOrTransport || seekingTransport || inspected[dataTypeOrTransport] ? seekingTransport ? !(selected = dataTypeOrTransport) : void 0 : (options.dataTypes.unshift(dataTypeOrTransport), inspect(dataTypeOrTransport), !1)
            }), selected
        }
        var inspected = {}, seekingTransport = structure === transports;
        return inspect(options.dataTypes[0]) || !inspected["*"] && inspect("*")
    }

    function ajaxExtend(target, src) {
        var deep, key, flatOptions = jQuery.ajaxSettings.flatOptions || {};
        for (key in src) src[key] !== undefined && ((flatOptions[key] ? target : deep || (deep = {}))[key] = src[key]);
        return deep && jQuery.extend(!0, target, deep), target
    }

    function ajaxHandleResponses(s, jqXHR, responses) {
        for (var firstDataType, ct, finalDataType, type, contents = s.contents, dataTypes = s.dataTypes;
            "*" === dataTypes[0];) dataTypes.shift(), ct === undefined && (ct = s.mimeType || jqXHR.getResponseHeader("Content-Type"));
        if (ct)
            for (type in contents)
                if (contents[type] && contents[type].test(ct)) {
                    dataTypes.unshift(type);
                    break
                }
        if (dataTypes[0] in responses) finalDataType = dataTypes[0];
        else {
            for (type in responses) {
                if (!dataTypes[0] || s.converters[type + " " + dataTypes[0]]) {
                    finalDataType = type;
                    break
                }
                firstDataType || (firstDataType = type)
            }
            finalDataType = finalDataType || firstDataType
        }
        return finalDataType ? (finalDataType !== dataTypes[0] && dataTypes.unshift(finalDataType), responses[finalDataType]) : void 0
    }

    function ajaxConvert(s, response, jqXHR, isSuccess) {
        var conv2, current, conv, tmp, prev, converters = {}, dataTypes = s.dataTypes.slice();
        if (dataTypes[1])
            for (conv in s.converters) converters[conv.toLowerCase()] = s.converters[conv];
        for (current = dataTypes.shift(); current;)
            if (s.responseFields[current] && (jqXHR[s.responseFields[current]] = response), !prev && isSuccess && s.dataFilter && (response = s.dataFilter(response, s.dataType)), prev = current, current = dataTypes.shift())
                if ("*" === current) current = prev;
                else if ("*" !== prev && prev !== current) {
            if (conv = converters[prev + " " + current] || converters["* " + current], !conv)
                for (conv2 in converters)
                    if (tmp = conv2.split(" "), tmp[1] === current && (conv = converters[prev + " " + tmp[0]] || converters["* " + tmp[0]])) {
                        conv === !0 ? conv = converters[conv2] : converters[conv2] !== !0 && (current = tmp[0], dataTypes.unshift(tmp[1]));
                        break
                    }
            if (conv !== !0)
                if (conv && s["throws"]) response = conv(response);
                else try {
                    response = conv(response)
                } catch (e) {
                    return {
                        state: "parsererror",
                        error: conv ? e : "No conversion from " + prev + " to " + current
                    }
                }
        }
        return {
            state: "success",
            data: response
        }
    }

    function createStandardXHR() {
        try {
            return new window.XMLHttpRequest
        } catch (e) {}
    }

    function createActiveXHR() {
        try {
            return new window.ActiveXObject("Microsoft.XMLHTTP")
        } catch (e) {}
    }

    function createFxNow() {
        return setTimeout(function () {
            fxNow = undefined
        }), fxNow = jQuery.now()
    }

    function createTween(value, prop, animation) {
        for (var tween, collection = (tweeners[prop] || []).concat(tweeners["*"]), index = 0, length = collection.length; length > index; index++)
            if (tween = collection[index].call(animation, prop, value)) return tween
    }

    function Animation(elem, properties, options) {
        var result, stopped, index = 0,
            length = animationPrefilters.length,
            deferred = jQuery.Deferred().always(function () {
                delete tick.elem
            }),
            tick = function () {
                if (stopped) return !1;
                for (var currentTime = fxNow || createFxNow(), remaining = Math.max(0, animation.startTime + animation.duration - currentTime), temp = remaining / animation.duration || 0, percent = 1 - temp, index = 0, length = animation.tweens.length; length > index; index++) animation.tweens[index].run(percent);
                return deferred.notifyWith(elem, [animation, percent, remaining]), 1 > percent && length ? remaining : (deferred.resolveWith(elem, [animation]), !1)
            }, animation = deferred.promise({
                elem: elem,
                props: jQuery.extend({}, properties),
                opts: jQuery.extend(!0, {
                    specialEasing: {}
                }, options),
                originalProperties: properties,
                originalOptions: options,
                startTime: fxNow || createFxNow(),
                duration: options.duration,
                tweens: [],
                createTween: function (prop, end) {
                    var tween = jQuery.Tween(elem, animation.opts, prop, end, animation.opts.specialEasing[prop] || animation.opts.easing);
                    return animation.tweens.push(tween), tween
                },
                stop: function (gotoEnd) {
                    var index = 0,
                        length = gotoEnd ? animation.tweens.length : 0;
                    if (stopped) return this;
                    for (stopped = !0; length > index; index++) animation.tweens[index].run(1);
                    return gotoEnd ? deferred.resolveWith(elem, [animation, gotoEnd]) : deferred.rejectWith(elem, [animation, gotoEnd]), this
                }
            }),
            props = animation.props;
        for (propFilter(props, animation.opts.specialEasing); length > index; index++)
            if (result = animationPrefilters[index].call(animation, elem, props, animation.opts)) return result;
        return jQuery.map(props, createTween, animation), jQuery.isFunction(animation.opts.start) && animation.opts.start.call(elem, animation), jQuery.fx.timer(jQuery.extend(tick, {
            elem: elem,
            anim: animation,
            queue: animation.opts.queue
        })), animation.progress(animation.opts.progress).done(animation.opts.done, animation.opts.complete).fail(animation.opts.fail).always(animation.opts.always)
    }

    function propFilter(props, specialEasing) {
        var index, name, easing, value, hooks;
        for (index in props)
            if (name = jQuery.camelCase(index), easing = specialEasing[name], value = props[index], jQuery.isArray(value) && (easing = value[1], value = props[index] = value[0]), index !== name && (props[name] = value, delete props[index]), hooks = jQuery.cssHooks[name], hooks && "expand" in hooks) {
                value = hooks.expand(value), delete props[name];
                for (index in value) index in props || (props[index] = value[index], specialEasing[index] = easing)
            } else specialEasing[name] = easing
    }

    function defaultPrefilter(elem, props, opts) {
        var prop, value, toggle, tween, hooks, oldfire, anim = this,
            orig = {}, style = elem.style,
            hidden = elem.nodeType && isHidden(elem),
            dataShow = jQuery._data(elem, "fxshow");
        opts.queue || (hooks = jQuery._queueHooks(elem, "fx"), null == hooks.unqueued && (hooks.unqueued = 0, oldfire = hooks.empty.fire, hooks.empty.fire = function () {
            hooks.unqueued || oldfire()
        }), hooks.unqueued++, anim.always(function () {
            anim.always(function () {
                hooks.unqueued--, jQuery.queue(elem, "fx").length || hooks.empty.fire()
            })
        })), 1 === elem.nodeType && ("height" in props || "width" in props) && (opts.overflow = [style.overflow, style.overflowX, style.overflowY], "inline" === jQuery.css(elem, "display") && "none" === jQuery.css(elem, "float") && (jQuery.support.inlineBlockNeedsLayout && "inline" !== css_defaultDisplay(elem.nodeName) ? style.zoom = 1 : style.display = "inline-block")), opts.overflow && (style.overflow = "hidden", jQuery.support.shrinkWrapBlocks || anim.always(function () {
            style.overflow = opts.overflow[0], style.overflowX = opts.overflow[1], style.overflowY = opts.overflow[2]
        }));
        for (prop in props)
            if (value = props[prop], rfxtypes.exec(value)) {
                if (delete props[prop], toggle = toggle || "toggle" === value, value === (hidden ? "hide" : "show")) continue;
                orig[prop] = dataShow && dataShow[prop] || jQuery.style(elem, prop)
            }
        if (!jQuery.isEmptyObject(orig)) {
            dataShow ? "hidden" in dataShow && (hidden = dataShow.hidden) : dataShow = jQuery._data(elem, "fxshow", {}), toggle && (dataShow.hidden = !hidden), hidden ? jQuery(elem).show() : anim.done(function () {
                jQuery(elem).hide()
            }), anim.done(function () {
                var prop;
                jQuery._removeData(elem, "fxshow");
                for (prop in orig) jQuery.style(elem, prop, orig[prop])
            });
            for (prop in orig) tween = createTween(hidden ? dataShow[prop] : 0, prop, anim), prop in dataShow || (dataShow[prop] = tween.start, hidden && (tween.end = tween.start, tween.start = "width" === prop || "height" === prop ? 1 : 0))
        }
    }

    function Tween(elem, options, prop, end, easing) {
        return new Tween.prototype.init(elem, options, prop, end, easing)
    }

    function genFx(type, includeWidth) {
        var which, attrs = {
                height: type
            }, i = 0;
        for (includeWidth = includeWidth ? 1 : 0; 4 > i; i += 2 - includeWidth) which = cssExpand[i], attrs["margin" + which] = attrs["padding" + which] = type;
        return includeWidth && (attrs.opacity = attrs.width = type), attrs
    }

    function getWindow(elem) {
        return jQuery.isWindow(elem) ? elem : 9 === elem.nodeType ? elem.defaultView || elem.parentWindow : !1
    }
    var readyList, rootjQuery, core_strundefined = typeof undefined,
        location = window.location,
        document = window.document,
        docElem = document.documentElement,
        _jQuery = window.jQuery,
        _$ = window.$,
        class2type = {}, core_deletedIds = [],
        core_version = "1.10.1",
        core_concat = core_deletedIds.concat,
        core_push = core_deletedIds.push,
        core_slice = core_deletedIds.slice,
        core_indexOf = core_deletedIds.indexOf,
        core_toString = class2type.toString,
        core_hasOwn = class2type.hasOwnProperty,
        core_trim = core_version.trim,
        jQuery = function (selector, context) {
            return new jQuery.fn.init(selector, context, rootjQuery)
        }, core_pnum = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        core_rnotwhite = /\S+/g,
        rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        rquickExpr = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        rsingleTag = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        rvalidchars = /^[\],:{}\s]*$/,
        rvalidbraces = /(?:^|:|,)(?:\s*\[)+/g,
        rvalidescape = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
        rvalidtokens = /"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,
        rmsPrefix = /^-ms-/,
        rdashAlpha = /-([\da-z])/gi,
        fcamelCase = function (all, letter) {
            return letter.toUpperCase()
        }, completed = function (event) {
            (document.addEventListener || "load" === event.type || "complete" === document.readyState) && (detach(), jQuery.ready())
        }, detach = function () {
            document.addEventListener ? (document.removeEventListener("DOMContentLoaded", completed, !1), window.removeEventListener("load", completed, !1)) : (document.detachEvent("onreadystatechange", completed), window.detachEvent("onload", completed))
        };
    jQuery.fn = jQuery.prototype = {
        jquery: core_version,
        constructor: jQuery,
        init: function (selector, context, rootjQuery) {
            var match, elem;
            if (!selector) return this;
            if ("string" == typeof selector) {
                if (match = "<" === selector.charAt(0) && ">" === selector.charAt(selector.length - 1) && selector.length >= 3 ? [null, selector, null] : rquickExpr.exec(selector), !match || !match[1] && context) return !context || context.jquery ? (context || rootjQuery).find(selector) : this.constructor(context).find(selector);
                if (match[1]) {
                    if (context = context instanceof jQuery ? context[0] : context, jQuery.merge(this, jQuery.parseHTML(match[1], context && context.nodeType ? context.ownerDocument || context : document, !0)), rsingleTag.test(match[1]) && jQuery.isPlainObject(context))
                        for (match in context) jQuery.isFunction(this[match]) ? this[match](context[match]) : this.attr(match, context[match]);
                    return this
                }
                if (elem = document.getElementById(match[2]), elem && elem.parentNode) {
                    if (elem.id !== match[2]) return rootjQuery.find(selector);
                    this.length = 1, this[0] = elem
                }
                return this.context = document, this.selector = selector, this
            }
            return selector.nodeType ? (this.context = this[0] = selector, this.length = 1, this) : jQuery.isFunction(selector) ? rootjQuery.ready(selector) : (selector.selector !== undefined && (this.selector = selector.selector, this.context = selector.context), jQuery.makeArray(selector, this))
        },
        selector: "",
        length: 0,
        toArray: function () {
            return core_slice.call(this)
        },
        get: function (num) {
            return null == num ? this.toArray() : 0 > num ? this[this.length + num] : this[num]
        },
        pushStack: function (elems) {
            var ret = jQuery.merge(this.constructor(), elems);
            return ret.prevObject = this, ret.context = this.context, ret
        },
        each: function (callback, args) {
            return jQuery.each(this, callback, args)
        },
        ready: function (fn) {
            return jQuery.ready.promise().done(fn), this
        },
        slice: function () {
            return this.pushStack(core_slice.apply(this, arguments))
        },
        first: function () {
            return this.eq(0)
        },
        last: function () {
            return this.eq(-1)
        },
        eq: function (i) {
            var len = this.length,
                j = +i + (0 > i ? len : 0);
            return this.pushStack(j >= 0 && len > j ? [this[j]] : [])
        },
        map: function (callback) {
            return this.pushStack(jQuery.map(this, function (elem, i) {
                return callback.call(elem, i, elem)
            }))
        },
        end: function () {
            return this.prevObject || this.constructor(null)
        },
        push: core_push,
        sort: [].sort,
        splice: [].splice
    }, jQuery.fn.init.prototype = jQuery.fn, jQuery.extend = jQuery.fn.extend = function () {
        var src, copyIsArray, copy, name, options, clone, target = arguments[0] || {}, i = 1,
            length = arguments.length,
            deep = !1;
        for ("boolean" == typeof target && (deep = target, target = arguments[1] || {}, i = 2), "object" == typeof target || jQuery.isFunction(target) || (target = {}), length === i && (target = this, --i); length > i; i++)
            if (null != (options = arguments[i]))
                for (name in options) src = target[name], copy = options[name], target !== copy && (deep && copy && (jQuery.isPlainObject(copy) || (copyIsArray = jQuery.isArray(copy))) ? (copyIsArray ? (copyIsArray = !1, clone = src && jQuery.isArray(src) ? src : []) : clone = src && jQuery.isPlainObject(src) ? src : {}, target[name] = jQuery.extend(deep, clone, copy)) : copy !== undefined && (target[name] = copy));
        return target
    }, jQuery.extend({
        expando: "jQuery" + (core_version + Math.random()).replace(/\D/g, ""),
        noConflict: function (deep) {
            return window.$ === jQuery && (window.$ = _$), deep && window.jQuery === jQuery && (window.jQuery = _jQuery), jQuery
        },
        isReady: !1,
        readyWait: 1,
        holdReady: function (hold) {
            hold ? jQuery.readyWait++ : jQuery.ready(!0)
        },
        ready: function (wait) {
            if (wait === !0 ? !--jQuery.readyWait : !jQuery.isReady) {
                if (!document.body) return setTimeout(jQuery.ready);
                jQuery.isReady = !0, wait !== !0 && --jQuery.readyWait > 0 || (readyList.resolveWith(document, [jQuery]), jQuery.fn.trigger && jQuery(document).trigger("ready").off("ready"))
            }
        },
        isFunction: function (obj) {
            return "function" === jQuery.type(obj)
        },
        isArray: Array.isArray || function (obj) {
            return "array" === jQuery.type(obj)
        },
        isWindow: function (obj) {
            return null != obj && obj == obj.window
        },
        isNumeric: function (obj) {
            return !isNaN(parseFloat(obj)) && isFinite(obj)
        },
        type: function (obj) {
            return null == obj ? String(obj) : "object" == typeof obj || "function" == typeof obj ? class2type[core_toString.call(obj)] || "object" : typeof obj
        },
        isPlainObject: function (obj) {
            var key;
            if (!obj || "object" !== jQuery.type(obj) || obj.nodeType || jQuery.isWindow(obj)) return !1;
            try {
                if (obj.constructor && !core_hasOwn.call(obj, "constructor") && !core_hasOwn.call(obj.constructor.prototype, "isPrototypeOf")) return !1
            } catch (e) {
                return !1
            }
            if (jQuery.support.ownLast)
                for (key in obj) return core_hasOwn.call(obj, key);
            for (key in obj);
            return key === undefined || core_hasOwn.call(obj, key)
        },
        isEmptyObject: function (obj) {
            var name;
            for (name in obj) return !1;
            return !0
        },
        error: function (msg) {
            throw new Error(msg)
        },
        parseHTML: function (data, context, keepScripts) {
            if (!data || "string" != typeof data) return null;
            "boolean" == typeof context && (keepScripts = context, context = !1), context = context || document;
            var parsed = rsingleTag.exec(data),
                scripts = !keepScripts && [];
            return parsed ? [context.createElement(parsed[1])] : (parsed = jQuery.buildFragment([data], context, scripts), scripts && jQuery(scripts).remove(), jQuery.merge([], parsed.childNodes))
        },
        parseJSON: function (data) {
            return window.JSON && window.JSON.parse ? window.JSON.parse(data) : null === data ? data : "string" == typeof data && (data = jQuery.trim(data), data && rvalidchars.test(data.replace(rvalidescape, "@").replace(rvalidtokens, "]").replace(rvalidbraces, ""))) ? new Function("return " + data)() : void jQuery.error("Invalid JSON: " + data)
        },
        parseXML: function (data) {
            var xml, tmp;
            if (!data || "string" != typeof data) return null;
            try {
                window.DOMParser ? (tmp = new DOMParser, xml = tmp.parseFromString(data, "text/xml")) : (xml = new ActiveXObject("Microsoft.XMLDOM"), xml.async = "false", xml.loadXML(data))
            } catch (e) {
                xml = undefined
            }
            return xml && xml.documentElement && !xml.getElementsByTagName("parsererror").length || jQuery.error("Invalid XML: " + data), xml
        },
        noop: function () {},
        globalEval: function (data) {
            data && jQuery.trim(data) && (window.execScript || function (data) {
                window.eval.call(window, data)
            })(data)
        },
        camelCase: function (string) {
            return string.replace(rmsPrefix, "ms-").replace(rdashAlpha, fcamelCase)
        },
        nodeName: function (elem, name) {
            return elem.nodeName && elem.nodeName.toLowerCase() === name.toLowerCase()
        },
        each: function (obj, callback, args) {
            var value, i = 0,
                length = obj.length,
                isArray = isArraylike(obj);
            if (args) {
                if (isArray)
                    for (; length > i && (value = callback.apply(obj[i], args), value !== !1); i++);
                else
                    for (i in obj)
                        if (value = callback.apply(obj[i], args), value === !1) break
            } else if (isArray)
                for (; length > i && (value = callback.call(obj[i], i, obj[i]), value !== !1); i++);
            else
                for (i in obj)
                    if (value = callback.call(obj[i], i, obj[i]), value === !1) break; return obj
        },
        trim: core_trim && !core_trim.call("﻿ ") ? function (text) {
            return null == text ? "" : core_trim.call(text)
        } : function (text) {
            return null == text ? "" : (text + "").replace(rtrim, "")
        },
        makeArray: function (arr, results) {
            var ret = results || [];
            return null != arr && (isArraylike(Object(arr)) ? jQuery.merge(ret, "string" == typeof arr ? [arr] : arr) : core_push.call(ret, arr)), ret
        },
        inArray: function (elem, arr, i) {
            var len;
            if (arr) {
                if (core_indexOf) return core_indexOf.call(arr, elem, i);
                for (len = arr.length, i = i ? 0 > i ? Math.max(0, len + i) : i : 0; len > i; i++)
                    if (i in arr && arr[i] === elem) return i
            }
            return -1
        },
        merge: function (first, second) {
            var l = second.length,
                i = first.length,
                j = 0;
            if ("number" == typeof l)
                for (; l > j; j++) first[i++] = second[j];
            else
                for (; second[j] !== undefined;) first[i++] = second[j++];
            return first.length = i, first
        },
        grep: function (elems, callback, inv) {
            var retVal, ret = [],
                i = 0,
                length = elems.length;
            for (inv = !! inv; length > i; i++) retVal = !! callback(elems[i], i), inv !== retVal && ret.push(elems[i]);
            return ret
        },
        map: function (elems, callback, arg) {
            var value, i = 0,
                length = elems.length,
                isArray = isArraylike(elems),
                ret = [];
            if (isArray)
                for (; length > i; i++) value = callback(elems[i], i, arg), null != value && (ret[ret.length] = value);
            else
                for (i in elems) value = callback(elems[i], i, arg), null != value && (ret[ret.length] = value);
            return core_concat.apply([], ret)
        },
        guid: 1,
        proxy: function (fn, context) {
            var args, proxy, tmp;
            return "string" == typeof context && (tmp = fn[context], context = fn, fn = tmp), jQuery.isFunction(fn) ? (args = core_slice.call(arguments, 2), proxy = function () {
                return fn.apply(context || this, args.concat(core_slice.call(arguments)))
            }, proxy.guid = fn.guid = fn.guid || jQuery.guid++, proxy) : undefined
        },
        access: function (elems, fn, key, value, chainable, emptyGet, raw) {
            var i = 0,
                length = elems.length,
                bulk = null == key;
            if ("object" === jQuery.type(key)) {
                chainable = !0;
                for (i in key) jQuery.access(elems, fn, i, key[i], !0, emptyGet, raw)
            } else if (value !== undefined && (chainable = !0, jQuery.isFunction(value) || (raw = !0), bulk && (raw ? (fn.call(elems, value), fn = null) : (bulk = fn, fn = function (elem, key, value) {
                return bulk.call(jQuery(elem), value)
            })), fn))
                for (; length > i; i++) fn(elems[i], key, raw ? value : value.call(elems[i], i, fn(elems[i], key)));
            return chainable ? elems : bulk ? fn.call(elems) : length ? fn(elems[0], key) : emptyGet
        },
        now: function () {
            return (new Date).getTime()
        },
        swap: function (elem, options, callback, args) {
            var ret, name, old = {};
            for (name in options) old[name] = elem.style[name], elem.style[name] = options[name];
            ret = callback.apply(elem, args || []);
            for (name in options) elem.style[name] = old[name];
            return ret
        }
    }), jQuery.ready.promise = function (obj) {
        if (!readyList)
            if (readyList = jQuery.Deferred(), "complete" === document.readyState) setTimeout(jQuery.ready);
            else if (document.addEventListener) document.addEventListener("DOMContentLoaded", completed, !1), window.addEventListener("load", completed, !1);
        else {
            document.attachEvent("onreadystatechange", completed), window.attachEvent("onload", completed);
            var top = !1;
            try {
                top = null == window.frameElement && document.documentElement
            } catch (e) {}
            top && top.doScroll && ! function doScrollCheck() {
                if (!jQuery.isReady) {
                    try {
                        top.doScroll("left")
                    } catch (e) {
                        return setTimeout(doScrollCheck, 50)
                    }
                    detach(), jQuery.ready()
                }
            }()
        }
        return readyList.promise(obj)
    }, jQuery.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (i, name) {
        class2type["[object " + name + "]"] = name.toLowerCase()
    }), rootjQuery = jQuery(document),
    function (window, undefined) {
        function Sizzle(selector, context, results, seed) {
            var match, elem, m, nodeType, i, groups, old, nid, newContext, newSelector;
            if ((context ? context.ownerDocument || context : preferredDoc) !== document && setDocument(context), context = context || document, results = results || [], !selector || "string" != typeof selector) return results;
            if (1 !== (nodeType = context.nodeType) && 9 !== nodeType) return [];
            if (documentIsHTML && !seed) {
                if (match = rquickExpr.exec(selector))
                    if (m = match[1]) {
                        if (9 === nodeType) {
                            if (elem = context.getElementById(m), !elem || !elem.parentNode) return results;
                            if (elem.id === m) return results.push(elem), results
                        } else if (context.ownerDocument && (elem = context.ownerDocument.getElementById(m)) && contains(context, elem) && elem.id === m) return results.push(elem), results
                    } else {
                        if (match[2]) return push.apply(results, context.getElementsByTagName(selector)), results;
                        if ((m = match[3]) && support.getElementsByClassName && context.getElementsByClassName) return push.apply(results, context.getElementsByClassName(m)), results
                    }
                if (support.qsa && (!rbuggyQSA || !rbuggyQSA.test(selector))) {
                    if (nid = old = expando, newContext = context, newSelector = 9 === nodeType && selector, 1 === nodeType && "object" !== context.nodeName.toLowerCase()) {
                        for (groups = tokenize(selector), (old = context.getAttribute("id")) ? nid = old.replace(rescape, "\\$&") : context.setAttribute("id", nid), nid = "[id='" + nid + "'] ", i = groups.length; i--;) groups[i] = nid + toSelector(groups[i]);
                        newContext = rsibling.test(selector) && context.parentNode || context, newSelector = groups.join(",")
                    }
                    if (newSelector) try {
                        return push.apply(results, newContext.querySelectorAll(newSelector)), results
                    } catch (qsaError) {} finally {
                        old || context.removeAttribute("id")
                    }
                }
            }
            return select(selector.replace(rtrim, "$1"), context, results, seed)
        }

        function isNative(fn) {
            return rnative.test(fn + "")
        }

        function createCache() {
            function cache(key, value) {
                return keys.push(key += " ") > Expr.cacheLength && delete cache[keys.shift()], cache[key] = value
            }
            var keys = [];
            return cache
        }

        function markFunction(fn) {
            return fn[expando] = !0, fn
        }

        function assert(fn) {
            var div = document.createElement("div");
            try {
                return !!fn(div)
            } catch (e) {
                return !1
            } finally {
                div.parentNode && div.parentNode.removeChild(div), div = null
            }
        }

        function addHandle(attrs, handler, test) {
            attrs = attrs.split("|");
            for (var current, i = attrs.length, setHandle = test ? null : handler; i--;)(current = Expr.attrHandle[attrs[i]]) && current !== handler || (Expr.attrHandle[attrs[i]] = setHandle)
        }

        function boolHandler(elem, name) {
            var val = elem.getAttributeNode(name);
            return val && val.specified ? val.value : elem[name] === !0 ? name.toLowerCase() : null
        }

        function interpolationHandler(elem, name) {
            return elem.getAttribute(name, "type" === name.toLowerCase() ? 1 : 2)
        }

        function valueHandler(elem) {
            return "input" === elem.nodeName.toLowerCase() ? elem.defaultValue : void 0
        }

        function siblingCheck(a, b) {
            var cur = b && a,
                diff = cur && 1 === a.nodeType && 1 === b.nodeType && (~b.sourceIndex || MAX_NEGATIVE) - (~a.sourceIndex || MAX_NEGATIVE);
            if (diff) return diff;
            if (cur)
                for (; cur = cur.nextSibling;)
                    if (cur === b) return -1;
            return a ? 1 : -1
        }

        function createInputPseudo(type) {
            return function (elem) {
                var name = elem.nodeName.toLowerCase();
                return "input" === name && elem.type === type
            }
        }

        function createButtonPseudo(type) {
            return function (elem) {
                var name = elem.nodeName.toLowerCase();
                return ("input" === name || "button" === name) && elem.type === type
            }
        }

        function createPositionalPseudo(fn) {
            return markFunction(function (argument) {
                return argument = +argument, markFunction(function (seed, matches) {
                    for (var j, matchIndexes = fn([], seed.length, argument), i = matchIndexes.length; i--;) seed[j = matchIndexes[i]] && (seed[j] = !(matches[j] = seed[j]))
                })
            })
        }

        function tokenize(selector, parseOnly) {
            var matched, match, tokens, type, soFar, groups, preFilters, cached = tokenCache[selector + " "];
            if (cached) return parseOnly ? 0 : cached.slice(0);
            for (soFar = selector, groups = [], preFilters = Expr.preFilter; soFar;) {
                (!matched || (match = rcomma.exec(soFar))) && (match && (soFar = soFar.slice(match[0].length) || soFar), groups.push(tokens = [])), matched = !1, (match = rcombinators.exec(soFar)) && (matched = match.shift(), tokens.push({
                    value: matched,
                    type: match[0].replace(rtrim, " ")
                }), soFar = soFar.slice(matched.length));
                for (type in Expr.filter)!(match = matchExpr[type].exec(soFar)) || preFilters[type] && !(match = preFilters[type](match)) || (matched = match.shift(), tokens.push({
                    value: matched,
                    type: type,
                    matches: match
                }), soFar = soFar.slice(matched.length));
                if (!matched) break
            }
            return parseOnly ? soFar.length : soFar ? Sizzle.error(selector) : tokenCache(selector, groups).slice(0)
        }

        function toSelector(tokens) {
            for (var i = 0, len = tokens.length, selector = ""; len > i; i++) selector += tokens[i].value;
            return selector
        }

        function addCombinator(matcher, combinator, base) {
            var dir = combinator.dir,
                checkNonElements = base && "parentNode" === dir,
                doneName = done++;
            return combinator.first ? function (elem, context, xml) {
                for (; elem = elem[dir];)
                    if (1 === elem.nodeType || checkNonElements) return matcher(elem, context, xml)
            } : function (elem, context, xml) {
                var data, cache, outerCache, dirkey = dirruns + " " + doneName;
                if (xml) {
                    for (; elem = elem[dir];)
                        if ((1 === elem.nodeType || checkNonElements) && matcher(elem, context, xml)) return !0
                } else
                    for (; elem = elem[dir];)
                        if (1 === elem.nodeType || checkNonElements)
                            if (outerCache = elem[expando] || (elem[expando] = {}), (cache = outerCache[dir]) && cache[0] === dirkey) {
                                if ((data = cache[1]) === !0 || data === cachedruns) return data === !0
                            } else if (cache = outerCache[dir] = [dirkey], cache[1] = matcher(elem, context, xml) || cachedruns, cache[1] === !0) return !0
            }
        }

        function elementMatcher(matchers) {
            return matchers.length > 1 ? function (elem, context, xml) {
                for (var i = matchers.length; i--;)
                    if (!matchers[i](elem, context, xml)) return !1;
                return !0
            } : matchers[0]
        }

        function condense(unmatched, map, filter, context, xml) {
            for (var elem, newUnmatched = [], i = 0, len = unmatched.length, mapped = null != map; len > i; i++)(elem = unmatched[i]) && (!filter || filter(elem, context, xml)) && (newUnmatched.push(elem), mapped && map.push(i));
            return newUnmatched
        }

        function setMatcher(preFilter, selector, matcher, postFilter, postFinder, postSelector) {
            return postFilter && !postFilter[expando] && (postFilter = setMatcher(postFilter)), postFinder && !postFinder[expando] && (postFinder = setMatcher(postFinder, postSelector)), markFunction(function (seed, results, context, xml) {
                var temp, i, elem, preMap = [],
                    postMap = [],
                    preexisting = results.length,
                    elems = seed || multipleContexts(selector || "*", context.nodeType ? [context] : context, []),
                    matcherIn = !preFilter || !seed && selector ? elems : condense(elems, preMap, preFilter, context, xml),
                    matcherOut = matcher ? postFinder || (seed ? preFilter : preexisting || postFilter) ? [] : results : matcherIn;
                if (matcher && matcher(matcherIn, matcherOut, context, xml), postFilter)
                    for (temp = condense(matcherOut, postMap), postFilter(temp, [], context, xml), i = temp.length; i--;)(elem = temp[i]) && (matcherOut[postMap[i]] = !(matcherIn[postMap[i]] = elem));
                if (seed) {
                    if (postFinder || preFilter) {
                        if (postFinder) {
                            for (temp = [], i = matcherOut.length; i--;)(elem = matcherOut[i]) && temp.push(matcherIn[i] = elem);
                            postFinder(null, matcherOut = [], temp, xml)
                        }
                        for (i = matcherOut.length; i--;)(elem = matcherOut[i]) && (temp = postFinder ? indexOf.call(seed, elem) : preMap[i]) > -1 && (seed[temp] = !(results[temp] = elem))
                    }
                } else matcherOut = condense(matcherOut === results ? matcherOut.splice(preexisting, matcherOut.length) : matcherOut), postFinder ? postFinder(null, results, matcherOut, xml) : push.apply(results, matcherOut)
            })
        }

        function matcherFromTokens(tokens) {
            for (var checkContext, matcher, j, len = tokens.length, leadingRelative = Expr.relative[tokens[0].type], implicitRelative = leadingRelative || Expr.relative[" "], i = leadingRelative ? 1 : 0, matchContext = addCombinator(function (elem) {
                    return elem === checkContext
                }, implicitRelative, !0), matchAnyContext = addCombinator(function (elem) {
                    return indexOf.call(checkContext, elem) > -1
                }, implicitRelative, !0), matchers = [
                    function (elem, context, xml) {
                        return !leadingRelative && (xml || context !== outermostContext) || ((checkContext = context).nodeType ? matchContext(elem, context, xml) : matchAnyContext(elem, context, xml))
                    }]; len > i; i++)
                if (matcher = Expr.relative[tokens[i].type]) matchers = [addCombinator(elementMatcher(matchers), matcher)];
                else {
                    if (matcher = Expr.filter[tokens[i].type].apply(null, tokens[i].matches), matcher[expando]) {
                        for (j = ++i; len > j && !Expr.relative[tokens[j].type]; j++);
                        return setMatcher(i > 1 && elementMatcher(matchers), i > 1 && toSelector(tokens.slice(0, i - 1).concat({
                            value: " " === tokens[i - 2].type ? "*" : ""
                        })).replace(rtrim, "$1"), matcher, j > i && matcherFromTokens(tokens.slice(i, j)), len > j && matcherFromTokens(tokens = tokens.slice(j)), len > j && toSelector(tokens))
                    }
                    matchers.push(matcher)
                }
            return elementMatcher(matchers)
        }

        function matcherFromGroupMatchers(elementMatchers, setMatchers) {
            var matcherCachedRuns = 0,
                bySet = setMatchers.length > 0,
                byElement = elementMatchers.length > 0,
                superMatcher = function (seed, context, xml, results, expandContext) {
                    var elem, j, matcher, setMatched = [],
                        matchedCount = 0,
                        i = "0",
                        unmatched = seed && [],
                        outermost = null != expandContext,
                        contextBackup = outermostContext,
                        elems = seed || byElement && Expr.find.TAG("*", expandContext && context.parentNode || context),
                        dirrunsUnique = dirruns += null == contextBackup ? 1 : Math.random() || .1;
                    for (outermost && (outermostContext = context !== document && context, cachedruns = matcherCachedRuns); null != (elem = elems[i]); i++) {
                        if (byElement && elem) {
                            for (j = 0; matcher = elementMatchers[j++];)
                                if (matcher(elem, context, xml)) {
                                    results.push(elem);
                                    break
                                }
                            outermost && (dirruns = dirrunsUnique, cachedruns = ++matcherCachedRuns)
                        }
                        bySet && ((elem = !matcher && elem) && matchedCount--, seed && unmatched.push(elem))
                    }
                    if (matchedCount += i, bySet && i !== matchedCount) {
                        for (j = 0; matcher = setMatchers[j++];) matcher(unmatched, setMatched, context, xml);
                        if (seed) {
                            if (matchedCount > 0)
                                for (; i--;) unmatched[i] || setMatched[i] || (setMatched[i] = pop.call(results));
                            setMatched = condense(setMatched)
                        }
                        push.apply(results, setMatched), outermost && !seed && setMatched.length > 0 && matchedCount + setMatchers.length > 1 && Sizzle.uniqueSort(results)
                    }
                    return outermost && (dirruns = dirrunsUnique, outermostContext = contextBackup), unmatched
                };
            return bySet ? markFunction(superMatcher) : superMatcher
        }

        function multipleContexts(selector, contexts, results) {
            for (var i = 0, len = contexts.length; len > i; i++) Sizzle(selector, contexts[i], results);
            return results
        }

        function select(selector, context, results, seed) {
            var i, tokens, token, type, find, match = tokenize(selector);
            if (!seed && 1 === match.length) {
                if (tokens = match[0] = match[0].slice(0), tokens.length > 2 && "ID" === (token = tokens[0]).type && support.getById && 9 === context.nodeType && documentIsHTML && Expr.relative[tokens[1].type]) {
                    if (context = (Expr.find.ID(token.matches[0].replace(runescape, funescape), context) || [])[0], !context) return results;
                    selector = selector.slice(tokens.shift().value.length)
                }
                for (i = matchExpr.needsContext.test(selector) ? 0 : tokens.length; i-- && (token = tokens[i], !Expr.relative[type = token.type]);)
                    if ((find = Expr.find[type]) && (seed = find(token.matches[0].replace(runescape, funescape), rsibling.test(tokens[0].type) && context.parentNode || context))) {
                        if (tokens.splice(i, 1), selector = seed.length && toSelector(tokens), !selector) return push.apply(results, seed), results;
                        break
                    }
            }
            return compile(selector, match)(seed, context, !documentIsHTML, results, rsibling.test(selector)), results
        }

        function setFilters() {}
        var i, support, cachedruns, Expr, getText, isXML, compile, outermostContext, sortInput, setDocument, document, docElem, documentIsHTML, rbuggyQSA, rbuggyMatches, matches, contains, expando = "sizzle" + -new Date,
            preferredDoc = window.document,
            dirruns = 0,
            done = 0,
            classCache = createCache(),
            tokenCache = createCache(),
            compilerCache = createCache(),
            hasDuplicate = !1,
            sortOrder = function () {
                return 0
            }, strundefined = typeof undefined,
            MAX_NEGATIVE = 1 << 31,
            hasOwn = {}.hasOwnProperty,
            arr = [],
            pop = arr.pop,
            push_native = arr.push,
            push = arr.push,
            slice = arr.slice,
            indexOf = arr.indexOf || function (elem) {
                for (var i = 0, len = this.length; len > i; i++)
                    if (this[i] === elem) return i;
                return -1
            }, booleans = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            whitespace = "[\\x20\\t\\r\\n\\f]",
            characterEncoding = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
            identifier = characterEncoding.replace("w", "w#"),
            attributes = "\\[" + whitespace + "*(" + characterEncoding + ")" + whitespace + "*(?:([*^$|!~]?=)" + whitespace + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + identifier + ")|)|)" + whitespace + "*\\]",
            pseudos = ":(" + characterEncoding + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + attributes.replace(3, 8) + ")*)|.*)\\)|)",
            rtrim = new RegExp("^" + whitespace + "+|((?:^|[^\\\\])(?:\\\\.)*)" + whitespace + "+$", "g"),
            rcomma = new RegExp("^" + whitespace + "*," + whitespace + "*"),
            rcombinators = new RegExp("^" + whitespace + "*([>+~]|" + whitespace + ")" + whitespace + "*"),
            rsibling = new RegExp(whitespace + "*[+~]"),
            rattributeQuotes = new RegExp("=" + whitespace + "*([^\\]'\"]*)" + whitespace + "*\\]", "g"),
            rpseudo = new RegExp(pseudos),
            ridentifier = new RegExp("^" + identifier + "$"),
            matchExpr = {
                ID: new RegExp("^#(" + characterEncoding + ")"),
                CLASS: new RegExp("^\\.(" + characterEncoding + ")"),
                TAG: new RegExp("^(" + characterEncoding.replace("w", "w*") + ")"),
                ATTR: new RegExp("^" + attributes),
                PSEUDO: new RegExp("^" + pseudos),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + whitespace + "*(even|odd|(([+-]|)(\\d*)n|)" + whitespace + "*(?:([+-]|)" + whitespace + "*(\\d+)|))" + whitespace + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + booleans + ")$", "i"),
                needsContext: new RegExp("^" + whitespace + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + whitespace + "*((?:-\\d)?\\d*)" + whitespace + "*\\)|)(?=[^-]|$)", "i")
            }, rnative = /^[^{]+\{\s*\[native \w/,
            rquickExpr = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            rinputs = /^(?:input|select|textarea|button)$/i,
            rheader = /^h\d$/i,
            rescape = /'|\\/g,
            runescape = new RegExp("\\\\([\\da-f]{1,6}" + whitespace + "?|(" + whitespace + ")|.)", "ig"),
            funescape = function (_, escaped, escapedWhitespace) {
                var high = "0x" + escaped - 65536;
                return high !== high || escapedWhitespace ? escaped : 0 > high ? String.fromCharCode(high + 65536) : String.fromCharCode(high >> 10 | 55296, 1023 & high | 56320)
            };
        try {
            push.apply(arr = slice.call(preferredDoc.childNodes), preferredDoc.childNodes), arr[preferredDoc.childNodes.length].nodeType
        } catch (e) {
            push = {
                apply: arr.length ? function (target, els) {
                    push_native.apply(target, slice.call(els))
                } : function (target, els) {
                    for (var j = target.length, i = 0; target[j++] = els[i++];);
                    target.length = j - 1
                }
            }
        }
        isXML = Sizzle.isXML = function (elem) {
            var documentElement = elem && (elem.ownerDocument || elem).documentElement;
            return documentElement ? "HTML" !== documentElement.nodeName : !1
        }, support = Sizzle.support = {}, setDocument = Sizzle.setDocument = function (node) {
            var doc = node ? node.ownerDocument || node : preferredDoc,
                parent = doc.parentWindow;
            return doc !== document && 9 === doc.nodeType && doc.documentElement ? (document = doc, docElem = doc.documentElement, documentIsHTML = !isXML(doc), parent && parent.frameElement && parent.attachEvent("onbeforeunload", function () {
                setDocument()
            }), support.attributes = assert(function (div) {
                return div.innerHTML = "<a href='#'></a>", addHandle("type|href|height|width", interpolationHandler, "#" === div.firstChild.getAttribute("href")), addHandle(booleans, boolHandler, null == div.getAttribute("disabled")), div.className = "i", !div.getAttribute("className")
            }), support.input = assert(function (div) {
                return div.innerHTML = "<input>", div.firstChild.setAttribute("value", ""), "" === div.firstChild.getAttribute("value")
            }), addHandle("value", valueHandler, support.attributes && support.input), support.getElementsByTagName = assert(function (div) {
                return div.appendChild(doc.createComment("")), !div.getElementsByTagName("*").length
            }), support.getElementsByClassName = assert(function (div) {
                return div.innerHTML = "<div class='a'></div><div class='a i'></div>", div.firstChild.className = "i", 2 === div.getElementsByClassName("i").length
            }), support.getById = assert(function (div) {
                return docElem.appendChild(div).id = expando, !doc.getElementsByName || !doc.getElementsByName(expando).length
            }), support.getById ? (Expr.find.ID = function (id, context) {
                if (typeof context.getElementById !== strundefined && documentIsHTML) {
                    var m = context.getElementById(id);
                    return m && m.parentNode ? [m] : []
                }
            }, Expr.filter.ID = function (id) {
                var attrId = id.replace(runescape, funescape);
                return function (elem) {
                    return elem.getAttribute("id") === attrId
                }
            }) : (delete Expr.find.ID, Expr.filter.ID = function (id) {
                var attrId = id.replace(runescape, funescape);
                return function (elem) {
                    var node = typeof elem.getAttributeNode !== strundefined && elem.getAttributeNode("id");
                    return node && node.value === attrId
                }
            }), Expr.find.TAG = support.getElementsByTagName ? function (tag, context) {
                return typeof context.getElementsByTagName !== strundefined ? context.getElementsByTagName(tag) : void 0
            } : function (tag, context) {
                var elem, tmp = [],
                    i = 0,
                    results = context.getElementsByTagName(tag);
                if ("*" === tag) {
                    for (; elem = results[i++];) 1 === elem.nodeType && tmp.push(elem);
                    return tmp
                }
                return results
            }, Expr.find.CLASS = support.getElementsByClassName && function (className, context) {
                return typeof context.getElementsByClassName !== strundefined && documentIsHTML ? context.getElementsByClassName(className) : void 0
            }, rbuggyMatches = [], rbuggyQSA = [], (support.qsa = isNative(doc.querySelectorAll)) && (assert(function (div) {
                div.innerHTML = "<select><option selected=''></option></select>", div.querySelectorAll("[selected]").length || rbuggyQSA.push("\\[" + whitespace + "*(?:value|" + booleans + ")"), div.querySelectorAll(":checked").length || rbuggyQSA.push(":checked")
            }), assert(function (div) {
                var input = doc.createElement("input");
                input.setAttribute("type", "hidden"), div.appendChild(input).setAttribute("t", ""), div.querySelectorAll("[t^='']").length && rbuggyQSA.push("[*^$]=" + whitespace + "*(?:''|\"\")"), div.querySelectorAll(":enabled").length || rbuggyQSA.push(":enabled", ":disabled"), div.querySelectorAll("*,:x"), rbuggyQSA.push(",.*:")
            })), (support.matchesSelector = isNative(matches = docElem.webkitMatchesSelector || docElem.mozMatchesSelector || docElem.oMatchesSelector || docElem.msMatchesSelector)) && assert(function (div) {
                support.disconnectedMatch = matches.call(div, "div"), matches.call(div, "[s!='']:x"), rbuggyMatches.push("!=", pseudos)
            }), rbuggyQSA = rbuggyQSA.length && new RegExp(rbuggyQSA.join("|")), rbuggyMatches = rbuggyMatches.length && new RegExp(rbuggyMatches.join("|")), contains = isNative(docElem.contains) || docElem.compareDocumentPosition ? function (a, b) {
                var adown = 9 === a.nodeType ? a.documentElement : a,
                    bup = b && b.parentNode;
                return a === bup || !(!bup || 1 !== bup.nodeType || !(adown.contains ? adown.contains(bup) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(bup)))
            } : function (a, b) {
                if (b)
                    for (; b = b.parentNode;)
                        if (b === a) return !0;
                return !1
            }, support.sortDetached = assert(function (div1) {
                return 1 & div1.compareDocumentPosition(doc.createElement("div"))
            }), sortOrder = docElem.compareDocumentPosition ? function (a, b) {
                if (a === b) return hasDuplicate = !0, 0;
                var compare = b.compareDocumentPosition && a.compareDocumentPosition && a.compareDocumentPosition(b);
                return compare ? 1 & compare || !support.sortDetached && b.compareDocumentPosition(a) === compare ? a === doc || contains(preferredDoc, a) ? -1 : b === doc || contains(preferredDoc, b) ? 1 : sortInput ? indexOf.call(sortInput, a) - indexOf.call(sortInput, b) : 0 : 4 & compare ? -1 : 1 : a.compareDocumentPosition ? -1 : 1
            } : function (a, b) {
                var cur, i = 0,
                    aup = a.parentNode,
                    bup = b.parentNode,
                    ap = [a],
                    bp = [b];
                if (a === b) return hasDuplicate = !0, 0;
                if (!aup || !bup) return a === doc ? -1 : b === doc ? 1 : aup ? -1 : bup ? 1 : sortInput ? indexOf.call(sortInput, a) - indexOf.call(sortInput, b) : 0;
                if (aup === bup) return siblingCheck(a, b);
                for (cur = a; cur = cur.parentNode;) ap.unshift(cur);
                for (cur = b; cur = cur.parentNode;) bp.unshift(cur);
                for (; ap[i] === bp[i];) i++;
                return i ? siblingCheck(ap[i], bp[i]) : ap[i] === preferredDoc ? -1 : bp[i] === preferredDoc ? 1 : 0
            }, doc) : document
        }, Sizzle.matches = function (expr, elements) {
            return Sizzle(expr, null, null, elements)
        }, Sizzle.matchesSelector = function (elem, expr) {
            if ((elem.ownerDocument || elem) !== document && setDocument(elem), expr = expr.replace(rattributeQuotes, "='$1']"), !(!support.matchesSelector || !documentIsHTML || rbuggyMatches && rbuggyMatches.test(expr) || rbuggyQSA && rbuggyQSA.test(expr))) try {
                var ret = matches.call(elem, expr);
                if (ret || support.disconnectedMatch || elem.document && 11 !== elem.document.nodeType) return ret
            } catch (e) {}
            return Sizzle(expr, document, null, [elem]).length > 0
        }, Sizzle.contains = function (context, elem) {
            return (context.ownerDocument || context) !== document && setDocument(context), contains(context, elem)
        }, Sizzle.attr = function (elem, name) {
            (elem.ownerDocument || elem) !== document && setDocument(elem);
            var fn = Expr.attrHandle[name.toLowerCase()],
                val = fn && hasOwn.call(Expr.attrHandle, name.toLowerCase()) ? fn(elem, name, !documentIsHTML) : undefined;
            return val === undefined ? support.attributes || !documentIsHTML ? elem.getAttribute(name) : (val = elem.getAttributeNode(name)) && val.specified ? val.value : null : val
        }, Sizzle.error = function (msg) {
            throw new Error("Syntax error, unrecognized expression: " + msg)
        }, Sizzle.uniqueSort = function (results) {
            var elem, duplicates = [],
                j = 0,
                i = 0;
            if (hasDuplicate = !support.detectDuplicates, sortInput = !support.sortStable && results.slice(0), results.sort(sortOrder), hasDuplicate) {
                for (; elem = results[i++];) elem === results[i] && (j = duplicates.push(i));
                for (; j--;) results.splice(duplicates[j], 1)
            }
            return results
        }, getText = Sizzle.getText = function (elem) {
            var node, ret = "",
                i = 0,
                nodeType = elem.nodeType;
            if (nodeType) {
                if (1 === nodeType || 9 === nodeType || 11 === nodeType) {
                    if ("string" == typeof elem.textContent) return elem.textContent;
                    for (elem = elem.firstChild; elem; elem = elem.nextSibling) ret += getText(elem)
                } else if (3 === nodeType || 4 === nodeType) return elem.nodeValue
            } else
                for (; node = elem[i]; i++) ret += getText(node);
            return ret
        }, Expr = Sizzle.selectors = {
            cacheLength: 50,
            createPseudo: markFunction,
            match: matchExpr,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function (match) {
                    return match[1] = match[1].replace(runescape, funescape), match[3] = (match[4] || match[5] || "").replace(runescape, funescape), "~=" === match[2] && (match[3] = " " + match[3] + " "), match.slice(0, 4)
                },
                CHILD: function (match) {
                    return match[1] = match[1].toLowerCase(), "nth" === match[1].slice(0, 3) ? (match[3] || Sizzle.error(match[0]), match[4] = +(match[4] ? match[5] + (match[6] || 1) : 2 * ("even" === match[3] || "odd" === match[3])), match[5] = +(match[7] + match[8] || "odd" === match[3])) : match[3] && Sizzle.error(match[0]), match
                },
                PSEUDO: function (match) {
                    var excess, unquoted = !match[5] && match[2];
                    return matchExpr.CHILD.test(match[0]) ? null : (match[3] && match[4] !== undefined ? match[2] = match[4] : unquoted && rpseudo.test(unquoted) && (excess = tokenize(unquoted, !0)) && (excess = unquoted.indexOf(")", unquoted.length - excess) - unquoted.length) && (match[0] = match[0].slice(0, excess), match[2] = unquoted.slice(0, excess)), match.slice(0, 3))
                }
            },
            filter: {
                TAG: function (nodeNameSelector) {
                    var nodeName = nodeNameSelector.replace(runescape, funescape).toLowerCase();
                    return "*" === nodeNameSelector ? function () {
                        return !0
                    } : function (elem) {
                        return elem.nodeName && elem.nodeName.toLowerCase() === nodeName
                    }
                },
                CLASS: function (className) {
                    var pattern = classCache[className + " "];
                    return pattern || (pattern = new RegExp("(^|" + whitespace + ")" + className + "(" + whitespace + "|$)")) && classCache(className, function (elem) {
                        return pattern.test("string" == typeof elem.className && elem.className || typeof elem.getAttribute !== strundefined && elem.getAttribute("class") || "")
                    })
                },
                ATTR: function (name, operator, check) {
                    return function (elem) {
                        var result = Sizzle.attr(elem, name);
                        return null == result ? "!=" === operator : operator ? (result += "", "=" === operator ? result === check : "!=" === operator ? result !== check : "^=" === operator ? check && 0 === result.indexOf(check) : "*=" === operator ? check && result.indexOf(check) > -1 : "$=" === operator ? check && result.slice(-check.length) === check : "~=" === operator ? (" " + result + " ").indexOf(check) > -1 : "|=" === operator ? result === check || result.slice(0, check.length + 1) === check + "-" : !1) : !0
                    }
                },
                CHILD: function (type, what, argument, first, last) {
                    var simple = "nth" !== type.slice(0, 3),
                        forward = "last" !== type.slice(-4),
                        ofType = "of-type" === what;
                    return 1 === first && 0 === last ? function (elem) {
                        return !!elem.parentNode
                    } : function (elem, context, xml) {
                        var cache, outerCache, node, diff, nodeIndex, start, dir = simple !== forward ? "nextSibling" : "previousSibling",
                            parent = elem.parentNode,
                            name = ofType && elem.nodeName.toLowerCase(),
                            useCache = !xml && !ofType;
                        if (parent) {
                            if (simple) {
                                for (; dir;) {
                                    for (node = elem; node = node[dir];)
                                        if (ofType ? node.nodeName.toLowerCase() === name : 1 === node.nodeType) return !1;
                                    start = dir = "only" === type && !start && "nextSibling"
                                }
                                return !0
                            }
                            if (start = [forward ? parent.firstChild : parent.lastChild], forward && useCache) {
                                for (outerCache = parent[expando] || (parent[expando] = {}), cache = outerCache[type] || [], nodeIndex = cache[0] === dirruns && cache[1], diff = cache[0] === dirruns && cache[2], node = nodeIndex && parent.childNodes[nodeIndex]; node = ++nodeIndex && node && node[dir] || (diff = nodeIndex = 0) || start.pop();)
                                    if (1 === node.nodeType && ++diff && node === elem) {
                                        outerCache[type] = [dirruns, nodeIndex, diff];
                                        break
                                    }
                            } else if (useCache && (cache = (elem[expando] || (elem[expando] = {}))[type]) && cache[0] === dirruns) diff = cache[1];
                            else
                                for (;
                                    (node = ++nodeIndex && node && node[dir] || (diff = nodeIndex = 0) || start.pop()) && ((ofType ? node.nodeName.toLowerCase() !== name : 1 !== node.nodeType) || !++diff || (useCache && ((node[expando] || (node[expando] = {}))[type] = [dirruns, diff]), node !== elem)););
                            return diff -= last, diff === first || diff % first === 0 && diff / first >= 0
                        }
                    }
                },
                PSEUDO: function (pseudo, argument) {
                    var args, fn = Expr.pseudos[pseudo] || Expr.setFilters[pseudo.toLowerCase()] || Sizzle.error("unsupported pseudo: " + pseudo);
                    return fn[expando] ? fn(argument) : fn.length > 1 ? (args = [pseudo, pseudo, "", argument], Expr.setFilters.hasOwnProperty(pseudo.toLowerCase()) ? markFunction(function (seed, matches) {
                        for (var idx, matched = fn(seed, argument), i = matched.length; i--;) idx = indexOf.call(seed, matched[i]), seed[idx] = !(matches[idx] = matched[i])
                    }) : function (elem) {
                        return fn(elem, 0, args)
                    }) : fn
                }
            },
            pseudos: {
                not: markFunction(function (selector) {
                    var input = [],
                        results = [],
                        matcher = compile(selector.replace(rtrim, "$1"));
                    return matcher[expando] ? markFunction(function (seed, matches, context, xml) {
                        for (var elem, unmatched = matcher(seed, null, xml, []), i = seed.length; i--;)(elem = unmatched[i]) && (seed[i] = !(matches[i] = elem))
                    }) : function (elem, context, xml) {
                        return input[0] = elem, matcher(input, null, xml, results), !results.pop()
                    }
                }),
                has: markFunction(function (selector) {
                    return function (elem) {
                        return Sizzle(selector, elem).length > 0
                    }
                }),
                contains: markFunction(function (text) {
                    return function (elem) {
                        return (elem.textContent || elem.innerText || getText(elem)).indexOf(text) > -1
                    }
                }),
                lang: markFunction(function (lang) {
                    return ridentifier.test(lang || "") || Sizzle.error("unsupported lang: " + lang), lang = lang.replace(runescape, funescape).toLowerCase(),
                    function (elem) {
                        var elemLang;
                        do
                            if (elemLang = documentIsHTML ? elem.lang : elem.getAttribute("xml:lang") || elem.getAttribute("lang")) return elemLang = elemLang.toLowerCase(), elemLang === lang || 0 === elemLang.indexOf(lang + "-"); while ((elem = elem.parentNode) && 1 === elem.nodeType);
                        return !1
                    }
                }),
                target: function (elem) {
                    var hash = window.location && window.location.hash;
                    return hash && hash.slice(1) === elem.id
                },
                root: function (elem) {
                    return elem === docElem
                },
                focus: function (elem) {
                    return elem === document.activeElement && (!document.hasFocus || document.hasFocus()) && !! (elem.type || elem.href || ~elem.tabIndex)
                },
                enabled: function (elem) {
                    return elem.disabled === !1
                },
                disabled: function (elem) {
                    return elem.disabled === !0
                },
                checked: function (elem) {
                    var nodeName = elem.nodeName.toLowerCase();
                    return "input" === nodeName && !! elem.checked || "option" === nodeName && !! elem.selected
                },
                selected: function (elem) {
                    return elem.parentNode && elem.parentNode.selectedIndex, elem.selected === !0
                },
                empty: function (elem) {
                    for (elem = elem.firstChild; elem; elem = elem.nextSibling)
                        if (elem.nodeName > "@" || 3 === elem.nodeType || 4 === elem.nodeType) return !1;
                    return !0
                },
                parent: function (elem) {
                    return !Expr.pseudos.empty(elem)
                },
                header: function (elem) {
                    return rheader.test(elem.nodeName)
                },
                input: function (elem) {
                    return rinputs.test(elem.nodeName)
                },
                button: function (elem) {
                    var name = elem.nodeName.toLowerCase();
                    return "input" === name && "button" === elem.type || "button" === name
                },
                text: function (elem) {
                    var attr;
                    return "input" === elem.nodeName.toLowerCase() && "text" === elem.type && (null == (attr = elem.getAttribute("type")) || attr.toLowerCase() === elem.type)
                },
                first: createPositionalPseudo(function () {
                    return [0]
                }),
                last: createPositionalPseudo(function (matchIndexes, length) {
                    return [length - 1]
                }),
                eq: createPositionalPseudo(function (matchIndexes, length, argument) {
                    return [0 > argument ? argument + length : argument]
                }),
                even: createPositionalPseudo(function (matchIndexes, length) {
                    for (var i = 0; length > i; i += 2) matchIndexes.push(i);
                    return matchIndexes
                }),
                odd: createPositionalPseudo(function (matchIndexes, length) {
                    for (var i = 1; length > i; i += 2) matchIndexes.push(i);
                    return matchIndexes
                }),
                lt: createPositionalPseudo(function (matchIndexes, length, argument) {
                    for (var i = 0 > argument ? argument + length : argument; --i >= 0;) matchIndexes.push(i);
                    return matchIndexes
                }),
                gt: createPositionalPseudo(function (matchIndexes, length, argument) {
                    for (var i = 0 > argument ? argument + length : argument; ++i < length;) matchIndexes.push(i);
                    return matchIndexes
                })
            }
        };
        for (i in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        }) Expr.pseudos[i] = createInputPseudo(i);
        for (i in {
            submit: !0,
            reset: !0
        }) Expr.pseudos[i] = createButtonPseudo(i);
        compile = Sizzle.compile = function (selector, group) {
            var i, setMatchers = [],
                elementMatchers = [],
                cached = compilerCache[selector + " "];
            if (!cached) {
                for (group || (group = tokenize(selector)), i = group.length; i--;) cached = matcherFromTokens(group[i]), cached[expando] ? setMatchers.push(cached) : elementMatchers.push(cached);
                cached = compilerCache(selector, matcherFromGroupMatchers(elementMatchers, setMatchers))
            }
            return cached
        }, Expr.pseudos.nth = Expr.pseudos.eq, setFilters.prototype = Expr.filters = Expr.pseudos, Expr.setFilters = new setFilters, support.sortStable = expando.split("").sort(sortOrder).join("") === expando, setDocument(), [0, 0].sort(sortOrder), support.detectDuplicates = hasDuplicate, jQuery.find = Sizzle, jQuery.expr = Sizzle.selectors, jQuery.expr[":"] = jQuery.expr.pseudos, jQuery.unique = Sizzle.uniqueSort, jQuery.text = Sizzle.getText, jQuery.isXMLDoc = Sizzle.isXML, jQuery.contains = Sizzle.contains
    }(window);
    var optionsCache = {};
    jQuery.Callbacks = function (options) {
        options = "string" == typeof options ? optionsCache[options] || createOptions(options) : jQuery.extend({}, options);
        var firing, memory, fired, firingLength, firingIndex, firingStart, list = [],
            stack = !options.once && [],
            fire = function (data) {
                for (memory = options.memory && data, fired = !0, firingIndex = firingStart || 0, firingStart = 0, firingLength = list.length, firing = !0; list && firingLength > firingIndex; firingIndex++)
                    if (list[firingIndex].apply(data[0], data[1]) === !1 && options.stopOnFalse) {
                        memory = !1;
                        break
                    }
                firing = !1, list && (stack ? stack.length && fire(stack.shift()) : memory ? list = [] : self.disable())
            }, self = {
                add: function () {
                    if (list) {
                        var start = list.length;
                        ! function add(args) {
                            jQuery.each(args, function (_, arg) {
                                var type = jQuery.type(arg);
                                "function" === type ? options.unique && self.has(arg) || list.push(arg) : arg && arg.length && "string" !== type && add(arg)
                            })
                        }(arguments), firing ? firingLength = list.length : memory && (firingStart = start, fire(memory))
                    }
                    return this
                },
                remove: function () {
                    return list && jQuery.each(arguments, function (_, arg) {
                        for (var index;
                            (index = jQuery.inArray(arg, list, index)) > -1;) list.splice(index, 1), firing && (firingLength >= index && firingLength--, firingIndex >= index && firingIndex--)
                    }), this
                },
                has: function (fn) {
                    return fn ? jQuery.inArray(fn, list) > -1 : !(!list || !list.length)
                },
                empty: function () {
                    return list = [], firingLength = 0, this
                },
                disable: function () {
                    return list = stack = memory = undefined, this
                },
                disabled: function () {
                    return !list
                },
                lock: function () {
                    return stack = undefined, memory || self.disable(), this
                },
                locked: function () {
                    return !stack
                },
                fireWith: function (context, args) {
                    return args = args || [], args = [context, args.slice ? args.slice() : args], !list || fired && !stack || (firing ? stack.push(args) : fire(args)), this
                },
                fire: function () {
                    return self.fireWith(this, arguments), this
                },
                fired: function () {
                    return !!fired
                }
            };
        return self
    }, jQuery.extend({
        Deferred: function (func) {
            var tuples = [["resolve", "done", jQuery.Callbacks("once memory"), "resolved"], ["reject", "fail", jQuery.Callbacks("once memory"), "rejected"], ["notify", "progress", jQuery.Callbacks("memory")]],
                state = "pending",
                promise = {
                    state: function () {
                        return state
                    },
                    always: function () {
                        return deferred.done(arguments).fail(arguments), this
                    },
                    then: function () {
                        var fns = arguments;
                        return jQuery.Deferred(function (newDefer) {
                            jQuery.each(tuples, function (i, tuple) {
                                var action = tuple[0],
                                    fn = jQuery.isFunction(fns[i]) && fns[i];
                                deferred[tuple[1]](function () {
                                    var returned = fn && fn.apply(this, arguments);
                                    returned && jQuery.isFunction(returned.promise) ? returned.promise().done(newDefer.resolve).fail(newDefer.reject).progress(newDefer.notify) : newDefer[action + "With"](this === promise ? newDefer.promise() : this, fn ? [returned] : arguments)
                                })
                            }), fns = null
                        }).promise()
                    },
                    promise: function (obj) {
                        return null != obj ? jQuery.extend(obj, promise) : promise
                    }
                }, deferred = {};
            return promise.pipe = promise.then, jQuery.each(tuples, function (i, tuple) {
                var list = tuple[2],
                    stateString = tuple[3];
                promise[tuple[1]] = list.add, stateString && list.add(function () {
                    state = stateString
                }, tuples[1 ^ i][2].disable, tuples[2][2].lock), deferred[tuple[0]] = function () {
                    return deferred[tuple[0] + "With"](this === deferred ? promise : this, arguments), this
                }, deferred[tuple[0] + "With"] = list.fireWith
            }), promise.promise(deferred), func && func.call(deferred, deferred), deferred
        },
        when: function (subordinate) {
            var progressValues, progressContexts, resolveContexts, i = 0,
                resolveValues = core_slice.call(arguments),
                length = resolveValues.length,
                remaining = 1 !== length || subordinate && jQuery.isFunction(subordinate.promise) ? length : 0,
                deferred = 1 === remaining ? subordinate : jQuery.Deferred(),
                updateFunc = function (i, contexts, values) {
                    return function (value) {
                        contexts[i] = this, values[i] = arguments.length > 1 ? core_slice.call(arguments) : value, values === progressValues ? deferred.notifyWith(contexts, values) : --remaining || deferred.resolveWith(contexts, values)
                    }
                };
            if (length > 1)
                for (progressValues = new Array(length), progressContexts = new Array(length), resolveContexts = new Array(length); length > i; i++) resolveValues[i] && jQuery.isFunction(resolveValues[i].promise) ? resolveValues[i].promise().done(updateFunc(i, resolveContexts, resolveValues)).fail(deferred.reject).progress(updateFunc(i, progressContexts, progressValues)) : --remaining;
            return remaining || deferred.resolveWith(resolveContexts, resolveValues), deferred.promise()
        }
    }), jQuery.support = function (support) {
        var all, a, input, select, fragment, opt, eventName, isSupported, i, div = document.createElement("div");
        if (div.setAttribute("className", "t"), div.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", all = div.getElementsByTagName("*") || [], a = div.getElementsByTagName("a")[0], !a || !a.style || !all.length) return support;
        select = document.createElement("select"), opt = select.appendChild(document.createElement("option")), input = div.getElementsByTagName("input")[0], a.style.cssText = "top:1px;float:left;opacity:.5", support.getSetAttribute = "t" !== div.className, support.leadingWhitespace = 3 === div.firstChild.nodeType, support.tbody = !div.getElementsByTagName("tbody").length, support.htmlSerialize = !! div.getElementsByTagName("link").length, support.style = /top/.test(a.getAttribute("style")), support.hrefNormalized = "/a" === a.getAttribute("href"), support.opacity = /^0.5/.test(a.style.opacity), support.cssFloat = !! a.style.cssFloat, support.checkOn = !! input.value, support.optSelected = opt.selected, support.enctype = !! document.createElement("form").enctype, support.html5Clone = "<:nav></:nav>" !== document.createElement("nav").cloneNode(!0).outerHTML, support.inlineBlockNeedsLayout = !1, support.shrinkWrapBlocks = !1, support.pixelPosition = !1, support.deleteExpando = !0, support.noCloneEvent = !0, support.reliableMarginRight = !0, support.boxSizingReliable = !0, input.checked = !0, support.noCloneChecked = input.cloneNode(!0).checked, select.disabled = !0, support.optDisabled = !opt.disabled;
        try {
            delete div.test
        } catch (e) {
            support.deleteExpando = !1
        }
        input = document.createElement("input"), input.setAttribute("value", ""), support.input = "" === input.getAttribute("value"), input.value = "t", input.setAttribute("type", "radio"), support.radioValue = "t" === input.value, input.setAttribute("checked", "t"), input.setAttribute("name", "t"), fragment = document.createDocumentFragment(), fragment.appendChild(input), support.appendChecked = input.checked, support.checkClone = fragment.cloneNode(!0).cloneNode(!0).lastChild.checked, div.attachEvent && (div.attachEvent("onclick", function () {
            support.noCloneEvent = !1
        }), div.cloneNode(!0).click());
        for (i in {
            submit: !0,
            change: !0,
            focusin: !0
        }) div.setAttribute(eventName = "on" + i, "t"), support[i + "Bubbles"] = eventName in window || div.attributes[eventName].expando === !1;
        div.style.backgroundClip = "content-box", div.cloneNode(!0).style.backgroundClip = "", support.clearCloneStyle = "content-box" === div.style.backgroundClip;
        for (i in jQuery(support)) break;
        return support.ownLast = "0" !== i, jQuery(function () {
            var container, marginDiv, tds, divReset = "padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
                body = document.getElementsByTagName("body")[0];
            body && (container = document.createElement("div"), container.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", body.appendChild(container).appendChild(div), div.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", tds = div.getElementsByTagName("td"), tds[0].style.cssText = "padding:0;margin:0;border:0;display:none", isSupported = 0 === tds[0].offsetHeight, tds[0].style.display = "", tds[1].style.display = "none", support.reliableHiddenOffsets = isSupported && 0 === tds[0].offsetHeight, div.innerHTML = "", div.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", jQuery.swap(body, null != body.style.zoom ? {
                zoom: 1
            } : {}, function () {
                support.boxSizing = 4 === div.offsetWidth
            }), window.getComputedStyle && (support.pixelPosition = "1%" !== (window.getComputedStyle(div, null) || {}).top, support.boxSizingReliable = "4px" === (window.getComputedStyle(div, null) || {
                width: "4px"
            }).width, marginDiv = div.appendChild(document.createElement("div")), marginDiv.style.cssText = div.style.cssText = divReset, marginDiv.style.marginRight = marginDiv.style.width = "0", div.style.width = "1px", support.reliableMarginRight = !parseFloat((window.getComputedStyle(marginDiv, null) || {}).marginRight)), typeof div.style.zoom !== core_strundefined && (div.innerHTML = "", div.style.cssText = divReset + "width:1px;padding:1px;display:inline;zoom:1", support.inlineBlockNeedsLayout = 3 === div.offsetWidth, div.style.display = "block", div.innerHTML = "<div></div>", div.firstChild.style.width = "5px", support.shrinkWrapBlocks = 3 !== div.offsetWidth, support.inlineBlockNeedsLayout && (body.style.zoom = 1)), body.removeChild(container), container = div = tds = marginDiv = null)
        }), all = select = fragment = opt = a = input = null, support
    }({});
    var rbrace = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        rmultiDash = /([A-Z])/g;
    jQuery.extend({
        cache: {},
        noData: {
            applet: !0,
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        },
        hasData: function (elem) {
            return elem = elem.nodeType ? jQuery.cache[elem[jQuery.expando]] : elem[jQuery.expando], !! elem && !isEmptyDataObject(elem)
        },
        data: function (elem, name, data) {
            return internalData(elem, name, data)
        },
        removeData: function (elem, name) {
            return internalRemoveData(elem, name)
        },
        _data: function (elem, name, data) {
            return internalData(elem, name, data, !0)
        },
        _removeData: function (elem, name) {
            return internalRemoveData(elem, name, !0)
        },
        acceptData: function (elem) {
            if (elem.nodeType && 1 !== elem.nodeType && 9 !== elem.nodeType) return !1;
            var noData = elem.nodeName && jQuery.noData[elem.nodeName.toLowerCase()];
            return !noData || noData !== !0 && elem.getAttribute("classid") === noData
        }
    }), jQuery.fn.extend({
        data: function (key, value) {
            var attrs, name, data = null,
                i = 0,
                elem = this[0];
            if (key === undefined) {
                if (this.length && (data = jQuery.data(elem), 1 === elem.nodeType && !jQuery._data(elem, "parsedAttrs"))) {
                    for (attrs = elem.attributes; i < attrs.length; i++) name = attrs[i].name, 0 === name.indexOf("data-") && (name = jQuery.camelCase(name.slice(5)), dataAttr(elem, name, data[name]));
                    jQuery._data(elem, "parsedAttrs", !0)
                }
                return data
            }
            return "object" == typeof key ? this.each(function () {
                jQuery.data(this, key)
            }) : arguments.length > 1 ? this.each(function () {
                jQuery.data(this, key, value)
            }) : elem ? dataAttr(elem, key, jQuery.data(elem, key)) : null
        },
        removeData: function (key) {
            return this.each(function () {
                jQuery.removeData(this, key)
            })
        }
    }), jQuery.extend({
        queue: function (elem, type, data) {
            var queue;
            return elem ? (type = (type || "fx") + "queue", queue = jQuery._data(elem, type), data && (!queue || jQuery.isArray(data) ? queue = jQuery._data(elem, type, jQuery.makeArray(data)) : queue.push(data)), queue || []) : void 0
        },
        dequeue: function (elem, type) {
            type = type || "fx";
            var queue = jQuery.queue(elem, type),
                startLength = queue.length,
                fn = queue.shift(),
                hooks = jQuery._queueHooks(elem, type),
                next = function () {
                    jQuery.dequeue(elem, type)
                };
            "inprogress" === fn && (fn = queue.shift(), startLength--), fn && ("fx" === type && queue.unshift("inprogress"), delete hooks.stop, fn.call(elem, next, hooks)), !startLength && hooks && hooks.empty.fire()
        },
        _queueHooks: function (elem, type) {
            var key = type + "queueHooks";
            return jQuery._data(elem, key) || jQuery._data(elem, key, {
                empty: jQuery.Callbacks("once memory").add(function () {
                    jQuery._removeData(elem, type + "queue"), jQuery._removeData(elem, key)
                })
            })
        }
    }), jQuery.fn.extend({
        queue: function (type, data) {
            var setter = 2;
            return "string" != typeof type && (data = type, type = "fx", setter--), arguments.length < setter ? jQuery.queue(this[0], type) : data === undefined ? this : this.each(function () {
                var queue = jQuery.queue(this, type, data);
                jQuery._queueHooks(this, type), "fx" === type && "inprogress" !== queue[0] && jQuery.dequeue(this, type)
            })
        },
        dequeue: function (type) {
            return this.each(function () {
                jQuery.dequeue(this, type)
            })
        },
        delay: function (time, type) {
            return time = jQuery.fx ? jQuery.fx.speeds[time] || time : time, type = type || "fx", this.queue(type, function (next, hooks) {
                var timeout = setTimeout(next, time);
                hooks.stop = function () {
                    clearTimeout(timeout)
                }
            })
        },
        clearQueue: function (type) {
            return this.queue(type || "fx", [])
        },
        promise: function (type, obj) {
            var tmp, count = 1,
                defer = jQuery.Deferred(),
                elements = this,
                i = this.length,
                resolve = function () {
                    --count || defer.resolveWith(elements, [elements])
                };
            for ("string" != typeof type && (obj = type, type = undefined), type = type || "fx"; i--;) tmp = jQuery._data(elements[i], type + "queueHooks"), tmp && tmp.empty && (count++, tmp.empty.add(resolve));
            return resolve(), defer.promise(obj)
        }
    });
    var nodeHook, boolHook, rclass = /[\t\r\n\f]/g,
        rreturn = /\r/g,
        rfocusable = /^(?:input|select|textarea|button|object)$/i,
        rclickable = /^(?:a|area)$/i,
        ruseDefault = /^(?:checked|selected)$/i,
        getSetAttribute = jQuery.support.getSetAttribute,
        getSetInput = jQuery.support.input;
    jQuery.fn.extend({
        attr: function (name, value) {
            return jQuery.access(this, jQuery.attr, name, value, arguments.length > 1)
        },
        removeAttr: function (name) {
            return this.each(function () {
                jQuery.removeAttr(this, name)
            })
        },
        prop: function (name, value) {
            return jQuery.access(this, jQuery.prop, name, value, arguments.length > 1)
        },
        removeProp: function (name) {
            return name = jQuery.propFix[name] || name, this.each(function () {
                try {
                    this[name] = undefined, delete this[name]
                } catch (e) {}
            })
        },
        addClass: function (value) {
            var classes, elem, cur, clazz, j, i = 0,
                len = this.length,
                proceed = "string" == typeof value && value;
            if (jQuery.isFunction(value)) return this.each(function (j) {
                jQuery(this).addClass(value.call(this, j, this.className))
            });
            if (proceed)
                for (classes = (value || "").match(core_rnotwhite) || []; len > i; i++)
                    if (elem = this[i], cur = 1 === elem.nodeType && (elem.className ? (" " + elem.className + " ").replace(rclass, " ") : " ")) {
                        for (j = 0; clazz = classes[j++];) cur.indexOf(" " + clazz + " ") < 0 && (cur += clazz + " ");
                        elem.className = jQuery.trim(cur)
                    }
            return this
        },
        removeClass: function (value) {
            var classes, elem, cur, clazz, j, i = 0,
                len = this.length,
                proceed = 0 === arguments.length || "string" == typeof value && value;
            if (jQuery.isFunction(value)) return this.each(function (j) {
                jQuery(this).removeClass(value.call(this, j, this.className))
            });
            if (proceed)
                for (classes = (value || "").match(core_rnotwhite) || []; len > i; i++)
                    if (elem = this[i], cur = 1 === elem.nodeType && (elem.className ? (" " + elem.className + " ").replace(rclass, " ") : "")) {
                        for (j = 0; clazz = classes[j++];)
                            for (; cur.indexOf(" " + clazz + " ") >= 0;) cur = cur.replace(" " + clazz + " ", " ");
                        elem.className = value ? jQuery.trim(cur) : ""
                    }
            return this
        },
        toggleClass: function (value, stateVal) {
            var type = typeof value,
                isBool = "boolean" == typeof stateVal;
            return this.each(jQuery.isFunction(value) ? function (i) {
                jQuery(this).toggleClass(value.call(this, i, this.className, stateVal), stateVal)
            } : function () {
                if ("string" === type)
                    for (var className, i = 0, self = jQuery(this), state = stateVal, classNames = value.match(core_rnotwhite) || []; className = classNames[i++];) state = isBool ? state : !self.hasClass(className), self[state ? "addClass" : "removeClass"](className);
                else(type === core_strundefined || "boolean" === type) && (this.className && jQuery._data(this, "__className__", this.className), this.className = this.className || value === !1 ? "" : jQuery._data(this, "__className__") || "")
            })
        },
        hasClass: function (selector) {
            for (var className = " " + selector + " ", i = 0, l = this.length; l > i; i++)
                if (1 === this[i].nodeType && (" " + this[i].className + " ").replace(rclass, " ").indexOf(className) >= 0) return !0;
            return !1
        },
        val: function (value) {
            var ret, hooks, isFunction, elem = this[0]; {
                if (arguments.length) return isFunction = jQuery.isFunction(value), this.each(function (i) {
                    var val;
                    1 === this.nodeType && (val = isFunction ? value.call(this, i, jQuery(this).val()) : value, null == val ? val = "" : "number" == typeof val ? val += "" : jQuery.isArray(val) && (val = jQuery.map(val, function (value) {
                        return null == value ? "" : value + ""
                    })), hooks = jQuery.valHooks[this.type] || jQuery.valHooks[this.nodeName.toLowerCase()], hooks && "set" in hooks && hooks.set(this, val, "value") !== undefined || (this.value = val))
                });
                if (elem) return hooks = jQuery.valHooks[elem.type] || jQuery.valHooks[elem.nodeName.toLowerCase()], hooks && "get" in hooks && (ret = hooks.get(elem, "value")) !== undefined ? ret : (ret = elem.value, "string" == typeof ret ? ret.replace(rreturn, "") : null == ret ? "" : ret)
            }
        }
    }), jQuery.extend({
        valHooks: {
            option: {
                get: function (elem) {
                    var val = jQuery.find.attr(elem, "value");
                    return null != val ? val : elem.text
                }
            },
            select: {
                get: function (elem) {
                    for (var value, option, options = elem.options, index = elem.selectedIndex, one = "select-one" === elem.type || 0 > index, values = one ? null : [], max = one ? index + 1 : options.length, i = 0 > index ? max : one ? index : 0; max > i; i++)
                        if (option = options[i], !(!option.selected && i !== index || (jQuery.support.optDisabled ? option.disabled : null !== option.getAttribute("disabled")) || option.parentNode.disabled && jQuery.nodeName(option.parentNode, "optgroup"))) {
                            if (value = jQuery(option).val(), one) return value;
                            values.push(value)
                        }
                    return values
                },
                set: function (elem, value) {
                    for (var optionSet, option, options = elem.options, values = jQuery.makeArray(value), i = options.length; i--;) option = options[i], (option.selected = jQuery.inArray(jQuery(option).val(), values) >= 0) && (optionSet = !0);
                    return optionSet || (elem.selectedIndex = -1), values
                }
            }
        },
        attr: function (elem, name, value) {
            var hooks, ret, nType = elem.nodeType;
            if (elem && 3 !== nType && 8 !== nType && 2 !== nType) return typeof elem.getAttribute === core_strundefined ? jQuery.prop(elem, name, value) : (1 === nType && jQuery.isXMLDoc(elem) || (name = name.toLowerCase(), hooks = jQuery.attrHooks[name] || (jQuery.expr.match.bool.test(name) ? boolHook : nodeHook)), value === undefined ? hooks && "get" in hooks && null !== (ret = hooks.get(elem, name)) ? ret : (ret = jQuery.find.attr(elem, name), null == ret ? undefined : ret) : null !== value ? hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== undefined ? ret : (elem.setAttribute(name, value + ""), value) : void jQuery.removeAttr(elem, name))
        },
        removeAttr: function (elem, value) {
            var name, propName, i = 0,
                attrNames = value && value.match(core_rnotwhite);
            if (attrNames && 1 === elem.nodeType)
                for (; name = attrNames[i++];) propName = jQuery.propFix[name] || name, jQuery.expr.match.bool.test(name) ? getSetInput && getSetAttribute || !ruseDefault.test(name) ? elem[propName] = !1 : elem[jQuery.camelCase("default-" + name)] = elem[propName] = !1 : jQuery.attr(elem, name, ""), elem.removeAttribute(getSetAttribute ? name : propName)
        },
        attrHooks: {
            type: {
                set: function (elem, value) {
                    if (!jQuery.support.radioValue && "radio" === value && jQuery.nodeName(elem, "input")) {
                        var val = elem.value;
                        return elem.setAttribute("type", value), val && (elem.value = val), value
                    }
                }
            }
        },
        propFix: {
            "for": "htmlFor",
            "class": "className"
        },
        prop: function (elem, name, value) {
            var ret, hooks, notxml, nType = elem.nodeType;
            if (elem && 3 !== nType && 8 !== nType && 2 !== nType) return notxml = 1 !== nType || !jQuery.isXMLDoc(elem), notxml && (name = jQuery.propFix[name] || name, hooks = jQuery.propHooks[name]), value !== undefined ? hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== undefined ? ret : elem[name] = value : hooks && "get" in hooks && null !== (ret = hooks.get(elem, name)) ? ret : elem[name]
        },
        propHooks: {
            tabIndex: {
                get: function (elem) {
                    var tabindex = jQuery.find.attr(elem, "tabindex");
                    return tabindex ? parseInt(tabindex, 10) : rfocusable.test(elem.nodeName) || rclickable.test(elem.nodeName) && elem.href ? 0 : -1
                }
            }
        }
    }), boolHook = {
        set: function (elem, value, name) {
            return value === !1 ? jQuery.removeAttr(elem, name) : getSetInput && getSetAttribute || !ruseDefault.test(name) ? elem.setAttribute(!getSetAttribute && jQuery.propFix[name] || name, name) : elem[jQuery.camelCase("default-" + name)] = elem[name] = !0, name
        }
    }, jQuery.each(jQuery.expr.match.bool.source.match(/\w+/g), function (i, name) {
        var getter = jQuery.expr.attrHandle[name] || jQuery.find.attr;
        jQuery.expr.attrHandle[name] = getSetInput && getSetAttribute || !ruseDefault.test(name) ? function (elem, name, isXML) {
            var fn = jQuery.expr.attrHandle[name],
                ret = isXML ? undefined : (jQuery.expr.attrHandle[name] = undefined) != getter(elem, name, isXML) ? name.toLowerCase() : null;
            return jQuery.expr.attrHandle[name] = fn, ret
        } : function (elem, name, isXML) {
            return isXML ? undefined : elem[jQuery.camelCase("default-" + name)] ? name.toLowerCase() : null
        }
    }), getSetInput && getSetAttribute || (jQuery.attrHooks.value = {
        set: function (elem, value, name) {
            return jQuery.nodeName(elem, "input") ? void(elem.defaultValue = value) : nodeHook && nodeHook.set(elem, value, name)
        }
    }), getSetAttribute || (nodeHook = {
        set: function (elem, value, name) {
            var ret = elem.getAttributeNode(name);
            return ret || elem.setAttributeNode(ret = elem.ownerDocument.createAttribute(name)), ret.value = value += "", "value" === name || value === elem.getAttribute(name) ? value : undefined
        }
    }, jQuery.expr.attrHandle.id = jQuery.expr.attrHandle.name = jQuery.expr.attrHandle.coords = function (elem, name, isXML) {
        var ret;
        return isXML ? undefined : (ret = elem.getAttributeNode(name)) && "" !== ret.value ? ret.value : null
    }, jQuery.valHooks.button = {
        get: function (elem, name) {
            var ret = elem.getAttributeNode(name);
            return ret && ret.specified ? ret.value : undefined
        },
        set: nodeHook.set
    }, jQuery.attrHooks.contenteditable = {
        set: function (elem, value, name) {
            nodeHook.set(elem, "" === value ? !1 : value, name)
        }
    }, jQuery.each(["width", "height"], function (i, name) {
        jQuery.attrHooks[name] = {
            set: function (elem, value) {
                return "" === value ? (elem.setAttribute(name, "auto"), value) : void 0
            }
        }
    })), jQuery.support.hrefNormalized || jQuery.each(["href", "src"], function (i, name) {
        jQuery.propHooks[name] = {
            get: function (elem) {
                return elem.getAttribute(name, 4)
            }
        }
    }), jQuery.support.style || (jQuery.attrHooks.style = {
        get: function (elem) {
            return elem.style.cssText || undefined
        },
        set: function (elem, value) {
            return elem.style.cssText = value + ""
        }
    }), jQuery.support.optSelected || (jQuery.propHooks.selected = {
        get: function (elem) {
            var parent = elem.parentNode;
            return parent && (parent.selectedIndex, parent.parentNode && parent.parentNode.selectedIndex), null
        }
    }), jQuery.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
        jQuery.propFix[this.toLowerCase()] = this
    }), jQuery.support.enctype || (jQuery.propFix.enctype = "encoding"), jQuery.each(["radio", "checkbox"], function () {
        jQuery.valHooks[this] = {
            set: function (elem, value) {
                return jQuery.isArray(value) ? elem.checked = jQuery.inArray(jQuery(elem).val(), value) >= 0 : void 0
            }
        }, jQuery.support.checkOn || (jQuery.valHooks[this].get = function (elem) {
            return null === elem.getAttribute("value") ? "on" : elem.value
        })
    });
    var rformElems = /^(?:input|select|textarea)$/i,
        rkeyEvent = /^key/,
        rmouseEvent = /^(?:mouse|contextmenu)|click/,
        rfocusMorph = /^(?:focusinfocus|focusoutblur)$/,
        rtypenamespace = /^([^.]*)(?:\.(.+)|)$/;
    jQuery.event = {
        global: {},
        add: function (elem, types, handler, data, selector) {
            var tmp, events, t, handleObjIn, special, eventHandle, handleObj, handlers, type, namespaces, origType, elemData = jQuery._data(elem);
            if (elemData) {
                for (handler.handler && (handleObjIn = handler, handler = handleObjIn.handler, selector = handleObjIn.selector), handler.guid || (handler.guid = jQuery.guid++), (events = elemData.events) || (events = elemData.events = {}), (eventHandle = elemData.handle) || (eventHandle = elemData.handle = function (e) {
                    return typeof jQuery === core_strundefined || e && jQuery.event.triggered === e.type ? undefined : jQuery.event.dispatch.apply(eventHandle.elem, arguments)
                }, eventHandle.elem = elem), types = (types || "").match(core_rnotwhite) || [""], t = types.length; t--;) tmp = rtypenamespace.exec(types[t]) || [], type = origType = tmp[1], namespaces = (tmp[2] || "").split(".").sort(), type && (special = jQuery.event.special[type] || {}, type = (selector ? special.delegateType : special.bindType) || type, special = jQuery.event.special[type] || {}, handleObj = jQuery.extend({
                    type: type,
                    origType: origType,
                    data: data,
                    handler: handler,
                    guid: handler.guid,
                    selector: selector,
                    needsContext: selector && jQuery.expr.match.needsContext.test(selector),
                    namespace: namespaces.join(".")
                }, handleObjIn), (handlers = events[type]) || (handlers = events[type] = [], handlers.delegateCount = 0, special.setup && special.setup.call(elem, data, namespaces, eventHandle) !== !1 || (elem.addEventListener ? elem.addEventListener(type, eventHandle, !1) : elem.attachEvent && elem.attachEvent("on" + type, eventHandle))), special.add && (special.add.call(elem, handleObj), handleObj.handler.guid || (handleObj.handler.guid = handler.guid)), selector ? handlers.splice(handlers.delegateCount++, 0, handleObj) : handlers.push(handleObj), jQuery.event.global[type] = !0);
                elem = null
            }
        },
        remove: function (elem, types, handler, selector, mappedTypes) {
            var j, handleObj, tmp, origCount, t, events, special, handlers, type, namespaces, origType, elemData = jQuery.hasData(elem) && jQuery._data(elem);
            if (elemData && (events = elemData.events)) {
                for (types = (types || "").match(core_rnotwhite) || [""], t = types.length; t--;)
                    if (tmp = rtypenamespace.exec(types[t]) || [], type = origType = tmp[1], namespaces = (tmp[2] || "").split(".").sort(), type) {
                        for (special = jQuery.event.special[type] || {}, type = (selector ? special.delegateType : special.bindType) || type, handlers = events[type] || [], tmp = tmp[2] && new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)"), origCount = j = handlers.length; j--;) handleObj = handlers[j], !mappedTypes && origType !== handleObj.origType || handler && handler.guid !== handleObj.guid || tmp && !tmp.test(handleObj.namespace) || selector && selector !== handleObj.selector && ("**" !== selector || !handleObj.selector) || (handlers.splice(j, 1), handleObj.selector && handlers.delegateCount--, special.remove && special.remove.call(elem, handleObj));
                        origCount && !handlers.length && (special.teardown && special.teardown.call(elem, namespaces, elemData.handle) !== !1 || jQuery.removeEvent(elem, type, elemData.handle), delete events[type])
                    } else
                        for (type in events) jQuery.event.remove(elem, type + types[t], handler, selector, !0);
                jQuery.isEmptyObject(events) && (delete elemData.handle, jQuery._removeData(elem, "events"))
            }
        },
        trigger: function (event, data, elem, onlyHandlers) {
            var handle, ontype, cur, bubbleType, special, tmp, i, eventPath = [elem || document],
                type = core_hasOwn.call(event, "type") ? event.type : event,
                namespaces = core_hasOwn.call(event, "namespace") ? event.namespace.split(".") : [];
            if (cur = tmp = elem = elem || document, 3 !== elem.nodeType && 8 !== elem.nodeType && !rfocusMorph.test(type + jQuery.event.triggered) && (type.indexOf(".") >= 0 && (namespaces = type.split("."), type = namespaces.shift(), namespaces.sort()), ontype = type.indexOf(":") < 0 && "on" + type, event = event[jQuery.expando] ? event : new jQuery.Event(type, "object" == typeof event && event), event.isTrigger = onlyHandlers ? 2 : 3, event.namespace = namespaces.join("."), event.namespace_re = event.namespace ? new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, event.result = undefined, event.target || (event.target = elem), data = null == data ? [event] : jQuery.makeArray(data, [event]), special = jQuery.event.special[type] || {}, onlyHandlers || !special.trigger || special.trigger.apply(elem, data) !== !1)) {
                if (!onlyHandlers && !special.noBubble && !jQuery.isWindow(elem)) {
                    for (bubbleType = special.delegateType || type, rfocusMorph.test(bubbleType + type) || (cur = cur.parentNode); cur; cur = cur.parentNode) eventPath.push(cur), tmp = cur;
                    tmp === (elem.ownerDocument || document) && eventPath.push(tmp.defaultView || tmp.parentWindow || window)
                }
                for (i = 0;
                    (cur = eventPath[i++]) && !event.isPropagationStopped();) event.type = i > 1 ? bubbleType : special.bindType || type, handle = (jQuery._data(cur, "events") || {})[event.type] && jQuery._data(cur, "handle"), handle && handle.apply(cur, data), handle = ontype && cur[ontype], handle && jQuery.acceptData(cur) && handle.apply && handle.apply(cur, data) === !1 && event.preventDefault();
                if (event.type = type, !onlyHandlers && !event.isDefaultPrevented() && (!special._default || special._default.apply(eventPath.pop(), data) === !1) && jQuery.acceptData(elem) && ontype && elem[type] && !jQuery.isWindow(elem)) {
                    tmp = elem[ontype], tmp && (elem[ontype] = null), jQuery.event.triggered = type;
                    try {
                        elem[type]()
                    } catch (e) {}
                    jQuery.event.triggered = undefined, tmp && (elem[ontype] = tmp)
                }
                return event.result
            }
        },
        dispatch: function (event) {
            event = jQuery.event.fix(event);
            var i, ret, handleObj, matched, j, handlerQueue = [],
                args = core_slice.call(arguments),
                handlers = (jQuery._data(this, "events") || {})[event.type] || [],
                special = jQuery.event.special[event.type] || {};
            if (args[0] = event, event.delegateTarget = this, !special.preDispatch || special.preDispatch.call(this, event) !== !1) {
                for (handlerQueue = jQuery.event.handlers.call(this, event, handlers), i = 0;
                    (matched = handlerQueue[i++]) && !event.isPropagationStopped();)
                    for (event.currentTarget = matched.elem, j = 0;
                        (handleObj = matched.handlers[j++]) && !event.isImmediatePropagationStopped();)(!event.namespace_re || event.namespace_re.test(handleObj.namespace)) && (event.handleObj = handleObj, event.data = handleObj.data, ret = ((jQuery.event.special[handleObj.origType] || {}).handle || handleObj.handler).apply(matched.elem, args), ret !== undefined && (event.result = ret) === !1 && (event.preventDefault(), event.stopPropagation()));
                return special.postDispatch && special.postDispatch.call(this, event), event.result
            }
        },
        handlers: function (event, handlers) {
            var sel, handleObj, matches, i, handlerQueue = [],
                delegateCount = handlers.delegateCount,
                cur = event.target;
            if (delegateCount && cur.nodeType && (!event.button || "click" !== event.type))
                for (; cur != this; cur = cur.parentNode || this)
                    if (1 === cur.nodeType && (cur.disabled !== !0 || "click" !== event.type)) {
                        for (matches = [], i = 0; delegateCount > i; i++) handleObj = handlers[i], sel = handleObj.selector + " ", matches[sel] === undefined && (matches[sel] = handleObj.needsContext ? jQuery(sel, this).index(cur) >= 0 : jQuery.find(sel, this, null, [cur]).length), matches[sel] && matches.push(handleObj);
                        matches.length && handlerQueue.push({
                            elem: cur,
                            handlers: matches
                        })
                    }
            return delegateCount < handlers.length && handlerQueue.push({
                elem: this,
                handlers: handlers.slice(delegateCount)
            }), handlerQueue
        },
        fix: function (event) {
            if (event[jQuery.expando]) return event;
            var i, prop, copy, type = event.type,
                originalEvent = event,
                fixHook = this.fixHooks[type];
            for (fixHook || (this.fixHooks[type] = fixHook = rmouseEvent.test(type) ? this.mouseHooks : rkeyEvent.test(type) ? this.keyHooks : {}), copy = fixHook.props ? this.props.concat(fixHook.props) : this.props, event = new jQuery.Event(originalEvent), i = copy.length; i--;) prop = copy[i], event[prop] = originalEvent[prop];
            return event.target || (event.target = originalEvent.srcElement || document), 3 === event.target.nodeType && (event.target = event.target.parentNode), event.metaKey = !! event.metaKey, fixHook.filter ? fixHook.filter(event, originalEvent) : event
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function (event, original) {
                return null == event.which && (event.which = null != original.charCode ? original.charCode : original.keyCode), event
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function (event, original) {
                var body, eventDoc, doc, button = original.button,
                    fromElement = original.fromElement;
                return null == event.pageX && null != original.clientX && (eventDoc = event.target.ownerDocument || document, doc = eventDoc.documentElement, body = eventDoc.body, event.pageX = original.clientX + (doc && doc.scrollLeft || body && body.scrollLeft || 0) - (doc && doc.clientLeft || body && body.clientLeft || 0), event.pageY = original.clientY + (doc && doc.scrollTop || body && body.scrollTop || 0) - (doc && doc.clientTop || body && body.clientTop || 0)), !event.relatedTarget && fromElement && (event.relatedTarget = fromElement === event.target ? original.toElement : fromElement), event.which || button === undefined || (event.which = 1 & button ? 1 : 2 & button ? 3 : 4 & button ? 2 : 0), event
            }
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function () {
                    if (this !== safeActiveElement() && this.focus) try {
                        return this.focus(), !1
                    } catch (e) {}
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function () {
                    return this === safeActiveElement() && this.blur ? (this.blur(), !1) : void 0
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function () {
                    return jQuery.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : void 0
                },
                _default: function (event) {
                    return jQuery.nodeName(event.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function (event) {
                    event.result !== undefined && (event.originalEvent.returnValue = event.result)
                }
            }
        },
        simulate: function (type, elem, event, bubble) {
            var e = jQuery.extend(new jQuery.Event, event, {
                type: type,
                isSimulated: !0,
                originalEvent: {}
            });
            bubble ? jQuery.event.trigger(e, null, elem) : jQuery.event.dispatch.call(elem, e), e.isDefaultPrevented() && event.preventDefault()
        }
    }, jQuery.removeEvent = document.removeEventListener ? function (elem, type, handle) {
        elem.removeEventListener && elem.removeEventListener(type, handle, !1)
    } : function (elem, type, handle) {
        var name = "on" + type;
        elem.detachEvent && (typeof elem[name] === core_strundefined && (elem[name] = null), elem.detachEvent(name, handle))
    }, jQuery.Event = function (src, props) {
        return this instanceof jQuery.Event ? (src && src.type ? (this.originalEvent = src, this.type = src.type, this.isDefaultPrevented = src.defaultPrevented || src.returnValue === !1 || src.getPreventDefault && src.getPreventDefault() ? returnTrue : returnFalse) : this.type = src, props && jQuery.extend(this, props), this.timeStamp = src && src.timeStamp || jQuery.now(), void(this[jQuery.expando] = !0)) : new jQuery.Event(src, props)
    }, jQuery.Event.prototype = {
        isDefaultPrevented: returnFalse,
        isPropagationStopped: returnFalse,
        isImmediatePropagationStopped: returnFalse,
        preventDefault: function () {
            var e = this.originalEvent;
            this.isDefaultPrevented = returnTrue, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
        },
        stopPropagation: function () {
            var e = this.originalEvent;
            this.isPropagationStopped = returnTrue, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
        },
        stopImmediatePropagation: function () {
            this.isImmediatePropagationStopped = returnTrue, this.stopPropagation()
        }
    }, jQuery.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function (orig, fix) {
        jQuery.event.special[orig] = {
            delegateType: fix,
            bindType: fix,
            handle: function (event) {
                var ret, target = this,
                    related = event.relatedTarget,
                    handleObj = event.handleObj;
                return (!related || related !== target && !jQuery.contains(target, related)) && (event.type = handleObj.origType, ret = handleObj.handler.apply(this, arguments), event.type = fix), ret
            }
        }
    }), jQuery.support.submitBubbles || (jQuery.event.special.submit = {
        setup: function () {
            return jQuery.nodeName(this, "form") ? !1 : void jQuery.event.add(this, "click._submit keypress._submit", function (e) {
                var elem = e.target,
                    form = jQuery.nodeName(elem, "input") || jQuery.nodeName(elem, "button") ? elem.form : undefined;
                form && !jQuery._data(form, "submitBubbles") && (jQuery.event.add(form, "submit._submit", function (event) {
                    event._submit_bubble = !0
                }), jQuery._data(form, "submitBubbles", !0))
            })
        },
        postDispatch: function (event) {
            event._submit_bubble && (delete event._submit_bubble, this.parentNode && !event.isTrigger && jQuery.event.simulate("submit", this.parentNode, event, !0))
        },
        teardown: function () {
            return jQuery.nodeName(this, "form") ? !1 : void jQuery.event.remove(this, "._submit")
        }
    }), jQuery.support.changeBubbles || (jQuery.event.special.change = {
        setup: function () {
            return rformElems.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (jQuery.event.add(this, "propertychange._change", function (event) {
                "checked" === event.originalEvent.propertyName && (this._just_changed = !0)
            }), jQuery.event.add(this, "click._change", function (event) {
                this._just_changed && !event.isTrigger && (this._just_changed = !1), jQuery.event.simulate("change", this, event, !0)
            })), !1) : void jQuery.event.add(this, "beforeactivate._change", function (e) {
                var elem = e.target;
                rformElems.test(elem.nodeName) && !jQuery._data(elem, "changeBubbles") && (jQuery.event.add(elem, "change._change", function (event) {
                    !this.parentNode || event.isSimulated || event.isTrigger || jQuery.event.simulate("change", this.parentNode, event, !0)
                }), jQuery._data(elem, "changeBubbles", !0))
            })
        },
        handle: function (event) {
            var elem = event.target;
            return this !== elem || event.isSimulated || event.isTrigger || "radio" !== elem.type && "checkbox" !== elem.type ? event.handleObj.handler.apply(this, arguments) : void 0
        },
        teardown: function () {
            return jQuery.event.remove(this, "._change"), !rformElems.test(this.nodeName)
        }
    }), jQuery.support.focusinBubbles || jQuery.each({
        focus: "focusin",
        blur: "focusout"
    }, function (orig, fix) {
        var attaches = 0,
            handler = function (event) {
                jQuery.event.simulate(fix, event.target, jQuery.event.fix(event), !0)
            };
        jQuery.event.special[fix] = {
            setup: function () {
                0 === attaches++ && document.addEventListener(orig, handler, !0)
            },
            teardown: function () {
                0 === --attaches && document.removeEventListener(orig, handler, !0)
            }
        }
    }), jQuery.fn.extend({
        on: function (types, selector, data, fn, one) {
            var type, origFn;
            if ("object" == typeof types) {
                "string" != typeof selector && (data = data || selector, selector = undefined);
                for (type in types) this.on(type, selector, data, types[type], one);
                return this
            }
            if (null == data && null == fn ? (fn = selector, data = selector = undefined) : null == fn && ("string" == typeof selector ? (fn = data, data = undefined) : (fn = data, data = selector, selector = undefined)), fn === !1) fn = returnFalse;
            else if (!fn) return this;
            return 1 === one && (origFn = fn, fn = function (event) {
                return jQuery().off(event), origFn.apply(this, arguments)
            }, fn.guid = origFn.guid || (origFn.guid = jQuery.guid++)), this.each(function () {
                jQuery.event.add(this, types, fn, data, selector)
            })
        },
        one: function (types, selector, data, fn) {
            return this.on(types, selector, data, fn, 1)
        },
        off: function (types, selector, fn) {
            var handleObj, type;
            if (types && types.preventDefault && types.handleObj) return handleObj = types.handleObj, jQuery(types.delegateTarget).off(handleObj.namespace ? handleObj.origType + "." + handleObj.namespace : handleObj.origType, handleObj.selector, handleObj.handler), this;
            if ("object" == typeof types) {
                for (type in types) this.off(type, selector, types[type]);
                return this
            }
            return (selector === !1 || "function" == typeof selector) && (fn = selector, selector = undefined), fn === !1 && (fn = returnFalse), this.each(function () {
                jQuery.event.remove(this, types, fn, selector)
            })
        },
        trigger: function (type, data) {
            return this.each(function () {
                jQuery.event.trigger(type, data, this)
            })
        },
        triggerHandler: function (type, data) {
            var elem = this[0];
            return elem ? jQuery.event.trigger(type, data, elem, !0) : void 0
        }
    });
    var isSimple = /^.[^:#\[\.,]*$/,
        rparentsprev = /^(?:parents|prev(?:Until|All))/,
        rneedsContext = jQuery.expr.match.needsContext,
        guaranteedUnique = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    jQuery.fn.extend({
        find: function (selector) {
            var i, ret = [],
                self = this,
                len = self.length;
            if ("string" != typeof selector) return this.pushStack(jQuery(selector).filter(function () {
                for (i = 0; len > i; i++)
                    if (jQuery.contains(self[i], this)) return !0
            }));
            for (i = 0; len > i; i++) jQuery.find(selector, self[i], ret);
            return ret = this.pushStack(len > 1 ? jQuery.unique(ret) : ret), ret.selector = this.selector ? this.selector + " " + selector : selector, ret
        },
        has: function (target) {
            var i, targets = jQuery(target, this),
                len = targets.length;
            return this.filter(function () {
                for (i = 0; len > i; i++)
                    if (jQuery.contains(this, targets[i])) return !0
            })
        },
        not: function (selector) {
            return this.pushStack(winnow(this, selector || [], !0))
        },
        filter: function (selector) {
            return this.pushStack(winnow(this, selector || [], !1))
        },
        is: function (selector) {
            return !!winnow(this, "string" == typeof selector && rneedsContext.test(selector) ? jQuery(selector) : selector || [], !1).length
        },
        closest: function (selectors, context) {
            for (var cur, i = 0, l = this.length, ret = [], pos = rneedsContext.test(selectors) || "string" != typeof selectors ? jQuery(selectors, context || this.context) : 0; l > i; i++)
                for (cur = this[i]; cur && cur !== context; cur = cur.parentNode)
                    if (cur.nodeType < 11 && (pos ? pos.index(cur) > -1 : 1 === cur.nodeType && jQuery.find.matchesSelector(cur, selectors))) {
                        cur = ret.push(cur);
                        break
                    }
            return this.pushStack(ret.length > 1 ? jQuery.unique(ret) : ret)
        },
        index: function (elem) {
            return elem ? "string" == typeof elem ? jQuery.inArray(this[0], jQuery(elem)) : jQuery.inArray(elem.jquery ? elem[0] : elem, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function (selector, context) {
            var set = "string" == typeof selector ? jQuery(selector, context) : jQuery.makeArray(selector && selector.nodeType ? [selector] : selector),
                all = jQuery.merge(this.get(), set);
            return this.pushStack(jQuery.unique(all))
        },
        addBack: function (selector) {
            return this.add(null == selector ? this.prevObject : this.prevObject.filter(selector))
        }
    }), jQuery.each({
        parent: function (elem) {
            var parent = elem.parentNode;
            return parent && 11 !== parent.nodeType ? parent : null
        },
        parents: function (elem) {
            return jQuery.dir(elem, "parentNode")
        },
        parentsUntil: function (elem, i, until) {
            return jQuery.dir(elem, "parentNode", until)
        },
        next: function (elem) {
            return sibling(elem, "nextSibling")
        },
        prev: function (elem) {
            return sibling(elem, "previousSibling")
        },
        nextAll: function (elem) {
            return jQuery.dir(elem, "nextSibling")
        },
        prevAll: function (elem) {
            return jQuery.dir(elem, "previousSibling")
        },
        nextUntil: function (elem, i, until) {
            return jQuery.dir(elem, "nextSibling", until)
        },
        prevUntil: function (elem, i, until) {
            return jQuery.dir(elem, "previousSibling", until)
        },
        siblings: function (elem) {
            return jQuery.sibling((elem.parentNode || {}).firstChild, elem)
        },
        children: function (elem) {
            return jQuery.sibling(elem.firstChild)
        },
        contents: function (elem) {
            return jQuery.nodeName(elem, "iframe") ? elem.contentDocument || elem.contentWindow.document : jQuery.merge([], elem.childNodes)
        }
    }, function (name, fn) {
        jQuery.fn[name] = function (until, selector) {
            var ret = jQuery.map(this, fn, until);
            return "Until" !== name.slice(-5) && (selector = until), selector && "string" == typeof selector && (ret = jQuery.filter(selector, ret)), this.length > 1 && (guaranteedUnique[name] || (ret = jQuery.unique(ret)), rparentsprev.test(name) && (ret = ret.reverse())), this.pushStack(ret)
        }
    }), jQuery.extend({
        filter: function (expr, elems, not) {
            var elem = elems[0];
            return not && (expr = ":not(" + expr + ")"), 1 === elems.length && 1 === elem.nodeType ? jQuery.find.matchesSelector(elem, expr) ? [elem] : [] : jQuery.find.matches(expr, jQuery.grep(elems, function (elem) {
                return 1 === elem.nodeType
            }))
        },
        dir: function (elem, dir, until) {
            for (var matched = [], cur = elem[dir]; cur && 9 !== cur.nodeType && (until === undefined || 1 !== cur.nodeType || !jQuery(cur).is(until));) 1 === cur.nodeType && matched.push(cur), cur = cur[dir];
            return matched
        },
        sibling: function (n, elem) {
            for (var r = []; n; n = n.nextSibling) 1 === n.nodeType && n !== elem && r.push(n);
            return r
        }
    });
    var nodeNames = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        rinlinejQuery = / jQuery\d+="(?:null|\d+)"/g,
        rnoshimcache = new RegExp("<(?:" + nodeNames + ")[\\s/>]", "i"),
        rleadingWhitespace = /^\s+/,
        rxhtmlTag = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        rtagName = /<([\w:]+)/,
        rtbody = /<tbody/i,
        rhtml = /<|&#?\w+;/,
        rnoInnerhtml = /<(?:script|style|link)/i,
        manipulation_rcheckableType = /^(?:checkbox|radio)$/i,
        rchecked = /checked\s*(?:[^=]|=\s*.checked.)/i,
        rscriptType = /^$|\/(?:java|ecma)script/i,
        rscriptTypeMasked = /^true\/(.*)/,
        rcleanScript = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        wrapMap = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            area: [1, "<map>", "</map>"],
            param: [1, "<object>", "</object>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: jQuery.support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
        }, safeFragment = createSafeFragment(document),
        fragmentDiv = safeFragment.appendChild(document.createElement("div"));
    wrapMap.optgroup = wrapMap.option, wrapMap.tbody = wrapMap.tfoot = wrapMap.colgroup = wrapMap.caption = wrapMap.thead, wrapMap.th = wrapMap.td, jQuery.fn.extend({
        text: function (value) {
            return jQuery.access(this, function (value) {
                return value === undefined ? jQuery.text(this) : this.empty().append((this[0] && this[0].ownerDocument || document).createTextNode(value))
            }, null, value, arguments.length)
        },
        append: function () {
            return this.domManip(arguments, function (elem) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var target = manipulationTarget(this, elem);
                    target.appendChild(elem)
                }
            })
        },
        prepend: function () {
            return this.domManip(arguments, function (elem) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var target = manipulationTarget(this, elem);
                    target.insertBefore(elem, target.firstChild)
                }
            })
        },
        before: function () {
            return this.domManip(arguments, function (elem) {
                this.parentNode && this.parentNode.insertBefore(elem, this)
            })
        },
        after: function () {
            return this.domManip(arguments, function (elem) {
                this.parentNode && this.parentNode.insertBefore(elem, this.nextSibling)
            })
        },
        remove: function (selector, keepData) {
            for (var elem, elems = selector ? jQuery.filter(selector, this) : this, i = 0; null != (elem = elems[i]); i++) keepData || 1 !== elem.nodeType || jQuery.cleanData(getAll(elem)), elem.parentNode && (keepData && jQuery.contains(elem.ownerDocument, elem) && setGlobalEval(getAll(elem, "script")), elem.parentNode.removeChild(elem));
            return this
        },
        empty: function () {
            for (var elem, i = 0; null != (elem = this[i]); i++) {
                for (1 === elem.nodeType && jQuery.cleanData(getAll(elem, !1)); elem.firstChild;) elem.removeChild(elem.firstChild);
                elem.options && jQuery.nodeName(elem, "select") && (elem.options.length = 0)
            }
            return this
        },
        clone: function (dataAndEvents, deepDataAndEvents) {
            return dataAndEvents = null == dataAndEvents ? !1 : dataAndEvents, deepDataAndEvents = null == deepDataAndEvents ? dataAndEvents : deepDataAndEvents, this.map(function () {
                return jQuery.clone(this, dataAndEvents, deepDataAndEvents)
            })
        },
        html: function (value) {
            return jQuery.access(this, function (value) {
                var elem = this[0] || {}, i = 0,
                    l = this.length;
                if (value === undefined) return 1 === elem.nodeType ? elem.innerHTML.replace(rinlinejQuery, "") : undefined;
                if (!("string" != typeof value || rnoInnerhtml.test(value) || !jQuery.support.htmlSerialize && rnoshimcache.test(value) || !jQuery.support.leadingWhitespace && rleadingWhitespace.test(value) || wrapMap[(rtagName.exec(value) || ["", ""])[1].toLowerCase()])) {
                    value = value.replace(rxhtmlTag, "<$1></$2>");
                    try {
                        for (; l > i; i++) elem = this[i] || {}, 1 === elem.nodeType && (jQuery.cleanData(getAll(elem, !1)), elem.innerHTML = value);
                        elem = 0
                    } catch (e) {}
                }
                elem && this.empty().append(value)
            }, null, value, arguments.length)
        },
        replaceWith: function () {
            var args = jQuery.map(this, function (elem) {
                return [elem.nextSibling, elem.parentNode]
            }),
                i = 0;
            return this.domManip(arguments, function (elem) {
                var next = args[i++],
                    parent = args[i++];
                parent && (next && next.parentNode !== parent && (next = this.nextSibling), jQuery(this).remove(), parent.insertBefore(elem, next))
            }, !0), i ? this : this.remove()
        },
        detach: function (selector) {
            return this.remove(selector, !0)
        },
        domManip: function (args, callback, allowIntersection) {
            args = core_concat.apply([], args);
            var first, node, hasScripts, scripts, doc, fragment, i = 0,
                l = this.length,
                set = this,
                iNoClone = l - 1,
                value = args[0],
                isFunction = jQuery.isFunction(value);
            if (isFunction || !(1 >= l || "string" != typeof value || jQuery.support.checkClone) && rchecked.test(value)) return this.each(function (index) {
                var self = set.eq(index);
                isFunction && (args[0] = value.call(this, index, self.html())), self.domManip(args, callback, allowIntersection)
            });
            if (l && (fragment = jQuery.buildFragment(args, this[0].ownerDocument, !1, !allowIntersection && this), first = fragment.firstChild, 1 === fragment.childNodes.length && (fragment = first), first)) {
                for (scripts = jQuery.map(getAll(fragment, "script"), disableScript), hasScripts = scripts.length; l > i; i++) node = fragment, i !== iNoClone && (node = jQuery.clone(node, !0, !0), hasScripts && jQuery.merge(scripts, getAll(node, "script"))), callback.call(this[i], node, i);
                if (hasScripts)
                    for (doc = scripts[scripts.length - 1].ownerDocument, jQuery.map(scripts, restoreScript), i = 0; hasScripts > i; i++) node = scripts[i], rscriptType.test(node.type || "") && !jQuery._data(node, "globalEval") && jQuery.contains(doc, node) && (node.src ? jQuery._evalUrl(node.src) : jQuery.globalEval((node.text || node.textContent || node.innerHTML || "").replace(rcleanScript, "")));
                fragment = first = null
            }
            return this
        }
    }), jQuery.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (name, original) {
        jQuery.fn[name] = function (selector) {
            for (var elems, i = 0, ret = [], insert = jQuery(selector), last = insert.length - 1; last >= i; i++) elems = i === last ? this : this.clone(!0), jQuery(insert[i])[original](elems), core_push.apply(ret, elems.get());
            return this.pushStack(ret)
        }
    }), jQuery.extend({
        clone: function (elem, dataAndEvents, deepDataAndEvents) {
            var destElements, node, clone, i, srcElements, inPage = jQuery.contains(elem.ownerDocument, elem);
            if (jQuery.support.html5Clone || jQuery.isXMLDoc(elem) || !rnoshimcache.test("<" + elem.nodeName + ">") ? clone = elem.cloneNode(!0) : (fragmentDiv.innerHTML = elem.outerHTML, fragmentDiv.removeChild(clone = fragmentDiv.firstChild)), !(jQuery.support.noCloneEvent && jQuery.support.noCloneChecked || 1 !== elem.nodeType && 11 !== elem.nodeType || jQuery.isXMLDoc(elem)))
                for (destElements = getAll(clone), srcElements = getAll(elem), i = 0; null != (node = srcElements[i]); ++i) destElements[i] && fixCloneNodeIssues(node, destElements[i]);
            if (dataAndEvents)
                if (deepDataAndEvents)
                    for (srcElements = srcElements || getAll(elem), destElements = destElements || getAll(clone), i = 0; null != (node = srcElements[i]); i++) cloneCopyEvent(node, destElements[i]);
                else cloneCopyEvent(elem, clone);
            return destElements = getAll(clone, "script"), destElements.length > 0 && setGlobalEval(destElements, !inPage && getAll(elem, "script")), destElements = srcElements = node = null, clone
        },
        buildFragment: function (elems, context, scripts, selection) {
            for (var j, elem, contains, tmp, tag, tbody, wrap, l = elems.length, safe = createSafeFragment(context), nodes = [], i = 0; l > i; i++)
                if (elem = elems[i], elem || 0 === elem)
                    if ("object" === jQuery.type(elem)) jQuery.merge(nodes, elem.nodeType ? [elem] : elem);
                    else if (rhtml.test(elem)) {
                for (tmp = tmp || safe.appendChild(context.createElement("div")), tag = (rtagName.exec(elem) || ["", ""])[1].toLowerCase(), wrap = wrapMap[tag] || wrapMap._default, tmp.innerHTML = wrap[1] + elem.replace(rxhtmlTag, "<$1></$2>") + wrap[2], j = wrap[0]; j--;) tmp = tmp.lastChild;
                if (!jQuery.support.leadingWhitespace && rleadingWhitespace.test(elem) && nodes.push(context.createTextNode(rleadingWhitespace.exec(elem)[0])), !jQuery.support.tbody)
                    for (elem = "table" !== tag || rtbody.test(elem) ? "<table>" !== wrap[1] || rtbody.test(elem) ? 0 : tmp : tmp.firstChild, j = elem && elem.childNodes.length; j--;) jQuery.nodeName(tbody = elem.childNodes[j], "tbody") && !tbody.childNodes.length && elem.removeChild(tbody);
                for (jQuery.merge(nodes, tmp.childNodes), tmp.textContent = ""; tmp.firstChild;) tmp.removeChild(tmp.firstChild);
                tmp = safe.lastChild
            } else nodes.push(context.createTextNode(elem));
            for (tmp && safe.removeChild(tmp), jQuery.support.appendChecked || jQuery.grep(getAll(nodes, "input"), fixDefaultChecked), i = 0; elem = nodes[i++];)
                if ((!selection || -1 === jQuery.inArray(elem, selection)) && (contains = jQuery.contains(elem.ownerDocument, elem), tmp = getAll(safe.appendChild(elem), "script"), contains && setGlobalEval(tmp), scripts))
                    for (j = 0; elem = tmp[j++];) rscriptType.test(elem.type || "") && scripts.push(elem);
            return tmp = null, safe
        },
        cleanData: function (elems, acceptData) {
            for (var elem, type, id, data, i = 0, internalKey = jQuery.expando, cache = jQuery.cache, deleteExpando = jQuery.support.deleteExpando, special = jQuery.event.special; null != (elem = elems[i]); i++)
                if ((acceptData || jQuery.acceptData(elem)) && (id = elem[internalKey], data = id && cache[id])) {
                    if (data.events)
                        for (type in data.events) special[type] ? jQuery.event.remove(elem, type) : jQuery.removeEvent(elem, type, data.handle);
                    cache[id] && (delete cache[id], deleteExpando ? delete elem[internalKey] : typeof elem.removeAttribute !== core_strundefined ? elem.removeAttribute(internalKey) : elem[internalKey] = null, core_deletedIds.push(id))
                }
        },
        _evalUrl: function (url) {
            return jQuery.ajax({
                url: url,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                "throws": !0
            })
        }
    }), jQuery.fn.extend({
        wrapAll: function (html) {
            if (jQuery.isFunction(html)) return this.each(function (i) {
                jQuery(this).wrapAll(html.call(this, i))
            });
            if (this[0]) {
                var wrap = jQuery(html, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && wrap.insertBefore(this[0]), wrap.map(function () {
                    for (var elem = this; elem.firstChild && 1 === elem.firstChild.nodeType;) elem = elem.firstChild;
                    return elem
                }).append(this)
            }
            return this
        },
        wrapInner: function (html) {
            return this.each(jQuery.isFunction(html) ? function (i) {
                jQuery(this).wrapInner(html.call(this, i))
            } : function () {
                var self = jQuery(this),
                    contents = self.contents();
                contents.length ? contents.wrapAll(html) : self.append(html)
            })
        },
        wrap: function (html) {
            var isFunction = jQuery.isFunction(html);
            return this.each(function (i) {
                jQuery(this).wrapAll(isFunction ? html.call(this, i) : html)
            })
        },
        unwrap: function () {
            return this.parent().each(function () {
                jQuery.nodeName(this, "body") || jQuery(this).replaceWith(this.childNodes)
            }).end()
        }
    });
    var iframe, getStyles, curCSS, ralpha = /alpha\([^)]*\)/i,
        ropacity = /opacity\s*=\s*([^)]*)/,
        rposition = /^(top|right|bottom|left)$/,
        rdisplayswap = /^(none|table(?!-c[ea]).+)/,
        rmargin = /^margin/,
        rnumsplit = new RegExp("^(" + core_pnum + ")(.*)$", "i"),
        rnumnonpx = new RegExp("^(" + core_pnum + ")(?!px)[a-z%]+$", "i"),
        rrelNum = new RegExp("^([+-])=(" + core_pnum + ")", "i"),
        elemdisplay = {
            BODY: "block"
        }, cssShow = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        }, cssNormalTransform = {
            letterSpacing: 0,
            fontWeight: 400
        }, cssExpand = ["Top", "Right", "Bottom", "Left"],
        cssPrefixes = ["Webkit", "O", "Moz", "ms"];
    jQuery.fn.extend({
        css: function (name, value) {
            return jQuery.access(this, function (elem, name, value) {
                var len, styles, map = {}, i = 0;
                if (jQuery.isArray(name)) {
                    for (styles = getStyles(elem), len = name.length; len > i; i++) map[name[i]] = jQuery.css(elem, name[i], !1, styles);
                    return map
                }
                return value !== undefined ? jQuery.style(elem, name, value) : jQuery.css(elem, name)
            }, name, value, arguments.length > 1)
        },
        show: function () {
            return showHide(this, !0)
        },
        hide: function () {
            return showHide(this)
        },
        toggle: function (state) {
            var bool = "boolean" == typeof state;
            return this.each(function () {
                (bool ? state : isHidden(this)) ? jQuery(this).show() : jQuery(this).hide()
            })
        }
    }), jQuery.extend({
        cssHooks: {
            opacity: {
                get: function (elem, computed) {
                    if (computed) {
                        var ret = curCSS(elem, "opacity");
                        return "" === ret ? "1" : ret
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": jQuery.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function (elem, name, value, extra) {
            if (elem && 3 !== elem.nodeType && 8 !== elem.nodeType && elem.style) {
                var ret, type, hooks, origName = jQuery.camelCase(name),
                    style = elem.style;
                if (name = jQuery.cssProps[origName] || (jQuery.cssProps[origName] = vendorPropName(style, origName)), hooks = jQuery.cssHooks[name] || jQuery.cssHooks[origName], value === undefined) return hooks && "get" in hooks && (ret = hooks.get(elem, !1, extra)) !== undefined ? ret : style[name];
                if (type = typeof value, "string" === type && (ret = rrelNum.exec(value)) && (value = (ret[1] + 1) * ret[2] + parseFloat(jQuery.css(elem, name)), type = "number"), !(null == value || "number" === type && isNaN(value) || ("number" !== type || jQuery.cssNumber[origName] || (value += "px"), jQuery.support.clearCloneStyle || "" !== value || 0 !== name.indexOf("background") || (style[name] = "inherit"), hooks && "set" in hooks && (value = hooks.set(elem, value, extra)) === undefined))) try {
                    style[name] = value
                } catch (e) {}
            }
        },
        css: function (elem, name, extra, styles) {
            var num, val, hooks, origName = jQuery.camelCase(name);
            return name = jQuery.cssProps[origName] || (jQuery.cssProps[origName] = vendorPropName(elem.style, origName)), hooks = jQuery.cssHooks[name] || jQuery.cssHooks[origName], hooks && "get" in hooks && (val = hooks.get(elem, !0, extra)), val === undefined && (val = curCSS(elem, name, styles)), "normal" === val && name in cssNormalTransform && (val = cssNormalTransform[name]), "" === extra || extra ? (num = parseFloat(val), extra === !0 || jQuery.isNumeric(num) ? num || 0 : val) : val
        }
    }), window.getComputedStyle ? (getStyles = function (elem) {
        return window.getComputedStyle(elem, null)
    }, curCSS = function (elem, name, _computed) {
        var width, minWidth, maxWidth, computed = _computed || getStyles(elem),
            ret = computed ? computed.getPropertyValue(name) || computed[name] : undefined,
            style = elem.style;
        return computed && ("" !== ret || jQuery.contains(elem.ownerDocument, elem) || (ret = jQuery.style(elem, name)), rnumnonpx.test(ret) && rmargin.test(name) && (width = style.width, minWidth = style.minWidth, maxWidth = style.maxWidth, style.minWidth = style.maxWidth = style.width = ret, ret = computed.width, style.width = width, style.minWidth = minWidth, style.maxWidth = maxWidth)), ret
    }) : document.documentElement.currentStyle && (getStyles = function (elem) {
        return elem.currentStyle
    }, curCSS = function (elem, name, _computed) {
        var left, rs, rsLeft, computed = _computed || getStyles(elem),
            ret = computed ? computed[name] : undefined,
            style = elem.style;
        return null == ret && style && style[name] && (ret = style[name]), rnumnonpx.test(ret) && !rposition.test(name) && (left = style.left, rs = elem.runtimeStyle, rsLeft = rs && rs.left, rsLeft && (rs.left = elem.currentStyle.left), style.left = "fontSize" === name ? "1em" : ret, ret = style.pixelLeft + "px", style.left = left, rsLeft && (rs.left = rsLeft)), "" === ret ? "auto" : ret
    }), jQuery.each(["height", "width"], function (i, name) {
        jQuery.cssHooks[name] = {
            get: function (elem, computed, extra) {
                return computed ? 0 === elem.offsetWidth && rdisplayswap.test(jQuery.css(elem, "display")) ? jQuery.swap(elem, cssShow, function () {
                    return getWidthOrHeight(elem, name, extra)
                }) : getWidthOrHeight(elem, name, extra) : void 0
            },
            set: function (elem, value, extra) {
                var styles = extra && getStyles(elem);
                return setPositiveNumber(elem, value, extra ? augmentWidthOrHeight(elem, name, extra, jQuery.support.boxSizing && "border-box" === jQuery.css(elem, "boxSizing", !1, styles), styles) : 0)
            }
        }
    }), jQuery.support.opacity || (jQuery.cssHooks.opacity = {
        get: function (elem, computed) {
            return ropacity.test((computed && elem.currentStyle ? elem.currentStyle.filter : elem.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : computed ? "1" : ""
        },
        set: function (elem, value) {
            var style = elem.style,
                currentStyle = elem.currentStyle,
                opacity = jQuery.isNumeric(value) ? "alpha(opacity=" + 100 * value + ")" : "",
                filter = currentStyle && currentStyle.filter || style.filter || "";
            style.zoom = 1, (value >= 1 || "" === value) && "" === jQuery.trim(filter.replace(ralpha, "")) && style.removeAttribute && (style.removeAttribute("filter"), "" === value || currentStyle && !currentStyle.filter) || (style.filter = ralpha.test(filter) ? filter.replace(ralpha, opacity) : filter + " " + opacity)
        }
    }), jQuery(function () {
        jQuery.support.reliableMarginRight || (jQuery.cssHooks.marginRight = {
            get: function (elem, computed) {
                return computed ? jQuery.swap(elem, {
                    display: "inline-block"
                }, curCSS, [elem, "marginRight"]) : void 0
            }
        }), !jQuery.support.pixelPosition && jQuery.fn.position && jQuery.each(["top", "left"], function (i, prop) {
            jQuery.cssHooks[prop] = {
                get: function (elem, computed) {
                    return computed ? (computed = curCSS(elem, prop), rnumnonpx.test(computed) ? jQuery(elem).position()[prop] + "px" : computed) : void 0
                }
            }
        })
    }), jQuery.expr && jQuery.expr.filters && (jQuery.expr.filters.hidden = function (elem) {
        return elem.offsetWidth <= 0 && elem.offsetHeight <= 0 || !jQuery.support.reliableHiddenOffsets && "none" === (elem.style && elem.style.display || jQuery.css(elem, "display"))
    }, jQuery.expr.filters.visible = function (elem) {
        return !jQuery.expr.filters.hidden(elem)
    }), jQuery.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function (prefix, suffix) {
        jQuery.cssHooks[prefix + suffix] = {
            expand: function (value) {
                for (var i = 0, expanded = {}, parts = "string" == typeof value ? value.split(" ") : [value]; 4 > i; i++) expanded[prefix + cssExpand[i] + suffix] = parts[i] || parts[i - 2] || parts[0];
                return expanded
            }
        }, rmargin.test(prefix) || (jQuery.cssHooks[prefix + suffix].set = setPositiveNumber)
    });
    var r20 = /%20/g,
        rbracket = /\[\]$/,
        rCRLF = /\r?\n/g,
        rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i,
        rsubmittable = /^(?:input|select|textarea|keygen)/i;
    jQuery.fn.extend({
        serialize: function () {
            return jQuery.param(this.serializeArray())
        },
        serializeArray: function () {
            return this.map(function () {
                var elements = jQuery.prop(this, "elements");
                return elements ? jQuery.makeArray(elements) : this
            }).filter(function () {
                var type = this.type;
                return this.name && !jQuery(this).is(":disabled") && rsubmittable.test(this.nodeName) && !rsubmitterTypes.test(type) && (this.checked || !manipulation_rcheckableType.test(type))
            }).map(function (i, elem) {
                var val = jQuery(this).val();
                return null == val ? null : jQuery.isArray(val) ? jQuery.map(val, function (val) {
                    return {
                        name: elem.name,
                        value: val.replace(rCRLF, "\r\n")
                    }
                }) : {
                    name: elem.name,
                    value: val.replace(rCRLF, "\r\n")
                }
            }).get()
        }
    }), jQuery.param = function (a, traditional) {
        var prefix, s = [],
            add = function (key, value) {
                value = jQuery.isFunction(value) ? value() : null == value ? "" : value, s[s.length] = encodeURIComponent(key) + "=" + encodeURIComponent(value)
            };
        if (traditional === undefined && (traditional = jQuery.ajaxSettings && jQuery.ajaxSettings.traditional), jQuery.isArray(a) || a.jquery && !jQuery.isPlainObject(a)) jQuery.each(a, function () {
            add(this.name, this.value)
        });
        else
            for (prefix in a) buildParams(prefix, a[prefix], traditional, add);
        return s.join("&").replace(r20, "+")
    }, jQuery.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (i, name) {
        jQuery.fn[name] = function (data, fn) {
            return arguments.length > 0 ? this.on(name, null, data, fn) : this.trigger(name)
        }
    }), jQuery.fn.extend({
        hover: function (fnOver, fnOut) {
            return this.mouseenter(fnOver).mouseleave(fnOut || fnOver)
        },
        bind: function (types, data, fn) {
            return this.on(types, null, data, fn)
        },
        unbind: function (types, fn) {
            return this.off(types, null, fn)
        },
        delegate: function (selector, types, data, fn) {
            return this.on(types, selector, data, fn)
        },
        undelegate: function (selector, types, fn) {
            return 1 === arguments.length ? this.off(selector, "**") : this.off(types, selector || "**", fn)
        }
    });
    var ajaxLocParts, ajaxLocation, ajax_nonce = jQuery.now(),
        ajax_rquery = /\?/,
        rhash = /#.*$/,
        rts = /([?&])_=[^&]*/,
        rheaders = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
        rlocalProtocol = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        rnoContent = /^(?:GET|HEAD)$/,
        rprotocol = /^\/\//,
        rurl = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        _load = jQuery.fn.load,
        prefilters = {}, transports = {}, allTypes = "*/".concat("*");
    try {
        ajaxLocation = location.href
    } catch (e) {
        ajaxLocation = document.createElement("a"), ajaxLocation.href = "", ajaxLocation = ajaxLocation.href
    }
    ajaxLocParts = rurl.exec(ajaxLocation.toLowerCase()) || [], jQuery.fn.load = function (url, params, callback) {
        if ("string" != typeof url && _load) return _load.apply(this, arguments);
        var selector, response, type, self = this,
            off = url.indexOf(" ");
        return off >= 0 && (selector = url.slice(off, url.length), url = url.slice(0, off)), jQuery.isFunction(params) ? (callback = params, params = undefined) : params && "object" == typeof params && (type = "POST"), self.length > 0 && jQuery.ajax({
            url: url,
            type: type,
            dataType: "html",
            data: params
        }).done(function (responseText) {
            response = arguments, self.html(selector ? jQuery("<div>").append(jQuery.parseHTML(responseText)).find(selector) : responseText)
        }).complete(callback && function (jqXHR, status) {
            self.each(callback, response || [jqXHR.responseText, status, jqXHR])
        }), this
    }, jQuery.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (i, type) {
        jQuery.fn[type] = function (fn) {
            return this.on(type, fn)
        }
    }), jQuery.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: ajaxLocation,
            type: "GET",
            isLocal: rlocalProtocol.test(ajaxLocParts[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": allTypes,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": jQuery.parseJSON,
                "text xml": jQuery.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function (target, settings) {
            return settings ? ajaxExtend(ajaxExtend(target, jQuery.ajaxSettings), settings) : ajaxExtend(jQuery.ajaxSettings, target)
        },
        ajaxPrefilter: addToPrefiltersOrTransports(prefilters),
        ajaxTransport: addToPrefiltersOrTransports(transports),
        ajax: function (url, options) {
            function done(status, nativeStatusText, responses, headers) {
                var isSuccess, success, error, response, modified, statusText = nativeStatusText;
                2 !== state && (state = 2, timeoutTimer && clearTimeout(timeoutTimer), transport = undefined, responseHeadersString = headers || "", jqXHR.readyState = status > 0 ? 4 : 0, isSuccess = status >= 200 && 300 > status || 304 === status, responses && (response = ajaxHandleResponses(s, jqXHR, responses)), response = ajaxConvert(s, response, jqXHR, isSuccess), isSuccess ? (s.ifModified && (modified = jqXHR.getResponseHeader("Last-Modified"), modified && (jQuery.lastModified[cacheURL] = modified), modified = jqXHR.getResponseHeader("etag"), modified && (jQuery.etag[cacheURL] = modified)), 204 === status || "HEAD" === s.type ? statusText = "nocontent" : 304 === status ? statusText = "notmodified" : (statusText = response.state, success = response.data, error = response.error, isSuccess = !error)) : (error = statusText, (status || !statusText) && (statusText = "error", 0 > status && (status = 0))), jqXHR.status = status, jqXHR.statusText = (nativeStatusText || statusText) + "", isSuccess ? deferred.resolveWith(callbackContext, [success, statusText, jqXHR]) : deferred.rejectWith(callbackContext, [jqXHR, statusText, error]), jqXHR.statusCode(statusCode), statusCode = undefined, fireGlobals && globalEventContext.trigger(isSuccess ? "ajaxSuccess" : "ajaxError", [jqXHR, s, isSuccess ? success : error]), completeDeferred.fireWith(callbackContext, [jqXHR, statusText]), fireGlobals && (globalEventContext.trigger("ajaxComplete", [jqXHR, s]), --jQuery.active || jQuery.event.trigger("ajaxStop")))
            }
            "object" == typeof url && (options = url, url = undefined), options = options || {};
            var parts, i, cacheURL, responseHeadersString, timeoutTimer, fireGlobals, transport, responseHeaders, s = jQuery.ajaxSetup({}, options),
                callbackContext = s.context || s,
                globalEventContext = s.context && (callbackContext.nodeType || callbackContext.jquery) ? jQuery(callbackContext) : jQuery.event,
                deferred = jQuery.Deferred(),
                completeDeferred = jQuery.Callbacks("once memory"),
                statusCode = s.statusCode || {}, requestHeaders = {}, requestHeadersNames = {}, state = 0,
                strAbort = "canceled",
                jqXHR = {
                    readyState: 0,
                    getResponseHeader: function (key) {
                        var match;
                        if (2 === state) {
                            if (!responseHeaders)
                                for (responseHeaders = {}; match = rheaders.exec(responseHeadersString);) responseHeaders[match[1].toLowerCase()] = match[2];
                            match = responseHeaders[key.toLowerCase()]
                        }
                        return null == match ? null : match
                    },
                    getAllResponseHeaders: function () {
                        return 2 === state ? responseHeadersString : null
                    },
                    setRequestHeader: function (name, value) {
                        var lname = name.toLowerCase();
                        return state || (name = requestHeadersNames[lname] = requestHeadersNames[lname] || name, requestHeaders[name] = value), this
                    },
                    overrideMimeType: function (type) {
                        return state || (s.mimeType = type), this
                    },
                    statusCode: function (map) {
                        var code;
                        if (map)
                            if (2 > state)
                                for (code in map) statusCode[code] = [statusCode[code], map[code]];
                            else jqXHR.always(map[jqXHR.status]);
                        return this
                    },
                    abort: function (statusText) {
                        var finalText = statusText || strAbort;
                        return transport && transport.abort(finalText), done(0, finalText), this
                    }
                };
            if (deferred.promise(jqXHR).complete = completeDeferred.add, jqXHR.success = jqXHR.done, jqXHR.error = jqXHR.fail, s.url = ((url || s.url || ajaxLocation) + "").replace(rhash, "").replace(rprotocol, ajaxLocParts[1] + "//"), s.type = options.method || options.type || s.method || s.type, s.dataTypes = jQuery.trim(s.dataType || "*").toLowerCase().match(core_rnotwhite) || [""], null == s.crossDomain && (parts = rurl.exec(s.url.toLowerCase()), s.crossDomain = !(!parts || parts[1] === ajaxLocParts[1] && parts[2] === ajaxLocParts[2] && (parts[3] || ("http:" === parts[1] ? "80" : "443")) === (ajaxLocParts[3] || ("http:" === ajaxLocParts[1] ? "80" : "443")))), s.data && s.processData && "string" != typeof s.data && (s.data = jQuery.param(s.data, s.traditional)), inspectPrefiltersOrTransports(prefilters, s, options, jqXHR), 2 === state) return jqXHR;
            fireGlobals = s.global, fireGlobals && 0 === jQuery.active++ && jQuery.event.trigger("ajaxStart"), s.type = s.type.toUpperCase(), s.hasContent = !rnoContent.test(s.type), cacheURL = s.url, s.hasContent || (s.data && (cacheURL = s.url += (ajax_rquery.test(cacheURL) ? "&" : "?") + s.data, delete s.data), s.cache === !1 && (s.url = rts.test(cacheURL) ? cacheURL.replace(rts, "$1_=" + ajax_nonce++) : cacheURL + (ajax_rquery.test(cacheURL) ? "&" : "?") + "_=" + ajax_nonce++)), s.ifModified && (jQuery.lastModified[cacheURL] && jqXHR.setRequestHeader("If-Modified-Since", jQuery.lastModified[cacheURL]), jQuery.etag[cacheURL] && jqXHR.setRequestHeader("If-None-Match", jQuery.etag[cacheURL])), (s.data && s.hasContent && s.contentType !== !1 || options.contentType) && jqXHR.setRequestHeader("Content-Type", s.contentType), jqXHR.setRequestHeader("Accept", s.dataTypes[0] && s.accepts[s.dataTypes[0]] ? s.accepts[s.dataTypes[0]] + ("*" !== s.dataTypes[0] ? ", " + allTypes + "; q=0.01" : "") : s.accepts["*"]);
            for (i in s.headers) jqXHR.setRequestHeader(i, s.headers[i]);
            if (s.beforeSend && (s.beforeSend.call(callbackContext, jqXHR, s) === !1 || 2 === state)) return jqXHR.abort();
            strAbort = "abort";
            for (i in {
                success: 1,
                error: 1,
                complete: 1
            }) jqXHR[i](s[i]);
            if (transport = inspectPrefiltersOrTransports(transports, s, options, jqXHR)) {
                jqXHR.readyState = 1, fireGlobals && globalEventContext.trigger("ajaxSend", [jqXHR, s]), s.async && s.timeout > 0 && (timeoutTimer = setTimeout(function () {
                    jqXHR.abort("timeout")
                }, s.timeout));
                try {
                    state = 1, transport.send(requestHeaders, done)
                } catch (e) {
                    if (!(2 > state)) throw e;
                    done(-1, e)
                }
            } else done(-1, "No Transport");
            return jqXHR
        },
        getJSON: function (url, data, callback) {
            return jQuery.get(url, data, callback, "json")
        },
        getScript: function (url, callback) {
            return jQuery.get(url, undefined, callback, "script")
        }
    }), jQuery.each(["get", "post"], function (i, method) {
        jQuery[method] = function (url, data, callback, type) {
            return jQuery.isFunction(data) && (type = type || callback, callback = data, data = undefined), jQuery.ajax({
                url: url,
                type: method,
                dataType: type,
                data: data,
                success: callback
            })
        }
    }), jQuery.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function (text) {
                return jQuery.globalEval(text), text
            }
        }
    }), jQuery.ajaxPrefilter("script", function (s) {
        s.cache === undefined && (s.cache = !1), s.crossDomain && (s.type = "GET", s.global = !1)
    }), jQuery.ajaxTransport("script", function (s) {
        if (s.crossDomain) {
            var script, head = document.head || jQuery("head")[0] || document.documentElement;
            return {
                send: function (_, callback) {
                    script = document.createElement("script"), script.async = !0, s.scriptCharset && (script.charset = s.scriptCharset), script.src = s.url, script.onload = script.onreadystatechange = function (_, isAbort) {
                        (isAbort || !script.readyState || /loaded|complete/.test(script.readyState)) && (script.onload = script.onreadystatechange = null, script.parentNode && script.parentNode.removeChild(script), script = null, isAbort || callback(200, "success"))
                    }, head.insertBefore(script, head.firstChild)
                },
                abort: function () {
                    script && script.onload(undefined, !0)
                }
            }
        }
    });
    var oldCallbacks = [],
        rjsonp = /(=)\?(?=&|$)|\?\?/;
    jQuery.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function () {
            var callback = oldCallbacks.pop() || jQuery.expando + "_" + ajax_nonce++;
            return this[callback] = !0, callback
        }
    }), jQuery.ajaxPrefilter("json jsonp", function (s, originalSettings, jqXHR) {
        var callbackName, overwritten, responseContainer, jsonProp = s.jsonp !== !1 && (rjsonp.test(s.url) ? "url" : "string" == typeof s.data && !(s.contentType || "").indexOf("application/x-www-form-urlencoded") && rjsonp.test(s.data) && "data");
        return jsonProp || "jsonp" === s.dataTypes[0] ? (callbackName = s.jsonpCallback = jQuery.isFunction(s.jsonpCallback) ? s.jsonpCallback() : s.jsonpCallback, jsonProp ? s[jsonProp] = s[jsonProp].replace(rjsonp, "$1" + callbackName) : s.jsonp !== !1 && (s.url += (ajax_rquery.test(s.url) ? "&" : "?") + s.jsonp + "=" + callbackName), s.converters["script json"] = function () {
            return responseContainer || jQuery.error(callbackName + " was not called"), responseContainer[0]
        }, s.dataTypes[0] = "json", overwritten = window[callbackName], window[callbackName] = function () {
            responseContainer = arguments
        }, jqXHR.always(function () {
            window[callbackName] = overwritten, s[callbackName] && (s.jsonpCallback = originalSettings.jsonpCallback, oldCallbacks.push(callbackName)), responseContainer && jQuery.isFunction(overwritten) && overwritten(responseContainer[0]), responseContainer = overwritten = undefined
        }), "script") : void 0
    });
    var xhrCallbacks, xhrSupported, xhrId = 0,
        xhrOnUnloadAbort = window.ActiveXObject && function () {
            var key;
            for (key in xhrCallbacks) xhrCallbacks[key](undefined, !0)
        };
    jQuery.ajaxSettings.xhr = window.ActiveXObject ? function () {
        return !this.isLocal && createStandardXHR() || createActiveXHR()
    } : createStandardXHR, xhrSupported = jQuery.ajaxSettings.xhr(), jQuery.support.cors = !! xhrSupported && "withCredentials" in xhrSupported, xhrSupported = jQuery.support.ajax = !! xhrSupported, xhrSupported && jQuery.ajaxTransport(function (s) {
        if (!s.crossDomain || jQuery.support.cors) {
            var callback;
            return {
                send: function (headers, complete) {
                    var handle, i, xhr = s.xhr();
                    if (s.username ? xhr.open(s.type, s.url, s.async, s.username, s.password) : xhr.open(s.type, s.url, s.async), s.xhrFields)
                        for (i in s.xhrFields) xhr[i] = s.xhrFields[i];
                    s.mimeType && xhr.overrideMimeType && xhr.overrideMimeType(s.mimeType), s.crossDomain || headers["X-Requested-With"] || (headers["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (i in headers) xhr.setRequestHeader(i, headers[i])
                    } catch (err) {}
                    xhr.send(s.hasContent && s.data || null), callback = function (_, isAbort) {
                        var status, responseHeaders, statusText, responses;
                        try {
                            if (callback && (isAbort || 4 === xhr.readyState))
                                if (callback = undefined, handle && (xhr.onreadystatechange = jQuery.noop, xhrOnUnloadAbort && delete xhrCallbacks[handle]), isAbort) 4 !== xhr.readyState && xhr.abort();
                                else {
                                    responses = {}, status = xhr.status, responseHeaders = xhr.getAllResponseHeaders(), "string" == typeof xhr.responseText && (responses.text = xhr.responseText);
                                    try {
                                        statusText = xhr.statusText
                                    } catch (e) {
                                        statusText = ""
                                    }
                                    status || !s.isLocal || s.crossDomain ? 1223 === status && (status = 204) : status = responses.text ? 200 : 404
                                }
                        } catch (firefoxAccessException) {
                            isAbort || complete(-1, firefoxAccessException)
                        }
                        responses && complete(status, statusText, responses, responseHeaders)
                    }, s.async ? 4 === xhr.readyState ? setTimeout(callback) : (handle = ++xhrId, xhrOnUnloadAbort && (xhrCallbacks || (xhrCallbacks = {}, jQuery(window).unload(xhrOnUnloadAbort)), xhrCallbacks[handle] = callback), xhr.onreadystatechange = callback) : callback()
                },
                abort: function () {
                    callback && callback(undefined, !0)
                }
            }
        }
    });
    var fxNow, timerId, rfxtypes = /^(?:toggle|show|hide)$/,
        rfxnum = new RegExp("^(?:([+-])=|)(" + core_pnum + ")([a-z%]*)$", "i"),
        rrun = /queueHooks$/,
        animationPrefilters = [defaultPrefilter],
        tweeners = {
            "*": [
                function (prop, value) {
                    var tween = this.createTween(prop, value),
                        target = tween.cur(),
                        parts = rfxnum.exec(value),
                        unit = parts && parts[3] || (jQuery.cssNumber[prop] ? "" : "px"),
                        start = (jQuery.cssNumber[prop] || "px" !== unit && +target) && rfxnum.exec(jQuery.css(tween.elem, prop)),
                        scale = 1,
                        maxIterations = 20;
                    if (start && start[3] !== unit) {
                        unit = unit || start[3], parts = parts || [], start = +target || 1;
                        do scale = scale || ".5", start /= scale, jQuery.style(tween.elem, prop, start + unit); while (scale !== (scale = tween.cur() / target) && 1 !== scale && --maxIterations)
                    }
                    return parts && (start = tween.start = +start || +target || 0, tween.unit = unit, tween.end = parts[1] ? start + (parts[1] + 1) * parts[2] : +parts[2]), tween
                }]
        };
    jQuery.Animation = jQuery.extend(Animation, {
        tweener: function (props, callback) {
            jQuery.isFunction(props) ? (callback = props, props = ["*"]) : props = props.split(" ");
            for (var prop, index = 0, length = props.length; length > index; index++) prop = props[index], tweeners[prop] = tweeners[prop] || [], tweeners[prop].unshift(callback)
        },
        prefilter: function (callback, prepend) {
            prepend ? animationPrefilters.unshift(callback) : animationPrefilters.push(callback)
        }
    }), jQuery.Tween = Tween, Tween.prototype = {
        constructor: Tween,
        init: function (elem, options, prop, end, easing, unit) {
            this.elem = elem, this.prop = prop, this.easing = easing || "swing", this.options = options, this.start = this.now = this.cur(), this.end = end, this.unit = unit || (jQuery.cssNumber[prop] ? "" : "px")
        },
        cur: function () {
            var hooks = Tween.propHooks[this.prop];
            return hooks && hooks.get ? hooks.get(this) : Tween.propHooks._default.get(this)
        },
        run: function (percent) {
            var eased, hooks = Tween.propHooks[this.prop];
            return this.pos = eased = this.options.duration ? jQuery.easing[this.easing](percent, this.options.duration * percent, 0, 1, this.options.duration) : percent, this.now = (this.end - this.start) * eased + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), hooks && hooks.set ? hooks.set(this) : Tween.propHooks._default.set(this), this
        }
    }, Tween.prototype.init.prototype = Tween.prototype, Tween.propHooks = {
        _default: {
            get: function (tween) {
                var result;
                return null == tween.elem[tween.prop] || tween.elem.style && null != tween.elem.style[tween.prop] ? (result = jQuery.css(tween.elem, tween.prop, ""), result && "auto" !== result ? result : 0) : tween.elem[tween.prop]
            },
            set: function (tween) {
                jQuery.fx.step[tween.prop] ? jQuery.fx.step[tween.prop](tween) : tween.elem.style && (null != tween.elem.style[jQuery.cssProps[tween.prop]] || jQuery.cssHooks[tween.prop]) ? jQuery.style(tween.elem, tween.prop, tween.now + tween.unit) : tween.elem[tween.prop] = tween.now
            }
        }
    }, Tween.propHooks.scrollTop = Tween.propHooks.scrollLeft = {
        set: function (tween) {
            tween.elem.nodeType && tween.elem.parentNode && (tween.elem[tween.prop] = tween.now)
        }
    }, jQuery.each(["toggle", "show", "hide"], function (i, name) {
        var cssFn = jQuery.fn[name];
        jQuery.fn[name] = function (speed, easing, callback) {
            return null == speed || "boolean" == typeof speed ? cssFn.apply(this, arguments) : this.animate(genFx(name, !0), speed, easing, callback)
        }
    }), jQuery.fn.extend({
        fadeTo: function (speed, to, easing, callback) {
            return this.filter(isHidden).css("opacity", 0).show().end().animate({
                opacity: to
            }, speed, easing, callback)
        },
        animate: function (prop, speed, easing, callback) {
            var empty = jQuery.isEmptyObject(prop),
                optall = jQuery.speed(speed, easing, callback),
                doAnimation = function () {
                    var anim = Animation(this, jQuery.extend({}, prop), optall);
                    (empty || jQuery._data(this, "finish")) && anim.stop(!0)
                };
            return doAnimation.finish = doAnimation, empty || optall.queue === !1 ? this.each(doAnimation) : this.queue(optall.queue, doAnimation)
        },
        stop: function (type, clearQueue, gotoEnd) {
            var stopQueue = function (hooks) {
                var stop = hooks.stop;
                delete hooks.stop, stop(gotoEnd)
            };
            return "string" != typeof type && (gotoEnd = clearQueue, clearQueue = type, type = undefined), clearQueue && type !== !1 && this.queue(type || "fx", []), this.each(function () {
                var dequeue = !0,
                    index = null != type && type + "queueHooks",
                    timers = jQuery.timers,
                    data = jQuery._data(this);
                if (index) data[index] && data[index].stop && stopQueue(data[index]);
                else
                    for (index in data) data[index] && data[index].stop && rrun.test(index) && stopQueue(data[index]);
                for (index = timers.length; index--;) timers[index].elem !== this || null != type && timers[index].queue !== type || (timers[index].anim.stop(gotoEnd), dequeue = !1, timers.splice(index, 1));
                (dequeue || !gotoEnd) && jQuery.dequeue(this, type)
            })
        },
        finish: function (type) {
            return type !== !1 && (type = type || "fx"), this.each(function () {
                var index, data = jQuery._data(this),
                    queue = data[type + "queue"],
                    hooks = data[type + "queueHooks"],
                    timers = jQuery.timers,
                    length = queue ? queue.length : 0;
                for (data.finish = !0, jQuery.queue(this, type, []), hooks && hooks.stop && hooks.stop.call(this, !0), index = timers.length; index--;) timers[index].elem === this && timers[index].queue === type && (timers[index].anim.stop(!0), timers.splice(index, 1));
                for (index = 0; length > index; index++) queue[index] && queue[index].finish && queue[index].finish.call(this);
                delete data.finish
            })
        }
    }), jQuery.each({
        slideDown: genFx("show"),
        slideUp: genFx("hide"),
        slideToggle: genFx("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function (name, props) {
        jQuery.fn[name] = function (speed, easing, callback) {
            return this.animate(props, speed, easing, callback)
        }
    }), jQuery.speed = function (speed, easing, fn) {
        var opt = speed && "object" == typeof speed ? jQuery.extend({}, speed) : {
            complete: fn || !fn && easing || jQuery.isFunction(speed) && speed,
            duration: speed,
            easing: fn && easing || easing && !jQuery.isFunction(easing) && easing
        };
        return opt.duration = jQuery.fx.off ? 0 : "number" == typeof opt.duration ? opt.duration : opt.duration in jQuery.fx.speeds ? jQuery.fx.speeds[opt.duration] : jQuery.fx.speeds._default, (null == opt.queue || opt.queue === !0) && (opt.queue = "fx"), opt.old = opt.complete, opt.complete = function () {
            jQuery.isFunction(opt.old) && opt.old.call(this), opt.queue && jQuery.dequeue(this, opt.queue)
        }, opt
    }, jQuery.easing = {
        linear: function (p) {
            return p
        },
        swing: function (p) {
            return .5 - Math.cos(p * Math.PI) / 2
        }
    }, jQuery.timers = [], jQuery.fx = Tween.prototype.init, jQuery.fx.tick = function () {
        var timer, timers = jQuery.timers,
            i = 0;
        for (fxNow = jQuery.now(); i < timers.length; i++) timer = timers[i], timer() || timers[i] !== timer || timers.splice(i--, 1);
        timers.length || jQuery.fx.stop(), fxNow = undefined
    }, jQuery.fx.timer = function (timer) {
        timer() && jQuery.timers.push(timer) && jQuery.fx.start()
    }, jQuery.fx.interval = 13, jQuery.fx.start = function () {
        timerId || (timerId = setInterval(jQuery.fx.tick, jQuery.fx.interval))
    }, jQuery.fx.stop = function () {
        clearInterval(timerId), timerId = null
    }, jQuery.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, jQuery.fx.step = {}, jQuery.expr && jQuery.expr.filters && (jQuery.expr.filters.animated = function (elem) {
        return jQuery.grep(jQuery.timers, function (fn) {
            return elem === fn.elem
        }).length
    }), jQuery.fn.offset = function (options) {
        if (arguments.length) return options === undefined ? this : this.each(function (i) {
            jQuery.offset.setOffset(this, options, i)
        });
        var docElem, win, box = {
                top: 0,
                left: 0
            }, elem = this[0],
            doc = elem && elem.ownerDocument;
        if (doc) return docElem = doc.documentElement, jQuery.contains(docElem, elem) ? (typeof elem.getBoundingClientRect !== core_strundefined && (box = elem.getBoundingClientRect()), win = getWindow(doc), {
            top: box.top + (win.pageYOffset || docElem.scrollTop) - (docElem.clientTop || 0),
            left: box.left + (win.pageXOffset || docElem.scrollLeft) - (docElem.clientLeft || 0)
        }) : box
    }, jQuery.offset = {
        setOffset: function (elem, options, i) {
            var position = jQuery.css(elem, "position");
            "static" === position && (elem.style.position = "relative");
            var curTop, curLeft, curElem = jQuery(elem),
                curOffset = curElem.offset(),
                curCSSTop = jQuery.css(elem, "top"),
                curCSSLeft = jQuery.css(elem, "left"),
                calculatePosition = ("absolute" === position || "fixed" === position) && jQuery.inArray("auto", [curCSSTop, curCSSLeft]) > -1,
                props = {}, curPosition = {};
            calculatePosition ? (curPosition = curElem.position(), curTop = curPosition.top, curLeft = curPosition.left) : (curTop = parseFloat(curCSSTop) || 0, curLeft = parseFloat(curCSSLeft) || 0), jQuery.isFunction(options) && (options = options.call(elem, i, curOffset)), null != options.top && (props.top = options.top - curOffset.top + curTop), null != options.left && (props.left = options.left - curOffset.left + curLeft), "using" in options ? options.using.call(elem, props) : curElem.css(props)
        }
    }, jQuery.fn.extend({
        position: function () {
            if (this[0]) {
                var offsetParent, offset, parentOffset = {
                        top: 0,
                        left: 0
                    }, elem = this[0];
                return "fixed" === jQuery.css(elem, "position") ? offset = elem.getBoundingClientRect() : (offsetParent = this.offsetParent(), offset = this.offset(), jQuery.nodeName(offsetParent[0], "html") || (parentOffset = offsetParent.offset()), parentOffset.top += jQuery.css(offsetParent[0], "borderTopWidth", !0), parentOffset.left += jQuery.css(offsetParent[0], "borderLeftWidth", !0)), {
                    top: offset.top - parentOffset.top - jQuery.css(elem, "marginTop", !0),
                    left: offset.left - parentOffset.left - jQuery.css(elem, "marginLeft", !0)
                }
            }
        },
        offsetParent: function () {
            return this.map(function () {
                for (var offsetParent = this.offsetParent || docElem; offsetParent && !jQuery.nodeName(offsetParent, "html") && "static" === jQuery.css(offsetParent, "position");) offsetParent = offsetParent.offsetParent;
                return offsetParent || docElem
            })
        }
    }), jQuery.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function (method, prop) {
        var top = /Y/.test(prop);
        jQuery.fn[method] = function (val) {
            return jQuery.access(this, function (elem, method, val) {
                var win = getWindow(elem);
                return val === undefined ? win ? prop in win ? win[prop] : win.document.documentElement[method] : elem[method] : void(win ? win.scrollTo(top ? jQuery(win).scrollLeft() : val, top ? val : jQuery(win).scrollTop()) : elem[method] = val)
            }, method, val, arguments.length, null)
        }
    }), jQuery.each({
        Height: "height",
        Width: "width"
    }, function (name, type) {
        jQuery.each({
            padding: "inner" + name,
            content: type,
            "": "outer" + name
        }, function (defaultExtra, funcName) {
            jQuery.fn[funcName] = function (margin, value) {
                var chainable = arguments.length && (defaultExtra || "boolean" != typeof margin),
                    extra = defaultExtra || (margin === !0 || value === !0 ? "margin" : "border");
                return jQuery.access(this, function (elem, type, value) {
                    var doc;
                    return jQuery.isWindow(elem) ? elem.document.documentElement["client" + name] : 9 === elem.nodeType ? (doc = elem.documentElement, Math.max(elem.body["scroll" + name], doc["scroll" + name], elem.body["offset" + name], doc["offset" + name], doc["client" + name])) : value === undefined ? jQuery.css(elem, type, extra) : jQuery.style(elem, type, value, extra)
                }, type, chainable ? margin : undefined, chainable, null)
            }
        })
    }), jQuery.fn.size = function () {
        return this.length
    }, jQuery.fn.andSelf = jQuery.fn.addBack, "object" == typeof module && module && "object" == typeof module.exports ? module.exports = jQuery : (window.jQuery = window.$ = jQuery, "function" == typeof define && define.amd && define("jquery", [], function () {
        return jQuery
    }))
}(window);
var gaQueue = gaQueue || {};
! function ($) {
    function update_tokens() {
        10 > GA_tokens && GA_tokens++
    }

    function send_next() {
        if (GA_timer = !1, "undefined" != typeof _gaq && 0 != gaQueue.hits_to_send.length) {
            if (!(GA_tokens > 0)) return void(GA_timer = setTimeout(send_next, 5e3));
            GA_tokens--, _gaq.push(gaQueue.hits_to_send.shift()), send_next()
        }
    }
    var GA_tokens = 3,
        GA_timer = !1;
    setInterval(update_tokens, 1e4), gaQueue.hits_to_send = [], gaQueue.track = function () {
        gaQueue.hits_to_send.push(arguments[0]), send_next()
    }, $(document).ready(function () {
        send_next()
    })
}("undefined" != typeof jQuery ? jQuery : Zepto),
function ($) {
    $(document).ready(function () {
        $productForms = $(".maestro-content-type-product form");
        var spinnerOpts = {
            lines: 13,
            length: 3,
            width: 2,
            radius: 7,
            corners: 1,
            rotate: 0,
            direction: 1,
            color: "#000",
            speed: .7,
            trail: 72,
            shadow: !1,
            hwaccel: !1,
            className: "spinner",
            zIndex: 2e9,
            top: "auto",
            left: "auto"
        }, spinner = new Spinner(spinnerOpts).spin();
        $productForms.find("button.button").append(spinner.el), $productForms.on("submit", function (event) {
            event.preventDefault(), $form = $(this), $button = $form.find("button.button"), $button.toggleClass("loading", !0), $result = $form.closest(".widget").find(".result");
            var data = "action=sp_maestro_product&" + $form.serialize();
            $.post("/wp-admin/admin-ajax.php", data, function (response) {
                if ($form.find(".alert-box").remove(), $button.toggleClass("loading", !1), response.indexOf("error:") > -1) $form.prepend("error:invalid_email" == response ? '<div class="alert-box alert radius">Please provide a valid email address.</div>' : '<div class="alert-box alert radius">Error! Please try later.</div>');
                else if (response.indexOf("http") > -1) {
                    var responseParts = response.split(":::"),
                        successMessage = responseParts[0];
                    0 === successMessage.length && (successMessage = "Thank you! Claim it now on Learnable"), $form.html('<a href="' + responseParts[1] + '" class="button success radius">' + successMessage + "</a>")
                } else $form.html('<div class="alert-box success radius">' + response + "</div>")
            })
        })
    })
}(jQuery),
function (window, $) {
    "use strict";
    var EXPIRE_DAYS = 14,
        AwesomeBar = function () {
            var isEnabled = !0;
            $(".awesome-bar").length && (this.$el = $(".awesome-bar"), this.$closeBtn = this.$el.find(".awesome-bar_close"), this.isShown = !1, this.targetOffset = 0, this.impressionTracked = !1, this.DOM = {
                $targetContent: $(".article_body")
            }, this.checkPosition = this._throttle($.proxy(this.checkPosition, this), 500), this.closeBtnHandler = $.proxy(this.closeBtnHandler, this), $.cookie && $.cookie("awesomeBarDisabled") && (isEnabled = !1), isEnabled && this.init())
        };
    AwesomeBar.prototype = {
        init: function () {
            this.$el.addClass("js"), this.bindEvents(), this.setTargetOffset()
        },
        bindEvents: function () {
            var that = this;
            $(window).on("scroll", this.checkPosition), this.$el.on("click", "a", function () {
                that.trackEvent("Click")
            }), this.$closeBtn.on("click", this.closeBtnHandler)
        },
        unBindEvents: function () {
            $(window).off("scroll", this.checkPosition)
        },
        setTargetOffset: function () {
            this.targetOffset = this.DOM.$targetContent.offset().top
        },
        checkPosition: function () {
            var windowTop = window.pageYOffset || document.documentElement.scrollTop;
            !this.isShown && windowTop > this.targetOffset ? this.showAwesomeBar(!0) : this.isShown && windowTop < this.targetOffset && this.showAwesomeBar(!1)
        },
        showAwesomeBar: function (shouldBeShown) {
            this.$el.toggleClass("show", shouldBeShown), shouldBeShown && !this.impressionTracked && (this.impressionTracked = !0, this.trackEvent("Impression")), this.isShown = shouldBeShown
        },
        trackEvent: function (label) {
            var campaignName = this.$el.attr("data-campaign");
            gaQueue.track(["_trackEvent", "Awesome Bar", campaignName, label])
        },
        closeBtnHandler: function () {
            this.showAwesomeBar(!1), this.unBindEvents(), $.cookie && $.cookie("awesomeBarDisabled", "truthy", {
                path: "/",
                expires: EXPIRE_DAYS
            })
        },
        _throttle: function (func, wait) {
            var context, args, timeout, result, previous = 0,
                later = function () {
                    previous = new Date, timeout = null, result = func.apply(context, args)
                };
            return function () {
                var now = new Date,
                    remaining = wait - (now - previous);
                return context = this, args = arguments, 0 >= remaining ? (clearTimeout(timeout), timeout = null, previous = now, result = func.apply(context, args)) : timeout || (timeout = setTimeout(later, remaining)), result
            }
        }
    };
    var iterations = 0,
        instantiate = function () {
            $ && $.cookie || iterations > 10 ? window.AwesomeBar = new AwesomeBar : (iterations++, setTimeout(instantiate, 500))
        };
    instantiate()
}(window, "undefined" != typeof jQuery ? jQuery : Zepto);
var libFuncName = null;
if ("undefined" == typeof jQuery && "undefined" == typeof Zepto && "function" == typeof $) libFuncName = $;
else if ("function" == typeof jQuery) libFuncName = jQuery;
else {
    if ("function" != typeof Zepto) throw new TypeError;
    libFuncName = Zepto
}! function ($, window, document) {
    "use strict";
    window.matchMedia = window.matchMedia || function (doc) {
        var bool, docElem = doc.documentElement,
            refNode = docElem.firstElementChild || docElem.firstChild,
            fakeBody = doc.createElement("body"),
            div = doc.createElement("div");
        return div.id = "mq-test-1", div.style.cssText = "position:absolute;top:-100em", fakeBody.style.background = "none", fakeBody.appendChild(div),
        function (q) {
            return div.innerHTML = '&shy;<style media="' + q + '"> #mq-test-1 { width: 42px; }</style>', docElem.insertBefore(fakeBody, refNode), bool = 42 === div.offsetWidth, docElem.removeChild(fakeBody), {
                matches: bool,
                media: q
            }
        }
    }(document), Array.prototype.filter || (Array.prototype.filter = function (fun) {
        if (null == this) throw new TypeError;
        var t = Object(this),
            len = t.length >>> 0;
        if ("function" == typeof fun) {
            for (var res = [], thisp = arguments[1], i = 0; len > i; i++)
                if (i in t) {
                    var val = t[i];
                    fun && fun.call(thisp, val, i, t) && res.push(val)
                }
            return res
        }
    }), Function.prototype.bind || (Function.prototype.bind = function (oThis) {
        if ("function" != typeof this) throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
        var aArgs = Array.prototype.slice.call(arguments, 1),
            fToBind = this,
            fNOP = function () {}, fBound = function () {
                return fToBind.apply(this instanceof fNOP && oThis ? this : oThis, aArgs.concat(Array.prototype.slice.call(arguments)))
            };
        return fNOP.prototype = this.prototype, fBound.prototype = new fNOP, fBound
    }), Array.prototype.indexOf || (Array.prototype.indexOf = function (searchElement) {
        if (null == this) throw new TypeError;
        var t = Object(this),
            len = t.length >>> 0;
        if (0 === len) return -1;
        var n = 0;
        if (arguments.length > 1 && (n = Number(arguments[1]), n != n ? n = 0 : 0 != n && 1 / 0 != n && n != -1 / 0 && (n = (n > 0 || -1) * Math.floor(Math.abs(n)))), n >= len) return -1;
        for (var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0); len > k; k++)
            if (k in t && t[k] === searchElement) return k;
        return -1
    }), $.fn.stop = $.fn.stop || function () {
        return this
    }, window.Foundation = {
        name: "Foundation",
        version: "4.2.2",
        cache: {},
        init: function (scope, libraries, method, options, response, nc) {
            var library_arr, args = [scope, method, options, response],
                responses = [],
                nc = nc || !1;
            if (nc && (this.nc = nc), this.rtl = /rtl/i.test($("html").attr("dir")), this.scope = scope || this.scope, libraries && "string" == typeof libraries && !/reflow/i.test(libraries)) {
                if (/off/i.test(libraries)) return this.off();
                if (library_arr = libraries.split(" "), library_arr.length > 0)
                    for (var i = library_arr.length - 1; i >= 0; i--) responses.push(this.init_lib(library_arr[i], args))
            } else {
                /reflow/i.test(libraries) && (args[1] = "reflow");
                for (var lib in this.libs) responses.push(this.init_lib(lib, args))
            }
            return "function" == typeof libraries && args.unshift(libraries), this.response_obj(responses, args)
        },
        response_obj: function (response_arr, args) {
            for (var i = 0, len = args.length; len > i; i++)
                if ("function" == typeof args[i]) return args[i]({
                    errors: response_arr.filter(function (s) {
                        return "string" == typeof s ? s : void 0
                    })
                });
            return response_arr
        },
        init_lib: function (lib, args) {
            return this.trap(function () {
                return this.libs.hasOwnProperty(lib) ? (this.patch(this.libs[lib]), this.libs[lib].init.apply(this.libs[lib], args)) : function () {}
            }.bind(this), lib)
        },
        trap: function (fun, lib) {
            if (!this.nc) try {
                return fun()
            } catch (e) {
                return this.error({
                    name: lib,
                    message: "could not be initialized",
                    more: e.name + " " + e.message
                })
            }
            return fun()
        },
        patch: function (lib) {
            this.fix_outer(lib), lib.scope = this.scope, lib.rtl = this.rtl
        },
        inherit: function (scope, methods) {
            for (var methods_arr = methods.split(" "), i = methods_arr.length - 1; i >= 0; i--) this.lib_methods.hasOwnProperty(methods_arr[i]) && (this.libs[scope.name][methods_arr[i]] = this.lib_methods[methods_arr[i]])
        },
        random_str: function (length) {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".split("");
            length || (length = Math.floor(Math.random() * chars.length));
            for (var str = "", i = 0; length > i; i++) str += chars[Math.floor(Math.random() * chars.length)];
            return str
        },
        libs: {},
        lib_methods: {
            set_data: function (node, data) {
                var id = [this.name, +new Date, Foundation.random_str(5)].join("-");
                return Foundation.cache[id] = data, node.attr("data-" + this.name + "-id", id), data
            },
            get_data: function (node) {
                return Foundation.cache[node.attr("data-" + this.name + "-id")]
            },
            remove_data: function (node) {
                node ? (delete Foundation.cache[node.attr("data-" + this.name + "-id")], node.attr("data-" + this.name + "-id", "")) : $("[data-" + this.name + "-id]").each(function () {
                    delete Foundation.cache[$(this).attr("data-" + this.name + "-id")], $(this).attr("data-" + this.name + "-id", "")
                })
            },
            throttle: function (fun, delay) {
                var timer = null;
                return function () {
                    var context = this,
                        args = arguments;
                    clearTimeout(timer), timer = setTimeout(function () {
                        fun.apply(context, args)
                    }, delay)
                }
            },
            data_options: function (el) {
                function isNumber(o) {
                    return !isNaN(o - 0) && null !== o && "" !== o && o !== !1 && o !== !0
                }

                function trim(str) {
                    return "string" == typeof str ? $.trim(str) : str
                }
                var ii, p, opts = {}, opts_arr = (el.attr("data-options") || ":").split(";"),
                    opts_len = opts_arr.length;
                for (ii = opts_len - 1; ii >= 0; ii--) p = opts_arr[ii].split(":"), /true/i.test(p[1]) && (p[1] = !0), /false/i.test(p[1]) && (p[1] = !1), isNumber(p[1]) && (p[1] = parseInt(p[1], 10)), 2 === p.length && p[0].length > 0 && (opts[trim(p[0])] = trim(p[1]));
                return opts
            },
            delay: function (fun, delay) {
                return setTimeout(fun, delay)
            },
            scrollTo: function (el, to, duration) {
                if (!(0 > duration)) {
                    var difference = to - $(window).scrollTop(),
                        perTick = difference / duration * 10;
                    this.scrollToTimerCache = setTimeout(function () {
                        isNaN(parseInt(perTick, 10)) || (window.scrollTo(0, $(window).scrollTop() + perTick), this.scrollTo(el, to, duration - 10))
                    }.bind(this), 10)
                }
            },
            scrollLeft: function (el) {
                return el.length ? "scrollLeft" in el[0] ? el[0].scrollLeft : el[0].pageXOffset : void 0
            },
            empty: function (obj) {
                if (obj.length && obj.length > 0) return !1;
                if (obj.length && 0 === obj.length) return !0;
                for (var key in obj)
                    if (hasOwnProperty.call(obj, key)) return !1;
                return !0
            }
        },
        fix_outer: function (lib) {
            lib.outerHeight = function (el, bool) {
                return "function" == typeof Zepto ? el.height() : "undefined" != typeof bool ? el.outerHeight(bool) : el.outerHeight()
            }, lib.outerWidth = function (el) {
                return "function" == typeof Zepto ? el.width() : "undefined" != typeof bool ? el.outerWidth(bool) : el.outerWidth()
            }
        },
        error: function (error) {
            return error.name + " " + error.message + "; " + error.more
        },
        off: function () {
            return $(this.scope).off(".fndtn"), $(window).off(".fndtn"), !0
        },
        zj: function () {
            return "undefined" != typeof Zepto ? Zepto : jQuery
        }()
    }, $.fn.foundation = function () {
        var args = Array.prototype.slice.call(arguments, 0);
        return this.each(function () {
            return Foundation.init.apply(Foundation, [this].concat(args)), this
        })
    }
}(libFuncName, this, this.document),
function ($, window, document) {
    "use strict";
    Foundation.libs.topbar = {
        name: "topbar",
        version: "4.2.2",
        settings: {
            index: 0,
            stickyClass: "sticky",
            custom_back_text: !0,
            back_text: "Back",
            is_hover: !0,
            scrolltop: !0,
            init: !1
        },
        init: function (section, method, options) {
            Foundation.inherit(this, "data_options");
            var self = this;
            return "object" == typeof method ? $.extend(!0, this.settings, method) : "undefined" != typeof options && $.extend(!0, this.settings, options), "string" != typeof method ? ($(".top-bar, [data-topbar]").each(function () {
                $.extend(!0, self.settings, self.data_options($(this))), self.settings.$w = $(window), self.settings.$topbar = $(this), self.settings.$section = self.settings.$topbar.find("section"), self.settings.$titlebar = self.settings.$topbar.children("ul").first(), self.settings.$topbar.data("index", 0);
                var breakpoint = $("<div class='top-bar-js-breakpoint'/>").insertAfter(self.settings.$topbar);
                self.settings.breakPoint = breakpoint.width(), breakpoint.remove(), self.assemble(), self.settings.$topbar.parent().hasClass("fixed") && $("body").css("padding-top", self.outerHeight(self.settings.$topbar))
            }), self.settings.init || this.events(), this.settings.init) : this[method].call(this, options)
        },
        events: function () {
            var self = this,
                offst = this.outerHeight($(".top-bar, [data-topbar]"));
            $(this.scope).off(".fndtn.topbar").on("click.fndtn.topbar", ".top-bar .toggle-topbar, [data-topbar] .toggle-topbar", function (e) {
                {
                    var topbar = $(this).closest(".top-bar, [data-topbar]"),
                        section = topbar.find("section, .section");
                    topbar.children("ul").first()
                }
                e.preventDefault(), self.breakpoint() && (self.rtl ? (section.css({
                    right: "0%"
                }), section.find(">.name").css({
                    right: "100%"
                })) : (section.css({
                    left: "0%"
                }), section.find(">.name").css({
                    left: "100%"
                })), section.find("li.moved").removeClass("moved"), topbar.data("index", 0), topbar.toggleClass("expanded").css("height", "")), topbar.hasClass("expanded") ? topbar.parent().hasClass("fixed") && (topbar.parent().removeClass("fixed"), topbar.addClass("fixed"), $("body").css("padding-top", "0"), self.settings.scrolltop && window.scrollTo(0, 0)) : topbar.hasClass("fixed") && (topbar.parent().addClass("fixed"), topbar.removeClass("fixed"), $("body").css("padding-top", offst))
            }).on("mouseenter mouseleave", ".top-bar li", function (e) {
                self.settings.is_hover && (/enter|over/i.test(e.type) ? $(this).addClass("hover") : $(this).removeClass("hover"))
            }).on("click.fndtn.topbar", ".top-bar li.has-dropdown", function (e) {
                if (!self.breakpoint()) {
                    {
                        var li = $(this),
                            target = $(e.target),
                            topbar = li.closest("[data-topbar], .top-bar");
                        topbar.data("topbar")
                    }(!self.settings.is_hover || Modernizr.touch) && (e.stopImmediatePropagation(), "A" === target[0].nodeName && target.parent().hasClass("has-dropdown") && e.preventDefault(), li.hasClass("hover") ? li.removeClass("hover").find("li").removeClass("hover") : li.addClass("hover"))
                }
            }).on("click.fndtn.topbar", ".top-bar .has-dropdown>a, [data-topbar] .has-dropdown>a", function (e) {
                if (self.breakpoint()) {
                    e.preventDefault();
                    var $this = $(this),
                        topbar = $this.closest(".top-bar, [data-topbar]"),
                        section = topbar.find("section, .section"),
                        titlebar = topbar.children("ul").first(),
                        $selectedLi = ($this.next(".dropdown").outerHeight(), $this.closest("li"));
                    topbar.data("index", topbar.data("index") + 1), $selectedLi.addClass("moved"), self.rtl ? (section.css({
                        right: -(100 * topbar.data("index")) + "%"
                    }), section.find(">.name").css({
                        right: 100 * topbar.data("index") + "%"
                    })) : (section.css({
                        left: -(100 * topbar.data("index")) + "%"
                    }), section.find(">.name").css({
                        left: 100 * topbar.data("index") + "%"
                    })), topbar.css("height", self.outerHeight($this.siblings("ul"), !0) + self.outerHeight(titlebar, !0))
                }
            }), $(window).on("resize.fndtn.topbar", function () {
                self.breakpoint() || $(".top-bar, [data-topbar]").css("height", "").removeClass("expanded").find("li").removeClass("hover")
            }.bind(this)), $("body").on("click.fndtn.topbar", function (e) {
                var parent = $(e.target).closest("[data-topbar], .top-bar");
                parent.length > 0 || $(".top-bar li, [data-topbar] li").removeClass("hover")
            }), $(this.scope).on("click.fndtn", ".top-bar .has-dropdown .back, [data-topbar] .has-dropdown .back", function (e) {
                e.preventDefault();
                var $this = $(this),
                    topbar = $this.closest(".top-bar, [data-topbar]"),
                    titlebar = topbar.children("ul").first(),
                    section = topbar.find("section, .section"),
                    $movedLi = $this.closest("li.moved"),
                    $previousLevelUl = $movedLi.parent();
                topbar.data("index", topbar.data("index") - 1), self.rtl ? (section.css({
                    right: -(100 * topbar.data("index")) + "%"
                }), section.find(">.name").css({
                    right: 100 * topbar.data("index") + "%"
                })) : (section.css({
                    left: -(100 * topbar.data("index")) + "%"
                }), section.find(">.name").css({
                    left: 100 * topbar.data("index") + "%"
                })), 0 === topbar.data("index") ? topbar.css("height", "") : topbar.css("height", self.outerHeight($previousLevelUl, !0) + self.outerHeight(titlebar, !0)), setTimeout(function () {
                    $movedLi.removeClass("moved")
                }, 300)
            })
        },
        breakpoint: function () {
            return $(document).width() <= this.settings.breakPoint || $("html").hasClass("lt-ie9")
        },
        assemble: function () {
            var self = this;
            this.settings.$section.detach(), this.settings.$section.find(".has-dropdown>a").each(function () {
                var $link = $(this),
                    $dropdown = $link.siblings(".dropdown"),
                    url = $link.attr("href");
                if (url && url.length > 1) var $titleLi = $('<li class="title back js-generated"><h5><a href="#"></a></h5></li><li><a class="parent-link js-generated" href="' + url + '">' + $link.text() + "</a></li>");
                else var $titleLi = $('<li class="title back js-generated"><h5><a href="#"></a></h5></li>');
                $titleLi.find("h5>a").html(1 == self.settings.custom_back_text ? "&laquo; " + self.settings.back_text : "&laquo; " + $link.html()), $dropdown.prepend($titleLi)
            }), this.settings.$section.appendTo(this.settings.$topbar), this.sticky()
        },
        height: function (ul) {
            var total = 0,
                self = this;
            return ul.find("> li").each(function () {
                total += self.outerHeight($(this), !0)
            }), total
        },
        sticky: function () {
            var klass = "." + this.settings.stickyClass;
            if ($(klass).length > 0) {
                var distance = $(klass).length ? $(klass).offset().top : 0,
                    $window = $(window),
                    offst = this.outerHeight($(".top-bar"));
                $(window).resize(function () {
                    clearTimeout(t_top), t_top = setTimeout(function () {
                        distance = $(klass).offset().top
                    }, 105)
                }), $window.scroll(function () {
                    $window.scrollTop() > distance ? ($(klass).addClass("fixed"), $("body").css("padding-top", offst)) : $window.scrollTop() <= distance && ($(klass).removeClass("fixed"), $("body").css("padding-top", "0"))
                })
            }
        },
        off: function () {
            $(this.scope).off(".fndtn.topbar"), $(window).off(".fndtn.topbar")
        },
        reflow: function () {}
    }
}(Foundation.zj, this, this.document),
function ($, window, document, undefined) {
    "use strict";
    Foundation.libs.forms = {
        name: "forms",
        version: "4.2.2",
        cache: {},
        settings: {
            disable_class: "no-custom",
            last_combo: null
        },
        init: function (scope, method, options) {
            return "object" == typeof method && $.extend(!0, this.settings, method), "string" != typeof method ? (this.settings.init || this.events(), this.assemble(), this.settings.init) : this[method].call(this, options)
        },
        assemble: function () {
            $('form.custom input[type="radio"]', $(this.scope)).not('[data-customforms="disabled"]').not("." + this.settings.disable_class).each(this.append_custom_markup), $('form.custom input[type="checkbox"]', $(this.scope)).not('[data-customforms="disabled"]').not("." + this.settings.disable_class).each(this.append_custom_markup), $("form.custom select", $(this.scope)).not('[data-customforms="disabled"]').not("." + this.settings.disable_class).not("[multiple=multiple]").each(this.append_custom_select)
        },
        events: function () {
            var self = this;
            $(this.scope).on("click.fndtn.forms", "form.custom span.custom.checkbox", function (e) {
                e.preventDefault(), e.stopPropagation(), self.toggle_checkbox($(this))
            }).on("click.fndtn.forms", "form.custom span.custom.radio", function (e) {
                e.preventDefault(), e.stopPropagation(), self.toggle_radio($(this))
            }).on("change.fndtn.forms", "form.custom select", function (e, force_refresh) {
                $(this).is('[data-customforms="disabled"]') || self.refresh_custom_select($(this), force_refresh)
            }).on("click.fndtn.forms", "form.custom label", function (e) {
                if ($(e.target).is("label")) {
                    var $customCheckbox, $customRadio, $associatedElement = $("#" + self.escape($(this).attr("for"))).not('[data-customforms="disabled"]');
                    0 !== $associatedElement.length && ("checkbox" === $associatedElement.attr("type") ? (e.preventDefault(), $customCheckbox = $(this).find("span.custom.checkbox"), 0 === $customCheckbox.length && ($customCheckbox = $associatedElement.add(this).siblings("span.custom.checkbox").first()), self.toggle_checkbox($customCheckbox)) : "radio" === $associatedElement.attr("type") && (e.preventDefault(), $customRadio = $(this).find("span.custom.radio"), 0 === $customRadio.length && ($customRadio = $associatedElement.add(this).siblings("span.custom.radio").first()), self.toggle_radio($customRadio)))
                }
            }).on("mousedown.fndtn.forms", "form.custom div.custom.dropdown", function () {
                return !1
            }).on("click.fndtn.forms", "form.custom div.custom.dropdown a.current, form.custom div.custom.dropdown a.selector", function (e) {
                var $this = $(this),
                    $dropdown = $this.closest("div.custom.dropdown"),
                    $select = getFirstPrevSibling($dropdown, "select");
                return $dropdown.hasClass("open") || $(self.scope).trigger("click"), e.preventDefault(), !1 === $select.is(":disabled") ? ($dropdown.toggleClass("open"), $dropdown.hasClass("open") ? $(self.scope).on("click.fndtn.forms.customdropdown", function () {
                    $dropdown.removeClass("open"), $(self.scope).off(".fndtn.forms.customdropdown")
                }) : $(self.scope).on(".fndtn.forms.customdropdown"), !1) : void 0
            }).on("click.fndtn.forms touchend.fndtn.forms", "form.custom div.custom.dropdown li", function (e) {
                var $this = $(this),
                    $customDropdown = $this.closest("div.custom.dropdown"),
                    $select = getFirstPrevSibling($customDropdown, "select"),
                    selectedIndex = 0;
                if (e.preventDefault(), e.stopPropagation(), !$(this).hasClass("disabled")) {
                    $("div.dropdown").not($customDropdown).removeClass("open");
                    var $oldThis = $this.closest("ul").find("li.selected");
                    $oldThis.removeClass("selected"), $this.addClass("selected"), $customDropdown.removeClass("open").find("a.current").text($this.text()), $this.closest("ul").find("li").each(function (index) {
                        $this[0] === this && (selectedIndex = index)
                    }), $select[0].selectedIndex = selectedIndex, $select.data("prevalue", $oldThis.html()), $select.trigger("change")
                }
            }), $(window).on("keydown", function (e) {
                var self = (document.activeElement, Foundation.libs.forms),
                    dropdown = $(".custom.dropdown.open");
                if (dropdown.length > 0) {
                    if (e.preventDefault(), 13 === e.which && dropdown.find("li.selected").trigger("click"), 27 === e.which && dropdown.removeClass("open"), e.which >= 65 && e.which <= 90) {
                        var next = self.go_to(dropdown, e.which),
                            current = dropdown.find("li.selected");
                        next && (current.removeClass("selected"), self.scrollTo(next.addClass("selected"), 300))
                    }
                    if (38 === e.which) {
                        var current = dropdown.find("li.selected"),
                            prev = current.prev(":not(.disabled)");
                        prev.length > 0 && (prev.parent()[0].scrollTop = prev.parent().scrollTop() - self.outerHeight(prev), current.removeClass("selected"), prev.addClass("selected"))
                    } else if (40 === e.which) {
                        var current = dropdown.find("li.selected"),
                            next = current.next(":not(.disabled)");
                        next.length > 0 && (next.parent()[0].scrollTop = next.parent().scrollTop() + self.outerHeight(next), current.removeClass("selected"), next.addClass("selected"))
                    }
                }
            }), this.settings.init = !0
        },
        go_to: function (dropdown, character) {
            var lis = dropdown.find("li"),
                count = lis.length;
            if (count > 0)
                for (var i = 0; count > i; i++) {
                    var first_letter = lis.eq(i).text().charAt(0).toLowerCase();
                    if (first_letter === String.fromCharCode(character).toLowerCase()) return lis.eq(i)
                }
        },
        scrollTo: function (el, duration) {
            if (!(0 > duration)) {
                var parent = el.parent(),
                    li_height = this.outerHeight(el),
                    difference = li_height * el.index() - parent.scrollTop(),
                    perTick = difference / duration * 10;
                this.scrollToTimerCache = setTimeout(function () {
                    isNaN(parseInt(perTick, 10)) || (parent[0].scrollTop = parent.scrollTop() + perTick, this.scrollTo(el, duration - 10))
                }.bind(this), 10)
            }
        },
        append_custom_markup: function (idx, sel) {
            var $this = $(sel),
                type = $this.attr("type"),
                $span = $this.next("span.custom." + type);
            $this.parent().hasClass("switch") || $this.addClass("hidden-field"), 0 === $span.length && ($span = $('<span class="custom ' + type + '"></span>').insertAfter($this)), $span.toggleClass("checked", $this.is(":checked")), $span.toggleClass("disabled", $this.is(":disabled"))
        },
        append_custom_select: function (idx, sel) {
            var $listItems, self = Foundation.libs.forms,
                $this = $(sel),
                $customSelect = $this.next("div.custom.dropdown"),
                $customList = $customSelect.find("ul"),
                $selector = ($customSelect.find(".current"), $customSelect.find(".selector")),
                $options = $this.find("option"),
                $selectedOption = $options.filter(":selected"),
                copyClasses = $this.attr("class") ? $this.attr("class").split(" ") : [],
                maxWidth = 0,
                liHtml = "",
                $currentSelect = !1;
            if (0 === $customSelect.length) {
                var customSelectSize = $this.hasClass("small") ? "small" : $this.hasClass("medium") ? "medium" : $this.hasClass("large") ? "large" : $this.hasClass("expand") ? "expand" : "";
                $customSelect = $('<div class="' + ["custom", "dropdown", customSelectSize].concat(copyClasses).filter(function (item, idx, arr) {
                    return "" === item ? !1 : arr.indexOf(item) === idx
                }).join(" ") + '"><a href="#" class="selector"></a><ul /></div>'), $selector = $customSelect.find(".selector"), $customList = $customSelect.find("ul"), liHtml = $options.map(function () {
                    var copyClasses = $(this).attr("class") ? $(this).attr("class") : "";
                    return "<li class='" + copyClasses + "'>" + $(this).html() + "</li>"
                }).get().join(""), $customList.append(liHtml), $currentSelect = $customSelect.prepend('<a href="#" class="current">' + $selectedOption.html() + "</a>").find(".current"), $this.after($customSelect).addClass("hidden-field")
            } else liHtml = $options.map(function () {
                return "<li>" + $(this).html() + "</li>"
            }).get().join(""), $customList.html("").append(liHtml); if (self.assign_id($this, $customSelect), $customSelect.toggleClass("disabled", $this.is(":disabled")), $listItems = $customList.find("li"), self.cache[$customSelect.data("id")] = $listItems.length, $options.each(function (index) {
                this.selected && ($listItems.eq(index).addClass("selected"), $currentSelect && $currentSelect.html($(this).html())), $(this).is(":disabled") && $listItems.eq(index).addClass("disabled")
            }), !$customSelect.is(".small, .medium, .large, .expand")) {
                $customSelect.addClass("open");
                var self = Foundation.libs.forms;
                self.hidden_fix.adjust($customList), maxWidth = self.outerWidth($listItems) > maxWidth ? self.outerWidth($listItems) : maxWidth, Foundation.libs.forms.hidden_fix.reset(), $customSelect.removeClass("open")
            }
        },
        assign_id: function ($select, $customSelect) {
            var id = [+new Date, Foundation.random_str(5)].join("-");
            $select.attr("data-id", id), $customSelect.attr("data-id", id)
        },
        refresh_custom_select: function ($select, force_refresh) {
            var self = this,
                maxWidth = 0,
                $customSelect = $select.next(),
                $options = $select.find("option"),
                $listItems = $customSelect.find("li");
            ($listItems.length !== this.cache[$customSelect.data("id")] || force_refresh) && ($customSelect.find("ul").html(""), $options.each(function () {
                    var $li = $("<li>" + $(this).html() + "</li>");
                    $customSelect.find("ul").append($li)
                }), $options.each(function (index) {
                    this.selected && ($customSelect.find("li").eq(index).addClass("selected"), $customSelect.find(".current").html($(this).html())), $(this).is(":disabled") && $customSelect.find("li").eq(index).addClass("disabled")
                }), $customSelect.removeAttr("style").find("ul").removeAttr("style"), $customSelect.find("li").each(function () {
                    $customSelect.addClass("open"), self.outerWidth($(this)) > maxWidth && (maxWidth = self.outerWidth($(this))), $customSelect.removeClass("open")
                }), $listItems = $customSelect.find("li"), this.cache[$customSelect.data("id")] = $listItems.length)
        },
        toggle_checkbox: function ($element) {
            var $input = $element.prev(),
                input = $input[0];
            !1 === $input.is(":disabled") && (input.checked = input.checked ? !1 : !0, $element.toggleClass("checked"), $input.trigger("change"))
        },
        toggle_radio: function ($element) {
            var $input = $element.prev(),
                $form = $input.closest("form.custom"),
                input = $input[0];
            !1 === $input.is(":disabled") && ($form.find('input[type="radio"][name="' + this.escape($input.attr("name")) + '"]').next().not($element).removeClass("checked"), $element.hasClass("checked") || $element.toggleClass("checked"), input.checked = $element.hasClass("checked"), $input.trigger("change"))
        },
        escape: function (text) {
            return text ? text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&") : ""
        },
        hidden_fix: {
            tmp: [],
            hidden: null,
            adjust: function ($child) {
                var _self = this;
                _self.hidden = $child.parents(), _self.hidden = _self.hidden.add($child).filter(":hidden"), _self.hidden.each(function () {
                    var $elem = $(this);
                    _self.tmp.push($elem.attr("style")), $elem.css({
                        visibility: "hidden",
                        display: "block"
                    })
                })
            },
            reset: function () {
                var _self = this;
                _self.hidden.each(function (i) {
                    var $elem = $(this),
                        _tmp = _self.tmp[i];
                    _tmp === undefined ? $elem.removeAttr("style") : $elem.attr("style", _tmp)
                }), _self.tmp = [], _self.hidden = null
            }
        },
        off: function () {
            $(this.scope).off(".fndtn.forms")
        },
        reflow: function () {}
    };
    var getFirstPrevSibling = function ($el, selector) {
        for (var $el = $el.prev(); $el.length;) {
            if ($el.is(selector)) return $el;
            $el = $el.prev()
        }
        return $()
    }
}(Foundation.zj, this, this.document),
function ($, window, document, undefined) {
    "use strict";
    Foundation.libs.reveal = {
        name: "reveal",
        version: "4.3.2",
        locked: !1,
        settings: {
            animation: "fadeAndPop",
            animationSpeed: 250,
            closeOnBackgroundClick: !0,
            closeOnEsc: !0,
            dismissModalClass: "close-reveal-modal",
            bgClass: "reveal-modal-bg",
            open: function () {},
            opened: function () {},
            close: function () {},
            closed: function () {},
            bg: $(".reveal-modal-bg"),
            css: {
                open: {
                    opacity: 0,
                    visibility: "visible",
                    display: "block"
                },
                close: {
                    opacity: 1,
                    visibility: "hidden",
                    display: "none"
                }
            }
        },
        init: function (scope, method, options) {
            return Foundation.inherit(this, "data_options delay"), "object" == typeof method ? $.extend(!0, this.settings, method) : "undefined" != typeof options && $.extend(!0, this.settings, options), "string" != typeof method ? (this.events(), this.settings.init) : this[method].call(this, options)
        },
        events: function () {
            var self = this;
            return $(this.scope).off(".fndtn.reveal").on("click.fndtn.reveal", "[data-reveal-id]", function (e) {
                if (e.preventDefault(), !self.locked) {
                    var element = $(this),
                        ajax = element.data("reveal-ajax");
                    if (self.locked = !0, "undefined" == typeof ajax) self.open.call(self, element);
                    else {
                        var url = ajax === !0 ? element.attr("href") : ajax;
                        self.open.call(self, element, {
                            url: url
                        })
                    }
                }
            }).on("click.fndtn.reveal touchend", this.close_targets(), function (e) {
                if (e.preventDefault(), !self.locked) {
                    var settings = $.extend({}, self.settings, self.data_options($(".reveal-modal.open"))),
                        bgClicked = $(e.target)[0] === $("." + settings.bgClass)[0];
                    if (bgClicked && !settings.closeOnBackgroundClick) return;
                    self.locked = !0, self.close.call(self, bgClicked ? $(".reveal-modal.open") : $(this).closest(".reveal-modal"))
                }
            }), $(this.scope).hasClass("reveal-modal") ? $(this.scope).on("open.fndtn.reveal", this.settings.open).on("opened.fndtn.reveal", this.settings.opened).on("opened.fndtn.reveal", this.open_video).on("close.fndtn.reveal", this.settings.close).on("closed.fndtn.reveal", this.settings.closed).on("closed.fndtn.reveal", this.close_video) : $(this.scope).on("open.fndtn.reveal", ".reveal-modal", this.settings.open).on("opened.fndtn.reveal", ".reveal-modal", this.settings.opened).on("opened.fndtn.reveal", ".reveal-modal", this.open_video).on("close.fndtn.reveal", ".reveal-modal", this.settings.close).on("closed.fndtn.reveal", ".reveal-modal", this.settings.closed).on("closed.fndtn.reveal", ".reveal-modal", this.close_video), $("body").bind("keyup.reveal", function (event) {
                var open_modal = $(".reveal-modal.open"),
                    settings = $.extend({}, self.settings, self.data_options(open_modal));
                27 === event.which && settings.closeOnEsc && open_modal.foundation("reveal", "close")
            }), !0
        },
        open: function (target, ajax_settings) {
            if (target)
                if ("undefined" != typeof target.selector) var modal = $("#" + target.data("reveal-id"));
                else {
                    var modal = $(this.scope);
                    ajax_settings = target
                } else var modal = $(this.scope);
            if (!modal.hasClass("open")) {
                var open_modal = $(".reveal-modal.open");
                if ("undefined" == typeof modal.data("css-top") && modal.data("css-top", parseInt(modal.css("top"), 10)).data("offset", this.cache_offset(modal)), modal.trigger("open"), open_modal.length < 1 && this.toggle_bg(), "undefined" != typeof ajax_settings && ajax_settings.url) {
                    var self = this,
                        old_success = "undefined" != typeof ajax_settings.success ? ajax_settings.success : null;
                    $.extend(ajax_settings, {
                        success: function (data, textStatus, jqXHR) {
                            $.isFunction(old_success) && old_success(data, textStatus, jqXHR), modal.html(data), $(modal).foundation("section", "reflow"), self.hide(open_modal, self.settings.css.close), self.show(modal, self.settings.css.open)
                        }
                    }), $.ajax(ajax_settings)
                } else this.hide(open_modal, this.settings.css.close), this.show(modal, this.settings.css.open)
            }
        },
        close: function (modal) {
            var modal = modal && modal.length ? modal : $(this.scope),
                open_modals = $(".reveal-modal.open");
            open_modals.length > 0 && (this.locked = !0, modal.trigger("close"), this.toggle_bg(), this.hide(open_modals, this.settings.css.close))
        },
        close_targets: function () {
            var base = "." + this.settings.dismissModalClass;
            return this.settings.closeOnBackgroundClick ? base + ", ." + this.settings.bgClass : base
        },
        toggle_bg: function () {
            0 === $("." + this.settings.bgClass).length && (this.settings.bg = $("<div />", {
                "class": this.settings.bgClass
            }).appendTo("body")), this.settings.bg.filter(":visible").length > 0 ? this.hide(this.settings.bg) : this.show(this.settings.bg)
        },
        show: function (el, css) {
            if (css) {
                if (0 === el.parent("body").length) {
                    var placeholder = el.wrap('<div style="display: none;" />').parent();
                    el.on("closed.fndtn.reveal.wrapped", function () {
                        el.detach().appendTo(placeholder), el.unwrap().unbind("closed.fndtn.reveal.wrapped")
                    }), el.detach().appendTo("body")
                }
                if (/pop/i.test(this.settings.animation)) {
                    css.top = $(window).scrollTop() - el.data("offset") + "px";
                    var end_css = {
                        top: $(window).scrollTop() + el.data("css-top") + "px",
                        opacity: 1
                    };
                    return this.delay(function () {
                        return el.css(css).animate(end_css, this.settings.animationSpeed, "linear", function () {
                            this.locked = !1, el.trigger("opened")
                        }.bind(this)).addClass("open")
                    }.bind(this), this.settings.animationSpeed / 2)
                }
                if (/fade/i.test(this.settings.animation)) {
                    var end_css = {
                        opacity: 1
                    };
                    return this.delay(function () {
                        return el.css(css).animate(end_css, this.settings.animationSpeed, "linear", function () {
                            this.locked = !1, el.trigger("opened")
                        }.bind(this)).addClass("open")
                    }.bind(this), this.settings.animationSpeed / 2)
                }
                return el.css(css).show().css({
                    opacity: 1
                }).addClass("open").trigger("opened")
            }
            return /fade/i.test(this.settings.animation) ? el.fadeIn(this.settings.animationSpeed / 2) : el.show()
        },
        hide: function (el, css) {
            if (css) {
                if (/pop/i.test(this.settings.animation)) {
                    var end_css = {
                        top: -$(window).scrollTop() - el.data("offset") + "px",
                        opacity: 0
                    };
                    return this.delay(function () {
                        return el.animate(end_css, this.settings.animationSpeed, "linear", function () {
                            this.locked = !1, el.css(css).trigger("closed")
                        }.bind(this)).removeClass("open")
                    }.bind(this), this.settings.animationSpeed / 2)
                }
                if (/fade/i.test(this.settings.animation)) {
                    var end_css = {
                        opacity: 0
                    };
                    return this.delay(function () {
                        return el.animate(end_css, this.settings.animationSpeed, "linear", function () {
                            this.locked = !1, el.css(css).trigger("closed")
                        }.bind(this)).removeClass("open")
                    }.bind(this), this.settings.animationSpeed / 2)
                }
                return el.hide().css(css).removeClass("open").trigger("closed")
            }
            return /fade/i.test(this.settings.animation) ? el.fadeOut(this.settings.animationSpeed / 2) : el.hide()
        },
        close_video: function () {
            var video = $(this).find(".flex-video"),
                iframe = video.find("iframe");
            iframe.length > 0 && (iframe.attr("data-src", iframe[0].src), iframe.attr("src", "about:blank"), video.hide())
        },
        open_video: function () {
            var video = $(this).find(".flex-video"),
                iframe = video.find("iframe");
            if (iframe.length > 0) {
                var data_src = iframe.attr("data-src");
                if ("string" == typeof data_src) iframe[0].src = iframe.attr("data-src");
                else {
                    var src = iframe[0].src;
                    iframe[0].src = undefined, iframe[0].src = src
                }
                video.show()
            }
        },
        cache_offset: function (modal) {
            var offset = modal.show().height() + parseInt(modal.css("top"), 10);
            return modal.hide(), offset
        },
        off: function () {
            $(this.scope).off(".fndtn.reveal")
        },
        reflow: function () {}
    }
}(Foundation.zj, this, this.document),
function ($, window, document) {
    "use strict";
    Foundation.libs.section = {
        name: "section",
        version: "4.2.2",
        settings: {
            deep_linking: !1,
            small_breakpoint: 768,
            one_up: !0,
            section_selector: "[data-section]",
            region_selector: "section, .section, [data-section-region]",
            title_selector: ".title, [data-section-title]",
            active_region_selector: "section.active, .section.active, .active[data-section-region]",
            content_selector: ".content, [data-section-content]",
            nav_selector: '[data-section="vertical-nav"], [data-section="horizontal-nav"]',
            callback: function () {}
        },
        init: function (scope, method, options) {
            var self = this;
            return Foundation.inherit(this, "throttle data_options position_right offset_right"), "object" == typeof method && $.extend(!0, self.settings, method), "string" != typeof method ? (this.set_active_from_hash(), this.events(), !0) : this[method].call(this, options)
        },
        events: function () {
            var self = this;
            $(this.scope).on("click.fndtn.section", "[data-section] .title, [data-section] [data-section-title]", function (e) {
                var $this = $(this),
                    section = $this.closest(self.settings.region_selector);
                section.children(self.settings.content_selector).length > 0 && (self.toggle_active.call(this, e, self), self.reflow())
            }), $(window).on("resize.fndtn.section", self.throttle(function () {
                self.resize.call(this)
            }, 30)).on("hashchange", function () {
                self.settings.toggled || (self.set_active_from_hash(), $(this).trigger("resize"))
            }).trigger("resize"), $(document).on("click.fndtn.section", function (e) {
                $(e.target).closest(self.settings.title_selector).length < 1 && $(self.settings.nav_selector).children(self.settings.region_selector).removeClass("active").attr("style", "")
            })
        },
        toggle_active: function (e, self) {
            var $this = $(this),
                self = Foundation.libs.section,
                region = $this.closest(self.settings.region_selector),
                content = $this.siblings(self.settings.content_selector),
                parent = region.parent(),
                settings = $.extend({}, self.settings, self.data_options(parent)),
                prev_active_section = parent.children(self.settings.active_region_selector);
            if (self.settings.toggled = !0, !settings.deep_linking && content.length > 0 && e.preventDefault(), region.hasClass("active"))(self.small(parent) || self.is_vertical_nav(parent) || self.is_horizontal_nav(parent) || self.is_accordion(parent)) && (prev_active_section[0] !== region[0] || prev_active_section[0] === region[0] && !settings.one_up) && region.removeClass("active").attr("style", "");
            else {
                var prev_active_section = parent.children(self.settings.active_region_selector),
                    title_height = self.outerHeight(region.children(self.settings.title_selector));
                (self.small(parent) || settings.one_up) && (self.small(parent) ? prev_active_section.attr("style", "") : prev_active_section.attr("style", "visibility: hidden; padding-top: " + title_height + "px;")), self.small(parent) ? region.attr("style", "") : region.css("padding-top", title_height), region.addClass("active"), prev_active_section.length > 0 && prev_active_section.removeClass("active").attr("style", ""), self.is_vertical_tabs(parent) && (content.css("display", "block"), null !== prev_active_section && prev_active_section.children(self.settings.content_selector).css("display", "none"))
            }
            setTimeout(function () {
                self.settings.toggled = !1
            }, 300), settings.callback()
        },
        resize: function () {
            var self = Foundation.libs.section,
                sections = $(self.settings.section_selector);
            sections.each(function () {
                var $this = $(this),
                    active_section = $this.children(self.settings.active_region_selector),
                    settings = $.extend({}, self.settings, self.data_options($this));
                if (active_section.length > 1) active_section.not(":first").removeClass("active").attr("style", "");
                else if (active_section.length < 1 && !self.is_vertical_nav($this) && !self.is_horizontal_nav($this) && !self.is_accordion($this)) {
                    var first = $this.children(self.settings.region_selector).first();
                    (settings.one_up || !self.small($this)) && first.addClass("active"), self.small($this) ? first.attr("style", "") : first.css("padding-top", self.outerHeight(first.children(self.settings.title_selector)))
                }
                self.small($this) ? active_section.attr("style", "") : active_section.css("padding-top", self.outerHeight(active_section.children(self.settings.title_selector))), self.position_titles($this), self.is_horizontal_nav($this) && !self.small($this) || self.is_vertical_tabs($this) && !self.small($this) ? self.position_content($this) : self.position_content($this, !1)
            })
        },
        is_vertical_nav: function (el) {
            return /vertical-nav/i.test(el.data("section"))
        },
        is_horizontal_nav: function (el) {
            return /horizontal-nav/i.test(el.data("section"))
        },
        is_accordion: function (el) {
            return /accordion/i.test(el.data("section"))
        },
        is_horizontal_tabs: function (el) {
            return /^tabs$/i.test(el.data("section"))
        },
        is_vertical_tabs: function (el) {
            return /vertical-tabs/i.test(el.data("section"))
        },
        set_active_from_hash: function () {
            var hash = window.location.hash.substring(1),
                sections = $("[data-section]"),
                self = this;
            sections.each(function () {
                var section = $(this),
                    settings = $.extend({}, self.settings, self.data_options(section));
                if (hash.length > 0 && settings.deep_linking)
                    for (var regions = section.children(self.settings.region_selector).attr("style", "").removeClass("active"), hash_regions = regions.map(function () {
                            var content = $(self.settings.content_selector, this),
                                content_slug = content.data("slug");
                            return new RegExp(content_slug, "i").test(hash) ? content : void 0
                        }), count = hash_regions.length, i = count - 1; i >= 0; i--) $(hash_regions[i]).parent().addClass("active")
            })
        },
        position_titles: function (section, off) {
            var self = this,
                titles = section.children(this.settings.region_selector).map(function () {
                    return $(this).children(self.settings.title_selector)
                }),
                previous_width = 0,
                previous_height = 0,
                self = this;
            "boolean" == typeof off ? titles.attr("style", "") : titles.each(function () {
                self.is_vertical_tabs(section) ? ($(this).css("top", previous_height), previous_height += self.outerHeight($(this))) : (self.rtl ? $(this).css("right", previous_width) : $(this).css("left", previous_width), previous_width += self.outerWidth($(this)))
            })
        },
        position_content: function (section, off) {
            var self = this,
                regions = section.children(self.settings.region_selector),
                titles = regions.map(function () {
                    return $(this).children(self.settings.title_selector)
                }),
                content = regions.map(function () {
                    return $(this).children(self.settings.content_selector)
                });
            if ("boolean" == typeof off) content.attr("style", ""), section.attr("style", ""), content.css("minHeight", ""), content.css("maxWidth", "");
            else if (self.is_vertical_tabs(section) && !self.small(section)) {
                var content_min_height = 0,
                    content_min_width = Number.MAX_VALUE,
                    title_width = null;
                regions.each(function () {
                    var region = $(this),
                        title = region.children(self.settings.title_selector),
                        content = region.children(self.settings.content_selector),
                        content_width = 0;
                    title_width = self.outerWidth(title), content_width = self.outerWidth(section) - title_width, content_min_width > content_width && (content_min_width = content_width), content_min_height += self.outerHeight(title), $(this).hasClass("active") || content.css("display", "none")
                }), regions.each(function () {
                    var content = $(this).children(self.settings.content_selector);
                    content.css("minHeight", content_min_height), content.css("maxWidth", content_min_width - 2)
                })
            } else regions.each(function () {
                var region = $(this),
                    title = region.children(self.settings.title_selector),
                    content = region.children(self.settings.content_selector);
                content.css(self.rtl ? {
                    right: self.position_right(title) + 1,
                    top: self.outerHeight(title) - 2
                } : {
                    left: title.position().left - 1,
                    top: self.outerHeight(title) - 2
                })
            }), section.height("function" == typeof Zepto ? this.outerHeight($(titles[0])) : this.outerHeight($(titles[0])) - 2)
        },
        position_right: function (el) {
            var self = this,
                section = el.closest(this.settings.section_selector),
                regions = section.children(this.settings.region_selector),
                section_width = el.closest(this.settings.section_selector).width(),
                offset = regions.map(function () {
                    return $(this).children(self.settings.title_selector)
                }).length;
            return section_width - el.position().left - el.width() * (el.index() + 1) - offset
        },
        reflow: function (scope) {
            var scope = scope || document;
            $(this.settings.section_selector, scope).trigger("resize")
        },
        small: function (el) {
            var settings = $.extend({}, this.settings, this.data_options(el));
            return this.is_horizontal_tabs(el) ? !1 : el && this.is_accordion(el) ? !0 : $("html").hasClass("lt-ie9") ? !0 : $("html").hasClass("ie8compat") ? !0 : $(this.scope).width() < settings.small_breakpoint
        },
        off: function () {
            $(this.scope).off(".fndtn.section"), $(window).off(".fndtn.section"), $(document).off(".fndtn.section")
        }
    }
}(Foundation.zj, this, this.document),
function ($, document, undefined) {
    function raw(s) {
        return s
    }

    function decoded(s) {
        return decodeURIComponent(s.replace(pluses, " "))
    }
    var pluses = /\+/g,
        config = $.cookie = function (key, value, options) {
            if (value !== undefined) {
                if (options = $.extend({}, config.defaults, options), null === value && (options.expires = -1), "number" == typeof options.expires) {
                    var days = options.expires,
                        t = options.expires = new Date;
                    t.setDate(t.getDate() + days)
                }
                return value = config.json ? JSON.stringify(value) : String(value), document.cookie = [encodeURIComponent(key), "=", config.raw ? value : encodeURIComponent(value), options.expires ? "; expires=" + options.expires.toUTCString() : "", options.path ? "; path=" + options.path : "", options.domain ? "; domain=" + options.domain : "", options.secure ? "; secure" : ""].join("")
            }
            for (var decode = config.raw ? raw : decoded, cookies = document.cookie.split("; "), i = 0, l = cookies.length; l > i; i++) {
                var parts = cookies[i].split("=");
                if (decode(parts.shift()) === key) {
                    var cookie = decode(parts.join("="));
                    return config.json ? JSON.parse(cookie) : cookie
                }
            }
            return null
        };
    config.defaults = {}, $.removeCookie = function (key, options) {
        return null !== $.cookie(key) ? ($.cookie(key, null, options), !0) : !1
    }
}(Foundation.zj, document),
function (t, e) {
    "object" == typeof exports ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : t.Spinner = e()
}(this, function () {
    "use strict";

    function o(t, e) {
        var o, i = document.createElement(t || "div");
        for (o in e) i[o] = e[o];
        return i
    }

    function n(t) {
        for (var e = 1, i = arguments.length; i > e; e++) t.appendChild(arguments[e]);
        return t
    }

    function s(t, o, n, s) {
        var a = ["opacity", o, ~~ (100 * t), n, s].join("-"),
            f = .01 + n / s * 100,
            l = Math.max(1 - (1 - t) / o * (100 - f), t),
            d = i.substring(0, i.indexOf("Animation")).toLowerCase(),
            u = d && "-" + d + "-" || "";
        return e[a] || (r.insertRule("@" + u + "keyframes " + a + "{0%{opacity:" + l + "}" + f + "%{opacity:" + t + "}" + (f + .01) + "%{opacity:1}" + (f + o) % 100 + "%{opacity:" + t + "}100%{opacity:" + l + "}}", r.cssRules.length), e[a] = 1), a
    }

    function a(e, i) {
        var n, r, o = e.style;
        if (void 0 !== o[i]) return i;
        for (i = i.charAt(0).toUpperCase() + i.slice(1), r = 0; r < t.length; r++)
            if (n = t[r] + i, void 0 !== o[n]) return n
    }

    function f(t, e) {
        for (var i in e) t.style[a(t, i) || i] = e[i];
        return t
    }

    function l(t) {
        for (var e = 1; e < arguments.length; e++) {
            var i = arguments[e];
            for (var o in i) void 0 === t[o] && (t[o] = i[o])
        }
        return t
    }

    function d(t) {
        for (var e = {
            x: t.offsetLeft,
            y: t.offsetTop
        }; t = t.offsetParent;) e.x += t.offsetLeft, e.y += t.offsetTop;
        return e
    }

    function p(t) {
        return "undefined" == typeof this ? new p(t) : void(this.opts = l(t || {}, p.defaults, u))
    }

    function c() {
        function t(t, e) {
            return o("<" + t + ' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">', e)
        }
        r.addRule(".spin-vml", "behavior:url(#default#VML)"), p.prototype.lines = function (e, i) {
            function s() {
                return f(t("group", {
                    coordsize: r + " " + r,
                    coordorigin: -o + " " + -o
                }), {
                    width: r,
                    height: r
                })
            }

            function u(e, r, a) {
                n(l, n(f(s(), {
                    rotation: 360 / i.lines * e + "deg",
                    left: ~~r
                }), n(f(t("roundrect", {
                    arcsize: i.corners
                }), {
                    width: o,
                    height: i.width,
                    left: i.radius,
                    top: -i.width >> 1,
                    filter: a
                }), t("fill", {
                    color: i.color,
                    opacity: i.opacity
                }), t("stroke", {
                    opacity: 0
                }))))
            }
            var d, o = i.length + i.width,
                r = 2 * o,
                a = 2 * -(i.width + i.length) + "px",
                l = f(s(), {
                    position: "absolute",
                    top: a,
                    left: a
                });
            if (i.shadow)
                for (d = 1; d <= i.lines; d++) u(d, -2, "progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");
            for (d = 1; d <= i.lines; d++) u(d);
            return n(e, l)
        }, p.prototype.opacity = function (t, e, i, o) {
            var n = t.firstChild;
            o = o.shadow && o.lines || 0, n && e + o < n.childNodes.length && (n = n.childNodes[e + o], n = n && n.firstChild, n = n && n.firstChild, n && (n.opacity = i))
        }
    }
    var i, t = ["webkit", "Moz", "ms", "O"],
        e = {}, r = function () {
            var t = o("style", {
                type: "text/css"
            });
            return n(document.getElementsByTagName("head")[0], t), t.sheet || t.styleSheet
        }(),
        u = {
            lines: 12,
            length: 7,
            width: 5,
            radius: 10,
            rotate: 0,
            corners: 1,
            color: "#000",
            direction: 1,
            speed: 1,
            trail: 100,
            opacity: .25,
            fps: 20,
            zIndex: 2e9,
            className: "spinner",
            top: "auto",
            left: "auto",
            position: "relative"
        };
    p.defaults = {}, l(p.prototype, {
        spin: function (t) {
            this.stop();
            var a, l, e = this,
                n = e.opts,
                r = e.el = f(o(0, {
                    className: n.className
                }), {
                    position: n.position,
                    width: 0,
                    zIndex: n.zIndex
                }),
                s = n.radius + n.length + n.width;
            if (t && (t.insertBefore(r, t.firstChild || null), l = d(t), a = d(r), f(r, {
                left: ("auto" == n.left ? l.x - a.x + (t.offsetWidth >> 1) : parseInt(n.left, 10) + s) + "px",
                top: ("auto" == n.top ? l.y - a.y + (t.offsetHeight >> 1) : parseInt(n.top, 10) + s) + "px"
            })), r.setAttribute("role", "progressbar"), e.lines(r, e.opts), !i) {
                var c, u = 0,
                    p = (n.lines - 1) * (1 - n.direction) / 2,
                    h = n.fps,
                    m = h / n.speed,
                    y = (1 - n.opacity) / (m * n.trail / 100),
                    g = m / n.lines;
                ! function v() {
                    u++;
                    for (var t = 0; t < n.lines; t++) c = Math.max(1 - (u + (n.lines - t) * g) % m * y, n.opacity), e.opacity(r, t * n.direction + p, c, n);
                    e.timeout = e.el && setTimeout(v, ~~ (1e3 / h))
                }()
            }
            return e
        },
        stop: function () {
            var t = this.el;
            return t && (clearTimeout(this.timeout), t.parentNode && t.parentNode.removeChild(t), this.el = void 0), this
        },
        lines: function (t, e) {
            function d(t, i) {
                return f(o(), {
                    position: "absolute",
                    width: e.length + e.width + "px",
                    height: e.width + "px",
                    background: t,
                    boxShadow: i,
                    transformOrigin: "left",
                    transform: "rotate(" + ~~(360 / e.lines * r + e.rotate) + "deg) translate(" + e.radius + "px,0)",
                    borderRadius: (e.corners * e.width >> 1) + "px"
                })
            }
            for (var l, r = 0, a = (e.lines - 1) * (1 - e.direction) / 2; r < e.lines; r++) l = f(o(), {
                position: "absolute",
                top: 1 + ~(e.width / 2) + "px",
                transform: e.hwaccel ? "translate3d(0,0,0)" : "",
                opacity: e.opacity,
                animation: i && s(e.opacity, e.trail, a + r * e.direction, e.lines) + " " + 1 / e.speed + "s linear infinite"
            }), e.shadow && n(l, f(d("#000", "0 0 4px #000"), {
                top: "2px"
            })), n(t, n(l, d(e.color, "0 0 1px rgba(0,0,0,.1)")));
            return t
        },
        opacity: function (t, e, i) {
            e < t.childNodes.length && (t.childNodes[e].style.opacity = i)
        }
    });
    var h = f(o("group"), {
        behavior: "url(#default#VML)"
    });
    return !a(h, "transform") && h.adj ? c() : i = a(h, "animation"), p
}),
function (window, $) {
    "use strict";
    var ContentFilter = function ($el) {
        this.$el = $el, this.DOM = {
            $showFiltersButton: this.$el.find(".js-content-filters-show"),
            $clearFiltersButton: this.$el.find(".js-content-filters_clear-button"),
            $availableFilters: this.$el.find(".content-filters_selection"),
            $filterCheckboxes: this.$el.find(".content-filters_options .checkbox.custom"),
            $currentFilters: this.$el.find(".content-filters_filtered-by"),
            $allCatsLabel: this.$el.find("#checkbox-all").parent(),
            $allCatsLabelText: this.$el.find("#checkbox-all").parent().text(),
            $categoryFilterButton: this.$el.find(".js-content-filters_apply-button"),
            $levelFilterButtons: this.$el.find(".filter-level a.button"),
            $orderFilterButtons: this.$el.find(".filter-order a.button")
        }, this.TEMPLATES = {
            $filterLabel: $("<span />", {
                "class": "label secondary radius"
            }),
            $filterLabelClose: $("<a />", {
                "class": "close",
                href: "#",
                text: "×"
            })
        }, this.init()
    };
    ContentFilter.prototype = {
        init: function () {
            this.DOM.$availableFilters.addClass("js"), this.bindEvents(), this.checkForFilters(), this.DOM.$availableFilters.css("display", ""), this.DOM.$currentFilters.css("display", "")
        },
        bindEvents: function () {
            var that = this;
            this.DOM.$showFiltersButton.on("click", function (e) {
                e.preventDefault(), that.showAvailableFilters(), that.showCurrentFilters()
            }), this.DOM.$currentFilters.on("click", ".close", function (e) {
                e.preventDefault(), that.removeFilter($(this))
            }), this.DOM.$clearFiltersButton.on("click", function (e) {
                e.preventDefault(), that.removeAllFilters()
            }), this.DOM.$availableFilters.find("input[type=checkbox]").on("change", function (e) {
                e.preventDefault(), that.checkWhatWasSelected($(this)), that.grabCurrentFilters()
            }), this.DOM.$categoryFilterButton.on("click", function () {
                that.trackEvent("Category Filter", that.currentFilters.join(", "))
            }), this.DOM.$levelFilterButtons.on("click", function () {
                that.trackEvent("Difficulty Level", $(this).attr("data-value"))
            }), this.DOM.$orderFilterButtons.on("click", function () {
                that.trackEvent("Order", $(this).attr("data-value"))
            })
        },
        checkForFilters: function () {
            this.hasFiltersApplied() ? (this.grabCurrentFilters(), this.buildCurrentFilterBadges(), this.showCurrentFilters()) : this.selectAllFilters()
        },
        showAvailableFilters: function () {
            this.DOM.$availableFilters.toggleClass("content-filters_selection--visible")
        },
        grabCurrentFilters: function () {
            var that = this;
            this.currentFilters = [], this.DOM.$filterCheckboxes.filter(".checked").each(function () {
                that.currentFilters.push($(this).parent().text())
            })
        },
        buildCurrentFilterBadges: function () {
            for (var i = 0; i < this.currentFilters.length; i++) {
                var $label = this.TEMPLATES.$filterLabel.clone(),
                    $removeButton = this.TEMPLATES.$filterLabelClose.clone().data("filter-name", this.currentFilters[i]);
                $label.text(this.currentFilters[i]), $label.append($removeButton), $label.appendTo(this.DOM.$currentFilters.find("p"))
            }
        },
        showCurrentFilters: function () {
            this.hasFiltersApplied() && this.DOM.$currentFilters.toggleClass("content-filters_filtered-by--visible")
        },
        hasFiltersApplied: function () {
            return this.DOM.$availableFilters.find("input[type=checkbox]:not(#checkbox-all)").filter(":checked").length
        },
        checkWhatWasSelected: function ($el) {
            var changedFilter = $el.parent().text();
            changedFilter === this.DOM.$allCatsLabelText ? this.selectAllFilters() : this.toggleInput(this.DOM.$allCatsLabelText, !1)
        },
        selectFilter: function () {},
        selectAllFilters: function () {
            this.uncheckAllInputs(), this.toggleInput(this.DOM.$allCatsLabelText, !0)
        },
        removeFilter: function ($el) {
            var removedFilter = $el.data("filter-name");
            this.toggleInput(removedFilter, !1), 0 == $("input[type=checkbox]:checked").length && this.DOM.$allCatsLabel.trigger("click"), this.submitForm()
        },
        removeAllFilters: function () {
            this.DOM.$allCatsLabel.trigger("click"), this.submitForm()
        },
        toggleInput: function (filter, selected) {
            this.DOM.$availableFilters.find("label:contains(" + filter + ")").find("input[type=checkbox]").prop("checked", selected), this.DOM.$availableFilters.find("label:contains(" + filter + ")").find(".custom.checkbox").toggleClass("checked", selected)
        },
        uncheckAllInputs: function () {
            this.DOM.$availableFilters.find("input[type=checkbox]").prop("checked", !1), this.DOM.$filterCheckboxes.removeClass("checked")
        },
        submitForm: function () {
            this.DOM.$availableFilters.find("form").submit()
        },
        trackEvent: function (action, label) {
            gaQueue.track(["_trackEvent", "Channel Filters", action, label])
        }
    }, window.ContentFilter = ContentFilter
}(window, "undefined" != typeof jQuery ? jQuery : Zepto),
function (window, $) {
    "use strict";
    var TwoStageForm = function ($el) {
        this.$el = $el, this.isStageTwo = !1, this.DOM = {
            $submitButton: this.$el.find(".form-actions .success"),
            $stageDependantField: this.$el.find(".js-stage-dependant-field"),
            $submitDependantField: this.$el.find(".js-submit-dependant-field"),
            $requiredFields: this.$el.find("[required]")
        }, this.init()
    };
    TwoStageForm.prototype = {
        init: function () {
            this.$el.addClass("js"), this.bindEvents()
        },
        bindEvents: function () {
            var that = this;
            this.DOM.$submitButton.on("click", function (e) {
                that.checkComments(e)
            })
        },
        checkComments: function (e) {
            this.validateStages() ? this.validateStages() && !this.validateForm() && e.preventDefault() : e.preventDefault()
        },
        validateStages: function () {
            return "" !== this.DOM.$stageDependantField.val() ? (this.setStageTwo(), !0) : (this.DOM.$stageDependantField.focus(), !1)
        },
        validateForm: function () {
            if (!this.isStageTwo) return this.isStageTwo = !0, !1;
            var allValid = !0;
            return this.DOM.$requiredFields.each(function () {
                "" === $(this).val() && ($(this).addClass("error"), allValid = !1)
            }), allValid ? !0 : !1
        },
        setStageTwo: function () {
            this.$el.addClass("stage-two")
        }
    }, window.TwoStageForm = TwoStageForm
}(window, "undefined" != typeof jQuery ? jQuery : Zepto),
function (window, $) {
    "use strict";
    var ImageSwapper = function ($el) {
        this.$el = $el, this.DOM = {
            $featureImage: this.$el.find("figure img"),
            $galleryImages: this.$el.find(".product_gallery_list-item")
        }, this.init()
    };
    ImageSwapper.prototype = {
        init: function () {
            this.$el.addClass("js"), this.bindEvents()
        },
        bindEvents: function () {
            var that = this;
            this.DOM.$galleryImages.on("click", function (e) {
                e.preventDefault(), that.swapImage($(this))
            })
        },
        swapImage: function ($el) {
            var imgSrc = $el.find("img").attr("src");
            this.DOM.$featureImage.attr("src", imgSrc)
        }
    }, window.ImageSwapper = ImageSwapper
}(window, "undefined" != typeof jQuery ? jQuery : Zepto);
var sitepoint = sitepoint || {};
! function ($) {
    function searchBar() {
        $(".top-bar_search button").on("click", function (e) {
            "" === $(this).prev().val() && (e.preventDefault(), $(this).prev().focus())
        })
    }

    function trackSharing() {
        $(".article_share-option a").on("click", function () {
            gaQueue.track(["_trackEvent", "Social Media", $("h1.article_title").text(), "Twitter Share"])
        })
    }

    function rotateLandingPageText(el) {
        function applyRotate() {
            totalStatements === index ? rotateTimer = null : index++, $el.find("strong").removeClass("visible").eq(index).addClass("visible")
        }
        var rotateTimer, $el = el,
            $statements = $el.find("strong"),
            totalStatements = $statements.length - 1,
            index = 0;
        rotateTimer = setInterval(applyRotate, 8e3)
    }
    $(document).foundation(), $(document).ready(function () {
        Modernizr.svg || $(".top-bar .logo img").attr("src", "/boreshaMkulima/public/img/logo.png"), $(".landing-page-rotator").length && rotateLandingPageText($(".landing-page-rotator")), $(".channel-nav").length && $(window).resize(sitepoint.homeNavRePaint), sitepoint.contentFilter = new ContentFilter($(".content-filters")), sitepoint.twoStageForm = new TwoStageForm($(".comment_form")), sitepoint.imageSwapper = new ImageSwapper($(".product_gallery")), sitepoint.orientationSwitch(), searchBar(), trackSharing()
    }), sitepoint.timerNav = null, sitepoint.homeNavRePaint = function () {
        window.clearTimeout(sitepoint.timerNav), sitepoint.timerNav = window.setTimeout(function () {
            $(".channel-nav_link").css("z-index", 1)
        }, 84)
    }, sitepoint.orientationSwitch = function () {
        var orientationChangeEvent = "onorientationchange" in window ? "orientationchange" : "resize";
        $(window).on(orientationChangeEvent, function () {
            $(".channel-nav").length && sitepoint.homeNavRePaint()
        })
    }
}("undefined" != typeof jQuery ? jQuery : Zepto),
function ($) {
    var init = function () {
        if ($(".button-more").length) {
            var spinnerOpts = {
                lines: 13,
                length: 3,
                width: 2,
                radius: 7,
                corners: 1,
                rotate: 0,
                direction: 1,
                color: "#000",
                speed: .7,
                trail: 72,
                shadow: !1,
                hwaccel: !1,
                className: "spinner",
                zIndex: 2e9,
                top: "auto",
                left: "auto"
            }, $moreButton = $(".button-more");
            $moreButton.on("click", fetch), $(window).on("resize", organiseFeatured), afterLoad();
            var spinner = new Spinner(spinnerOpts).spin();
            $moreButton.append(spinner.el)
        }
    }, fetch = function (event) {
            $button = $(event.target), $button.toggleClass("loading", !0);
            var ajaxParams = {
                block: getBlock() + 1,
                offset: getPosition(),
                "term-taxonomy": $button.attr("data-term-taxonomy"),
                "term-id": $button.attr("data-term-id"),
                level: levelValue(),
                order: orderValue()
            };
            ajaxParams = $.extend({}, ajaxParams, ajaxCategoryFilterParam()), $.ajax({
                url: "/wp-content/themes/sitepoint/ajax-block.php",
                method: "GET",
                data: ajaxParams,
                success: function (data) {
                    var newContent = $(data.replace(/http:\/\/www\.sitepoint\.com\/wp\-content\/uploads/g, "http://dab1nmslvvntp.cloudfront.net/wp-content/uploads"));
                    $(".tile:last").after(newContent), "No more posts" == newContent.text() && $button.prop("disabled", !0), afterLoad(), checkMoreButton(), updateHistory(), DISQUSWIDGETS && DISQUSWIDGETS.loadCount && DISQUSWIDGETS.loadCount($)
                },
                error: function () {
                    var msg = "Sorry, there was an error fetching more posts",
                        error = $("<div/>", {
                            text: msg,
                            "class": "alert-box alert radius"
                        });
                    $("div.button-more-container").html(error)
                },
                complete: function () {
                    $button.toggleClass("loading", !1)
                }
            })
        }, levelValue = function () {
            return $(".filter-level a.selected").attr("data-value")
        }, orderValue = function () {
            return $(".filter-order a.selected").attr("data-value")
        }, ajaxCategoryFilterParam = function () {
            for (var filter = {}, checkboxes = $(".content-filters_options input[type=checkbox]"), i = 0; i < checkboxes.length; i++) {
                var checkbox = $(checkboxes[i]);
                checkbox.prop("checked") && (filter[checkbox.prop("name")] = "on")
            }
            return filter
        }, afterLoad = function () {
            organiseFeatured()
        }, organiseFeatured = function () {
            var tileWidth = $(".tile:not(.featured)").width(),
                container = $(".tile:first").parent(),
                containerWidth = container.width(),
                containerOffsetLeft = container.offset().left,
                tilesPerRow = Math.round(containerWidth / tileWidth);
            1 != tilesPerRow && $(".featured").each(function (i, e) {
                var tile = $(e),
                    prev = tile.prev(),
                    secondLastColIndex = tilesPerRow - 2;
                if (prev.length > 0) {
                    var prevTileLeft = prev.offset().left - containerOffsetLeft,
                        prevTileColIndex = Math.round(prevTileLeft / tileWidth),
                        isBorked = prevTileColIndex == secondLastColIndex;
                    isBorked && prev.before(tile)
                }
            })
        }, checkMoreButton = function () {
            $(".tile:last").attr("data-more") || $("div.button-more-container").html('<div class="alert-box secondary">No (more) posts.</div>')
        }, updateHistory = function () {
            var base = location.origin + location.pathname,
                qs = "?block=" + getBlock();
            if ($button.attr("data-term-taxonomy")) {
                qs += "&level=" + levelValue(), qs += "&order=" + orderValue();
                var filters = $(".content-filters_options input[type=checkbox]:checked");
                filters.each(function (i, e) {
                    var el = $(e);
                    el.prop("checked") && (qs += "&" + encodeURI(el.prop("name")) + "=on")
                })
            }
            var url = base + qs;
            history.replaceState(null, null, url)
        }, getPosition = function () {
            return parseInt($(".post-tile:last").attr("data-offset"), 10) + 1
        }, getBlock = function () {
            return parseInt($(".tile:last").attr("data-block"), 10)
        };
    $(document).ready(function () {
        init()
    })
}(jQuery),
function ($) {
    $(document).ready(function () {
        function Resizer() {
            function init() {
                els.length > 0 && ($(window).resize(delayedResize), initPanels())
            }

            function initPanels() {
                els.each(function (i, e) {
                    var isEvenCell = i % 2 == 1,
                        isLastCell = i == els.length - 1;
                    if (!isLastCell || isEvenCell) {
                        var pair = isEvenCell ? els[i - 1] : pair = els[i + 1],
                            panel = new Panel($(e), $(pair));
                        panels.push(panel)
                    }
                })
            }

            function resizePanels() {
                var displayIsSmall = $(document).width() < 768;
                if (displayIsSmall) els.css("height", "auto");
                else
                    for (var i = 0; i < panels.length; i += 2) panels[i].resize()
            }

            function delayedResize() {
                var delay = 200;
                null !== windowResizeEvent && clearTimeout(windowResizeEvent), windowResizeEvent = setTimeout(resizePanels, delay)
            }
            var windowResizeEvent = null,
                els = $(".page--product--books .panel.product"),
                panels = [];
            init()
        }

        function Panel(el, pair) {
            function init() {
                el.find("img").ready(This.resize)
            }
            var This = this;
            this.resize = function () {
                el.css("height", "auto"), pair.css("height", "auto");
                var newHeight = Math.max(el.height(), pair.height());
                el.height(newHeight), pair.height(newHeight)
            }, init()
        }
        new Resizer
    })
}(jQuery),
function ($) {
    var Search = function ($input, $dropdown) {
        var that = this;
        this.$input = $input, this.$dropdown = $dropdown, this.$searchForEl = $dropdown.find("[data-role=search-for]"), this.searchLinkEl = this.$searchForEl.find("a.search-link")[0], this.$searchResultsEl = $dropdown.find("[data-role=results]"), that.types = {
            category: {
                headline: "Categories",
                linkPrefix: "/"
            },
            author: {
                headline: "Authors",
                linkPrefix: "/author/"
            },
            post: {
                headline: "Articles",
                linkPrefix: "/"
            }
        }, this.initDropdownPosition = $.proxy(this.initDropdownPosition, this), this.searchClickHandler = $.proxy(this.searchClickHandler, this), this.searchKeyupHandler = $.proxy(this.searchKeyupHandler, this), that.searchTerm = "", that.timeout = null, this.xhr = null, this.initSpinner(), this.initDropdownPositionTimer = null, this.initDropdownPosition(), that.$input.on("keyup.search", function () {
            var searchTerm = that.$input.val();
            that.xhr && that.xhr.abort(), that.xhr = null, searchTerm.length < 2 ? that.updateDropdown(searchTerm, "") : (that.updateDropdown(searchTerm), searchTerm != that.searchTerm && (clearTimeout(that.timeout), that.updateDropdown(searchTerm), that.showSpinner(), that.timeout = setTimeout(function () {
                that.execute(searchTerm)
            }, 150))), that.searchTerm = searchTerm
        }), that.$input.on("focus.search", function () {
            var searchTerm = that.$input.val();
            searchTerm.length > 0 && that.updateDropdown(searchTerm)
        }), that.$dropdown.on("close.search", function () {
            that.$dropdown.hide(), $("body").off("click.search", that.searchClickHandler), $(document).off("keyup.search", that.searchKeyupHandler)
        }), $(window).on("resize", this.initDropdownPosition)
    };
    Search.prototype = {
        initDropdownPosition: function () {
            var that = this;
            this.initDropdownPositionTimer && clearTimeout(this.initDropdownPositionTimer), this.initDropdownPositionTimer = setTimeout(function () {
                var $input = that.$input,
                    $container = $input.closest("li.top-bar_search"),
                    containerOffset = $container.offset(),
                    windowWidth = (that.$dropdown.outerWidth(), $(window).width()),
                    top = containerOffset.top + $container.outerHeight(),
                    right = windowWidth - (containerOffset.left + $container.outerWidth());
                that.$dropdown.css($(".toggle-topbar.menu-icon").offset().left ? {
                    top: top,
                    left: containerOffset.left,
                    right: "auto"
                } : {
                    top: top,
                    left: "auto",
                    right: right
                })
            }, 200)
        },
        initSpinner: function () {
            var spinnerOpts = {
                lines: 13,
                length: 3,
                width: 2,
                radius: 5,
                corners: 1,
                rotate: 0,
                direction: 1,
                color: "#fff",
                speed: .7,
                trail: 72,
                shadow: !1,
                hwaccel: !1,
                className: "spinner",
                zIndex: 2e9,
                top: "auto",
                left: "auto"
            };
            this.spinner = new Spinner(spinnerOpts)
        },
        searchClickHandler: function (event) {
            $(event.target).is(this.$input) || $(event.target).parents(this.$dropdown).is(this.$dropdown) || this.$dropdown.trigger("close")
        },
        searchKeyupHandler: function (event) {
            27 == event.keyCode && this.$dropdown.trigger("close")
        },
        execute: function (term) {
            var that = this;
            that.updateDropdown(term), this.xhr = $.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: "POST",
                data: {
                    action: "sp_search_livesearch",
                    s: term
                },
                error: function () {
                    that.updateDropdown(term, "")
                },
                success: function (response) {
                    var results = JSON.parse(response),
                        html = "";
                    for (var type in that.types) {
                        var typeConfig = that.types[type];
                        if (results[type].length > 0) {
                            html += '<li class="search-result-divider"><strong>' + typeConfig.headline + '</strong><a href="/?s=' + encodeURIComponent(term) + "&type=" + type + '">See all</a></li>';
                            for (var i = 0; i < results[type].length; i++) {
                                var result = results[type][i];
                                html += '<li><a href="' + typeConfig.linkPrefix + result.slug + '">' + result.label + "</a></li>"
                            }
                        }
                    }
                    that.updateDropdown(that.searchTerm, html), that.spinner.stop()
                }
            })
        },
        updateDropdown: function (term, results) {
            var that = this;
            return term.length < 2 && that.spinner.stop(), "" === term ? void this.$dropdown.trigger("close") : (that.$dropdown.show(), $("body").off("click.search", this.searchClickHandler), $("body").on("click.search", this.searchClickHandler), $(document).off("keyup.search", this.searchKeyupHandler), $(document).on("keyup.search", this.searchKeyupHandler), this.searchLinkEl.href = "/?s=" + encodeURIComponent(term), this.searchLinkEl.innerText = 'Search for "' + term + '"', void("undefined" != typeof results && (that.$dropdown.show(), this.$searchResultsEl.html(results))))
        },
        showSpinner: function () {
            this.spinner.spin(), this.$searchForEl.append(this.spinner.el)
        }
    }, $(document).ready(function () {
        new Search($("#search-box"), $("#search-dropdown"))
    })
}(jQuery);
var DISQUSWIDGETS = DISQUSWIDGETS || {};
DISQUSWIDGETS.disqusShortname = "", DISQUSWIDGETS.getCount = function () {}, DISQUSWIDGETS.displayCount = function (response) {
    var i, len, data, $catTitle;
    for (i = 0, len = response.counts.length; len > i; i++) data = response.counts[i], $catTitle = $("article[data-disqus-id='" + data.id + "'] .article_category_title"), $catTitle.find(".comment-info").remove(), $catTitle.append(data.comments >= 1 ? '<a class="comment-info" href="' + data.id + '#comments"><span class="comment-info__count">' + data.comments + '</span><span class="comment-info__icon icon-comment"></span></a>' : '<a class="comment-info"></a>')
}, DISQUSWIDGETS.loadCount = function ($, disqusShortname) {
    disqusShortname && (DISQUSWIDGETS.disqusShortname = disqusShortname);
    var identifiers = [];
    $("article[data-disqus-id]").each(function () {
        $(this).find(".article_category_title .comment-info").length || identifiers.push("2=" + encodeURIComponent($(this).attr("data-disqus-id")))
    });
    var head = document.getElementsByTagName("HEAD")[0] || document.body,
        script = document.createElement("script");
    script.async = !0, script.src = "http://" + DISQUSWIDGETS.disqusShortname + ".disqus.com/count-data.js?" + identifiers.join("&"), head.appendChild(script)
},
function ($) {
    function createCookie(name, value, days) {
        if (days) {
            var date = new Date;
            date.setTime(date.getTime() + 24 * days * 60 * 60 * 1e3);
            var expires = "; expires=" + date.toGMTString()
        } else var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/"
    }

    function readCookie(name) {
        for (var nameEQ = name + "=", ca = document.cookie.split(";"), i = 0; i < ca.length; i++) {
            for (var c = ca[i];
                " " == c.charAt(0);) c = c.substring(1, c.length);
            if (0 == c.indexOf(nameEQ)) return c.substring(nameEQ.length, c.length)
        }
        return null
    }
    var init = function () {
        null == readCookie("inpromo01") && $.get("http://ipinfo.io/country", function (response) {
            "IN" == response.trim() && ($modalIndiaPromo = $("#modal-india-promo"), $modalIndiaPromo.foundation("reveal", "open"), $modalIndiaPromo.find("button.button").on("click", function () {
                createCookie("inpromo01", "done", 30)
            }), $modalIndiaPromo.find("a.close-reveal-modal").on("click", function () {
                createCookie("inpromo01", "closed", 3)
            }))
        })
    };
    $(document).ready(function () {
        init()
    })
}(jQuery), $(function () {
    function debugInit() {
        $productItems.find(".panel ." + BUTTON_CLASS).each(function () {
            $this = $(this), $this.hasClass(BUTTON_SELECTED_CLASS) && selectedProdIds.push($this.data("productId"))
        }), updateSelectedProductsCount()
    }

    function generateModals() {
        $productItems.each(function () {
            var $prodPanel = $(this).find(".product.panel"),
                html = $prodPanel.html().replace(/data-reveal-id=/, "data-reveal-id-DISABLED="),
                $prodModal = $(this).find("." + PRODUCT_PANEL_REVEAL_MODAL_CLASS);
            $prodModal.prepend(html)
        })
    }

    function updateSelectedProductsCount() {
        var selProdLen = selectedProdIds.length;
        $selectedProductsCount.text(selProdLen + " " + PRODUCT_NAME + (1 === selProdLen ? "" : "s"))
    }

    function toggleSelection() {
        var $this = $(this),
            prodId = $this.data("productId"),
            $prodListItem = $("." + PRODUCT_LIST_ITEM_CLASS + "[data-product-id=" + prodId + "]");
        if ($prodModal = $(".reveal-modal[data-product-id=" + prodId + "]"), $panelAndModal = $prodListItem.add($prodModal), $prodPanel = $prodListItem.find(".product.panel"), $buttons = $panelAndModal.find("." + BUTTON_CLASS), $btnTitles = $panelAndModal.find(".button_title"), $btnIcons = $panelAndModal.find("i"), $this.hasClass(BUTTON_SELECTED_CLASS)) selectedProdIds.splice($.inArray(prodId, selectedProdIds), 1), $btnTitles.text(BUTTON_TEXT);
        else {
            if (selectedProdIds.length === maxSelections) return void alert("Please remove another selection to add this one. The maximum number of selections is " + maxSelections + ".");
            selectedProdIds.push(prodId), $btnTitles.text(BUTTON_SELECTED_TEXT)
        }
        $buttons.toggleClass(BUTTON_SELECTED_CLASS), $btnIcons.toggleClass(BUTTON_ICON_SELECTED_CLASS), $prodPanel.toggleClass(PRODUCT_PANEL_SELECTED_CLASS), updateSelectedProductsCount()
    }

    function checkoutClickHandler(evt) {
        var appendURL = ("" === window.location.search ? "?" : window.location.search + "&") + "clear=true",
            url = "http://learnable.com/store/cart/add/" + selectedProdIds.join(",") + appendURL;
        return evt.preventDefault(), selectedProdIds.length ? void(window.location.href = url) : void alert("Please make at least one selection to continue.")
    }
    window.sitepoint = window.sitepoint || {}, sitepoint.xmas = sitepoint.xmas || {};
    var $addRemoveButtons, maxSelections = sitepoint.xmas.maxSelections || 5,
        PRODUCT_NAME = sitepoint.xmas.PRODUCT_NAME || "book",
        PRODUCT_LIST_ITEM_CLASS = "product-list_item",
        PRODUCT_PANEL_SELECTED_CLASS = "selected",
        PRODUCT_PANEL_REVEAL_MODAL_CLASS = "reveal-modal",
        BUTTON_CLASS = "product_add-button",
        BUTTON_SELECTED_CLASS = "success",
        BUTTON_ICON_SELECTED_CLASS = "icon-check",
        BUTTON_TEXT = "Add",
        BUTTON_SELECTED_TEXT = "Added",
        selectedProdIds = [],
        $productItems = $("." + PRODUCT_LIST_ITEM_CLASS);
    $selectedProductsCount = $(".selected-products-count"), $btnCheckout = $(".button--checkout"), debugInit(), generateModals(), $addRemoveButtons = $productItems.find("." + BUTTON_CLASS), $addRemoveButtons.on("click", toggleSelection), $btnCheckout.on("click", checkoutClickHandler)
});