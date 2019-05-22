<div class="modal fade modal__clean_errors" id="add_weekly_modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edition de l'activité de la semaine</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Activité</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="location">Lieu</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input class="form-control" type="text" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="people">Qui</label>
                    <input class="form-control" type="text" id="people" name="people">
                </div>
                <input type="hidden" id="weekly_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pull-left" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn" id="add_weekly_modal_submit" data-route="{{ route('store_weekly') }}">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
