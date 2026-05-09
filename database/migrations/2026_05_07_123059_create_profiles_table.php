<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        // Relasi ke User
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // Data Jurnalis
        $table->string('jurnalis_id')->unique(); // Generate Otomatis (ex: JRN-001)
        $table->string('photo')->nullable();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('pob'); // Place of Birth
        $table->date('dob');   // Date of Birth
        $table->string('title_degree')->nullable(); // Gelar Pendidikan
        $table->enum('education_level', ['SMA', 'S1', 'S2', 'S3']);
        $table->text('address');
        $table->enum('gender', ['Laki-laki', 'Perempuan', 'Tidak ingin menyebutkan']);
        $table->string('active_email');
        $table->text('bio'); // Ceritakan diri anda

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
