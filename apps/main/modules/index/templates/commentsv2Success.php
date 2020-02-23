<?php use_helper('Javascript') ?>
<script type="text/javascript">
//<![CDATA[
  function foobar()
  {
    ...
  }
//]]>
</script>

<div>

<div id="notification"></div>
<?php /*echo periodically_call_remote(array(
    'frequency' => 4,
    'update'    => 'chatarea',
    'url'       => 'index/getchat',
    'with'      => "'user_id=15",
))*/ ?>


<?php echo form_remote_tag(array(
'update' => 'chatarea',
'url'    => 'index/sendchat',
)) ?>
<font size="2">Chat with Coach</font><br/>
<textarea rows="8" cols="40" id="chatinput"><div id="chatarea"></div></textarea><br/>
<input type="text" id="send" maxlength="190" size="28" value="Type Message Here" onclick="this.value=''"/>
<?php echo submit_tag('Send') ?>
</form>
</div>
