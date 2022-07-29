<div class="step-five">
    <div class="card">
        <div class="card-header bg-secondary text-white">Step 5/5 -Attachements</div>
        <div class="card-body">

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="" class="form-label">Photo Passport Recent</label>
                        <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="form-control" wire:model="photo">
                    </div>
                    <div class="spinner-border spinner-border-sm float-right" role="status" wire:loading wire:target="photo">  <span class="sr-only">loading</span></div>
                    @if($photo)
                        <img src="{{$photo->temporaryUrl()}}" alt="" width="50" height="50">
                    @endif
                    <span class="text-danger">@error('photo') {{$message}}@enderror</span>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="" class="form-label">aptitute_physique</label>
                        <input type="file" class="form-control" wire:model="aptitude_physique"
                               id="files">
                    </div>
                    <div class="spinner-border spinner-border-sm float-right" role="status" wire:loading wire:target="aptitude_physique">  <span class="sr-only">loading</span></div>
                    <span class="text-danger">@error('aptitude_physique')
                        {{$message}}@enderror</span>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="" class="form-label">Diplome Etat</label>
                        <input type="file" class="form-control" wire:model="diplome_etat_doc"
                               id="file">
                    </div>
                    <div class="spinner-border spinner-border-sm float-right" role="status" wire:loading wire:target="diplome_etat_doc">  <span class="sr-only">loading</span></div>
                    <span class="text-danger">@error('diplome_etat_doc')
                        {{$message}}@enderror</span>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="" class="form-label">Certificat Naissance</label>
                        <input type="file" class="form-control" wire:model="certificat_naiss"
                               id="file">
                    </div>
                    <div class="spinner-border spinner-border-sm float-right" role="status" wire:loading wire:target="certificat_naiss">
                        <span class="sr-only">loading</span>
                    </div>
                    <span class="text-danger">@error('certificat_naiss')
                        {{$message}}@enderror</span>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="" class="form-label">Bulletin</label>
                        <input type="file" class="form-control" wire:model="bulletin" id="file">
                    </div>
                    <div class="spinner-border spinner-border-sm float-right" role="status" wire:loading wire:target="bulletin">
                          <span class="sr-only">loading</span>
                    </div>
                    <span class="text-danger">@error('bulletin') {{$message}}@enderror</span>
                </div>

            </div>
            <br>
            <div class="form-group">
                <label for="terms" class="d-block">
                    <input type="checkbox" name="terms" id="terms" wire:model="terms"> You must
                    agree with
                    our <a href="#">Terms and condition</a>
                    <span class="text-danger">@error('terms') {{$message}}@enderror</span>
                </label>
            </div>
        </div>
    </div>
</div>