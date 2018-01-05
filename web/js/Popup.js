function Popup()
{
    const BOX_WIDTH = 400;

    this.popupLink = $('.popup-link');
    this.popupBox = $('.popup-box');
    this.cover = $('.cover');


    this.setEvents = function() {
        var self = this;
        this.popupLink.click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            self.openBox();
        });
        //при нажатии на box, popup не закрывается
        this.popupBox.click(function(e) {
            e.stopPropagation();
        });

        $('html, .close-popup').click(function() {
            self.closeBox();
        });
    };

    this.openBox = function() {
        this.setCenterBox();

        this.popupBox.show();
        this.cover.show();
        $('html, body').css('overflow', 'hidden');
    };

    this.closeBox = function() {
        this.popupBox.hide();
        this.cover.hide();
        $("html, body").css("overflow", "auto");
    };

    this.setCenterBox = function() {
        const OFFSET_TOP = 150;

        var documentWidth = $(document).width();
        var scrollPosition = $(window).scrollTop();

        var boxPositionX = (documentWidth - BOX_WIDTH) / 2;
        var boxPositionY = scrollPosition + OFFSET_TOP;

        this.popupBox.css({'width': BOX_WIDTH + 'px', 'left': boxPositionX + 'px', 'top': boxPositionY + 'px'});
    };
}
