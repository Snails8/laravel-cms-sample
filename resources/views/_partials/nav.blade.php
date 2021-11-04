<header class="site-header sticky-top py-1">
<nav class="navbar-front navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid d-flex flex-column flex-md-row justify-content-between">
{{--    <div class="row container-fluid pe-0">--}}
      <div class="col-md-auto me-auto nav">
        <div class="navbar-brand nav-item">
          <a class="navbar-brand" href="{{ route('top') }}">HRT</a>
        </div>
        <a class="nav-item nav-link navbar-menu" href="">
          <div>HRTとは</div>
        </a>
        <a class="nav-item nav-link navbar-menu" href="">
          <div>機能</div>
        </a>
        <a class="nav-item nav-link navbar-menu" href="">
          <div>導入の流れ</div>
        </a>
        <a class="nav-item nav-link navbar-menu" href="{{ route('plan.index') }}">
          <div>料金</div>
        </a>
        <a class="nav-item nav-link navbar-menu" href="#">
          <div>導入事例</div>
        </a>
        <a class="nav-item nav-link navbar-menu" href="#">
          <div>お知らせ/イベント</div>
        </a>
        <a class="nav-item nav-link navbar-menu" href="#">
          <div>もっと知りたい</div>
        </a>

      </div>
      <div class="col-md-auto ms-auto">
        <div class="user-info">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDropdown" aria-controls="navDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse flex-row" id="navDropdown">
            <ul class="navbar-nav">
              <a class="nav-link text-white" href="{{ route('contact.index') }}">
                <div>お問い合わせ</div>
              </a>
              @if(Auth::guard('member')->check())
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person me-1"></i>
                    {{ Auth::guard('admin')->user()->name ?? '' }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navDropdownMenuLink">
                    <li><a class="dropdown-item text-white" href="#">マイページ</a></li>
                  </ul>
                </li>
              @else
                <a class="nav-item nav-link navbar-menu text-white" href="{{ route('register.form') }}">
                  <div>無料お試し</div>
                </a>
                <a class="nav-item nav-link navbar-menu text-white" href="{{ route('register.form') }}">
                  <div>ログイン</div>
                </a>
              @endif

            </ul>
          </div>
        </div>
      </div>
    </div>
{{--  </div>--}}
</nav>
</header>
