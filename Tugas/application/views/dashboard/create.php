 <?php echo validation_errors(); ?>

 <?php echo form_open_multipart('dashboard/create'); ?>

 <table>
     <tr>
         <td><label for="title">Title</label></td>
         <td><input type="input" name="title" size="50" /></td>
     </tr>
     <tr>
         <td><label for="artikel">Text</label></td>
         <td><textarea name="artikel" rows="10" cols="40"></textarea></td>
     </tr>
     <tr>
         <td></td>
         <td><button type="submit" name="submit">Publish</button></td>
     </tr>
 </table>

 <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
 </form>