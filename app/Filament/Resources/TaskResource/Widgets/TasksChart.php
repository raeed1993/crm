<?php

namespace App\Filament\Resources\TaskResource\Widgets;

use Filament\Widgets\ChartWidget;

class TasksChart extends ChartWidget
{
//    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 9;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'المهام',
                    'data' => [3, 6, 4, 1],
                    'backgroundColor' => [
                        'rgb(95, 148, 46)',
                        'rgb(255, 205, 86)',
                        'rgb(104, 100, 15)',
                        'rgb(255, 99, 132)',
                    ],
                ],
            ],
            'labels' => ['منجزة', 'قيد الإنجاز', 'ملغاة', 'معلقة'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
