System.register("IconBar", [], function (exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var IconBar;
    return {
        setters: [],
        execute: function () {
            IconBar = (function () {
                function IconBar() {
                    this.popUpBox = $('.popup-box');
                    this.cover = $('.cover');
                    this.setEvents();
                }
                IconBar.getCurrentUserLogin = function () {
                    var hoverItem = $('.box-row:hover');
                    return (hoverItem.length != 0) ? hoverItem.find('.login').text() : null;
                };
                ;
                IconBar.prototype.setEvents = function () {
                    this.showIconBar();
                    this.hideIconBar();
                    this.clickDeleteIcon();
                };
                IconBar.prototype.showIconBar = function () {
                    $(document).on('mouseover', '.box-row', function () {
                        $(this).find(".icon-bar").show();
                    });
                };
                ;
                IconBar.prototype.hideIconBar = function () {
                    $(document).on('mouseout', '.box-row', function () {
                        $(this).find(".icon-bar").hide();
                    });
                };
                ;
                IconBar.prototype.clickDeleteIcon = function () {
                    var self = this;
                    $(document).on('click', '.deleteIcon', function () {
                        var userLogin = IconBar.getCurrentUserLogin();
                        $("#delete").attr('href', function (i, currentValue) {
                            return currentValue + userLogin;
                        });
                    });
                };
                ;
                return IconBar;
            }());
            exports_1("IconBar", IconBar);
        }
    };
});
System.register("PopUp", [], function (exports_2, context_2) {
    "use strict";
    var __moduleName = context_2 && context_2.id;
    var BOX_WIDTH, PopUp;
    return {
        setters: [],
        execute: function () {
            BOX_WIDTH = 400;
            PopUp = (function () {
                function PopUp() {
                    this.popUpBox = $('.popup-box');
                    this.cover = $('.cover');
                    this.setEvents();
                }
                PopUp.prototype.setEvents = function () {
                    var self = this;
                    $(document).on('click', '.popup-link', function () {
                        self.openBox();
                    });
                    this.popUpBox.click(function (e) {
                        e.stopPropagation();
                    });
                    $('html, .close-popup').click(function () {
                        self.closeBox();
                    });
                };
                PopUp.prototype.openBox = function () {
                    this.setCenterBox();
                    this.popUpBox.show();
                    this.cover.fadeTo("slow", 0.85);
                    $('html, body').css('overflow', 'hidden');
                };
                ;
                PopUp.prototype.closeBox = function () {
                    this.popUpBox.hide();
                    this.cover.fadeOut("slow");
                    $("html, body").css("overflow", "auto");
                };
                ;
                PopUp.prototype.setCenterBox = function () {
                    var OFFSET_TOP = 150;
                    var documentWidth = $(document).width();
                    var scrollPosition = $(window).scrollTop();
                    var boxPositionX = (documentWidth - BOX_WIDTH) / 2;
                    var boxPositionY = scrollPosition + OFFSET_TOP;
                    this.popUpBox.css({ 'width': BOX_WIDTH + 'px', 'left': boxPositionX + 'px', 'top': boxPositionY + 'px' });
                    this.cover.css({ 'top': scrollPosition + 'px' });
                };
                ;
                return PopUp;
            }());
            exports_2("PopUp", PopUp);
        }
    };
});
System.register("UserListLoader", [], function (exports_3, context_3) {
    "use strict";
    var __moduleName = context_3 && context_3.id;
    var UserListLoader;
    return {
        setters: [],
        execute: function () {
            UserListLoader = (function () {
                function UserListLoader() {
                    this.page = 1;
                    this.loadingImg = $("#loading");
                    this.setEvent();
                }
                UserListLoader.failCallback = function (xhr, status, errorThrown) {
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + status);
                    console.dir(xhr);
                };
                UserListLoader.prototype.setEvent = function () {
                    var self = this;
                    $("#submit").click(function () {
                        self.request();
                    });
                };
                UserListLoader.prototype.successCallback = function (data) {
                    if (data != 0) {
                        $('.boxer').append(data);
                        ++this.page;
                    }
                    this.loadingImg.hide();
                };
                UserListLoader.prototype.request = function () {
                    if (!this.loadingImg.is(":visible")) {
                        this.loadingImg.show();
                        var ajaxSettings = {
                            context: this,
                            url: "userList",
                            type: "GET",
                            dataType: "text",
                            data: { page: this.page },
                            success: this.successCallback,
                            error: UserListLoader.failCallback
                        };
                        $.ajax(ajaxSettings);
                    }
                };
                return UserListLoader;
            }());
            exports_3("UserListLoader", UserListLoader);
        }
    };
});
System.register("main", ["UserListLoader", "PopUp", "IconBar"], function (exports_4, context_4) {
    "use strict";
    var __moduleName = context_4 && context_4.id;
    var UserListLoader_1, PopUp_1, IconBar_1;
    return {
        setters: [
            function (UserListLoader_1_1) {
                UserListLoader_1 = UserListLoader_1_1;
            },
            function (PopUp_1_1) {
                PopUp_1 = PopUp_1_1;
            },
            function (IconBar_1_1) {
                IconBar_1 = IconBar_1_1;
            }
        ],
        execute: function () {
            window.onload = function () {
                new UserListLoader_1.UserListLoader();
                new PopUp_1.PopUp();
                new IconBar_1.IconBar();
            };
        }
    };
});
//# sourceMappingURL=script.js.map