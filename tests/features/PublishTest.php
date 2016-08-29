<?php

use Illuminate\Auth\GenericUser;
use JeroenNoten\LaravelNews\Models\Article;

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

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testCannotViewUnpublishedArticles()
    {
        $article = factory(Article::class)->create(['published' => false]);

        $this->visit("nieuws/$article->id");
    }
}