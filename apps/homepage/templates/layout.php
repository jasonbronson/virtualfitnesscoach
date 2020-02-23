<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>
<div align=center>
<table border=0 width=1320px cellspacing=0 cellpadding=0>
<tr valign=bottom>
<td><img src='/images/virtual_fitnesscoachSMALL.png' class=noborder width=200 height=100></td>
<td><img src='/images/home.png'><img src='/images/howitworks.png'><img src='/images/exercises.png'><img src='/images/nutrition.png'><img src='/images/whyitworks.png'><img src='/images/pricing.png'><img src='/images/aboutus.png'></td>
<td align=center>

<?php echo form_tag('homepage/login') ?>
<b>Member Login</b> <br>
Username: <input type=text name=username size=15><br>
Password: <input type=text name=password size=15><br>
          <input type=submit name=submit value=' Login '>
</form>

</td>
</tr>
</table>
<?php echo $sf_data->getRaw('sf_content') ?>






<table class="HomePageBottomTableTable" border="0" cellpadding="0" cellspacing="0" width="69%">
  <tr class="MainBodyTableTr">
    <td colspan="9" class="GreenLineHorizontal"><img src="/images/spacer.png"></td>
  </tr>
  <tr class="HomePageBottomTableTr" valign="top">

   <td class="GreenLineVertical" width="1"><img src="/images/spacer.png"></td>
    <td class="HomePageBottomTableTd" align="center"> <a href="HowiTrainerWorks-2.html" title="How iTrainer Works">Sample Exercise <br> <img src='/images/chestpressmachine1.jpg'></a></td>
    <td class="GreenLineVertical" width="1"><img src="/images/spacer.png"></td>
    <td class="HomePageBottomTableTd" align="center"><a href="Demo.html" title="iTrainer Flash Demo"> Sample Nutrition <br> <img src='/images/oatmeal.jpeg'></a></td>
    <td class="GreenLineVertical" width="1"><img src="/images/spacer.png"></td>
    <td class="HomePageBottomTableTd" align="center"><a href="Demo.html" title="iTrainer Flash Demo"> Sample FAQ <br><br>Q: What if I Skip Breakfast? </a></td>
    <td class="GreenLineVertical" width="1"><img src="/images/spacer.png"></td>
    <td class="HomePageBottomTableTd" align="center"><a href="Demo.html" title="iTrainer Flash Demo"> Sample Equipment <br><img src='/images/FitnessPicturePrettyGirl.jpg' width=200 height=180 border=0> </a></td>
    <td class="GreenLineVertical" width="1"><img src="/images/spacer.png"></td>
   </tr>
      <tr class="MainBodyTableTr">
    <td colspan="9" class="GreenLineHorizontal"><img src="/images/spacer.png"></td>
  </tr>
</table>

</body>
</html>
