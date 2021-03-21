<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profile', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->char('telepon');
            $table->string('status');
            $table->string('thumbnail');
            $table->text('bio');
            $table->string('facebook_name');
            $table->string('facebook_url');
            $table->string('instagram_name');
            $table->string('instagram_url');
            $table->string('linkedin_name');
            $table->string('linkedin_url');
            $table->string('twitter_name');
            $table->string('twitter_url');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_profile');
    }
}
