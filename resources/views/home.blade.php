<h2>HOLLAaaa</h2>
<form action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="text-red-600 hover:underline">
        Logout
    </button>
</form>
