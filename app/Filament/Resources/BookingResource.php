<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Carts & Orders';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required(),

                Forms\Components\Select::make('table_id')
                    ->relationship('table', 'name')
                    ->required(),

                Forms\Components\DatePicker::make('booking_date')
                    ->required(),

                Forms\Components\TimePicker::make('booking_time')
                    ->required(),

                Forms\Components\Select::make('duration')
                    ->options([
                        1 => '1 Jam',
                        2 => '2 Jam',
                        3 => '3 Jam',
                        4 => '4 Jam',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('notes'),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Customer')
                    ->searchable(),

                Tables\Columns\TextColumn::make('table.name')
                    ->label('Meja'),

                Tables\Columns\TextColumn::make('booking_date')
                    ->label('Tanggal')
                    ->date(),

                Tables\Columns\TextColumn::make('booking_time')
                    ->label('Jam'),

                Tables\Columns\TextColumn::make('duration')
                    ->label('Durasi')
                    ->suffix(' Jam'),

                Tables\Columns\TextColumn::make('notes')
                    ->label('Catatan')
                    ->limit(30),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ]),

            ])
            ->actions([

                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('confirm')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn($record) => $record->status !== 'confirmed')
                    ->action(fn($record) => $record->update([
                        'status' => 'confirmed',
                    ])),

                Tables\Actions\Action::make('cancel')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->visible(fn($record) => $record->status !== 'cancelled')
                    ->action(fn($record) => $record->update([
                        'status' => 'cancelled',
                    ])),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}