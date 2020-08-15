<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cards';

    /**
     * Run the migrations.
     * @table cards
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idol_id');
            $table->string('name_jp');
            $table->string('name_tw');
            $table->string('rarity');
            $table->integer('total');
            $table->integer('vocal');
            $table->integer('dance');
            $table->integer('visual');
            $table->integer('center_skill_id');
            $table->string('skill');
            $table->integer('skill_type_id');
            $table->string('date');
            $table->string('limited');
            $table->tinyInteger('master')->default('0');
            $table->integer('get_card_id');
            $table->string('get_card_type');
            $table->integer('complete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
