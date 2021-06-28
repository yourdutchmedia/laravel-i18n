<?php

use Ydm\I18N\Http\Controllers\SwitchLanguageController;

Route::get('language/{locale}/change', [SwitchLanguageController::class, 'index'])->name('i18n.index');
