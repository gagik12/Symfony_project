<div class="header">
    <ul>
        <?
        $headerMenu = new HeaderMenu();
        $headerMenu->generateItems();
        $items = $headerMenu->getMenuItems();
        ?>
        <? foreach ($items as $item): ?>
            <li><a href="<?= $item->getLink() ?>"><?= $item->getTitle() ?></a></li>
        <? endforeach; ?>
    </ul>
</div>