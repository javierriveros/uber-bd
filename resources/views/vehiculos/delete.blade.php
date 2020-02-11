<form action="{{ route('ubicaciones.destroy', $id) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar ubicación">
        <span class="d-none d-lg-inline-block">Eliminar ubicación</span>
    </button>
</form>
