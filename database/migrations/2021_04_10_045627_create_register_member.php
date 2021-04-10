<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_reg', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('division_id');
            $table->string('email');
            $table->string('name');
            $table->string('class');
            $table->string('majors');
            $table->string('position');
            $table->string('status')->default(0);
            $table->string('image')->nullable();
            $table->date('entry_year')->nullable();
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
        Schema::dropIfExists('member_reg');
    }
}
