<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreMoneda');
            $table->char('simboloMoneda', 5);
            $table->string('paisMoneda');
            $table->decimal('valorMoneda', 5, 2);
            $table->date('fechaMoneda')->nullable();
            
            $table->timestamps();
            
            $table->unique(['nombreMoneda', 'paisMoneda']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moneda');
    }
}
