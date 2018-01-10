export class IconBar {
    private popUpBox: JQuery = $('.popup-box');
    private cover: JQuery = $('.cover');

    constructor() {
        this.setEvents();
    }

    private static getCurrentUserLogin(): string {
        let hoverItem: JQuery = $('.box-row:hover');
        return (hoverItem.length != 0) ? hoverItem.find('.login').text() : null;
    };

    private setEvents(): void {
        this.showIconBar();
        this.hideIconBar();
        this.clickDeleteIcon();
    }

    private showIconBar() {
        $(document).on('mouseover', '.box-row', function () {
            $(this).find(".icon-bar").show();
        });
    };

    private hideIconBar(): void {
        $(document).on('mouseout', '.box-row', function () {
            $(this).find(".icon-bar").hide();
        })
    };

    private clickDeleteIcon(): void {
        let self: IconBar = this;
        $(document).on('click', '.deleteIcon', function () {
            let userLogin: string = IconBar.getCurrentUserLogin();
            $("#delete").attr('href', function (i, currentValue) {
                return currentValue + userLogin;
            });
        });
    };
}