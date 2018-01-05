function UserListLoader()
{
    this.page = 1;
    this.loading = $("#loading");

    this.setEvent = function() {
        var self = this;
        $("#submit").click(function() {
            self.load();
        });
    };

    this.load = function() {
        //если данные еще не загружены, то не имеем право запрашивать новые данные
        if (!this.loading.is(":visible"))
        {
            this.loading.show();
            var ajaxSettings = {
                context: this,
                url: "userList",
                type: "GET",
                dataType: "text",
                data: {page: this.page},
                success: this.successCallback,
                error: this.failCallback
            };
            $.ajax(ajaxSettings);
        }
    }

    this.successCallback = function(response) {
        if (response != 0)
        {
            $('.boxer').append(response);
            ++this.page;
        }
        this.loading.hide();
    }

    this.failCallback = function(xhr, status, errorThrown) {
        console.log("Error: " + errorThrown);
        console.log("Status: " + status);
        console.dir(xhr);
    }
}