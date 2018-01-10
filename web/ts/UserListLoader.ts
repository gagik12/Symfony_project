import jqXHR = JQuery.jqXHR;

export class UserListLoader {
    private page: number = 1;
    private loadingImg: JQuery = $("#loading");

    constructor() {
        this.setEvent();
    }

    private static failCallback(xhr: jqXHR, status: string, errorThrown: string): void {
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir(xhr);
    }

    private setEvent(): void {
        let self: UserListLoader = this;
        $("#submit").click(function () {
            self.request();
        });
    }

    private successCallback(data: any): void {
        if (data != 0) {
            $('.boxer').append(data);
            ++this.page;
        }
        this.loadingImg.hide();
    }

    private request(): void {
        if (!this.loadingImg.is(":visible")) {
            this.loadingImg.show();

            let ajaxSettings: JQueryAjaxSettings = {
                context: this,
                url: "userList",
                type: "GET",
                dataType: "text",
                data: {page: this.page},
                success: this.successCallback,
                error: UserListLoader.failCallback
            };

            $.ajax(ajaxSettings);
        }
    }
}