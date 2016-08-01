<?php

use Illuminate\Database\Seeder;
use App\Shelf;
use App\Plant;
use App\Planting;

class PlantingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->add_planting("D-2","ルッコラ","2016-04-15");
        $this->add_planting("D-2","セロリ","2016-06-22");
        $this->add_planting("C-5","セロリ","2016-04-27");
        $this->add_planting("C-5","ミント","2016-04-27");
        $this->add_planting("C-5","フリルレタス","2016-04-27");
        $this->add_planting("C-5","シナモンバジル","2016-05-02");
        $this->add_planting("C-5","シナモンバジル","2016-05-02");
        $this->add_planting("C-5","ペパーミント","2016-05-25");
        $this->add_planting("H-2","チャービル","2016-04-15");
        $this->add_planting("H-2","セロリ","2016-04-15");
        $this->add_planting("H-2","ルッコラ","2016-04-15");
        $this->add_planting("H-3","リーフレタス","2016-06-01");
        $this->add_planting("H-3","フリルレタス","2016-06-01");
        $this->add_planting("H-3","赤リーフレタス","2016-06-01");
        $this->add_planting("H-3","セロリ","2016-06-01");
        $this->add_planting("H-3","ルッコラ","2016-06-01");
        $this->add_planting("H-3","赤茎ホウレン草","2016-06-01");
        $this->add_planting("H-3","ロメインレタス","2016-06-01");
        $this->add_planting("H-3","京水菜","2016-06-01");
        $this->add_planting("H-1","からし菜","2016-05-25");
        $this->add_planting("H-1","京水菜","2016-05-25");
        $this->add_planting("H-1","エンダイブ","2016-05-25");
        $this->add_planting("H-1","チャービル","2016-05-25");
        $this->add_planting("H-1","チンゲンサイ","2016-05-25");
        $this->add_planting("H-1","タアサイ","2016-05-25");
        $this->add_planting("H-1","パクチョ","2016-05-25");
        $this->add_planting("H-1","早生サラダあかり","2016-05-25");
        $this->add_planting("D-1","赤リーフレタス","2016-07-01");
        $this->add_planting("D-1","緑リーフレタス","2016-07-01");
        $this->add_planting("D-1","ロメインレタス","2016-07-01");
        $this->add_planting("D-1","フリルレタス","2016-07-01");
        $this->add_planting("D-1","ルッコラ","2016-07-01");
        $this->add_planting("D-1","からし菜","2016-07-02");
        $this->add_planting("D-1","わさび","2016-07-02");
        $this->add_planting("D-1","セロリ","2016-07-02");
        $this->add_planting("D-5","赤茎ホウレン草","2016-05-25");
        $this->add_planting("D-5","ディル","2016-05-25");
        $this->add_planting("D-5","バジル","2016-05-25");
        $this->add_planting("D-5","チャービル","2016-05-25");
        $this->add_planting("D-5","ロメインレタス","2016-05-25");
        $this->add_planting("D-5","ルッコラ","2016-05-25");
        $this->add_planting("D-5","フリルレタス","2016-05-25");
        $this->add_planting("D-3","カーボネロ","2016-03-30");
        $this->add_planting("D-3","ランドクレス","2016-03-30");
        $this->add_planting("D-3","からし菜","2016-04-20");
        $this->add_planting("D-3","チャービル","2016-04-20");
        $this->add_planting("D-3","ロメインレタス","2016-04-20");
        $this->add_planting("D-3","ルッコラ","2016-04-20");
        $this->add_planting("B-5","スイスチャード","2016-07-01");
        $this->add_planting("F-1","プリムラ","2016-04-06");
        $this->add_planting("C-2","タイム","2016-01-27");
        $this->add_planting("B-1","スイスチャード","2016-05-25");
        $this->add_planting("B-2","スイスチャード","2016-06-15");
        $this->add_planting("B-3","スイスチャード","2016-05-30");
        $this->add_planting("B-4","スイスチャード","2016-05-30");
        $this->add_planting("B-4","エンダイブ","2016-06-15");
        $this->add_planting("C-3","高菜","2016-06-01");
        $this->add_planting("C-3","ロメインレタス","2016-06-01");
        $this->add_planting("C-3","ルッコラ","2016-06-01");
        $this->add_planting("C-3","ルッコラ","2016-06-01");
        $this->add_planting("C-3","スティックセニョール","2016-06-01");
        $this->add_planting("F-2","パクチー","2016-03-23");
        $this->add_planting("G-4","バジル","2015-11-13");
        $this->add_planting("H-5","パクチー","2016-03-19");
        $this->add_planting("I-1","セロリ","2016-05-13");
        $this->add_planting("I-1","エンダイブ","2016-05-11");
        $this->add_planting("I-1","チャービル","2016-05-11");
        $this->add_planting("I-1","からし菜","2016-05-11");
        $this->add_planting("I-1","ディル","2016-05-11");
        $this->add_planting("I-1","リーフレタス","2016-05-11");
        $this->add_planting("I-1","フリルレタス","2016-05-11");
        $this->add_planting("I-2","フリルレタス","2016-06-15");
        $this->add_planting("I-2","赤リーフレタス","2016-06-15");
        $this->add_planting("I-2","ロメインレタス","2016-06-15");
        $this->add_planting("I-2","からし菜","2016-06-15");
        $this->add_planting("I-2","わさび","2016-06-15");
        $this->add_planting("I-2","ルッコラ","2016-06-15");
        $this->add_planting("I-3","レモンバーム","2015-12-16");
        $this->add_planting("I-5","京水菜","2016-04-27");
        $this->add_planting("I-5","わさび","2016-04-27");
        $this->add_planting("I-5","ロメインレタス","2016-05-02");
        $this->add_planting("I-5","ルッコラ","2016-05-02");
        $this->add_planting("I-5","赤茎ホウレン草","2016-05-02");
        $this->add_planting("A-1","トレビーゾ","2016-04-20");
        $this->add_planting("A-1","イタリアンパセリ","2016-04-20");
        $this->add_planting("A-3","スペアミント","2016-04-20");
        $this->add_planting("A-5","スイスチャード","2016-06-10");
        $this->add_planting("C-4","タイム","2016-06-15");
        $this->add_planting("C-4","ミント","2016-06-15");
        $this->add_planting("C-4","オレガノ","2016-06-15");
        $this->add_planting("C-4","カモミール","2016-06-15");
    }
    
    public function add_planting($shelf, $plant, $planted_at){
        $planting = new Planting;
        $planting->planted_at = $planted_at;
        $planting->shelf_id = Shelf::where('name', $shelf)->first()->id;
        $planting->plant_id = Plant::where('name', $plant)->first()->id;
        $planting->save();
    }
}
