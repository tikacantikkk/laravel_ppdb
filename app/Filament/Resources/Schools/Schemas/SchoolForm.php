<?php

namespace App\Filament\Resources\Schools\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SchoolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('level')
                    ->options(['SMP' => 'S m p', 'SMK' => 'S m k'])
                    ->required(),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('quota')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
