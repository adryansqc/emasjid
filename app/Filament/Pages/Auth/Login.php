<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.auth.login';

    public function getHeading(): string|Htmlable
    {
        $masjidName = \App\Models\Masjid::first()?->nama ?? 'Admin';

        return new \Illuminate\Support\HtmlString(
            '<a href="/" class="hover:opacity-75 transition-opacity cursor-pointer underline decoration-dotted">'
                . e($masjidName) .
                '</a>'
        );
    }
}
