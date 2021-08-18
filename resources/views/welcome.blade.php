<form method="post" action="{{ route('statuses.store') }}">
    @csrf
    <textarea name="body"></textarea>
    <button type="submit" id="create-status">Publish</button>
</form>

