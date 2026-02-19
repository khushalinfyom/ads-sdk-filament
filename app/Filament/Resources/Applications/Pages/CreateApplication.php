<?php

namespace App\Filament\Resources\Applications\Pages;

use App\Filament\Resources\Applications\ApplicationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateApplication extends CreateRecord
{
    protected static string $resource = ApplicationResource::class;

    protected static bool $canCreateAnother = false;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Application created successfully';
    }

    public function getTitle(): string
    {
        return 'Create Application';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResourceUrl('index');
    }
}
