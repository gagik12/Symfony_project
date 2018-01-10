function PopUp()
{
    const BOX_WIDTH = 400;

    this.popUpBox = $('.popup-box');
    this.cover = $('.cover');

    this.setEvents = function() {
        var self = this;
        $(document).on('click', '.popup-link', function(){
            self.openBox();
        });
        //при нажатии на box, pop up не закрывается
        this.popUpBox.click(function(e) {
            e.stopPropagation();
        });

        $('html, .close-popup').click(function() {
            self.closeBox();
        });
    };

    this.openBox = function() {
        this.setCenterBox();

        this.popUpBox.show();
        this.cover.fadeTo("slow", 0.85);

        $('html, body').css('overflow', 'hidden');
    };

    this.closeBox = function() {
        this.popUpBox.hide();
        this.cover.fadeOut("slow");

        $("html, body").css("overflow", "auto");
    };

    this.setCenterBox = function() {
        const OFFSET_TOP = 150;

        var documentWidth = $(document).width();
        var scrollPosition = $(window).scrollTop();

        var boxPositionX = (documentWidth - BOX_WIDTH) / 2;
        var boxPositionY = scrollPosition + OFFSET_TOP;

        this.popUpBox.css({'width': BOX_WIDTH + 'px', 'left': boxPositionX + 'px', 'top': boxPositionY + 'px'});
        this.cover.css({'top': scrollPosition + 'px'});
    };
}
