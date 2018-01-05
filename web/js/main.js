window.onload = function() {
    var userListLoader = new UserListLoader();

    var popup = new Popup();
    popup.setEvents();

    $("#submit").click(function() {
        userListLoader.load();
    });

    $('#box_hover').hover(function(e) {
        var del = $(".delete");

        if (!del.is(":visible"))
        {
            del.show();
        }
        else
        {
            del.hide();
        }
    });
}