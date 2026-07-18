@extends('layouts.app')

@section('content')
<!-- Chart.js v4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>

<style>
:root {
    --navy: #0e2340;
    --navy-2: #12305a;
    --blue: #1f6feb;
    --blue-light: #eaf2ff;
    --red: #e13946;
    --amber: #f5a524;
    --green: #1f9d55;
    --purple: #7c5cd6;
    --teal: #0f9b8e;
    --gray-50: #f6f8fb;
    --gray-100: #eef1f6;
    --gray-300: #d8dee8;
    --gray-500: #8592a6;
    --gray-700: #48566b;
    --ink: #1a2434;
    --radius: 10px;
    --shadow: 0 1px 2px rgba(16, 30, 54, .06), 0 8px 24px rgba(16, 30, 54, .05);
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: 'Segoe UI', Roboto, -apple-system, Arial, sans-serif;
    background: var(--gray-50);
    color: var(--ink);
}

a {
    text-decoration: none;
    color: inherit;
}

button {
    font-family: inherit;
    cursor: pointer;
}

/* TOPBAR & MAIN CONTENT ONLY */
.main {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
}

.topbar {
    display: flex;
    align-items: center;
    gap: 14px;
    background: #fff;
    padding: 0 22px;
    height: 60px;
    border-bottom: 1px solid var(--gray-300);
    position: sticky;
    top: 0;
    z-index: 5;
}

.burger {
    font-size: 18px;
    color: var(--gray-700);
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
}

.burger:hover {
    background: var(--gray-100);
}

.portal-title {
    font-weight: 700;
    color: var(--navy);
    font-size: 15.5px;
}

.topbar-right {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 10px;
}

.pill {
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    color: #fff;
    white-space: nowrap;
}

.pill.email {
    background: #2b8fe8;
}

.pill.phone {
    background: var(--navy);
}

.avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--blue-light);
    color: var(--blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.content {
    padding: 22px;
    max-width: 1320px;
    width: 100%;
    margin: 0 auto;
}

.quicklinks {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    background: #fff;
    border: 1px solid var(--gray-300);
    border-radius: var(--radius);
    padding: 14px;
    margin-bottom: 16px;
    box-shadow: var(--shadow);
}

.qbtn {
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    border: 1px solid transparent;
    background: var(--gray-100);
    color: var(--navy);
}

.qbtn:hover {
    filter: brightness(0.97);
}

.qbtn.primary {
    background: var(--navy);
    color: #fff;
}

.qbtn.faq {
    background: #e7f6ec;
    color: var(--green);
}

.qbtn.manual {
    background: #fdeceb;
    color: var(--red);
}

.qbtn.status {
    background: #f1ebfb;
    color: var(--purple);
}

.qbtn.map {
    background: #e9f4fb;
    color: #1f7fbf;
}

.card {
    background: #fff;
    border: 1px solid var(--gray-300);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    margin-bottom: 16px;
}

.card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 18px;
    border-bottom: 1px solid var(--gray-100);
}

.card-header h3 {
    margin: 0;
    font-size: 14.5px;
    color: var(--navy);
    font-weight: 700;
}

.card-body {
    padding: 18px;
}

.search-row {
    display: flex;
    gap: 10px;
}

.search-row input {
    flex: 1;
    padding: 11px 14px;
    border: 1px solid var(--gray-300);
    border-radius: 8px;
    font-size: 13.5px;
}

.search-row input:focus {
    outline: 2px solid var(--blue);
    outline-offset: 1px;
}

.btn-search {
    background: var(--navy);
    color: #fff;
    border: none;
    padding: 0 22px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 13.5px;
}

/* Stat cards */
.stat-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 18px;
}

.stat {
    border-radius: var(--radius);
    padding: 15px 17px;
    color: #fff;
    box-shadow: var(--shadow);
    min-height: 80px;
}

.stat .label {
    font-size: 12px;
    opacity: .92;
    margin-bottom: 6px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .3px;
}

.stat .value {
    font-size: 14.5px;
    line-height: 1.5;
    font-weight: 700;
}

.stat .sub {
    font-size: 11.5px;
    opacity: .9;
    font-weight: 500;
}

.stat.blue {
    background: linear-gradient(135deg, #2b8fe8, #1f6feb);
}

.stat.navy {
    background: linear-gradient(135deg, #16336a, #0e2340);
}

.stat.red {
    background: linear-gradient(135deg, #f0555f, #d92d3c);
}

.stat.amber {
    background: linear-gradient(135deg, #f7b73a, #e79712);
}

.stat.green {
    background: linear-gradient(135deg, #28b06b, #1f9d55);
}

.stat.purple {
    background: linear-gradient(135deg, #9a7ce8, #7c5cd6);
}

.stat.teal {
    background: linear-gradient(135deg, #22b8a8, #0f9b8e);
}

.grid-2 {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 16px;
    align-items: start;
}

.stack>.card:last-child {
    margin-bottom: 0;
}

/* Current division blink card */
.division-card {
    border-radius: var(--radius);
    padding: 18px;
    color: #fff;
    background: linear-gradient(135deg, #f0555f, #d92d3c);
    box-shadow: var(--shadow);
    position: relative;
    overflow: hidden;
}

.division-card .num {
    font-size: 34px;
    font-weight: 800;
    line-height: 1;
    display: flex;
    align-items: center;
    gap: 10px;
}

.blink-dot {
    width: 11px;
    height: 11px;
    border-radius: 50%;
    background: #fff;
    animation: blink 1.3s infinite;
}

@keyframes blink {

    0%,
    100% {
        opacity: 1;
    }

    50% {
        opacity: .25;
    }
}

.division-card .dname {
    font-size: 13px;
    opacity: .95;
    margin-top: 6px;
    font-weight: 600;
}

.division-card .more {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    margin-top: 14px;
    font-size: 12.5px;
    font-weight: 700;
    color: #fff;
    opacity: .95;
}

.toggle-row {
    display: flex;
    gap: 6px;
}

.toggle-btn {
    padding: 5px 12px;
    border-radius: 6px;
    border: 1px solid var(--gray-300);
    background: #fff;
    font-size: 12px;
    font-weight: 600;
    color: var(--gray-700);
}

.toggle-btn.active {
    background: var(--navy);
    color: #fff;
    border-color: var(--navy);
}

.chart-wrap {
    position: relative;
    height: 230px;
}

.chart-wrap.donut {
    height: 230px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.badge-danger {
    background: var(--red);
    color: #fff;
    font-size: 11.5px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
}

.legend-row {
    display: flex;
    align-items: center;
    gap: 18px;
    font-size: 12.5px;
    color: var(--gray-700);
    margin-bottom: 8px;
}

.legend-dot {
    display: inline-block;
    width: 9px;
    height: 9px;
    border-radius: 50%;
    margin-right: 6px;
}

/* Bangladesh division map */
.bd-map-panel {
    background: #fbfcfe;
    border-radius: 8px;
    padding: 18px;
    height: 100%;
}

.bd-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-areas:
        ".      rangpur    mymensingh sylhet"
        "rajshahi dhaka    dhaka      .     "
        "khulna barishal   chattogram .     ";
    gap: 10px;
    min-height: 230px;
}

.div-tile {
    border-radius: 8px;
    padding: 10px 12px;
    background: #fff;
    border: 1px solid var(--gray-300);
    box-shadow: 0 1px 2px rgba(16, 30, 54, .05);
}

.div-tile .dn {
    font-size: 12px;
    font-weight: 700;
    color: var(--navy);
    display: flex;
    align-items: center;
    gap: 6px;
}

.div-tile .dc {
    font-size: 18px;
    font-weight: 800;
    margin-top: 4px;
    color: var(--ink);
}

.dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    flex-shrink: 0;
}

.dot.on {
    background: var(--green);
}

.dot.off {
    background: var(--gray-500);
}

.tile-rangpur {
    grid-area: rangpur;
}

.tile-mymensingh {
    grid-area: mymensingh;
}

.tile-sylhet {
    grid-area: sylhet;
}

.tile-rajshahi {
    grid-area: rajshahi;
}

.tile-dhaka {
    grid-area: dhaka;
    background: var(--blue-light);
    border-color: #bcd7f7;
}

.tile-khulna {
    grid-area: khulna;
}

.tile-barishal {
    grid-area: barishal;
}

.tile-chattogram {
    grid-area: chattogram;
}

.map-tabs {
    display: flex;
    gap: 0;
    margin-top: 14px;
    border-top: 1px solid var(--gray-100);
    padding-top: 12px;
}

.map-tab {
    flex: 1;
    text-align: center;
    font-size: 12px;
    font-weight: 700;
    color: var(--gray-700);
    padding: 6px;
    border-radius: 6px;
}

.map-tab.active {
    color: var(--blue);
}

.map-tab .n {
    display: block;
    font-size: 16px;
    color: var(--ink);
    font-weight: 800;
    margin-bottom: 2px;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

th {
    text-align: left;
    color: var(--gray-700);
    font-weight: 700;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .4px;
    padding: 10px 12px;
    border-bottom: 2px solid var(--gray-100);
    background: var(--gray-50);
}

td {
    padding: 10px 12px;
    border-bottom: 1px solid var(--gray-100);
    color: var(--ink);
}

tr:hover td {
    background: #fafbfd;
}

.status-approved {
    color: var(--green);
    font-weight: 600;
}

.status-pending {
    color: var(--amber);
    font-weight: 600;
}

.status-not {
    color: var(--red);
    font-weight: 600;
}

.btn-details {
    background: var(--navy);
    color: #fff;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.table-scroll {
    overflow-x: auto;
}

.suggested-row {
    display: flex;
    align-items: center;
    gap: 14px;
    background: var(--blue-light);
    border: 1px solid #cfe0ff;
    border-radius: 8px;
    padding: 14px 16px;
    margin-bottom: 16px;
}

.suggested-row span {
    font-size: 13.5px;
    color: var(--navy);
    font-weight: 600;
}

.btn-primary {
    background: var(--navy);
    color: #fff;
    border: none;
    padding: 9px 18px;
    border-radius: 7px;
    font-weight: 600;
    font-size: 13px;
}

@media (max-width:1000px) {
    .stat-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .grid-2 {
        grid-template-columns: 1fr;
    }
}

@media (max-width:560px) {
    .stat-grid {
        grid-template-columns: 1fr;
    }

    .quicklinks {
        flex-direction: column;
    }
}

.chart-wrap {
    position: relative;
    height: 230px;
    width: 100%;
    /* কন্টেইনারের উইডথ ১০০% থাকবে */
    min-width: 0;
    /* ফ্লেক্স বা গ্রিডের ভেতর চাটকে ওভারফ্লো হওয়া থেকে আটকাবে */
}

/* গ্রিডের ভেতরের চাট দুটি যেন কার্ডের বাইরে না যায় */
.grid-2>div {
    min-width: 0;
}
</style>

<div class="main">


    <div class="content">
        <!-- ================= DASHBOARD VIEW ================= -->
        <div class="quicklinks">
            <a class="qbtn primary" href="#">Home</a>
            <a class="qbtn faq" href="#">FAQ Page</a>
            <a class="qbtn manual" href="#">User Manual PDF</a>
            <a class="qbtn status" href="#">Submitted Status</a>
            <a class="qbtn map" href="#"
                onclick="document.getElementById('bdMapCard').scrollIntoView({behavior:'smooth'});">Division Wise Data
                (Map)</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="font-size:13px;font-weight:700;color:var(--navy);margin-bottom:10px;">Search By Case Number
                    (Status)</div>
                <div class="search-row">
                    <input type="text" placeholder="Enter Case Number">
                    <button class="btn-search">Search</button>
                </div>
            </div>
        </div>

        <div class="stat-grid">
            <div class="stat blue">
                <div class="label">Last Reporting Status</div>
                <div class="value">Submitted</div>
                <div class="sub">14 Jul 2026, 6:40 PM</div>
            </div>
            <div class="stat navy">
                <div class="label">Number of Agencies</div>
                <div class="value">58 Active</div>
                <div class="sub">6 Inactive</div>
            </div>
            <div class="stat amber">
                <div class="label">Total Num of Cases</div>
                <div class="value">1,284 Pending</div>
                <div class="sub">3,946 Ongoing</div>
            </div>
            <div class="stat green">
                <div class="label">Case Submitted</div>
                <div class="value">4,512 Approved</div>
                <div class="sub">718 Not Approved</div>
            </div>
            <div class="stat purple">
                <div class="label">Total User Num</div>
                <div class="value">312 Active</div>
                <div class="sub">47 Inactive</div>
            </div>
            <div class="stat teal">
                <div class="label">Live User</div>
                <div class="value">96 Online</div>
                <div class="sub">216 Offline</div>
            </div>
            <div class="stat red">
                <div class="label">Data Covered Division</div>
                <div class="value">7 Active</div>
                <div class="sub">1 Inactive</div>
            </div>
        </div>

        <div class="grid-2">
            <div class="stack">
                <div class="division-card">
                    <div class="num"><span class="blink-dot"></span>65</div>
                    <div class="dname">Dhaka Division — Cases This Month</div>
                    <a class="more" href="#">More Info →</a>
                </div>
                <div class="card" style="margin-top:16px;">
                    <div class="card-header">
                        <h3>Cases Month Wise (Month/Number)</h3>
                        <div class="toggle-row">
                            <button class="toggle-btn active" id="btnArea">Area</button>
                            <button class="toggle-btn" id="btnDonut">Donut</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-wrap" id="areaWrap"><canvas id="chartCasesArea"></canvas></div>
                        <div class="chart-wrap donut" id="donutWrap" style="display:none;"><canvas
                                id="chartCasesDonut"></canvas></div>
                    </div>
                </div>
            </div>

            <div class="card" id="bdMapCard" style="margin-bottom:0;">
                <div class="card-header">
                    <h3>Map of Bangladesh — Divisional Data</h3>
                </div>
                <div class="card-body">
                    <div class="bd-map-panel">
                        <div class="bd-grid">
                            <div class="div-tile tile-rangpur">
                                <div class="dn"><span class="dot on"></span>Rangpur</div>
                                <div class="dc">312</div>
                            </div>
                            <div class="div-tile tile-mymensingh">
                                <div class="dn"><span class="dot on"></span>Mymensingh</div>
                                <div class="dc">198</div>
                            </div>
                            <div class="div-tile tile-sylhet">
                                <div class="dn"><span class="dot on"></span>Sylhet</div>
                                <div class="dc">247</div>
                            </div>
                            <div class="div-tile tile-rajshahi">
                                <div class="dn"><span class="dot on"></span>Rajshahi</div>
                                <div class="dc">356</div>
                            </div>
                            <div class="div-tile tile-dhaka">
                                <div class="dn"><span class="dot on"></span>Dhaka</div>
                                <div class="dc">1,142</div>
                            </div>
                            <div class="div-tile tile-khulna">
                                <div class="dn"><span class="dot on"></span>Khulna</div>
                                <div class="dc">289</div>
                            </div>
                            <div class="div-tile tile-barishal">
                                <div class="dn"><span class="dot off"></span>Barishal</div>
                                <div class="dc">104</div>
                            </div>
                            <div class="div-tile tile-chattogram">
                                <div class="dn"><span class="dot on"></span>Chattogram</div>
                                <div class="dc">683</div>
                            </div>
                        </div>
                        <div class="map-tabs">
                            <div class="map-tab active"><span class="n">8</span>Divisions</div>
                            <div class="map-tab"><span class="n">96</span>Online Now</div>
                            <div class="map-tab"><span class="n">3,331</span>Total Cases</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Daily Case Update History (15 Days)</h3>
                <span class="badge-danger">Backlog Alert</span>
            </div>
            <div class="card-body">
                <div class="legend-row">
                    <span><span class="legend-dot" style="background:#2b8fe8;"></span>Submitted Number</span>
                    <span><span class="legend-dot" style="background:#f0c419;"></span>Pending Number</span>
                </div>
                <div class="chart-wrap"><canvas id="chartDailyCases"></canvas></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Monthly Case Update History</h3>
            </div>
            <div class="card-body">
                <div class="legend-row">
                    <span><span class="legend-dot" style="background:#2b8fe8;"></span>Submitted</span>
                    <span><span class="legend-dot" style="background:#f0c419;"></span>Pending</span>
                </div>
                <div class="chart-wrap"><canvas id="chartMonthlyCases"></canvas></div>
            </div>
        </div>

        <div class="suggested-row">
            <span>Case Status:</span>
            <button class="btn-primary" id="caseStatusBtn">Click To See</button>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Case Submission History (Last 1 year)</h3><span
                    style="cursor:pointer;color:var(--gray-700);">⬇</span>
            </div>
            <div class="card-body table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Case Submitted Date</th>
                            <th>User Name</th>
                            <th>Agencies Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="summaryBody"></tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Case Update History — Bar Diagram View</h3>
            </div>
            <div class="card-body">
                <div class="grid-2">
                    <div>
                        <div style="font-size:13px;font-weight:700;color:var(--navy);margin-bottom:4px;">Daily Case
                            Update History (15 Days)</div>
                        <div class="legend-row">
                            <span><span class="legend-dot" style="background:#2b8fe8;"></span>Submitted Number</span>
                            <span><span class="legend-dot" style="background:#f0c419;"></span>Pending Number</span>
                        </div>
                        <div class="chart-wrap"><canvas id="chartDailyCasesBar"></canvas></div>
                    </div>
                    <div>
                        <div style="font-size:13px;font-weight:700;color:var(--navy);margin-bottom:4px;">Monthly Case
                            Update History</div>
                        <div class="legend-row">
                            <span><span class="legend-dot" style="background:#2b8fe8;"></span>Submitted Number</span>
                            <span><span class="legend-dot" style="background:#f0c419;"></span>Pending Number</span>
                        </div>
                        <div class="chart-wrap"><canvas id="chartMonthlyCasesBar"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/* ---------- Case Submission History table ---------- */
const summaryRows = [
    ['14 Jul 2026 18:40', 'Md. Sohel Rana', 'Bangladesh Police (CID)', 'approved'],
    ['13 Jul 2026 11:05', 'Farzana Akter', 'RAB', 'pending'],
    ['11 Jul 2026 09:22', 'Abdul Kader', 'DNCC Social Services', 'approved'],
    ['09 Jul 2026 16:47', 'Nasrin Sultana', 'Border Guard Bangladesh', 'not'],
    ['06 Jul 2026 14:10', 'Imran Hossain', 'Coast Guard', 'approved'],
    ['02 Jul 2026 10:33', 'Shirin Aktar', 'Ansar-VDP', 'pending'],
    ['28 Jun 2026 17:52', 'Rafiqul Islam', 'Bangladesh Police (CID)', 'approved'],
];
const statusMap = {
    approved: ['Approved', 'status-approved'],
    pending: ['Pending', 'status-pending'],
    not: ['Not Approved', 'status-not']
};
const sBody = document.getElementById('summaryBody');
if (sBody) {
    summaryRows.forEach(r => {
        const [label, cls] = statusMap[r[3]];
        sBody.insertAdjacentHTML('beforeend',
            `<tr><td><button class="btn-details">Details</button></td><td>${r[0]}</td><td>${r[1]}</td><td>${r[2]}</td><td class="${cls}">${label}</td></tr>`
        );
    });
}

const caseStatusBtn = document.getElementById('caseStatusBtn');
if (caseStatusBtn) {
    caseStatusBtn.addEventListener('click', function() {
        this.textContent = 'Approved (4,512) · Pending (1,284)';
    });
}

/* ---------- Charts Initiation ---------- */
Chart.defaults.font.family = "'Segoe UI',Roboto,Arial,sans-serif";
Chart.defaults.font.size = 11.5;
Chart.defaults.color = '#48566b';

const caseMonths = ['Aug 25', 'Sep 25', 'Oct 25', 'Nov 25', 'Dec 25', 'Jan 26', 'Feb 26', 'Mar 26', 'Apr 26', 'May 26',
    'Jun 26', 'Jul 26'
];
const caseCounts = [210, 264, 301, 342, 288, 255, 309, 378, 402, 365, 410, 65];

const dailyLabels = ['22 Jun 26', '23 Jun 26', '24 Jun 26', '25 Jun 26', '26 Jun 26', '27 Jun 26', '28 Jun 26',
    '29 Jun 26', '01 Jul 26', '02 Jul 26', '03 Jul 26', '04 Jul 26', '05 Jul 26', '06 Jul 26'
];
const dailySubmitted = [46, 46, 48, 48, 51, 40, 46, 51, 26, 26, 27, 28, 27, 31];
const dailyPending = [5, 5, 6, 6, 6, 5, 5, 6, 12, 6, 6, 6, 6, 7];

// Line Chart: Daily
const chartDailyCasesEl = document.getElementById('chartDailyCases');
if (chartDailyCasesEl) {
    new Chart(chartDailyCasesEl, {
        type: 'line',
        data: {
            labels: dailyLabels,
            datasets: [{
                    label: 'Submitted Number',
                    data: dailySubmitted,
                    borderColor: '#2b8fe8',
                    backgroundColor: 'rgba(43,143,232,.08)',
                    tension: .35,
                    pointRadius: 2,
                    fill: false,
                    yAxisID: 'y'
                },
                {
                    label: 'Pending Number',
                    data: dailyPending,
                    borderColor: '#f0c419',
                    backgroundColor: 'rgba(240,196,25,.08)',
                    tension: .35,
                    pointRadius: 2,
                    fill: false,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    position: 'left',
                    grid: {
                        color: '#f0f2f6'
                    }
                },
                y1: {
                    position: 'right',
                    grid: {
                        drawOnChartArea: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Line Chart: Monthly
const monthLabels = ['Jul 25', 'Aug 25', 'Sep 25', 'Oct 25', 'Nov 25', 'Dec 25', 'Jan 26', 'Feb 26', 'Mar 26', 'Apr 26',
    'May 26', 'Jun 26'
];
const monthlySubmitted = [1573.28, 1597.19, 1534.42, 1595.67, 1006, 615.18, 83.53, 197.79, 414.52, 615.39, 545.13,
    649.07
];
const monthlyPending = [236.73, 239.88, 231.61, 239.68, 160, 105.65, 43.04, 77.78, 105.68, 95.92, 152.44, 142.0];

const chartMonthlyCasesEl = document.getElementById('chartMonthlyCases');
if (chartMonthlyCasesEl) {
    new Chart(chartMonthlyCasesEl, {
        type: 'line',
        data: {
            labels: monthLabels,
            datasets: [{
                    label: 'Submitted',
                    data: monthlySubmitted,
                    borderColor: '#2b8fe8',
                    backgroundColor: 'rgba(43,143,232,.08)',
                    tension: .35,
                    pointRadius: 2,
                    fill: false,
                    yAxisID: 'y'
                },
                {
                    label: 'Pending',
                    data: monthlyPending,
                    borderColor: '#f0c419',
                    backgroundColor: 'rgba(240,196,25,.08)',
                    tension: .35,
                    pointRadius: 2,
                    fill: false,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    position: 'left',
                    grid: {
                        color: '#f0f2f6'
                    }
                },
                y1: {
                    position: 'right',
                    grid: {
                        drawOnChartArea: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Horizontal Bar Chart: Daily
const chartDailyCasesBarEl = document.getElementById('chartDailyCasesBar');
if (chartDailyCasesBarEl) {
    new Chart(chartDailyCasesBarEl, {
        type: 'bar',
        data: {
            labels: dailyLabels,
            datasets: [{
                    label: 'Submitted Number',
                    data: dailySubmitted,
                    backgroundColor: '#2b8fe8',
                    borderRadius: 3
                },
                {
                    label: 'Pending Number',
                    data: dailyPending,
                    backgroundColor: '#f0c419',
                    borderRadius: 3
                }
            ]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        color: '#f0f2f6'
                    }
                },
                y: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Horizontal Bar Chart: Monthly
const chartMonthlyCasesBarEl = document.getElementById('chartMonthlyCasesBar');
if (chartMonthlyCasesBarEl) {
    new Chart(chartMonthlyCasesBarEl, {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: [{
                    label: 'Submitted Number',
                    data: monthlySubmitted,
                    backgroundColor: '#2b8fe8',
                    borderRadius: 3
                },
                {
                    label: 'Pending Number',
                    data: monthlyPending,
                    backgroundColor: '#f0c419',
                    borderRadius: 3
                }
            ]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        color: '#f0f2f6'
                    }
                },
                y: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

// Toggleable Charts: Area & Donut
const chartCasesAreaEl = document.getElementById('chartCasesArea');
if (chartCasesAreaEl) {
    new Chart(chartCasesAreaEl, {
        type: 'line',
        data: {
            labels: caseMonths,
            datasets: [{
                label: 'Cases',
                data: caseCounts,
                borderColor: '#1f6feb',
                backgroundColor: 'rgba(31,111,235,.12)',
                tension: .35,
                pointRadius: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    grid: {
                        color: '#f0f2f6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

const chartCasesDonutEl = document.getElementById('chartCasesDonut');
if (chartCasesDonutEl) {
    new Chart(chartCasesDonutEl, {
        type: 'doughnut',
        data: {
            labels: ['Approved', 'Pending', 'Ongoing', 'Not Approved'],
            datasets: [{
                data: [4512, 1284, 3946, 718],
                backgroundColor: ['#1f9d55', '#f5a524', '#1f6feb', '#e13946']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

const btnArea = document.getElementById('btnArea');
const btnDonut = document.getElementById('btnDonut');
const areaWrap = document.getElementById('areaWrap');
const donutWrap = document.getElementById('donutWrap');

if (btnArea && btnDonut && areaWrap && donutWrap) {
    btnArea.addEventListener('click', () => {
        btnArea.classList.add('active');
        btnDonut.classList.remove('active');
        areaWrap.style.display = 'block';
        donutWrap.style.display = 'none';
    });
    btnDonut.addEventListener('click', () => {
        btnDonut.classList.add('active');
        btnArea.classList.remove('active');
        areaWrap.style.display = 'none';
        donutWrap.style.display = 'flex';
    });
}
</script>
@endsection