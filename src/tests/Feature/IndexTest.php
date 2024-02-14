<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\BigQuestion;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function testExample()
    {
        // ダミーデータの作成
        $question = factory(BigQuestion::class)->create();

        // デバッグステートメントを追加
        // dd($question->name);

        $response = $this->get('/');
        $response->assertStatus(200);

        $value = "東京の難読地名クイズ";
        // $name = BigQuestion::where('name', $value)->first()->name;
        $response->assertSeeText($value);
        $response->assertSee($question->name);
    }
}
