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
            //este softDeletes() se usa para borrar con seguridad un campo en caso de requerirlo volverlo a recuperar desde 
            //el admin de bd.
            $table->softDeletes();
            $table->integer('status');
            $table->string('name');
            $table->string('slug');
            $table->integer('category_id');
            $table->string('image');
            $table->decimal('price',11,2);
            $table->integer('in_discount');
            $table->integer('discount');
            $table->text('content');
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
