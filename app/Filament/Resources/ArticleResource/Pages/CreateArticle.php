<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $userId = auth()->id();
        info('#103 CreateArticle Mutate create called from Page with user_id = ' . $userId);

        $data['add_user_id'] = auth()->id();
        $data['mod_user_id'] = null;
        return $data;
    }

    /**
     * Dodanie mutateFormDataBeforeSave()
     * aby zapisywała user_id
     *
     * @param array $data
     * @return array
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        info('#104 CreateArticle Mutate create called from Page with user_id = ' . auth()->id());
        $data['user_id'] = auth()->id();
        return $data;
    }

}
