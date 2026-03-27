<?php

namespace App\Filament\App\Resources\Departments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DepartmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Department Info')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('employees_count')->counts('employees'),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ])->columnSpanFull()->columns(4)
            ]);
    }
}
