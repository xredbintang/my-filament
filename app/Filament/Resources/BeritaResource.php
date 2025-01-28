<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use App\Models\BeritaModel;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeritaResource extends Resource
{
    protected static ?string $model = BeritaModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?string $navigationGroup = 'Berita';
    protected static ?string $slug = 'Tambah-berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                

                TextInput::make('judul_berita'),
                Select::make('kategori_berita_id')->relationship('kategori','kategori_nama'),
                Select::make('penulis_berita_id')->relationship('penulis','penulis_nama'),
                RichEditor::make('deskripsi_berita'),
                FileUpload::make('gambar_berita')->image()->label('Unggah Gambar'),
                DatePicker::make('tanggal_publikasi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul_berita')->searchable(),
                TextColumn::make('kategori.kategori_nama'),
                TextColumn::make('penulis.penulis_nama'),
                TextColumn::make('deskripsi_berita'),
                ImageColumn::make('gambar_berita'),
                TextColumn::make('tanggal_publikasi'),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
