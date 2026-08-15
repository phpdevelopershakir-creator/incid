@php
$selectedVal = $selected ?? '';
@endphp

<option value="" disabled {{ $selectedVal == '' ? 'selected' : '' }}>Select Purpose</option>
<option value="Online Scam" {{ $selectedVal == 'Online Scam' ? 'selected' : '' }}>Online Scam</option>
<option value="Fight in or support active conflict"
    {{ $selectedVal == 'Fight in or support active conflict' ? 'selected' : '' }}>Fight in or support active conflict
</option>
<option value="Pornography" {{ $selectedVal == 'Pornography' ? 'selected' : '' }}>Pornography</option>
<option value="Sexual Exploitation" {{ $selectedVal == 'Sexual Exploitation' ? 'selected' : '' }}>Sexual Exploitation
</option>
<option value="Economic Exploitation" {{ $selectedVal == 'Economic Exploitation' ? 'selected' : '' }}>Economic
    Exploitation</option>
<option value="Ransom" {{ $selectedVal == 'Ransom' ? 'selected' : '' }}>Ransom</option>