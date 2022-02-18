<?php

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tag', function(Blueprint $table) {
            $table->foreignId('product_id');
            $table->foreignId('tag_id');
            $table->foreign('product_id', 'product_id')->references('id')->on('product');
            $table->foreign('tag_id', 'tag_id')->references('id')->on('tag');
            $table->primary(['product_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
};
