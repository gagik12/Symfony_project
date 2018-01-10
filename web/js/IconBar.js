function IconBar()
{
    this.setEvents = function() {
        this.showIconBar();
        this.hideIconBar();
        this.clickDeleteIcon();
    };

    this.getCurrentUserLogin = function() {
        var hoverItem = $('.box-row:hover');
        return (hoverItem.length != 0) ? hoverItem.find('.login').text() : null;
    };

    this.showIconBar = function() {
        $(document).on('mouseover', '.box-row', function() {
            $(this).find(".icon-bar").show();
        });
    };

    this.hideIconBar = function() {
        $(document).on('mouseout', '.box-row', function() {
            $(this).find(".icon-bar").hide();
        })
    };

    this.clickDeleteIcon = function() {
        var self = this;
        $(".deleteIcon").click(function() {
            var userLogin = self.getCurrentUserLogin();
            //console.log(userLogin);
            $("#delete").attr('href', function(i, currentValue) {
                return currentValue + userLogin;
            });
        });
    };
}