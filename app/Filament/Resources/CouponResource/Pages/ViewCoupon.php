<?php

namespace App\Filament\Resources\CouponResource\Pages;

use App\Filament\Resources\CouponResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCoupon extends ViewRecord
{
    protected static string $resource = CouponResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
