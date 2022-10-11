<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id()->comment("ID");
            $table->foreignId("movie_id")->constrained();
            $table->time("start_time")->comment("上映開始時間");
            $table->time("end_time")->comment("上映終了時間");
            // $table->timestamps();
            $table->timestamp("created_at")->comment("作成日時");
            $table->timestamp("updated_at")->comment("更新日時");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
