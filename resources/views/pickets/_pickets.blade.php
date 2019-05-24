<div class="col-3 text-center" id="picket">
    @if($pickets->count() == 0)
        @guest
            <span class="noPicket">
                <i class="fa fa-exclamation-triangle fa-5x redIcon" aria-hidden="true"></i> 
                <h2 class="redText"><b>Pas de piquets prévus</b></h2>
            <span>
        @endguest
        
        @auth
            <a href="{{ route('edit_picket') }}"><i class="button fas fa-plus-circle fa-10x"></i></a>
        @endauth
    @else
    <div class="row">

        <!-- SEMAINE ACTUELLE -->
        <div class="col-6  border-right border-secondary">
            <div class="row" >

                <!-- PIQUET 1 -->
                <div class="col-12 ">
                    <div class="card mx-auto text-white bg-card-main mb-3">
                        <div class="card-body">
                            <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[0]->main) }}</h1>
                        </div>
                        <div class="card-footer bg-card-footer">
                            Piquet 1
                        </div>
                    </div>
                </div>

                <!-- PIQUET 2 -->
                <div class="col-12">
                    <div class="card mx-auto text-white bg-card-main mb-3">
                        <div class="card-body">
                            <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[0]->substitute) }}</h1>
                        </div>
                        <div class="card-footer bg-card-footer">
                            Piquet 2
                        </div>
                    </div>
                </div> 

                <!-- DATE PIQUETS -->
                <div class="col-12">
                    <span>{{$pickets[0]->end_date}}</span>    
                </div> 
            </div>
        </div>

        <!-- S'il n'y pas de piquets suivant préuvs -->
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
            <div class="col-6 border-left border-secondary">
                <div class="row">

                    <!-- PIQUET 1 -->
                    <div class="col-12">
                        <div class="card mx-auto text-white bg-card-main mb-3">
                            <div class="card-body">
                                <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[1]->main) }}</h1>
                            </div>
                            <div class="card-footer bg-card-footer">
                                Piquet 1
                            </div>
                        </div>
                    </div>
            
                    <!-- PIQUET 2 -->
                    <div class="col-12">
                        <div class="card mx-auto text-white bg-card-main mb-3">
                            <div class="card-body">
                                <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[1]->substitute) }}</h1>
                            </div>
                            <div class="card-footer bg-card-footer">
                                Piquet 2
                            </div>
                        </div>
                    </div>

                    <!-- DATE PIQUETS -->
                    <div class="col-12">
                        @if($gap_time_pickets >= 1)
                            <span>{{ $pickets[1]->end_date }}</span> 
                            <div class="row justify-content-center text-danger">
                                @auth 
                                    <a class="text-danger" href="{{ route('edit_picket') }}"><b> Modifier relève ({{ $gap_time_pickets }} j.)  </b> </a> 
                                @endauth
                                
                                @guest 
                                    <b>Relève tardive ({{ $gap_time_pickets }} j.)</b> 
                                @endguest
                            </div>
                        @else 
                            <span>{{$pickets[1]->start_date}}</span>    

                        @endif
                    </div> 
                </div>
            </div>
        @endif
    </div>
    @endif
</div>
