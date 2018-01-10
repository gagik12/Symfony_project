<div class="popup-box" style="width: 400px; left: 474.5px; top: 290px;">
    <div class="close-x close-popup">X</div>
    <div class="top"><h2>Вы действительно хотите удалить пользователя?</h2></div>
    <div class="bottom">
        <a href="<?= url_for("@delete_user?login=" . $login) ?>" id="delete">Да</a>
        <a class="close-popup">Нет</a>
    </div>
</div>
<div class="cover"></div>