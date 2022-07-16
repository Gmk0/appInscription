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
        <div class="card-body table-responsive p-0" style="height: 300px;">
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
                            <button class="btn btn-link" wire:click="confirmDelete({{$row->id}},'{{$row->name}}')"><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                            <button class="btn btn-link" wire:click="goToEdit({{$row->id}})"><i class="fas fa-edit"></i></button>
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
