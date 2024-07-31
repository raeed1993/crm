<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-c-clock';

    /**
     * @return string
     */
    public static function getModelLabel(): string
    {
        return __('resources.Task');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.Tasks');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('title')
                    ->label(__('resources.title'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('desc')
                    ->label(__('resources.desc'))
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('status')
                    ->label('حالة المهمة')
                    ->numeric(),
                Forms\Components\DatePicker::make('start_date')
                    ->label('تبدأ المهمة في تاريخ')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('تنتهي المهمة في تاريخ'),
                Forms\Components\TextInput::make('project_id')
                    ->label('المشروع')
                    ->required()
                    ->numeric(),
//                Forms\Components\TextInput::make('user_id')
//                    ->numeric(),
                Forms\Components\TextInput::make('priority')
                    ->label('الأولوية')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('duration')
                    ->label('المدة')
                    ->numeric(),
                Forms\Components\Select::make('duration_type')
                    ->label('نوع المدة')
                    ->required()
                    ->options([
                        '0' => 'يوم',
                        '1' => 'شهر',
                        '2' => 'أسبوع',
                        '3' => 'ساعة',
                        '4' => 'سنة',

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->icon(fn(string $state): string => match ($state) {
                        '0' => 'heroicon-o-pencil',
                        '1' => 'heroicon-o-clock',
                        '2' => 'heroicon-o-check-circle',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'gray',
                        '1' => 'warning',
                        '2' => 'success',
                        '3' => 'danger',
                    })
                ,
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
//                Tables\Columns\TextColumn::make('end_date')
//                    ->dateTime()
//                    ->sortable(),
                Tables\Columns\TextColumn::make('project.name')
                    ->sortable(),
//                Tables\Columns\TextColumn::make('user_id')
//                    ->numeric()
//                    ->sortable(),
                Tables\Columns\TextColumn::make('priority')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '0' => 'gray',
                        '1' => 'warning',
                        '2' => 'success',
                        '3' => 'danger',
                    })
                    ->sortable(),
//                Tables\Columns\TextColumn::make('duration')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('duration_type')
//                    ->numeric()
//                    ->sortable(),
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
                Tables\Actions\Action::make('assignmentToUser')
                    ->label('اسناد للموظفين')
                    ->icon('heroicon-o-user-plus')
                    ->fillForm(fn (Task $record): array => [
                        'user_id' => $record->user_id,
                    ])
                    ->form([
                        Select::make('user_id')
                            ->label('الموظفين')
                            ->options(User::query()->pluck('name', 'id'))
                            ->required(),
                    ])
                    ->action(function (array $data, Task $record): void {
                        $record->user_id = $data['user_id'];
                        $record->save();
                    })
                    ->visible(function ( Task $record): bool {
                       return is_null($record->user_id) ;
                    }),

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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
