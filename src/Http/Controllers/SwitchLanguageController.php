<?php

namespace Ydm\I18N\Http\Controllers;

use Request;

class SwitchLanguageController
{
    public function index(Request $request, string $locale)
    {
        if (!in_array($locale, config('i18n.locales'))) {
            abort(404, "Locale `{$locale}` is not found.");
        }

        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
