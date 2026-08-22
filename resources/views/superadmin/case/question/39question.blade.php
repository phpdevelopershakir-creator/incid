@if (($questiontitles[38]->status ?? null) == 1)
@php
// সেশন থেকে ৩৯ নম্বর প্রশ্নের ডাটা নেওয়া হচ্ছে
$question_39_data = session()->get('question39');
$q39_data = $question_39_data['q39_data'] ?? null;
@endphp

<div class="card question39">
    <div class="card-header" id="heading-39">
        <h6 style="color: {{ !empty($question_39_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-39" aria-expanded="false" aria-controls="Question-39">
                39. {{ $questiontitles[38]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-39" class="collapse" role="tabpanel" aria-labelledby="heading-39" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Question 1 -->
            <div class="form-group">
                <label class="font-weight-bold">Did service providers receive adequate training on providing care to
                    trauma survivors?</label>
                <textarea name="victims_restitution_title_one_q39" class="form-control q39-trauma-input" rows="3"
                    placeholder="Pls Describe">{{ $q39_data['trauma_survivors_training'] ?? '' }}</textarea>
            </div>

            <!-- Question 2 -->
            <div class="form-group">
                <label class="font-weight-bold">Were criminal justice officials adequately trained to seek and order
                    restitution for victims during criminal cases?</label>
                <textarea name="victims_restitution_title_two_q39" class="form-control q39-restitution-input" rows="3"
                    placeholder="Pls Describe">{{ $q39_data['restitution_training'] ?? '' }}</textarea>
            </div>

            <!-- Dynamic Table Section -->
            <div class="form-group mt-4">
                <label class="font-weight-bold">Please describe the training</label>
                <div class="table-responsive">
                    <table class="table table-bordered" id="training-table-q39">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Category Of Officials trained</th>
                                <th>Men</th>
                                <th>Women</th>
                                <th>Total</th>
                                <th style="width: 50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($q39_data['trainings']) && is_array($q39_data['trainings']))
                            @foreach($q39_data['trainings'] as $index => $training)
                            <tr>
                                <td>
                                    <select name="victims_restitution_location_q39b[]"
                                        class="form-control q39-location">
                                        <option value="">Choose an item.</option>
                                        <option value="Dhaka"
                                            {{ ($training['location'] ?? '') == 'Dhaka' ? 'selected' : '' }}>Dhaka
                                        </option>
                                        <option value="Chattogram"
                                            {{ ($training['location'] ?? '') == 'Chattogram' ? 'selected' : '' }}>
                                            Chattogram</option>
                                        <option value="Khulna"
                                            {{ ($training['location'] ?? '') == 'Khulna' ? 'selected' : '' }}>Khulna
                                        </option>
                                        <option value="Rajshahi"
                                            {{ ($training['location'] ?? '') == 'Rajshahi' ? 'selected' : '' }}>Rajshahi
                                        </option>
                                        <option value="Barishal"
                                            {{ ($training['location'] ?? '') == 'Barishal' ? 'selected' : '' }}>Barishal
                                        </option>
                                        <option value="Sylhet"
                                            {{ ($training['location'] ?? '') == 'Sylhet' ? 'selected' : '' }}>Sylhet
                                        </option>
                                        <option value="Rangpur"
                                            {{ ($training['location'] ?? '') == 'Rangpur' ? 'selected' : '' }}>Rangpur
                                        </option>
                                        <option value="Mymensingh"
                                            {{ ($training['location'] ?? '') == 'Mymensingh' ? 'selected' : '' }}>
                                            Mymensingh</option>
                                        <option value="National"
                                            {{ ($training['location'] ?? '') == 'National' ? 'selected' : '' }}>National
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <select name="victims_restitution_category_q39b[]"
                                        class="form-control q39-category">
                                        <option value="">Choose an item.</option>
                                        <option value="Police"
                                            {{ ($training['category'] ?? '') == 'Police' ? 'selected' : '' }}>Police
                                        </option>
                                        <option value="Judge"
                                            {{ ($training['category'] ?? '') == 'Judge' ? 'selected' : '' }}>Judge
                                        </option>
                                    </select>
                                </td>
                                <td><input type="number" name="victims_restitution_men_q39b[]"
                                        class="form-control q39-men" value="{{ $training['men'] ?? '' }}"></td>
                                <td><input type="number" name="victims_restitution_women_q39b[]"
                                        class="form-control q39-women" value="{{ $training['women'] ?? '' }}"></td>
                                <td><input type="number" name="victims_restitution_total_q39b[]"
                                        class="form-control q39-total" value="{{ $training['total'] ?? '' }}" readonly>
                                </td>
                                <td>
                                    @if($loop->first)
                                    <button type="button" class="btn btn-sm btn-primary add-row-q39">+</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger remove-row-q39">-</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>
                                    <select name="victims_restitution_location_q39b[]"
                                        class="form-control q39-location">
                                        <option value="">Choose an item.</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="National">National</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="victims_restitution_category_q39b[]"
                                        class="form-control q39-category">
                                        <option value="">Choose an item.</option>
                                        <option value="Police">Police</option>
                                        <option value="Judge">Judge</option>
                                    </select>
                                </td>
                                <td><input type="number" name="victims_restitution_men_q39b[]"
                                        class="form-control q39-men" value=""></td>
                                <td><input type="number" name="victims_restitution_women_q39b[]"
                                        class="form-control q39-women" value=""></td>
                                <td><input type="number" name="victims_restitution_total_q39b[]"
                                        class="form-control q39-total" value="" readonly></td>
                                <td><button type="button" class="btn btn-sm btn-primary add-row-q39">+</button></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Location Not Specified Section -->
            <div class="form-group mt-3">
                <label class="font-weight-bold text-danger">Location not specified</label>
                <p class="mb-1">Please describe-</p>
                <textarea name="victims_restitution_title_three_q39" class="form-control q39-location-not-specified"
                    rows="3"
                    placeholder="Text Area for description ">{{ $q39_data['location_not_specified'] ?? '' }}</textarea>
            </div>

            <!-- Additional Input Field -->
            <div class="form-group">
                <input type="text" name="victims_restitution_title_four_q39" class="form-control q39-additional-input"
                    placeholder="Input Field" value="{{ $q39_data['additional_input'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question39">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Dynamic Row Add
    $(document).on('click', '.add-row-q39', function() {
        let newRow = `
            <tr>
                <td>
                    <select name="victims_restitution_location_q39b[]" class="form-control q39-location">
                        <option value="">Choose an item.</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chattogram">Chattogram</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="National">National</option>
                    </select>
                </td>
                <td>
                    <select name="victims_restitution_category_q39b[]" class="form-control q39-category">
                        <option value="">Choose an item.</option>
                        <option value="Police">Police</option>
                        <option value="Judge">Judge</option>
                    </select>
                </td>
                <td><input type="number" name="victims_restitution_men_q39b[]" class="form-control q39-men" value=""></td>
                <td><input type="number" name="victims_restitution_women_q39b[]" class="form-control q39-women" value=""></td>
                <td><input type="number" name="victims_restitution_total_q39b[]" class="form-control q39-total" value="" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-row-q39">-</button></td>
            </tr>`;
        $('#training-table-q39 tbody').append(newRow);
    });

    // Dynamic Row Remove
    $(document).on('click', '.remove-row-q39', function() {
        $(this).closest('tr').remove();
    });

    // Auto Calculate Total Men + Women
    $(document).on('input', '.q39-men, .q39-women', function() {
        let row = $(this).closest('tr');
        let men = parseInt(row.find('.q39-men').val()) || 0;
        let women = parseInt(row.find('.q39-women').val()) || 0;
        row.find('.q39-total').val(men + women);
    });

    // Temp Save AJAX Request
    $(document).on("click", "#temp-save-question39", function(e) {
        e.preventDefault(); // ফর্ম অটো-সাবমিট বন্ধ করতে

        let trainings = [];

        $('#training-table-q39 tbody tr').each(function() {
            let location = $(this).find('.q39-location').val();
            let category = $(this).find('.q39-category').val();
            let men = $(this).find('.q39-men').val();
            let women = $(this).find('.q39-women').val();
            let total = $(this).find('.q39-total').val();

            if (location || category || men || women) {
                trainings.push({
                    location: location,
                    category: category,
                    men: men,
                    women: women,
                    total: total
                });
            }
        });

        let q39_data = {
            trauma_survivors_training: $('.q39-trauma-input').val(),
            restitution_training: $('.q39-restitution-input').val(),
            trainings: trainings,
            location_not_specified: $('.q39-location-not-specified').val(),
            additional_input: $('.q39-additional-input').val()
        };

        let new_data = {
            q39_data: q39_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 39,
                question39: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question39 .card-header h6').css('color', 'blue');
                    alert("Question 39 Temp Saved Successfully");
                } else {
                    alert("Not Saved");
                }
            },
            error: function(xhr, status, error) {
                alert("Something went wrong!");
                console.log(xhr.responseText);
            }
        });
    });
});
</script>