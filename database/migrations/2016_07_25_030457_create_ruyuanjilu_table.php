<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuyuanjiluTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    if(!Schema::hasTable('ruyuanjilus')){
    {
       Schema::create('ruyuanjilus', function(Blueprint $table)
    {
        $table->Integer('id');
        $table->char('zhusu',100);
        $table->Integer('chixushijian');
        $table->char('jiwangshi',100);
        $table->char('gerenshi',10);
        $table->Integer('xiyan');
        $table->enum('hunyin',['已婚','未婚','丧偶','离异']);
        $table->char('jiazushi',100);
        $table->enum('suogushanglbj',['有','无']);
        $table->enum('chuzhuangzhi',['有','无']);
        $table->enum('xiazhifuzhong',['有','无']);
        $table->char('qita',255);
        $table->primary('id');
    });
    }
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ruyuanjilus');
    }
}
