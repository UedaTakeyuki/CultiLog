<?php

use App\Plant;
use Illuminate\Database\Seeder;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->add_plant_without_kana("ルッコラ");
        $this->add_plant_without_kana("セロリ", "セルリ");
        $this->add_plant_without_kana("ミント");
        $this->add_plant_without_kana("フリルレタス");
        $this->add_plant_without_kana("シナモンバジル");
        $this->add_plant_without_kana("カモミール");
        $this->add_plant_without_kana("ペパーミント");
        $this->add_plant_without_kana("チャービル","セルフィーユ、ウイキョウゼリ");
        $this->add_plant_without_kana("リーフレタス");
        $this->add_plant("赤リーフレタス","アカリーフレタス");
        $this->add_plant("緑リーフレタス","ミドリリーフレタス");
        $this->add_plant("赤茎ホウレン草","アカクキホウレンソウ","赤軸ホウレン草");
        $this->add_plant_without_kana("ロメインレタス");
        $this->add_plant("京水菜","キョウミズナ","水菜、京菜");
        $this->add_plant("からし菜","カラシナ");
        $this->add_plant_without_kana("エンダイブ","アンディーブ、チコリ");
        $this->add_plant_without_kana("チンゲンサイ");
        $this->add_plant_without_kana("タアサイ");
        $this->add_plant_without_kana("パクチョ","パクチョイ");
        $this->add_plant("早生サラダあかり","ワセサラダアカリ");
        $this->add_plant("わさび","ワサビ");
        $this->add_plant_without_kana("ディル");
        $this->add_plant_without_kana("バジル");
        $this->add_plant_without_kana("カーボネロ","黒キャベツ");
        $this->add_plant_without_kana("ルッコラ");
        $this->add_plant_without_kana("ルッコラ");
        $this->add_plant_without_kana("ルッコラ");
        $this->add_plant_without_kana("ルッコラ");
        $this->add_plant_without_kana("ルッコラ");
        $this->add_plant_without_kana("ルッコラ");
    }
    
    public function add_plant($name, $kana, $alias=""){
        $plant = new Plant;
        $plant->name = $name;
        $plant->kana = $kana;
        $plant->alias = $alias;
        $plant->save();
    }

    public function add_plant_without_kana($name, $alias=""){
        if(is_null($alias)){
            $this->add_plant($name, $name);
        } else {
            $this->add_plant($name, $name, $alias);
        }
    }

}
