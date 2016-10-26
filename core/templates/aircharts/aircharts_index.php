<div style="text-align: center;">
	<h3>Aircharts Search</h3>
    <form action="<?php echo SITE_URL; ?>/index.php/Aircharts" method="post">
    	<input type="text" name="icao" value="" />
        <input type="hidden" name="action" value="search" />
        <input type="submit" name="submit" value="Search Charts!" />
    </form>
</div>