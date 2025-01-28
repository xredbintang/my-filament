<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\CustomerModel;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = CustomerModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?string $navigationLabel = 'Kelola Customer';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $slug = 'Halaman-Kelola-Customer';
    public static ?string $label = 'PANTAT';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kustomer')->required()
                ->label('Nama')
                ->placeholder('contoh : Ivan Kalasnikov'),
                TextInput::make('kode_kustomer')->required()->numeric(),
                TextInput::make('alamat_kustomer')->required(),
                TextInput::make('telepon_kustomer')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kustomer')->searchable(),
                TextColumn::make('kode_kustomer'),
                TextColumn::make('alamat_kustomer'),
                TextColumn::make('telepon_kustomer'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
