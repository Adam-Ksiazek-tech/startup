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
                Tables\Columns\TextColumn::make('title')->label('Tytuł'),
                Tables\Columns\TextColumn::make('addUser.name')->label('Autor'),
                Tables\Columns\TextColumn::make('modUser.name')->label('Modyfikował'),
                Tables\Columns\TextColumn::make('publication_date')->date()->label('Data publikacji'),
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
        //return parent::getEloquentQuery()->with('user');
        return parent::getEloquentQuery()->with(['addUser', 'modUser']);
    }


}
