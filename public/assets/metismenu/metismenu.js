/*!
 * metismenu https://github.com/onokumus/metismenu#readme
 * A collapsible jQuery menu plugin
 * @version 3.0.7
 * @author Osman Nuri Okumus <onokumus@gmail.com> (https://github.com/onokumus)
 * @license: MIT
 */
! function (e, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t(require("jquery")) : "function" == typeof define && define.amd ? define(["jquery"], t) : (e = "undefined" != typeof globalThis ? globalThis : e || self).metisMenu = t(e.$)
}(this, (function (e) {
    "use strict";

    function t(e) {
        return e && "object" == typeof e && "default" in e ? e : {
            default: e
        }
    }
    var n = t(e);
    const i = (e => {
            const t = "transitionend",
                n = {
                    TRANSITION_END: "mmTransitionEnd",
                    triggerTransitionEnd(n) {
                        e(n).trigger(t)
                    },
                    supportsTransitionEnd: () => Boolean(t)
                };

            function i(t) {
                let i = !1;
                return e(this).one(n.TRANSITION_END, (() => {
                    i = !0
                })), setTimeout((() => {
                    i || n.triggerTransitionEnd(this)
                }), t), this
            }
            return e.fn.mmEmulateTransitionEnd = i, e.event.special[n.TRANSITION_END] = {
                bindType: t,
                delegateType: t,
                handle(t) {
                    if (e(t.target).is(this)) return t.handleObj.handler.apply(this, arguments)
                }
            }, n
        })(n.default),
        s = "metisMenu",
        r = "metisMenu",
        a = n.default.fn[s],
        o = {
            toggle: !0,
            preventDefault: !0,
            triggerElement: "a",
            parentTrigger: "li",
            subMenu: "ul"
        },
        l = {
            SHOW: "show.metisMenu",
            SHOWN: "shown.metisMenu",
            HIDE: "hide.metisMenu",
            HIDDEN: "hidden.metisMenu",
            CLICK_DATA_API: "click.metisMenu.data-api"
        },
        d = "metismenu",
        g = "mm-active",
        h = "mm-show",
        u = "mm-collapse",
        f = "mm-collapsing";
    class c {
        constructor(e, t) {
            this.element = e, this.config = {
                ...o,
                ...t
            }, this.transitioning = null, this.init()
        }
        init() {
            const e = this,
                t = this.config,
                i = n.default(this.element);
            i.addClass(d), i.find(`${t.parentTrigger}.${g}`).children(t.triggerElement).attr("aria-expanded", "true"), i.find(`${t.parentTrigger}.${g}`).parents(t.parentTrigger).addClass(g), i.find(`${t.parentTrigger}.${g}`).parents(t.parentTrigger).children(t.triggerElement).attr("aria-expanded", "true"), i.find(`${t.parentTrigger}.${g}`).has(t.subMenu).children(t.subMenu).addClass(`${u} ${h}`), i.find(t.parentTrigger).not(`.${g}`).has(t.subMenu).children(t.subMenu).addClass(u), i.find(t.parentTrigger).children(t.triggerElement).on(l.CLICK_DATA_API, (function (i) {
                const s = n.default(this);
                if ("true" === s.attr("aria-disabled")) return;
                t.preventDefault && "#" === s.attr("href") && i.preventDefault();
                const r = s.parent(t.parentTrigger),
                    a = r.siblings(t.parentTrigger),
                    o = a.children(t.triggerElement);
                r.hasClass(g) ? (s.attr("aria-expanded", "false"), e.removeActive(r)) : (s.attr("aria-expanded", "true"), e.setActive(r), t.toggle && (e.removeActive(a), o.attr("aria-expanded", "false"))), t.onTransitionStart && t.onTransitionStart(i)
            }))
        }
        setActive(e) {
            n.default(e).addClass(g);
            const t = n.default(e).children(this.config.subMenu);
            t.length > 0 && !t.hasClass(h) && this.show(t)
        }
        removeActive(e) {
            n.default(e).removeClass(g);
            const t = n.default(e).children(`${this.config.subMenu}.${h}`);
            t.length > 0 && this.hide(t)
        }
        show(e) {
            if (this.transitioning || n.default(e).hasClass(f)) return;
            const t = n.default(e),
                s = n.default.Event(l.SHOW);
            if (t.trigger(s), s.isDefaultPrevented()) return;
            if (t.parent(this.config.parentTrigger).addClass(g), this.config.toggle) {
                const e = t.parent(this.config.parentTrigger).siblings().children(`${this.config.subMenu}.${h}`);
                this.hide(e)
            }
            t.removeClass(u).addClass(f).height(0), this.setTransitioning(!0);
            t.height(e[0].scrollHeight).one(i.TRANSITION_END, (() => {
                this.config && this.element && (t.removeClass(f).addClass(`${u} ${h}`).height(""), this.setTransitioning(!1), t.trigger(l.SHOWN))
            })).mmEmulateTransitionEnd(350)
        }
        hide(e) {
            if (this.transitioning || !n.default(e).hasClass(h)) return;
            const t = n.default(e),
                s = n.default.Event(l.HIDE);
            if (t.trigger(s), s.isDefaultPrevented()) return;
            t.parent(this.config.parentTrigger).removeClass(g), t.height(t.height())[0].offsetHeight, t.addClass(f).removeClass(u).removeClass(h), this.setTransitioning(!0);
            const r = () => {
                this.config && this.element && (this.transitioning && this.config.onTransitionEnd && this.config.onTransitionEnd(), this.setTransitioning(!1), t.trigger(l.HIDDEN), t.removeClass(f).addClass(u))
            };
            0 === t.height() || "none" === t.css("display") ? r() : t.height(0).one(i.TRANSITION_END, r).mmEmulateTransitionEnd(350)
        }
        setTransitioning(e) {
            this.transitioning = e
        }
        dispose() {
            n.default.removeData(this.element, r), n.default(this.element).find(this.config.parentTrigger).children(this.config.triggerElement).off(l.CLICK_DATA_API), this.transitioning = null, this.config = null, this.element = null
        }
        static jQueryInterface(e) {
            return this.each((function () {
                const t = n.default(this);
                let i = t.data(r);
                const s = {
                    ...o,
                    ...t.data(),
                    ..."object" == typeof e && e ? e : {}
                };
                if (i || (i = new c(this, s), t.data(r, i)), "string" == typeof e) {
                    if (void 0 === i[e]) throw new Error(`No method named "${e}"`);
                    i[e]()
                }
            }))
        }
    }
    return n.default.fn[s] = c.jQueryInterface, n.default.fn[s].Constructor = c, n.default.fn[s].noConflict = () => (n.default.fn[s] = a, c.jQueryInterface), c
}));
//# sourceMappingURL=metisMenu.min.js.map
