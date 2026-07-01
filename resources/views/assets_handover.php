@extends('layouts.app')
@section('content')
<style>
  body {
    background: #e9edf1;
  }

  .ah-wrap {
    padding: 24px 0 48px;
  }

  .ah-page {
    width: 210mm;
    min-height: 297mm;
    margin: 0 auto 24px;
    background: #fff;
    border: 1px solid #000;
    padding: 14mm 12mm;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    color: #111;
    position: relative;
  }

  .ah-page table {
    width: 100%;
    border-collapse: collapse;
  }

  .ah-page table td,
  .ah-page table th {
    border: 1px solid #000;
    padding: 4px 6px;
    vertical-align: middle;
  }

  /* ── HEADER ── */
  .ah-header td {
    text-align: center;
    font-size: 11px;
    line-height: 1.5;
  }

  .ah-header-title {
    font-size: 22px;
    font-weight: 700;
    letter-spacing: .5px;
  }

  .ah-logo {
    text-align: center;
    margin: 14px 0 18px;
  }

  /* ── EMPLOYEE INFO ── */
  .ah-info-table td {
    height: 30px;
  }

  .ah-info-label {
    width: 190px;
    border: none !important;
    font-weight: 700;
    font-size: 11px;
    letter-spacing: .3px;
  }

  .ah-info-input {
    border: 1px solid #000 !important;
  }

  .ah-page input[type=text],
  .ah-page input[type=date] {
    width: 100%;
    border: none;
    outline: none;
    padding: 3px 4px;
    font-family: inherit;
    font-size: 12px;
    background: transparent;
  }

  /* ── INTRO TEXT ── */
  .ah-intro {
    margin: 22px 4px 14px;
    line-height: 1.8;
    text-align: justify;
    font-size: 12px;
  }

  .ah-intro p { margin-bottom: 10px; }
  .ah-intro .indent { display: block; text-indent: 34px; }

  /* ── ASSETS TABLE ── */
  .ah-assets-table th {
    background: #f2f2f2;
    font-size: 10px;
    font-weight: 700;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: .3px;
  }

  .ah-assets-table td { height: 26px; }
  .ah-assets-table .ah-no { width: 34px; text-align: center; font-weight: 600; }
  .ah-assets-table .ah-qty { width: 60px; }

  /* ── SECTION CONTENT (page 2) ── */
  .ah-content {
    margin: 25px 6px;
    line-height: 1.7;
    text-align: justify;
  }

  .ah-content h4 {
    margin: 0 0 10px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: .3px;
  }

  .ah-content p { margin-bottom: 14px; }
  .ah-content ol { padding-left: 20px; }
  .ah-content li { margin-bottom: 12px; }

  /* ── SIGNATURE ── */
  .ah-signature {
    margin-top: 60px;
  }

  .ah-signature td {
    border: none;
    text-align: center;
    vertical-align: top;
    font-size: 11px;
  }

  .ah-sig-line {
    margin-top: 46px;
    border-top: 1px solid #000;
    padding-top: 4px;
    display: inline-block;
    min-width: 220px;
  }

  /* ── FOOTER ── */
  .ah-footer {
    position: absolute;
    bottom: 10mm;
    left: 12mm;
    right: 12mm;
    font-size: 9px;
    color: #333;
    line-height: 1.5;
  }

  .ah-actions {
    max-width: 210mm;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    gap: 8px;
  }

  .ah-btn {
    padding: 9px 20px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    border: 1px solid;
    font-family: inherit;
  }

  .ah-btn-primary { background: #1a56db; border-color: #1a56db; color: #fff; }
  .ah-btn-primary:hover { background: #1e40af; }
  .ah-btn-outline { background: #fff; border-color: #94a3b8; color: #1e293b; }
  .ah-btn-outline:hover { background: #f8fafc; }

  @media print {
    body { background: #fff; }
    .ah-wrap { padding: 0; }
    .ah-page {
      margin: 0 auto;
      border: none;
      box-shadow: none;
      page-break-after: always;
    }
    .ah-page:last-of-type { page-break-after: auto; }
    .no-print { display: none !important; }
  }

  @media screen {
    .ah-page { box-shadow: 0 1px 4px rgba(0,0,0,0.15); }
  }
</style>

<div class="ah-wrap">
  <form action="{{ route('asset-handover.store') }}" method="POST">
  @csrf

    <!-- ═══════════════ PAGE 1 ═══════════════ -->
    <div class="ah-page">

      <table class="ah-header">
        <tr>
          <td width="18%">GA Division<br>IT</td>
          <td><div class="ah-header-title">ASSETS HANDOVER FORM</div></td>
          <td width="18%">TMF-G0051<br>Version 1.00<br>PAGE 1-2</td>
        </tr>
      </table>

      <div class="ah-logo">
        <img src="{{ asset('images/toyoflex-logo.png') }}" height="50" alt="Toyoflex Cebu Corporation">
      </div>

      <table class="ah-info-table">
        <tr>
          <td class="ah-info-label">DEPARTMENT:</td>
          <td class="ah-info-input" colspan="2">
            <input type="text" name="department" value="{{ old('department') }}">
          </td>
        </tr>
        <tr>
          <td class="ah-info-label">EMPLOYEE ID NO. &amp; NAME:</td>
          <td class="ah-info-input" width="30%">
            <input type="text" name="employee_id" value="{{ old('employee_id') }}">
          </td>
          <td class="ah-info-input">
            <input type="text" name="employee_name" value="{{ old('employee_name') }}">
          </td>
        </tr>
        <tr>
          <td class="ah-info-label">DIVISION:</td>
          <td class="ah-info-input" colspan="2">
            <input type="text" name="division" value="{{ old('division') }}">
          </td>
        </tr>
      </table>

      <div class="ah-intro">
        <p>
          DEAR SIR/MADAM,
          <span class="indent">
            PLEASE FIND THE BELOW AS THE ASSETS HANDED OVER TO YOU TO SUPPORT YOU IN CARRYING
            OUT YOUR ASSIGNMENT IN A MOST PROFICIENT MANNER.
          </span>
        </p>
      </div>

      <table class="ah-assets-table">
        <thead>
          <tr>
            <th class="ah-no">No.</th>
            <th>Item Description</th>
            <th>Brand / Model</th>
            <th>Serial No.</th>
            <th class="ah-qty">Qty</th>
            <th>Remarks / Condition</th>
          </tr>
        </thead>
        <tbody>
          @for($i = 1; $i <= 10; $i++)
          <tr>
            <td class="ah-no">{{ $i }}</td>
            <td><input type="text" name="item_description[]"></td>
            <td><input type="text" name="brand_model[]"></td>
            <td><input type="text" name="serial_no[]"></td>
            <td><input type="text" name="qty[]"></td>
            <td><input type="text" name="remarks[]"></td>
          </tr>
          @endfor
        </tbody>
      </table>

      <div class="ah-footer">
        * It is permitted to use this form in both electronic and hard copy.<br>
        * The user has to check and compare versions before printing.
      </div>

    </div>

    <!-- ═══════════════ PAGE 2 ═══════════════ -->
    <div class="ah-page">

      <table class="ah-header">
        <tr>
          <td width="18%">GA Division<br>IT</td>
          <td><div class="ah-header-title">ASSETS HANDOVER FORM</div></td>
          <td width="18%">TMF-G0051<br>Version 1.00<br>PAGE 2-2</td>
        </tr>
      </table>

      <div class="ah-content">
        <p>
          <strong>Toyoflex Cebu Corporation</strong> provides employees a computer to enable them
          to perform their assigned work where they need to do reports and other company
          related activities.
        </p>
        <p>
          This agreement is intended to protect the security and integrity of
          Toyoflex Cebu Corporation Data, Technology and Infrastructure.
          Employees must agree to the following terms and conditions.
        </p>

        <h4>Terms of Usage</h4>
        <ol>
          <li>
            The company defines acceptable business use as activities that directly
            or indirectly support the business of the company.
          </li>
          <li>
            All company provided electronic devices remain the property of the
            company. Employees shall comply with company requests regarding
            inspection, replacement, upgrade, retrieval and investigation.
          </li>
          <li>
            Company issued laptops, desktops and accessories shall be returned
            during resignation, transfer or clearance processing.
          </li>
          <li>
            Upon return, all devices shall be in proper working condition
            (normal wear and tear excepted). Damage caused by negligence
            or intentional misuse shall be charged to the employee.
          </li>
          <li>
            Employees are prohibited from deleting company data stored in
            company issued computers. Coordinate with the IT Section
            whenever deletion is necessary.
          </li>
          <li>
            Toyoflex Cebu Corporation reserves the right to take appropriate
            action for violations of this agreement in accordance with the
            Data Privacy Act of 2012 and existing company policies.
          </li>
        </ol>

        <p>
          By signing this document, I voluntarily agree to the above terms and
          conditions and authorize the company to collect, access and retrieve
          data stored in my company-issued electronic device whenever necessary.
        </p>
      </div>

      <table class="ah-signature">
        <tr>
          <td width="50%">
            Executed as an Agreement
            <br>
            <span class="ah-sig-line">Employee's Name and Signature</span>
          </td>
          <td width="50%">
            Signed on behalf of the Company
            <br>
            <span class="ah-sig-line">Toyoflex Cebu Corporation</span>
          </td>
        </tr>
      </table>

      <div class="ah-footer">
        * It is permitted to use this form in both electronic and hard copy.<br>
        * The user has to check and compare versions before printing.
      </div>

    </div>

    <div class="ah-actions no-print">
      <button type="submit" class="ah-btn ah-btn-primary">Save Handover Form</button>
      <button type="button" onclick="window.print()" class="ah-btn ah-btn-outline">Print Agreement</button>
    </div>

  </form>
</div>
@endsection