<?php
// lists files only for the directory which this script is run from
//$default_dir = "/medstaff-docs/";
//$default_dir is now passed variable when this file is call using include(locate_template( './templates/list-files.php' ));

function file_ext_strip( $filename ) {
    return preg_replace( '/\.[^.]*$/', '', $filename );
}

function file_replace_spacer( $filename ) {
	return preg_replace( '/[_-]+/', ' ', $filename );
}

function file_title_case( $filename ) {
	return ucwords( $filename );
}

function list_directory( $dir ) {
	$narray     = array();
	$dir_handle = @opendir( $dir ) or die( "Unable to open $dir" );
	$i          = 0;
	$skip_files = array( ".DS_Store", ".", "..", ".htaccess", "index.php" );

	while( false !== ( $file = readdir( $dir_handle ) ) ) {
		if ( ! in_array( $file, $skip_files ) ) {
			$narray[ $i ] = $file;
			$i++;
		}
	}
	closedir( $dir_handle ); //closing the directory
	natcasesort( $narray ); // case-insensitive sort
	return $narray;
}

// print out html
echo "\t" . '<ul>' . "\r\n\t";
$directory_array = list_directory( WP_CONTENT_DIR . $default_dir );

global $pagename;
if ( 'minutes' === $pagename ) {
	 rsort( $directory_array );
}
foreach ( $directory_array as $fn ) {
	$fn_ext = $fn;
	$fn = file_ext_strip( $fn );
	$fn = file_replace_spacer( $fn );
	$fn = file_title_case( $fn );
	echo "<li><a href=" . chr(34) . content_url() . $default_dir . $fn_ext . chr(34) . ">" . $fn . "</a></li>\r\n\t";
}

echo '</ul>' . "\r\n\t";
