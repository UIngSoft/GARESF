<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\cliente;
use App\Http\Requests\ClienteFormRequest;
use App\Http\Requests\BuscarFormRequest;

class ClienteController extends Controller
{

	public function index()
	{
		$clientes = cliente::all();
		return view('cliente.index', compact('clientes'));
	}

	public function create()
	{
		return view('cliente.create');
	}

	public function edit($cedula)
	{
		$cliente = cliente::whereCedula($cedula)->firstOrFail();
		return view('cliente.edit', compact('cliente'));
	}


	public function store(clienteFormRequest $request)
	{
		$slug=uniqid();

		$cliente= new cliente(array(
			'cedula' => $request->get('cedula'),
			'primer_nombre' => $request->get('primer_nombre'),
			'segundo_nombre' => $request->get('segundo_nombre'),
			'primer_apellido' => $request->get('primer_apellido'),
			'segundo_apellido' => $request->get('segundo_apellido'),
			'fechanacimiento' => $request->get('fechanacimiento'),
			'celular' => $request->get('celular'),
			'telefono' => $request->get('telefono'),
			'correo' => $request->get('correo'),
			'slug' => $slug
		));

		$cliente->save();

		return redirect('/cliente')-> with('status', 'El cliente ha sido registrado correctamente');
	}

	public function show($cedula)
	{
		$cliente = cliente::wherecedula($cedula)->firstOrFail();
		return view('cliente.show', compact('cliente'));
	}

	public function destroy($cedula)
	{
		$cliente = cliente::wherecedula($cedula);
		$cliente ->delete();
		return redirect('/listac')-> with('status', 'el cliente: '.$cedula.' ha sido eliminado');
	}


	public function update($cedula, ClienteFormRequest $request)
	{
		$cliente = cliente::wherecedula($cedula)->firstOrFail();
		$cliente->primer_nombre = $request->get('primer_nombre');
		$cliente->segundo_nombre = $request->get('segundo_nombre');
		$cliente->primer_apellido = $request->get('primer_apellido');
		$cliente->segundo_apellido = $request->get('segundo_apellido');
		$cliente->fechanacimiento = $request->get('fechanacimiento');
		$cliente->celular = $request->get('celular');
		$cliente->telefono = $request->get('telefono');
		$cliente->correo = $request->get('correo');

		$cliente->save();

		return redirect(action('ClienteController@index', $cliente->cedula))-> with('status', 'el cliente: '.$cedula.' ha sido actualizado');
	}

	public function inicioAdmin()
  {
    return view('cliente.blancoc');
  }

	public function buscar(BuscarFormRequest $request)
	{
		$clientesb= cliente::where('cedula', $request->get('buscar'))->get();
		return view('cliente.buscar', compact('clientesb'));
	}
}
