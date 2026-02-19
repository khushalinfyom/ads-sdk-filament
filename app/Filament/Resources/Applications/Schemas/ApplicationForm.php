<?php

namespace App\Filament\Resources\Applications\Schemas;

use App\Models\Qureka;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('name')->required(),
                    TextInput::make('package_name')->required(),
                ])->columns(2),
                Section::make([
                    TextInput::make('app_id'),
                    TextInput::make('interstitial'),
                    TextInput::make('native'),
                    TextInput::make('banner'),
                    TextInput::make('google_collapsible_banner'),
                    TextInput::make('rewarded'),
                    TextInput::make('app_open'),
                ])->relationship('googleAds')->columns(2)->label('Google Ads 1'),
                Section::make([
                    TextInput::make('app_id_second'),
                    TextInput::make('interstitial_second'),
                    TextInput::make('native_second'),
                    TextInput::make('banner_second'),
                    TextInput::make('google_collapsible_banner_second'),
                    TextInput::make('rewarded_second'),
                    TextInput::make('app_open_second'),
                ])->relationship('googleAds')->columns(2)->label('Google Ads 2'),
                Section::make([
                    TextInput::make('app_id_third'),
                    TextInput::make('interstitial_third'),
                    TextInput::make('native_third'),
                    TextInput::make('banner_third'),
                    TextInput::make('google_collapsible_banner_third'),
                    TextInput::make('rewarded_third'),
                    TextInput::make('app_open_third'),
                ])->relationship('googleAds')->columns(2)->label('Google Ads 3'),
                Section::make([
                    Toggle::make('ip_tracking')
                        ->live()
                        ->columnSpanFull(),
                    Group::make([
                        TextInput::make('app_id_with_ip'),
                        TextInput::make('interstitial_with_ip'),
                        TextInput::make('native_with_ip'),
                        TextInput::make('banner_with_ip'),
                        TextInput::make('google_collapsible_banner_with_ip'),
                        TextInput::make('rewarded_with_ip'),
                        TextInput::make('app_open_with_ip'),
                    ])->relationship('googleAds')->columns(2)->columnSpanFull()->visible(fn($get) => $get('ip_tracking')),
                ])->columns(2)->label('Google Ads - High Rate'),
                Section::make([
                    Toggle::make('midium_rate_ip_tracking')
                        ->live()
                        ->columnSpanFull(),
                    Group::make([
                        TextInput::make('midium_rate_google_app_id'),
                        TextInput::make('midium_rate_google_interstitial'),
                        TextInput::make('midium_rate_google_native'),
                        TextInput::make('midium_rate_google_banner'),
                        TextInput::make('midium_rate_google_collapsible_banner'),
                        TextInput::make('midium_rate_google_rewarded'),
                        TextInput::make('midium_rate_google_app_open'),
                    ])->relationship('googleAds')->columns(2)->columnSpanFull()->visible(fn($get) => $get('midium_rate_ip_tracking')),
                ])->columns(2)->label('Google Ads - Medium Rate'),
                Section::make([
                    // Facebook
                    Group::make([
                        TextInput::make('interstitial'),
                        TextInput::make('native'),
                        TextInput::make('banner'),
                    ])->relationship('facebook')->columns(3)->columnSpanFull(),

                    // Start Up
                    Group::make([
                        Group::make([
                            TextInput::make('app_id'),
                        ])->relationship('startUp'),
                        TextInput::make('display_time'),
                        Toggle::make('place_add'),
                    ])->columns(3)->columnSpanFull(),

                    // Qureka
                    Section::make('Qureka')
                        ->relationship('qureka')
                        ->schema([
                            TextInput::make('interstitial'),
                            SpatieMediaLibraryFileUpload::make('qureka_interstitial_image')
                                ->disk(config('app.media_disc'))
                                ->collection(Qureka::QUREKA_INTERSTITIAL_IMAGE)
                                ->image()
                                ->multiple()
                                ->maxFiles(1)
                                ->imagePreviewHeight(150),
                            TextInput::make('native'),
                            SpatieMediaLibraryFileUpload::make('qureka_native_image')
                                ->disk(config('app.media_disc'))
                                ->collection(Qureka::QUREKA_NATIVE_IMAGE)
                                ->image()
                                ->multiple()
                                ->maxFiles(1)
                                ->imagePreviewHeight(150),
                            TextInput::make('banner'),
                            SpatieMediaLibraryFileUpload::make('qureka_banner_image')
                                ->disk(config('app.media_disc'))
                                ->collection(Qureka::QUREKA_BANNER_IMAGE)
                                ->image()
                                ->multiple()
                                ->maxFiles(1)
                                ->imagePreviewHeight(150),
                            TextInput::make('admob_click_gap'),
                        ])->columns(2)->columnSpanFull(),
                ])->columns(2),
            ])->columns(1);
    }
}
