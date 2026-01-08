<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RegistrationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('applicant_id')
                    ->required()
                    ->numeric(),
                TextInput::make('academic_year')
                    ->required(),
                Select::make('registration_path')
                    ->options(['regular' => 'Regular', 'prestasi' => 'Prestasi', 'afirmasi' => 'Afirmasi'])
                    ->default('regular')
                    ->required(),
                Select::make('registration_status')
                    ->options([
            'menunggu_verifikasi' => 'Menunggu verifikasi',
            'diterima' => 'Diterima',
            'ditolak' => 'Ditolak',
            'daftar_ulang' => 'Daftar ulang',
        ])
                    ->default('menunggu_verifikasi')
                    ->required(),
                Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }
}
