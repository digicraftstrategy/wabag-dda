<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class NewsDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'News Updates';
    protected static ?string $title = 'News Updates';
    protected ?string $heading = '';
    protected static string $view = 'filament.pages.news-dashboard';
    protected static ?string $slug = 'news-dashboard';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getHeading(): string
    {
        return '';
    }
}
