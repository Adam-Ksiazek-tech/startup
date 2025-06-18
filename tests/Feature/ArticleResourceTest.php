<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use App\Filament\Resources\ArticleResource;


class ArticleResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }

    public function test_create_article_page_is_accessible()
    {
        $this->get(ArticleResource::getUrl('create'))
            ->assertSuccessful();
    }

    public function test_edit_article_form_submission()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test(\App\Filament\Resources\ArticleResource\Pages\EditArticle::class, [
                'record' => $article->getRouteKey(),
            ])
            ->assertFormExists()
            ->fillForm([
                'title' => 'Zmieniony tytuł',
                'body' => 'Zmieniona treść',
                'publication_date' => now()->toDateString(),
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => 'Zmieniony tytuł',
        ]);
    }

    public function getFormStatePath(): string
    {
        return 'data';
    }



    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
