@section('title','ETUDIANT INSCRIS')
@section('css')
 <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
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
@endsection


<div>
    @if($currentPage == PAGELIST)
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex align-items-center">
                <h3 class="card-title flex-grow-1">LISTE NOUVEAU INSCRIT</h3>


                <div class="card-tools  d-flex align-items-center">



                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-3" style="height: 500px;">


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
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{Form::hidden('',$increment =1)}}
                    @foreach ($etudiants as $etudiant )
                        <tr>
                            <td>{{$etudiant->id_inscrit}}</td>
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
                                <td><a class="btn btn-link" href="#" wire:click="statusChange('{{$etudiant->id_inscrit}}')"> <span class="badge badge-pill badge-warning">No Admis</span>
                                        <div wire:loading wire:target="statusChange('{{$etudiant->id_inscrit}}')">Update</div>
                                    </a></td>
                            @endif
                            <td class="text-center">
                                <a class="btn btn-link" href="{{route('FindEtudiant',[$etudiant->id_inscrit])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                            </td>
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
                        <th>action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @endif






</div>


  @section('script')
  <script src="{{asset('js/responsive.bootstrap4.min.js')}}" type=""></script>
  <script src="{{asset('js/DataTable.responsive.min.js')}}" type=""></script>
  <script src="{{asset('js/pdfMake.js')}}" type=""></script>
  <script src="{{asset('js/vfs_fonts.js')}}" type=""></script>
  <script src="{{asset('js/buttons.html5.js')}}" type=""></script>
  <script src="{{asset('js/jszip.js')}}" type=""></script>

  <script>

      window.addEventListener('showSuccessMessage', event=> {

          $("#example1").table().ajax.reload();

          Swal.fire({
              position: 'top-end',
              icon:'success',
              toast: true,
              title:"operation reussie",
              text:event.detail.message,
              showConfirmButton: false,
              timer:3000

          })

      });
      window.addEventListener('PreventMessage', event=> {

          $("#modal-promotion").modal('hide');
          Swal.fire({

              icon:'warning',

              title:"operation reussie",
              text:event.detail.message,
              showConfirmButton: false,
              timer:3000

          })

      });

      $(function () {
          $("#example1").DataTable({
              "paging": true,
              "responsive":false ,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": [ "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper  .col-md-6:eq(0)');
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




