<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WelcomeCards extends Widget
{
    protected static ?int $sort = 1;
    // protected int | string | array $columnSpan = 'full';
    protected static string $view = 'filament.widgets.welcome-cards';
}
