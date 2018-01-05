function Popup()
{
    const BOX_WIDTH = 400;

    this.setEvents = function() {
        var self = this;
        $('.popup-link').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            self.openBox();
        });
        //при нажатии на box, popup не закрывается
        $('.popup-box').click(function(e) {
            e.stopPropagation();
        });

        $('html, .close-popup').click(function() {
            self.closeBox();
        });
    };

    this.openBox = function() {
        this.setCenterBox();

        $('.popup-box').show();
        $('.cover').show();
        $('html, body').css('overflow', 'hidden');
    };

    this.closeBox = function() {
        $('.popup-box').hide();
        $('.cover').hide();
        $("html,body").css("overflow", "auto");
    };

    this.setCenterBox = function() {
        const OFFSET_TOP = 150;

        var documentWidth = $(document).width();
        var scrollPosition = $(window).scrollTop();

        var boxPositionX = (documentWidth - BOX_WIDTH) / 2;
        var boxPositionY = scrollPosition + OFFSET_TOP;

        $('.popup-box').css({'width': BOX_WIDTH + 'px', 'left': boxPositionX + 'px', 'top': boxPositionY + 'px'});
    };
}
