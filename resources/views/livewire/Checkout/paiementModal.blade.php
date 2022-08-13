<div>
    <div wire:ignore.self class="modal fade" id="modal-promotion" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">PROMOTION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updatePayement">
                        <div class="row mb-3">


                            <div class="col-md-6">
                                <label for="name" class="col-md-12 col-form-label ">{{ __('ID') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('paiementUp.matricule_etudiant') is-invalid @enderror"
                                    wire:model="paiementUp.matricule_etudiant" value="id" disabled>
                                <input type="hidden" class="form-control @error('paiementUp.id') is-invalid @enderror"
                                    wire:model="paiementUp.id" value="id" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="col-md-6 col-form-label ">{{ __('Numero') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('paiementUp.id_payement') is-invalid @enderror"
                                    wire:model.defer="paiementUp.id_payement" value="id">
                            </div>

                        </div>
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label for="name" class="col-md-6 col-form-label ">{{ __('Libelle') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('paiementUp.montant') is-invalid @enderror"
                                    wire:model.defer="paiementUp.montant" value="id">
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="col-md-6 col-form-label ">{{ __('Montant') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('paiementUp.libelle') is-invalid @enderror"
                                    wire:model.defer="paiementUp.libelle" value="id">
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <div wire:loading.remove wire:target="updatePayement"
                                class="modal-footer justify-content-between">

                                <button type="submit" class="btn btn-outline-primary">Update</button>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            </div>
                            <div wire:loading wire:target="updatePayement">
                                <button type="button" class="btn btn-outline-primary">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    update..
                                </button>
                            </div>

                        </div>


                    </form>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>