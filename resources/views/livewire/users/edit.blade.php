<div class="row  p-2 pt-5">
    <div class="col-lg-12 col-md-6">
        <div class="card">
            <div class="card-header bg-secondary text-white">{{ __('Add new User') }}</div>

            <div class="card-body">
                <form wire:submit.prevent="updateEdit">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('usersEdit.name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}"  autocomplete="name" autofocus wire:model.defer="usersEdit.name">

                            @error('usersEdit.name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('LastName') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('usersEdit.lastname') is-invalid @enderror"
                                   wire:model="usersEdit.lastname">

                            @error('usersEdit.lastname')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                        <div class="col-md-6">

                            <select name="role" id="" class="form-control @error('usersEdit.role') is-invalid @enderror" wire:model="usersEdit.role">
                                <option Selected>--Selectionner le role--</option>
                                <option value="admin">admin</option>
                                <option value="manager">manager</option>
                                <option value="SuperAdmin">SuperAdmin</option>
                            </select>


                            @error('usersEdit.role')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('usersEdit.email') is-invalid @enderror"
                                   name="email" wire:model="usersEdit.email">

                            @error('usersEdit.email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('usersEdit.password') is-invalid @enderror" name="password"
                                   autocomplete="new-password" wire:model="usersEdit.password">

                            @error('usersEdit.password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"  autocomplete="new-password"  wire:model="usersEdit.password_confirm">
                            @error('usersEdit.password_confirm')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0 ">
                        <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                            <a  class="btn btn-secondary "href="" wire:click.prevent="backToList">Back</a>

                        </div>



                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-lg-12 col-md-6">
        <div class="card">
            <div class="card-header bg-secondary text-white">{{ __('Edit password new User') }}</div>

            <div class="card-body">

            </div>
        </div>

    </div>
</div>
