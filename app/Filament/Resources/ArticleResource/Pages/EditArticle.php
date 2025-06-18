<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Obsługa doadnie mod_user_id
     * przy edycji Filament
     *
     * @param array $data
     * @return array|mixed[]
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['mod_user_id'] = auth()->id();
        return $data;
    }
}
