<?php

use Illuminate\Support\Facades\Route;

use \Everzel\NovaEditorJs\Http\Controllers\EditorJsImageUploadController;
use \Everzel\NovaEditorJs\Http\Controllers\EditorJsLinkController;

Route::post('upload/file', EditorJsImageUploadController::class . '@file')->name('editor-js-upload-image-by-file');
Route::post('upload/url', EditorJsImageUploadController::class . '@url')->name('editor-js-upload-image-by-url');
Route::get('fetch/url', EditorJsLinkController::class . '@fetch')->name('editor-js-fetch-url');
