<h3>
    Новости по категории <?= $category ?>:
</h3>
<br>
<?php foreach ($newsList as $news) : ?>
    <div class="news">
        <h3>
            <a href="<?= route('news.show', ['id' => $news['id']]) ?>">
                <?= $news['title'] ?>
            </a>
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
    <hr>
<?php endforeach; ?>
