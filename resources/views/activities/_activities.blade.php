<h1>ACTIVITIES</h1>

<!-- TEST TO LIST ALL ACTIVITY -->
<div class="row" id="activity_row">
        <table class="table table-sm table-bordered table-hover text-center">
            @foreach(\App\Activity::getTypes() as $activity_type_id => $activity_type)
                <thead>
                    <tr>
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
                    <tr>
                        <th>{{ $activity->name }}</th>
                        <td>{{ $activity->location }}</td>
                        <td>{{ $activity->start_date }}</td>
                        <td>{{ $activity->end_date }}</td>
                        @for($i=1; $i<=12; $i++)
                            <td></td>
                        @endfor
                    </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>

</div>