<div class="col-3 text-center" id="picket">
    @if($pickets->count() == 0)    
        @guest
            <span class="noPicket">
                <i class="fa fa-exclamation-triangle fa-5x redIcon" aria-hidden="true"></i> 
                <h2 class="redText"><b>Pas de piquets en cours</b></h2>
            <span>
        @endguest
        
        @auth
            <div class="row justify-content-center">
                <a href="{{ route('edit_picket') }}">
                    <i class="button fas fa-plus-circle fa-10x"></i>
                </a>
            </div>
        @endauth
        @if($next_picket)
            <span class="redText">Prochain piquet prévu le {{ (Date::CreateFromDate($next_picket->start_date)->format('l d.m à H\hi')) }}</span>
        @endif
    @else
    <div class="row">

        <!-- SEMAINE ACTUELLE -->
        <div class="col-6  d-flex align-items-stretch border-right border-secondary">
            <div class="row" >

                <!-- PIQUET 1 -->
                <div class="col-12 ">
                    @auth
                        <a style="text-decoration: none;" href="{{ route('edit_picket') }}">
                    @endauth
                    <div class="card mx-auto text-white bg-card-main mb-2">
                        <div class="card-body">
                            <span class="card-title" style="font-size: 200%;">{{ App\Picket::getPicketShortName($pickets[0]->main) }}</span>
                        </div>
                        <div class="card-footer bg-card-footer">
                            Piquet 1
                        </div>
                    </div>
                    @auth
                        </a>
                    @endauth
                </div>

                <!-- PIQUET 2 -->
                <div class="col-12">
                    @auth
                        <a style="text-decoration: none;" href="{{ route('edit_picket') }}">
                    @endauth
                    <div class="card mx-auto text-white bg-card-main mb-2">
                        <div class="card-body">
                            <span class="card-title" style="font-size: 200%;">{{ App\Picket::getPicketShortName($pickets[0]->substitute) }}</h2>
                        </div>
                        <div class="card-footer bg-card-footer">
                            Piquet 2
                        </div>
                    </div>
                    @auth 
                        </a> 
                    @endauth
                </div> 

                <!-- DATE PIQUETS -->
                <div class="col-12">
                    <b>
                        <span class="relief-date">
                            <i class="fas fa-arrow-right" style="font-size: 12px;"></i>
                            &nbsp;{{ ucfirst(Date::CreateFromDate($pickets[0]->end_date)->format('D d.m à H\hi')) }}
                        </span>
                    </b>
                </div> 
            </div>
        </div>

        <!-- S'il n'y pas de piquets suivant prévus -->
        @if($active_pickets == 1)
        <div class="col-6 text-center align-self-center">
                @guest
                <span class="noPicket">
                    <i class="fa fa-exclamation-triangle fa-5x redIcon" aria-hidden="true"></i> 
                    <h2 class="redText"><b>Semaine suivante vide</b></h2>
                <span>
            @endguest
            
            @auth
                <a href="{{ route('edit_picket') }}"><i class="button fas fa-plus-circle fa-10x"></i></a>
            @endauth
        </div>
        @else
            <!-- SEMAINE SUIVANTE -->
            <div class="col-6 d-flex align-items-stretch border-left border-secondary">
                <div class="row">

                    <!-- PIQUET 1 -->
                    <div class="col-12">
                        @auth
                            <a style="text-decoration: none;" href="{{ route('edit_picket') }}">
                        @endauth
                        <div class="card mx-auto text-white bg-card-main mb-3">
                            <div class="card-body">
                                <span class="card-title" style="font-size: 200%;">{{ App\Picket::getPicketShortName($pickets[1]->main) }}</h2>
                            </div>
                            <div class="card-footer bg-card-footer h-10">
                                Piquet 1
                            </div>
                        </div>
                        @auth
                            </a>   
                        @endauth
                    </div>
            
                    <!-- PIQUET 2 -->
                    <div class="col-12">
                        @auth
                            <a style="text-decoration: none;" href="{{ route('edit_picket') }}">
                        @endauth
                        <div class="card mx-auto text-white bg-card-main mb-3">
                            <div class="card-body">
                                <span class="card-title" style="font-size: 200%;">{{ App\Picket::getPicketShortName($pickets[1]->substitute) }}</h2>
                            </div>
                            <div class="card-footer bg-card-footer">
                                Piquet 2
                            </div>
                        </div>
                        @auth
                            </a>   
                        @endauth
                    </div>

                    <!-- DATE PIQUETS -->
                    <div class="col-12">
                        @if($gap_time_pickets >= 1)
                        <span class="relief-date">
                            <i class="fas fa-arrow-right" style="font-size: 12px;"></i>
                            &nbsp;{{ ucfirst(Date::CreateFromDate($pickets[1]->end_date)->format('D d.m à H\hi')) }}
                        </span> 
                            <div class="row justify-content-center text-danger">
                                @auth 
                                    <a class="text-danger" href="{{ route('edit_picket') }}"><b> Modifier relève ({{ $gap_time_pickets }} j.)  </b> </a> 
                                @endauth
                                
                                @guest 
                                    <b>Relève tardive ({{ $gap_time_pickets }} j.)</b> 
                                @endguest
                            </div>
                        @else              
                            <span class="relief-date">
                                <i class="fas fa-arrow-right" style="font-size: 12px;"></i>
                                &nbsp;{{ ucfirst(Date::CreateFromDate($pickets[1]->end_date)->format('D d.m à H\hi')) }}
                            </span> 
                        @endif
                    </div> 
                </div>
            </div>
        @endif
    </div>
    @endif
</div>
