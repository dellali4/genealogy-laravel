<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewFamilyResource\Pages;
use App\Filament\Resources\NewFamilyResource\RelationManagers;
use App\Models\NewFamily;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewFamilyResource extends Resource
{
    protected static ?string $model = NewFamily::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Family Reports';
    protected static ?string $navigationGroup = 'Family';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description')
                ->maxLength(65535)
                ->columnSpanFull(),
            Forms\Components\TextInput::make('is_active')
                ->numeric(),
            Forms\Components\TextInput::make('type_id')
                ->numeric(),
            Forms\Components\TextInput::make('husband_id')
                ->numeric(),
            Forms\Components\TextInput::make('wife_id')
                ->numeric(),
            Forms\Components\TextInput::make('chan')
                ->maxLength(255),
            Forms\Components\TextInput::make('nchi')
                ->maxLength(255),
            Forms\Components\TextInput::make('rin')
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('is_active')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('type_id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('husband_id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('wife_id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('deleted_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('chan')
                ->searchable(),
            Tables\Columns\TextColumn::make('nchi')
                ->searchable(),
            Tables\Columns\TextColumn::make('rin')
                ->searchable(),
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
            'index' => Pages\ListNewFamilies::route('/'),
            'create' => Pages\CreateNewFamily::route('/create'),
            'edit' => Pages\EditNewFamily::route('/{record}/edit'),
        ];
    }
}
