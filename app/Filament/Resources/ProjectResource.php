<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * @return string
     */
    public static function getModelLabel(): string
    {
        return __('resources.Project');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.Projects');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('الاسم')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('contract_duration')
                    ->label('تاريخ العقد')
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->label('تاريخ التفعيل'),
                Forms\Components\DatePicker::make('end_date')
                    ->label('تاريخ الانتهاء'),
                Select::make('status')
                    ->label('الحالة')
                    ->required()
                    ->options([
                        '1' => 'مفعل',
                        '0' => 'غير مفعل',

                    ]),

                Select::make('type')
                    ->label('نوع المشروع')
                    ->required()
                    ->options([
                        '1' => 'دعم',
                        '0' => 'صيانة',

                    ]),
                Select::make('priority')
                    ->label('الأولوية')
                    ->required()
                    ->options([
                        '1' => 'مهم',
                        '0' => 'غير مهم',

                    ]),

                Forms\Components\Textarea::make('desc')
                    ->label('الوصف')
                    ->translateLabel()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('test_url')
                    ->label('رابط المشروع (التجريبي)')
                    ->translateLabel()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('real_url')
                    ->label('رابط المشروع (الفعلي)')
                    ->translateLabel()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contract_duration')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('priority')
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->translateLabel()
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
