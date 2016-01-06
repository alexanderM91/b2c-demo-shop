<?php

namespace Pyz\Yves\Customer\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CustomerControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_LOGIN = 'login';
    const ROUTE_LOGOUT = 'logout';
    const ROUTE_REGISTER = 'register';
    const ROUTE_PASSWORD_FORGOTTEN = 'password/forgotten';
    const ROUTE_PASSWORD_RESTORE = 'password/restore';
    const ROUTE_CUSTOMER_PROFILE = 'customer/profile';
    const ROUTE_CUSTOMER_ADDRESS = 'customer/address';
    const ROUTE_CUSTOMER_NEW_ADDRESS = 'customer/new_address';
    const ROUTE_CUSTOMER_DELETE_ADDRESS = 'customer/delete_address';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{login}', self::ROUTE_LOGIN, 'Customer', 'Auth', 'login')
            ->assert('login', $allowedLocalesPattern . 'login|login')
            ->value('login', 'login');
        $this->createController('/{logout}', self::ROUTE_LOGOUT, 'Customer', 'Auth', 'logout')
            ->assert('logout', $allowedLocalesPattern . 'logout|logout')
            ->value('logout', 'logout');
        $this->createController('/{register}', self::ROUTE_REGISTER, 'Customer', 'Register', 'index')
            ->assert('register', $allowedLocalesPattern . 'register|register')
            ->value('register', 'register');

        $this->createController('/{password}/forgotten', self::ROUTE_PASSWORD_FORGOTTEN, 'Customer', 'Password', 'forgottenPassword')
            ->assert('password', $allowedLocalesPattern . 'password|password')
            ->value('password', 'password');
        $this->createController('/{password}/restore', self::ROUTE_PASSWORD_RESTORE, 'Customer', 'Password', 'restorePassword')
            ->assert('password', $allowedLocalesPattern . 'password|password')
            ->value('password', 'password');

        $this->createController('/{customer}/profile', self::ROUTE_CUSTOMER_PROFILE, 'Customer', 'Profile', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address', self::ROUTE_CUSTOMER_ADDRESS, 'Customer', 'Address', 'update')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address/new', self::ROUTE_CUSTOMER_NEW_ADDRESS, 'Customer', 'Address', 'create')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address/delete', self::ROUTE_CUSTOMER_DELETE_ADDRESS, 'Customer', 'Address', 'delete')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
    }

}
