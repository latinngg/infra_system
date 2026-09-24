<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'IT Forms') | IT Portal</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  :root { --sb-w: 250px; --top-h: 52px; --blue: #1a56db; }

  body { font-family: 'Segoe UI', Arial, sans-serif; background: #f0f4f8; min-height: 100vh; }

  /* ── TOP HEADER ── */
  .app-header {
    position: fixed; top: 0; left: 0; right: 0; height: var(--top-h);
    background: #fff; border-bottom: 1px solid #e2e8f0;
    display: flex; align-items: center; gap: 12px;
    padding: 0 16px; z-index: 50;
  }
  .app-header .menu-btn {
    display: none; background: none; border: none; cursor: pointer;
    font-size: 22px; color: #1e293b;
  }
  .app-header .brand { display: flex; align-items: center; gap: 8px; width: calc(var(--sb-w) - 16px); }
  .brand-logo {
    width: 30px; height: 30px; border-radius: 8px; background: var(--blue);
    display: flex; align-items: center; justify-content: center; color: #fff; font-size: 16px;
  }
  .brand span { font-size: 14px; font-weight: 700; color: #1e293b; }
  .page-title { font-size: 13px; font-weight: 600; color: #64748b; }

  /* ── SIDE PANEL ── */
  .app-sidebar {
    position: fixed; top: var(--top-h); left: 0; bottom: 0; width: var(--sb-w);
    background: #fff; border-right: 1px solid #e2e8f0;
    padding: 14px 10px; overflow-y: auto; z-index: 40;
    transition: transform .2s;
  }
  .nav-label {
    font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase;
    letter-spacing: .8px; padding: 6px 10px; margin-top: 6px;
  }
  .nav-link {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 10px; border-radius: 8px; margin-bottom: 2px;
    font-size: 13px; font-weight: 500; color: #475569; text-decoration: none;
    transition: background .15s, color .15s;
  }
  .nav-link i { font-size: 17px; color: #94a3b8; }
  .nav-link:hover { background: #f1f5f9; color: #1e293b; }
  .nav-link.active { background: rgba(26,86,219,.08); color: var(--blue); font-weight: 600; }
  .nav-link.active i { color: var(--blue); }

  /* ── CONTENT ── */
  .app-content { margin-left: var(--sb-w); padding: calc(var(--top-h) + 20px) 20px 24px; }
  .app-backdrop { display: none; }

  @media (max-width: 860px) {
    .app-header .menu-btn { display: block; }
    .app-header .brand { width: auto; }
    .app-sidebar { transform: translateX(-100%); }
    body.sb-open .app-sidebar { transform: none; box-shadow: 4px 0 20px rgba(0,0,0,.12); }
    body.sb-open .app-backdrop {
      display: block; position: fixed; inset: var(--top-h) 0 0 0;
      background: rgba(15,23,42,.35); z-index: 30;
    }
    .app-content { margin-left: 0; padding-left: 12px; padding-right: 12px; }
  }

  @media print {
    .app-header, .app-sidebar, .app-backdrop { display: none !important; }
    .app-content { margin: 0; padding: 0; }
    body { background: #fff; }
  }
</style>
@stack('styles')
</head>
<body>

@php
  $nav = [
    ['route' => 'job-request.form',           'match' => 'job-request.*',            'icon' => 'ti-tool',           'label' => 'Job Request'],
    ['route' => 'asset-handover.form',        'match' => 'asset-handover.*',         'icon' => 'ti-package',        'label' => 'Assets Handover'],
    ['route' => 'hardware-software.form',     'match' => 'hardware-software.*',      'icon' => 'ti-device-desktop', 'label' => 'Hardware & Software'],
    ['route' => 'annual-plan.form',           'match' => 'annual-plan.*',            'icon' => 'ti-calendar-stats', 'label' => 'PM Annual Plan'],
    ['route' => 'pm-checklist.form',          'match' => 'pm-checklist.*',           'icon' => 'ti-list-check',     'label' => 'PM Checklist']
  ];
@endphp

<header class="app-header">
  <button class="menu-btn" onclick="document.body.classList.toggle('sb-open')" aria-label="Toggle menu">
    <i class="ti ti-menu-2"></i>
  </button>
  <div class="brand">
    <div class="brand-logo"><i class="ti ti-server-cog"></i></div>
    <span>IT Portal</span>
  </div>
  <div class="page-title">@yield('title')</div>
</header>

<aside class="app-sidebar">
  <div class="nav-label">Requests</div>
  <a href="{{ route($nav[0]['route']) }}" class="nav-link {{ request()->routeIs($nav[0]['match']) ? 'active' : '' }}">
    <i class="ti {{ $nav[0]['icon'] }}"></i> {{ $nav[0]['label'] }}
  </a>

  <div class="nav-label">Assets</div>
  @foreach (array_slice($nav, 1, 2) as $item)
    <a href="{{ route($item['route']) }}" class="nav-link {{ request()->routeIs($item['match']) ? 'active' : '' }}">
      <i class="ti {{ $item['icon'] }}"></i> {{ $item['label'] }}
    </a>
  @endforeach

  <div class="nav-label">Preventive Maintenance</div>
  @foreach (array_slice($nav, 3) as $item)
    <a href="{{ route($item['route']) }}" class="nav-link {{ request()->routeIs($item['match']) ? 'active' : '' }}">
      <i class="ti {{ $item['icon'] }}"></i> {{ $item['label'] }}
    </a>
  @endforeach
</aside>
<div class="app-backdrop" onclick="document.body.classList.remove('sb-open')"></div>

<main class="app-content">
  @yield('content')
</main>

@stack('scripts')
</body>
</html>