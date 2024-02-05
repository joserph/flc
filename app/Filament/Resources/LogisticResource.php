<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogisticResource\Pages;
use App\Filament\Resources\LogisticResource\RelationManagers;
use App\Models\Logistic;
use App\Services\LogisticForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Hamcrest\StringDescription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PHPUnit\Framework\Attributes\Small;

class LogisticResource extends Resource
{
    protected static ?string $model = Logistic::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Empresa de Logistica';

    protected static ?string $pluralLabel = 'Empresas de Logistica';

    public static function getBreadcrumb(): string
    {
        return '';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(LogisticForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ruc')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefono'),
                Tables\Columns\ImageColumn::make('image_url'),
                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->label('Direccion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('state')
                    ->sortable()
                    ->label('Estado')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('city')
                    ->sortable()
                    ->label('Ciudad')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('country')
                    ->sortable()
                    ->label('Pais')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Fecha Creacion')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    ->slideOver()
                    ->color('warning')
                    ->successNotificationTitle('Empresa de Logistica actualizada con exito!'),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm'),
                Tables\Actions\RestoreAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(!auth()->user()->isSuperAdmin())
                        ->hidden(!auth()->user()->isAdmin()),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->hidden(!auth()->user()->isSuperAdmin())
                        ->hidden(!auth()->user()->isAdmin()),
                    Tables\Actions\RestoreBulkAction::make()
                        ->hidden(!auth()->user()->isSuperAdmin())
                        ->hidden(!auth()->user()->isAdmin()),
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
            'index' => Pages\ListLogistics::route('/'),
            // 'create' => Pages\CreateLogistic::route('/create'),
            // 'edit' => Pages\EditLogistic::route('/{record}/edit'),
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
