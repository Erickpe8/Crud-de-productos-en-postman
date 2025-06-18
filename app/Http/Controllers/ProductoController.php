<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // FUNCIÓN: obtener todos los productos
    // ENTRA: nada
    // SALE: lista de productos
    public function index()
    {
        return Producto::all();
    }
    
    // FUNCIÓN: validar y guardar un nuevo producto
    // ENTRA: nombre, precio y descripción del producto (por formulario)
    // SALE: producto creado
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        return Producto::create($request->all());
    }
    
    // FUNCIÓN: buscar un producto específico
    // ENTRA: id del producto
    // SALE: datos del producto
    public function show($id)
    {
        return Producto::findOrFail($id);
    }
    
    // FUNCIÓN: actualizar producto existente
    // ENTRA: id del producto + datos nuevos
    // SALE: producto actualizado
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return $producto;
    }
    
    // FUNCIÓN: eliminar producto
    // ENTRA: id del producto
    // SALE: mensaje de confirmación
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(['mensaje' => 'Producto eliminado correctamente']);
    }
}
