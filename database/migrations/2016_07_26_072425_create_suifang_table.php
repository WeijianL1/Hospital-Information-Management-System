<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuifangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suifangs', function(Blueprint $table)
    {
        $table->Integer('id');
        $table->date('suizhenriqi');
        $table->enum('shifousiwang',['是','否']);
        $table->date('siwangriqi');
        $table->enum('shifoufufa',['是','否']);
        $table->date('fufariqi');
        $table->char('fufahouzhiliao',100);
        $table->enum('shifouzhuanyi',['是','否']);
        $table->char('zybuwei',100);
        $table->date('zyri');
        $table->char('zyhzl',100);//转移后治疗
        $table->date('zyhzlriqi');//转移后治疗日期
        $table->char('zyhzljinzhan',255);//转移后治疗进展
        $table->date('ffhzlriqi');//复发后治疗日期
        $table->char('ffhzljinzhan',100);//复发后治疗进展
        $table->primary('id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suifangs');
    }
}
