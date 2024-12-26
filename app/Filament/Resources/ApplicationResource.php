<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralLabel = 'Lamaran';  // Ubah dari 'Applications' menjadi 'Application'


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Nama Pelamar')
                    ->options(function () {
                        return \App\Models\User::where('role', 'job_seeker')->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required(),
                
                Select::make('job_id')
                    ->label('Lowongan Pekerjaan')
                    ->options(function () {
                        return \App\Models\pekerjaan::pluck('title', 'id');
                    })
                    ->searchable()
                    ->required(),

                Textarea::make('cover_letter')
                    ->label('Surat Lamaran')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pelamar')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pekerjaan.title')
                    ->label('Nama Pekerjaan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('cover_letter')
                    ->label('Surat Lamaran')
                    ->limit(100)
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Melamar')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
