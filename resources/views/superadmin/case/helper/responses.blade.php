@php
$selectedVal = $selected ?? '';
@endphp

<option value="" disabled {{ $selectedVal == '' ? 'selected' : '' }}>Select Response</option>
<option value="Special Police Unit/Cell" {{ $selectedVal == 'Special Police Unit/Cell' ? 'selected' : '' }}>Special
    Police Unit/Cell</option>
<option value="Police training" {{ $selectedVal == 'Police training' ? 'selected' : '' }}>Police training</option>
<option value="Web crawlers to identify suspicious Internet activity"
    {{ $selectedVal == 'Web crawlers to identify suspicious Internet activity' ? 'selected' : '' }}>Web crawlers to
    identify suspicious Internet activity</option>
<option value="Data Analytics" {{ $selectedVal == 'Data Analytics' ? 'selected' : '' }}>Data Analytics</option>
<option value="Supply side tracing" {{ $selectedVal == 'Supply side tracing' ? 'selected' : '' }}>Supply side tracing
</option>
<option value="Collaboration with social media"
    {{ $selectedVal == 'Collaboration with social media' ? 'selected' : '' }}>Collaboration with social media</option>
<option value="Collaboration with technology companies"
    {{ $selectedVal == 'Collaboration with technology companies' ? 'selected' : '' }}>Collaboration with technology
    companies</option>
<option value="Internet safety sensitization campaign"
    {{ $selectedVal == 'Internet safety sensitization campaign' ? 'selected' : '' }}>Internet safety sensitization
    campaign</option>
<option value="Hotlines" {{ $selectedVal == 'Hotlines' ? 'selected' : '' }}>Hotlines</option>
<option value="Special App" {{ $selectedVal == 'Special App' ? 'selected' : '' }}>Special App</option>
<option value="MoU" {{ $selectedVal == 'MoU' ? 'selected' : '' }}>MoU</option>
<option value="Legal action" {{ $selectedVal == 'Legal action' ? 'selected' : '' }}>Legal action</option>
<option value="Tools and guidelines" {{ $selectedVal == 'Tools and guidelines' ? 'selected' : '' }}>Tools and guidelines
</option>
<option value="Others" {{ $selectedVal == 'Others' ? 'selected' : '' }}>Others</option>