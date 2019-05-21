<div class="modal fade modal__clean_errors" id="add_activity_modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-activity-title" class="modal-title">Edition de l'activité</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="location">Lieu</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <div class="form-group">
                        <label for="start_date">Date de début</label>
                        <input class="form-control" type="date" id="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date">Date de fin</label>
                        <input class="form-control" type="date" id="end_date">
                    </div>
                    <input type="hidden" id="activity_type_id">
                    <input type="hidden" id="activity_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn pull-left" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn" id="add_activity_modal_submit" data-route="{{ route('store_activity') }}">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>