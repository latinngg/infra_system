
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  .hw-wrap * { box-sizing: border-box; }

  .hw-wrap {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f0f4f8;
    padding: 1.5rem;
  }

  .hw-page {
    width: 100%;
    margin: 0 auto;
  }

  .hw-header {
    background: #1a56db;
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 12px;
    position: relative;
    overflow: hidden;
  }

  .hw-header::before {
    content: '';
    position: absolute;
    top: -30px; right: -30px;
    width: 120px; height: 120px;
    border-radius: 50%;
    background: rgba(255,255,255,0.07);
  }

  .hw-header-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    position: relative;
    margin-bottom: 6px;
  }

  .hw-header-tag,
  .hw-header-code {
    font-size: 10px;
    font-weight: 600;
    color: rgba(255,255,255,0.85);
    line-height: 1.4;
  }

  .hw-header-code { text-align: right; }

  .hw-header h1 { font-size: 40px; font-weight: 600; color: #fff; text-align: center; margin: 0; }

  .hw-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
  }

  .hw-section-header { display: flex; align-items: center; gap: 8px; margin-bottom: 1rem; }
  .hw-section-header i { font-size: 15px; color: #1a56db; }
  .hw-section-header h2 { font-size: 11px; font-weight: 700; color: #1e293b; text-transform: uppercase; letter-spacing: .8px; margin: 0; }

  .hw-divider { height: 1px; background: #f1f5f9; margin: 1rem 0; }

  .hw-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px; }

  .hw-field { display: flex; flex-direction: column; gap: 4px; margin-bottom: 10px; }
  .hw-field:last-child { margin-bottom: 0; }
  .hw-field label { font-size: 11px; font-weight: 600; color: #475569; }

  .hw-field input[type=text],
  .hw-field input[type=date] {
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

  .hw-field input[type=text]:focus,
  .hw-field input[type=date]:focus {
    border-color: #1a56db;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(26,86,219,0.1);
  }

  /* ── REQUEST TYPE PILLS ── */
  .hw-pills { display: flex; gap: 6px; flex-wrap: wrap; }

  .hw-pill {
    padding: 6px 18px;
    border: 1px solid #cbd5e1; border-radius: 100px;
    font-size: 12px; font-weight: 600; cursor: pointer;
    color: #475569; transition: all .15s; user-select: none;
  }

  .hw-pill:hover { border-color: #1a56db; color: #1a56db; }
  .hw-pill.selected { background: #1a56db; border-color: #1a56db; color: #fff; }

  /* ── APPROVAL ── */
  .hw-approval-row { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; }

  .hw-sig-box {
    border: 1px dashed #cbd5e1; border-radius: 8px;
    height: 52px; display: flex; align-items: center; justify-content: center;
    margin-top: 5px; background: #f8fafc;
  }

  .hw-sig-box span { font-size: 10px; color: #94a3b8; font-style: italic; }

  .hw-sig-role { font-size: 10px; color: #64748b; margin-top: 4px; display: block; }

  .hw-actions { display: flex; gap: 7px; margin-top: 1rem; }

  .hw-btn {
    padding: 9px 18px; border-radius: 8px;
    font-size: 12px; font-weight: 600; cursor: pointer;
    border: 1px solid; font-family: inherit;
    display: flex; align-items: center; gap: 5px; transition: all .15s;
  }

  .hw-btn-primary { background: #1a56db; border-color: #1a56db; color: #fff; }
  .hw-btn-primary:hover { background: #1e40af; border-color: #1e40af; }
  .hw-btn-outline { background: transparent; border-color: #cbd5e1; color: #1e293b; }
  .hw-btn-outline:hover { background: #f8fafc; }

  @media (max-width: 640px) {
    .hw-grid-2 { grid-template-columns: 1fr; }
    .hw-approval-row { grid-template-columns: 1fr; }
  }

  @media print {
    .hw-actions, .no-print { display: none !important; }
    .hw-wrap { background: #fff; padding: 0; }
  }
</style>

<div class="hw-wrap">
  <div class="hw-page">

    <div class="hw-header">
      <div class="hw-header-top">
        <div class="hw-header-tag">GA Division<br>IT</div>
        <div class="hw-header-code">TMF-G0061<br>Version 3.00</div>
      </div>
      <h1>HARDWARE &amp; SOFTWARE REGISTRATION FORM</h1>
    </div>

    <form action="{{ route('hardware-software.store') }}" method="POST">

      <!-- IT SECTION -->
      <div class="hw-card">
        <div class="hw-section-header">
          <i class="ti ti-tool"></i>
          <h2>To be filled out by IT</h2>
        </div>
        <div class="hw-grid-2">
          <div class="hw-field">
            <label>Registration control no. (Ex. HSR-yyyy-mm-0001) </label>
            <input type="text" name="registration_no" placeholder="HSR-yyyy-mm-0001">
          </div>
          <div class="hw-field">
            <label>Date of registration</label>
            <input type="date" name="registration_date">
          </div>
        </div>
      </div>

      <!-- REQUEST TYPE -->
      <div class="hw-card">
        <div class="hw-section-header">
          <i class="ti ti-list-check"></i>
          <h2>Request type</h2>
        </div>
        <div class="hw-pills" id="hw-request-type">
          <div class="hw-pill" data-value="Registration">Registration</div>
          <div class="hw-pill" data-value="Cancellation">Cancellation</div>
        </div>
        <input type="hidden" name="request_type" id="hw-hidden-request-type">
      </div>

      <!-- DETAILS -->
      <div class="hw-card">
        <div class="hw-section-header">
          <i class="ti ti-devices"></i>
          <h2>Details</h2>
        </div>
        <div class="hw-field">
          <label>Hardware / software name</label>
          <input type="text" name="hardware_name" >
        </div>
        <div class="hw-grid-2">
          <div class="hw-field">
            <label>Model / version</label>
            <input type="text" name="model_version" >
          </div>
          <div class="hw-field">
            <label>Brand / maker</label>
            <input type="text" name="brand" >
          </div>
        </div>
        <div class="hw-grid-2">
          <div class="hw-field">
            <label>Vendor</label>
            <input type="text" name="vendor" >
          </div>
          <div class="hw-field">
            <label>Invoice no.</label>
            <input type="text" name="invoice_no" >
          </div>
        </div>
        <div class="hw-grid-2">
          <div class="hw-field">
            <label>Date of delivery</label>
            <input type="date" name="delivery_date" >
          </div>
          <div class="hw-field">
            <label>Serial no.</label>
            <input type="text" name="serial_no" >
          </div>
        </div>
        <div class="hw-field">
          <label>Product key (software)</label>
          <input type="text" name="product_key">
        </div>
        <div class="hw-grid-2">
          <div class="hw-field">
            <label>Installed to computer no.</label>
            <input type="text" name="computer_no" >
          </div>
          <div class="hw-field">
            <label>Using division</label>
            <input type="text" name="using_division" >
          </div>
        </div>
        <div class="hw-grid-2">
          <div class="hw-field">
            <label>User ID / name</label>
            <input type="text" name="user_name" >
          </div>
          <div class="hw-field">
            <label>Computer name</label>
            <input type="text" name="computer_name" >
          </div>
        </div>
      </div>

      <!-- APPROVAL -->
      <div class="hw-card">
        <div class="hw-section-header">
          <i class="ti ti-writing-sign"></i>
          <h2>Approval</h2>
        </div>
        <div class="hw-approval-row">
          <div>
            <div class="hw-field"><label>Requested by</label><input type="text" name="requested_by" ></div>
            <span class="hw-sig-role">Employee / Requesting Division</span>
            <div class="hw-sig-box"><span>Signature</span></div>
          </div>
          <div>
            <div class="hw-field"><label>Verified by</label><input type="text" name="verified_by" ></div>
            <span class="hw-sig-role">IT Section</span>
            <div class="hw-sig-box"><span>Signature</span></div>
          </div>
          <div>
            <div class="hw-field"><label>Approved by</label><input type="text" name="approved_by" ></div>
            <span class="hw-sig-role">Department Manager</span>
            <div class="hw-sig-box"><span>Signature</span></div>
          </div>
        </div>
      </div>

      <div class="hw-actions no-print">
        <button type="submit" class="hw-btn hw-btn-primary">
          <i class="ti ti-device-floppy"></i> Save registration
        </button>
        <button type="button" onclick="window.print()" class="hw-btn hw-btn-outline">
          <i class="ti ti-printer"></i> Print
        </button>
      </div>

    </form>

  </div>
</div>

<script>
  // Request type pill selection
  document.querySelectorAll('#hw-request-type .hw-pill').forEach(function (pill) {
    var hidden = document.getElementById('hw-hidden-request-type');
    if (pill.getAttribute('data-value') === hidden.value) pill.classList.add('selected');

    pill.addEventListener('click', function () {
      document.querySelectorAll('#hw-request-type .hw-pill').forEach(function (p) {
        p.classList.remove('selected');
      });
      pill.classList.add('selected');
      hidden.value = pill.getAttribute('data-value');
    });
  });
</script>