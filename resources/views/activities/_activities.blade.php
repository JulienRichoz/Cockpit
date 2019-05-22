<h1>ACTIVITIES</h1>

<div class="row" id="activities_row">
        <table class="table table-sm table-bordered table-hover text-center mb-0">
            @foreach(\App\Activity::getTypes() as $activity_type_id => $activity_type)
                <thead>
                <tr class="{{ $activity_type['class_color'] }}">
                        @auth
                        <th></th>   
                        @endauth
                        <th scope="col">{{ strtoupper($activity_type['name']) }}</th>
                        <th scole="col">Lieu</th>
                        <th scope="col">Début</th>
                        <th scope="col">Fin</th>
                        @for($i=1; $i<=12; $i++)
                            <th scope="col">{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities[$activity_type_id] as $activity)
                    <tr class="editable_row"
                        data-id="{{ $activity->id }}"
                        data-name="{{ $activity->name }}"
                        data-location="{{ $activity->location }}"
                        data-start_date="{{ $activity->start_date }}"
                        data-end_date="{{ $activity->end_date }}"
                        data-activity_type_id="{{ $activity_type_id }}"
                    >
                        @auth
                            <td class="delete_activity_cross" data-route="{{ route('archive_activity') }}"><i class="fas fa-times text-danger"></i></td>
                        @endauth
                        <th scope="row" class="activity_name _edit_">{{ $activity->name }}</th>
                        <td class="activity_location _edit_">{{ $activity->location }}</td>
                        <td class="activity_start_date _edit_" data-date="{{ $activity->start_date }}">{{ \Carbon\Carbon::createFromDate($activity->start_date)->format('d.m.Y') }}</td>
                        <td class="activity_end_date _edit_" data-date="{{ $activity->end_date }}">{{ \Carbon\Carbon::createFromDate($activity->end_date)->format('d.m.Y') }}</td>
                        @for($i=1; $i<=12; $i++)
                            <td id="{{ $activity->id }}_{{ $i }}" class=" _edit_"></td>
                        @endfor
                    </tr>
                    @endforeach
                    @auth
                        @if($activities_count < 16)
                            <tr class="editable_row"
                                data-activity_type_id="{{ $activity_type_id }}">
                                <td></td>
                                <td scope="row" class="activity_name _edit_">&nbsp;</td>
                                <td class="activity_location _edit_"></td>
                                <td class="activity_start_date _edit_" data-date=""></td>
                                <td class="activity_end_date _edit_" data-date=""></td>
                                @for($i=1; $i<=12; $i++)
                                    <td></td>
                                @endfor
                            </tr>
                        @endif
                    @endauth
                </tbody>
            @endforeach
        </table>

        @include('activities._add_modal')
</div>