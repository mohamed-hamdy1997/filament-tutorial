<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('City Info')
                    ->schema([
                        TextEntry::make('name')->label('City Name'),
                        TextEntry::make('state.name')->label('State Name'),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ])->columnSpanFull()->columns(3),
            ]);
    }
}
