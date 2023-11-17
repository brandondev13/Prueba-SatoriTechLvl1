@extends('layouts.app')

@section('content')
    <h1>Personajes Guardados</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Species</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($personajes as $personaje)
                <tr>
                    <td>{{ $personaje->name }}</td>
                    <td>{{ $personaje->status }}</td>
                    <td>{{ $personaje->species }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="no-characters">No hay personajes guardados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
