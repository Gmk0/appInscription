<div>
    @if ($isBtnAddClick)

        <div class="row justify-content-center p-4 pt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('Add new User') }}</div>

                    <div class="card-body">
                        <form wire:submit.prevent="register">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('users.name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}"  autocomplete="name" autofocus wire:model.defer="users.name">

                                    @error('users.name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('LastName') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('users.lastname') is-invalid @enderror"
                                           wire:model="users.lastname">

                                    @error('users.lastname')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">

                                    <select name="role" id="" class="form-control @error('users.role') is-invalid @enderror" wire:model="users.role">
                                        <option Selected>--Selectionner le role--</option>
                                        <option value="admin">admin</option>
                                        <option value="manager">manager</option>
                                        <option value="SuperAdmin">SuperAdmin</option>
                                    </select>


                                    @error('users.role')
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
                                    <input id="email" type="email" class="form-control @error('users.email') is-invalid @enderror"
                                           name="email" wire:model="users.email">

                                    @error('users.email')
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
                                           class="form-control @error('users.password') is-invalid @enderror" name="password"
                                            autocomplete="new-password" wire:model="users.password">

                                    @error('users.password')
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
                                           name="password_confirmation"  autocomplete="new-password"  wire:model="users.password_confirm">
                                    @error('users.password_confirm')
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
        </div>

    @else
        <div class="row p-4 pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Liste Utilisateur
                        </h3>

                        <div class="card-tools d-flex align-items-center">
                            <a class="btn btn-link text-white mr-4" href="" wire:click.prevent="goToaddUser()"><i
                                    class="fas fa-user-plus"></i></a>
                            <div class="input-group input-group-md" 50px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 3%00px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th class="text-center" style="width:5%"></th>
                            <th class="text-center" style="width:25%">User</th>
                            <th class="text-center" style="width:20%">Roles</th>
                            <th class="text-center" style="width:20%">ajouter</th>
                            <th class="text-center" style="width:30%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($user as $row )
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">{{$row->name}}</td>
                                <td class="text-center">{{$row->role}}</td>
                                <td class="text-center"><span
                                        class="tag tag-success">{{$row->created_at->diffforhumans()}}</span></td>
                                <td class="text-center">
                                    <button class="btn btn-link"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                    <button class="btn btn-link" wire:click="goToaddUser()"><i class="fas fa-trash-alt"></i></i></button>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    l
                </div>
            </div>
            <!-- /.card -->
        </div>
</div>
@endif


</div>




