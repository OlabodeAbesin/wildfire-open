<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('influencerId')->nullable();
            $table->string('BrandId')->nullable();
            $table->string('returncreated_at')->nullable();
            $table->string('returnText')->nullable();
            $table->string('returnTruncated')->nullable();
            $table->string('returnHashTags')->nullable();
            $table->string('returnSymbols')->nullable();
            $table->string('returnMentionsID')->nullable();
            $table->string('returnSource')->nullable();
            $table->string('returnGeo')->nullable();
            $table->string('returnCoordinates')->nullable();
            $table->string('returnIsQuoteStatus')->nullable();
            $table->string('returnRetweetCount')->nullable();
            $table->string('returnFavoriteCount')->nullable();
            $table->string('returnFavorited')->nullable();
            $table->string('returnRetweeted')->nullable();
            $table->string('returnLang')->nullable();
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
        Schema::dropIfExists('tweets');
    }
}
