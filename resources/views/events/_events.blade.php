<div class="col-3" id="event" data-route="{{ route('store_event') }}">
    <div class="row event_row attention_row" id="{{ $events[0]->id }}">
        <div class="col-3 icon" id="attention_point">
            <i class="fas fa-exclamation-triangle fa-3x"></i>
        </div>
        <div class="col-9">
            <h5>{{ $events[0]->title }}</h5>    
            <p class="editable_text">{{ $events[0]->text }}</p>
            <div class="input-group d-none">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary save_information_text" type="button">Sauver</button>
                </div>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row event_row projects_row" id="{{ $events[1]->id }}">
        <div class="col-3 icon" id="projects">
            <i class="fas fa-tasks fa-3x"></i>
        </div>
        <div class="col-9">
            <h5>{{ $events[1]->title }}</h5>
            <p class="editable_text">{{ $events[1]->text }}</p>
            <div class="input-group d-none">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary save_information_text" type="button">Sauver</button>
                </div>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row event_row various_row" id="{{ $events[2]->id }}">
        <div class="col-3 icon" id="various">
            <i class="fas fa-edit fa-3x"></i>
        </div>
        <div class="col-9">
            <h5>{{ $events[2]->title }}</h5>
            <p class="editable_text">{{ $events[2]->text }}</p>
            <div class="input-group d-none">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary save_information_text" type="button">Sauver</button>
                </div>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row event_row calendar_row" id="{{ $events[3]->id }}">
        <div class="col-3 icon" id="calendar">
            <i class="fas fa-calendar-alt fa-3x"></i>
        </div>
        <div class="col-9">
            <h5>{{ $events[3]->title }}</h5>
            <p class="editable_text">{{ $events[3]->text }}</p>
            <div class="input-group d-none">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary save_information_text" type="button">Sauver</button>
                </div>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
</div>
