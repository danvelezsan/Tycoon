@extends('layouts.app')

@section('content')
    

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">¡Bienvenido {{ Auth::user()->nombre }}!</h1>
          <p class="lead text-muted">Aquí podemos ayudarte a hacer tu vida más imposible de lo que ya está, prestandote nuestro servicio de la más alta calidad. Ponte el cinturón para que nos acompañes en esta locura de EPS.</p>
        </div>
      </section>

     
<footer class="text-muted sticky-footer-wrapper">
        <br>
        <div class="container">
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
