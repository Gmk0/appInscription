@section('title','ETUDIANT INSCRIS')
@section('css')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
<style>



</style>
@endsection


<div>

  <div class="card-body bg-white pt-5">
    <div class=" ml-2 mb-4 d-flex justify-content-between">
      <div class="">

        <button type="button" wire:click="print()" class="btn btn-outline-primary"><i class="fa fa-print"></i></button>

        <button class="btn btn-outline-primary" type="button" onClick="printReceipt()"><i
            class="fa fa-print">Excel</i></button>
      </div>
      <div class="row">



      </div>
    </div>

    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-2">
          <label for="">Show</label>
          <select class="form-control form-control-sm" title="" style="width: 80px;" wire:model="pageN">

            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
          </select>

        </div>

        <div class="col-md-2">
          <label for="">Order</label>
          <select class="form-control form-control-sm" title="" style="width: 80px;" wire:model="order">

            <option value="asc">ascendant</option>
            <option value="desc">descedant</option>

          </select>
        </div>

        <div class="col-md-4">
          <label for="">Search</label>
          <input type="text" class="form-control form-control-sm" wire:model.debounce.800ms="search"
            placeholder="search Name or Matricule">

        </div>
        <div class="col-md-4">
          <label for="">Faculte</label>
          <select class="form-control form-control-sm  @error('promotion.id_faculte') is-invalid @enderror"
            wire:model.debounce.800ms="byPromotion">
            <option value="">---Faculte-----</option>
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
        <div class="col-md-2 mt-3">
          <label for="">Count</label>
        </div>






      </div>

      <table id="" class="table table-bordered bg-gradient-white table-striped">
        <thead>
          <tr>
            <th>action</th>
            <th>N°</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prenom</th>

            <th>Telephone</th>
            <th>Faculte</th>
            <th>promotion</th>


            <th>Document</th>
            <th>Statut</th>
            <th>Paiement</th>

          </tr>
        </thead>
        <tbody>
          {{Form::hidden('',$increment =1)}}
          @foreach ($etudiants as $etudiant )
          <tr>
            <td class="text-center">
              <a class="btn btn-link" href="{{route('FindEtudiant',[$etudiant->id_inscrit])}}"><i class="fa fa-eye"
                  aria-hidden="true"></i></a>

            </td>
            <td>{{$increment}}</td>
            <td>{{$etudiant->etudiant->matricule_etudiant}}</td>
            <td>{{$etudiant->etudiant->Nom}}</td>
            <td>{{$etudiant->etudiant->Prenom}}</td>

            <td>{{$etudiant->etudiant->Telephone}}</td>
            <td>{{$etudiant->promotion->faculte->designation_faculte}}</td>
            <td>{{$etudiant->promotion->designation_promotion}}</td>


            @if(countDocument($etudiant->etudiant->matricule_etudiant))
            <td><span class="badge badge-pill badge-success">Complet</span></td>
            @else
            <td><button class="btn btn-link" id="click" type="button"> <span
                  class="badge badge-pill badge-warning">Incomplet</span>
              </button></td>
            @endif
            @if($etudiant->statut_etudiant==1)
            <td><span class="badge badge-pill badge-success">Admis</span></td>
            @else
            <td><span class="badge badge-pill badge-warning">No Admis</span></td>
            @endif

            @if($etudiant->paiement )
            <td><span class="badge badge-pill badge-success">Complet</span></td>
            @else
            <td><span class="badge badge-pill badge-warning">incomplet</span></td>
            @endif

          </tr>
          {{Form::hidden('',$increment =$increment+1)}}
          @endforeach

        </tbody>
        <tfoot>
          <tr>
            <th>action</th>
            <th>N°</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prenom</th>

            <th>Telephone</th>
            <th>Faculte</th>
            <th>promotion</th>


            <th>Document</th>
            <th>Statut</th>
            <th>Paiement</th>


          </tr>
        </tfoot>
      </table>
    </div>

    {{$etudiants->links()}}
  </div>
</div>

<!-- /.card-body -->



@push('custom-script')
<script src="{{asset('js/responsive.bootstrap4.min.js')}}" type=""></script>
<script src="{{asset('js/DataTable.responsive.min.js')}}" type=""></script>
<script src="{{asset('js/pdfMake.js')}}" type=""></script>
<script src="{{asset('js/vfs_fonts.js')}}" type=""></script>
<script src="{{asset('js/buttons.html5.js')}}" type=""></script>
<script src="{{asset('js/jszip.js')}}" type=""></script>

<script>
  window.addEventListener('userAdmis', event=> {


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

          Swal.fire({

              icon:'warning',

              title:"Statut dossier",
              text:event.detail.message,
              showConfirmButton: true,
              timer:3000

          })

      });

      $(function () {
         const table= $("#example1").DataTable({
              "paging": true,
              "select":true,
              "responsive":true,
              "lengthChange": true,
              "autoWidth": false,
              "buttons": [
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
                 text:'imprimer',
                 title:'Nouveau inscrit',
                  extend:'print',
                  autoPrint:false,
                  customize: function (win) {
                      $(win.document.body)
                        .css('font-size','10t').prepend(
                            '<img src="{{asset('images/logo2.jpg')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="position:relative; top:0;left:0" width="70" >');
                        $(win.document.body).find('table').addClass('compact').css('font-size','inherit');
                      $(win.document.body).find('h1').addClass('text-center').css('text-align','center');

                  },
                  exportOptions:{
                      columns:[1,2,3,4,6],
                      format: {
                         body: function ( data, row, column, node ) {
                            return column === 0 ?
                            data.charAt(0).toUpperCase() + data.slice(1) :
                                data;}
                             }
                        }
                },
                 {
                  text:'Visible',
                  extend:'colvis',
                  messageTop:'usakin'
                }

                ]
          }).buttons().container().appendTo('#example1_wrapper  .col-md-6:eq(0)');

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

@endpush
<!-- /.ca