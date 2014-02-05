<?php

$postdate = mysql2date('j M Y', $news->post_date);?>
	<span class="meta<?php if (is_archive()){echo " archive";} ?>"><?php echo $postdate; ?></span>


