<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instagrams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instagram_id')->unsigned();
            $table->string('access_token');
            $table->string('nickname')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('profile_picture')->nullable();
            $table->text('bio')->nullable();
            $table->text('website')->nullable();
            $table->string('media')->nullable();
            $table->string('follows')->nullable();
            $table->string('followed_by')->nullable();
            $table->foreign('influencer_id')->references('id')->on('influencers')->onDelete('cascade');
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
        Schema::dropIfExists('instagrams');
    }
}
