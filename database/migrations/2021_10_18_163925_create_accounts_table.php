<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string("name");
            $table->string("account_title")->nullable();
            $table->string("type");
            $table->string("account_number")->nullable();
            $table->string("bank_name")->nullable();
            $table->date("as_off_date")->nullable();
            $table->integer("opening_balance")->default(0);
            $table->integer("balance")->default(0);

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('admins');

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
        Schema::dropIfExists('accounts');
    }
}
