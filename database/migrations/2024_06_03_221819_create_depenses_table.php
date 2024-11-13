<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    /**
     * Run the migrations.
     */
    class CreateDepensesTable extends Migration
    {
        public function up()
        {
            Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->integer('quantité');
            $table->decimal('prix_unitaire', 8, 2);
            $table->decimal('prix_total', 8, 2);
            $table->timestamps();
        });
        }
    /**
     * Reverse the migrations.
     */
        public function down(): void
        {
            Schema::dropIfExists('depenses');
        }
};
