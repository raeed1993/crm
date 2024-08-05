<?php

namespace App\Filament\Resources\StatisticsResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('شركات مسجلة', '17'),
            Stat::make('موظفين', '38'),
            Stat::make('المشاريع', '6'),
            Stat::make('المهام', '10'),
        ];
    }

}
