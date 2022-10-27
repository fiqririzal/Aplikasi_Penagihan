<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#  " class="nav-link">
          <div class="nav-profile-image">
            <img src="assets/images/faces/face1.jpg" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ Auth::user()->name }} </span>
            <span class="text-secondary text-small">{{ Auth::user()->getRoleNames()[0] }}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      {{-- @role('admin') --}}
        <li class="nav-item">
            <a class="nav-link" href="index.html">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('member')}}" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Member</span>
            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('rental')}}" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Rentalan</span>
            <i class="mdi mdi-bus menu-icon"></i>
            </a>
        </li>
        {{-- @endrole --}}
    </ul>
  </nav>
