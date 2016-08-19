<!-- <div id="navbar" class="navbar navbar-default">
    @if(Session::get('exists'))
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('projects.intro')}}">Home</a></li>
      <li><a href="{{route('projects.index')}}">Index</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Create<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('projects.create')}}">Project</a></li>
          <li><a href="#">Task</a></li>
          <li><a href="#">Resource</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Session::get('username') }}<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Profile</a></li>
          <li><a href="#">Settings</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="{{route('logout')}}">Log Out</a></li>
        </ul>
      </li>
    </ul>
    @endif
  </div>
-->
@if(Session::get('exists'))
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project Management</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{route('projects.intro')}}">Home</a></li>
              <li><a href="{{route('projects.index')}}">Index</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Create <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('projects.create')}}">Project</a></li>
                  <li><a href="#">Task</a></li>
                  <li><a href="#">Resource</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Session::get('username') }}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Settings</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{route('logout')}}">Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
@endif


