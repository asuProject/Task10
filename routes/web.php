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



/**********************/
/**
 * Conference Type routes
 */
Route::resource('conferenceType', 'ConferenceTypesController');
/**********************/
/**********************/
/**
 * Conference routes
 */
Route::resource('conference', 'ConferenceController', ['names' => 'conference']);
/**********************/
/**********************/
/**
 * Country & Towns routes
 */
Route::resource('country/country', 'Country\CountryController', ['names' => 'country.country']);
Route::post('/town/ajax_get','Country\CityController@ajax_get_cities')->name('town.ajax.get');
Route::resource('country/city', 'Country\CityController', ['names' => 'country.city']);
/**********************/
/**********************/
/**
 * Sponsor routes
 */
Route::resource('sponsor', 'SponsorController', ['names' => 'sponsor']);
/**********************/
/**********************/
/**
 * Organizer routes
 */
Route::resource('organizers', 'OrganizersController');
/**********************/
/**********************/
/**
 * Conference Roles routes
 */
Route::resource('conferenceRole', 'ConferenceRolesController');
/**********************/
/**********************/
/**
 * Attendance Types routes
 */
Route::resource('attendanceType', 'AttendanceTypesController');
/**********************/
/**********************/
/**
 * Departments routes
 */
Route::resource('departments', 'DepartmentsController');
/**********************/
/**********************/
/**
 * Research plans routes
 */
Route::resource('researchPlans', 'ResearchPlansController');
/**********************/
/**********************/
/**
 * foreigner Attendee routes
 */
Route::resource('foreignerAttendee', 'ForeignerAttendeeController');
Route::post('get_cities', 'ForeignerAttendeeController@get_cities');
/**********************/
/**********************/
/**
 * foreign Attendance routes
 */
Route::resource('attendance/foreign/attendance', 'ForeignAttendanceController', ['names' => 'attendance.foreign.attendance', 'except' => ['show', 'edit']]);
Route::get('attendance/foreign/attendance/{attendee}/{conference}', 'ForeignAttendanceController@show')->name('attendance.foreign.attendance.show');
Route::get('attendance/foreign/attendance/{attendee}/{conference}/edit', 'ForeignAttendanceController@edit')->name('attendance.foreign.attendance.edit');
/**********************/
