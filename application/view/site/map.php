
<section class="wrapper row list-block">
	<h1>Site map</h1>


	<!-- PHP LOOP to go through all catagories and pages -->
	<?php
	foreach($this->siteMap as $cat=>$pages){
		echo '<p>' . $cat . '</p>';
		
		foreach($pages as $page){
			echo '<li>';
			echo '<a href="../' . $cat . '/' . $page . '">' . $page . '</a>'; 
			echo '</li>';
		}
			echo '</ul><br>';

	}
	?>

</section>