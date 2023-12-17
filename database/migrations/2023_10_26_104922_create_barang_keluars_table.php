<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {

            $table->id(); // Kolom id dengan tipe unsigned bigint, AUTO_INCREMENT
            $table->text('nmcsbk'); // Kolom nmcsbk dengan tipe text
            $table->string('jnsbk', 25); // Kolom jnsbk dengan tipe varchar(10)
            $table->date('tglbk'); // Kolom tglbk dengan tipe date
            $table->text('memobk'); // Kolom memobk dengan tipe text
            $table->double('jmbk'); // Kolom jmbk dengan tipe double
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluars');
    }
}
