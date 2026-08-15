@php
$selectedVal = $selected ?? '';
@endphp

<option value="" disabled {{ $selectedVal == '' ? 'selected' : '' }}>Select Technology</option>
<option value="Facebook" {{ $selectedVal == 'Facebook' ? 'selected' : '' }}>Facebook</option>
<option value="Tictok" {{ $selectedVal == 'Tictok' ? 'selected' : '' }}>Tictok</option>
<option value="WhatsApp" {{ $selectedVal == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
<option value="Instagram" {{ $selectedVal == 'Instagram' ? 'selected' : '' }}>Instagram</option>
<option value="Youtube" {{ $selectedVal == 'Youtube' ? 'selected' : '' }}>Youtube</option>
<option value="Telegram" {{ $selectedVal == 'Telegram' ? 'selected' : '' }}>Telegram</option>
<option value="Other Social Media Platform" {{ $selectedVal == 'Other Social Media Platform' ? 'selected' : '' }}>Other
    Social Media Platform</option>
<option value="Phone Apps" {{ $selectedVal == 'Phone Apps' ? 'selected' : '' }}>Phone Apps</option>
<option value="Online Job Portal" {{ $selectedVal == 'Online Job Portal' ? 'selected' : '' }}>Online Job Portal</option>
<option value="Websites" {{ $selectedVal == 'Websites' ? 'selected' : '' }}>Websites</option>
<option value="Tele- Marketing" {{ $selectedVal == 'Tele- Marketing' ? 'selected' : '' }}>Tele- Marketing</option>