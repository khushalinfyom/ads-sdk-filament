<?php

namespace App\Filament\Pages\Auth;

use App\Models\Role;
use App\Models\User;
use Filament\Auth\Pages\EditProfile;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class CustomEditProfile extends EditProfile
{
    public static function getLabel(): string
    {
        return __('messages.edit_profile');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Group::make([
                //     SpatieMediaLibraryFileUpload::make('profile')
                //         ->label(__('messages.profile'))
                //         ->disk(config('app.media_disc'))
                //         // ->collection(User::PROFILE)
                //         ->collection('profile')
                //         ->image()
                //         ->imagePreviewHeight(150)
                //         ->required(),
                // ]),
                Group::make([
                    TextInput::make('name')
                        ->label(__('messages.name'))
                        ->placeholder(__('messages.name'))
                        ->required()
                        ->maxLength(255)
                        ->autofocus(),
                    TextInput::make('email')
                        ->label(__('messages.email'))
                        ->placeholder(__('messages.email'))
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),
                ])->columnSpan(3)->columns(1),
            ])->columns(4)
            ->inlineLabel(false);
    }

    protected function getRedirectUrl(): ?string
    {
        return route('filament.admin.pages.dashboard');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('messages.profile_settings_updated');
    }
}
