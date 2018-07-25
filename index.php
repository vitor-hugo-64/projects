<?php

require_once('vendor/autoload.php');

use \Slim\App;
use \ST\Page;
use \ST\DB\DB;

$config = array( 'settings' => array( 'addContentLengthHeader' => false), 'debug' => true);

$app = new App($config);

$app->get( '/ajax', function ( $request, $response, $args) {
	$page = new Page();
	$parameters = array( 'name' => 'Hello Peoples!');
	$page->drawPage( 'index', $parameters);
});

$app->get( '/ajax/search', function ()
{
	sleep(1);
	$db = new DB();
	$response = $db->select( "SELECT person_id, first_name, last_name, handle FROM st_person");

	$table = '';

	foreach ($response as $row) {
		$table = $table . '<tr>';
		$table = $table . '<th>' . $row['person_id'] . '</th>';
		$table = $table . '<td>' . $row['first_name'] . '</td>';
		$table = $table . '<td>' . $row['last_name'] . '</td>';
		$table = $table . '<td>' . $row['handle'] . '</td>';
		$table = $table . '</tr>';
	}

	echo $table;
});

$app->get( '/ajax/search/{text}', function ( $request, $response, $args)
{
	sleep( 1);
	$db = new DB();
	$querySelect = "SELECT person_id, first_name, last_name, handle FROM st_person WHERE first_name LIKE :search";
	$parameters = array( ':search' => $args['text'] . '%');
	$response = $db->select( $querySelect, $parameters);

	$table = '';

	foreach ($response as $row) {
		$table = $table . '<tr>';
		$table = $table . '<th>' . $row['person_id'] . '</th>';
		$table = $table . '<td>' . $row['first_name'] . '</td>';
		$table = $table . '<td>' . $row['last_name'] . '</td>';
		$table = $table . '<td>' . $row['handle'] . '</td>';
		$table = $table . '</tr>';
	}

	echo $table;
});

$app->get( '/pagination/{begin}', function ( $request, $response, $args)
{
	$db = new DB();
	$querySelect = "SELECT person_id, first_name, last_name, handle FROM st_person LIMIT :begin, :limit";
	$parameters = array( ':begin' => (int)$args['begin'], ':limit' => (int)5);
	$response = $db->select( $querySelect, $parameters);

	echo json_encode( $response);
});

$app->run();