$(window).ready(function() {
    var userListLoader = new UserListLoader();
    userListLoader.setEvent();

    var popup = new Popup();
    popup.setEvents();

    displayDeleteIcon();
});

function displayDeleteIcon()
{
    $(document).on('mouseover', '.box-row', function(){
        $(this).find(".deleteIcon").show();
    });
    $(document).on('mouseout', '.box-row', function(){
        $(this).find(".deleteIcon").hide();
    })
}
