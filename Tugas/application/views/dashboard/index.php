<table border='1' cellpadding='4'>
    <tr>
        <th><strong>Title</strong></th>
        <th><strong>Content</strong></th>
        <th><strong>Action</strong></th>
    </tr>
    <?php foreach ($title as $data) : ?>
        <tr>
            <td><?= $data['title']; ?></td>
            <td><?= $data['text_article']; ?></td>
            <td>
                <a href="<?= site_url('news/' . $data['title']); ?>">View</a>

                <?php if ($this->session->userdata('is_logged_in')) { ?>
                    |
                    <a href="<?= site_url('news/edit/' . $data['id']); ?>">Edit</a> |
                    <a href="<?= site_url('news/delete/' . $data['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                <?php } // end if 
                ?>

            </td>
        </tr>
    <?php endforeach; ?>
</table>