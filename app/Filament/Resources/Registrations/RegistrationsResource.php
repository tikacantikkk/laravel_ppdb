<?php

namespace App\Filament\Resources\Registrations;

use App\Filament\Resources\Registrations\Pages\CreateRegistrations;
use App\Filament\Resources\Registrations\Pages\EditRegistrations;
use App\Filament\Resources\Registrations\Pages\ListRegistrations;
use App\Filament\Resources\Registrations\Pages\ViewRegistrations;
use App\Filament\Resources\Registrations\Schemas\RegistrationsForm;
use App\Filament\Resources\Registrations\Schemas\RegistrationsInfolist;
use App\Filament\Resources\Registrations\Tables\RegistrationsTable;
use App\Models\Registrations;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RegistrationsResource extends Resource
{
    protected static ?string $model = Registrations::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Registrations';

    public static function form(Schema $schema): Schema
    {
        return RegistrationsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RegistrationsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RegistrationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRegistrations::route('/'),
            'create' => CreateRegistrations::route('/create'),
            'view' => ViewRegistrations::route('/{record}'),
            'edit' => EditRegistrations::route('/{record}/edit'),
        ];
    }
}
