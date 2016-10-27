<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBingrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up(){
    if(!Schema::hasTable('bingrens')){
        Schema::create('bingrens', function(Blueprint $table){
        $table->Integer('id');
        $table->char('xingming',20);
        $table->date('chushengriqi');
        $table->char('xingbie',2);
        $table->tinyInteger('nianling');
        $table->enum('hunyin',['已婚','未婚','丧偶','离异']);
        $table->char('jiguan',20);
        $table->char('minzu',10);
        $table->char('gongzuodw',100);
        $table->char('zhiye',50);
        $table->char('zhuzhi',150);
        $table->date('ruyuanriqi');
        $table->date('jiluriqi');
        $table->char('huanzhedh',15);
        $table->char('lianxirendh',15);
        $table->timestamps();
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
        Schema::drop('bingrens');
    }
}
