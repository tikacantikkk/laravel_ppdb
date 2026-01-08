<?php

namespace App\Filament\Resources\Applicants\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ApplicantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('registration_number')
                    ->required(),
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('nik')
                    ->required(),
                TextInput::make('birth_place')
                    ->required(),
                DatePicker::make('birth_date')
                    ->required(),
                Select::make('gender')
                    ->options(['L' => 'L', 'P' => 'P'])
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('parent_name')
                    ->required(),
                TextInput::make('parent_phone')
                    ->tel()
                    ->required(),
                TextInput::make('previous_school')
                    ->required(),
                TextInput::make('school_id')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'verified' => 'Verified',
            'rejected' => 'Rejected',
            'accepted' => 'Accepted',
        ])
                    ->default('pending')
                    ->required(),
                Textarea::make('verification_note')
                    ->columnSpanFull(),
                TextInput::make('user_id')
                    ->numeric(),
            ]);
    }
}
