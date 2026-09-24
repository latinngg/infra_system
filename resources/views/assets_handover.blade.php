@extends('layouts.app')

@section('title', 'Assets Handover')

@push('styles')
<style>
  .page { display: flex; gap: 16px; max-width: 1100px; margin: 0 auto; }

  /* ── GUIDE (right column) ── */
  .sidebar { width: 240px; flex-shrink: 0; order: 2; }
  .sidebar-card { background:#fff; border:1px solid #e2e8f0; border-radius:12px; overflow:hidden; position:sticky; top:72px; box-shadow:0 1px 4px rgba(0,0,0,.06); }
  .sidebar-head { background:#1a56db; padding:12px 14px; display:flex; align-items:center; gap:8px; }
  .sidebar-head span { color:#fff; font-size:13px; font-weight:600; }
  .sidebar-head i { color:#fff; font-size:16px; }
  .sidebar-body { padding:14px; }
  .guide-item { margin-bottom:12px; padding-bottom:12px; border-bottom:1px solid #f1f5f9; }
  .guide-item:last-child { margin-bottom:0; padding-bottom:0; border-bottom:none; }
  .guide-item h6 { font-size:12px; font-weight:600; color:#1e293b; display:flex; align-items:center; gap:6px; margin-bottom:3px; }
  .guide-item h6 i { font-size:14px; color:#1a56db; }
  .guide-item p { font-size:11px; color:#64748b; line-height:1.5; }

  .main { flex: 1; min-width: 0; order: 1; }
  .header { background:#1a56db; border-radius:12px; padding:1.25rem 1.5rem; margin-bottom:12px; position:relative; overflow:hidden; }
  .header::before { content:''; position:absolute; top:-30px; right:-30px; width:120px; height:120px; border-radius:50%; background:rgba(255,255,255,.07); }
  .header h1 { font-size:20px; font-weight:600; color:#fff; text-align:center; }
  .header p { font-size:11px; color:rgba(255,255,255,.8); text-align:center; margin-top:4px; }

  .card { background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:1.25rem; margin-bottom:10px; box-shadow:0 1px 3px rgba(0,0,0,.04); }
  .section-header { display:flex; align-items:center; gap:8px; margin-bottom:1rem; }
  .section-header i { font-size:15px; color:#1a56db; }
  .section-header h2 { font-size:11px; font-weight:700; color:#1e293b; text-transform:uppercase; letter-spacing:.8px; }
  .section-header .add-btn { margin-left:auto; }

  .grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; }
  .grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:10px; }
  .approval-row { display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; }

  .field { display:flex; flex-direction:column; gap:4px; }
  .field label { font-size:11px; font-weight:600; color:#475569; }
  .field label span { color:#e24b4a; }
  .field input[type=text], .field input[type=date] {
    font-size:12px; padding:7px 9px; border:1px solid #cbd5e1; border-radius:8px;
    background:#f8fafc; color:#1e293b; outline:none; font-family:inherit; transition:border-color .15s, box-shadow .15s;
  }
  .field input:focus { border-color:#1a56db; background:#fff; box-shadow:0 0 0 3px rgba(26,86,219,.1); }

  /* assets rows */
  .asset-head, .asset-row { display:grid; grid-template-columns:36px 2fr 80px 1.2fr 34px; gap:8px; align-items:center; }
  .asset-head { font-size:10px; font-weight:700; color:#1a56db; text-transform:uppercase; letter-spacing:.5px; padding:8px; background:#eff6ff; border-radius:8px; margin-bottom:6px; }
  .asset-row { margin-bottom:6px; }
  .asset-row .no { text-align:center; font-size:11px; font-weight:700; color:#94a3b8; }
  .asset-row input { font-size:12px; padding:7px 9px; border:1px solid #cbd5e1; border-radius:8px; background:#f8fafc; color:#1e293b; outline:none; font-family:inherit; width:100%; min-width:0; }
  .asset-row input:focus { border-color:#1a56db; background:#fff; box-shadow:0 0 0 3px rgba(26,86,219,.1); }
  .asset-row .del { width:30px; height:30px; border:none; background:transparent; color:#94a3b8; border-radius:8px; cursor:pointer; font-size:15px; }
  .asset-row .del:hover { background:#fef2f2; color:#e24b4a; }

  .sig-box { border:1px dashed #cbd5e1; border-radius:8px; height:52px; display:flex; align-items:center; justify-content:center; margin-top:5px; background:#f8fafc; }
  .sig-box span { font-size:10px; color:#94a3b8; font-style:italic; }

  /* agreement + acknowledgement */
  .terms { font-size:12px; line-height:1.7; color:#334155; background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px; padding:12px 14px; max-height:230px; overflow-y:auto; }
  .terms p { margin-bottom:8px; }
  .terms h4 { font-size:12px; font-weight:700; color:#1e293b; margin:10px 0 6px; }
  .terms ol { padding-left:18px; }
  .terms li { margin-bottom:6px; }
  .ack-text { font-size:12px; line-height:1.7; color:#334155; background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px; padding:12px 14px; margin-top:10px; }
  .ack-text p + p { margin-top:8px; }
  .ack-note { display:inline-flex; align-items:center; gap:6px; margin-top:10px; background:#fef3c7; color:#92400e; font-size:11px; font-weight:700; padding:6px 12px; border-radius:8px; }
  .ack-check { display:flex; align-items:center; gap:8px; margin-top:12px; padding:9px 11px; border:1px solid #e2e8f0; border-radius:8px; cursor:pointer; user-select:none; transition:all .15s; }
  .ack-check:hover { border-color:#94a3b8; background:#f8fafc; }
  .ack-check.checked { border-color:#1a56db; background:rgba(26,86,219,.05); }
  .cb { width:13px; height:13px; border:1.5px solid #94a3b8; border-radius:3px; flex-shrink:0; transition:all .15s; }
  .ack-check.checked .cb { background:#1a56db; border-color:#1a56db; }
  .ack-check span { font-size:11px; color:#1e293b; font-weight:500; }

  .doc-meta { display:flex; flex-wrap:wrap; gap:6px; margin-top:12px; }
  .doc-meta span { font-size:10px; font-weight:600; color:#475569; background:#f1f5f9; padding:3px 10px; border-radius:100px; }

  .section-banner { display:flex; align-items:center; gap:7px; padding:8px 12px; border-radius:8px; margin-bottom:10px; font-size:11px; font-weight:600; }
  .banner-user { background:rgba(26,86,219,.07); color:#1a56db; border:1px solid rgba(26,86,219,.2); }
  .banner-it { background:rgba(15,110,86,.07); color:#0f6e56; border:1px solid rgba(15,110,86,.2); margin-top:6px; }

  .actions { display:flex; gap:7px; margin-top:1rem; }
  .btn { padding:9px 18px; border-radius:8px; font-size:12px; font-weight:600; cursor:pointer; border:1px solid; font-family:inherit; display:flex; align-items:center; gap:5px; transition:all .15s; }
  .btn:disabled { opacity:.6; cursor:wait; }
  .btn-sm { padding:5px 12px; font-size:11px; }
  .btn-primary { background:#1a56db; border-color:#1a56db; color:#fff; }
  .btn-primary:hover { background:#1e40af; border-color:#1e40af; }
  .btn-outline { background:transparent; border-color:#cbd5e1; color:#1e293b; }
  .btn-outline:hover { background:#f8fafc; }
  .btn-ghost { background:transparent; border-color:transparent; color:#64748b; }
  .btn-ghost:hover { color:#1e293b; }

  .field-error { border-color:#e24b4a !important; background:#fff5f5 !important; box-shadow:0 0 0 3px rgba(226,75,74,.1) !important; }
  .block-error { border:1.5px solid #e24b4a !important; border-radius:8px !important; background:#fff5f5 !important; }
  .error-msg { font-size:10px; color:#e24b4a; font-weight:600; margin-top:3px; display:flex; align-items:center; gap:3px; }
  .error-msg::before { content:'!'; display:inline-flex; align-items:center; justify-content:center; width:12px; height:12px; background:#e24b4a; color:#fff; border-radius:50%; font-size:9px; font-weight:700; flex-shrink:0; }

  /* ── RECEIPT ── */
  #receipt-page { display:none; }
  .receipt-hero { background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:2rem 1.5rem; text-align:center; margin-bottom:12px; }
  .receipt-icon-wrap { width:64px; height:64px; background:#ecfdf5; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 14px; }
  .receipt-icon-wrap i { font-size:32px; color:#059669; }
  .receipt-hero h2 { font-size:18px; font-weight:700; color:#1e293b; margin-bottom:4px; }
  .receipt-hero p { font-size:12px; color:#64748b; }
  .receipt-ref { display:inline-block; background:#eff6ff; color:#1a56db; font-size:11px; font-weight:700; padding:4px 14px; border-radius:100px; margin-top:10px; letter-spacing:.5px; }
  .receipt-card { background:#fff; border:1px solid #e2e8f0; border-radius:12px; overflow:hidden; margin-bottom:10px; }
  .receipt-card-head { background:#f8fafc; border-bottom:1px solid #e2e8f0; padding:10px 14px; display:flex; align-items:center; gap:7px; }
  .receipt-card-head i { font-size:14px; color:#1a56db; }
  .receipt-card-head span { font-size:11px; font-weight:700; color:#1e293b; text-transform:uppercase; letter-spacing:.6px; }
  .receipt-card-body { padding:14px; }
  .receipt-row { display:flex; justify-content:space-between; align-items:flex-start; padding:6px 0; border-bottom:1px solid #f1f5f9; gap:12px; }
  .receipt-row:last-child { border-bottom:none; }
  .receipt-label { font-size:11px; color:#64748b; font-weight:500; flex-shrink:0; }
  .receipt-value { font-size:11px; color:#1e293b; font-weight:600; text-align:right; }
  .r-table { width:100%; border-collapse:collapse; font-size:11px; }
  .r-table th { text-align:left; color:#1a56db; background:#eff6ff; font-size:10px; text-transform:uppercase; letter-spacing:.5px; padding:7px 8px; }
  .r-table td { padding:7px 8px; border-bottom:1px solid #f1f5f9; color:#1e293b; font-weight:600; }
  .r-table tr:last-child td { border-bottom:none; }
  .receipt-actions { display:flex; gap:7px; margin-top:1rem; }

  @media (max-width: 1100px) {
    .page { flex-direction: column; }
    .sidebar { width: 100%; order: 0; }
    .sidebar-card { position: static; }
  }
  @media (max-width: 640px) {
    .grid-3, .grid-2, .approval-row { grid-template-columns: 1fr; }
    .asset-head { display:none; }
    .asset-row { grid-template-columns:28px 1fr 60px 1fr 30px; }
  }
  @media print {
    .sidebar, .receipt-actions, #form-page { display:none !important; }
    #receipt-page { display:block !important; }
    .page { display:block; }
  }
</style>
@endpush

@section('content')
<div class="page">

  <!-- GUIDE -->
  <div class="sidebar">
    <div class="sidebar-card">
      <div class="sidebar-head"><i class="ti ti-pin"></i><span>Note / Guide</span></div>
      <div class="sidebar-body">
        <div class="guide-item"><h6><i class="ti ti-user"></i> Employee information</h6><p>Enter the department, employee ID and name of the receiver.</p></div>
        <div class="guide-item"><h6><i class="ti ti-device-desktop"></i> Assets</h6><p>List every asset handed over. Use "Add row" for more items.</p></div>
        <div class="guide-item"><h6><i class="ti ti-writing-sign"></i> Signatories</h6><p>Local supervisor, Japanese manager and the IT staff handing over.</p></div>
        <div class="guide-item"><h6><i class="ti ti-file-text"></i> Agreement</h6><p>Employee must read the terms of usage, tick the acknowledgment, then sign and date.</p></div>
        <div class="guide-item"><h6><i class="ti ti-checks"></i> Flow</h6><p>IT → Employee → Supervisor → Japanese Manager</p></div>
      </div>
    </div>
  </div>

  <div class="main">

    <!-- ═══ FORM PAGE ═══ -->
    <div id="form-page">
      <div class="header">
        <h1>Assets Handover Form</h1>
        <p>Toyoflex Cebu Corporation &nbsp;|&nbsp; TMF-G0051 &nbsp;|&nbsp; Version 1.00</p>
      </div>

      <div class="section-banner banner-user"><i class="ti ti-user-circle"></i> To be filled out by the receiving employee's division</div>

      <div class="card">
        <div class="section-header"><i class="ti ti-id-badge"></i><h2>Employee information</h2></div>
        <div class="grid-3">
          <div class="field"><label>Department <span>*</span></label><input type="text" id="f-dept" placeholder="e.g. GA"></div>
          <div class="field"><label>Employee ID no. <span>*</span></label><input type="text" id="f-id" placeholder="e.g. 000000"></div>
          <div class="field"><label>Employee name <span>*</span></label><input type="text" id="f-name" placeholder="Full name"></div>
        </div>
        <div class="grid-2" style="margin-top:10px">
          <div class="field"><label>Division</label><input type="text" id="f-division" placeholder="e.g. IT"></div>
          <div class="field"><label>Date</label><input type="date" id="f-date"></div>
        </div>
      </div>

      <div class="card">
        <div class="section-header">
          <i class="ti ti-device-desktop"></i><h2>Assets handed over <span style="color:#e24b4a;font-size:11px">*</span></h2>
          <button type="button" class="btn btn-outline btn-sm add-btn" onclick="addRow()"><i class="ti ti-plus"></i> Add row</button>
        </div>
        <div class="asset-head"><span style="text-align:center">No.</span><span>Computer model</span><span>Qty.</span><span>PC number</span><span></span></div>
        <div id="asset-list"></div>
      </div>

      <div class="card">
        <div class="section-header"><i class="ti ti-writing-sign"></i><h2>Authorized signatories</h2></div>
        <div class="approval-row">
          <div><div class="field"><label>Local supervisor <span>*</span></label><input type="text" id="f-sup" placeholder="Name"></div><div class="sig-box"><span>Signature</span></div></div>
          <div><div class="field"><label>Japanese manager <span>*</span></label><input type="text" id="f-mgr" placeholder="Name"></div><div class="sig-box"><span>Signature</span></div></div>
          <div><div class="field"><label>IT staff / IT technician <span>*</span></label><input type="text" id="f-it" placeholder="Name"></div><div class="sig-box"><span>Signature</span></div></div>
        </div>
      </div>

      <div class="card">
        <div class="section-header"><i class="ti ti-file-text"></i><h2>Additional agreements</h2></div>
        <div class="terms">
          <p>Toyoflex Cebu Corporation provides employees a computer to enable them to perform their task where in they need to do a report and be able to perform the job.</p>
          <p>This agreement is intended to protect the security and integrity of Toyoflex Cebu Corporation Data, Technology and Infrastructure. Thus employees must agree to the terms and conditions set forth in this agreement.</p>
          <h4>Terms of usage</h4>
          <ol>
            <li>The company defines acceptable business use as activities that directly or indirectly support the business of the company.</li>
            <li>All company provided electronic devices are the property of the company. Therefore, employees must comply with the company requests to make their company-issued electronic devices available for any reason, including upgrades, replacement, inspection, or retrieval for on-going investigations.</li>
            <li>The returning of company-issued electronic devices (laptops, desktops) and all accessories during separation from the company should be done, otherwise no clearance signing.</li>
            <li>Upon returning of the electronic devices (laptops, desktops) during the separation of the company, the device should be in proper order and in working condition (normal wear and tear). If the device will be found damaged by negligence or by intention, the employee will bear the cost of the repair, disregard the cost.</li>
            <li>The employee is not allowed to delete any data inside the issued electronic device (laptops, desktops). If you really need to delete, you can coordinate with the IT Section.</li>
            <li>Know that Toyoflex Cebu Corporation reserves the right to take appropriate actions for the non-compliance with this written policy in accordance to the DPA (Data Privacy Act) of 2012 or RA (Republic Act) 10173.</li>
          </ol>
          <p>By signing this document that I, the data subject, hereby give my consent to adhere to the abovementioned terms and agreement and to allow the company to collect, access and retrieve the data received and stored in my company-issued electronic device.</p>
        </div>
      </div>

      <div class="card">
        <div class="section-header"><i class="ti ti-checks"></i><h2>Employee acknowledgment</h2></div>
        <div class="ack-text">
          <p>I hereby acknowledge that I have the above mentioned asset(s). I understand that this asset(s) belong to Toyoflex Cebu Corporation and is under my possession for carrying out my work. I hereby assure I will take care of the device(s) of the company to the best possible extent.</p>
          <p>By signing this document I am also aware that if I fail to follow the Part VI Article 4 Sec 3, 4, 5 of the Company Code of Conduct there will be a corresponding sanction.</p>
        </div>
        <div class="ack-note"><i class="ti ti-alert-triangle"></i> Please read the additional agreements above</div>

        <div class="ack-check" id="ack-check" onclick="toggleAck(this)">
          <div class="cb"></div><span>I have read and agree to the acknowledgment and terms of usage.</span>
        </div>

        <div class="grid-2" style="margin-top:12px">
          <div class="field"><label>Name of employee <span>*</span></label><input type="text" id="f-ackname" placeholder="Mr. / Mrs."></div>
          <div class="field"><label>Date signed <span>*</span></label><input type="date" id="f-signed"></div>
        </div>

        <div class="field" style="margin-top:10px"><label>Employee signature <span>*</span></label></div>
        <div class="sig-box" id="f-empsig-box"><span>Signature</span></div>
        <input type="hidden" id="f-empsig" value="">

        <div class="doc-meta">
          <span>Related document: TMF-G0052</span>
          <span>Effective date: 2023-07-10</span>
          <span>Retention period: 10 years</span>
        </div>
      </div>

      <div class="actions">
        <button class="btn btn-primary" id="submit-btn" onclick="submitForm()"><i class="ti ti-send"></i> Submit form</button>
        <button class="btn btn-ghost" onclick="resetForm()"><i class="ti ti-refresh"></i> Reset</button>
      </div>
    </div>

    <!-- ═══ RECEIPT PAGE ═══ -->
    <div id="receipt-page">
      <div class="receipt-hero">
        <div class="receipt-icon-wrap"><i class="ti ti-circle-check"></i></div>
        <h2>Handover recorded!</h2>
        <p>The assets handover form has been saved.</p>
        <div class="receipt-ref" id="r-ref">REF# AH-000000</div>
      </div>

      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-id-badge"></i><span>Employee information</span></div>
        <div class="receipt-card-body">
          <div class="receipt-row"><span class="receipt-label">Department</span><span class="receipt-value" id="r-dept">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Employee ID no.</span><span class="receipt-value" id="r-id">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Employee name</span><span class="receipt-value" id="r-name">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Division</span><span class="receipt-value" id="r-division">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Date</span><span class="receipt-value" id="r-date">—</span></div>
        </div>
      </div>

      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-device-desktop"></i><span>Assets handed over</span></div>
        <div class="receipt-card-body">
          <table class="r-table">
            <thead><tr><th>No.</th><th>Computer model</th><th>Qty.</th><th>PC number</th></tr></thead>
            <tbody id="r-assets"></tbody>
          </table>
        </div>
      </div>

      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-writing-sign"></i><span>Signatories</span></div>
        <div class="receipt-card-body">
          <div class="receipt-row"><span class="receipt-label">Local supervisor</span><span class="receipt-value" id="r-sup">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Japanese manager</span><span class="receipt-value" id="r-mgr">—</span></div>
          <div class="receipt-row"><span class="receipt-label">IT staff / technician</span><span class="receipt-value" id="r-it">—</span></div>
        </div>
      </div>

      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-checks"></i><span>Employee acknowledgment</span></div>
        <div class="receipt-card-body">
          <div class="receipt-row"><span class="receipt-label">Acknowledged by</span><span class="receipt-value" id="r-ackname">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Employee signature</span><span class="receipt-value" id="r-empsig">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Date signed</span><span class="receipt-value" id="r-signed">—</span></div>
        </div>
      </div>

      <div class="receipt-actions">
        <button class="btn btn-primary" onclick="window.print()"><i class="ti ti-printer"></i> Print receipt</button>
        <button class="btn btn-outline" onclick="newForm()"><i class="ti ti-plus"></i> New handover</button>
      </div>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script>
  const STORE_URL = @json(route('asset-handover.store'));
  const CSRF = document.querySelector('meta[name="csrf-token"]').content;

  function v(id) { return document.getElementById(id); }
  function val(id) { return v(id) ? v(id).value.trim() : ''; }
  function dash(s) { return s || '—'; }

  /* ── assets rows ── */
  function renumber() {
    document.querySelectorAll('#asset-list .asset-row').forEach((row, i) => {
      row.querySelector('.no').textContent = i + 1;
    });
  }
  function addRow() {
    const row = document.createElement('div');
    row.className = 'asset-row';
    row.innerHTML =
      '<span class="no"></span>' +
      '<input type="text" class="a-model" placeholder="e.g. Dell Latitude 5420">' +
      '<input type="text" class="a-qty" value="1" style="text-align:center">' +
      '<input type="text" class="a-pc" placeholder="e.g. TFXC0001">' +
      '<button type="button" class="del" title="Remove row"><i class="ti ti-trash"></i></button>';
    row.querySelector('.del').addEventListener('click', () => {
      if (document.querySelectorAll('#asset-list .asset-row').length > 1) { row.remove(); renumber(); }
    });
    v('asset-list').appendChild(row);
    renumber();
  }

  function toggleAck(el) { el.classList.toggle('checked'); }

  /* ── click-to-sign box ── */
  document.getElementById('f-empsig-box').addEventListener('click', function () {
    const name = val('f-ackname');
    if (!this.classList.contains('signed')) {
      if (!name) { markError('f-ackname', 'Enter the employee name first.'); v('f-ackname').focus(); return; }
      this.classList.add('signed');
      this.style.background = '#fff';
      this.style.borderStyle = 'solid';
      this.style.borderColor = '#1a56db';
      this.innerHTML = '<span style="font-style:italic;color:#1a56db;font-size:16px;font-family:cursive;">' + name + '</span>';
      v('f-empsig').value = name;
    } else {
      this.classList.remove('signed');
      this.style.background = '';
      this.style.borderStyle = 'dashed';
      this.style.borderColor = '';
      this.innerHTML = '<span>Signature</span>';
      v('f-empsig').value = '';
    }
  });

  function resetForm() {
    document.querySelectorAll('#form-page input[type=text], #form-page input[type=date]').forEach(el => el.value = '');
    v('ack-check').classList.remove('checked');
    v('asset-list').innerHTML = '';
    addRow(); addRow(); addRow();
    clearErrors();
  }

  /* ── errors ── */
  function clearErrors() {
    document.querySelectorAll('.field-error').forEach(el => el.classList.remove('field-error'));
    document.querySelectorAll('.error-msg').forEach(el => el.remove());
    document.querySelectorAll('.block-error').forEach(el => el.classList.remove('block-error'));
  }
  function markError(id, msg) {
    const el = v(id); if (!el) return;
    el.classList.add('field-error');
    const err = document.createElement('span');
    err.className = 'error-msg'; err.textContent = msg;
    el.parentNode.appendChild(err);
  }
  function markBlock(el, msg) {
    el.classList.add('block-error');
    const p = document.createElement('p');
    p.className = 'error-msg'; p.style.marginTop = '6px'; p.textContent = msg;
    el.parentNode.insertBefore(p, el.nextSibling);
  }

  /* ── submit ── */
  async function submitForm() {
    clearErrors();
    let hasError = false;

    [
      ['f-dept', 'Department is required.'],
      ['f-id', 'Employee ID no. is required.'],
      ['f-name', 'Employee name is required.'],
      ['f-sup', 'Local supervisor is required.'],
      ['f-mgr', 'Japanese manager is required.'],
      ['f-it', 'IT staff / technician is required.'],
      ['f-ackname', 'Name of employee is required.'],
      ['f-empsig', 'Employee signature is required.'],
      ['f-signed', 'Date signed is required.'],
    ].forEach(([id, msg]) => { if (!val(id)) { markError(id, msg); hasError = true; } });

    const assets = [...document.querySelectorAll('#asset-list .asset-row')].map(r => ({
      model: r.querySelector('.a-model').value.trim(),
      qty: r.querySelector('.a-qty').value.trim() || '1',
      pc_number: r.querySelector('.a-pc').value.trim(),
    })).filter(a => a.model || a.pc_number);

    if (!assets.length) {
      markBlock(v('asset-list'), 'Please enter at least one asset.');
      hasError = true;
    }
    if (!v('ack-check').classList.contains('checked')) {
      markBlock(v('ack-check'), 'Please confirm the acknowledgment.');
      hasError = true;
    }

    if (hasError) {
      const first = document.querySelector('.field-error, .block-error');
      if (first) first.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    const payload = {
      department: val('f-dept'), employee_id: val('f-id'), employee_name: val('f-name'),
      division: val('f-division') || null, date: val('f-date') || null,
      assets: assets,
      local_supervisor: val('f-sup'), japanese_manager: val('f-mgr'), it_staff: val('f-it'),
      acknowledged: true, ack_name: val('f-ackname'),
      employee_signature: val('f-empsig'), date_signed: val('f-signed'),
    };

    const btn = v('submit-btn');
    btn.disabled = true;
    try {
      const res = await fetch(STORE_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify(payload),
      });
      if (res.status === 422) {
        const { errors } = await res.json();
        alert(Object.values(errors).flat().join('\n'));
        return;
      }
      if (!res.ok) throw new Error('Server error ' + res.status);
      const { ref } = await res.json();
      showReceipt(ref, payload);
    } catch (e) {
      alert('Could not submit the form. Please try again.');
    } finally {
      btn.disabled = false;
    }
  }

  function showReceipt(ref, d) {
    v('r-ref').textContent = 'REF# ' + ref;
    v('r-dept').textContent = dash(d.department);
    v('r-id').textContent = dash(d.employee_id);
    v('r-name').textContent = dash(d.employee_name);
    v('r-division').textContent = dash(d.division);
    v('r-date').textContent = dash(d.date);

    const body = v('r-assets'); body.innerHTML = '';
    d.assets.forEach((a, i) => {
      const tr = document.createElement('tr');
      [i + 1, a.model, a.qty, a.pc_number].forEach(t => {
        const td = document.createElement('td'); td.textContent = dash(String(t)); tr.appendChild(td);
      });
      body.appendChild(tr);
    });

    v('r-sup').textContent = dash(d.local_supervisor);
    v('r-mgr').textContent = dash(d.japanese_manager);
    v('r-it').textContent = dash(d.it_staff);
    v('r-ackname').textContent = dash(d.ack_name);
    v('r-empsig').textContent = dash(d.employee_signature);
    v('r-signed').textContent = dash(d.date_signed);

    v('form-page').style.display = 'none';
    v('receipt-page').style.display = 'block';
    window.scrollTo(0, 0);
  }

  function newForm() {
    resetForm();
    v('receipt-page').style.display = 'none';
    v('form-page').style.display = 'block';
    window.scrollTo(0, 0);
  }

  addRow(); addRow(); addRow();
</script>
@endpush