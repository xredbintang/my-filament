<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenulisResource\Pages;
use App\Filament\Resources\PenulisResource\RelationManagers;
use App\Models\Penulis;
use App\Models\PenulisModel;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenulisResource extends Resource
{
    protected static ?string $model = PenulisModel::class;
    protected static ?string $navigationGroup = 'Berita';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('penulis_nama')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penulis_nama')->label('Nama penulis')
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
            'index' => Pages\ListPenulis::route('/'),
            'create' => Pages\CreatePenulis::route('/create'),
            'edit' => Pages\EditPenulis::route('/{record}/edit'),
        ];
    }
}
