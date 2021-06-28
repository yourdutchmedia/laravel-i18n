<?php

namespace Ydm\I18N\Support;

use Illuminate\Support\Collection;

class I18N
{
    public static function availableLanguages(): Collection
    {
        $locales = config('i18n.locales', []);
        return collect(config('i18n.languages'))
            ->filter(function ($values, $key) use ($locales) {
                return in_array($key, $locales);
            });
    }
}
