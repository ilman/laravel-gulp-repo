Laravel Starter
==============

### Install Debugbar

Open app/config/app.php and the following code
	
	// service provider
	'Barryvdh\Debugbar\ServiceProvider',
	// alias	
	'Debugbar' => 'Barryvdh\Debugbar\Facade',
	

Run 
```	
php artisan config:publish barryvdh/laravel-debugbar
```	

### Install Migration Generator

Open app/config/app.php and the following code
	
	// service provider
	'Way\Generators\GeneratorsServiceProvider',
	'Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider',
	

Run 
```
php artisan migrate:generate table1,table2,table3,table4,table5
```
	 

### Install Notification

Open app/config/app.php and the following code
	
	// service provider
	'Krucas\Notification\NotificationServiceProvider',
	// service provider	
	'Notification' => 'Krucas\Notification\Facades\Notification',
	

Run 
```
php artisan config:publish edvinaskrucas/notification
```	 

Usage

	// in controller
	Notification::success('Success message');
	Notification::error('Error message');
	Notification::info('Info message');
	Notification::warning('Warning message');

	// in view
	Notification::container('container_name') // or
	Notification::container() // or
	Notification::showAll()


## Start

run ```composer install``` or ```composer update``` and test the following url
```
http://your_app_url/public/marketnesia/market/store
```