<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('contacts', function (Blueprint $table) {
         $table->increments('id');
         $table->string('username');
         $table->string('first_name');
         $table->string('last_name');
         $table->string('gender');
         $table->string('password');
         $table->string('status');
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
      Schema::dropIfExists('contacts');
   }
}
