<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Team;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Team';
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name'),
            TextInput::make('slug'),
        ]);
    }

    protected function handleRegistration(array $data): Model
    {
        $team = Team::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
