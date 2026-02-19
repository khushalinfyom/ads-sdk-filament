<?php

namespace App\Filament\Resources\CountryMediumRates;

use App\Filament\Resources\CountryMediumRates\Pages\ManageCountryMediumRates;
use App\Models\CountryMediumRate;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CountryMediumRateResource extends Resource
{
    protected static ?string $model = CountryMediumRate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeAlt;

    protected static ?string $recordTitleAttribute = 'CountryMediumRate';

    public static function getNavigationLabel(): string
    {
        return 'Countries Medium Rate';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Countries Medium Rate';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('medium_rate_countries_name')
                    ->label('Name')
                    ->required(),
                TextInput::make('medium_rate_countries_code')
                    ->label('Code')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('CountryMediumRate')
            ->columns([
                TextColumn::make('medium_rate_countries_name')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('medium_rate_countries_code')
                    ->label('Code')
                    ->searchable()
                    ->alignCenter(),
            ])
            ->recordActions([
                EditAction::make()
                    ->modalWidth('md')
                    ->modalHeading('Edit Country')
                    ->successNotificationTitle('Country updated successfully'),
                DeleteAction::make()
                    ->successNotificationTitle('Country deleted successfully'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCountryMediumRates::route('/'),
        ];
    }
}
