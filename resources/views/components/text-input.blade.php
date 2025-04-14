@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'text-black bg-white border-[#DDDDCB] focus:border-[#DDDDCB] focus:ring-[#DDDDCB] rounded-md shadow-sm']) }}>
