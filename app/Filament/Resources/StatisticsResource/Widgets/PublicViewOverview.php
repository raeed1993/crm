<?php

namespace App\Filament\Resources\StatisticsResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PublicViewOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('شركات مسجلة', '17'),
            ];
    }
}
