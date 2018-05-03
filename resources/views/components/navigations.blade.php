<nav class="navbar navbar-transparent navbar-absolute" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a href="{{ URL::to('/') }}">
        <div class="logo-container">
          <div class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Creative Tim Logo">
          </div>
          <div class="brand">
            {{ config('app.name', "Parcel Tracking System") }}
          </div>
        </div>
      </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-index">
      
      <ul  class="nav navbar-nav navbar-right">
        <li>
          <a href="mailto:mail@nazrulwazir.com">Report An Issue or Suggestion ?</a>
        </li>
      </ul>
      </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>