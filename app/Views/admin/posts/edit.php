<h2>Редактировать пост</h2>

<form method="post" action="/admin/posts/edit">
    <input type="hidden" name="id" value="<?= $post['id'] ?>">

    <div>
        <label>Заголовок</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
    </div>

    <div>
        <label>Текст</label><br>
        <textarea name="content" rows="8" cols="60" required><?= htmlspecialchars($post['content']) ?></textarea>
    </div>

    <button type="submit">Сохранить</button>
</form>

<p><a href="/admin/posts">← Назад</a></p>
