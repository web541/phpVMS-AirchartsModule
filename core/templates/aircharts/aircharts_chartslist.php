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
	// ICAO
	foreach($obj as $ke => $value) {
		// Title
		echo '<strong style="font-size: 16px;">Charts for '.$ke.'</strong>';
		echo '<br />';

		// Dropdown
		echo '<select onchange="window.open(this.value);" target="_blank">';
		echo '<option value="" selected disabled>--Select Chart--</option>';

		// Separate each chart group
		foreach($value["charts"] as $key => $val) {
			// Charts themselves
			foreach($val as $c) {
				echo '<option value="'.$c['url'].'">'.$c['chartname'].'</option>';
			}
		}

		// End Dropdown
		echo '</select>';
	}
	?>

    <br />
    <p>Disable your pop-up blocker for this page</p>
    <p>Charts provided by <a href="http://aircharts.org" target="_blank">aircharts.org</a></p>
  </div>
  <div id="tabs-2" style="text-align: left;">
	<?php
	// ICAO
	foreach($obj as $ke => $value) {
		echo '<strong style="font-size: 16px;">Charts for '.$ke.'</strong>';
		echo '<br />';

		// Separate each chart group
		foreach($value["charts"] as $key => $val) {
			echo '<h4>'.$key.' Charts</h4>';

			// Charts themselves
			foreach($val as $c) {
				echo $c['chartname'].' - <a href="'.$c['url'].'" target="_blank">Link Here</a>';
				echo '<br />';
			}
		}
	}
	?>

    <br />
    <p>Charts provided by <a href="http://aircharts.org" target="_blank">aircharts.org</a></p>
  </div>
</div>
