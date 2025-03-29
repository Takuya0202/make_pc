<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Part;
use Illuminate\Support\Facades\DB;

class PartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            // 商品パーツに関するサンプルシーダー(ファクトリなし)
            // 画像はpublicにあるものを参照。実際に追加するときはstorageを参照
            $parts = [
                // cpuに関する商品3つ カテゴリーidは1
                [
                    'name' => 'Core i3 14100',
                    'maker_id' => '1',
                    'category_id' => '1',
                    'price' => 20390,
                    'image' => 'images/core_i3_14100.jpg',
                    'url' => 'https://amzn.asia/d/bmMU0RC',
                    'detail' => 'Intel Core i3-14100 は、第14世代 Raptor Lake アーキテクチャを採用したエントリークラスのデスクトップ向けCPUです。4コア8スレッドを備え、最大クロックは 4.7GHz に達し、日常的な作業やライトなゲーム用途に適しています。内蔵GPUとして Intel UHD Graphics 730 を搭載し、オフィス作業や動画視聴にも十分な性能を発揮します。コストパフォーマンスに優れた選択肢として、予算を抑えたPC構築に最適です。',
                ],
                [
                    'name' => 'Core i7 14700f',
                    'maker_id' => '1',
                    'category_id' => '1',
                    'price' => 54300,
                    'image' => 'images/core_i7_14700f.jpg',
                    'url' => 'https://amzn.asia/d/6YlowDv',
                    'detail' => 'Intel Core i7-14700F は、第14世代 Raptor Lake アーキテクチャを採用した高性能デスクトップ向けプロセッサーです。8つのPコア（高性能コア）と12のEコア（高効率コア）の 20コア28スレッド構成 を持ち、最大5.4GHzの高クロック動作が可能です。内蔵GPUは非搭載（Fモデルのため）ですが、その分価格が抑えられており、専用グラフィックカードと組み合わせることで高いゲーミング性能やクリエイティブ用途に適した構成 を実現できます。高負荷な作業やマルチタスク処理を求めるユーザーに最適です。'
                ],
                [
                    'name' => 'Ryzen7 5700X',
                    'maker_id' => '2',
                    'category_id' => '1',
                    'price' => 30800,
                    'image' => 'images/Ryzen7_5700X.jpg',
                    'url' => 'https://amzn.asia/d/f19qCYn',
                    'detail' => 'AMD Ryzen 7 5700X は、Zen 3 アーキテクチャを採用した 8コア16スレッドのデスクトップ向けプロセッサー です。最大クロックは 4.6GHz に達し、ゲーミングやコンテンツ制作、動画編集などのマルチタスク環境で優れたパフォーマンスを発揮します。TDPは 65W と低めに抑えられており、発熱が少なく省電力な設計が特徴です。AM4プラットフォームに対応しており、B450やX570マザーボードと組み合わせて手頃な価格で高性能なPCを構築可能 です。コストパフォーマンスに優れたバランスの良いCPUとして、幅広い用途に適しています。'
                ]
                // gpuに関する商品
            ];

            // seederの中身を追加
            foreach ($parts as $part){
                Part::create($part);
            }
        }
    }
}
