<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RatingResource\Pages;
use App\Filament\Resources\RatingResource\RelationManagers;
use App\Models\Rating;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RatingResource extends Resource
{
    protected static ?string $model = Rating::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Ratings & Customers';
    protected static ?string $navigationLabel = 'Ratings & Reviews';
    protected static ?string $pluralLabel = 'Ratings & Reviews';

    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->label('Customer')
                    ->disabled(),
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->label('Product')
                    ->disabled(),
                Forms\Components\TextInput::make('rating')
                    ->label('Rating')
                    ->disabled(),
                Forms\Components\Textarea::make('review')
                    ->label('Review')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Product')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->sortable(),
                Tables\Columns\TextColumn::make('review')
                    ->label('Review')
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRatings::route('/'),
        ];
    }
}