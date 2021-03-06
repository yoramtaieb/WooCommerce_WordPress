! function(a) {
    "use strict";

    function b(b, d) {
        this.$el = a(b), this.opt = a.extend(!0, {}, c, d), this.init(this)
    }
    var c = {};
    b.prototype = {
        init: function(a) {
            a.initToggle(a), a.initDropdown(a)
        },
        initToggle: function(b) {
            a(document).on("click", function(c) {
                var d = a(c.target);
                d.closest(b.$el.data("sidenav-toggle"))[0] ? (b.$el.toggleClass("show"), a("body").toggleClass("sidenav-no-scroll"), b.toggleOverlay()) : d.closest(b.$el)[0] || (b.$el.removeClass("show"), a("body").removeClass("sidenav-no-scroll"), b.hideOverlay())
            })
        },
        initDropdown: function(b) {
            b.$el.on("click", "[data-sidenav-dropdown-toggle]", function(b) {
                var c = a(this);
                c.next("[data-sidenav-dropdown]").slideToggle("fast"), c.find("[data-sidenav-dropdown-icon]").toggleClass("show"), b.preventDefault()
            })
        },
        toggleOverlay: function() {
            var b = a("[data-sidenav-overlay]");
            b[0] || (b = a('<div data-sidenav-overlay class="sidenav-overlay"/>'), a("body").append(b)), b.fadeToggle("fast")
        },
        hideOverlay: function() {
            a("[data-sidenav-overlay]").fadeOut("fast")
        }
    }, a.fn.sidenav = function(c) {
        return this.each(function() {
            a.data(this, "sidenav") || a.data(this, "sidenav", new b(this, c))
        })
    }
}(window.jQuery);