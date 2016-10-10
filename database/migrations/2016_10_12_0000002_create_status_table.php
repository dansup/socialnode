<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->text('content');
            $table->text('rendered');
            $table->bigInteger('reply_to')->unsigned()->nullable();
            $table->boolean('is_local')->default(true);
            $table->string('source')->default('web');
            $table->bigInteger('conversation')->unsigned()->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lon', 10, 7)->nullable();
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('location_ns')->unsigned()->nullable();
            $table->bigInteger('repeat_of')->unsigned()->nullable();
            $table->string('object_type')->nullable();
            $table->string('verb')->nullable();
            $table->string('scope')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('status');
    }
}
