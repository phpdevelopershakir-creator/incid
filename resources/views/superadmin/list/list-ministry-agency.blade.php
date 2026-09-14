@extends('layouts.app')

@section('content')
<style>
  .custom-table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  }
  .custom-table thead th {
    background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
    color: #ffffff;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.8px;
    padding: 14px 16px;
    border: none;
  }
  .custom-table tbody tr {
    transition: all 0.2s ease-in-out;
  }
  .custom-table tbody tr:hover {
    background-color: rgba(75, 108, 183, 0.08) !important;
    transform: translateY(-1px);
  }
  .custom-table td {
    padding: 12px 16px;
    vertical-align: middle;
    font-size: 0.95rem;
    border-bottom: 1px solid #f0f0f0;
  }
  .sl-badge {
    background-color: #eef2f7;
    color: #333;
    font-weight: 600;
    width: 30px;
    height: 30px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 0.85rem;
  }
  .acronym-badge {
    background: #eef3fc;
    color: #2b569a;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 20px;
    border: 1px solid #d0e0f7;
    display: inline-block;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
  }
  .ministry-name {
    font-weight: 500;
    color: #2c3e50;
  }
</style>

<div class="content-wrapper">
  <div class="page-header d-flex align-items-center justify-content-between mb-4">
    <h3 class="page-title text-primary font-weight-bold">
      <i class="mdi mdi-bank mr-2"></i> Listed Ministry and Agency
    </h3>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card border-0 shadow-sm rounded-lg">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Government Bodies & Acronyms</h4>
            <span class="badge badge-light text-muted">Total: 44 Records</span>
          </div>
          
          <div class="table-responsive">
            <table class="table custom-table">
              <thead>
                <tr>
                  <th class="text-center" style="width: 70px;">#</th>
                  <th>Ministry / Government body</th>
                  <th class="text-center" style="width: 220px;">Common acronym</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center"><span class="sl-badge">1</span></td>
                  <td class="ministry-name">Ministry of Primary and Mass Education</td>
                  <td class="text-center"><span class="acronym-badge">MoPME</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">2</span></td>
                  <td class="ministry-name">Ministry of Agriculture</td>
                  <td class="text-center"><span class="acronym-badge">MoA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">3</span></td>
                  <td class="ministry-name">Ministry of Civil Aviation and Tourism</td>
                  <td class="text-center"><span class="acronym-badge">MoCAT</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">4</span></td>
                  <td class="ministry-name">Ministry of Commerce</td>
                  <td class="text-center"><span class="acronym-badge">MoC</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">5</span></td>
                  <td class="ministry-name">Ministry of Road Transport and Bridges</td>
                  <td class="text-center"><span class="acronym-badge">MoRTB</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">6</span></td>
                  <td class="ministry-name">Ministry of Cultural Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoCA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">7</span></td>
                  <td class="ministry-name">Ministry of Defence</td>
                  <td class="text-center"><span class="acronym-badge">MoD</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">8</span></td>
                  <td class="ministry-name">Ministry of Food</td>
                  <td class="text-center"><span class="acronym-badge">MoFood</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">9</span></td>
                  <td class="ministry-name">Ministry of Education</td>
                  <td class="text-center"><span class="acronym-badge">MoE</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">10</span></td>
                  <td class="ministry-name">Ministry of Environment, Forest and Climate Change</td>
                  <td class="text-center"><span class="acronym-badge">MoEFCC</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">11</span></td>
                  <td class="ministry-name">Ministry of Public Administration</td>
                  <td class="text-center"><span class="acronym-badge">MoPA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">12</span></td>
                  <td class="ministry-name">Ministry of Fisheries and Livestock</td>
                  <td class="text-center"><span class="acronym-badge">MoFL</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">13</span></td>
                  <td class="ministry-name">Ministry of Finance</td>
                  <td class="text-center"><span class="acronym-badge">MoF</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">14</span></td>
                  <td class="ministry-name">Ministry of Foreign Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoFA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">15</span></td>
                  <td class="ministry-name">Ministry of Health and Family Welfare</td>
                  <td class="text-center"><span class="acronym-badge">MoHFW</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">16</span></td>
                  <td class="ministry-name">Ministry of Home Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoHA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">17</span></td>
                  <td class="ministry-name">Ministry of Housing and Public Works</td>
                  <td class="text-center"><span class="acronym-badge">MoHPW</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">18</span></td>
                  <td class="ministry-name">Ministry of Industries</td>
                  <td class="text-center"><span class="acronym-badge">MoInd</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">19</span></td>
                  <td class="ministry-name">Ministry of Information and Broadcasting</td>
                  <td class="text-center"><span class="acronym-badge">MoIB</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">20</span></td>
                  <td class="ministry-name">Ministry of Textiles and Jute</td>
                  <td class="text-center"><span class="acronym-badge">MoTJ</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">21</span></td>
                  <td class="ministry-name">Ministry of Labour and Employment</td>
                  <td class="text-center"><span class="acronym-badge">MoLE</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">22</span></td>
                  <td class="ministry-name">Ministry of Law, Justice and Parliamentary Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoLJPA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">23</span></td>
                  <td class="ministry-name">Ministry of Land</td>
                  <td class="text-center"><span class="acronym-badge">MoL</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">24</span></td>
                  <td class="ministry-name">Ministry of Local Government, Rural Development and Co-operatives</td>
                  <td class="text-center"><span class="acronym-badge">MoLGRD&C</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">25</span></td>
                  <td class="ministry-name">Ministry of Expatriates' Welfare and Overseas Employment</td>
                  <td class="text-center"><span class="acronym-badge">MoEWOE</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">26</span></td>
                  <td class="ministry-name">Ministry of Shipping</td>
                  <td class="text-center"><span class="acronym-badge">MoS</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">27</span></td>
                  <td class="ministry-name">Ministry of Social Welfare</td>
                  <td class="text-center"><span class="acronym-badge">MoSW</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">28</span></td>
                  <td class="ministry-name">Ministry of Women and Children Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoWCA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">29</span></td>
                  <td class="ministry-name">Ministry of Water Resources</td>
                  <td class="text-center"><span class="acronym-badge">MoWR</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">30</span></td>
                  <td class="ministry-name">Ministry of Youth and Sports</td>
                  <td class="text-center"><span class="acronym-badge">MoYS</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">31</span></td>
                  <td class="ministry-name">Ministry of Liberation War Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoLWA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">32</span></td>
                  <td class="ministry-name">Ministry of Religious Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoRA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">33</span></td>
                  <td class="ministry-name">Ministry of Railways</td>
                  <td class="text-center"><span class="acronym-badge">MoR</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">34</span></td>
                  <td class="ministry-name">Ministry of Science and Technology</td>
                  <td class="text-center"><span class="acronym-badge">MoST</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">35</span></td>
                  <td class="ministry-name">Ministry of Disaster Management and Relief</td>
                  <td class="text-center"><span class="acronym-badge">MoDMR</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">36</span></td>
                  <td class="ministry-name">Ministry of Chittagong Hill Tracts Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoCHTA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">37</span></td>
                  <td class="ministry-name">Ministry of Power, Energy and Mineral Resources</td>
                  <td class="text-center"><span class="acronym-badge">MPEMR</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">38</span></td>
                  <td class="ministry-name">Ministry of Posts, Telecommunications and Information Technology</td>
                  <td class="text-center"><span class="acronym-badge">MoPTIT</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">39</span></td>
                  <td class="ministry-name">Ministry of Planning</td>
                  <td class="text-center"><span class="acronym-badge">MoP</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">40</span></td>
                  <td class="ministry-name">Ministry of Public Administration</td>
                  <td class="text-center"><span class="acronym-badge">MoPA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">41</span></td>
                  <td class="ministry-name">Ministry of Information and Broadcasting</td>
                  <td class="text-center"><span class="acronym-badge">MoIB</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">42</span></td>
                  <td class="ministry-name">Ministry of Local Government, Rural Development and Co-operatives</td>
                  <td class="text-center"><span class="acronym-badge">MoLGRD&C</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">43</span></td>
                  <td class="ministry-name">Ministry of Women and Children Affairs</td>
                  <td class="text-center"><span class="acronym-badge">MoWCA</span></td>
                </tr>
                <tr>
                  <td class="text-center"><span class="sl-badge">44</span></td>
                  <td class="ministry-name">Bangladesh Embassy/Mission /Consulate</td>
                  <td class="text-center"><span class="acronym-badge">BE/M/C</span></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection