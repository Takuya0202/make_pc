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
                    'maker_id' => 1,
                    'category_id' => 1,
                    'price' => 20390,
                    'image' => 'images/core_i3_14100.jpg',
                    'url' => 'https://amzn.asia/d/bmMU0RC',
                    'detail' => 'Intel Core i3-14100 は、第14世代 Raptor Lake アーキテクチャを採用したエントリークラスのデスクトップ向けCPUです。4コア8スレッドを備え、最大クロックは 4.7GHz に達し、日常的な作業やライトなゲーム用途に適しています。内蔵GPUとして Intel UHD Graphics 730 を搭載し、オフィス作業や動画視聴にも十分な性能を発揮します。コストパフォーマンスに優れた選択肢として、予算を抑えたPC構築に最適です。',
                ],
                [
                    'name' => 'Core i7 14700f',
                    'maker_id' => 1,
                    'category_id' => 1,
                    'price' => 54300,
                    'image' => 'images/core_i7_14700f.jpg',
                    'url' => 'https://amzn.asia/d/6YlowDv',
                    'detail' => 'Intel Core i7-14700F は、第14世代 Raptor Lake アーキテクチャを採用した高性能デスクトップ向けプロセッサーです。8つのPコア（高性能コア）と12のEコア（高効率コア）の 20コア28スレッド構成 を持ち、最大5.4GHzの高クロック動作が可能です。内蔵GPUは非搭載（Fモデルのため）ですが、その分価格が抑えられており、専用グラフィックカードと組み合わせることで高いゲーミング性能やクリエイティブ用途に適した構成 を実現できます。高負荷な作業やマルチタスク処理を求めるユーザーに最適です。'
                ],
                [
                    'name' => 'Ryzen7 5700X',
                    'maker_id' => 2,
                    'category_id' => 1,
                    'price' => 30800,
                    'image' => 'images/Ryzen7_5700X.jpg',
                    'url' => 'https://amzn.asia/d/f19qCYn',
                    'detail' => 'AMD Ryzen 7 5700X は、Zen 3 アーキテクチャを採用した 8コア16スレッドのデスクトップ向けプロセッサー です。最大クロックは 4.6GHz に達し、ゲーミングやコンテンツ制作、動画編集などのマルチタスク環境で優れたパフォーマンスを発揮します。TDPは 65W と低めに抑えられており、発熱が少なく省電力な設計が特徴です。AM4プラットフォームに対応しており、B450やX570マザーボードと組み合わせて手頃な価格で高性能なPCを構築可能 です。コストパフォーマンスに優れたバランスの良いCPUとして、幅広い用途に適しています。'
                ],
                // gpuに関する商品 カテゴリーは2番
                [
                    'name' => 'RTX4060',
                    'maker_id' => 3,
                    'category_id' => 3,
                    'price' => 56300,
                    'image' => 'images/RTX_4060.jpg',
                    'url' => 'https://amzn.asia/d/dh6QQwc',
                    'detail' => 'NVIDIA GeForce RTX 4060 は、Ada Lovelace アーキテクチャを採用したミドルクラス向けグラフィックボードです。DLSS 3 に対応し、1080p ゲーミング環境で高いフレームレートを実現できます。レイトレーシング性能も向上しており、最新タイトルでもリアルな映像表現を楽しめます。消費電力が抑えられており、省電力なゲーミング PC 構築にも適しています。',
                ],
                [
                    'name' => 'RTX5070',
                    'maker_id' => 3,
                    'category_id' => 2,
                    'price' => 144000,
                    'image' => 'images/RTX_5070.jpg',
                    'url' => 'https://amzn.asia/d/buouXs2',
                    'detail' => 'NVIDIA GeForce RTX 5070 は、次世代 Blackwell アーキテクチャを採用したミドルハイレンジのグラフィックボードです。CUDAコアとメモリ帯域幅の強化により、前世代から更なるパフォーマンス向上を実現。DLSS 4 に対応し、AI を活用したフレーム生成技術で、高解像度でも滑らかなゲームプレイが可能です。1440p や 4K 環境でのゲーミングや動画編集にも適しており、高い汎用性を備えています。',
                ],
                [
                    'name' => 'RX7800XT',
                    'maker_id' => 4,
                    'category_id' => 2,
                    'price' => 85000,
                    'image' => 'images/RX_7800_XT.jpg',
                    'url' => 'https://amzn.asia/d/4EqmtYx',
                    'detail' => 'AMD Radeon RX 7800 XT は、RDNA 3 アーキテクチャを採用した高性能グラフィックボードです。16GB の GDDR6 メモリを搭載し、1440p 以上の高解像度ゲーミングに最適なパフォーマンスを提供します。FSR（FidelityFX Super Resolution）技術によるアップスケーリング機能により、パフォーマンスと画質のバランスを最適化可能。クリエイティブ用途にも対応し、動画編集や 3D レンダリング作業を快適にこなせます。'
                ]
            ];

            // seederの中身を追加
            foreach ($parts as $part){
                Part::create($part);
            }
        }
    }
}
