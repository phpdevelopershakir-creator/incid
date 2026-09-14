@if (($questiontitles[0]->status ?? null) == 1)
@php
$question_1_data = session()->get('question1');
$q1_checked = isset($question_1_data['q1_checked_value']) ? (string)$question_1_data['q1_checked_value'] : null;
$q1_data = $question_1_data['q1_data'] ?? [];
@endphp

<div class="card question1">
    <div class="card-header" role="tab" id="heading-2">
        <h6 class="card-title" style="color: {{ !empty($question_1_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-1" aria-expanded="false" aria-controls="collapse-1">
                1. {{ $questiontitles[0]->title }}
            </a>
        </h6>
    </div>


    <div id="Question-1" class="collapse" role="tabpane1" aria-labelledby="heading-2" data-parent="#accordion-1">

        <div class="card-body">
            <!-- Radio Options -->
            <div class="form-group mb-3">
                <input type="radio" id="radioYes1" class="oneStatus" name="is_trafficking_investigations_q1" value="1"
                    {{ (is_null($q1_checked) || $q1_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes1" class="mr-3">Yes</label>

                <input type="radio" id="radioNo1" class="oneStatus" name="is_trafficking_investigations_q1" value="0"
                    {{ ($q1_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo1" class="mr-3">No</label>

                <input type="radio" id="radioOthers1" class="oneStatus" name="is_trafficking_investigations_q1"
                    value="2" {{ ($q1_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers1">Others</label>
            </div>

            <!-- YES SECTION -->
            <div id="yes_extra_q1"
                style="display: {{ (is_null($q1_checked) || $q1_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="trafficking_investigations_title_q1" class="form-control mb-3 q1-yes-input"
                    placeholder="Please describe" value="{{ $q1_data['trafficking_investigations_title_q1'] ?? '' }}">

                <!-- ==================== 1. INTERNAL TRAFFICKING ==================== -->
                <div class="text-center font-weight-bold p-2 mb-2">Internal Trafficking
                </div>

                <table class="table table-bordered align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th style="width:35%;">Indicators</th>
                            <th>Increased</th>
                            <th>Decreased</th>
                            <th>Newly Emerged</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sex Trafficking -->
                        <tr class="bg-secondary text-white">
                            <td colspan="5" style="color:black"><strong><u>Sex Trafficking</u></strong></td>
                        </tr>
                        <tr>
                            <td>Trafficking in Men</td>
                            <td><input type="number" name="int_sex_men_inc" class="form-control int_sex_inc q1_calc"
                                    value="{{ $q1_data['int_sex_men_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_men_dec" class="form-control int_sex_dec q1_calc"
                                    value="{{ $q1_data['int_sex_men_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_men_new" class="form-control int_sex_new q1_calc"
                                    value="{{ $q1_data['int_sex_men_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_sex_men_desc" class="form-control"
                                    value="{{ $q1_data['int_sex_men_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in Women</td>
                            <td><input type="number" name="int_sex_women_inc" class="form-control int_sex_inc q1_calc"
                                    value="{{ $q1_data['int_sex_women_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_women_dec" class="form-control int_sex_dec q1_calc"
                                    value="{{ $q1_data['int_sex_women_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_women_new" class="form-control int_sex_new q1_calc"
                                    value="{{ $q1_data['int_sex_women_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_sex_women_desc" class="form-control"
                                    value="{{ $q1_data['int_sex_women_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in boys</td>
                            <td><input type="number" name="int_sex_boys_inc" class="form-control int_sex_inc q1_calc"
                                    value="{{ $q1_data['int_sex_boys_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_boys_dec" class="form-control int_sex_dec q1_calc"
                                    value="{{ $q1_data['int_sex_boys_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_boys_new" class="form-control int_sex_new q1_calc"
                                    value="{{ $q1_data['int_sex_boys_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_sex_boys_desc" class="form-control"
                                    value="{{ $q1_data['int_sex_boys_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in girls</td>
                            <td><input type="number" name="int_sex_girls_inc" class="form-control int_sex_inc q1_calc"
                                    value="{{ $q1_data['int_sex_girls_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_girls_dec" class="form-control int_sex_dec q1_calc"
                                    value="{{ $q1_data['int_sex_girls_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_sex_girls_new" class="form-control int_sex_new q1_calc"
                                    value="{{ $q1_data['int_sex_girls_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_sex_girls_desc" class="form-control"
                                    value="{{ $q1_data['int_sex_girls_desc'] ?? '' }}"></td>
                        </tr>
                        <tr class="bg-light font-weight-bold">
                            <td>Total</td>
                            <td><input type="number" id="int_sex_tot_inc" class="form-control" readonly value="0">
                            </td>
                            <td><input type="number" id="int_sex_tot_dec" class="form-control" readonly value="0">
                            </td>
                            <td><input type="number" id="int_sex_tot_new" class="form-control" readonly value="0">
                            </td>
                            <td></td>
                        </tr>

                        <!-- Labour Trafficking -->
                        <tr class="bg-secondary text-white">
                            <td colspan="5" style="color:black"><strong><u>Labour Trafficking</u></strong></td>
                        </tr>
                        <tr>
                            <td>Trafficking in Men</td>
                            <td><input type="number" name="int_labour_men_inc"
                                    class="form-control int_labour_inc q1_calc"
                                    value="{{ $q1_data['int_labour_men_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_men_dec"
                                    class="form-control int_labour_dec q1_calc"
                                    value="{{ $q1_data['int_labour_men_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_men_new"
                                    class="form-control int_labour_new q1_calc"
                                    value="{{ $q1_data['int_labour_men_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_labour_men_desc" class="form-control"
                                    value="{{ $q1_data['int_labour_men_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in Women</td>
                            <td><input type="number" name="int_labour_women_inc"
                                    class="form-control int_labour_inc q1_calc"
                                    value="{{ $q1_data['int_labour_women_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_women_dec"
                                    class="form-control int_labour_dec q1_calc"
                                    value="{{ $q1_data['int_labour_women_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_women_new"
                                    class="form-control int_labour_new q1_calc"
                                    value="{{ $q1_data['int_labour_women_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_labour_women_desc" class="form-control"
                                    value="{{ $q1_data['int_labour_women_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in boys</td>
                            <td><input type="number" name="int_labour_boys_inc"
                                    class="form-control int_labour_inc q1_calc"
                                    value="{{ $q1_data['int_labour_boys_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_boys_dec"
                                    class="form-control int_labour_dec q1_calc"
                                    value="{{ $q1_data['int_labour_boys_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_boys_new"
                                    class="form-control int_labour_new q1_calc"
                                    value="{{ $q1_data['int_labour_boys_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_labour_boys_desc" class="form-control"
                                    value="{{ $q1_data['int_labour_boys_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in girls</td>
                            <td><input type="number" name="int_labour_girls_inc"
                                    class="form-control int_labour_inc q1_calc"
                                    value="{{ $q1_data['int_labour_girls_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_girls_dec"
                                    class="form-control int_labour_dec q1_calc"
                                    value="{{ $q1_data['int_labour_girls_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_labour_girls_new"
                                    class="form-control int_labour_new q1_calc"
                                    value="{{ $q1_data['int_labour_girls_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_labour_girls_desc" class="form-control"
                                    value="{{ $q1_data['int_labour_girls_desc'] ?? '' }}"></td>
                        </tr>
                        <tr class="bg-light font-weight-bold">
                            <td>Total</td>
                            <td><input type="number" id="int_labour_tot_inc" class="form-control" readonly value="0">
                            </td>
                            <td><input type="number" id="int_labour_tot_dec" class="form-control" readonly value="0">
                            </td>
                            <td><input type="number" id="int_labour_tot_new" class="form-control" readonly value="0">
                            </td>
                            <td></td>
                        </tr>

                        <!-- Others/Unspecified Trafficking -->
                        <tr class="bg-secondary text-white">
                            <td colspan="5" style="color:black"><strong><u>Others/Unspecified
                                        Trafficking</u></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>Trafficking in Men</td>
                            <td><input type="number" name="int_other_men_inc" class="form-control int_other_inc q1_calc"
                                    value="{{ $q1_data['int_other_men_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_men_dec" class="form-control int_other_dec q1_calc"
                                    value="{{ $q1_data['int_other_men_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_men_new" class="form-control int_other_new q1_calc"
                                    value="{{ $q1_data['int_other_men_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_other_men_desc" class="form-control"
                                    value="{{ $q1_data['int_other_men_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in Women</td>
                            <td><input type="number" name="int_other_women_inc"
                                    class="form-control int_other_inc q1_calc"
                                    value="{{ $q1_data['int_other_women_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_women_dec"
                                    class="form-control int_other_dec q1_calc"
                                    value="{{ $q1_data['int_other_women_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_women_new"
                                    class="form-control int_other_new q1_calc"
                                    value="{{ $q1_data['int_other_women_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_other_women_desc" class="form-control"
                                    value="{{ $q1_data['int_other_women_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in boys</td>
                            <td><input type="number" name="int_other_boys_inc"
                                    class="form-control int_other_inc q1_calc"
                                    value="{{ $q1_data['int_other_boys_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_boys_dec"
                                    class="form-control int_other_dec q1_calc"
                                    value="{{ $q1_data['int_other_boys_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_boys_new"
                                    class="form-control int_other_new q1_calc"
                                    value="{{ $q1_data['int_other_boys_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_other_boys_desc" class="form-control"
                                    value="{{ $q1_data['int_other_boys_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Trafficking in girls</td>
                            <td><input type="number" name="int_other_girls_inc"
                                    class="form-control int_other_inc q1_calc"
                                    value="{{ $q1_data['int_other_girls_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_girls_dec"
                                    class="form-control int_other_dec q1_calc"
                                    value="{{ $q1_data['int_other_girls_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="int_other_girls_new"
                                    class="form-control int_other_new q1_calc"
                                    value="{{ $q1_data['int_other_girls_new'] ?? 0 }}"></td>
                            <td><input type="text" name="int_other_girls_desc" class="form-control"
                                    value="{{ $q1_data['int_other_girls_desc'] ?? '' }}"></td>
                        </tr>
                        <tr class="text-white font-weight-bold" style="color:black">
                            <td>Total</td>
                            <td><input type="number" id="int_other_tot_inc" class="form-control" readonly value="0">
                            </td>
                            <td><input type="number" id="int_other_tot_dec" class="form-control" readonly value="0">
                            </td>
                            <td><input type="number" id="int_other_tot_new" class="form-control" readonly value="0">
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Screenshot_2_3: Origin & Destination District (Internal) -->
                <div class="mb-3">
                    <u class="font-weight-bold d-block mb-1" style="color:black">Origin District</u>
                    <table class="table table-bordered" id="tbl_origin_q1">
                        <thead>
                            <tr class="bg-light">
                                <th>District Name</th>
                                <th>Increased</th>
                                <th>Decreased</th>
                                <th>Newly Emerged</th>
                                <th>Description</th>
                                <th style="width:50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $origins = $q1_data['origin_district'] ?? ['']; @endphp
                            @foreach($origins as $idx => $dist)
                            <tr>
                                <td><input type="text" name="origin_district[]" class="form-control"
                                        value="{{ $dist }}"></td>
                                <td><input type="number" name="origin_inc[]" class="form-control"
                                        value="{{ $q1_data['origin_inc'][$idx] ?? 0 }}"></td>
                                <td><input type="number" name="origin_dec[]" class="form-control"
                                        value="{{ $q1_data['origin_dec'][$idx] ?? 0 }}"></td>
                                <td><input type="number" name="origin_new[]" class="form-control"
                                        value="{{ $q1_data['origin_new'][$idx] ?? 0 }}"></td>
                                <td><input type="text" name="origin_desc[]" class="form-control"
                                        value="{{ $q1_data['origin_desc'][$idx] ?? '' }}"></td>
                                <td><button type="button"
                                        class="btn btn-sm {{ $loop->first ? 'btn-primary add_origin_row' : 'btn-danger remove_row' }}"><i
                                            class="fa fa-{{ $loop->first ? 'plus' : 'trash' }}"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-3">
                    <u class="font-weight-bold d-block mb-1" style="color:black">Destination District</u>
                    <table class="table table-bordered" id="tbl_dest_q1">
                        <thead>
                            <tr class="bg-light">
                                <th>District Name</th>
                                <th>Increased</th>
                                <th>Decreased</th>
                                <th>Newly Emerged</th>
                                <th>Description</th>
                                <th style="width:50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $dests = $q1_data['dest_district'] ?? ['']; @endphp
                            @foreach($dests as $idx => $dist)
                            <tr>
                                <td><input type="text" name="dest_district[]" class="form-control" value="{{ $dist }}">
                                </td>
                                <td><input type="number" name="dest_inc[]" class="form-control"
                                        value="{{ $q1_data['dest_inc'][$idx] ?? 0 }}"></td>
                                <td><input type="number" name="dest_dec[]" class="form-control"
                                        value="{{ $q1_data['dest_dec'][$idx] ?? 0 }}"></td>
                                <td><input type="number" name="dest_new[]" class="form-control"
                                        value="{{ $q1_data['dest_new'][$idx] ?? 0 }}"></td>
                                <td><input type="text" name="dest_desc[]" class="form-control"
                                        value="{{ $q1_data['dest_desc'][$idx] ?? '' }}"></td>
                                <td><button type="button"
                                        class="btn btn-sm {{ $loop->first ? 'btn-primary add_dest_row' : 'btn-danger remove_row' }}"><i
                                            class="fa fa-{{ $loop->first ? 'plus' : 'trash' }}"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ==================== 2. INTERNATIONAL TRAFFICKING (Screenshot_3_3 & 4_2) ==================== -->
                @for($c = 1; $c <= 3; $c++) <div class="card mb-3 border">
                    <div class="card-header  font-weight-bold text-center">International
                        Trafficking
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label class="col-sm-3 font-weight-bold">Destination Country#{{ $c }} :</label>
                            <div class="col-sm-9">
                                <input type="text" name="dest_country_{{ $c }}" class="form-control"
                                    value="{{ $q1_data['dest_country_'.$c] ?? '' }}">
                            </div>
                        </div>

                        <table class="table table-bordered align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th style="width:35%;">Indicators</th>
                                    <th>Increased</th>
                                    <th>Decreased</th>
                                    <th>Newly Emerged</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sex Trafficking -->
                                <tr class="bg-secondary text-white">
                                    <td colspan="5" style="color:black"><strong><u>Sex Trafficking</u></strong></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in Men</td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_men_inc"
                                            class="form-control intl_{{ $c }}_sex_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_men_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_men_dec"
                                            class="form-control intl_{{ $c }}_sex_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_men_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_men_new"
                                            class="form-control intl_{{ $c }}_sex_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_men_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_sex_men_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_sex_men_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in Women</td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_women_inc"
                                            class="form-control intl_{{ $c }}_sex_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_women_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_women_dec"
                                            class="form-control intl_{{ $c }}_sex_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_women_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_women_new"
                                            class="form-control intl_{{ $c }}_sex_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_women_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_sex_women_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_sex_women_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in boys</td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_boys_inc"
                                            class="form-control intl_{{ $c }}_sex_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_boys_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_boys_dec"
                                            class="form-control intl_{{ $c }}_sex_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_boys_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_boys_new"
                                            class="form-control intl_{{ $c }}_sex_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_boys_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_sex_boys_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_sex_boys_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in girls</td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_girls_inc"
                                            class="form-control intl_{{ $c }}_sex_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_girls_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_girls_dec"
                                            class="form-control intl_{{ $c }}_sex_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_girls_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_sex_girls_new"
                                            class="form-control intl_{{ $c }}_sex_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_sex_girls_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_sex_girls_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_sex_girls_desc'] ?? '' }}"></td>
                                </tr>
                                <tr class="bg-light font-weight-bold" style="color:black">
                                    <td>Total</td>
                                    <td><input type="number" id="intl_{{ $c }}_sex_tot_inc" class="form-control"
                                            readonly value="0"></td>
                                    <td><input type="number" id="intl_{{ $c }}_sex_tot_dec" class="form-control"
                                            readonly value="0"></td>
                                    <td><input type="number" id="intl_{{ $c }}_sex_tot_new" class="form-control"
                                            readonly value="0"></td>
                                    <td></td>
                                </tr>

                                <!-- Labour Trafficking -->
                                <tr class="bg-secondary text-white">
                                    <td colspan="5" style="color:black"><strong><u>Labour Trafficking</u></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trafficking in Men</td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_men_inc"
                                            class="form-control intl_{{ $c }}_labour_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_men_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_men_dec"
                                            class="form-control intl_{{ $c }}_labour_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_men_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_men_new"
                                            class="form-control intl_{{ $c }}_labour_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_men_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_labour_men_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_labour_men_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in Women</td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_women_inc"
                                            class="form-control intl_{{ $c }}_labour_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_women_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_women_dec"
                                            class="form-control intl_{{ $c }}_labour_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_women_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_women_new"
                                            class="form-control intl_{{ $c }}_labour_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_women_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_labour_women_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_labour_women_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in boys</td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_boys_inc"
                                            class="form-control intl_{{ $c }}_labour_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_boys_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_boys_dec"
                                            class="form-control intl_{{ $c }}_labour_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_boys_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_boys_new"
                                            class="form-control intl_{{ $c }}_labour_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_boys_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_labour_boys_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_labour_boys_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in girls</td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_girls_inc"
                                            class="form-control intl_{{ $c }}_labour_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_girls_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_girls_dec"
                                            class="form-control intl_{{ $c }}_labour_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_girls_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_labour_girls_new"
                                            class="form-control intl_{{ $c }}_labour_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_labour_girls_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_labour_girls_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_labour_girls_desc'] ?? '' }}"></td>
                                </tr>
                                <tr class="bg-light font-weight-bold" style="color:black">
                                    <td>Total</td>
                                    <td><input type="number" id="intl_{{ $c }}_labour_tot_inc" class="form-control"
                                            readonly value="0"></td>
                                    <td><input type="number" id="intl_{{ $c }}_labour_tot_dec" class="form-control"
                                            readonly value="0"></td>
                                    <td><input type="number" id="intl_{{ $c }}_labour_tot_new" class="form-control"
                                            readonly value="0"></td>
                                    <td></td>
                                </tr>

                                <!-- Others/Unspecified Trafficking -->
                                <tr class="bg-secondary text-white">
                                    <td colspan="5" style="color:black"><strong><u>Others/Unspecified
                                                Trafficking</u></strong></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in Men</td>
                                    <td><input type="number" name="intl_{{ $c }}_other_men_inc"
                                            class="form-control intl_{{ $c }}_other_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_men_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_men_dec"
                                            class="form-control intl_{{ $c }}_other_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_men_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_men_new"
                                            class="form-control intl_{{ $c }}_other_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_men_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_other_men_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_other_men_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in Women</td>
                                    <td><input type="number" name="intl_{{ $c }}_other_women_inc"
                                            class="form-control intl_{{ $c }}_other_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_women_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_women_dec"
                                            class="form-control intl_{{ $c }}_other_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_women_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_women_new"
                                            class="form-control intl_{{ $c }}_other_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_women_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_other_women_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_other_women_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in boys</td>
                                    <td><input type="number" name="intl_{{ $c }}_other_boys_inc"
                                            class="form-control intl_{{ $c }}_other_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_boys_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_boys_dec"
                                            class="form-control intl_{{ $c }}_other_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_boys_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_boys_new"
                                            class="form-control intl_{{ $c }}_other_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_boys_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_other_boys_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_other_boys_desc'] ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Trafficking in girls</td>
                                    <td><input type="number" name="intl_{{ $c }}_other_girls_inc"
                                            class="form-control intl_{{ $c }}_other_inc q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_girls_inc'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_girls_dec"
                                            class="form-control intl_{{ $c }}_other_dec q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_girls_dec'] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_{{ $c }}_other_girls_new"
                                            class="form-control intl_{{ $c }}_other_new q1_calc"
                                            value="{{ $q1_data['intl_'.$c.'_other_girls_new'] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_{{ $c }}_other_girls_desc" class="form-control"
                                            value="{{ $q1_data['intl_'.$c.'_other_girls_desc'] ?? '' }}"></td>
                                </tr>
                                <tr class="bg-light font-weight-bold" style="color:black">
                                    <td>Total</td>
                                    <td><input type="number" id="intl_{{ $c }}_other_tot_inc" class="form-control"
                                            readonly value="0"></td>
                                    <td><input type="number" id="intl_{{ $c }}_other_tot_dec" class="form-control"
                                            readonly value="0"></td>
                                    <td><input type="number" id="intl_{{ $c }}_other_tot_new" class="form-control"
                                            readonly value="0"></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- International Origin District -->
                        <u class="font-weight-bold d-block mb-1" style="color:black">Origin District</u>
                        <table class="table table-bordered" id="tbl_intl_origin_{{ $c }}">
                            <thead>
                                <tr class="bg-light">
                                    <th>District Name</th>
                                    <th>Increased</th>
                                    <th>Decreased</th>
                                    <th>Newly Emerged</th>
                                    <th>Description</th>
                                    <th style="width:50px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $intl_origins = $q1_data['intl_origin_'.$c] ?? ['']; @endphp
                                @foreach($intl_origins as $idx => $dist)
                                <tr>
                                    <td><input type="text" name="intl_origin_{{ $c }}[]" class="form-control"
                                            value="{{ $dist }}"></td>
                                    <td><input type="number" name="intl_origin_{{ $c }}_inc[]" class="form-control"
                                            value="{{ $q1_data['intl_origin_'.$c.'_inc'][$idx] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_origin_{{ $c }}_dec[]" class="form-control"
                                            value="{{ $q1_data['intl_origin_'.$c.'_dec'][$idx] ?? 0 }}"></td>
                                    <td><input type="number" name="intl_origin_{{ $c }}_new[]" class="form-control"
                                            value="{{ $q1_data['intl_origin_'.$c.'_new'][$idx] ?? 0 }}"></td>
                                    <td><input type="text" name="intl_origin_{{ $c }}_desc[]" class="form-control"
                                            value="{{ $q1_data['intl_origin_'.$c.'_desc'][$idx] ?? '' }}"></td>
                                    <td><button type="button"
                                            class="btn btn-sm {{ $loop->first ? 'btn-primary add_intl_origin_row' : 'btn-danger remove_row' }}"
                                            data-c="{{ $c }}"><i
                                                class="fa fa-{{ $loop->first ? 'plus' : 'trash' }}"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            @endfor

            <!-- ==================== 3. MODE OF RECRUITMENT (Screenshot_4_2) ==================== -->
            <div class="mb-3">
                <u class="font-weight-bold d-block mb-1" style="color:black">Mode of Recruitment</u>
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th style="width:35%;">Mode</th>
                            <th>Increased</th>
                            <th>Decreased</th>
                            <th>Newly Emerged</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fake Job offer</td>
                            <td><input type="number" name="mode_fake_job_inc" class="form-control"
                                    value="{{ $q1_data['mode_fake_job_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_fake_job_dec" class="form-control"
                                    value="{{ $q1_data['mode_fake_job_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_fake_job_new" class="form-control"
                                    value="{{ $q1_data['mode_fake_job_new'] ?? 0 }}"></td>
                            <td><input type="text" name="mode_fake_job_desc" class="form-control"
                                    value="{{ $q1_data['mode_fake_job_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Contract Replacement</td>
                            <td><input type="number" name="mode_contract_inc" class="form-control"
                                    value="{{ $q1_data['mode_contract_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_contract_dec" class="form-control"
                                    value="{{ $q1_data['mode_contract_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_contract_new" class="form-control"
                                    value="{{ $q1_data['mode_contract_new'] ?? 0 }}"></td>
                            <td><input type="text" name="mode_contract_desc" class="form-control"
                                    value="{{ $q1_data['mode_contract_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Debt bondage</td>
                            <td><input type="number" name="mode_debt_inc" class="form-control"
                                    value="{{ $q1_data['mode_debt_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_debt_dec" class="form-control"
                                    value="{{ $q1_data['mode_debt_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_debt_new" class="form-control"
                                    value="{{ $q1_data['mode_debt_new'] ?? 0 }}"></td>
                            <td><input type="text" name="mode_debt_desc" class="form-control"
                                    value="{{ $q1_data['mode_debt_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Web-based/Social media</td>
                            <td><input type="number" name="mode_web_social_inc" class="form-control"
                                    value="{{ $q1_data['mode_web_social_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_web_social_dec" class="form-control"
                                    value="{{ $q1_data['mode_web_social_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_web_social_new" class="form-control"
                                    value="{{ $q1_data['mode_web_social_new'] ?? 0 }}"></td>
                            <td><input type="text" name="mode_web_social_desc" class="form-control"
                                    value="{{ $q1_data['mode_web_social_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Fake marriage</td>
                            <td><input type="number" name="mode_fake_marriage_inc" class="form-control"
                                    value="{{ $q1_data['mode_fake_marriage_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_fake_marriage_dec" class="form-control"
                                    value="{{ $q1_data['mode_fake_marriage_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_fake_marriage_new" class="form-control"
                                    value="{{ $q1_data['mode_fake_marriage_new'] ?? 0 }}"></td>
                            <td><input type="text" name="mode_fake_marriage_desc" class="form-control"
                                    value="{{ $q1_data['mode_fake_marriage_desc'] ?? '' }}"></td>
                        </tr>
                        <tr>
                            <td>Smuggling</td>
                            <td><input type="number" name="mode_smuggling_inc" class="form-control"
                                    value="{{ $q1_data['mode_smuggling_inc'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_smuggling_dec" class="form-control"
                                    value="{{ $q1_data['mode_smuggling_dec'] ?? 0 }}"></td>
                            <td><input type="number" name="mode_smuggling_new" class="form-control"
                                    value="{{ $q1_data['mode_smuggling_new'] ?? 0 }}"></td>
                            <td><input type="text" name="mode_smuggling_desc" class="form-control"
                                    value="{{ $q1_data['mode_smuggling_desc'] ?? '' }}"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- OTHERS SECTION -->
        <div id="others_q1" style="display: {{ ($q1_checked === '2') ? 'block' : 'none' }};">
            <input type="text" name="other_trafficking_investigations_q1" class="form-control mt-2 q1-others-input"
                placeholder="Others details" value="{{ $q1_data['others'] ?? '' }}">
        </div>

    </div>

    <p class="text-right mr-3">
        <button type="button" class="btn btn-success" id="temp-save-question1">Save</button>
    </p>
</div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio button click toggle logic
    $(document).on('change', '.oneStatus', function() {
        let val = $("input[name='is_trafficking_investigations_q1']:checked").val() || '1';
        $('#yes_extra_q1').toggle(val === '1');
        $('#others_q1').toggle(val === '2');
    });

    // Sum calculation logic
    function calcTotals() {
        let cats = ['sex', 'labour', 'other'];

        // Internal Total Calculation
        cats.forEach(c => {
            ['inc', 'dec', 'new'].forEach(type => {
                let sum = 0;
                $(`.int_${c}_${type}`).each(function() {
                    sum += parseFloat($(this).val()) || 0;
                });
                $(`#int_${c}_tot_${type}`).val(sum);
            });
        });

        // International Total Calculation (Country #1 to #3)
        for (let i = 1; i <= 3; i++) {
            cats.forEach(c => {
                ['inc', 'dec', 'new'].forEach(type => {
                    let sum = 0;
                    $(`.intl_${i}_${c}_${type}`).each(function() {
                        sum += parseFloat($(this).val()) || 0;
                    });
                    $(`#intl_${i}_${c}_tot_${type}`).val(sum);
                });
            });
        }
    }

    $(document).on('input', '.q1_calc', calcTotals);
    calcTotals();

    // Add Dynamic Rows for Origin/Destination District (Internal)
    $(document).on('click', '.add_origin_row, .add_dest_row', function() {
        let isOrigin = $(this).hasClass('add_origin_row');
        let type = isOrigin ? 'origin' : 'dest';
        let html = `<tr>
            <td><input type="text" name="${type}_district[]" class="form-control"></td>
            <td><input type="number" name="${type}_inc[]" class="form-control" value="0"></td>
            <td><input type="number" name="${type}_dec[]" class="form-control" value="0"></td>
            <td><input type="number" name="${type}_new[]" class="form-control" value="0"></td>
            <td><input type="text" name="${type}_desc[]" class="form-control"></td>
            <td><button type="button" class="btn btn-sm btn-danger remove_row"><i class="fa fa-trash"></i></button></td>
        </tr>`;
        $(`#tbl_${type}_q1 tbody`).append(html);
    });

    // Add Dynamic Rows for Origin District (International)
    $(document).on('click', '.add_intl_origin_row', function() {
        let c = $(this).data('c');
        let html = `<tr>
            <td><input type="text" name="intl_origin_${c}[]" class="form-control"></td>
            <td><input type="number" name="intl_origin_${c}_inc[]" class="form-control" value="0"></td>
            <td><input type="number" name="intl_origin_${c}_dec[]" class="form-control" value="0"></td>
            <td><input type="number" name="intl_origin_${c}_new[]" class="form-control" value="0"></td>
            <td><input type="text" name="intl_origin_${c}_desc[]" class="form-control"></td>
            <td><button type="button" class="btn btn-sm btn-danger remove_row"><i class="fa fa-trash"></i></button></td>
        </tr>`;
        $(`#tbl_intl_origin_${c} tbody`).append(html);
    });

    // Delete dynamic row
    $(document).on('click', '.remove_row', function() {
        $(this).closest('tr').remove();
    });

    // Save AJAX Functionality
    $(document).on("click", "#temp-save-question1", function() {
        let q1_data = {
            trafficking_investigations_title_q1: $('.q1-yes-input').val(),
            others: $('.q1-others-input').val()
        };

        $('#yes_extra_q1 input').each(function() {
            let name = $(this).attr('name');
            if (name) {
                if (name.includes('[]')) {
                    let cleanName = name.replace('[]', '');
                    if (!q1_data[cleanName]) q1_data[cleanName] = [];
                    q1_data[cleanName].push($(this).val());
                } else {
                    q1_data[name] = $(this).val();
                }
            }
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 1,
                question1: {
                    q1_checked_value: $(
                        "input[name='is_trafficking_investigations_q1']:checked").val(),
                    q1_data: q1_data
                }
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question1 .card-header h6').css('color', 'blue');
                    alert("Question 1 Saved Successfully!");
                }
            }
        });
    });

});
</script>