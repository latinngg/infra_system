
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  .cl-wrap * { box-sizing: border-box; }

  .cl-wrap {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f0f4f8;
    padding: 1.5rem;
  }

  .cl-page {
    width: 100%;
    margin: 0 auto;
  }

  /* ── MAIN ── */
  .cl-main { flex: 1; min-width: 0; }

  .cl-header {
    background: #1a56db;
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 12px;
    position: relative;
    overflow: hidden;
  }

  .cl-header::before {
    content: '';
    position: absolute;
    top: -30px; right: -30px;
    width: 120px; height: 120px;
    border-radius: 50%;
    background: rgba(255,255,255,0.07);
  }

  .cl-header-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    position: relative;
    margin-bottom: 6px;
  }

  .cl-header-tag {
    font-size: 10px;
    font-weight: 600;
    color: rgba(255,255,255,0.85);
    line-height: 1.4;
  }

  .cl-header-code {
    font-size: 10px;
    font-weight: 600;
    color: rgba(255,255,255,0.85);
    text-align: right;
    line-height: 1.4;
  }

  .cl-header h1 { font-size: 40px; font-weight: 600; color: #fff; text-align: center; margin: 0; }

  .cl-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
  }

  .cl-section-header { display: flex; align-items: center; gap: 8px; margin-bottom: 1rem; }
  .cl-section-header i { font-size: 15px; color: #1a56db; }
  .cl-section-header h2 { font-size: 11px; font-weight: 700; color: #1e293b; text-transform: uppercase; letter-spacing: .8px; margin: 0; }

  .cl-divider { height: 1px; background: #f1f5f9; margin: 1rem 0; }

  .cl-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px; }
  .cl-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; margin-bottom: 10px; }

  .cl-field { display: flex; flex-direction: column; gap: 4px; }
  .cl-field label { font-size: 11px; font-weight: 600; color: #475569; }

  .cl-field input[type=text],
  .cl-field input[type=date],
  .cl-field textarea {
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

  .cl-field input[type=text]:focus,
  .cl-field input[type=date]:focus,
  .cl-field textarea:focus {
    border-color: #1a56db;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(26,86,219,0.1);
  }

  .cl-field textarea { resize: vertical; min-height: 90px; line-height: 1.5; }

  /* ── CHECKLIST ITEMS ── */
  .cl-checks-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 6px; }

  .cl-check-item {
    display: flex; align-items: center; gap: 8px;
    padding: 9px 11px;
    border: 1px solid #e2e8f0; border-radius: 8px;
    cursor: pointer; transition: all .15s; user-select: none;
  }

  .cl-check-item:hover { border-color: #94a3b8; background: #f8fafc; }
  .cl-check-item.checked { border-color: #1a56db; background: rgba(26,86,219,0.05); }

  .cl-cb {
    width: 15px; height: 15px;
    border: 1.5px solid #94a3b8; border-radius: 4px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; transition: all .15s;
  }

  .cl-check-item.checked .cl-cb { background: #1a56db; border-color: #1a56db; }
  .cl-cb i { font-size: 10px; color: #fff; display: none; }
  .cl-check-item.checked .cl-cb i { display: block; }
  .cl-check-item span.cl-check-label { font-size: 12px; color: #1e293b; }

  /* ── INSPECTION ROWS ── */
  .cl-inspect-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 4px;
    border-bottom: 1px solid #f1f5f9;
    gap: 12px;
  }

  .cl-inspect-row:last-child { border-bottom: none; }

  .cl-inspect-label { font-size: 12px; font-weight: 600; color: #1e293b; }

  .cl-inspect-options { display: flex; gap: 6px; flex-shrink: 0; }

  .cl-inspect-pill {
    padding: 5px 16px;
    border: 1px solid #cbd5e1; border-radius: 100px;
    font-size: 11px; font-weight: 600; cursor: pointer;
    color: #475569; transition: all .15s; user-select: none;
  }

  .cl-inspect-pill:hover { border-color: #1a56db; color: #1a56db; }
  .cl-inspect-pill.selected-ok { background: #059669; border-color: #059669; color: #fff; }
  .cl-inspect-pill.selected-notok { background: #e24b4a; border-color: #e24b4a; color: #fff; }

  /* ── REMINDERS ── */
  .cl-reminder {
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-radius: 8px;
    padding: 12px 14px;
    display: flex;
    gap: 10px;
    align-items: flex-start;
  }

  .cl-reminder i { color: #d97706; font-size: 16px; margin-top: 1px; }
  .cl-reminder p { font-size: 11.5px; color: #78350f; line-height: 1.6; margin: 0; }

  .cl-actions { display: flex; gap: 7px; margin-top: 1rem; }

  .cl-btn {
    padding: 9px 18px; border-radius: 8px;
    font-size: 12px; font-weight: 600; cursor: pointer;
    border: 1px solid; font-family: inherit;
    display: flex; align-items: center; gap: 5px; transition: all .15s;
  }

  .cl-btn-primary { background: #1a56db; border-color: #1a56db; color: #fff; }
  .cl-btn-primary:hover { background: #1e40af; border-color: #1e40af; }
  .cl-btn-outline { background: transparent; border-color: #cbd5e1; color: #1e293b; }
  .cl-btn-outline:hover { background: #f8fafc; }

  @media (max-width: 860px) {
    .cl-grid-3 { grid-template-columns: 1fr; }
    .cl-checks-grid { grid-template-columns: 1fr; }
    .cl-inspect-row { flex-direction: column; align-items: flex-start; gap: 6px; }
  }

  @media print {
    .cl-actions, .no-print { display: none !important; }
    .cl-wrap { background: #fff; padding: 0; }
  }
</style>

<div class="cl-wrap">
  <div class="cl-page">

    <!-- MAIN -->
    <div class="cl-main">

      <div class="cl-header">
        <div class="cl-header-top">
          <div class="cl-header-tag">GA Division<br>IT</div>
          <div class="cl-header-code">TMF-G0054<br>Version 1.00</div>
        </div>
        <h1>COMPUTER PREVENTIVE MAINTENANCE CHECKLIST</h1>
      </div>

      <form action="{{ route('pm-checklist.store') }}" method="POST">
      

        <!-- USER INFO -->
        <div class="cl-card">
          <div class="cl-section-header">
            <i class="ti ti-id-badge"></i>
            <h2>User information</h2>
          </div>
          <div class="cl-grid-2">
            <div class="cl-field">
              <label>Name of User</label>
              <input type="text" name="user_signature">
            </div>
            <div class="cl-field">
              <label>Date</label>
              <input type="date" name="date" value="{{ old('date') }}">
            </div>
          </div>
          <div class="cl-grid-3">
            <div class="cl-field">
              <label>Conducted by</label>
              <input type="text" name="conducted_by" >
            </div>
            <div class="cl-field">
              <label>Department</label>
              <input type="text" name="department" >
            </div>
            <div class="cl-field">
              <label>PC No.</label>
              <input type="text" name="pc_no" value="TFXC-0000">
            </div>
          </div>
          <div class="cl-grid-3">
            <div class="cl-field">
              <label>Factory No.</label>
              <input type="text" name="factory_no" >
            </div>
          </div>
        </div>

        <!-- MAINTENANCE CHECKLIST -->
        <div class="cl-card">
          <div class="cl-section-header">
            <i class="ti ti-list-check"></i>
            <h2>Maintenance tasks</h2>
          </div>
          <div class="cl-checks-grid" id="cl-checks-grid">
            <label class="cl-check-item" data-role="check-option">
              <input type="checkbox" name="clean_dust" value="1" style="display:none" {{ old('clean_dust') ? 'checked' : '' }}>
              <div class="cl-cb"><i class="ti ti-check"></i></div>
              <span class="cl-check-label">Clean dust on CPU</span>
            </label>
            <label class="cl-check-item" data-role="check-option">
              <input type="checkbox" name="delete_temp" value="1" style="display:none" {{ old('delete_temp') ? 'checked' : '' }}>
              <div class="cl-cb"><i class="ti ti-check"></i></div>
              <span class="cl-check-label">Delete temp / junk files</span>
            </label>
            <label class="cl-check-item" data-role="check-option">
              <input type="checkbox" name="antivirus_scan" value="1" style="display:none" {{ old('antivirus_scan') ? 'checked' : '' }}>
              <div class="cl-cb"><i class="ti ti-check"></i></div>
              <span class="cl-check-label">Antivirus scan</span>
            </label>
            <label class="cl-check-item" data-role="check-option">
              <input type="checkbox" name="disable_hotspot" value="1" style="display:none" {{ old('disable_hotspot') ? 'checked' : '' }}>
              <div class="cl-cb"><i class="ti ti-check"></i></div>
              <span class="cl-check-label">Disable hotspot</span>
            </label>
            <label class="cl-check-item" data-role="check-option">
              <input type="checkbox" name="windows_update" value="1" style="display:none" {{ old('windows_update') ? 'checked' : '' }}>
              <div class="cl-cb"><i class="ti ti-check"></i></div>
              <span class="cl-check-label">Windows update (optional)</span>
            </label>
            <label class="cl-check-item" data-role="check-option">
              <input type="checkbox" name="remove_program" value="1" style="display:none" {{ old('remove_program') ? 'checked' : '' }}>
              <div class="cl-cb"><i class="ti ti-check"></i></div>
              <span class="cl-check-label">Remove / uninstall unwanted program</span>
            </label>
          </div>
        </div>

        <!-- INSPECTION -->
        <div class="cl-card">
          <div class="cl-section-header">
            <i class="ti ti-device-laptop"></i>
            <h2>Inspection</h2>
          </div>

          <div class="cl-inspect-row" data-field="monitor">
            <span class="cl-inspect-label">Check monitor / screen for defect</span>
            <div class="cl-inspect-options">
              <div class="cl-inspect-pill" data-value="OK">OK</div>
              <div class="cl-inspect-pill" data-value="Not OK">Not OK</div>
            </div>
          </div>
          <div class="cl-inspect-row" data-field="charger">
            <span class="cl-inspect-label">Check charger for defect</span>
            <div class="cl-inspect-options">
              <div class="cl-inspect-pill" data-value="OK">OK</div>
              <div class="cl-inspect-pill" data-value="Not OK">Not OK</div>
            </div>
          </div>
          <div class="cl-inspect-row" data-field="keyboard">
            <span class="cl-inspect-label">Check keyboard casing</span>
            <div class="cl-inspect-options">
              <div class="cl-inspect-pill" data-value="OK">OK</div>
              <div class="cl-inspect-pill" data-value="Not OK">Not OK</div>
            </div>
          </div>
          <div class="cl-inspect-row" data-field="lan">
            <span class="cl-inspect-label">Check LAN connection</span>
            <div class="cl-inspect-options">
              <div class="cl-inspect-pill" data-value="OK">OK</div>
              <div class="cl-inspect-pill" data-value="Not OK">Not OK</div>
            </div>
          </div>
          <div class="cl-inspect-row" data-field="battery">
            <span class="cl-inspect-label">Check battery life</span>
            <div class="cl-inspect-options">
              <div class="cl-inspect-pill" data-value="OK">OK</div>
              <div class="cl-inspect-pill" data-value="Not OK">Not OK</div>
            </div>
          </div>

          <input type="hidden" name="monitor" id="cl-hidden-monitor" value="{{ old('monitor') }}">
          <input type="hidden" name="charger" id="cl-hidden-charger" value="{{ old('charger') }}">
          <input type="hidden" name="keyboard" id="cl-hidden-keyboard" value="{{ old('keyboard') }}">
          <input type="hidden" name="lan" id="cl-hidden-lan" value="{{ old('lan') }}">
          <input type="hidden" name="battery" id="cl-hidden-battery" value="{{ old('battery') }}">
        </div>

        <!-- OTHERS -->
        <div class="cl-card">
          <div class="cl-section-header">
            <i class="ti ti-note"></i>
            <h2>Others</h2>
          </div>
          <div class="cl-field">
            <textarea name="others" rows="5"> NOTE: Other issues related computer including hardware.

            </textarea>
          </div>

          <div class="cl-divider"></div>

          <div class="cl-reminder">
            <i class="ti ti-alert-circle"></i>
            <p>
              <strong>Reminders:</strong> Must bring the following tools to perform the Computer
              Preventive Maintenance (CPM): screwdriver, brush, blower, eraser, crimper and RJ45.
            </p>
          </div>
        </div>

        <div class="cl-actions no-print">
          <button type="submit" class="cl-btn cl-btn-primary">
            <i class="ti ti-device-floppy"></i> Save checklist
          </button>
          <button type="button" onclick="window.print()" class="cl-btn cl-btn-outline">
            <i class="ti ti-printer"></i> Print
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
  // Checklist checkbox toggle
  document.querySelectorAll('#cl-checks-grid .cl-check-item').forEach(function (item) {
    var input = item.querySelector('input[type=checkbox]');
    if (input.checked) item.classList.add('checked');

    item.addEventListener('click', function (e) {
      e.preventDefault();
      input.checked = !input.checked;
      item.classList.toggle('checked', input.checked);
    });
  });

  // Inspection OK / Not OK pills
  document.querySelectorAll('.cl-inspect-row').forEach(function (row) {
    var field = row.getAttribute('data-field');
    var hidden = document.getElementById('cl-hidden-' + field);
    var pills = row.querySelectorAll('.cl-inspect-pill');

    function sync() {
      pills.forEach(function (p) {
        p.classList.remove('selected-ok', 'selected-notok');
        if (p.getAttribute('data-value') === hidden.value) {
          p.classList.add(p.getAttribute('data-value') === 'OK' ? 'selected-ok' : 'selected-notok');
        }
      });
    }

    pills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        hidden.value = pill.getAttribute('data-value');
        sync();
      });
    });

    sync();
  });
</script>
@endsection