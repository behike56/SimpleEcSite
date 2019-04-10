<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
	    $table->string('items_name',20);
	    $table->string('flowering_time',40);
	    $table->string('full_length',10);
	    $table->string('descriptions',500);
	    $table->string('items_image',30)->nullable();
	    $table->unsignedTinyInteger('stock');
	    $table->unsignedTinyInteger('price');
	    $table->timestamp('created_time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_time')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
