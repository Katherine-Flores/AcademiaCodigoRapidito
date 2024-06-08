<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Alumno</th>
            <th>Asignacion</th>
            <th>Fecha</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inscripciones as $inscripcion)
            <tr>
                <td>{{ $inscripcion->Id_Inscripcion }}</td>
                <td>{{ $inscripcion->Codigo_Alumno }}</td>
                <td>{{ $inscripcion->Id_Asignacion }}</td>
                <td>{{ $inscripcion->Fecha_Inscripcion }}</td>
                <td>{{ $inscripcion->Monto }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
