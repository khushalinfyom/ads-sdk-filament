<?php

namespace App\Filament\Resources\Countries\Pages;

use App\Filament\Resources\Countries\CountryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCountries extends ManageRecords
{
    protected static string $resource = CountryResource::class;

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
