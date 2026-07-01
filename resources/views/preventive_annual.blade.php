
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
  .ap-wrap * { box-sizing: border-box; }

  .ap-wrap {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f0f4f8;
    padding: 1.5rem 1.25rem;
  }

  .ap-page {
    width: 100%;
    margin: 0 auto;
  }

  /* ── MAIN ── */
  .ap-main { flex: 1; min-width: 0; }

  .ap-header {
    background: #1a56db;
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 12px;
    position: relative;
    overflow: hidden;
  }

  .ap-header::before {
    content: '';
    position: absolute;
    top: -30px; right: -30px;
    width: 120px; height: 120px;
    border-radius: 50%;
    background: rgba(255,255,255,0.07);
  }

  .ap-header h1 { font-size: 20px; font-weight: 600; color: #fff; text-align: center; margin: 0; }

  .ap-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.04);
  }

  .ap-section-header { display: flex; align-items: center; gap: 8px; margin-bottom: 1rem; }
  .ap-section-header i { font-size: 15px; color: #1a56db; }
  .ap-section-header h2 { font-size: 11px; font-weight: 700; color: #1e293b; text-transform: uppercase; letter-spacing: .8px; margin: 0; }

  /* ── TABLE ── */
  .ap-table-scroll { overflow-x: auto; border-radius: 8px; border: 1px solid #e2e8f0; }

  .ap-table { width: 100%; border-collapse: collapse; min-width: 1100px; }

  .ap-table thead th {
    background: #eff6ff;
    color: #1a56db;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
    text-align: left;
    padding: 9px 8px;
    border-bottom: 1px solid #e2e8f0;
    white-space: nowrap;
  }

  .ap-table tbody td {
    padding: 5px 6px;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
  }

  .ap-table tbody tr:nth-child(even) { background: #f8fafc; }
  .ap-table tbody tr:hover { background: rgba(26,86,219,0.04); }

  .ap-table .ap-no {
    text-align: center;
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    width: 40px;
  }

  .ap-table input[type=text],
  .ap-table input[type=date],
  .ap-table select {
    font-size: 11px;
    padding: 6px 7px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    background: #f8fafc;
    color: #1e293b;
    outline: none;
    font-family: inherit;
    width: 100%;
    min-width: 100px;
    transition: border-color .15s, box-shadow .15s;
  }

  .ap-table input[type=text]:focus,
  .ap-table input[type=date]:focus,
  .ap-table select:focus {
    border-color: #1a56db;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(26,86,219,0.1);
  }

  .ap-table select { min-width: 90px; }

  /* ── SIGNATURES ── */
  .ap-sign-row { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-top: 1.5rem; }

  .ap-sign-block { text-align: center; }

  .ap-sign-label { font-size: 11px; font-weight: 600; color: #475569; margin-bottom: 4px; }

  .ap-sig-box {
    border: 1px dashed #cbd5e1; border-radius: 8px;
    height: 52px; display: flex; align-items: center; justify-content: center;
    margin: 10px 0 6px; background: #f8fafc;
  }

  .ap-sig-box span { font-size: 10px; color: #94a3b8; font-style: italic; }

  .ap-sig-line { font-size: 11px; color: #1e293b; border-top: 1px solid #cbd5e1; padding-top: 6px; }

  /* ── ACTIONS ── */
  .ap-actions { display: flex; gap: 7px; justify-content: center; margin-top: 1.25rem; }

  .ap-btn {
    padding: 9px 18px; border-radius: 8px;
    font-size: 12px; font-weight: 600; cursor: pointer;
    border: 1px solid; font-family: inherit;
    display: flex; align-items: center; gap: 5px; transition: all .15s;
  }

  .ap-btn-primary { background: #1a56db; border-color: #1a56db; color: #fff; }
  .ap-btn-primary:hover { background: #1e40af; border-color: #1e40af; }
  .ap-btn-outline { background: transparent; border-color: #cbd5e1; color: #1e293b; }
  .ap-btn-outline:hover { background: #f8fafc; }

  @media (max-width: 960px) {
    .ap-sign-row { grid-template-columns: 1fr; }
  }

  @media print {
    .ap-actions { display: none !important; }
    .ap-wrap { background: #fff; padding: 0; }
  }
</style>

<div class="ap-wrap">
  <div class="ap-page">

    <!-- MAIN -->
    <div class="ap-main">

      <div class="ap-header">
        <h1>COMPUTER PREVENTIVE MAINTENANCE ANNUAL PLAN</h1>
      </div>

      <form action="{{ route('annual-plan.store') }}" method="POST">
  

        <div class="ap-card">
          <div class="ap-section-header">
            <i class="ti ti-table"></i>
            <h2>Annual maintenance schedule</h2>
          </div>

          <div class="ap-table-scroll">
            <table class="ap-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Department</th>
                  <th>Computer No.</th>
                  <th>User</th>
                  <th>Plan date</th>
                  <th>Actual date conducted</th>
                  <th>Status</th>
                  <th>Corrective action</th>
                  <th>Device type</th>
                </tr>
              </thead>
              <tbody>
                @for($i = 1; $i <= 20; $i++)
                <tr>
                  <td class="ap-no">{{ $i }}</td>
                  <td><input type="text" name="department[]"></td>
                  <td><input type="text" name="computer_no[]"></td>
                  <td><input type="text" name="user_name[]"></td>
                  <td><input type="date" name="plan_date[]"></td>
                  <td><input type="date" name="actual_date[]"></td>
                  <td>
                    <select name="status[]">
                      <option>Pending</option>
                      <option>Good</option>
                      <option>No Good</option>
                    </select>
                  </td>
                  <td><input type="text" name="corrective_action[]"></td>
                  <td>
                    <select name="device_type[]">
                      <option>Laptop</option>
                      <option>Desktop</option>
                    </select>
                  </td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>

        <div class="ap-card">
          <div class="ap-section-header">
            <i class="ti ti-writing-sign"></i>
            <h2>Sign-off</h2>
          </div>
          <div class="ap-sign-row">
            <div class="ap-sign-block">
              <div class="ap-sign-label">Prepared by</div>
              <div class="ap-sig-box"><span>Signature</span></div>
              <div class="ap-sig-line">____________________</div>
            </div>
            <div class="ap-sign-block">
              <div class="ap-sign-label">Checked by</div>
              <div class="ap-sig-box"><span>Signature</span></div>
              <div class="ap-sig-line">____________________</div>
            </div>
            <div class="ap-sign-block">
              <div class="ap-sign-label">Approved by</div>
              <div class="ap-sig-box"><span>Signature</span></div>
              <div class="ap-sig-line">____________________</div>
            </div>
          </div>

          <div class="ap-actions">
            <button type="submit" class="ap-btn ap-btn-primary">
              <i class="ti ti-device-floppy"></i> Save annual plan
            </button>
            <button type="button" onclick="window.print()" class="ap-btn ap-btn-outline">
              <i class="ti ti-printer"></i> Print
            </button>
          </div>
        </div>

      </form>

    </div>
  </div>
</div>