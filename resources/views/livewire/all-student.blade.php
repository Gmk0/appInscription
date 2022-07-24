<div>
    <div class="row">

        <div class="col-md-4">
            <button class="btn btn-outline-primary" wire:click="goToPhilo()">PHILO</button>
            <button class="btn btn-outline-primary" wire:click="goToAll()">ALL</button>
        </div>

        <div>
            @if($currentPage=="all")
            <table id="example2" class="table table-bordered table-responsive table-striped">
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
                    <th>date</th>
                    <th>Document</th>
                    <th>Statut</th>
                    
                </tr>
                </thead>
                <tbody>
                {{Form::hidden('',$increment =1)}}
                @foreach ($etudiants as $etudiant )
                    <tr>
                        <td class="text-center">
                            <a class="btn btn-link" href="{{route('FindEtudiant',[$etudiant->id])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
        
                        </td>
                        <td>{{$etudiant->id}}</td>
                        <td>{{$etudiant->matricule_etudiant}}</td>
                        <td>{{$etudiant->Nom}}</td>
                        <td>{{$etudiant->Prenom}}</td>
                       
                        <td>{{$etudiant->Telephone}}</td>
                        <td>{{$etudiant->tuteurEtudiant->Nom_tuteur}}</td>
                        <td>{{$etudiant->inscription->promotion->designation_promotion}}</td>
                        <td>{{$etudiant->inscription->created_at}}</td>
                        @if(countDocument($etudiant->matricule_etudiant))
                        <td><span class="badge badge-pill badge-success">Complet</span></td>
                        @else
                        <td><button class="btn btn-link" id="click" type="button"> <span class="badge badge-pill badge-warning">Incomplet</span>
                              
                        </button></td>
                         @endif
                        @if($etudiant->id==1)
                            <td><span class="badge badge-pill badge-success">Admis</span></td>
                        @else
                            <td><button class="btn btn-link" id="" type="button" > <span class="badge badge-pill badge-warning">No Admis</span>
                        
                                </button></td>
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
                    <th>Date</th>
                    <th>Document</th>
                    <th>Statut</th>
                    
                    
                </tr>
                </tfoot>
            </table>
            @endif
            @if($currentPage=="PHILO")
            <table id="example1" class="table table-bordered table-striped">
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
                    <th>date</th>
                    <th>Document</th>
                    <th>Statut</th>
                    
                </tr>
                </thead>
                <tbody>
                {{Form::hidden('',$increment =1)}}
                @foreach ($etudiantPhilo as $etudiant )
                    <tr>
                        <td class="text-center">
                            <a class="btn btn-link" href="{{route('FindEtudiant',[$etudiant->id_inscrit])}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
        
                        </td>
                        <td>{{$etudiant->id_inscrit}}</td>
                        <td>{{$etudiant->etudiant->matricule_etudiant}}</td>
                        <td>{{$etudiant->etudiant->Nom}}</td>
                        <td>{{$etudiant->etudiant->Prenom}}</td>
                       
                        <td>{{$etudiant->etudiant->Telephone}}</td>
                        <td>{{$etudiant->promotion->faculte->designation_faculte}}</td>
                        <td>{{$etudiant->promotion->designation_promotion}}</td>
                        <td>{{$etudiant->created_at}}</td>
                        @if(countDocument($etudiant->etudiant->matricule_etudiant))
                        <td><span class="badge badge-pill badge-success">Complet</span></td>
                        @else
                        <td><button class="btn btn-link" id="click" type="button"> <span class="badge badge-pill badge-warning">Incomplet</span>
                              
                        </button></td>
                         @endif
                        @if($etudiant->statut_etudiant==1)
                            <td><span class="badge badge-pill badge-success">Admis</span></td>
                        @else
                            <td><button class="btn btn-link" id="" type="button" wire:click="statusChange('{{$etudiant->id_inscrit}}')"> <span class="badge badge-pill badge-warning">No Admis</span>
                                    <div wire:loading wire:target="statusChange('{{$etudiant->id_inscrit}}')">Update</div>
                                </button></td>
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
                    <th>Date</th>
                    <th>Document</th>
                    <th>Statut</th>
                    <p>USAKIN</p>
                    
                </tr>
                </tfoot>
            </table>
            @endif
        </div>

    </div>
   
    
</div>



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
        $("#example1").DataTable({
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

        const table= $("#example2").DataTable({
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
