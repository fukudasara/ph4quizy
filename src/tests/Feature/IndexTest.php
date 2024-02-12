<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\BigQuestion;

class IndexTest extends TestCase
{

    use RefreshDatabase; // テストごとにデータベースをリフレッシュするために追加

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // BigQuestionモデルのファクトリを使ってダミーレコードを作成
        $dummyRecord = factory(BigQuestion::class)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        // $response->assertSeeText('東京の難読地名クイズ');

        // レスポンスの内容にダミーレコードのnameカラムの値が含まれているか確認
        $this->assertStringContainsString(BigQuestion::first()->name, $response->getContent());
    }
}
