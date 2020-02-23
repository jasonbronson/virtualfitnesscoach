<head>
<style type="text/css">
@import url(/css/calendar-blue.css);
</style>

</head>
<!-- import the calendar script -->
<script type="text/javascript" src="/js/calendar.js"></script>
<!-- import the language module -->
<script type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script type="text/javascript" src="/js/calendar-setup.js"></script>
.
<div align=center>
<h1>Link Graphics with Exercise Names</h1>
<?php


   foreach($exgraphic_files as $key => $value){
        $graphicfiles .= "<option value='$value'>$value</option>";

    }

  for($a=0; $a< count($exercise_list); $a++)
        $exlist .= "<option value='{$exercise_list[$a]['id']}'>{$exercise_list[$a]['exercisename']}</option>";

echo "$removedmsg";


echo form_tag('admin/linkgraphics');
?>

<select name='graphic'><?php echo $graphicfiles ?></select>
<select name='exercise_id'><?php echo $exlist ?></select>

<br>
<input type=submit name=submit value='Submit'>
</form>
<br>

<?php

for($a=0; $a< count($linkgraphicslist); $a++){
  echo "Click to Remove Link <a href='?remove={$linkgraphicslist[$a]['id']}'>".$linkgraphicslist[$a]['graphic']."</a> <br>";

}

?>