<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\GroupController;
// Define the root route to point to the ContactController index method
Route::get('/', [ContactController::class, 'index']);

// Resource route for contacts, automatically generates all CRUD routes
Route::resource('contacts', ContactController::class);



Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/groups/{id}/edit', [GroupController::class, 'edit'])->name('groups.edit');
Route::put('/groups/{id}', [GroupController::class, 'update'])->name('groups.update');
Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::get('/groups/{group}/add-members', [GroupController::class, 'addMembersForm'])->name('groups.addMembersForm');
Route::post('/groups/{group}/add-members', [GroupController::class, 'addMembers'])->name('groups.addMembers');




