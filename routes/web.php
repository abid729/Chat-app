<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Friends
Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
Route::get('/friends/{id}', [FriendController::class, 'show'])->name('friends.show');
Route::post('/friends/{id}/message', [FriendController::class, 'sendMessage'])->name('friends.sendMessage');

// Groups
Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');
Route::post('/groups/{id}/message', [GroupController::class, 'sendMessage'])->name('groups.sendMessage');
Route::get('/groups/{id}/members', [GroupController::class, 'members'])->name('groups.members');
Route::post('/groups/{id}/members', [GroupController::class, 'addMember'])->name('groups.addMember');

// Chats
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
// Route::get('/chat/create', [App\Http\Controllers\ChatController::class, 'create'])->name('chat.create');
Route::post('/chat/store', [App\Http\Controllers\ChatController::class, 'store'])->name('chat.store');
Route::post('/check-internet-connection', [App\Http\Controllers\ChatController::class, 'checkInternetConnection'])->name('check.internet.connection');
Route::put('/messages/{id}/read', [App\Http\Controllers\ChatController::class, 'markAsRead'])->name('markAsRead');


