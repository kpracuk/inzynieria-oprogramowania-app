@props([
    'disabled' => false,
    'items' => []
])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @foreach($items as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
