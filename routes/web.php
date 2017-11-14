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
| Handle i18n
|--------------------------------------------------------------------------
*/

function i18nConfig(Request $request, $lang) {
    $request->merge(['currentLang' => $lang]);
    return ['lang' => $lang];
}

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
    // Query the document by single type
    $document = $request->input('api')->getSingle('homepage', i18nConfig($request, $lang));

    // Render the page
    return view('homepage', ['document' => $document]);
});

/*
|--------------------------------------------------------------------------
| Page route
|--------------------------------------------------------------------------
*/

Route::get('/{lang}/page/{uid}', function ($lang, $uid, Request $request) {
    // Query the document by UID
    $document = $request->input('api')->getByUID('page', $uid, i18nConfig($request, $lang));

    // Render the page
    return view('page', ['document' => $document]);
});
