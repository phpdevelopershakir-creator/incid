@if (($questiontitles[41]->status ?? null) == 1)
@php
// সেশন থেকে ৪২ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_42_data = session()->get('question42');

$official_title_q42 = $question_42_data['official_title_q42'] ?? '';
$official_type_q42 = $question_42_data['official_type_q42'] ?? '';
$official_desc_q42 = $question_42_data['official_desc_q42'] ?? '';
@endphp

<div class="card question42">
    <div class="card-header" role="tab" id="heading-42">
        <h6 class="card-title" style="color: {{ !empty($question_42_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-42" aria-expanded="false" aria-controls="collapse-42">
                42. {{ $questiontitles[41]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-42" class="collapse" role="tabpanel" aria-labelledby="heading-42" data-parent="#accordion-2">
        <div class="card-body">

            <table class="table table-bordered mb-0">
                <tbody>
                    <!-- Row 1: Agency / Official Led -->
                    <tr>
                        <td style="width: 45%; background-color: #ffff00;" class="font-weight-bold align-middle">
                            Which official, agency, and/or national coordinating body, if any, led government
                            anti-trafficking efforts?
                        </td>
                        <td style="background-color: #ffff00;">
                            <input type="text" name="official_title_q42" id="official_title_q42" class="form-control"
                                placeholder="Enter official, agency or body name" value="{{ $official_title_q42 }}">
                        </td>
                    </tr>

                    <!-- Row 2: Effectiveness & Results Description -->
                    <tr>
                        <td style="background-color: #ffff00;" class="font-weight-bold align-middle">
                            How was this body effective or ineffective, and what results did it produce?
                        </td>
                        <td style="background-color: #ffff00;">
                            <div class="form-group mb-2">
                                <select id="official_type_q42" name="official_type_q42" class="form-control">
                                    <option value="">Choose an item...</option>
                                    <option value="Effective" {{ $official_type_q42 == 'Effective' ? 'selected' : '' }}>
                                        Effective</option>
                                    <option value="Ineffective"
                                        {{ $official_type_q42 == 'Ineffective' ? 'selected' : '' }}>Ineffective</option>
                                    <option value="Moderately Effective"
                                        {{ $official_type_q42 == 'Moderately Effective' ? 'selected' : '' }}>Moderately
                                        Effective</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                                <label class="font-weight-bold text-muted">Please describe the results-</label>
                                <textarea name="official_desc_q42" id="official_desc_q42" class="form-control" rows="3"
                                    placeholder="Describe the results...">{{ $official_desc_q42 }}</textarea>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question42">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Temp Save Action
    $(document).on('click', '#temp-save-question42', function(e) {
        e.preventDefault();

        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('question_no', 42);

        // Controller Database Names Matching
        formData.append('question42[official_title_q42]', $('#official_title_q42').val() || '');
        formData.append('question42[official_type_q42]', $('#official_type_q42').val() || '');
        formData.append('question42[official_desc_q42]', $('#official_desc_q42').val() || '');

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success || response) {
                    $('.question42 .card-header h6').css('color', 'blue');
                    alert("Question 42 Temp Saved Successfully!");
                }
            },
            error: function(err) {
                alert("Something went wrong!");
                console.log(err);
            }
        });
    });

});
</script>