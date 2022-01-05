$routes->setAutoRoute(false); //set auto route true to false for security;

$routes->get('/', 'FrontendController::index');
$routes->get('about', 'FrontendController::about');

$routes->group('admin', function($routes){
	$routes->get('/', 'BackendController::index',['filter'=>'auth']);
	$routes->get('login', 'BackendController::login');
});

$routes->group('admin', ['filter'=>'auth'],['namespace'=>'App\Controllers\admin'], function($routes){
	$routes->get('/', 'BackendController::index');
	$routes->get('login', 'BackendController::login');
});

$routes->get('/test', function($routes){
return "hello";
});
