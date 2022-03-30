<h3>
    Категории новостей:
</h3>
<br>
@foreach ($categoryList as $category)
<div class="categories">
    <p>
        Наименование:
        <a href="{{ route('category.show', ['name' => $category]) }}">
            {{ $category }}
        </a>
    </p>
</div>
<hr>
@endforeach;
