<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("imagen")->nullable();
            $table->text("descripcion")->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->foreignId('price_id')->nullable()->constrained()->onDelete('CASCADE');
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
        Schema::dropIfExists('products');
    }
}
