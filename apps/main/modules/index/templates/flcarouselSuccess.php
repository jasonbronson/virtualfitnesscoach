<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>

<slide_show>
  <options>
    <background>transparent</background>		<!-- #RRGGBB, transparent -->
<margins>
      <bottom>44</bottom>						<!-- [-1000,1000] pixels -->
      <vertical_ratio>60%</vertical_ratio>	<!-- [1,100] a photo may occupy at most verticalRatio percent of the Carousel height -->

    </margins>

    <interaction>
      <rotation>mouse</rotation>			<!-- auto, mouse, keyboard -->
      <view_point>none</view_point>		<!-- none, mouse, keyboard -->
      <speed>25</speed>					<!-- [-360,360] degrees per second -->
      <default_view_point>100%</default_view_point>	<!-- [0,100] percentage -->
    </interaction>

    <titles>
      <style>font-size: 14px; font-family: Verdana, _serif; color: #003366;</style>

    </titles>
  </options>

   <photo title="apples have water in them">./carousel/images/apple.jpeg</photo>
   <photo title="oatmeal is good for your body">/carousel/images/oatmeal.jpeg</photo>
   <photo title="Cool Man">/carousel/images/DCP_0732.png</photo>
   <photo title="Very nice thing">/carousel/images/DCP_0733.png</photo>
</slide_show>
