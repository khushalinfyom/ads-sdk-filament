<?php

namespace App\Filament\Resources\CountryMediumRates\Pages;

use App\Filament\Resources\CountryMediumRates\CountryMediumRateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCountryMediumRates extends ManageRecords
{
    protected static string $resource = CountryMediumRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('New Country')
                ->icon('heroicon-s-plus')
                ->modalWidth('md')
                ->modalHeading('Add Country')
                ->createAnother(false)
                ->successNotificationTitle('Country created successfully'),
        ];
    }
}
