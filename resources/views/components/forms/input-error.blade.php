<!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->

@props(['name'])

@error($name)
<p class="text-red-500 text-sm dark:text-red-400 mt-2">
    {{ $message  }}
</p>
@enderror
