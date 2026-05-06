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