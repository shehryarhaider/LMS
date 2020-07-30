<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

const cms = 'CMS\\';
const vendor = 'Vendor\\';
const auth = 'Auth\\';

//auth middlware and user stats
// userStatus checks to see if the person is active or not
// session work
Route::group(['middleware' => ['auth','userStatus','lastLogin','optimizeImages']], function () {

    //     .oooooo.   ooo        ooooo  .oooooo..o
    //     d8P'  `Y8b  `88.       .888' d8P'    `Y8
    //    888           888b     d'888  Y88bo.
    //    888           8 Y88. .P  888   `"Y8888o.
    //    888           8  `888'   888       `"Y88b
    //    `88b    ooo   8    Y     888  oo     .d8P
    //     `Y8bood8P'  o8o        o888o 8""88888P'

    //here lies cms routes
    Route::post('logout', auth.'LoginController@logout')->name('logout');

    Route::namespace(cms)->group( function () {
        // blank page
        Route::get('/', 'DashboardController@empty')->name('empty');

        //Datatables ajax
        Route::get('/users/datatable', 'UsersController@datatable')->name('users.datatable');
        Route::get('/roles/datatable', 'RoleController@datatable')->name('roles.datatable');
        Route::get('/chart_of_account/datatable', 'ChartOfAccountController@datatable')->name('chart_of_account.datatable');
        Route::get('/chart_of_account/{chart_of_account}/sub_account_types/datatable', "SubAccountTypeController@datatable")->name('sub_account_type.datatable');
        Route::get('/chart_of_account/{chart_of_account}/sub_account_type/{sub_account_type}/list_of_account/datatable', "ListofAccountController@datatable")->name('list_of_account.datatable');
        Route::get('/customers/datatable', 'CustomerController@datatable')->name('customers.datatable');
        Route::get('/vendors/datatable', 'VendorController@datatable')->name('vendors.datatable');



        Route::get('/terms/datatable', 'TermsController@datatable')->name('term.datatable');
        Route::get('/categoryfaq/datatable', 'FAQCategoryController@datatable')->name('faq.category.datatable');
        Route::get('/donor/datatable', 'DonorController@datatable')->name('donor.datatable');
        Route::get('/media_videos/datatable', 'MediaVideoController@datatable')->name('media_videos.datatable');
        Route::get('/slider_image/datatable', 'SliderImagesController@datatable')->name('slider_image.datatable');
        Route::get('/gallery/datatable', 'GalleryController@datatable')->name('gallery.datatable');
        Route::get('/patron/datatable', 'PatronController@datatable')->name('patron.datatable');
        Route::get('terms/{term}/managing_committee/datatable', 'ManagingCommitteeController@datatable')->name('managing_committee.datatable');
        Route::get('terms/{term}/executive_committee/datatable', 'ExecutiveCommitteeController@datatable')->name('executive_committee.datatable');
        Route::get('terms/{term}/sub_committee/datatable', 'SubCommitteeController@datatable')->name('sub_committee.datatable');
        Route::get('/event_categories/datatable', 'EventCategoryController@datatable')->name('event_categories.datatable');
        Route::get('/blogcategory/datatable', 'BlogCategoryController@datatable')->name('blog.category.datatable');
        Route::get('/blog/post/datatable', 'PostController@datatable')->name('blog.post.datatable');
        Route::get('/clients/datatable', 'ClientsController@datatable')->name('clients.datatable');
        Route::get('import/clients/datatable', 'ImportClientsController@datatable')->name('import.clients.datatable');
        Route::get('/pages/datatable', 'ContentPageController@datatable')->name('content.datatable');
        Route::get('/seo/datatable', 'SEOController@datatable')->name('seo.datatable');
        Route::get('/pages/introduction/image_section/datatable', 'InaugurationImageSectionController@datatable')->name('image_section.datatable');
        Route::get('/pages/findingsurvey/image_section/datatable', 'FindingImageSectionController@datatable')->name('findingsurvey_image_section.datatable');
        Route::get('/pages/english_class/image_section/datatable', 'EnglishClassSectionController@datatable')->name('english_class_image_section.datatable');

        Route::get('/pages/computer_class/image_section/datatable', 'ComputerClassSectionController@datatable')->name('computer_class_image_section.datatable');

        //Our Service Section
        Route::get('/pages/home/our_services/datatable', "OurServiceSectionController@datatable")->name('our_service.datatable');

        Route::get('/pages/home/pad_education/datatable', "PadEducationSectionController@datatable")->name('pad_education.datatable');


        // Ajax Gets Validation
        Route::get('/users/validater/{id}', 'UsersController@validater')->name('users.validater');
        Route::get('/roles/validater/{id}', 'RoleController@validater')->name('roles.validater');
        Route::get('/chart_of_account/validater/{id}', "ChartOfAccountController@validater")->name('chart_of_account.validater');
        Route::get('/list_of_account/validater/{id}', "ListofAccountController@validater")->name('list_of_account.validater');
        Route::get('/categoryfaq/validater/{id}', "FAQCategoryController@validater")->name('faq.category.validater');
        Route::get('/blogcategory/validater/{id}', "BlogCategoryController@validater")->name('blog.category.validater');
        Route::get('/blog/post/validater/{id}', 'PostController@validater')->name('blog.post.validater');
    });

    // permission middlware
    //checks to see if the user has persmission or not

    // menuStatus middlware
    // check to see if the menus on the right hand sides are active
    Route::group(['middleware' => ['permission','menuStatus']], function () {
        Route::namespace(cms)->group(function () {
            // dashboard
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

            //users
            Route::get('/users', 'UsersController@index')->name('users');
            Route::get('/users/create', 'UsersController@create')->name('users.create');
            Route::post('/users/store', 'UsersController@store')->name('users.store');
            Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::put('/users/{user}/update', 'UsersController@update')->name('users.update');
            Route::patch('/users/status', 'UsersController@status')->name('users.status');
            Route::delete('/users/destroy', 'UsersController@destroy')->name('users.destroy');

            // User Self Settings
            Route::get('/users/settings', 'UsersController@settings')->name('users.settings');
            Route::patch('/users/settings', 'UsersController@patch')->name('users.settings');

            //users
            Route::get('/roles', 'RoleController@index')->name('roles');
            Route::get('/roles/create', 'RoleController@create')->name('roles.create');
            Route::post('/roles/store', 'RoleController@store')->name('roles.store');
            Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
            Route::put('/roles/{role}/update', 'RoleController@update')->name('roles.update');
            Route::delete('/roles/destroy', 'RoleController@destroy')->name('roles.destroy');

            //logs
            Route::get('/log/user', 'LogController@userindex')->name('log.user');
            Route::post('/log/userget', 'LogController@userget')->name('log.userget');
            Route::get('/log/actions', 'LogController@actionindex')->name('log.action');
            Route::post('/log/actionsget', 'LogController@actionget')->name('log.actionget');

            //reports
            Route::get('/reports/report', 'ReportsController@index')->name('reports');
            Route::post('/reports/report', 'ReportsController@report')->name('reports');

            //Chart of Accounts
            Route::get('/chart_of_account', "ChartOfAccountController@index")->name('chart_of_account');
            Route::get('/chart_of_account/add', "ChartofAccountController@create")->name('chart_of_account.create');
            Route::post('/chart_of_account/add', "ChartofAccountController@store")->name('chart_of_account.store');
            Route::get('/chart_of_account/{chart_of_account}/edit', "ChartofAccountController@edit")->name('chart_of_account.edit');
            Route::put('/chart_of_account/{chart_of_account}/edit', "ChartofAccountController@update")->name('chart_of_account.update');
            Route::patch('/chart_of_account/status', "ChartofAccountController@status")->name('chart_of_account.status');
            Route::delete('/chart_of_account/destroy', "ChartofAccountController@destroy")->name('chart_of_account.destroy');

            //Sub Account Types
            Route::get('/chart_of_account/{chart_of_account}/sub_account_types', "SubAccountTypeController@index")->name('sub_account_type');
            Route::get('/chart_of_account/{chart_of_account}/sub_account_types/create', "SubAccountTypeController@create")->name('sub_account_type.create');
            Route::post('/chart_of_account/{chart_of_account}/sub_account_types/store', "SubAccountTypeController@store")->name('sub_account_type.store');
            Route::get('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/edit', "SubAccountTypeController@edit")->name('sub_account_type.edit');
            Route::put('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/update', "SubAccountTypeController@update")->name('sub_account_type.update');
            Route::patch('/chart_of_account/{chart_of_account}/sub_account_types/status', "SubAccountTypeController@status")->name('sub_account_type.status');
            Route::delete('/chart_of_account/{chart_of_account}/sub_account_types/destroy', "SubAccountTypeController@destroy")->name('sub_account_type.destroy');

            //List of Account
            Route::get('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/list_of_accounts/', "ListofAccountController@index")->name('list_of_account');
            Route::get('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/list_of_accounts/create', "ListofAccountController@create")->name('list_of_account.create');
            Route::post('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/list_of_accounts/store', "ListofAccountController@store")->name('list_of_account.store');
            Route::get('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/list_of_accounts/{list_of_account}/edit', "ListofAccountController@edit")->name('list_of_account.edit');
            Route::put('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/list_of_accounts/{list_of_account}/update', "ListofAccountController@update")->name('list_of_account.update');
            Route::patch('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/list_of_accounts/status', "ListofAccountController@status")->name('list_of_account.status');
            Route::delete('/chart_of_account/{chart_of_account}/sub_account_types/{sub_account_type}/list_of_accounts/destroy', "ListofAccountController@destroy")->name('list_of_account.destroy');


            //Customers
            Route::get('/customers', "CustomerController@index")->name('customers');
            Route::get('/customers/add', "CustomerController@create")->name('customers.create');
            Route::post('/customers/add', "CustomerController@store")->name('customers.store');
            Route::get('/customers/{customer}/edit', "CustomerController@edit")->name('customers.edit');
            Route::put('/customers/{customer}/edit', "CustomerController@update")->name('customers.update');
            Route::patch('/customers/status', "CustomerController@status")->name('customers.status');
            Route::delete('/customers/destroy', "CustomerController@destroy")->name('customers.destroy');

            //Vendor
            Route::get('/vendors', "VendorController@index")->name('vendors');
            Route::get('/vendors/add', "VendorController@create")->name('vendors.create');
            Route::post('/vendors/add', "VendorController@store")->name('vendors.store');
            Route::get('/vendors/{vendor}/edit', "VendorController@edit")->name('vendors.edit');
            Route::put('/vendors/{vendor}/edit', "VendorController@update")->name('vendors.update');
            Route::patch('/vendors/status', "VendorController@status")->name('vendors.status');
            Route::delete('/vendors/destroy', "VendorController@destroy")->name('vendors.destroy');

            //Managing Committee
            Route::get('/terms/{term}/managing_committee', "ManagingCommitteeController@index")->name('managing_committee');
            Route::get('/terms/{term}/managing_committee/add', "ManagingCommitteeController@create")->name('managing_committee.create');
            Route::post('/terms/{term}/managing_committee/store', "ManagingCommitteeController@store")->name('managing_committee.store');
            Route::get('/terms/{term}/managing_committee/{managing_committee}/edit', "ManagingCommitteeController@edit")->name('managing_committee.edit');
            Route::put('/terms/{term}/managing_committee/{managing_committee}/update', "ManagingCommitteeController@update")->name('managing_committee.update');
            Route::patch('/managing_committee/status', "ManagingCommitteeController@status")->name('managing_committee.status');
            Route::delete('/managing_committee/destroy', "ManagingCommitteeController@destroy")->name('managing_committee.destroy');

            //Managing Committee
            Route::get('/terms/{term}/executive_committee', "ExecutiveCommitteeController@index")->name('executive_committee');
            Route::get('/terms/{term}/executive_committee/add', "ExecutiveCommitteeController@create")->name('executive_committee.create');
            Route::post('/terms/{term}/executive_committee/store', "ExecutiveCommitteeController@store")->name('executive_committee.store');
            Route::get('/terms/{term}/executive_committee/{executive_committee}/edit', "ExecutiveCommitteeController@edit")->name('executive_committee.edit');
            Route::put('/terms/{term}/executive_committee/{executive_committee}/update', "ExecutiveCommitteeController@update")->name('executive_committee.update');
            Route::patch('/executive_committee/status', "ExecutiveCommitteeController@status")->name('executive_committee.status');
            Route::delete('/executive_committee/destroy', "ExecutiveCommitteeController@destroy")->name('executive_committee.destroy');



             //Sub Committee
             Route::get('/terms/{term}/sub_committee', "SubCommitteeController@index")->name('sub_committee');
             Route::get('/terms/{term}/sub_committee/add', "SubCommitteeController@create")->name('sub_committee.create');
             Route::post('/terms/{term}/sub_committee/store', "SubCommitteeController@store")->name('sub_committee.store');
             Route::get('/terms/{term}/sub_committee/{sub_committee}/edit', "SubCommitteeController@edit")->name('sub_committee.edit');
             Route::put('/terms/{term}/sub_committee/{sub_committee}/update', "SubCommitteeController@update")->name('sub_committee.update');
             Route::patch('/sub_committee/status', "SubCommitteeController@status")->name('sub_committee.status');
             Route::delete('/sub_committee/destroy', "SubCommitteeController@destroy")->name('sub_committee.destroy');


            // FAQ Categories
            Route::get('/categoryfaq', "FAQCategoryController@index")->name('faq.category');
            Route::get('/categoryfaq/add', "FAQCategoryController@create")->name('faq.category.create');
            Route::post('/categoryfaq/add', "FAQCategoryController@store")->name('faq.category.store');
            Route::get('/categoryfaq/{category}/edit', "FAQCategoryController@edit")->name('faq.category.edit');
            Route::put('/categoryfaq/{category}/edit', "FAQCategoryController@update")->name('faq.category.update');
            Route::patch('/categoryfaq/status', "FAQCategoryController@status")->name('faq.category.status');
            Route::delete('/categoryfaq/destroy', "FAQCategoryController@destroy")->name('faq.category.destroy');

            // Donor
            Route::get('/donor', "DonorController@index")->name('donor');
            Route::get('/donor/add', "DonorController@create")->name('donor.create');
            Route::post('/donor/add', "DonorController@store")->name('donor.store');
            Route::get('/donor/{donor}/edit', "DonorController@edit")->name('donor.edit');
            Route::put('/donor/{donor}/edit', "DonorController@update")->name('donor.update');
            Route::patch('/donor/status', "DonorController@status")->name('donor.status');
            Route::delete('/donor/destroy', "DonorController@destroy")->name('donor.destroy');


            // Slider Images
            Route::get('/slider_image', "SliderImagesController@index")->name('slider_image');
            Route::get('/slider_image/add', "SliderImagesController@create")->name('slider_image.create');
            Route::post('/slider_image/add', "SliderImagesController@store")->name('slider_image.store');
            Route::get('/slider_image/{slider_image}/edit', "SliderImagesController@edit")->name('slider_image.edit');
            Route::put('/slider_image/{slider_image}/edit', "SliderImagesController@update")->name('slider_image.update');
            Route::patch('/slider_image/status', "SliderImagesController@status")->name('slider_image.status');
            Route::delete('/slider_image/destroy', "SliderImagesController@destroy")->name('slider_image.destroy');

            //Videos
            Route::get('/media_videos', "MediaVideoController@index")->name('media_videos');
            Route::get('/media_videos/add', "MediaVideoController@create")->name('media_videos.create');
            Route::post('/media_videos/add', "MediaVideoController@store")->name('media_videos.store');
            Route::get('/media_videos/{media_videos}/edit', "MediaVideoController@edit")->name('media_videos.edit');
            Route::put('/media_videos/{media_videos}/edit', "MediaVideoController@update")->name('media_videos.update');
            Route::patch('/media_videos/status', "MediaVideoController@status")->name('media_videos.status');
            Route::delete('/media_videos/destroy', "MediaVideoController@destroy")->name('media_videos.destroy');

            // Gallery
            Route::get('/gallery', "GalleryController@index")->name('gallery');
            Route::get('/gallery/add', "GalleryController@create")->name('gallery.create');
            Route::post('/gallery/add', "GalleryController@store")->name('gallery.store');
            Route::get('/gallery/{gallery}/edit', "GalleryController@edit")->name('gallery.edit');
            Route::put('/gallery/{gallery}/edit', "GalleryController@update")->name('gallery.update');
            Route::patch('/gallery/status', "GalleryController@status")->name('gallery.status');
            Route::delete('/gallery/destroy', "GalleryController@destroy")->name('gallery.destroy');

            // Patron Well Wishers
            Route::get('/patron', "PatronController@index")->name('padeaf.patrons');
            Route::get('/patron/add', "PatronController@create")->name('patron.create');
            Route::post('/patron/add', "PatronController@store")->name('patron.store');
            Route::get('/patron/{patron}/edit', "PatronController@edit")->name('patron.edit');
            Route::put('/patron/{patron}/edit', "PatronController@update")->name('patron.update');
            Route::patch('/patron/status', "PatronController@status")->name('patron.status');
            Route::delete('/patron/destroy', "PatronController@destroy")->name('patron.destroy');

            // Event Category
            Route::get('/event_categories', "EventCategoryController@index")->name('event_categories');
            Route::get('/event_categories/add', "EventCategoryController@create")->name('event_categories.create');
            Route::post('/event_categories/add', "EventCategoryController@store")->name('event_categories.store');
            Route::get('/event_categories/{event_categories}/edit', "EventCategoryController@edit")->name('event_categories.edit');
            Route::put('/event_categories/{event_categories}/edit', "EventCategoryController@update")->name('event_categories.update');
            Route::patch('/event_categories/status', "EventCategoryController@status")->name('event_categories.status');
            Route::delete('/event_categories/destroy', "EventCategoryController@destroy")->name('event_categories.destroy');

            // Blog Category
            Route::get('/blogcategory', "BlogCategoryController@index")->name('blog.category');
            Route::get('/blogcategory/add', "BlogCategoryController@create")->name('blog.category.create');
            Route::post('/blogcategory/add', "BlogCategoryController@store")->name('blog.category.store');
            Route::get('/blogcategory/{category}/edit', "BlogCategoryController@edit")->name('blog.category.edit');
            Route::put('/blogcategory/{category}/edit', "BlogCategoryController@update")->name('blog.category.update');
            Route::patch('/blogcategory/status', "BlogCategoryController@status")->name('blog.category.status');
            Route::delete('/blogcategory/destroy', "BlogCategoryController@destroy")->name('blog.category.destroy');

            // post post
            Route::get('/blog/post', 'PostController@index')->name('blog.post');
            Route::get('/blog/post/create', 'PostController@create')->name('blog.post.create');
            Route::post('/blog/post/store', 'PostController@store')->name('blog.post.store');
            Route::get('/blog/post/{post}/edit', 'PostController@edit')->name('blog.post.edit');
            Route::put('/blog/post/{post}/update', 'PostController@update')->name('blog.post.update');
            Route::patch('/blog/post/status', 'PostController@status')->name('blog.post.status');
            Route::patch('/blog/post/featured', 'PostController@featured')->name('blog.post.featured');
            Route::delete('/blog/post/destroy', 'PostController@destroy')->name('blog.post.destroy');

            // clients
            Route::get('/clients', 'ClientsController@index')->name('clients');
            Route::get('/clients/create', 'ClientsController@create')->name('clients.create');
            Route::post('/clients/store', 'ClientsController@store')->name('clients.store');
            Route::get('/clients/{client}/edit', 'ClientsController@edit')->name('clients.edit');
            Route::put('/clients/{client}/update', 'ClientsController@update')->name('clients.update');
            Route::patch('/clients/status', 'ClientsController@status')->name('clients.status');
            Route::delete('/clients/destroy', 'ClientsController@destroy')->name('clients.destroy');

            // import clients
            Route::get('/import/clients', 'ImportClientsController@index')->name('import.clients');
            Route::get('/import/clients/create', 'ImportClientsController@create')->name('import.clients.create');
            Route::post('/import/clients/store', 'ImportClientsController@store')->name('import.clients.store');
            Route::get('/import/clients/{import}/edit', 'ImportClientsController@edit')->name('import.clients.edit');
            Route::put('/import/clients/{import}/update', 'ImportClientsController@update')->name('import.clients.update');
            Route::patch('/import/clients/{import}/upload', 'ImportClientsController@upload')->name('import.clients.upload');
            Route::patch('/import/clients/status', 'ImportClientsController@status')->name('import.clients.status');
            Route::delete('/import/clients/destroy', 'ImportClientsController@destroy')->name('import.clients.destroy');

            //Settings
            Route::get('settings', "SettingsController@index")->name('settings');
            Route::post('settings/update', "SettingsController@update")->name('settings.update');

            // Content Pages
            Route::get('pages', "ContentPageController@index")->name('content');
            Route::get('pages/rediredt/{menu}', "ContentPageController@redirect")->name('content.redirector');

            //SEO
            Route::get('seo', "SEOController@index")->name('seo');
            Route::get('seo/{menu}/edit', "SEOController@edit")->name('seo.edit');
            Route::put('seo/{menu}/edit', "SEOController@update")->name('seo.update');

            //CMS - home

            //home
            Route::get('/pages/home', 'HomeController@index')->name('padeaf.home');

            // Our Services Updated
            Route::post('/pages/home/our_services', 'HomeController@ourServiceUpdate')->name('padeaf.home.service_update');

              //Our Service Section
              Route::get('/pages/home/our_services/add', "OurServiceSectionController@create")->name('our_service.create');
              Route::post('/pages/home/our_services/add', "OurServiceSectionController@store")->name('our_service.store');
              Route::get('/pages/home/our_services/{cms}/edit', "OurServiceSectionController@edit")->name('our_service.edit');
              Route::put('/pages/home/our_services/{cms}/edit', "OurServiceSectionController@update")->name('our_service.update');
              Route::patch('/pages/home/our_services/status', "OurServiceSectionController@status")->name('our_service.status');
              Route::delete('/pages/home/our_services/destroy', "OurServiceSectionController@destroy")->name('our_service.destroy');

            // Pak Association Updated
            Route::post('/pages/home/pak_association', 'HomeController@pakAssociationUpdate')->name('padeaf.home.pak_association_update');

              // Pak Association Section Updated
              Route::post('/pages/home/pak_association/section', 'HomeController@pakAssociationSectionUpdate')->name('padeaf.home.pak_association_section.update');

            // Pad Education Updated
            Route::post('/pages/home/pad_education', 'HomeController@padEducationUpdate')->name('padeaf.home.pad_education_update');

              // Add Pad Education Section
              Route::get('/pages/home/pad_education/add', "PadEducationSectionController@create")->name('pad_education.create');
              Route::post('/pages/home/pad_education/add', "PadEducationSectionController@store")->name('pad_education.store');
              Route::get('/pages/home/pad_education/{cms}/edit', "PadEducationSectionController@edit")->name('pad_education.edit');
              Route::put('/pages/home/pad_education/{cms}/edit', "PadEducationSectionController@update")->name('pad_education.update');
              Route::patch('/pages/home/pad_education/status', "PadEducationSectionController@status")->name('pad_education.status');
              Route::delete('/pages/home/pad_education/destroy', "PadEducationSectionController@destroy")->name('pad_education.destroy');

            Route::get('/donate_now_categories',function(){

            })->name('donate_now_categories');
            Route::get('/news',function(){

            })->name('news');
            Route::get('/patrons',function(){

            })->name('patrons');
            Route::get('/donate_now',function(){

            })->name('donate_now');



            //About Us

            // Introduction
            Route::get('/pages/introduction', 'IntroductionController@index')->name('padeaf.introduction');

            //Vision Header
            Route::post('/pages/introduction/vision_header/update', 'IntroductionController@visionHeaderUpdate')->name('padeaf.introduction.vision_header.update');

            //Mission Header
            Route::post('/pages/introduction/mission_header/update', 'IntroductionController@missionHeaderUpdate')->name('padeaf.introduction.mission_header.update');

             // Vision
             Route::get('/pages/vision', 'VisionController@index')->name('padeaf.vision');

             //Intro Vision Header
             Route::post('/pages/vision/intro_vision_header/update', 'VisionController@introVisionHeaderUpdate')->name('padeaf.intro.vision.vision_header.update');

             // Mission
             Route::get('/pages/mission', 'MissionController@index')->name('padeaf.mission');

             //Intro mission Header
             Route::post('/pages/mission/intro_mission_header/update', 'MissionController@introMissionHeaderUpdate')->name('padeaf.mission_header.update');

              // Values
              Route::get('/pages/values', 'ValueController@index')->name('padeaf.values');

              //Intro Value Header
              Route::post('/pages/value/update', 'ValueController@valueUpdate')->name('padeaf.value.update');

               // Chief Patrons Message
               Route::get('/pages/chief_patrons_message', 'ChiefPatronsMessageController@index')->name('padeaf.chief_patrons_message');

               //Intro Chief Patrons Message Header
               Route::post('/pages/chief_patrons_message/update', 'ChiefPatronsMessageController@cheifPatronsMessageUpdate')->name('padeaf.chief_patrons_message.update');

                // National Network
                Route::get('/pages/national_network', 'NationalNetworkController@index')->name('padeaf.international_network');

                //Intro National Network Header
                Route::post('/pages/national_network/update', 'NationalNetworkController@nationalNetworkUpdate')->name('padeaf.national_network.update');

                // News & Events

                 // News
                //  Route::get('/pages/news', 'NewsController@index')->name('padeaf.news');

                //  //Intro News Header
                //  Route::post('/pages/news/update', 'NewsController@newsUpdate')->name('padeaf.news.update');

                 // Inauguration
                 Route::get('/pages/inauguration', 'InaugurationController@index')->name('padeaf.inauguration');

                 //Intro Inauguration Header
                 Route::post('/pages/inauguration/update', 'InaugurationController@inaugurationUpdate')->name('padeaf.inauguration.update');

                //Inauguration Images
                Route::get('/pages/inauguration/image_section/add', "InaugurationImageSectionController@create")->name('image_section.create');
                Route::post('/pages/inauguration/image_section/add', "InaugurationImageSectionController@store")->name('image_section.store');
                Route::get('/pages/inauguration/image_section/{cms}/edit', "InaugurationImageSectionController@edit")->name('image_section.edit');
                Route::put('/pages/inauguration/image_section/{cms}/edit', "InaugurationImageSectionController@update")->name('image_section.update');
                Route::patch('/pages/inauguration/image_section/status', "InaugurationImageSectionController@status")->name('image_section.status');
                Route::delete('/pages/inauguration/image_section/destroy', "InaugurationImageSectionController@destroy")->name('image_section.destroy');

                // Finding Survey
                Route::get('/pages/findingsurvey', 'FindingSurveyController@index')->name('padeaf.finding_survey_report');

                //Intro Finding Survey Header
                Route::post('/pages/findingsurvey/update', 'FindingSurveyController@findingSurveyUpdate')->name('padeaf.finding_survey_report.update');

               //Finding Survey Images
               Route::get('/pages/findingsurvey/image_section/add', "FindingImageSectionController@create")->name('findingsurvey_image_section.create');
               Route::post('/pages/findingsurvey/image_section/add', "FindingImageSectionController@store")->name('findingsurvey_image_section.store');
               Route::get('/pages/findingsurvey/image_section/{cms}/edit', "FindingImageSectionController@edit")->name('findingsurvey_image_section.edit');
               Route::put('/pages/findingsurvey/image_section/{cms}/edit', "FindingImageSectionController@update")->name('findingsurvey_image_section.update');
               Route::patch('/pages/findingsurvey/image_section/status', "FindingImageSectionController@status")->name('findingsurvey_image_section.status');
               Route::delete('/pages/findingsurvey/image_section/destroy', "FindingImageSectionController@destroy")->name('findingsurvey_image_section.destroy');

                // Deaf Empowerment Education Center
            Route::get('/pages/deaf_empowerment_education_center', 'DeecController@index')->name('padeaf.deaf_empowerment_education_center');

                //Intro Deaf Empowerment Education Center Header
            Route::post('/pages/deaf_empowerment_education_center/update', 'DeecController@deecUpdate')->name('padeaf.deaf_empowerment_education_center.update');

            // English Class
            Route::get('/pages/english_class', 'EnglishClassController@index')->name('padeaf.english_class');

                //Intro English Class Header
            Route::post('/pages/english_class/update', 'EnglishClassController@englishClassUpdate')->name('padeaf.english_class.update');

               //English Class Images
            Route::get('/pages/english_class/image_section/add', "EnglishClassSectionController@create")->name('english_class_image_section.create');
            Route::post('/pages/english_class/image_section/add', "EnglishClassSectionController@store")->name('english_class_image_section.store');
            Route::get('/pages/english_class/image_section/{cms}/edit', "EnglishClassSectionController@edit")->name('english_class_image_section.edit');
            Route::put('/pages/english_class/image_section/{cms}/edit', "EnglishClassSectionController@update")->name('english_class_image_section.update');
            Route::patch('/pages/english_class/image_section/status', "EnglishClassSectionController@status")->name('english_class_image_section.status');
            Route::delete('/pages/english_class/image_section/destroy', "EnglishClassSectionController@destroy")->name('english_class_image_section.destroy');

               // Computer Class
            Route::get('/pages/computer_class', 'ComputerClassController@index')->name('padeaf.computer_class');

               //Intro Computer Class Header
            Route::post('/pages/computer_class/update', 'ComputerClassController@computerClassUpdate')->name('padeaf.computer_class.update');

              //Computer Class Images
            Route::get('/pages/computer_class/image_section/add', "ComputerClassSectionController@create")->name('computer_class_image_section.create');
            Route::post('/pages/computer_class/image_section/add', "ComputerClassSectionController@store")->name('computer_class_image_section.store');
            Route::get('/pages/computer_class/image_section/{cms}/edit', "ComputerClassSectionController@edit")->name('computer_class_image_section.edit');
            Route::put('/pages/computer_class/image_section/{cms}/edit', "ComputerClassSectionController@update")->name('computer_class_image_section.update');
            Route::patch('/pages/computer_class/image_section/status', "ComputerClassSectionController@status")->name('computer_class_image_section.status');
            Route::delete('/pages/computer_class/image_section/destroy', "ComputerClassSectionController@destroy")->name('computer_class_image_section.destroy');

              // Cooking Class
            Route::get('/pages/cooking_class', 'CookingClassController@index')->name('padeaf.cooking_class');

              //Intro Cooking Class Header
            Route::post('/pages/cooking_class/update', 'CookingClassController@cookingClassUpdate')->name('padeaf.cooking_class.update');

              // Pakistan Sign Language Class
            Route::get('/pages/pakistan_sign_language_class', 'PSLClassController@index')->name('padeaf.language_class');

              //Intro Pakistan Sign Language Class Header
            Route::post('/pages/pakistan_sign_language_class/update', 'PSLClassController@pslClassUpdate')->name('padeaf.language_class.update');

              // Basic Literacy Class
            Route::get('/pages/basic_literacy_class', 'BasicLiteracyClassController@index')->name('padeaf.literacy_class');

              //Intro Basic Literacy Class Header
            Route::post('/pages/basic_literacy_class/update', 'BasicLiteracyClassController@BLClassUpdate')->name('padeaf.literacy_class.update');

               // Basic Literacy Class
            Route::get('/pages/sign_laguage_interpreter_class', 'SignLanguageInterpreterClassController@index')->name('padeaf.interpreter_class');

              //Intro Basic Literacy Class Header
            Route::post('/pages/sign_laguage_interpreter_class/update', 'SignLanguageInterpreterClassController@BLClassUpdate')->name('padeaf.interpreter_class.update');

               // Leadership & Education Training
            Route::get('/pages/leadership_education_training', 'LeadershipEducationTrainingController@index')->name('padeaf.education_training');

               //Intro Leadership & Education Training Header
            Route::post('/pages/leadership_education_training/update', 'LeadershipEducationTrainingController@LETUpdate')->name('padeaf.education_training.update');

               // Projects
            Route::get('/pages/projects', 'ProjectController@index')->name('padeaf.projects');

               //Project Value Updated
            Route::post('/pages/project/update', 'ProjectController@projectUpdate')->name('padeaf.project.update');

              // Brilliant Student Center
              Route::get('/pages/brilliant_students', 'BrilliantStudentController@index')->name('padeaf.brilliant_students');

              //Intro Brilliant Student Center Header
              Route::post('/pages/brilliant_students/update', 'BrilliantStudentController@BSSectionUpdate')->name('padeaf.brilliant_students.update');

              //Intro Brilliant Student Center Section
              Route::post('/pages/brilliant_students/section/update', 'BrilliantStudentController@BSUpdate')->name('padeaf.brilliant_students.section.update');

        });
    });


    // oooooo     oooo                             .o8
    // `888.     .8'                             "888
    //  `888.   .8'    .ooooo.  ooo. .oo.    .oooo888   .ooooo.  oooo d8b
    //   `888. .8'    d88' `88b `888P"Y88b  d88' `888  d88' `88b `888""8P
    //    `888.8'     888ooo888  888   888  888   888  888   888  888
    //     `888'      888    .o  888   888  888   888  888   888  888
    //      `8'       `Y8bod8P' o888o o888o `Y8bod88P" `Y8bod8P' d888b

    // below here lies the vendor routes

    Route::group(['middleware' => ['vendor']], function () {
        Route::namespace(vendor)->group(function () {
            //dashboard
            Route::get('vendor/dashboard', 'DashboardController@index')->name('vendor.dashboard');

            //logout
            Route::post('vendor/logout', auth.'LoginController@logout')->name('vendor.logout');

            //users
            Route::get('vendor/users', 'UsersController@index')->name('vendor.users');
            Route::get('vendor/users/datatable', 'UsersController@datatable')->name('vendor.users.datatable');
            Route::get('vendor/users/create', 'UsersController@create')->name('vendor.users.create');
            Route::post('vendor/users/store', 'UsersController@store')->name('vendor.users.store');
            Route::get('vendor/users/{user}/edit', 'UsersController@edit')->name('vendor.users.edit');
            Route::put('vendor/users/{user}/update', 'UsersController@update')->name('vendor.users.update');
            Route::patch('vendor/users/status', 'UsersController@status')->name('vendor.users.status');
            Route::delete('vendor/users/destroy', 'UsersController@destroy')->name('vendor.users.destroy');

            //backup
            Route::get('vendor/backup', 'BackupController@index')->name('vendor.backup');
            Route::post('vendor/backup', 'BackupController@backup')->name('vendor.backup');
            Route::get('vendor/backup/download/{item}', 'BackupController@download')->name('vendor.backup.download');
            Route::delete('vendor/backup/delete', 'BackupController@destroy')->name('vendor.backup.destroy');

            //configuration
            Route::get('vendor/configuration', 'ConfigurationController@index')->name('vendor.configuration');
            Route::post('vendor/configuration', 'ConfigurationController@update')->name('vendor.configuration');
            Route::post('vendor/configuration/status', 'ConfigurationController@status')->name('vendor.configuration.status');

            //MVC
            //MVC - model
            Route::get('vendor/mvc/model', 'ModelController@index')->name('vendor.mvc.model');
            Route::get('vendor/mvc/model/create', 'ModelController@create')->name('vendor.mvc.model.create');
            Route::post('vendor/mvc/model/store', 'ModelController@store')->name('vendor.mvc.model.store');
            Route::delete('vendor/mvc/model/destroy', 'ModelController@destroy')->name('vendor.mvc.model.destroy');
            //MVC - Controller
            Route::get('vendor/mvc/controller', 'ControllerController@index')->name('vendor.mvc.controller');
            Route::get('vendor/mvc/controller/create', 'ControllerController@create')->name('vendor.mvc.controller.create');
            Route::post('vendor/mvc/controller/store', 'ControllerController@store')->name('vendor.mvc.controller.store');
            Route::delete('vendor/mvc/controller/destroy', 'ControllerController@destroy')->name('vendor.mvc.controller.destroy');
            //MVC - View
            Route::get('vendor/mvc/view', 'ViewController@index')->name('vendor.mvc.view');
            Route::get('vendor/mvc/view/create', 'ViewController@create')->name('vendor.mvc.view.create');
            Route::post('vendor/mvc/view/store', 'ViewController@store')->name('vendor.mvc.view.store');
            Route::delete('vendor/mvc/view/destroy', 'ViewController@destroy')->name('vendor.mvc.view.destroy');
            //MVC - Directory
            Route::get('vendor/mvc/{mvc}/directory', 'DirectoryController@index')->name('vendor.mvc.directory');
            Route::get('vendor/mvc/{mvc}/directory/create', 'DirectoryController@create')->name('vendor.mvc.directory.create');
            Route::post('vendor/mvc/{mvc}/directory/store', 'DirectoryController@store')->name('vendor.mvc.directory.store');
            Route::delete('vendor/mvc/{mvc}/directory', 'DirectoryController@destroy')->name('vendor.mvc.directory.destroy');

            //Web routing
            Route::get('vendor/routing', 'RouterController@edit')->name('vendor.route');
            Route::post('vendor/routing', 'RouterController@update')->name('vendor.route');

            // Permissions
            Route::get('vendor/permission', 'PermissionController@index')->name('vendor.permission');
            Route::get('vendor/permission/datatable', 'PermissionController@indexDatatable')->name('vendor.permission.datatable');
            Route::get('vendor/permission/create', 'PermissionController@create')->name('vendor.permission.create');
            Route::post('vendor/permission/store', 'PermissionController@store')->name('vendor.permission.store');
            Route::get('vendor/permission/{permission}/edit', 'PermissionController@edit')->name('vendor.permission.edit');
            Route::put('vendor/permission/{permission}/update', 'PermissionController@update')->name('vendor.permission.update');
            Route::delete('vendor/permission/destroy', 'PermissionController@destroy')->name('vendor.permission.destroy');

            // Menu
            Route::get('vendor/menu', 'MenuController@index')->name('vendor.menu');
            Route::get('vendor/menu/create', 'MenuController@create')->name('vendor.menu.create');
            Route::post('vendor/menu/store', 'MenuController@store')->name('vendor.menu.store');
            Route::get('vendor/menu/{menu}/edit', 'MenuController@edit')->name('vendor.menu.edit');
            Route::put('vendor/menu/{menu}/update', 'MenuController@update')->name('vendor.menu.update');
            Route::patch('vendor/menu/status', 'MenuController@status')->name('vendor.menu.status');
            Route::delete('vendor/menu/destroy', 'MenuController@destroy')->name('vendor.menu.destroy');

            // Seo website Menu
            Route::get('vendor/menu/website/create', 'WebsiteMenuController@create')->name('vendor.menu.website.create');
            Route::post('vendor/menu/website/store', 'WebsiteMenuController@store')->name('vendor.menu.website.store');
            Route::get('vendor/menu/website/{menu}/edit', 'WebsiteMenuController@edit')->name('vendor.menu.website.edit');
            Route::put('vendor/menu/website/{menu}/update', 'WebsiteMenuController@update')->name('vendor.menu.website.update');
            Route::patch('vendor/websitemenu/status', 'WebsiteMenuController@status')->name('vendor.menu.website.status');
            Route::delete('vendor/menu/website/destroy', 'WebsiteMenuController@destroy')->name('vendor.menu.website.destroy');
        });

    });

});

// ooooo                              o8o
// `888'                              `"'
//  888          .ooooo.   .oooooooo oooo  ooo. .oo.
//  888         d88' `88b 888' `88b  `888  `888P"Y88b
//  888         888   888 888   888   888   888   888
//  888       o 888   888 `88bod8P'   888   888   888
// o888ooooood8 `Y8bod8P' `8oooooo.  o888o o888o o888o
//                        d"     YD
//                        "Y88888P'

//here lies cms login routes
Route::namespace(auth)->group(function () {
    // session work
    // special routes for fogetting session history
    Route::post('login/forget', 'SessionController@destroyAndLogin')->name('login.forget');

    Route::group(['middleware' => ['guest']], function () {

        // login route for cms start

        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@checkTwoFactor')->name('login');

        Route::group(['middleware' => ['userStatus']], function () {
            // Two factor Authentication
            Route::get('verify', 'LoginController@verify')->name('verify');
            Route::post('verify', 'LoginController@validateTwoFactor')->name('verify');
        });

        // Password Reset Routes...
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset');

        // login route for cms end
    });
});


    //here lies vendor login routes

Route::namespace(vendor.auth)->group(function () {
    Route::group(['middleware' => ['vendorguest']], function () {
        // login route for vendor start

        // Authentication Routes...
        Route::get('vendor/login', 'LoginController@showLoginForm')->name('vendor.login');
        Route::post('vendor/login', 'LoginController@checkTwoFactor')->name('vendor.login');

        Route::group(['middleware' => ['userStatus']], function () {
            // Two factor Authentication
            Route::get('vendor/verify', 'LoginController@verify')->name('vendor.verify');
            Route::post('vendor/verify', 'LoginController@validateTwoFactor')->name('vendor.verify');
        });

        // login route for vendor end
    });
});


Route::get('exzed/cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
   return 'cache clear';
});
