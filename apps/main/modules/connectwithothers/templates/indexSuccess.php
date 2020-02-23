<?php use_helper('Javascript') ?>

<?php echo javascript_tag(
  remote_function(array(
    'url'     => 'mymodule/myaction',
  ))
) ?>

<?php include_partial('header', array('myarray' => $headermenu)) ?>
<tr>
<td valign=top>
	
	<div align="left">
	<a href='<?php echo url_for('connectwithothers/connectionlist'); ?>'>Connection List</a> (Search nearest location for groups)<br><br>
	<a href='<?php echo url_for('connectwithothers/messages'); ?>'>Messages </a> (Read, Post messages) <br><br>
	<a href='<?php echo url_for('connectwithothers/profile'); ?>'>Profile </a> (Create, Modify profile) <br>
	
	</div>
	
	
  </td>
  </tr>
 
  
  </table>