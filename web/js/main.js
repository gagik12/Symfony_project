$(window).ready(function() {
    var userListLoader = new UserListLoader();
    userListLoader.setEvent();

    var popUp = new PopUp();
    popUp.setEvents();

    var iconBar = new IconBar();
    iconBar.setEvents();
});