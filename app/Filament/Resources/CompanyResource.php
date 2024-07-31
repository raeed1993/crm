<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-c-building-office-2';

    /**
     * @return string
     */
    public static function getModelLabel(): string
    {
        return __('resources.Company');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.Companies');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('phone_number')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('email')
                    ->label('البريد الالكتروني')
                    ->email()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('register_number')
                    ->label('السجل التجاري')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Textarea::make('address')
                    ->label('عنوان الشركة')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('contract_duration')
                    ->label('مدة العقد')
                    ->required(),
                Forms\Components\Textarea::make('scope')
                    ->label('المجال')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('contract_type')
                    ->label('نوع العقد')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->label('الحالة')
                    ->options([
                        '1' => 'مفعل',
                        '0' => 'غير مفعل',
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('register_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contract_duration')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_type')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
