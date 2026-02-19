<?php

namespace App\Filament\Resources\Applications\Schemas;

use App\Models\Qureka;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Application Info')
                    ->schema([
                        TextEntry::make('name')->placeholder('N/A'),
                        TextEntry::make('package_name')->placeholder('N/A'),
                        TextEntry::make('created_at')->date()->placeholder('N/A'),
                        TextEntry::make('updated_at')->date()->placeholder('N/A'),
                    ])
                    ->columns(4)->columnSpanFull(),

                Section::make('Google Ads 1')
                    ->relationship('googleAds')
                    ->schema([
                        TextEntry::make('app_id')->placeholder('N/A'),
                        TextEntry::make('interstitial')->placeholder('N/A'),
                        TextEntry::make('native')->placeholder('N/A'),
                        TextEntry::make('banner')->placeholder('N/A'),
                        TextEntry::make('google_collapsible_banner')->placeholder('N/A'),
                        TextEntry::make('rewarded')->placeholder('N/A'),
                        TextEntry::make('app_open')->placeholder('N/A'),
                    ])
                    ->columns(2),

                Section::make('Google Ads 2')
                    ->relationship('googleAds')
                    ->schema([
                        TextEntry::make('app_id_second')->placeholder('N/A'),
                        TextEntry::make('interstitial_second')->placeholder('N/A'),
                        TextEntry::make('native_second')->placeholder('N/A'),
                        TextEntry::make('banner_second')->placeholder('N/A'),
                        TextEntry::make('google_collapsible_banner_second')->placeholder('N/A'),
                        TextEntry::make('rewarded_second')->placeholder('N/A'),
                        TextEntry::make('app_open_second')->placeholder('N/A'),
                    ])
                    ->columns(2),

                Section::make('Google Ads 3')
                    ->relationship('googleAds')
                    ->schema([
                        TextEntry::make('app_id_third')->placeholder('N/A'),
                        TextEntry::make('interstitial_third')->placeholder('N/A'),
                        TextEntry::make('native_third')->placeholder('N/A'),
                        TextEntry::make('banner_third')->placeholder('N/A'),
                        TextEntry::make('google_collapsible_banner_third')->placeholder('N/A'),
                        TextEntry::make('rewarded_third')->placeholder('N/A'),
                        TextEntry::make('app_open_third')->placeholder('N/A'),
                    ])
                    ->columns(2),

                Section::make('Google Ads - High Rate')
                    ->schema([
                        IconEntry::make('ip_tracking')
                            ->boolean()
                            ->default(false),

                        Group::make([
                            TextEntry::make('googleAds.app_id_with_ip')->placeholder('N/A'),
                            TextEntry::make('googleAds.interstitial_with_ip')->placeholder('N/A'),
                            TextEntry::make('googleAds.native_with_ip')->placeholder('N/A'),
                            TextEntry::make('googleAds.banner_with_ip')->placeholder('N/A'),
                            TextEntry::make('googleAds.google_collapsible_banner_with_ip')->placeholder('N/A'),
                            TextEntry::make('googleAds.rewarded_with_ip')->placeholder('N/A'),
                            TextEntry::make('googleAds.app_open_with_ip')->placeholder('N/A'),
                        ])->columns(2),
                    ]),

                Section::make('Google Ads - Medium Rate')
                    ->schema([
                        IconEntry::make('midium_rate_ip_tracking')
                            ->boolean()
                            ->default(false),

                        Group::make([
                            TextEntry::make('googleAds.midium_rate_google_app_id')->placeholder('N/A'),
                            TextEntry::make('googleAds.midium_rate_google_interstitial')->placeholder('N/A'),
                            TextEntry::make('googleAds.midium_rate_google_native')->placeholder('N/A'),
                            TextEntry::make('googleAds.midium_rate_google_banner')->placeholder('N/A'),
                            TextEntry::make('googleAds.midium_rate_google_collapsible_banner')->placeholder('N/A'),
                            TextEntry::make('googleAds.midium_rate_google_rewarded')->placeholder('N/A'),
                            TextEntry::make('googleAds.midium_rate_google_app_open')->placeholder('N/A'),
                        ])->columns(2),
                    ]),

                Section::make('Facebook Ads')
                    ->relationship('facebook')
                    ->schema([
                        TextEntry::make('interstitial')->placeholder('N/A'),
                        TextEntry::make('native')->placeholder('N/A'),
                        TextEntry::make('banner')->placeholder('N/A'),
                    ])
                    ->columns(3),

                Section::make('StartUp')
                    ->relationship('startUp')
                    ->schema([
                        TextEntry::make('app_id')->placeholder('N/A'),
                        TextEntry::make('display_time')->placeholder('N/A'),
                        IconEntry::make('place_add')
                            ->boolean()
                            ->default(false),
                    ])
                    ->columns(3),

                Section::make('Qureka')
                    ->relationship('qureka')
                    ->schema([
                        TextEntry::make('interstitial')->placeholder('N/A'),
                        // SpatieMediaLibraryImageEntry::make('qureka_interstitial_image')
                        //     ->disk(config('app.media_disc'))
                        //     ->collection(Qureka::QUREKA_INTERSTITIAL_IMAGE),
                        TextEntry::make('native')->placeholder('N/A'),
                        // SpatieMediaLibraryImageEntry::make('qureka_native_image')
                        //     ->disk(config('app.media_disc'))
                        //     ->collection(Qureka::QUREKA_NATIVE_IMAGE),
                        TextEntry::make('banner')->placeholder('N/A'),
                        // SpatieMediaLibraryImageEntry::make('qureka_banner_image')
                        //     ->disk(config('app.media_disc'))
                        //     ->collection(Qureka::QUREKA_BANNER_IMAGE),
                        TextEntry::make('admob_click_gap')->placeholder('N/A'),
                    ])
                    ->columns(2),
            ]);
    }
}
