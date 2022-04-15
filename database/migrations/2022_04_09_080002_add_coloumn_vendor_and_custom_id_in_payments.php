<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColoumnVendorAndCustomIdInPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned()->nullable()->after('note');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete("cascade");
            $table->bigInteger('vendor_id')->unsigned()->nullable()->after('customer_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
