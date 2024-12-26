<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PekerjaanResource\Pages;
use App\Filament\Resources\PekerjaanResource\RelationManagers;
use App\Models\Pekerjaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PekerjaanResource extends Resource
{
    protected static ?string $model = Pekerjaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Lowongan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Posisi')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi Pekerjaan')
                    ->required(),

                Select::make('category_id')
                    ->label('Kategori')
                    ->options(function () {
                        return \App\Models\Category::pluck('name', 'id');
                    })
                    ->searchable()
                    ->required(),

                Select::make('user_id')
                    ->label('Employer')
                    ->options(function () {
                        return \App\Models\User::where('role', 'employer')->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Posisi')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('employer.name')
                    ->label('Employer')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPekerjaans::route('/'),
            'create' => Pages\CreatePekerjaan::route('/create'),
            'edit' => Pages\EditPekerjaan::route('/{record}/edit'),
        ];
    }
}
