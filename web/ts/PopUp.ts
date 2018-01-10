const BOX_WIDTH = 400;

export class PopUp {
    private popUpBox: JQuery = $('.popup-box');
    private cover: JQuery = $('.cover');

    constructor() {
        this.setEvents();
    }

    private setEvents(): void {
        let self: PopUp = this;
        $(document).on('click', '.popup-link', function () {
            self.openBox();
        });
        //при нажатии на box, pop up не закрывается
        this.popUpBox.click(function (e) {
            e.stopPropagation();
        });

        $('html, .close-popup').click(function () {
            self.closeBox();
        });
    }

    private openBox(): void {
        this.setCenterBox();

        this.popUpBox.show();
        this.cover.fadeTo("slow", 0.85);

        $('html, body').css('overflow', 'hidden');
    };

    private closeBox(): void {
        this.popUpBox.hide();
        this.cover.fadeOut("slow");

        $("html, body").css("overflow", "auto");
    };

    private setCenterBox(): void {
        const OFFSET_TOP: number = 150;

        let documentWidth: number = $(document).width();
        let scrollPosition: number = $(window).scrollTop();

        let boxPositionX: number = (documentWidth - BOX_WIDTH) / 2;
        let boxPositionY: number = scrollPosition + OFFSET_TOP;

        this.popUpBox.css({'width': BOX_WIDTH + 'px', 'left': boxPositionX + 'px', 'top': boxPositionY + 'px'});
        this.cover.css({'top': scrollPosition + 'px'});
    };
}