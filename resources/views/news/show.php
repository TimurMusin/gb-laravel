<div class="news">
    <h3>
        <?= $news['title'] ?>
    </h3>
    <img src="<?= $news['image'] ?>">
    <br>
    <p>Стаутус:
        <em>
            <?= $news['status'] ?>
        </em>
    </p>
    <p>Категория:
        <em>
            <?= $news['category'] ?>
        </em>
    </p>
    <p>Автор:
        <em>
            <?= $news['author'] ?>
        </em>
    </p>
    <p>
        <?= $news['description'] ?>
    </p>
</div>
