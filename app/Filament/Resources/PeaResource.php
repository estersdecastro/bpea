<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeaResource\Pages;
use App\Filament\Resources\PeaResource\RelationManagers;
use App\Models\Pea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PeaResource extends Resource
{
    protected static ?string $model = Pea::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Consulta';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->label('Categoria')
                    ->options(
                        \App\Models\Category::all()->pluck('name', 'id')->toArray()
                    ),
                Forms\Components\TextInput::make('year')
                    ->label('Ano')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y')),
                Forms\Components\Select::make('format')
                    ->label('Formato')
                    ->options([
                        'Físico' => 'Físico',
                        'Digital' => 'Digital',
                        'Outro' => 'Outro',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('keyword')
                    ->label('Palavra-chave'),
                Forms\Components\Select::make('type')
                    ->label('Tipo')
                    ->options([
                        'Documento' => 'Documento',
                        'Vídeo' => 'Vídeo',
                        'Áudio' => 'Áudio',
                        'Imagem' => 'Imagem',
                        'Outro' => 'Outro',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('location')
                    ->disk('local')
                    ->directory('peas')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->label('Localização'),
                Forms\Components\Select::make('use')
                    ->label('Uso')
                    ->options([
                        'Individual' => 'Individual',
                        'Grupo' => 'Grupo',
                    ]),
                Forms\Components\TextInput::make('original_source')
                    ->label('Fonte Original'),
                Forms\Components\Textarea::make('description')
                    ->label('Descrição'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoria'),
                Tables\Columns\TextColumn::make('year')
                    ->label('Ano'),
                Tables\Columns\TextColumn::make('format')
                    ->label('Formato'),
                Tables\Columns\TextColumn::make('keyword')
                    ->label('Palavra-chave'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo'),
                Tables\Columns\TextColumn::make('use')
                    ->label('Uso'),
                Tables\Columns\TextColumn::make('original_source')
                    ->label('Fonte Original'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descrição'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Àrea de Conhecimento')
                    ->options(
                        \App\Models\Category::all()->pluck('name', 'id')->toArray()
                    ),

                // Text input that filters in title, keyword, original_source, and columns

                Tables\Filters\Filter::make('search')
                    ->form([
                        Forms\Components\TextInput::make('título')
                            ->placeholder('Buscar'),
                    ])
                    ->query(function (Builder $query, $data) {
                        if (empty($data['search'])) {
                            return;
                        }
                        $query->where('title', 'like', "%{$data["search"]}%")
                            ->orWhere('keyword', 'like', "%{$data["search"]}%")
                            ->orWhere('original_source', 'like', "%{$data["search"]}%");
                    })

                ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),


                // download action
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->action(function ($record) {
                        $file = Storage::disk('local')->get($record->location);
                        return response()
                            ->streamDownload(function () use ($file) {
                                echo $file;
                            }, $record->title . '.' . pathinfo($record->location, PATHINFO_EXTENSION));
                    })
                    ->visible(function ($record) {
                        return $record->location !== null;
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
            'index' => Pages\ListPeas::route('/'),
            'create' => Pages\CreatePea::route('/create'),
            'edit' => Pages\EditPea::route('/{record}/edit'),
        ];
    }
}
