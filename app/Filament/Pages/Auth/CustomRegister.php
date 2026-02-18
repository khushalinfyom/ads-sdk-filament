<?php

namespace App\Filament\Pages\Auth;

use Filament\Notifications\Notification;
use Filament\Auth\Events\Registered;
use App\Filament\Admin\Resources\Users\Pages\CreateUser;
use App\Models\Society;
use App\Models\SystemMail;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse;
use Filament\Auth\Pages\Register;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class CustomRegister extends Register
{
    /**
     * @var view-string
     */
    protected string $view = 'filament.pages.auth.register';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    TextInput::make('first_name')
                        ->label(__('messages.user.first_name'))
                        ->placeholder(__('messages.user.first_name'))
                        ->required()
                        ->maxLength(255),
                    TextInput::make('last_name')
                        ->label(__('messages.user.last_name'))
                        ->placeholder(__('messages.user.last_name'))
                        ->required()
                        ->maxLength(255),
                ])->columns(2),
                $this->getEmailFormComponent()
                    ->label(__('messages.user.email_address'))
                    ->placeholder(__('messages.user.email_address')),
                $this->getPasswordFormComponent()
                    ->label(__('messages.user.password'))
                    ->placeholder(__('messages.user.password'))
                    ->extraAttributes(['class' => 'password-field']),
                $this->getPasswordConfirmationFormComponent()
                    ->label(__('messages.user.confirm_password'))
                    ->placeholder(__('messages.user.confirm_password'))
                    ->extraAttributes(['class' => 'password-field'])
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            $this->getRegisterFormAction()
                ->extraAttributes(['class' => 'w-full flex items-center justify-center space-x-3 form-submit mt-5'])
                ->label(__('messages.home.sign_up')),
        ];
    }

    public function register(): ?RegistrationResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();

            return null;
        }

        $user = $this->wrapInDatabaseTransaction(function () {

            $data = $this->form->getState();

            $data = $this->mutateFormDataBeforeRegister($data);

            $user = $this->handleRegistration($data);

            Society::create([
                'user_id' => $user->id,
            ]);

            CreateUser::adminDefaultData($user);

            $this->form->model($user)->saveRelationships();

            return $user;
        });

        event(new Registered($user));

        if (checkMailEnabled(SystemMail::VERIFY_EMAIL)) {
            $user->sendEmailVerificationNotification();
            Notification::make()
                ->success()
                ->title(__('messages.home.email_verification_link_sent'))
                ->send();
        } else {
            $user->markEmailAsVerified();
            Notification::make()
                ->success()
                ->title(__('messages.home.registration_successful'))
                ->send();
        }

        return app(RegistrationResponse::class);
    }
}
