<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\ClientReview;
use App\Models\MyExpertArea;
use App\Models\Portfolio;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        return [
            Stat::make('الأعمال', Portfolio::count())
            ->description('increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
              ->chart([45,69,85,10,25,30,10])
            ->color('success'),
        Stat::make('الخدمات',  Service::count())
            ->description('increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->chart([30,20,10,15,21,12,13,10])
            ->color('info'),
        Stat::make('المهارات',  MyExpertArea::count())
            ->description('increase')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('warning'),


            Stat::make('العملاء', Brand::count())
            ->description('increase')
            ->color('danger')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
        Stat::make('المدوونات', Blog::count())
            ->description('increase')
             ->color('gray')
            ->descriptionIcon('heroicon-m-arrow-trending-down'),
        Stat::make('مراجعة العملاء', ClientReview::count())
            ->description('increase')
            ->color('info')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),


        ];
    }
}
