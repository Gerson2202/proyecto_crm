<div class="table-responsive">
    <table class="table table-striped table-bordered" id="actas">
      <thead>
        <tr>
           <th>id</th>
           <th>Fecha</th>
           <th>Actividad</th>
           <th>Responsable</th>
         </tr>
       </thead>
       <tbody >
         {{-- @foreach ($actas as $acta) 
         <tr>
           <td>{{$acta->id}}</td>
           <td><a href="{{route('showActaSalida',$acta->id)}}" class="btn btn-default">{{$acta->fecha}}<a></td> 
           <td>{{$acta->actividad}}</td> 
           <td>{{$acta->user->name}}</td>
         </tr>
         @endforeach  --}}
       </tbody>
   </table>
  </div>