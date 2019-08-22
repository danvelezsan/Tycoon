@extends('layouts.app')

@section('content')
    

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">¡Bienvenido {{ Auth::user()->nombre }}!</h1>
          <p class="lead text-muted">Aquí podemos ayudarte a hacer tu vida más imposible de lo que ya está, prestandote nuestro servicio de la más alta calidad. Ponte el cinturón para que nos acompañes en esta locura de EPS.</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="card-text">Registrar Paciente</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button onclick="window.location='/pacientes/registrarPaciente'" type="button" class="btn btn-secondary">Ir</button>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="card-text">Registrar Medico General</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button onclick="window.location='/medicosGenerales/registrarMedicoGeneral'" type="button" class="btn btn-secondary">Ir</button>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="card-text">Registrar Especialista</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button onclick="window.location='/medicosEspecialistas/registrarMedicoEspecialista'" type="button" class="btn btn-secondary">Ir</button>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="card-text">Ver Pacientes</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button onclick="window.location='/pacientes/listarPacientes'" type="button" class="btn btn-secondary">Ir</button>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="card-text">Ver Medicos Generales</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button onclick="window.location='/medicosGenerales/listarMedicosGenerales'" type="button" class="btn btn-secondary">Ir</button>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="card-text">Ver Especialistas</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button onclick="window.location='/medicosEspecialistas/listarMedicosEspecialistas'" type="button" class="btn btn-secondary">Ir</button>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
<footer class="text-muted sticky-footer-wrapper">
        <br>
        <div class="container">
            <p class="float-right">
                <a href="#">Ir arriba</a>
            </p>
            <p>Copyright &copy; {{ date("Y") }} Pyramid Tycoon Colombia, Inc. Todos los derechos reservados.</p>
            <p>¿Quieres saber más? <a href="#">Términos de uso</a> o <a href="#">Póliza de privacidad</a>.</p>
        </div>
    </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
@endsection
