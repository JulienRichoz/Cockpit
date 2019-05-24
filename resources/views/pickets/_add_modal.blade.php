<div class="modal fade modal__clean_errors" id="add_picket_modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edition du piquet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="main">Piquet 1</label>
                    <input type="text" class="form-control" id="main" name="main">
                </div>
                <div class="form-group">
                    <label for="substitute">Piquet 2</label>
                    <input type="text" class="form-control" id="substitute" name="substitute">
                </div>
                <div class="form-group">
                    <label for="start_date">Date de début</label>
                    <input class="form-control" type="date" id="start_date">
                </div>
                <div class="form-group">
                    <label for="start_time">Heure de début</label>
                    <input class="form-control" type="time" id="start_time">
                </div>
                <div class="form-group">
                    <label for="end_date">Date de fin</label>
                    <input class="form-control" type="date" id="end_date">
                </div>
                <div class="form-group">
                    <label for="end_time">Heure de fin</label>
                    <input class="form-control" type="time" id="end_time">
                </div>
                <input type="hidden" id="picket_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pull-left" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn" id="add_picket_modal_submit" data-route="{{ route('store_picket') }}">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
