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

$routes->get('/test', function(){
return "hello";
});

$routes->get('/test', function(){
return view("test");
});

$routes->get("service/(:num)", function($id){
echo "ID".$id
});   //get num value/paremiter from url. Also can use [(:any),(hash),(alpha),(alphanum),(segment)]

$routes->get("test/(:num)/(:any)", "homecontroller::test/$1/$2");
