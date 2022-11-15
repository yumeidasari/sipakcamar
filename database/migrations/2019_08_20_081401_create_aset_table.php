<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('kondisi', ["BAIK", "RUSAK"]);
            $table->enum('jenis', ["TETAP", "BERGERAK"]);
            $table->integer('kategori_id')->unsigned();
            $table->string('nama_aset', 255);
            $table->string('kode',255);
            $table->integer('satker_id')->unsigned();
            $table->integer('nilai_perolehan');
            $table->timestamp('tgl_terima');
            $table->text('keterangan');
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
        Schema::dropIfExists('aset');
    }
}
