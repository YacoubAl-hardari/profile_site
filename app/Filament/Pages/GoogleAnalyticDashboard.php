<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BezhanSalleh\FilamentGoogleAnalytics\Widgets;
class GoogleAnalyticDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static string $view = 'filament.pages.google-analytic-dashboard';
    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\PageViewsWidget::class,
            Widgets\VisitorsWidget::class,
            Widgets\ActiveUsersOneDayWidget::class,
            Widgets\ActiveUsersSevenDayWidget::class,
            Widgets\ActiveUsersTwentyEightDayWidget::class,
            Widgets\SessionsWidget::class,
            Widgets\SessionsDurationWidget::class,
            Widgets\SessionsByCountryWidget::class,
            Widgets\SessionsByDeviceWidget::class,
            Widgets\MostVisitedPagesWidget::class,
            Widgets\TopReferrersListWidget::class,
        ];
    }
}
