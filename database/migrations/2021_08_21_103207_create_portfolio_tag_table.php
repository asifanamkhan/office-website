<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id')->index();
            $table->unsignedBigInteger('tag_id')->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('portfolio_tag', function(Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')
                  ->on('portfolios')
                  ->onDelete('cascade');
            $table->foreign('tag_id')->references('id')
                    ->on('tags')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop foreign keys
        Schema::table('portfolio_tag', function ($table) {
            $table->dropForeign(['portfolio_id']);
            $table->dropForeign(['tag_id']);
        });
        Schema::dropIfExists('portfolio_tag');
    }
}
