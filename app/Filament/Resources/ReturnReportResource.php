<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReturnReportResource\Pages;
use App\Filament\Resources\ReturnReportResource\RelationManagers;
use App\Models\ReturnReport;
use App\Models\User;
use App\Services\ReturnReportForm;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class ReturnReportResource extends Resource
{
    protected static ?string $model = ReturnReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Reporte de Devolucion';

    protected static ?string $pluralLabel = 'Reporte de Devoluciones';

    public static function getBreadcrumb(): string
    {
        return '';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(ReturnReportForm::schema());
        
    }

    // public function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()
    //             ->model(ReturnReport::class)
    //             ->form([
    //                 TextInput::make('title')
    //                     ->required()
    //                     ->maxLength(255),
    //                 // ...
    //             ])
    //     ];
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logistic.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guide_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guide_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('destination')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    // ->slideOver()
                    ->modalWidth(MaxWidth::FiveExtraLarge)
                    ->color('warning')
                    ->successNotificationTitle('Reporte de devolucion actualizado con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['guide_number'] = Str::of($data['guide_number'])->upper();
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm'),
                Tables\Actions\RestoreAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(!User::isSuperAdmin())
                        ->hidden(!User::isAdmin()),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->hidden(!User::isSuperAdmin())
                        ->hidden(!User::isAdmin()),
                    Tables\Actions\RestoreBulkAction::make()
                        ->hidden(!User::isSuperAdmin())
                        ->hidden(!User::isAdmin()),
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
            'index' => Pages\ListReturnReports::route('/'),
            // 'create' => Pages\CreateReturnReport::route('/create'),
            // 'edit' => Pages\EditReturnReport::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
