/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

/*
 Template Name: Fonik - Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Main js
 */

!function ($) {

    "use strict";

    var MainApp = function MainApp() {
        this.$body = $("body"), this.$wrapper = $("#wrapper"), this.$btnFullScreen = $("#btn-fullscreen"), this.$leftMenuButton = $('.button-menu-mobile'), this.$menuItem = $('.has_sub > a');
    };
    //scroll
    MainApp.prototype.initSlimscroll = function () {
        $('.slimscrollleft').slimscroll({
            height: 'auto',
            position: 'right',
            size: "10px",
            color: '#9ea5ab'
        });
    },
    //left menu
    MainApp.prototype.initLeftMenuCollapse = function () {
        var $this = this;
        this.$leftMenuButton.on('click', function (event) {
            event.preventDefault();
            $this.$body.toggleClass("fixed-left-void");
            $this.$wrapper.toggleClass("enlarged");
        });
    },
    //left menu
    MainApp.prototype.initComponents = function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    },
    //full screen
    MainApp.prototype.initFullScreen = function () {
        var $this = this;
        $this.$btnFullScreen.on("click", function (e) {
            e.preventDefault();

            if (!document.fullscreenElement && /* alternative standard method */!document.mozFullScreenElement && !document.webkitFullscreenElement) {
                // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        });
    },
    //full screen
    MainApp.prototype.initMenu = function () {
        var $this = this;
        $this.$menuItem.on('click', function () {
            var parent = $(this).parent();
            var sub = parent.find('> ul');

            if (!$this.$body.hasClass('sidebar-collapsed')) {
                if (sub.is(':visible')) {
                    sub.slideUp(300, function () {
                        parent.removeClass('nav-active');
                        $('.body-content').css({ height: '' });
                        adjustMainContentHeight();
                    });
                } else {
                    visibleSubMenuClose();
                    parent.addClass('nav-active');
                    sub.slideDown(300, function () {
                        adjustMainContentHeight();
                    });
                }
            }
            return false;
        });

        //inner functions
        function visibleSubMenuClose() {
            $('.has_sub').each(function () {
                var t = $(this);
                if (t.hasClass('nav-active')) {
                    t.find('> ul').slideUp(300, function () {
                        t.removeClass('nav-active');
                    });
                }
            });
        }

        function adjustMainContentHeight() {
            // Adjust main content height
            var docHeight = $(document).height();
            if (docHeight > $('.body-content').height()) $('.body-content').height(docHeight);
        }
    }, MainApp.prototype.activateMenuItem = function () {
        // === following js will activate the menu in left side bar based on url ====
        $("#sidebar-menu a").each(function () {
            if (this.href == window.location.href) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
                $(this).parent().parent().prev().click(); // click the item to make it drop
            }
        });
    }, MainApp.prototype.Preloader = function () {
        $(window).load(function () {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({
                'overflow': 'visible'
            });
        });
    }, MainApp.prototype.ToggleSearch = function () {
        $('.toggle-search').on('click', function () {
            var targetId = $(this).data('target');
            var $searchBar;
            if (targetId) {
                $searchBar = $(targetId);
                $searchBar.toggleClass('open');
            }
        });
    }, MainApp.prototype.init = function () {
        this.initSlimscroll();
        this.initLeftMenuCollapse();
        this.initComponents();
        this.initFullScreen();
        this.initMenu();
        this.activateMenuItem();
        this.Preloader();
        this.ToggleSearch();
    },
    //init
    $.MainApp = new MainApp(), $.MainApp.Constructor = MainApp;
}(window.jQuery),

//initializing
function ($) {
    "use strict";

    $.MainApp.init();
}(window.jQuery);

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);