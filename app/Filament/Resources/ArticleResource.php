<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * Automatycze dodanie autora artykułu
     * @param array $data
     * @return array
     */
    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        /**
         * tymczasowy log dla debugowania
         */
        info('#105 ArticleResource Mutate create called with user_id = ' . auth()->id());

        $data['user_id'] = auth()->id();
        return $data;
    }

    /**
     * Edycja autora artykułu
     */
    protected static function mutateFormDataBeforeSave(array $data): array
    {
        info('#106 ArticleResource  Mutate create called from Page with user_id = ' . auth()->id());
        $data['user_id'] = auth()->id();
        return $data;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('publication_date')
                    ->required(),
                Textarea::make('body')
                    ->rows(10)
                    ->extraAttributes(['style' => 'height: 20vh;'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Tytuł')->searchable(),
                TextColumn::make('user.name')->label('Autor'),
                TextColumn::make('publication_date')->date()->label('Data publikacji'),
            ])
            ->filters([
                /**
                 * Wyszukiwnie treści z body
                 * w Filament'cie pojawi się lejek z dodtkowymi
                 * opcjami wyszukiwania
                 */
                Tables\Filters\Filter::make('Szukaj w treści')
                    ->form([
                        Forms\Components\TextInput::make('body'),
                    ])
                    ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data) {
                        return $query
                            ->when($data['body'], fn ($q, $value) => $q->where('body', 'like', "%{$value}%"));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->authorize(fn (Article $record): bool => auth()->user()->can('update', $record)),
                Tables\Actions\DeleteAction::make()
                    ->authorize(fn (Article $record): bool => auth()->user()->can('delete', $record)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('publication_date', 'desc');
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    /**
     * eager loading relacji
     *
     * @return Builder
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }

    /**
     * Search w Filament Resource
     *
     * @return string[]
     */
    public static function getSearchColumns(): array
    {
        return ['title', 'body'];
    }
}
