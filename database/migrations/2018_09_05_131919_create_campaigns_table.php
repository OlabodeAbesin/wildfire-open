<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('addedBy', ['brand', 'agency'])->nullable();
            $table->string('addedByID')->nullable();
            $table->text('campaignName')->nullable();
            $table->enum('campaignType', ['cpa', 'awareness'])->nullable();
            $table->string('campaignUniqueLink')->nullable();
            $table->string('campaignCurrency')->default('USD');
            $table->string('campaignBudget')->nullable();
            $table->date('campaignStartTime')->nullable();
            $table->date('campaignEndTime')->nullable();
            $table->string('expectedReach')->nullable();
            $table->text('hashTags')->nullable();
            $table->string('result')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('optionA')->nullable();
            $table->string('optionB')->nullable();
            $table->text('optionC')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('campaigns');
    }
}
