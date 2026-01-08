<?php

namespace App\Filament\Resources\Applicants\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ApplicantInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('registration_number'),
                TextEntry::make('full_name'),
                TextEntry::make('nik'),
                TextEntry::make('birth_place'),
                TextEntry::make('birth_date')
                    ->date(),
                TextEntry::make('gender')
                    ->badge(),
                TextEntry::make('address')
                    ->columnSpanFull(),
                TextEntry::make('parent_name'),
                TextEntry::make('parent_phone'),
                TextEntry::make('previous_school'),
                TextEntry::make('school_id')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('verification_note')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('user_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
