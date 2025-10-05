<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            // Solo agrega la columna si NO existe
            if (!Schema::hasColumn('ventas', 'vendedor')) {
                $table->string('vendedor', 100)->after('fecha_venta')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            // Solo elimina la columna si SÍ existe
            if (Schema::hasColumn('ventas', 'vendedor')) {
                $table->dropColumn('vendedor');
            }
        });
    }
};
