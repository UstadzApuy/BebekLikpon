<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerRenderHook('body.end', function () {
                return <<<'HTML'
                <style>
                    body {
                        background-image: url('{{ asset('frontend/images/bg_1.jpg') }}');
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;
                    }
                </style>
                HTML;
            });
        });
    }
}
