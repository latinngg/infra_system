@extends('layouts.app')
 
@section('title', 'IT Installation / Repair Request')
 
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
 
  .card { background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:1.25rem; margin-bottom:10px; box-shadow:0 1px 3px rgba(0,0,0,.04); }
  .section-header { display:flex; align-items:center; gap:8px; margin-bottom:1rem; }
  .section-header i { font-size:15px; color:#1a56db; }
  .section-header h2 { font-size:11px; font-weight:700; color:#1e293b; text-transform:uppercase; letter-spacing:.8px; }
  .divider { height:1px; background:#f1f5f9; margin:1rem 0; }
 
  .grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; margin-bottom:10px; }
  .grid-custom { display:grid; grid-template-columns:2fr 1fr 1fr; gap:10px; }
  .grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:10px; }
 
  .field { display:flex; flex-direction:column; gap:4px; }
  .field label { font-size:11px; font-weight:600; color:#475569; }
  .field label span { color:#e24b4a; }
  .field input[type=text], .field input[type=date], .field textarea {
    font-size:12px; padding:7px 9px; border:1px solid #cbd5e1; border-radius:8px;
    background:#f8fafc; color:#1e293b; outline:none; font-family:inherit; transition:border-color .15s, box-shadow .15s;
  }
  .field input:focus, .field textarea:focus { border-color:#1a56db; background:#fff; box-shadow:0 0 0 3px rgba(26,86,219,.1); }
  .field textarea { resize:vertical; min-height:80px; line-height:1.5; }
 
  .purpose-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:8px; }
  .purpose-card { border:1px solid #cbd5e1; border-radius:8px; padding:10px; cursor:pointer; transition:all .15s; position:relative; }
  .purpose-card:hover { border-color:#1a56db; background:rgba(26,86,219,.04); }
  .purpose-card.selected { border:2px solid #1a56db; background:rgba(26,86,219,.06); }
  .purpose-card .p-icon { font-size:18px; color:#94a3b8; margin-bottom:6px; }
  .purpose-card.selected .p-icon { color:#1a56db; }
  .purpose-card p { font-size:11px; font-weight:500; color:#1e293b; line-height:1.4; }
  .purpose-check { position:absolute; top:6px; right:6px; width:14px; height:14px; border-radius:50%; background:#1a56db; display:none; align-items:center; justify-content:center; }
  .purpose-card.selected .purpose-check { display:flex; }
  .purpose-check i { font-size:9px; color:#fff; }
 
  .checks-grid { display:grid; grid-template-columns:1fr 1fr; gap:5px; }
  .check-item { display:flex; align-items:center; gap:7px; padding:7px 9px; border:1px solid #e2e8f0; border-radius:8px; cursor:pointer; transition:all .15s; user-select:none; }
  .check-item:hover { border-color:#94a3b8; background:#f8fafc; }
  .check-item.checked { border-color:#1a56db; background:rgba(26,86,219,.05); }
  .cb { width:13px; height:13px; border:1.5px solid #94a3b8; border-radius:3px; flex-shrink:0; transition:all .15s; }
  .check-item.checked .cb { background:#1a56db; border-color:#1a56db; }
  .check-item span { font-size:11px; color:#1e293b; }
 
  .fw-pills { display:flex; gap:6px; flex-wrap:wrap; }
  .fw-pill { padding:5px 14px; border:1px solid #cbd5e1; border-radius:100px; font-size:11px; font-weight:600; cursor:pointer; color:#475569; transition:all .15s; user-select:none; }
  .fw-pill:hover { border-color:#1a56db; color:#1a56db; }
  .fw-pill.selected { background:#1a56db; border-color:#1a56db; color:#fff; }
 
  .approval-row { display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; }
  .sig-box { border:1px dashed #cbd5e1; border-radius:8px; height:52px; display:flex; align-items:center; justify-content:center; margin-top:5px; background:#f8fafc; }
  .sig-box span { font-size:10px; color:#94a3b8; font-style:italic; }
 
  .section-banner { display:flex; align-items:center; gap:7px; padding:8px 12px; border-radius:8px; margin-bottom:10px; font-size:11px; font-weight:600; }
  .banner-user { background:rgba(26,86,219,.07); color:#1a56db; border:1px solid rgba(26,86,219,.2); }
  .banner-it { background:rgba(15,110,86,.07); color:#0f6e56; border:1px solid rgba(15,110,86,.2); margin-top:6px; }
 
  .actions { display:flex; gap:7px; margin-top:1rem; }
  .btn { padding:9px 18px; border-radius:8px; font-size:12px; font-weight:600; cursor:pointer; border:1px solid; font-family:inherit; display:flex; align-items:center; gap:5px; transition:all .15s; }
  .btn:disabled { opacity:.6; cursor:wait; }
  .btn-primary { background:#1a56db; border-color:#1a56db; color:#fff; }
  .btn-primary:hover { background:#1e40af; border-color:#1e40af; }
  .btn-outline { background:transparent; border-color:#cbd5e1; color:#1e293b; }
  .btn-outline:hover { background:#f8fafc; }
  .btn-ghost { background:transparent; border-color:transparent; color:#64748b; }
  .btn-ghost:hover { color:#1e293b; }
 
  .field-error { border-color:#e24b4a !important; background:#fff5f5 !important; box-shadow:0 0 0 3px rgba(226,75,74,.1) !important; }
  .block-error { border:1.5px solid #e24b4a !important; border-radius:8px !important; background:#fff5f5 !important; padding:6px !important; }
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
  .tag-list { display:flex; flex-wrap:wrap; gap:4px; justify-content:flex-end; }
  .tag { background:#eff6ff; color:#1a56db; font-size:10px; font-weight:600; padding:2px 8px; border-radius:100px; }
  .fw-badge { background:#fef3c7; color:#92400e; font-size:10px; font-weight:700; padding:2px 10px; border-radius:100px; }
  .purpose-badge { background:#f0fdf4; color:#166534; font-size:10px; font-weight:700; padding:2px 10px; border-radius:100px; }
  .receipt-reason { font-size:11px; color:#1e293b; line-height:1.6; background:#f8fafc; border-radius:6px; padding:8px 10px; white-space:pre-wrap; }
  .receipt-actions { display:flex; gap:7px; margin-top:1rem; }
 
  @media (max-width: 1100px) {
    .page { flex-direction: column; }
    .sidebar { width: 100%; order: 0; }
    .sidebar-card { position: static; }
  }
  @media (max-width: 640px) {
    .grid-3, .grid-custom, .grid-2, .approval-row, .purpose-grid, .checks-grid { grid-template-columns: 1fr; }
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
        <div class="guide-item"><h6><i class="ti ti-user"></i> User information</h6><p>Enter complete employee information.</p></div>
        <div class="guide-item"><h6><i class="ti ti-list-check"></i> Request type</h6><p>Select at least one request.</p></div>
        <div class="guide-item"><h6><i class="ti ti-shield-lock"></i> Firewall policy</h6><p>Choose only if internet access adjustment is needed.</p></div>
        <div class="guide-item"><h6><i class="ti ti-calendar"></i> Validity period</h6><p>Required for temporary access requests.</p></div>
        <div class="guide-item"><h6><i class="ti ti-file-text"></i> Reason</h6><p>Explain why the request is necessary.</p></div>
        <div class="guide-item"><h6><i class="ti ti-checks"></i> Approval flow</h6><p>Employee → Supervisor → Japanese Manager → IT</p></div>
      </div>
    </div>
  </div>
 
  <div class="main">
 
    <!-- ═══ FORM PAGE ═══ -->
    <div id="form-page">
      <div class="header"><h1>IT Installation / Repair Request Form</h1></div>
 
      <div class="section-banner banner-user"><i class="ti ti-user-circle"></i> To be filled out by requesting division</div>
 
      <div class="card">
        <div class="section-header"><i class="ti ti-id-badge"></i><h2>User information</h2></div>
        <div class="grid-3">
          <div class="field"><label>Employee name <span>*</span></label><input type="text" id="f-name" placeholder="Full name"></div>
          <div class="field"><label>ID number <span>*</span></label><input type="text" id="f-id" placeholder="e.g. 000000"></div>
          <div class="field"><label>PC name <span>*</span></label><input type="text" id="f-pc" placeholder="e.g. TFXC0001"></div>
        </div>
        <div class="grid-custom">
          <div class="field"><label>Department &amp; section <span>*</span></label><input type="text" id="f-dept" placeholder="e.g. GA – IT"></div>
          <div class="field"><label>Position <span>*</span></label><input type="text" id="f-position" placeholder="e.g. Supervisor"></div>
          <div class="field"><label>Date requested</label><input type="date" id="f-date"></div>
        </div>
      </div>
 
      <div class="card">
        <div class="section-header"><i class="ti ti-target"></i><h2>Purpose of application <span style="color:#e24b4a;font-size:11px">*</span></h2></div>
        <div class="purpose-grid" id="purpose-grid">
          <div class="purpose-card" onclick="togglePurpose(this)" data-val="New PC Issuance Request"><div class="purpose-check"><i class="ti ti-check"></i></div><div class="p-icon"><i class="ti ti-desktop"></i></div><p>New PC issuance request</p></div>
          <div class="purpose-card" onclick="togglePurpose(this)" data-val="PC Replacement Request"><div class="purpose-check"><i class="ti ti-check"></i></div><div class="p-icon"><i class="ti ti-replace"></i></div><p>PC replacement request</p></div>
          <div class="purpose-card" onclick="togglePurpose(this)" data-val="System Registration and Job Request"><div class="purpose-check"><i class="ti ti-check"></i></div><div class="p-icon"><i class="ti ti-settings-cog"></i></div><p>System registration &amp; job request</p></div>
        </div>
      </div>
 
      <div class="card">
        <div class="section-header"><i class="ti ti-apps"></i><h2>Request type <span style="color:#e24b4a;font-size:11px">*</span></h2></div>
        <div class="checks-grid" id="checks-grid">
          @foreach (['Cybozu / Garoon','Wireless network','E-mail','LAN cable installation','Domain ID','MS Teams account','PC reset / reformat','Documentum / Astrux','SAP','Toss system'] as $type)
            <div class="check-item" onclick="toggleCheck(this)"><div class="cb"></div><span>{{ $type }}</span></div>
          @endforeach
        </div>
      </div>
 
      <div class="card">
        <div class="section-header"><i class="ti ti-shield-lock"></i><h2>Firewall policy <span style="color:#e24b4a;font-size:11px">*</span></h2></div>
        <div class="fw-pills">
          @foreach (['Policy 1','Policy 2','Policy 2A','Policy 3','Policy 3A'] as $p)
            <div class="fw-pill" onclick="toggleFW(this)">{{ $p }}</div>
          @endforeach
        </div>
        <div class="divider"></div>
        <div class="section-header"><i class="ti ti-calendar-event"></i><h2>Policy validity period</h2></div>
        <div class="grid-2">
          <div class="field"><label>Date from</label><input type="date" id="f-from"></div>
          <div class="field"><label>Date to</label><input type="date" id="f-to"></div>
        </div>
      </div>
 
      <div class="card">
        <div class="section-header"><i class="ti ti-message-2"></i><h2>Reason for application <span style="color:#e24b4a;font-size:11px">*</span></h2></div>
        <div class="field"><textarea id="f-reason" placeholder="Explain why this request is necessary..."></textarea></div>
      </div>
 
      <div class="section-banner banner-it"><i class="ti ti-tool"></i> To be filled out by IT</div>
 
      <div class="card">
        <div class="section-header"><i class="ti ti-writing-sign"></i><h2>Approvals</h2></div>
        <div class="approval-row">
          <div><div class="field"><label>Prepared by</label><input type="text" id="f-prep" placeholder="Name"></div><div class="sig-box"><span>Signature</span></div></div>
          <div><div class="field"><label>Local supervisor / manager</label><input type="text" id="f-sup" placeholder="Name"></div><div class="sig-box"><span>Signature</span></div></div>
          <div><div class="field"><label>Japanese dept. manager</label><input type="text" id="f-mgr" placeholder="Name"></div><div class="sig-box"><span>Signature</span></div></div>
        </div>
      </div>
 
      <div class="actions">
        <button class="btn btn-primary" id="submit-btn" onclick="submitForm()"><i class="ti ti-send"></i> Submit request</button>
        <button class="btn btn-ghost" onclick="resetForm()"><i class="ti ti-refresh"></i> Reset</button>
      </div>
    </div>
 
    <!-- ═══ RECEIPT PAGE ═══ -->
    <div id="receipt-page">
      <div class="receipt-hero">
        <div class="receipt-icon-wrap"><i class="ti ti-circle-check"></i></div>
        <h2>Request submitted!</h2>
        <p>Your IT request has been received and is now pending for approval.</p>
        <div class="receipt-ref" id="r-ref">REF# IT-000000</div>
      </div>
 
      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-id-badge"></i><span>User information</span></div>
        <div class="receipt-card-body">
          <div class="receipt-row"><span class="receipt-label">Employee name</span><span class="receipt-value" id="r-name">—</span></div>
          <div class="receipt-row"><span class="receipt-label">ID number</span><span class="receipt-value" id="r-id">—</span></div>
          <div class="receipt-row"><span class="receipt-label">PC name</span><span class="receipt-value" id="r-pc">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Department &amp; section</span><span class="receipt-value" id="r-dept">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Position</span><span class="receipt-value" id="r-position">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Date requested</span><span class="receipt-value" id="r-date">—</span></div>
        </div>
      </div>
 
      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-list-check"></i><span>Request details</span></div>
        <div class="receipt-card-body">
          <div class="receipt-row"><span class="receipt-label">Purpose</span><span class="receipt-value"><span class="purpose-badge" id="r-purpose">—</span></span></div>
          <div class="receipt-row"><span class="receipt-label">Request type</span><div class="tag-list" id="r-types"></div></div>
        </div>
      </div>
 
      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-shield-lock"></i><span>Firewall &amp; validity</span></div>
        <div class="receipt-card-body">
          <div class="receipt-row"><span class="receipt-label">Firewall policy</span><span class="receipt-value"><span class="fw-badge" id="r-fw">—</span></span></div>
          <div class="receipt-row"><span class="receipt-label">Valid from</span><span class="receipt-value" id="r-from">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Valid to</span><span class="receipt-value" id="r-to">—</span></div>
        </div>
      </div>
 
      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-message-2"></i><span>Reason for application</span></div>
        <div class="receipt-card-body"><div class="receipt-reason" id="r-reason">—</div></div>
      </div>
 
      <div class="receipt-card">
        <div class="receipt-card-head"><i class="ti ti-writing-sign"></i><span>Approvals</span></div>
        <div class="receipt-card-body">
          <div class="receipt-row"><span class="receipt-label">Prepared by</span><span class="receipt-value" id="r-prep">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Local supervisor / manager</span><span class="receipt-value" id="r-sup">—</span></div>
          <div class="receipt-row"><span class="receipt-label">Japanese dept. manager</span><span class="receipt-value" id="r-mgr">—</span></div>
        </div>
      </div>
 
      <div class="receipt-actions">
        <button class="btn btn-primary" onclick="window.print()"><i class="ti ti-printer"></i> Print receipt</button>
        <button class="btn btn-outline" onclick="newRequest()"><i class="ti ti-plus"></i> New request</button>
      </div>
    </div>
 
  </div>
</div>
@endsection
 
@push('scripts')
<script>
  const STORE_URL = @json(route('job-request.store'));
  const CSRF = document.querySelector('meta[name="csrf-token"]').content;
 
  function togglePurpose(el) {
    document.querySelectorAll('.purpose-card').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
  }
  function toggleCheck(el) { el.classList.toggle('checked'); }
  function toggleFW(el) {
    document.querySelectorAll('.fw-pill').forEach(p => p.classList.remove('selected'));
    el.classList.add('selected');
  }
  function resetForm() {
    document.querySelectorAll('#form-page input[type=text], #form-page input[type=date], #form-page textarea').forEach(el => el.value = '');
    document.querySelectorAll('.purpose-card, .check-item, .fw-pill').forEach(el => el.classList.remove('selected', 'checked'));
    clearErrors();
  }
 
  function v(id) { return document.getElementById(id); }
  function val(id) { return v(id) ? v(id).value.trim() : ''; }
  function dash(s) { return s || '—'; }
 
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
    p.className = 'error-msg'; p.style.marginTop = '8px'; p.textContent = msg;
    el.parentNode.insertBefore(p, el.nextSibling);
  }
 
  async function submitForm() {
    clearErrors();
    let hasError = false;
 
    [
      ['f-name', 'Employee name is required.'],
      ['f-id', 'ID number is required.'],
      ['f-pc', 'PC name is required.'],
      ['f-dept', 'Department & section is required.'],
      ['f-position', 'Position is required.'],
      ['f-reason', 'Please enter a reason.'],
    ].forEach(([id, msg]) => { if (!val(id)) { markError(id, msg); hasError = true; } });
 
    const purposeEl = document.querySelector('.purpose-card.selected');
    if (!purposeEl) { markBlock(v('purpose-grid'), 'Please select a purpose of application.'); hasError = true; }
 
    const types = [...document.querySelectorAll('.check-item.checked span')].map(s => s.textContent);
    if (!types.length) { markBlock(v('checks-grid'), 'Please select at least one request type.'); hasError = true; }
 
    const fwEl = document.querySelector('.fw-pill.selected');
    if (!fwEl) { markBlock(document.querySelector('.fw-pills'), 'Please select a firewall policy.'); hasError = true; }
 
    if (hasError) {
      const first = document.querySelector('.field-error, .block-error');
      if (first) first.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }
 
    const payload = {
      employee_name: val('f-name'), id_number: val('f-id'), pc_name: val('f-pc'),
      department: val('f-dept'), position: val('f-position'),
      date_requested: val('f-date') || null,
      purpose: purposeEl.dataset.val, request_types: types,
      firewall_policy: fwEl.textContent,
      valid_from: val('f-from') || null, valid_to: val('f-to') || null,
      reason: val('f-reason'),
      prepared_by: val('f-prep') || null, supervisor: val('f-sup') || null, jp_manager: val('f-mgr') || null,
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
      alert('Could not submit the request. Please try again.');
    } finally {
      btn.disabled = false;
    }
  }
 
  function showReceipt(ref, d) {
    v('r-ref').textContent = 'REF# ' + ref;
    v('r-name').textContent = dash(d.employee_name);
    v('r-id').textContent = dash(d.id_number);
    v('r-pc').textContent = dash(d.pc_name);
    v('r-dept').textContent = dash(d.department);
    v('r-position').textContent = dash(d.position);
    v('r-date').textContent = dash(d.date_requested);
    v('r-purpose').textContent = d.purpose;
 
    const box = v('r-types'); box.innerHTML = '';
    d.request_types.forEach(t => {
      const tag = document.createElement('span');
      tag.className = 'tag'; tag.textContent = t; box.appendChild(tag);
    });
 
    v('r-fw').textContent = d.firewall_policy;
    v('r-from').textContent = dash(d.valid_from);
    v('r-to').textContent = dash(d.valid_to);
    v('r-reason').textContent = dash(d.reason);
    v('r-prep').textContent = dash(d.prepared_by);
    v('r-sup').textContent = dash(d.supervisor);
    v('r-mgr').textContent = dash(d.jp_manager);
 
    v('form-page').style.display = 'none';
    v('receipt-page').style.display = 'block';
    window.scrollTo(0, 0);
  }
 
  function newRequest() {
    resetForm();
    v('receipt-page').style.display = 'none';
    v('form-page').style.display = 'block';
    window.scrollTo(0, 0);
  }
</script>
@endpush