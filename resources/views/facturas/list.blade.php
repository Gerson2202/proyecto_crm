@extends('includes.dash')

@section('contenido')
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><i class="fas fa-file-invoice-dollar"></i> Administracion De Facturas</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('equiposIndex')}}">Pagina Principal</a></li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header card-blue card-outline" style="background: white" >
            <h3 class="card-title text-black"><i class="fas fa-table"></i> Lista de Facturas</h3>
          </div>
          <div class="card-body">
            <TAble class="table table-striped table-bordered" id="facturas">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>codigo</th>
                          <th>Nombre Del proveedor</th>
                          <th>Descripcion</th>
                          <th>Fecha</th>
                          <th>documento</th>
                      </tr>
                  </thead>
                  <tbody >
                          @foreach ($facturas as $item) 
                
                          <tr>
                          <th scope="row">{{$item->id}}</th>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->proveedor}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->fecha}}</td>
                            <td>
                              <small class="text-success mr-1">
                                <a class="btn btn-default text-light btn-sm  mx-1" style="background-color: #3333cc"  href="{{ route('verFacturas',$item->id) }}" target="_blank">
                                  <i class="fas fa-envelope-open-text"></i> Abir 
                                </a>     
                                <a class="btn btn-primary text-light btn-sm mx-1 btnEditar" datos="{{$item}}" id="btnEditar" data-toggle="modal" data-target="#modal-default">
                                  <i class="fas fa-edit"></i> Editar 
                                </a>                        
                              
                              </small>
                            </td>
                            
                          </tr>
                              
                          @endforeach 
                  </tbody>
              </TAble>   
          </div>
          {{-- modal --}}
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edicion de factura.</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form  id="formFactura" method="POST" action=""  enctype="multipart/form-data" >
                      
                      @csrf
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationServer01">Codigo </label>
                        <input type="text" id="txtCodigo" name="codigo" class="form-control txtCodigo"  disabled>
                          <div class="valid-feedback"> </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationServer01">Proveedor</label>
                          <input type="text" id="txtProveedor" name="proveedor" class="form-control txtProveedor"   required>
                          <div class="valid-feedback"></div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationServer01">Fecha </label>
                          <input type="date" id="txtFecha" name="fecha" class="form-control fecha "   required>
                          <div class="valid-feedback"> </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationServer01">Descripcion</label>
                          <input type="text" id="txtDescripcion" name="descripcion" class="form-control txtDescripcion"   required>
                          <div class="valid-feedback"></div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="validationServer03">Documento</label>
                          <div class="custom-file">
                            <input name="documento" id="txtDocumento" type="file" class="custom-file-input txtDocumento" >
                            <label name="" class="custom-file-label" for="">Cargar Evidencia</label>
                          </div>
                          
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-info " id="btnAgregar" type="submit">Guardar</button> 
                       <a class="btn btn-danger text-ligth" id="btnEliminar" title="Eliminar" href="#"><i class="fas fa-trash-alt"></i></a>                     

                        
                      </div> 
                    </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        <!-- /.card -->

      </section>
      <!-- /.content -->
</div>

@include('includes.pluggin')
@include('facturas.section.js')

@endsection
