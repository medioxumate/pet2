<?php
/**
 * pet2
 * Created by PhpStorm.
 * @author Brian Kiehn
 * @author Sang Le
 * @version 1.0
 * @date 4/19/2019
 *
 */
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//create an instance of the Base class/ fat free object
//instantiate fat free
$f3 = Base::instance();

//turn on fatfree error reporting
//debugging in fat free is difficult
$f3->set('DEBUG', 3);

//Define a default root, there can be multiple routes
$f3->route('GET /', function(){
    //display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /order', function(){
    $view = new Template();
    echo $view->render('views/order.html');
});

$f3->route('GET /@animal', function($f3, $params) {
    $animal= $params['animal'];

    switch($animal) {
        case 'dog':
            echo "<h3>$animal says woof</h3>";
            break;
        case 'cat':
            echo "<h3>$animal says meow</h3>";
            break;
        case 'chicken':
            echo "<h3>$animal says cluck</h3>";
            break;
        case 'lion':
            echo "<h3>$animal says roar</h3>";
            break;
        case 'fish':
            echo "<h3>$animal says woosh</h3>";
            break;
        default:
            $f3->error(404);
    }
});

$f3->run();
