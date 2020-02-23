<style>
.choosecompany{
	border-style: solid;
	border-width: 0px;
	border-color: red;
	text-align: center;
	
}
.choosecompany ol li { list-style-image: none; list-style-type: none; padding:12px;}
.pushblock{ height: 100px;}
</style>
<div class="pushblock"></div>
<div class="choosecompany">
	Choose which Company you want to work with currently using <?php echo $companyname ?>
	<ol>
		<?php foreach($groups as $value): ?>
		<li><a href='<?php echo url_for('login/choosecompany'); ?>?company=<?php echo $value['group_id'] ?>&companyname=<?php echo $value['group_name'] ?>'><?php echo $value['group_name'] ?></a></li>
		<?php endforeach; ?>
		<!--  li><a href='?company=all'>All</a></li-->
	</ol>

</div>