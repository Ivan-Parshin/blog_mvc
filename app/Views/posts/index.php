<h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>

<?php if (empty($posts)): ?>
    <p>Постов пока нет.</p>
<?php else: ?>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <strong><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></strong><br>
                <small><?= htmlspecialchars($post['created_at'], ENT_QUOTES, 'UTF-8') ?></small>
                <p><?= nl2br(htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8')) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
