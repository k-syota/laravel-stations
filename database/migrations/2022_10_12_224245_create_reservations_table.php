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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date("screening_date")->comment("上映日");
            $table->foreignID("schedule_id")->comment("スケジュールID");
            $table->foreignId("sheet_id")->comment("シートID");
            $table->string("email")->comment("予約者メールアドレス");
            $table->string("name")->comment("予約者名");
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
        Schema::dropIfExists('reservations');
    }
};
