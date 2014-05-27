<?php

include( 'config.php' );

// Select all comments for current page
$query = 'SELECT id,
		name,
		comment,
		date
	FROM comment
	WHERE page = "'.$_SERVER['HTTP_REFERER'].'"
	ORDER BY date ASC';
$result = mysql_query( $query, $connect ) or die( mysql_error() );

$data = array();

if( mysql_num_rows( $result ) )
{
	while( $record = mysql_fetch_assoc( $result ) )
	{
		$data[] = $record;
	}
}

echo json_encode( $data );

?>

