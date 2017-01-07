<?php

// Menular Dashboard with Gentelella theme
Route::get('menular/gentelella', 'Greatworks\Menular\MenularGentelellaController@index');
// Menular Dashboard with AdminLTE theme
Route::get('menular/adminlte', 'Greatworks\Menular\MenularAdminLTEController@index');