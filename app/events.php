<?php 

Event::listen('test.dashboard', function($user){
   Debugbar::info('test_dashboard_success');
   Debugbar::info($user);
}, 10);

Event::listen('user.register', function($user){
   // sent welcome email
}, 10);

Event::listen('user.login', function($user){
   // sent notif email
}, 10);

Event::listen('user.forgot', function($user){
   // sent notif email
}, 10);

Event::listen('user.change_password', function($user){
   // sent notif email
}, 10);