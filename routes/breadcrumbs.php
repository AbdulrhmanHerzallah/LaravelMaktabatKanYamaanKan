<?php


//
//Breadcrumbs::for('home' , function ($trail) {
//    $trail->push(__('breadcrumbs.home') , url('/'));
//});


// Home > dashboard
Breadcrumbs::for('dashboard', function ($trail) {
//    $trail->parent('home');
    $trail->push(__('breadcrumbs.dashboard') , route('index.index'));
});


// Home > dashboard > create_new
Breadcrumbs::for('bill_create', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.create_new_bill') , route('bill.create'));
});

Breadcrumbs::for('upload_files', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.upload') , route('file.create'));
});

Breadcrumbs::for('my_files', function ($trail) {
    $trail->parent('upload_files');
    $trail->push(__('layout.my_file') , route('my-files.index'));
});

Breadcrumbs::for('public_file', function ($trail) {
    $trail->parent('my_files');
    $trail->push(__('layout.public_file') , route('my-files.index'));
});

Breadcrumbs::for('admin_file', function ($trail) {
    $trail->parent('public_file');
    $trail->push(__('layout.all_files') , route('my-files.index'));
});

Breadcrumbs::for('file_cat', function ($trail) {
    $trail->parent('upload_files');
    $trail->push(__('breadcrumbs.cat') , route('file_cat.create'));
});


Breadcrumbs::for('create_demand' , function ($trail) {
   $trail->parent('dashboard');
    $trail->push(__('layout.create_demand') , route('demand.create'));

});





Breadcrumbs::for('create_user' , function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.create_user_by_admin') , route('user.create'));

});

Breadcrumbs::for('users_info' , function ($trail) {
    $trail->parent('create_user');
    $trail->push(__('layout.users_info') , route('user.get_users_info'));
});


Breadcrumbs::for('account_settings' , function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.update_my_settings') , route('user.edit_account_sett'));
});

Breadcrumbs::for('my_bills' , function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.my_bills') , route('bill.showMyBill'));
});

Breadcrumbs::for('all_bills_admin' , function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.all_users_create_bills') , route('bill.all_bills_admin'));
});


Breadcrumbs::for('create_latter' , function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.create_new_letter') , route('letter.create'));
});

Breadcrumbs::for('show_my_latters' , function ($trail) {
    $trail->parent('create_latter');
    $trail->push(__('layout.my_letters') , route('letter.show'));
});

Breadcrumbs::for('emp_letters' , function ($trail) {
    $trail->parent('create_latter');
    $trail->push(__('layout.emp_letters') , route('letter.show_admin'));
});

Breadcrumbs::for('all_files_admin' , function ($trail) {
    $trail->parent('my_files');
    $trail->push(__('layout.all_emp_files') , route('admin.file.index'));
});


Breadcrumbs::for('my_demand' , function ($trail) {
    $trail->parent('create_demand');
    $trail->push(__('layout.my_demand') , route('demand.show-my-demand'));

});


Breadcrumbs::for('inbox_d' , function ($trail) {
    $trail->parent('create_demand');
    $trail->push(__('layout.inbox_demand') , route('demand.show-inbox-demand'));

});


Breadcrumbs::for('create_event' , function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.create_event') , route('event.create'));

});

Breadcrumbs::for('event_listed' , function ($trail) {
    $trail->parent('create_event');
    $trail->push(__('layout.event_listed') , route('listed_event.index'));
});

Breadcrumbs::for('my-info' , function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('layout.my-info') , route('user.info'));
});
Breadcrumbs::for('soft_users' , function ($trail) {
    $trail->parent('create_user');
    $trail->push(__('layout.get_users_soft') , route('user.get.users_del'));
});
