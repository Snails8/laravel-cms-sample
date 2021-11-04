<nav class="sidebar">

  <p class="fw-bolder px-3 mt-3 mb-0">メイン</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.usage_case.index') }}">
        <i class="bi bi-caret-right me-1"></i>導入事例
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.news.index') }}">
        <i class="bi bi-caret-right me-1"></i>お知らせ管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>Sample管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>Sample管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>Sample管理
      </a>
    </li>
  </ul>

  <p class="fw-bolder px-3 mt-3 mb-0">サービス管理</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.hr_company.index') }}">
        <i class="bi bi-caret-right me-1"></i>利用会社一覧
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>サンプル管理
      </a>
    </li>
  </ul>

  <p class="fw-bolder px-3 mt-3 mb-0">お問い合わせマスタ</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.contact.index') }}">
        <i class="bi bi-caret-right me-1"></i>お問い合わせ管理
      </a>
    </li>
  </ul>

  <p class="fw-bolder px-3 mt-3 mb-0">自社情報</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.company.edit', ['company' => 1 ]) }}">
        <i class="bi bi-caret-right me-1"></i>自社情報管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.office.index') }}">
        <i class="bi bi-caret-right me-1"></i>事務所管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.user.index') }}">
        <i class="bi bi-caret-right me-1"></i>ユーザー管理
      </a>
    </li>
  </ul>

  <p class="fw-bolder px-3 mt-3 mb-0">カテゴリ管理</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.news_category.index') }}">
        <i class="bi bi-caret-right me-1"></i>お知らせカテゴリ管理
      </a>
    </li>
  </ul>

{{--  <p class="fw-bolder px-3 mt-3 mb-0">サンプル</p>--}}
{{--  <ul class="nav flex-column accordion" id="nav_accordion">--}}

{{--    <li class="nav-item ps-2">--}}
{{--      <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item3" aria-controls="menu_item2" aria-expanded="true" href="#">--}}
{{--        Sample Manage<i class="bi bi-caret-down-fill ms-1"></i>--}}
{{--      </a>--}}
{{--      <ul id="menu_item3" class="submenu collapse accordion-collapse show" data-bs-parent="#nav_accordion">--}}
{{--        <li><a class="nav-link" href=""><i class="bi bi-chevron-right me-1"></i>Sample</a></li>--}}
{{--      </ul>--}}
{{--      <ul id="menu_item3" class="submenu collapse accordion-collapse show" data-bs-parent="#nav_accordion">--}}
{{--        <li><a class="nav-link" href=""><i class="bi bi-chevron-right me-1"></i>Sample</a></li>--}}
{{--      </ul>--}}
{{--      <ul id="menu_item3" class="submenu collapse accordion-collapse show" data-bs-parent="#nav_accordion">--}}
{{--        <li><a class="nav-link" href=""><i class="bi bi-chevron-right me-1"></i>Sample</a></li>--}}
{{--      </ul>--}}
{{--    </li>--}}

{{--    <li class="nav-item ps-2">--}}
{{--      <a class="nav-link" href="#">メニュー1</a>--}}
{{--    </li>--}}

{{--    <li class="nav-item ps-2">--}}
{{--      <a class="nav-link" href="">--}}
{{--        <i class="bi bi-caret-right me-1"></i>Sample--}}
{{--      </a>--}}
{{--    </li>--}}
{{--  </ul>--}}

</nav>
