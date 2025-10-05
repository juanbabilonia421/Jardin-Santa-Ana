<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index(Request $request)
    {
        $query = Venta::query();

        // Filtros
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_venta', [$request->fecha_inicio, $request->fecha_fin]);
        }
        if ($request->filled('vendedor')) {
            $query->where('vendedor', 'like', '%' . $request->vendedor . '%');
        }

        $ventas = $query->orderBy('fecha_venta', 'desc')->paginate(10);
        return view('admin.ventas.index', compact('ventas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required|string|max:100',
            'categoria' => 'required|in:Uniformes,Útiles Escolares',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'fecha_venta' => 'required|date',
            'vendedor' => 'required|string|max:100',
        ]);

        $total = $request->cantidad * $request->precio_unitario;

        Venta::create([
            'producto' => $request->producto,
            'categoria' => $request->categoria,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'total' => $total,
            'fecha_venta' => $request->fecha_venta,
            'vendedor' => $request->vendedor,
        ]);

        return redirect()
            ->route('admin.ventas.index', $request->except('_token')) // Mantiene los filtros
            ->with('success', '✅ Venta registrada exitosamente.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()
            ->route('admin.ventas.index')
            ->with('success', '🗑️ Venta eliminada correctamente.');
    }
}
