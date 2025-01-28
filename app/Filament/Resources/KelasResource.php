<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\Pages;
use App\Filament\Resources\KelasResource\RelationManagers;
use App\Models\Kelas;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kelas'),
                TextInput::make('tingkatan')->numeric()->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kelas')->searchable(),
                TextColumn::make('tingkatan')->label('Kelas'),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('naik_kelas')->label('naik kelas')->icon('heroicon-o-arrow-up')
                ->form([
                    Select::make('kelas_tujuan')
                            ->label('Pindah ke Kelas')
                            ->options(function (Kelas $record) {
                                return Kelas::query()
                                    ->where('id', '!=', $record->id) // Tidak termasuk kelas saat ini
                                    ->get()->mapWithKeys(function($kelas){
                                        return [$kelas->id=>"{$kelas->nama_kelas} - Tingkatan {$kelas->tingkatan}"];
                                    });
                            })
                            ->required(),
                ])
                ->action(function (Kelas $record, array $data): void {
                    $record->siswa()->update(['kelas_siswa_id' => $data['kelas_tujuan']]);
                })
                ->modalHeading('Pindahkan Semua Siswa')
                ->requiresConfirmation(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tingkatan');
            
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}
