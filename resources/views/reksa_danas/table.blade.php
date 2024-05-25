<div class="table-responsive">
    <table class="table" id="reksaDanas-table">
        <thead>
            <tr>
                <th>Namard</th>
                <th>Jenis</th>
                <th>Nav</th>
                <th>Aum</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reksaDanas as $reksaDana)
                <tr>
                    <td>{{ $reksaDana->NamaRD }}</td>
                    <td>{{ $reksaDana->Jenis }}</td>
                    <td>{{ $reksaDana->NAV }}</td>
                    <td>{{ $reksaDana->AUM }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['reksaDanas.destroy', $reksaDana->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('reksaDanas.show', [$reksaDana->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('reksaDanas.edit', [$reksaDana->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
