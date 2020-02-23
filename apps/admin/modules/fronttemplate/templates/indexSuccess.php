<html>

Template Designer <br>
<br><br>
<?php echo form_tag('fronttemplate/templatesave')  ?>
Specify Entry Type
<select name=settype>
<option value='text'>Textbox small input</option>
<option value='textarea'>Large text area entry</option>
<option value='radio'>Radio multiple choice</option>
<option value='label'>Label </option>
</select>
<br>
Entry Type Name <input type=text name=settypename><br>
<input type=submit value='Add Item'>
<br><br>
</form>
Code:

<?php
echo $data;
?>

</html>