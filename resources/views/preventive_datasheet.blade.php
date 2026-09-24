<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"> -->

@extends('layouts.app')
@section('title', 'Assets Handover')

@push('styles')
<style>
  .pm-wrap * { box-sizing: border-box; }

  .pm-wrap {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f0f4f8;
    padding: 1.5rem;
  }

  .pm-page {
    width: 100%;
    margin: 0 auto;
  }

  /* ── MAIN ── */
  .pm-main { flex: 1; min-width: 0; }

  .pm-header {
    background: #1a56db;
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 12px;
    position: relative;
    overflow: hidden;
  }

  .pm-header::before {
    content: '';
    position: absolute;
    top: -30px; right: -30px;
    width: 120px; height: 120px;
    border-radius: 50%;
    background: rgba(255,255,255,0.07);
  }

  .pm-header h1 { font-size: 40px; font-weight: 600; color: #fff; text-align: center; margin: 0; }

  .pm-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
  }

  .pm-section-header { display: flex; align-items: center; gap: 8px; margin-bottom: 1rem; }
  .pm-section-header i { font-size: 15px; color: #1a56db; }
  .pm-section-header h2 { font-size: 11px; font-weight: 700; color: #1e293b; text-transform: uppercase; letter-spacing: .8px; margin: 0; }

  .pm-divider { height: 1px; background: #f1f5f9; margin: 1rem 0; }

  .pm-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px; }
  .pm-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 10px; }

  .pm-field { display: flex; flex-direction: column; gap: 4px; }
  .pm-field label { font-size: 11px; font-weight: 600; color: #475569; }

  .pm-field input[type=text],
  .pm-field input[type=date],
  .pm-field textarea {
    font-size: 12px;
    padding: 7px 9px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    background: #f8fafc;
    color: #1e293b;
    outline: none;
    font-family: inherit;
    width: 100%;
    transition: border-color .15s, box-shadow .15s;
  }

  .pm-field input[type=text]:focus,
  .pm-field input[type=date]:focus,
  .pm-field textarea:focus {
    border-color: #1a56db;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(26,86,219,0.1);
  }

  .pm-field textarea { resize: vertical; min-height: 80px; line-height: 1.5; }

  /* Device type – card-style radio, echoing the "purpose" cards */
  .pm-device-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; max-width: 320px; }

  .pm-device-card {
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 10px;
    cursor: pointer;
    transition: all .15s;
    position: relative;
    text-align: center;
  }

  .pm-device-card:hover { border-color: #1a56db; background: rgba(26,86,219,0.04); }
  .pm-device-card.selected { border: 2px solid #1a56db; background: rgba(26,86,219,0.06); }
  .pm-device-card .p-icon { font-size: 18px; color: #94a3b8; margin-bottom: 4px; display: block; }
  .pm-device-card.selected .p-icon { color: #1a56db; }
  .pm-device-card p { font-size: 11px; font-weight: 500; color: #1e293b; margin: 0; }

  .pm-device-check {
    position: absolute; top: 6px; right: 6px;
    width: 14px; height: 14px;
    border-radius: 50%; background: #1a56db;
    display: none; align-items: center; justify-content: center;
  }

  .pm-device-card.selected .pm-device-check { display: flex; }
  .pm-device-check i { font-size: 9px; color: #fff; }

  .pm-actions { display: flex; gap: 7px; margin-top: 1rem; }

  .pm-btn {
    padding: 9px 18px; border-radius: 8px;
    font-size: 12px; font-weight: 600; cursor: pointer;
    border: 1px solid; font-family: inherit;
    display: flex; align-items: center; gap: 5px; transition: all .15s;
  }

  .pm-btn-primary { background: #1a56db; border-color: #1a56db; color: #fff; }
  .pm-btn-primary:hover { background: #1e40af; border-color: #1e40af; }

  @media (max-width: 860px) {
    .pm-grid-4 { grid-template-columns: 1fr 1fr; }
  }
</style>
@endpush

@section('content')
<div class="pm-wrap">
  <div class="pm-page">

    <!-- MAIN -->
    <div class="pm-main">

      <div class="pm-header">
        <h1>COMPUTER PREVENTIVE MAINTENANCE DATA SHEET</h1>
      </div>

      <form action="{{ route('preventive-maintenance.store') }}" method="POST">
      @csrf

        <!-- BASIC INFO -->
        <div class="pm-card">
          <div class="pm-section-header">
            <i class="ti ti-id-badge"></i>
            <h2>Basic information</h2>
          </div>
          <div class="pm-grid-2">
            <div class="pm-field">
              <label>PC No.</label>
              <input type="text" name="pc_no" >
            </div>
            <div class="pm-field">
              <label>Date</label>
              <input type="date" name="date" >
            </div>
          </div>
          <div class="pm-grid-2">
            <div class="pm-field">
              <label>Name of user</label>
              <input type="text" name="user_name" >
            </div>
            <div class="pm-field">
              <label>ID No.</label>
              <input type="text" name="id_no" >
            </div>
          </div>
          <div class="pm-grid-2">
            <div class="pm-field">
              <label>Department</label>
              <input type="text" name="department" >
            </div>
            <div class="pm-field">
              <label>Factory No.</label>
              <input type="text" name="factory_no" >
            </div>
          </div>
        </div>

        <!-- SCOPE + DEVICE TYPE -->
        <div class="pm-card">
          <div class="pm-section-header">
            <i class="ti ti-clipboard-text"></i>
            <h2>Scope of work</h2>
          </div>
          <div class="pm-field">
            <textarea name="scope_of_work">{{ old('scope_of_work') }}</textarea>
          </div>

          <div class="pm-divider"></div>

          <div class="pm-section-header">
            <i class="ti ti-devices"></i>
            <h2>Device type</h2>
          </div>
          <div class="pm-device-grid" id="pm-device-grid">
            <label class="pm-device-card" data-role="device-option">
              <input type="radio" name="device_type" value="Laptop" style="display:none" {{ old('device_type') === 'Laptop' ? 'checked' : '' }}>
              <div class="pm-device-check"><i class="ti ti-check"></i></div>
              <i class="ti ti-device-laptop p-icon"></i>
              <p>Laptop</p>
            </label>
            <label class="pm-device-card" data-role="device-option">
              <input type="radio" name="device_type" value="Desktop" style="display:none" {{ old('device_type') === 'Desktop' ? 'checked' : '' }}>
              <div class="pm-device-check"><i class="ti ti-check"></i></div>
              <i class="ti ti-device-desktop p-icon"></i>
              <p>Desktop</p>
            </label>
          </div>
        </div>

        <!-- HARDWARE INFO -->
        <div class="pm-card">
          <div class="pm-section-header">
            <i class="ti ti-cpu"></i>
            <h2>Hardware information</h2>
          </div>
          <div class="pm-grid-4">
            <div class="pm-field">
              <label>HDD / SSD / NVME</label>
              <input type="text" name="storage" >
            </div>
            <div class="pm-field">
              <label>Motherboard</label>
              <input type="text" name="motherboard" >
            </div>
            <div class="pm-field">
              <label>RAM brand / model</label>
              <input type="text" name="ram_brand" >
            </div>
            <div class="pm-field">
              <label>RAM capacity</label>
              <input type="text" name="ram_capacity" >
            </div>
          </div>
          <div class="pm-grid-4">
            <div class="pm-field">
              <label>Operating system</label>
              <input type="text" name="operating_system">
            </div>
            <div class="pm-field">
              <label>OS version</label>
              <input type="text" name="os_version" >
            </div>
            <div class="pm-field">
              <label>MS Office</label>
              <input type="text" name="ms_office" >
            </div>
            <div class="pm-field">
              <label>Office version</label>
              <input type="text" name="office_version" >
            </div>
          </div>
          <div class="pm-grid-4">
            <div class="pm-field">
              <label>OS environment</label>
              <input type="text" name="os_environment" >
            </div>
            <div class="pm-field">
              <label>PC brand</label>
              <input type="text" name="pc_brand" >
            </div>
            <div class="pm-field">
              <label>Processor</label>
              <input type="text" name="processor" >
            </div>
            <div class="pm-field">
              <label>Serial number</label>
              <input type="text" name="serial_number" >
            </div>
          </div>
        </div>

        <!-- PROBLEMS + RECOMMENDATIONS -->
        <div class="pm-card">
          <div class="pm-section-header">
            <i class="ti ti-alert-triangle"></i>
            <h2>Problems encountered</h2>
          </div>
          <div class="pm-field">
            <textarea name="problems" rows="4"></textarea>
          </div>

          <div class="pm-divider"></div>

          <div class="pm-section-header">
            <i class="ti ti-bulb"></i>
            <h2>Recommendations</h2>
          </div>
          <div class="pm-field">
            <textarea name="recommendations" rows="4"></textarea>
          </div>
        </div>

        <!-- SIGN-OFF -->
        <div class="pm-card">
          <div class="pm-section-header">
            <i class="ti ti-writing-sign"></i>
            <h2>Sign-off</h2>
          </div>
          <div class="pm-grid-2">
            <div class="pm-field">
              <label>PM conducted by</label>
              <input type="text" name="pm_conducted_by" >
            </div>
            <div class="pm-field">
              <label>PM confirmed by</label>
              <input type="text" name="pm_confirmed_by" >
            </div>
          </div>
        </div>

        <div class="pm-actions">
          <button type="submit" class="pm-btn pm-btn-primary">
            <i class="ti ti-device-floppy"></i> Save
          </button>
        </div>

      </form>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  // Card-style radio selection for device type
  document.querySelectorAll('#pm-device-grid .pm-device-card').forEach(function (card) {
    var input = card.querySelector('input[type=radio]');
    if (input.checked) card.classList.add('selected');

    card.addEventListener('click', function () {
      document.querySelectorAll('#pm-device-grid .pm-device-card').forEach(function (c) {
        c.classList.remove('selected');
      });
      input.checked = true;
      card.classList.add('selected');
    });
  });
</script>
@endpush