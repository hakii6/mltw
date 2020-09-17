<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsInfoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'maps_info';

    /**
     * Run the migrations.
     * @table maps_info
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('song_id');
            $table->json('content');
            $table->integer('move')->nullable()->default(null);
            $table->float('speed_max')->nullable()->default(null);
            $table->float('speed_min')->nullable()->default(null);
            $table->integer('flick_total')->nullable()->default(null);
            $table->integer('flick_up')->nullable()->default(null);
            $table->integer('flick_left')->nullable()->default(null);
            $table->integer('flick_right')->nullable()->default(null);
            $table->integer('line')->nullable()->default(null);
            $table->integer('sliders')->nullable()->default(null);
            $table->integer('circle_small')->nullable()->default(null);
            $table->integer('circle_big')->nullable()->default(null);
            $table->integer('circle_huge')->nullable()->default(null);
            $table->integer('stream_total')->nullable()->default(null);
            $table->integer('stream_max')->nullable()->default(null);
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
