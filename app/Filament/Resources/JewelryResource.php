<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JewelryResource\Pages;
use App\Models\Jewelry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Support\Enums\FontWeight;

class JewelryResource extends Resource
{
    protected static ?string $model = Jewelry::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'Jewelry Collection';
    protected static ?string $modelLabel = 'Jewelry Item';
    protected static ?string $navigationGroup = 'Shop Management';
    protected static ?string $slug = 'jewelries';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->description('Enter the basic details of the jewelry item.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter jewelry name')
                            ->columnSpanFull(),
                        
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Enter category name'),
                            ])
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                        
                        Grid::make(2)
                            ->schema([
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->placeholder('0')
                                    ->mask('999999999'),
                                
                                TextInput::make('stock')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0)
                                    ->placeholder('Available quantity'),
                            ]),
                    ]),

                Section::make('Media')
                    ->description('Upload product images.')
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('jewelry')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->imageEditor()
                            ->required()
                            ->imagePreviewHeight('250')
                            ->loadingIndicatorPosition('left')
                            ->panelAspectRatio('2:1')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadButtonPosition('left')
                            ->uploadProgressIndicatorPosition('left')
                            ->maxSize(5120)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                            ->helperText('Upload a product image (max 5MB). Supported formats: JPG, PNG, WEBP, GIF.')
                            ->columnSpanFull(),
                    ]),

                Section::make('Description')
                    ->description('Provide detailed information about the jewelry item.')
                    ->schema([
                        Textarea::make('description')
                            ->rows(4)
                            ->placeholder('Enter detailed description')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->visibility('public')
                    ->square()
                    ->size(100)
                    ->defaultImageUrl(asset('images/placeholder-jewelry.png'))
                    ->extraImgAttributes(['loading' => 'lazy'])
                    ->label('Preview'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),
                TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->default('Uncategorized'),
                TextColumn::make('price')
                    ->money('IDR')
                    ->sortable()
                    ->alignRight(),
                TextColumn::make('stock')
                    ->sortable()
                    ->alignRight()
                    ->badge()
                    ->color(fn (Jewelry $record): string => match (true) {
                        $record->stock === 0 => 'danger',
                        $record->stock <= 10 => 'warning',
                        default => 'success',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->color('info'),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                    Tables\Actions\DeleteAction::make()
                        ->color('danger'),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJewelry::route('/'),
            'create' => Pages\CreateJewelry::route('/create'),
            'edit' => Pages\EditJewelry::route('/{record}/edit'),
        ];
    }
} 