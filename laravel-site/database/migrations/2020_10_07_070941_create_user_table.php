<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table -> bigIncrements('id');
            // 角色id
<<<<<<< HEAD
<<<<<<< HEAD
            $table -> unsignedInteger('role_id') -> default(4);
=======
            $table -> unsignedInteger('role_id') -> default(0);
>>>>>>> d153a90 (1st_20210809)
=======
            $table -> unsignedInteger('role_id') -> default(0);
>>>>>>> a47c8a488ba4caec60b718ec1d300eaef52ebb2e
            $table -> string('username',20) -> notNull();
            $table -> string('password',255) -> notNull();
            $table -> string('email',50) -> default('');
            $table -> string('mobile',16) -> default('');
            $table -> enum('sex',[1,2,3]);
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
