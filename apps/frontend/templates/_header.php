<div class="header">
    <ul>
        <li><a href="<?= url_for('@user_profile') ?>">Profile</a></li>
        <? if ($sf_user->isUserAdmin()): ?>
            <li><a href="<?= url_for('@user_list') ?>">User List</a></li>
        <? endif; ?>
        <li><a href="<?= url_for('@log_out') ?>">Log Out</a></li>
    </ul>
</div>