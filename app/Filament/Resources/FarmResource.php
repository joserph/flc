<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FarmResource\Pages;
use App\Filament\Resources\FarmResource\RelationManagers;
use App\Models\Farm;
use App\Models\User;
use App\Services\FarmForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class FarmResource extends Resource
{
    protected static ?string $model = Farm::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $modelLabel = 'Finca';

    protected static ?string $pluralLabel = 'Fincas';

    public static function getBreadcrumb(): string
    {
        return '';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(FarmForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tradename')
                    ->sortable()
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->label('Nombre Comercial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ruc')
                    ->sortable()
                    ->label('RUC')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable()
                    ->label('Telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->extraAttributes(['class' => 'capitalize']),
                // Tables\Columns\TextColumn::make('status')
                //     ->sortable()
                //     ->label('Estatus')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('cell_phone')
                    ->sortable()
                    ->label('Celular')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->label('Direccion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->label('Correo')
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
                Tables\Columns\TextColumn::make('agroquality_code')
                    ->sortable()
                    ->label('Codigo Agricultura')
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
                    ->successNotificationTitle('Finca actualizada con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['name'] = Str::of($data['name'])->upper();
                        $data['tradename'] = Str::of($data['tradename'])->upper();
                        $data['address'] = Str::of($data['address'])->apa();
                        $data['state'] = Str::of($data['state'])->upper();
                        $data['city'] = Str::of($data['city'])->upper();
                        $data['agroquality_code'] = Str::of($data['agroquality_code'])->upper();
                        
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
            'index' => Pages\ListFarms::route('/'),
            // 'create' => Pages\CreateFarm::route('/create'),
            // 'edit' => Pages\EditFarm::route('/{record}/edit'),
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
