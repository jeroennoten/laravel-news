<?php


use Illuminate\Contracts\View\View;

class ServiceProviderTest extends TestCase
{
    public function testViews()
    {
        $this->assertInstanceOf(View::class, view('news::index'));
    }
}