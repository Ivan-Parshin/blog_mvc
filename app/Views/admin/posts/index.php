<h2>Посты</h2>

<a href="/admin/posts/create">+ Создать пост</a>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Заголовок</th>
        <th>Действия</th>
    </tr>

    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td>
                <a href="/admin/posts/edit?id=<?= $post['id'] ?>">Редактировать</a>

                <form action="/admin/posts/delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <button type="submit" onclick="return confirm('Удалить пост?')">
                        Удалить
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p><a href="/admin">← Назад в админку</a></p>
