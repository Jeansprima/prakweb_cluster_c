<?= validation_errors(); ?>

<?= form_open('dashboard/edit/' . $artikel['id']); ?>
<table>
    <tr>
        <td><label for="title">Title</label></td>
        <td><input type="input" name="title" size="50" value="<?= $artikel['title'] ?>" /></td>
    </tr>
    <tr>
        <td><label for="text_article">Text</label></td>
        <td><textarea name="text_article" rows="10" cols="40"><?= $artikel['text_article'] ?></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td><button type="submit" name="submit" value="Edit artikel">Edit</button></td>
    </tr>
</table>

<input type="hidden" name="user_id" value="<?= $id_user; ?>" />
</form>