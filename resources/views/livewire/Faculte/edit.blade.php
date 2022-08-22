<div wire:ignore.self class="modal fade" id="modal-promotion-edit" tabindex="-1" role="dialog"
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
                <form wire:submit.prevent="editPromotion">
                    <div class="row mb-3">
                        <label for="name" class="col-md-12 col-form-label ">{{ __('Faculte') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text"
                                class="form-control @error('promotion.designation_promotion') is-invalid @enderror"
                                autocomplete="name" wire:model="promotionEdit.designation_promotion">

                            @error('promotion.designation_promotion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label"></label>
                        <div class="col-md-12">
                            <select disabled
                                class="form-control  @error('promotionEdit.id_faculte') is-invalid @enderror"
                                wire:model="promotionEdit.id_faculte">
                                <option selected>---Faculte-----</option>
                                @foreach($facultes as $row)
                                <option value="{{$row->id_faculte}}">{{$row->designation_faculte}}</option>

                                @endforeach
                            </select>
                            @error('promotionEdit.designation_promotion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            wire:click="cleanModal()">Close</button>
                        <button type="submit" class="btn btn-primary">EDIT</button>
                    </div>


                </form>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div wire:ignore.self class="modal fade" id="modal-lg-edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">FACULTE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="editFac">
                    <div class="row mb-3">
                        <label for="name" class="col-md-12 col-form-label ">{{ __('Faculte') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text"
                                class="form-control @error('faculteEdit.designation_faculte') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                wire:model.defer="faculteEdit.designation_faculte">

                            @error('faculteEdit.designation_faculte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            wire:click="cleanModal()">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>


                </form>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>