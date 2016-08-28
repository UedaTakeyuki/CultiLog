<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UnitTest extends TestCase
{
    /**
     * メニューの表示項目.
     *
     * @return void
     */
    public function testMenu()
    {
        $this->visit('/')
        ->see('栽培棚')->see('栽培monitor')->see('品種');
    }

    /**
     * 棚の表示項目がDBの内容と等しい.
     *
     * @return void
     */
    public function testUnit()
    {
        $units = App\Unit::all();
        foreach ($units as $unit){
            $name = $unit->name;
            $this->visit('/')
            ->see('棚'.$name)->see($name.'-1')->see($name.'-2')->see($name.'-3')->see($name.'-4')->see($name.'-5');
            $this->visit('/unit')
            ->see('棚'.$name)->see($name.'-1')->see($name.'-2')->see($name.'-3')->see($name.'-4')->see($name.'-5');
        }
    }

    /**
     * Shelf のリンク.
     *
     * @return void
     */
    public function testLinkShelf()
    {
        $units = App\Unit::all();
        foreach ($units as $unit){
            $name = $unit->name;
            $this->visit('/')
            ->click($name.'-1')->see($name.'-1');
        }
    }
}
