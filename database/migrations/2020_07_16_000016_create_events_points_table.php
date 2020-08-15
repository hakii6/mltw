<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsPointsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'events_points';

    /**
     * Run the migrations.
     * @table events_points
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('event_id');
            $table->integer('count')->nullable()->default(null);
            $table->integer('ep_1')->nullable()->default(null);
            $table->integer('ep_2')->nullable()->default(null);
            $table->integer('ep_3')->nullable()->default(null);
            $table->integer('ep_100')->nullable()->default(null);
            $table->integer('ep_2500')->nullable()->default(null);
            $table->integer('ep_5000')->nullable()->default(null);
            $table->integer('ep_10000')->nullable()->default(null);
            $table->integer('ep_25000')->nullable()->default(null);
            $table->integer('ep_50000')->nullable()->default(null);
            $table->integer('ep_100000')->nullable()->default(null);
            $table->integer('hs_1')->nullable()->default(null);
            $table->integer('hs_2')->nullable()->default(null);
            $table->integer('hs_3')->nullable()->default(null);
            $table->integer('hs_100')->nullable()->default(null);
            $table->integer('hs_2000')->nullable()->default(null);
            $table->integer('hs_5000')->nullable()->default(null);
            $table->integer('hs_10000')->nullable()->default(null);
            $table->integer('hs_20000')->nullable()->default(null);
            $table->integer('lp_1')->nullable()->default(null);
            $table->integer('lp_2')->nullable()->default(null);
            $table->integer('lp_3')->nullable()->default(null);
            $table->integer('lp_10')->nullable()->default(null);
            $table->integer('lp_50')->nullable()->default(null);
            $table->integer('lp_100')->nullable()->default(null);
            $table->integer('lp_250')->nullable()->default(null);
            $table->integer('lp_500')->nullable()->default(null);
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
