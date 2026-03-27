<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Models\City;
use App\Models\State;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Collection;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Relationship Details')
                    ->description('Relationship Details')
                    ->schema([
                        Select::make('country_id')
                            ->relationship('country', 'name')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('state_id', null);
                                $set('city_id', null);
                            })
                            ->required(),
                        Select::make('state_id')
                            ->required()
                            ->options(fn(Get $get): Collection => State::where('country_id', $get('country_id'))->get()->pluck('name', 'id'))
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(Set $set) => $set('city_id', null))
                            ->preload(),
                        Select::make('city_id')
                            ->required()
                            ->options(fn(Get $get): Collection => City::where('state_id', $get('state_id'))->get()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                        Select::make('department_id')
                            ->required()
                            ->relationship('department', 'name')
                            ->searchable()
                            ->preload(),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Section::make('Employee Details')
                    ->description('Employee Details')
                    ->schema([
                        TextInput::make('first_name')
                            ->required(),
                        TextInput::make('last_name')
                            ->required(),
                        TextInput::make('middle_name')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->columns(3),

                Section::make('Employee Address')
                    ->description('Employee Address')
                    ->schema([
                        TextInput::make('address')
                            ->required(),
                        TextInput::make('zip_code')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Section::make('Dates')
                    ->description('Employee Dates')
                    ->schema([
                        DatePicker::make('date_of_birth')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        DatePicker::make('date_hired')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                    ])
                    ->columnSpanFull()
                    ->columns(2),

            ])->columns(3);
    }
}
