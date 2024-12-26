<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Data Personal';

    protected static ?string $navigationGroup = 'Pengaturan Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->maxLength(50)
                    ->unique(),

                TextInput::make('prodi')
                    ->label('Program Studi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->required()
                    ->maxLength(255),

                TextInput::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required()
                    ->type('date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->searchable()->sortable(),
                TextColumn::make('nim')->label('NIM')->searchable()->sortable(),
                TextColumn::make('prodi')->label('Program Studi')->searchable(),
                TextColumn::make('jurusan')->label('Jurusan')->searchable(),
                TextColumn::make('tempat_lahir')->label('Tempat Lahir'),
                TextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->date(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
