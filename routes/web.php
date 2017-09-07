<?php

//Routes below are for students table

Route::get('/', 'StudentsController@home');

Route::get('/stdrecord/demo', function() {
    return view('studentpages.demo');
});

Route::get('/stdrecord/list','StudentsController@displayStdRecord');

Route::get('/stdrecord/add', function() {
       $record = [];
       Session::flash('message','Enter student details');
       return view('studentpages.add', compact('record'));
     });
Route::post('/stdrecord/add','StudentsController@addStdRecord');

Route::get('/stdrecord/edit/{id}','StudentsController@updateStdRecord');
Route::post('/stdrecord/edit/{id}','StudentsController@editStdRecord');

Route::get('/delete/{id}','StudentsController@deleteStdRecord');
Route::get('/promote/{id}','StudentsController@promoteStudent');
