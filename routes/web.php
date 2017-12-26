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

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Preview route
|--------------------------------------------------------------------------
|
| Route for prismic.io preview functionality
|
*/

Route::get('/preview', function (Request $request) {
    $token = $request->input('token');
    $url = $request->input('api')->previewSession($token, $request->input('linkResolver'), '/');

    setcookie(Prismic\PREVIEW_COOKIE, $token, time() + 1800, '/', null, false, false);
    return response(null, 302)->header('Location', $url);
});

/*
|--------------------------------------------------------------------------
| Homepage route
|--------------------------------------------------------------------------
*/

Route::get('/', function (Request $request) {
    return redirect('/' . $request->input('currentLang'));
});

Route::get('/{lang}', function ($lang, Request $request) {
    // Set the current language
    $request->merge(['currentLang' => $lang]);

    // Query the document by single type
    $document = $request->input('api')->getSingle('homepage', ['lang' => $lang]);

    // Render the page
    return view('homepage', ['document' => $document]);
});

/*
|--------------------------------------------------------------------------
| Page route
|--------------------------------------------------------------------------
*/

Route::get('/{lang}/page/{uid}', function ($lang, $uid, Request $request) {
    // Set the current language
    $request->merge(['currentLang' => $lang]);

    // Query the document by UID
    $document = $request->input('api')->getByUID('page', $uid, ['lang' => $lang]);

    // Render the page
    return view('page', ['document' => $document]);
});
