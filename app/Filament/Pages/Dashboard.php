<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getView(): string
    {
        return 'filament.pages.dashboard';
    }

    public function getViewData(): array
    {
        return [
            'greeting' => $this->getGreeting(),
        ];
    }

    private function getGreeting(): string
    {
        $hour = now()->hour;
        if ($hour < 12) return 'Good Morning';
        if ($hour < 17) return 'Good Afternoon';
        return 'Good Evening';
    }
}