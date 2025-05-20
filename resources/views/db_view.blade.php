<form action="{{ route('db-form') }}" method="POST">
    @csrf
    <textarea name="query" id="" cols="30" rows="10">test</textarea>
    <button type="submit">Submit</button>
</form>