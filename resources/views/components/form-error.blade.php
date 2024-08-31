@props(['name'])


@error($name)
    <div class="alert alert-danger text-red-700 mt-2">{{ $message }}</div>
@enderror
