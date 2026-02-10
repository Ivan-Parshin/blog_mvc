<h2>Создать пост</h2>

<form method="post" action="/admin/posts/create">
    <div>
        <label>Заголовок</label><br>
        <input type="text" name="title" required>
    </div>

    <div>
        <label>Текст</label><br>
        <textarea name="content" rows="8" cols="60" required></textarea>
    </div>

    <button type="submit">Создать</button>
</form>

<p><a href="/admin/posts">← Назад</a></p>
