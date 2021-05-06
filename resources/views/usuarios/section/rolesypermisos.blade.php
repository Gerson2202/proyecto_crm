 <!-- /.tab-pane  ROLES Y PERMISOS-->
 <div class="tab-pane" id="timeline">
     <h6>Asignacion de roles</h3>
     <hr>
    {!!Form::open(['route'=>['roleUser',$user->id], 'method'=>'POST'])!!}
            <div class="row">
                @foreach ($roles as $item)
                <div class="col-12">
                {!! Field::checkbox("checkRoles[{{$item->id}}]",
                $item->id, 
                $user->hasRole($item->id),
                ['label'=>$item->name])!!}
                </div>                        
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        <button tipe="submit" class="btn btn-success">Guardar</button>
                    </div>
                
                </div>
            </div>
    {!! Form::close() !!}
          
            {{--<form action="{{route('roleUser',$user->id)}}" method="POST">
              @csrf
                @foreach ($roles as $item)
                <div class="form-check">                        
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="checkRoles[]" id="checkRoles" value="{{$item->id}}">
                    {{$item->name}}
                  </label>
                </div>                                        
                @endforeach
                <hr>
                <button tipe="submit" class="btn btn-success">Guardar</button>
            </form> --}}
         
</div>
<!-- /.tab-pane -->
<div class="tab-pane" id="permisos">
    <div class="card">
      <div class="card-header" style="background: white">Asiganar Permisos
          <div class="card-body">
            {!!Form::open(['route'=>['permisosUser',$user->id], 'method'=>'POST'])!!}
                <div class="row">
                    @foreach ($permisos as $item)
                    <div class="col-12">
                    {!! Field::checkbox("txtPermisos[{{$item->id}}]",
                    $item->id, 
                    $user->hasPermissionTo($item->id),
                    ['label'=>$item->name])!!}
                    </div>                        
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="float-right">
                            <button tipe="submit" class="btn btn-success">Guardar</button>
                        </div>
                    
                    </div>
                </div>
            {!! Form::close() !!}
            {{-- <form action="{{route('permisosUser',$user->id)}}" method="POST">
              @csrf
              @foreach ($permisos as $item)
              <div class="form-check">                        
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="txtPermisos[]" id="txtPermisos" value="{{$item->id}}" >
                  {{$item->description}}
                </label>
              </div>                                      
              @endforeach
              <hr>
              <button class="btn btn-dark">Guardar</button> --}}
          </form>
            
          </div>
      </div>
    </div>
</div>
{{-- <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        let ids=$('#checkRoles').val();
    });
</script> --}}
@include('includes.pluggin')
@if (session('mensaje'))
<script>
  toastr.success("{{session('mensaje')}}");
</script>                
@endif