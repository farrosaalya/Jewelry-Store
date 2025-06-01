<?php

namespace App\Providers\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => 'admin@gmail.com',
        ]);
    }

    public function getView(): string
    {
        return 'filament.pages.auth.login';
    }
} 