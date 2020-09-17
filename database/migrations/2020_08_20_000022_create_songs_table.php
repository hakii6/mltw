<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'songs';

    /**
     * Run the migrations.
     * @table songs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name_jp');
            $table->string('name_tw')->nullable()->default(null);
            $table->integer('EZ_LV');
            $table->integer('EZ_notes');
            $table->integer('NM_LV');
            $table->integer('NM_notes');
            $table->integer('HR2_LV');
            $table->integer('HR2_notes');
            $table->integer('HR_LV');
            $table->integer('HR_notes');
            $table->integer('EX_LV');
            $table->integer('EX_notes');
            $table->string('BPM');
            $table->time('length');
            $table->string('type');
            $table->date('date');
            $table->integer('get_song_id');
            $table->string('get_song_type');
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
