<form action="{{ route('ubicaciones.destroy', $id) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
        <i class="fas fa-trash"></i> <span class="d-none d-lg-inline-block">Eliminar</span>
    </button>
</form>
