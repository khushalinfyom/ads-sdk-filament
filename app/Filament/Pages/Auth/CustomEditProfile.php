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
        return __('messages.user.profile_settings');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    SpatieMediaLibraryFileUpload::make('profile')
                        ->label(__('messages.user.profile'))
                        ->disk(config('app.media_disk'))
                        ->collection(User::PROFILE)
                        ->image()
                        ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('messages.common.image_hint', ['name' => __('messages.user.profile'), 'width' => '100', 'height' => '100']))
                        ->imagePreviewHeight(150)
                        ->required(),
                ]),
                Group::make([
                    Group::make([
                        TextInput::make('first_name')
                            ->label(__('messages.user.first_name'))
                            ->placeholder(__('messages.user.first_name'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        TextInput::make('last_name')
                            ->label(__('messages.user.last_name'))
                            ->placeholder(__('messages.user.last_name'))
                            ->required()
                            ->maxLength(255),
                    ])->columns(2)->columnSpanFull(),
                    TextInput::make('email')
                        ->label(__('messages.user.email_address'))
                        ->placeholder(__('messages.user.email_address'))
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),
                    PhoneInput::make('phone_number')
                        ->label(__('messages.user.phone_number'))
                        ->defaultCountry('IN')
                        ->separateDialCode(true)
                        ->countryStatePath('region_code')
                        ->required()
                        ->rules(function (Get $get) {
                            return [
                                'required',
                                'phone:AUTO,' . strtoupper($get('prefix_code')),
                            ];
                        })
                        ->validationMessages([
                            'phone' => __('messages.user.phone_number_validation'),
                        ]),
                ])->columnSpan(3)->columns(1),
            ])->columns(4)
            ->inlineLabel(false);
    }

    protected function getRedirectUrl(): ?string
    {
        /** @var User $user */
        $user = Auth::user();
        if ($user->hasRole(Role::SUPER_ADMIN)) {
            return route('filament.admin.pages.dashboard');
        }

        return route('filament.user.pages.dashboard');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('messages.user.profile_settings_updated');
    }
}
