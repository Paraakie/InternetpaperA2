<?php
use PHPRouter\RouteCollection;
use PHPRouter\Router;
use PHPRouter\Route;

$collection = new RouteCollection();

/**
 * Redirects to log-in or showAccounts when address isn't specified
 */
$collection->attachRoute(
    new Route(
        '/',
        array(
            '_controller' => 'agilman\a2\controller\HomeController::indexAction',
            'methods' => 'GET',
            'name' => 'Home'
        )
    )
);

/**
 * When user is logged-in he can see all his accounts
 */
$collection->attachRoute(
    new Route(
        '/account/',
        array(
        '_controller' => 'agilman\a2\controller\AccountController::showAccounts',
        'methods' => 'GET',
        'name' => 'showAccounts'
        )
    )
);

/**
 * User Enters Name here before creating an account
 */
$collection->attachRoute(
    new Route(
        '/account/enterAccName',
        array(
            '_controller' => 'agilman\a2\controller\AccountController::enterAccName',
            'methods' => 'GET',
            'name' => 'enterAccName'
        )
    )
);


/**
 * Create an account, always called after enter 'enterAccountName'
 */
$collection->attachRoute(
    new Route(
        '/account/create/:name',
        array(
        '_controller' => 'agilman\a2\controller\AccountController::createAction',
        'methods' => 'GET',
        'name' => 'accountCreate'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/account/delete/:id',
        array(
        '_controller' => 'agilman\a2\controller\AccountController::deleteAction',
        'methods' => 'GET',
        'name' => 'accountDelete'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/account/update/:id',
        array(
        '_controller' => 'agilman\a2\controller\AccountController::updateAction',
        'methods' => 'GET',
        'name' => 'accountUpdate'
        )
    )
);
/**
 * our login router
 */
$collection->attachRoute(
    new Route(
        '/login/',
        array(
            '_controller' => 'agilman\a2\controller\UserAccountController::login',
            'methods' => 'GET',
            'name' => 'login'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/login/',
        array(
            '_controller' => 'agilman\a2\controller\UserAccountController::login',
            'methods' => 'POST',
            'name' => 'login'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/signUp/',
        array(
            '_controller' => 'agilman\a2\controller\UserAccountController::signUp',
            'methods' => 'POST',
            'name' => 'signUp'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/signUp/',
        array(
            '_controller' => 'agilman\a2\controller\UserAccountController::signUp',
            'methods' => 'GET',
            'name' => 'signUp'
        )
    )
);

/**
 * Transaction Pages
 */
//Transaction Index
$collection->attachRoute(
    new Route(
        '/transactions/',
        array(
            '_controller' => 'agilman\a2\controller\TransController::createTransIndexPage',
            'methods' => 'GET',
            'name' => 'TransIndex'
        )
    )
);

/**
 *  Deposit Routers
 */

$collection->attachRoute(
    new Route(
        '/account/deposit/:id',
        array(
            '_controller' => 'agilman\a2\controller\TransController::createDepositPage',
            'methods' => 'GET',
            'name' => 'deposit'
        )
    )
);

$collection->attachRoute(
    new Route(
        '/account/deposit/:id',
        array(
            '_controller' => 'agilman\a2\controller\TransController::deposit',
            'methods' => 'POST',
            'name' => 'deposit'
        )
    )
);

/*
 * Transaction Transfer
 */
$collection->attachRoute(
    new Route(
        '/transactions/transfer/:id',
        array(
            '_controller' => 'agilman\a2\controller\TransController::createTransTransferPage',
            'methods' => 'GET',
            'name' => 'TransTransfer'
        )
    )
);
/*
 * Transaction Withdrawal
 */

$collection->attachRoute(
    new Route(
        '/transactions/withdrawal/:id',
        array(
            '_controller' => 'agilman\a2\controller\TransController::createTransWithdrawalPage',
            'methods' => 'GET',
            'name' => 'TransWithdrawal'
        )
    )
);

/**
 * Logout router
 */
$collection->attachRoute(
    new Route(
        '/account/logout',
        array(
            '_controller' => 'agilman\a2\controller\HomeController::logout',
            'methods' => 'GET',
            'name' => 'logout'
        )
    )
);


$router = new Router($collection);
$router->setBasePath('/');
