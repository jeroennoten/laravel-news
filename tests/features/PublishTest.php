<?php

use Illuminate\Auth\GenericUser;
use JeroenNoten\LaravelNews\Models\Article;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublishTest extends TestCase
{
    public function testPublish()
    {
        $article = factory(Article::class)->create(['published' => false]);

        $this->actingAs(new GenericUser([]));

        $this->visit("admin/news/$article->id");
        $this->check('published');
        $this->press('Opslaan');

        $this->seeInDatabase('articles', ['id' => $article->id, 'published' => true]);
    }

    public function testCannotViewUnpublishedArticles()
    {
        $article = factory(Article::class)->create(['published' => false]);

        $passed = false;
        try {
            $this->call('get', "nieuws/$article->id");
            $this->assertResponseStatus(404);
            $passed = true;
        } catch (NotFoundHttpException $e) {
            $passed = true;
        }

        $this->assertTrue($passed);
    }

    public function testIndexDoesNotShowUnpublishedArticles()
    {
        $article = factory(Article::class)->create(['published' => false, 'title' => 'Unpublished']);

        $this->visit('nieuws');

        $this->dontSee('Unpublished');
    }
}