<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdolSongTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'idol_song';

    /**
     * Run the migrations.
     * @table idol_song
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('idol_id');
            $table->integer('song_id');
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
