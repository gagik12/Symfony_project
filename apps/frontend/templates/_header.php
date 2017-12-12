<div class="header">
    <ul>
        <?
        $headerMenu = new HeaderMenu();
        $items = $headerMenu->generateItems();
        ?>
        <? foreach ($items as $item): ?>
            <li><a href="<?= $item->getLink() ?>"><?= $item->getTitle() ?></a></li>
        <? endforeach; ?>
    </ul>
</div>