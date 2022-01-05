$routes->setAutoRoute(false); //set auto route true to false for security;

$routes->get('/', 'AController::index');
$routes->get('about', 'AController::about');

$routes->group('admin', function($routes){
	$routes->get('/', 'BController::index',['filter'=>'auth']);
	$routes->get('login', 'BController::login');
});

$routes->group('admin', ['filter'=>'auth'],['namespace'=>'App\Controllers\admin'], function($routes){
	$routes->get('/', 'BController::index');
	$routes->get('login', 'BController::login');
});

$routes->get('/test', function($routes){
return "hello";
});
