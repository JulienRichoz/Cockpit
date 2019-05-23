<div class="col-3 text-center" id="picket">
    @if($pickets->count() == 0)
        @guest
            <span class="noPicket">
                <i class="fa fa-exclamation-triangle fa-5x redIcon" aria-hidden="true"></i> 
                <h2 class="redText"><b>Pas de piquets prévus</b></h2>
            <span>
        @endguest
        
        @auth
            <a href="{{ route('edit_picket') }}"><i class="button fas fa-plus-circle fa-10x "></i></a>
        @endauth
    @else
        <div class="row">
            <!-- Piquet 1 semaine actuelle -->
            <div class="col-md-6">
                    <div class="card text-white bg-card-main mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[0]->main) }}</h1>
                        </div>
                        <div class="card-footer bg-card-footer">
                            Piquet 1
                        </div>
                    </div>
                </div>

            <!-- Piquet 1 semaine suivante -->
            <div class="col-md-6">
                <div class="card text-white bg-card-main mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[1]->main) }}</h1>
                    </div>
                    <div class="card-footer bg-card-footer">
                        Piquet 1
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Piquet 2 semaine actuelle -->
            <div class="col-md-6">
                <div class="card text-white bg-card-main mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[0]->substitute) }}</h1>
                    </div>
                    <div class="card-footer bg-card-footer">
                        Piquet 2
                    </div>
                </div>
            </div>

             <!-- Piquet 2 semaine suivante -->
            <div class="col-md-6">
                <div class="card text-white bg-card-main mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h1 class="card-title">{{ App\Picket::getPicketShortName($pickets[1]->substitute) }}</h1>
                    </div>
                    <div class="card-footer bg-card-footer">
                        Piquet 2
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
