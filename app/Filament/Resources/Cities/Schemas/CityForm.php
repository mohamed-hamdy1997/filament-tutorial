<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('state_id')
                    ->required()
                    ->relationship('state', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
