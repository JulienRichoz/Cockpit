<div class="col-6" id="weekly_activity">
    <table class="table table-sm table-bordered table-hover text-center mb-0">
        <thead>
        <tr class="dashboard-green">
            @auth
                <th></th>
            @endauth
            <th scope="col">ACTIVITES DE LA SEMAINE</th>
            <th scope="col">Lieu</th>
            <th scope="col">Date</th>
            <th scope="col">Qui</th>
        </tr>
        </thead>
        <tbody>
        @foreach($weekly_activities as $weekly_activity)
            <tr class="editable_row"
                data-id="{{ $weekly_activity->id }}"
                data-name="{{ $weekly_activity->name }}"
                data-location="{{ $weekly_activity->location }}"
                data-date="{{ $weekly_activity->date }}"
                data-people="{{ $weekly_activity->people }}"
            >
                @auth
                    <td class="delete_weekly_cross" data-route="{{ route('delete_weekly') }}"><i class="fas fa-times text-danger"></i></td>
                @endauth
                <th scope="row" class="weekly_name _edit_">{{ $weekly_activity->name }}</th>
                <td class="weekly_location _edit_">{{ $weekly_activity->location }}</td>
                <td class="weekly_date _edit_">{{ $weekly_activity->date }}</td>
                <td class="weekly_people _edit_">{{ $weekly_activity->people }}</td>
            </tr>
        @endforeach
        @auth
            @if($weekly_activities->count() < 8)
                <tr class="editable_row">
                    <td></td>
                    <td scope="row" class="weekly_name _edit_">&nbsp;</td>
                    <td class="weekly_location _edit_"></td>
                    <td class="weekly_date _edit_"></td>
                    <td class="weekly_people _edit_"></td>
                </tr>
            @endif
        @endauth
        </tbody>
    </table>

    @include('weekly_activities._add_modal')
</div>
