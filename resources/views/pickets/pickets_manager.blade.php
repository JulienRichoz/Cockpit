@extends('layouts.app')

@section('content')
    <div class="col-12" id="pickets_manager">
        <br><h1>Gestion des piquets</h1><br>
        <table class="table table-sm table-bordered table-hover text-center mb-0">
            <thead>
            <tr class="dashboard-blue-dark">
                <th scope="col">Id#</th>
                <th scope="col">Piquet 1</th>
                <th scope="col">Piquet 2</th>
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Del</th>
            </tr>
            </thead>
            <tbody>
                @auth
                    <tr class="editable_row">
                        <td scope="row" class="picket_id _edit_"><i class="button fas fa-plus-circle green fa-1x "></i></td>
                        <td class="picket_main _edit_"></td>
                        <td class="picket_substitute _edit_"></td>
                        <td class="picket_start_date _edit_"></td>
                        <td class="picket_end_date _edit_"></td>
                        <td class="delete_picket_cross _edit_"></td>
                    </tr>
                @endauth
            @foreach($pickets->sortByDesc('end_date') as $picket)
                <tr class="editable_row"
                    data-id="{{ $picket->id }}"
                    data-main="{{ $picket->main }}"
                    data-substitute="{{ $picket->substitute }}"
                    data-start_date="{{ $picket->start_date }}"
                    data-end_date="{{ $picket->end_date }}"
                >
                    <td  class="picket_id _edit_" scope="row">{{ $picket->id }}</td>
                    <th  class="picket_main _edit_">{{ $picket->main }}</th>
                    <td  class="picket_substitute _edit_">{{ $picket->substitute }}</td>
                    <td  class="picket_start_date _edit_">{{ \Carbon\Carbon::parse($picket->start_date)->format('d M Y - H\hi') }}</td>
                    <td  class="picket_end_date _edit_">{{ \Carbon\Carbon::parse($picket->end_date)->format('d M Y - H\hi') }}</td>
                    <td class="delete_picket_cross" data-route="{{ route('delete_picket') }}"><i class="fas fa-times text-danger"></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $pickets->links() }}
    @include('pickets._add_modal')
@endsection

@section('javascript')
        <script src="{{ asset('js/pickets_manager.js') }}" defer></script>
@endsection
