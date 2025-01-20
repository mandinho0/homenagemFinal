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
        Schema::table('plans', function (Blueprint $table) {
            $table->decimal('annual_fee', 10, 2)->default(0)->after('final_value')->comment('Valor da taxa anual');
            $table->boolean('annual_fee_paid')->default(false)->after('annual_fee')->comment('Se a taxa anual foi paga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn(['annual_fee', 'annual_fee_paid']);
        });
    }
};
