<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { Schema::create('agendamentos', function(Blueprint $table){ $table->id(); $table->date('data'); $table->time('hora'); $table->text('descricao')->nullable(); $table->foreignId('veiculo_id')->constrained('veiculos')->cascadeOnDelete(); $table->timestamps(); }); }
 public function down(): void { Schema::dropIfExists('agendamentos'); }
};
