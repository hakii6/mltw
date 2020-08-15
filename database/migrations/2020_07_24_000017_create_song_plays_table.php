<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongPlaysTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'song_plays';

    /**
     * Run the migrations.
     * @table song_plays
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->integer('song_id');
            $table->string('video');
            $table->string('diff')->default('MM');
            $table->float('acc')->default('100');
            $table->string('author');
            $table->string('channel');
            $table->string('type');
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
