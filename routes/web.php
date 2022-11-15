<?php

Route::get('/', function () {
    return view('welcome');
});


#users
Auth::routes();
//route user logout
Route::get('/logout', 'Auth\LoginController@logout');
//route user home
Route::get('/home', 'HomeController@index')->name('home');
//route admin change password user
Route::post('/adminpanel/users/changepassword', 'UsersController@updatePassword');
//route users  edit his Sitting
Route::post('/users/editSitting', 'UsersController@userEdit')->middleware('auth');
Route::get('/users/editSitting', 'UsersController@userEdit')->middleware('auth');
Route::patch('/users/editSitting', 'UsersController@userUpdatProfil')->middleware('auth');
//route user change his password
Route::post('/users/changepassword', 'UsersController@changepassword')->middleware('auth');

Route::get('/SingleBuilding/delete/{id}', 'BuController@delete')->middleware('auth');

/*
 * admin route
 * */

Route::group(['middleware'=>[ 'web','admin']],function (){
    Route::resource('adminpanel/bu', 'AdminBuildingController');
    Route::get('/adminpanel', 'AdminController@index');
    Route::resource('/adminpanel/users', 'UsersController');
    Route::post('/adminpanel/users/{user_id}/changepassword', 'UsersController@updatePassword');
    Route::get('/adminpanel/users/{id}/delete','UsersController@destroy');

    /*
     * sitsetting
     *
    */

    Route::get('/adminpanel/sitsetting','SitSettingController@index');
    Route::post('/adminpanel/sitsetting','SitSettingController@store');

    /*
        * contact route Admin
        *
     * */
    Route::resource('adminpanel/contact', 'contactcontroller');
    Route::get('adminpanel/contact/{id}/delete', 'contactcontroller@destroy')->middleware('admin');

});
/*
 *end  admin route
 * */
//=================================================================================================================
/*
 *start building function  /for rant /for type /for buy /search
 * */
// route function Search Controller
Route::get('forrent/{type}','SearchController@forrent');
Route::get('forbay/{type}','SearchController@forbay');
Route::get('type/{type}','SearchController@fortype');
Route::get('/search','SearchController@search');
Route::get('/ajax/bu/information','AdminBuildingController@getAjaxinformation');
// route function Search Controller
//=================================================================================================================
// * start contact route User
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'contactcontroller@store');
// *  end contact route User

//=================================================================================================================
// start any user add building /user/building Show
Route::get('/user/creat/building', 'UserBuildingController@userAddView')->middleware('auth');
Route::post('/user/creat/building', 'UserBuildingController@userstore')->middleware('auth');
//end any user add building /user/building Show
// start User Building Controller
Route::get('/user/buildingShow', 'UserBuildingController@buildingShow')->middleware('auth');
Route::get('/user/buildingShowStatuse', 'UserBuildingController@buildingShowStatuse')->middleware('auth');
Route::get('/user/buildingShowall', 'UserBuildingController@buildingShowall')->middleware('auth');
//route user edit his building
Route::get('/users/edit/building/{id}', 'UserBuildingController@userEditBuilding')->middleware('auth');
Route::post('/users/edit/building/{id}', 'UserBuildingController@userEditBuilding')->middleware('auth');
Route::post('/users/update/building/{id}', 'UserBuildingController@Userupdate')->middleware('auth');
Route::get('/users/update/building/{id}', 'UserBuildingController@Userupdate')->middleware('auth');
//route admin delete user building from user view
// end User Building Controller

// start Single Building Controller
Route::get('SingleBullding/{id}','SingleBuildingController@showSingleBullding');
Route::get('showSingleBulldingguest/{id}','ShowSingleBulldingGuestController@showSingleBulldingguest');
// end Single Building Controller

//start Show All Enable Controller
Route::get('showallbulding','ShowAllEnableController@showallenable')->middleware('web');
//end Show All Enable Controller



