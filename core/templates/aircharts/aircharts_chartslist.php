<script type="text/javascript">
$(function() {
	$(".tabs").tabs();
});
</script>

<div class="tabs">
  <ul>
    <li><a href="#tabs-1">Dropdown Charts</a></li>
    <li><a href="#tabs-2">List Charts</a></li>
  </ul>
  <div id="tabs-1">
	<?php
	foreach($obj as $o) {
		echo '<strong>Charts for '.$icao.'</strong>';
		echo '<br />';
		echo '<select onchange="window.open(this.value);" target="_blank">';
		echo '<option value="" selected disabled>--Select Chart--</option>';
		foreach($o['charts'] as $c) {
			echo '<option value="'.$c['url'].'">'.$c['name'].'</option>';
		}
		echo '</select>';
	}
	?>
    
    <br />
    <p>Disable your pop-up blocker for this page</p>
    <p>Charts provided by <a href="http://aircharts.org" target="_blank">aircharts.org</a></p>
  </div>
  <div id="tabs-2">
	<?php
	foreach($obj as $o) {
		echo '<strong>Charts for '.$icao.'</strong>';
		echo '<br />';
		foreach($o['charts'] as $c) {
			echo $c['name'].' - <a href="'.$c['url'].'" target="_blank">Link Here</a>';
			echo '<br />';
		}
	}
	?>
    
    <br />
    <p>Charts provided by <a href="http://aircharts.org" target="_blank">aircharts.org</a></p>
  </div>
</div>