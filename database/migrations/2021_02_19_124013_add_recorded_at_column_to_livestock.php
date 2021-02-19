<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRecordedAtColumnToLivestock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livestock', function (Blueprint $table) {
            $table->date('recorded_at')->default(DB::raw('current_date'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livestock', function (Blueprint $table) {
            $table->dropColumn('recorded_at');
        });
    }
}
