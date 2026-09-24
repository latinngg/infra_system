<?php
// ============================================================
//  TCD/TCM Network Status Dashboard
//  I-upload ni nga file sa imong web server (XAMPP htdocs)
//  nga naa sa parehas network sa mga device sa listahan.
//  Buksan lang sa browser: http://<server-ip>/network_dashboard.php
// ============================================================

$devices = [
    ["ip" => "172.16.81.2",    "name" => "TCD-MDF-L3"],
    ["ip" => "172.16.81.204",  "name" => "TCD-DOMAIN"],
    ["ip" => "172.16.81.205",  "name" => "TCD-FILESERVER"],
    ["ip" => "172.16.81.203",  "name" => "TCD-BIOSERVER"],
    ["ip" => "172.16.81.209",  "name" => "TCD-NASSERVER"],
    ["ip" => "172.16.81.213",  "name" => "TCD-PAYRULER PROD"],
    ["ip" => "172.16.81.210",  "name" => "TCD-NAS-FILESERVER"],
    ["ip" => "172.16.81.235",  "name" => "F1-MDF-2FL-SV"],
    ["ip" => "172.16.81.236",  "name" => "F1-MDF-2FL-SV"],
    ["ip" => "172.16.81.232",  "name" => "F1-IDF-1FL-GAStackroom"],
    ["ip" => "172.16.81.231",  "name" => "F1-IDF-1FL-WRD"],
    ["ip" => "192.168.81.24",  "name" => "F3-IDF-WRS-MID"],
    ["ip" => "192.168.81.25",  "name" => "F3-IDF-WRS-LONG"],
    ["ip" => "172.16.81.238",  "name" => "F2-IDF-2FL-CLINIC"],
    ["ip" => "172.16.81.239",  "name" => "F4A-IDF-1FL-QAPLM"],
    ["ip" => "172.16.81.237",  "name" => "F4A-IDF-2FL-FLMC"],
    ["ip" => "172.16.81.234",  "name" => "F4B-IDF-2FL-CPP"],
    ["ip" => "172.16.81.233",  "name" => "F4B-IDF-4FL"],
    ["ip" => "172.16.81.229",  "name" => "F5-IDF-MAINOFFICE"],
    ["ip" => "172.16.81.230",  "name" => "F5-IDF-MAINOFFICE"],
    ["ip" => "192.168.81.22",  "name" => "F6-IDF-1FL-MU"],
    ["ip" => "192.168.81.23",  "name" => "F6-IDF-1FL-CENTERLESS"],
    ["ip" => "192.168.81.21",  "name" => "F6-MDF-2FL-SV"],
    ["ip" => "172.16.130.2",   "name" => "TCM-MDF-L3"],
    ["ip" => "172.16.130.204", "name" => "TCM-DOMAIN"],
    ["ip" => "172.16.130.205", "name" => "TCM-FILESERVER"],
    ["ip" => "172.16.131.229", "name" => "TCM-WEBSERVER"],
    ["ip" => "172.16.131.207", "name" => "SAPSERVER-ACCOUNTING"],
    ["ip" => "172.16.131.209", "name" => "TCM-NAS-FILESERVER"],
    ["ip" => "172.16.130.38",  "name" => "TCM-NEWSMARTFAM"],
    ["ip" => "172.16.130.39",  "name" => "TCM-NEWSMARTFAM"],
    ["ip" => "172.16.130.40",  "name" => "TCM-NEWSMARTFAM"],
    ["ip" => "192.168.130.233","name" => "M1-IDF-QA"],
    ["ip" => "192.168.130.232","name" => "M1-IDF-2FL-W"],
    ["ip" => "192.168.130.231","name" => "M1-IDF-2FL-SV"],
    ["ip" => "192.168.130.234","name" => "M1-IDF-3FL-M134"],
    ["ip" => "172.16.130.237", "name" => "M2-IDF-Canteen"],
    ["ip" => "172.16.130.236", "name" => "M2-3FL-SV"],
    ["ip" => "172.16.130.238", "name" => "M2-IDF-1FL"],
    ["ip" => "172.16.130.239", "name" => "M2-IDF-1FL"],
    ["ip" => "172.16.130.241", "name" => "M2-IDF-2FL"],
    ["ip" => "172.16.130.240", "name" => "M2-IDF-2FL"],
];

// Detect OS so the correct ping syntax is used
$isWindows = stripos(PHP_OS, 'WIN') === 0;

function pingHost($ip, $isWindows) {
    if ($isWindows) {
        // -n 1 = 1 packet, -w 500 = 500ms timeout
        $cmd = "ping -n 1 -w 500 " . escapeshellarg($ip);
    } else {
        // -c 1 = 1 packet, -W 1 = 1 second timeout
        $cmd = "ping -c 1 -W 1 " . escapeshellarg($ip);
    }
    exec($cmd, $output, $returnCode);
    return $returnCode === 0;
}

$results = [];
$activeCount = 0;
foreach ($devices as $d) {
    $isActive = pingHost($d["ip"], $isWindows);
    if ($isActive) $activeCount++;
    $results[] = [
        "ip" => $d["ip"],
        "name" => $d["name"],
        "status" => $isActive ? "ACTIVE" : "NOT ACTIVE"
    ];
}
$totalCount = count($results);
$inactiveCount = $totalCount - $activeCount;
$timestamp = date("Y-m-d H:i:s");
$refreshSeconds = 30;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="<?= $refreshSeconds ?>">
<title>Network Status Dashboard</title>
<style>
    body { font-family: 'Segoe UI', Arial, sans-serif; background:#0f1420; color:#e6e9ef; margin:0; padding:30px; }
    h1 { font-size: 22px; margin-bottom: 4px; }
    .sub { color:#8a93a6; font-size:13px; margin-bottom:20px; }
    .summary { display:flex; gap:16px; margin-bottom:24px; flex-wrap:wrap; }
    .card { background:#171d2b; border-radius:10px; padding:16px 22px; min-width:140px; }
    .card .num { font-size:28px; font-weight:700; }
    .card.total .num { color:#e6e9ef; }
    .card.active .num { color:#3ddc84; }
    .card.inactive .num { color:#ff5c5c; }
    .card .label { color:#8a93a6; font-size:12px; text-transform:uppercase; letter-spacing:.05em; }
    table { width:100%; border-collapse:collapse; background:#171d2b; border-radius:10px; overflow:hidden; }
    th, td { padding:12px 16px; text-align:left; font-size:14px; }
    th { background:#1f2637; color:#8a93a6; font-weight:600; text-transform:uppercase; font-size:11px; letter-spacing:.05em; }
    tr:not(:last-child) td { border-bottom:1px solid #232b3d; }
    .badge { padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600; }
    .badge.active { background:rgba(61,220,132,0.15); color:#3ddc84; }
    .badge.inactive { background:rgba(255,92,92,0.15); color:#ff5c5c; }
    tr:hover td { background:#1b2233; }
</style>
</head>
<body>
    <h1>Network Status Dashboard</h1>
    <div class="sub">Last checked: <?= $timestamp ?> &nbsp;|&nbsp; Auto-refreshes every <?= $refreshSeconds ?> seconds</div>

    <div class="summary">
        <div class="card total"><div class="num"><?= $totalCount ?></div><div class="label">Total Devices</div></div>
        <div class="card active"><div class="num"><?= $activeCount ?></div><div class="label">Active</div></div>
        <div class="card inactive"><div class="num"><?= $inactiveCount ?></div><div class="label">Not Active</div></div>
    </div>

    <table>
        <tr><th>IP Address</th><th>Device Name</th><th>Status</th></tr>
        <?php foreach ($results as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r["ip"]) ?></td>
            <td><?= htmlspecialchars($r["name"]) ?></td>
            <td><span class="badge <?= $r["status"] === "ACTIVE" ? "active" : "inactive" ?>"><?= $r["status"] ?></span></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>