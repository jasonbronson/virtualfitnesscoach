.
<br><br>
<div align=center><font size=+1>You can only upload one type at a time </font></div>
<br><br>
<table border=0 width=100%>
<tr>
<td>

<h1>Upload Swif Files</h1>
<?php
echo form_tag('admin/uploadfiles', 'multipart=true');
?>
<input type=hidden name=type value=swf>
Swif File #1 <input type=file name=swf1 ><br>
Swif File #2 <input type=file name=swf2 ><br>
Swif File #3 <input type=file name=swf3 ><br>
Swif File #4 <input type=file name=swf4 ><br>
<input type=submit name=submit value='Submit'>
</form>

</td>
<td>

<h1>Upload Graphic Files</h1>
<?php
echo form_tag('admin/uploadfiles', 'multipart=true');
?>
<input type=hidden name=type value=graphic>
Graphic File #1 <input type=file name=graphic1 ><br>
Graphic File #2 <input type=file name=graphic2 ><br>
Graphic File #3 <input type=file name=graphic3 ><br>
Graphic File #4 <input type=file name=graphic4 ><br>
<input type=submit name=submit value='Submit'>
</form>

</td>
</tr>
<tr>
</td>
<td>

<h1>Upload Nutrition Graphic Files</h1>
<?php
echo form_tag('admin/uploadfiles', 'multipart=true');
?>
<input type=hidden name=type value=nutrition>
Graphic File #1 <input type=file name=graphic1 ><br>
Graphic File #2 <input type=file name=graphic2 ><br>
Graphic File #3 <input type=file name=graphic3 ><br>
Graphic File #4 <input type=file name=graphic4 ><br>
<input type=submit name=submit value='Submit'>
</form>

</td>

<td>

<!--  h1>Upload Popup Video Files</h1>
<?php
    //echo form_tag('admin/uploadfiles', 'multipart=true');
?>
<input type=hidden name=type value=popup>
Video File #1 <input type=file name=graphic1 ><br>
Video File #2 <input type=file name=graphic2 ><br>
Video File #3 <input type=file name=graphic3 ><br>
Video File #4 <input type=file name=graphic4 ><br>
<input type=submit name=submit value='Submit'>
</form>
-->
</td>
</tr>
</table>

<br>

<font size=+1>Remove Files</font>
<table border=0>
<tr>
<td>
<?php
echo form_tag('admin/uploadfiles');

  foreach($swif_files as $key => $value){
      if($key > 1){
         $swffiles .= "<option value='$value'>$value</option>";
      }
    }

    $swiflist = "<select name=removeswif>
    <option value=''></option>
    $swffiles
    </select>";
?>
</td>
<td>Swif Files <?php echo $swiflist ?> <input type=submit name=remove value=Remove></td>
</form>
</tr>

<tr>
<td>
<?php
echo form_tag('admin/uploadfiles');

  foreach($graphic_files as $key => $value){
      if($key > 1){
        $graphiclist .= "<option value='$value'>$value</option>";
      }
    }

    $graphic_select = "
    <select name=removegraphic>
    <option value=''></option>
    $graphiclist
    </select>";




?>
</td>
<td>Graphic Files <?php echo $graphic_select ?>  <input type=submit name=remove value=Remove></td>
</form>
</tr>


<tr>
<td>
<?php
echo form_tag('admin/uploadfiles');

  foreach($nutrition_files as $key => $value){
      if($key > 1){
        $nutritionlist .= "<option value='$value'>$value</option>";
      }
    }

    $graphic_select = "
    <select name=removenutrition>
    <option value=''></option>
    $nutritionlist
    </select>";




?>
</td>
<td>Nutrition Files <?php echo $graphic_select ?>  <input type=submit name=remove value=Remove></td>
</form>
</tr>

<tr>
<td>
<?php
/*
echo form_tag('admin/uploadfiles');

  foreach($popup_videofiles as $key => $value){
      if($key > 1){
        $popupfiles .= "<option value='$value'>$value</option>";
      }
    }

    $popup_select = "
    <select name=removepopup>
    <option value=''></option>
    $popupfiles
    </select>";


*/

?>
</td>
<!-- td>Popup Video Files <?php echo $popup_select ?>  <input type=submit name=remove value=Remove></td-->
</form>
</tr>



</table>

<h1><?php echo $msg; ?></h1>


