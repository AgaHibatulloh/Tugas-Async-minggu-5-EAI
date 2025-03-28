<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->float('temperature');
            $table->float('feels_like');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->float('wind_speed');
            $table->integer('wind_deg');
            $table->integer('clouds');
            $table->integer('visibility');
            $table->string('weather');
            $table->string('icon');
            $table->string('country');
            $table->time('sunrise');
            $table->time('sunset');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weathers');
    }
};
