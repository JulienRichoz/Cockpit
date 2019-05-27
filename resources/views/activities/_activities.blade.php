<div class="row" id="activities_row">
        <table class="table table-striped table-sm table-bordered table-hover text-center mb-0">
            @php
                // Handle color here instead of scss to handle easilier the logic color for the 2 activities
                $color10 = '#6dc6cd'; // should be light color (begin progress bar activity 1)
                $color11 = '#48848e'; // should be dark color (end progress bar activity 1)
                $color20 = '#638ca5'; // light color (activity 2)
                $color21 = '#446172'; // dark color (activity 2)
                $lastid = null;    
                $progressColor = $color10;
                $progressColor2 = $color11;
            @endphp
            <!-- Display header (1 = exploitation; 2 = operationnel) -->
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
                            <th scope="col" class="month-row">{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>

                <!-- Display content of both activities -->
                <tbody>
                    @foreach($activities[$activity_type_id] as $activity)
                    @php 
                    // if activity id changed grom last iteration, change color of the progress bar
                    if ($lastid != $activity_type_id){

                        $lastid = $activity_type_id;

                        if($activity_type_id == 1 ) $progressColor = $color10;
                        else $progressColor = $color20;

                        if($progressColor == $color10){
                            $progressColor = $color10;
                            $progressColor2 = $color11;
                        }
                        else{
                            $progressColor = $color20;
                            $progressColor2 = $color21;
                        }
                    }
                    @endphp
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
                        <td class="activity_start_date _edit_ text-right" data-date="{{ $activity->start_date }}">{{ ucfirst(substr(Date::createFromDate($activity->start_date)->format('D'), 0, -1)) }} {{ Date::createFromDate($activity->start_date)->format('d.m.y') }}</td>
                        <td class="activity_end_date _edit_ text-right" data-date="{{ $activity->end_date }}">{{ ucfirst(substr(Date::createFromDate($activity->end_date)->format('D'), 0, -1)) }} {{ Date::createFromDate($activity->end_date)->format('d.m.y') }}</td>
                        <td colspan="12" id="{{ $activity->id }}_{{ $i }}" class=" _edit_ align-middle" style="padding: 0px;">
                                
                            <div class="progress bg-transparent" style="height: 1.5vh">                                   
                                <!-- First invisible segment of the progress bar. Allow to tell when the second segment will start  -->
                                <div class="progress-bar bg-transparent" role="progressbar" style="background-color: {{ $progressColor }}; width: {{ App\Http\Controllers\ActivityController::dateToPercent($activity->start_date) }}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                
                                <!-- Second visible segment of the progress progress bar. If the end_date is next year, will cover all the div (to 100%) -->
                                @if(App\Http\Controllers\ActivityController::dateToPercent($activity->end_date) == 367)
                                    <div class="progress-bar" role="progressbar" style="background-image: linear-gradient(to right, {{$progressColor}} 95%, {{$progressColor2}} 5%); width: {{ 100 - App\Http\Controllers\ActivityController::dateToPercent($activity->start_date) }}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                    <div class="progress-bar" role="progressbar" style="background-image: linear-gradient(to right, {{$progressColor}} 95%, {{$progressColor2}} 5%); width: {{ App\Http\Controllers\ActivityController::dateToPercent($activity->end_date) - App\Http\Controllers\ActivityController::dateToPercent($activity->start_date) }}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach 

                    <!-- Display editable row only for admin and if there is less than 16 active records-->
                    @auth
                        @if($activities_count < 16)
                            <tr class="editable_row"
                                data-activity_type_id="{{ $activity_type_id }}">
                                <td scope="row" class="activity_id _edit_"><i class="button fas fa-plus-circle fa-1x @if($activity_type_id == 1) hard-blue @endif"></i></td>
                                <td class="activity_name _edit_">&nbsp;</td>
                                <td class="activity_location _edit_"></td>
                                <td class="activity_start_date _edit_" data-date=""></td>
                                <td class="activity_end_date _edit_" data-date=""></td>
                                <td colspan="12" class="_edit_"></td>
                            </tr>
                        @endif
                    @endauth
                </tbody>
            @endforeach
        </table>

        @include('activities._add_modal')
</div>