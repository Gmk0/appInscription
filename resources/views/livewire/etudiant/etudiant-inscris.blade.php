@section('css')
 <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
@endsection
    <style>
      .dt-button{
               display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
            box-shadow: none;
      }

  </style>
  <div class="card">
          <div class="card-header bg-secondary text-white d-flex align-items-center">
                <h3 class="card-title flex-grow-1"">LISTE NOUVEAU INSCRIT</h3>

                <div class="card-tools  d-flex align-items-center">

                        <label class="form-label">FACULTE</label>
                          <div class="col">
                            <select class="form-control  @error('promotion.id_faculte') is-invalid @enderror" wire:model="promotion">
                            <option selected>---Faculte-----</option>
                            @foreach($facultes as $row)
                            <option value="{{$row->id_faculte}}">{{$row->designation_faculte}}</option>

                            @endforeach
                            </select>
                           @error('promotion.designation_promotion')
                           <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                          </div>

              </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body">


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>N°</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Faculte</th>
                    <th>promotion</th>
                    <th>Statut</th>

                  </tr>
                  </thead>
                  <tbody>
                    {{Form::hidden('',$increment =1)}}
                     @foreach ($etudiants as $etudiant )
                  <tr>
                    <td>{{$increment}}</td>
                    <td>{{$etudiant->etudiant->matricule_etudiant}}</td>
                    <td>{{$etudiant->etudiant->Nom}}</td>
                    <td>{{$etudiant->etudiant->Prenom}}</td>
                    <td>{{$etudiant->etudiant->Email}}</td>
                    <td>{{$etudiant->etudiant->Telephone}}</td>
                    <td>{{$etudiant->promotion->faculte->designation_faculte}}</td>
                    <td>{{$etudiant->promotion->designation_promotion}}</td>
                     @if($etudiant->statut_etudiant==1)
                     <td><span class="badge badge-pill badge-success">Admis</span></td>
                     @else
                      <td><span class="badge badge-pill badge-warning text-dark"> no Admis</span></td>
                     @endif

                  </tr>
                     {{Form::hidden('',$increment =$increment+1)}}
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N°</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Faculte</th>
                    <th>promotion</th>
                    
                    <th>Statut</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
  </div>

  @section('script')
  <script src="{{asset('js/responsive.bootstrap4.min.js')}}" type=""></script>
  <script src="{{asset('js/DataTable.responsive.min.js')}}" type=""></script>
  <script src="{{asset('js/pdfMake.js')}}" type=""></script>
  <script src="{{asset('js/vfs_fonts.js')}}" type=""></script>
  <script src="{{asset('js/buttons.html5.js')}}" type=""></script>
  <script src="{{asset('js/jszip.js')}}" type=""></script>

  <script>

      $(function () {
          $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });

  /*$(function () {
      $('#example1').append('<caption style="caption-side:top">USAKIN</caption>');
      $('#example1').DataTable({
            dom:'Bfrtip',
            buttons:[

                {
                  extend:'excel',
                  title:'USAKIN',
                  messageTop:'usakin'
                },
                {
                  extend:'pdf',
                   messageTop:'usakin',
                   donwload:true,

                },
                {
                  extend:'print',
                  messageTop:'usakin'
                },
                 {
                  extend:'colvis',
                  messageTop:'usakin'
                }



              ]
      });

       $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis"]
    })

  }); */
   /*$(function () {
    $('#example1').DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
            dom:'Bfrtip',
            buttons:[

                {
                  extend:'excel',
                  title:'USAKIN',
                  messageTop:'usakin'
                },
                {
                  extend:'pdf',
                   messageTop:'usakin',
                   donwload:true,

                },
                {
                  extend:'print',
                  messageTop:'usakin'
                },
                 {
                  extend:'colvis',
                  messageTop:'usakin'
                }



              ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); */


</script>

@endsection
            <!-- /.ca




