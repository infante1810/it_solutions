<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            //$table->string('location');
            $table->decimal('total_cost', 12, 2)->default(0.00);
            //$table->integer('views_counter')->default(0);
            $table->decimal('user_id', 12, 0)->default(0);
            //$table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }
    /* public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('description')->nullable();
            $table->string('initiated_by')->nullable();
            $table->date('start_date');
            $table->date('end_date');

            $table->foreignId('status_id')->constrained();
            $table->foreignId('type_contract_id')->constrained();
            
            $table->timestamps();
        });
    } */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
