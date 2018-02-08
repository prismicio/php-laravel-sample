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
| Helpers
|--------------------------------------------------------------------------
*/

function langExists($lang) {
    foreach (config('i18n.languages') as $language) {
        if ($language['key'] === $lang) {
            return true;
        }
    }
    return false;
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
    if (!isset($token)) {
        return abort(400, 'Bad Request');
    }
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
    // Render 404 page if lang doesn't exist
    if (langExists($lang) === false) {
        return abort(404);
    }

    // Set the current lang
    $request->merge(['currentLang' => $lang]);

    // Query the homepage document by single type
    $document = $request->input('api')->getSingle('homepage', ['lang' => $lang]);

    // Render 404 page if homepage document doesn't exist
    if (isset($document) === false) {
        return abort(404);
    }

    // Fill meta array
    $meta = [
        'title' => isset($document->data->meta_title) ? $document->data->meta_title : null,
        'description' => isset($document->data->meta_description) ? $document->data->meta_description : null,
    ];

    // Render the page
    return view('homepage', ['document' => $document, 'meta' => $meta]);
});

/*
|--------------------------------------------------------------------------
| Page route
|--------------------------------------------------------------------------
*/

Route::get('/{lang}/page/{uid}', function ($lang, $uid, Request $request) {
    // Render 404 page if lang doesn't exist
    if (langExists($lang) === false) {
        return abort(404);
    }

    // Set the current lang
    $request->merge(['currentLang' => $lang]);

    // Query the page document by UID
    $document = $request->input('api')->getByUID('page', $uid, ['lang' => $lang]);

    // Render 404 page if page document doesn't exist
    if (isset($document) === false) {
        return abort(404);
    }

    // Fill meta array
    $meta = [
        'title' => isset($document->data->meta_title) ? $document->data->meta_title : null,
        'description' => isset($document->data->meta_description) ? $document->data->meta_description : null,
    ];

    // Render the page
    return view('page', ['document' => $document, 'meta' => $meta]);
});
