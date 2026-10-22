<?php 
/*if ( ICL_LANGUAGE_CODE == 'fr' ) {
    $search = "Rechercher " . get_bloginfo('name') ;
} else {
    $search = "Search " . get_bloginfo('name') ;
}*/
$search = "Search" . get_bloginfo('name');
?>
<form id="searchform" class="searchform form-inline" action="<?php 
	//echo icl_get_home_url(); 
	
	?>" method="get" role="search">
    <div class="form-group">
        <input id="s" class="form-control" type="text" placeholder="<?php echo $search;?>" title="<?php echo $search;?>" name="s" value="">
        <button id="searchsubmit" class="btn btn-glendon-blue" type="submit">
            <i class="glyphicon glyphicon-search"></i>
        </button>
    </div>
    <input type="hidden" value="<?php 
	//echo ( ICL_LANGUAGE_CODE );
	echo "en";
	?>" name="lang">
</form>

