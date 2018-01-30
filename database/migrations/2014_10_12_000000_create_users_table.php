<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ktp_id')->unique()->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('pin_bb')->nullable();
            $table->text('notes')->nullable();
            $table->string('photo')->nullable();
            $table->string('fullname');
            $table->text('address')->nullable();
            $table->enum('sex', ['L', 'P'])->nullable();
            $table->string('zipcode')->nullable();
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('website')->nullable();
            $table->string('status')->nullable();
            $table->string('hobby')->nullable();
            $table->string('reason')->nullable();
            $table->integer('role_id')->foreign('role_id')->references('id')->on('roles')->default(0);
            $table->integer('branch_id')->foreign('branch_id')->references('id')->on('branches')->default(0);
            $table->integer('tenant_id')->foreign('tenant_id')->references('id')->on('tenants')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
