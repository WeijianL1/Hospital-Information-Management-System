<?php

use Illuminate\Database\Seeder;

class BingrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bingrens')->delete();
        for($i=0;$i<5;$i++){
        	\App\Bingren::create([
                'id'=>$i,
        		'xingming'=>'病人'.$i,
                'chushengriqi'=>rand(1900,2000).'-'.rand(1,12).'-'.rand(1,31),
        		'xingbie'=>'男',
        		'nianling'=>rand(10,100),
        		'hunyin'=>'已婚',
        		'jiguan'=>'籍贯'.$i,
        		'minzu'=>'民族'.$i,
        		'gongzuodw'=>'工作单位'.$i,
        		'zhiye'=>'职业'.$i,
        		'zhuzhi'=>'住址'.$i,
        		'ruyuanriqi'=>rand(1900,2000).'-'.rand(1,12).'-'.rand(1,31),
        		'jiluriqi'=>rand(1900,2000).'-'.rand(1,12).'-'.rand(1,31),
        		'huanzhedh'=>'电话'.$i,
        		'lianxirendh'=>'联系人电话'.$i,
        		]);
        }
    }

}
