<?php

namespace App\Filament\Resources\States\Schemas;

use App\Models\Country;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('country_id')
                    ->required()
                    ->relationship('country', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
