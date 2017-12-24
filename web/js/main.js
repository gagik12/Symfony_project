//TODO: переписать на TypeScript
window.onload = function() {
    var userListLoader = new UserListLoader();
    $("#submit").click(function() {
        userListLoader.load();
    });
}