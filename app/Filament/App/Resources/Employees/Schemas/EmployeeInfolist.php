<?php

namespace App\Filament\App\Resources\Employees\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Relationship Details')
                    ->schema([
                        TextEntry::make('country.name'),
                        TextEntry::make('state.name'),
                        TextEntry::make('city.name'),
                        TextEntry::make('department.name'),
                    ])->columns(4),

                Section::make('Employee Details')
                    ->schema([
                        TextEntry::make('first_name'),
                        TextEntry::make('last_name'),
                        TextEntry::make('middle_name'),
                    ])->columns(3),

                Section::make('Employee Address')
                    ->schema([
                        TextEntry::make('address'),
                        TextEntry::make('zip_code'),
                    ])->columns(2),

                Section::make('Employee Dates')
                    ->schema([
                        TextEntry::make('date_of_birth')
                            ->date(),
                        TextEntry::make('date_hired')
                            ->date(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ])->columns(3)
            ]);
    }
}
